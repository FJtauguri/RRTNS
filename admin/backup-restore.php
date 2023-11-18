<?php
include('../database/dbcon.php');

if (isset($_POST['backup'])) {
    $backupFolder = 'backup/'; 
    $backupFile = 'rrtsnss_' . date("Y-m-d") . '_' . uniqid() . '.sql';
    $backupPath = $backupFolder . $backupFile;

    // Database connection parameters
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "lms"; 

    $tables = array();
    $sql = "SHOW TABLES";
    $result = $con->query($sql); 

    while ($row = $result->fetch_row()) {
        $tables[] = $row[0];
    }

    $tables = array_merge(array_diff($tables, array("tbl_backup")));
    $sqlScript = "";

    foreach ($tables as $table) {
        $query = "SHOW CREATE TABLE $table";
        $result = $con->query($query);
        $row = $result->fetch_row();
        $sqlScript .= "\n\n" . $row[1] . ";\n\n";
        $query = "SELECT * FROM $table";
        $result = $con->query($query); 
        $columnCount = $result->field_count;

        for ($i = 0; $i < $columnCount; $i++) {
            while ($row = $result->fetch_row()) {
                $sqlScript .= "INSERT INTO $table VALUES(";
                for ($j = 0; $j < $columnCount; $j++) {
                    $row[$j] = $row[$j];
                    if (isset($row[$j])) {
                        $sqlScript .= '"' . $con->real_escape_string($row[$j]) . '"';
                    } else {
                        $sqlScript .= '""';
                    }

                    if ($j < ($columnCount - 1)) {
                        $sqlScript .= ',';
                    }
                }
                $sqlScript .= ");\n";
            }
        }
        $sqlScript .= "\n";
    }

    if (!empty($sqlScript)) {
        $fileHandler = fopen($backupPath, 'w+');
        $number_of_lines = fwrite($fileHandler, $sqlScript);
        fclose($fileHandler);

        $curDateTime = date('Y-m-d H:i:s');
        // $try = $con->query("INSERT INTO `tbl_backup` VALUES (NULL, '$backupFile', '$curDateTime');");
        $try = $con->query("INSERT INTO `tbl_backup` (id, bakupname, date) VALUES (NULL, '$backupFile', '$curDateTime')");


        if ($try) {
            echo('<script>alert("Backup Created Successfully");</script>');
        } else {
            die("Error!");
        }
    }
}


if (isset($_POST['restore'])) {
    $backupFolder = 'backup/';
    $files = glob($backupFolder . 'rrtsnss_*.sql');
    $latestBackup = end($files);

    if (!$latestBackup) {
        echo 'No backup files found in ' . $backupFolder;
    } else {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'lms';

        $command = "mysql --host={$host} --user={$username} --password={$password} {$database} < {$latestBackup}";

        $output = shell_exec($command);

        if (!empty($output)) {
            echo 'Restore failed: ' . $output;
        } else {
            echo 'Restore completed using ' . $latestBackup;
        }
    }
}


?>

<?php include('header.php');?>

<div class="page-title">
    <div class="title_left">
        <h5>Home / Borrow</h5>
    </div>
</div>


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- content starts here -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="col-md-8">
                        <div class="col-lg-12 h-20 br-just-center">
                            <form method="post">
                                <button type="submit" name="backup" class="btn-outline-success-oval">Backup</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="col-lg-12 h-20 br-just-center restore">
                            <form method="post">
                                <input class="backupfn" type="file" name="filename" accept=".sql">
                                <button type="submit" name="restore" class="btn-outline-danger-oval">Restore</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content ends here -->
    </div>
</div>

<?php include('footer.php'); ?>

<?php include('header.php'); ?>

<?php
// Database connection and queries
include('../database/dbcon.php');

function getRecordCount($con, $table)
{
    $result = mysqli_query($con, "SELECT * FROM $table");
    return mysqli_num_rows($result);
}

$adminCount = getRecordCount($con, 'admin');
$userCount = getRecordCount($con, 'user');
$bookCount = getRecordCount($con, 'book');
$borrowedCount = getRecordCount($con, 'borrow_book');
$returnedCount = getRecordCount($con, 'return_book');
?>

<div class="container">
    <div class="row">
        <?php function generateTile($icon, $link, $count, $label)
        { ?>
            <div class="animated flipInY col-sm-4 tile_stats_count mybtns">
                <div class="right">
                    <a href="<?php echo $link; ?>">
                        <span class="count_top h1"><i class="fa <?php echo $icon; ?>"></i> </span>
                    </a>
                    <div class="count green">
                        <?php echo $count; ?>
                    </div>
                    <span class="count_bottom">
                        <?php echo $label; ?>
                    </span>
                </div>
            </div>
        <?php } ?>

        <?php generateTile('fa-users', 'admin.php', $adminCount, 'Total of Admin'); ?>
        <?php generateTile('fa-male fa-female', 'user.php', $userCount, 'Student & Teacher'); ?>
        <?php generateTile('fa-book', 'book.php', $bookCount, 'Total of Books'); ?>
        <?php generateTile('fa-book', 'borrowed.php', $borrowedCount, 'Total of Book Borrowed'); ?>
        <?php generateTile('fa-book', 'returned_book.php', $returnedCount, 'Total of Book Returned'); ?>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 mt-3">
            <div style="min-height: 200px;">
                <canvas id="linechart"></canvas>
            </div>
        </div>
        <div class="col-sm-12 mt-3 mb-3">
            <div style="min-height: 200px;">
                <canvas id="barchart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

<script>
    // Chart configuration and data
    var lineChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [
            {
                label: "Borrowed Books in year 2023",
                borderColor: "rgb(75, 192, 192)",
                data: [10, 30, 25, 40, 50, 60, 70, 80, 90, 100, 110, 120],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                ]
            }
        ]
    };
    var lineChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    var lineChartCtx = document.getElementById('barchart').getContext('2d');
    var lineChart = new Chart(lineChartCtx, {
        type: 'bar',
        data: lineChartData,
        options: lineChartOptions
    });
</script>

<script>
    var genderFrequencyData = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [
            {
                label: "Male",
                borderColor: "rgb(54, 162, 235)",
                data: [10, 15, 20, 18, 25, 22, 19, 23, 27, 30, 28, 32],
                fill: false
            },
            {
                label: "Female",
                borderColor: "rgb(255, 99, 132)",
                data: [12, 18, 15, 22, 28, 25, 21, 26, 29, 33, 31, 35],
                fill: false
            },
            {
                label: "Transgender",
                borderColor: "rgb(153, 102, 255)",
                data: [2, 3, 1, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                fill: false
            }
        ]
    };

    var genderFrequencyOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        title: {
            display: true,
            text: "Users' Frequency of Borrowing Books - Year 2023"
        }
    };

    var genderFrequencyCtx = document.getElementById('linechart').getContext('2d');
    var genderFrequencyChart = new Chart(genderFrequencyCtx, {
        type: 'line',
        data: genderFrequencyData,
        options: genderFrequencyOptions
    });
</script>

<?php include('footer.php'); ?>
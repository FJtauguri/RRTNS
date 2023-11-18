<?php 
include ('../include/dbcon.php');

$query = mysqli_query($con,"SELECT * FROM `barcode` ORDER BY mid_barcode DESC ");
$fetch = mysqli_fetch_array($query);
$mid_barcode = $fetch['mid_barcode'];

$mid =  $mid_barcode + 1;
$pre = "VNHS";
$suf = "LMS";
$gen = $pre.$mid.$suf;


// barcode daw

// echo '<pre>';
// var_dump($_GET);

// $category = htmlentities($_GET['Category']);
$category = htmlentities('English');

 $category_id = isset(mysqli_fetch_assoc(mysqli_query($con, "SELECT category_id FROM category WHERE classname = '$category'"))['category_id']) ? mysqli_fetch_assoc(mysqli_query($con, "SELECT category_id FROM category WHERE classname = '$category'"))['category_id'] : '';

 if($category_id!=''){

    $book_title=$_GET['Title'];
    $author=$_GET['Author'];
    $book_copies=$_GET['Copies'];
    $book_pub=$_GET['Publication'];
    $publisher_name=$_GET['Publisher'];
    $isbn='none';
    $copyright_year=$_GET['Copyright'];
    $status=$_GET['Status'];
    $book_image='';
    $remark = 'Available';


    mysqli_query($con,"insert into book (book_title,category_id,author,book_copies,book_pub,publisher_name,isbn,copyright_year,status,book_barcode,book_image,date_added,remarks)
    values('$book_title','$category_id','$author','$book_copies','$book_pub','$publisher_name','$isbn','$copyright_year','$status','$gen','$book_image',NOW(),'$remark')")or die(mysqli_error());
    


mysqli_query($con,"insert into barcode (pre_barcode,mid_barcode,suf_barcode) values ('$pre', '$mid', '$suf') ") ;

echo " <script>
alert('Book Added');
window.location.href='../add_book.php'
</script>";

 }else{
        echo " <script>
        alert('Scan Failed');
        window.location.href='../add_book.php'
     </script>";
 }?>

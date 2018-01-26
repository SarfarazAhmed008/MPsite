<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = "DELETE FROM person WHERE Person_ID=$id";
$result = mysqli_query($conn, $result);

$result1 = "DELETE FROM contact WHERE Contact_ID=$id";
$result1 = mysqli_query($conn, $result1);


$result2 = "DELETE FROM date WHERE Date_ID=$id";
$result2 = mysqli_query($conn, $result2);




//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>


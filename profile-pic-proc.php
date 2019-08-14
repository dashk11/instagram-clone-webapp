<?php
session_start();



// connect to database
$db = mysqli_connect('localhost', 'root', '', 'blog');



$uid = $_POST['user'];
$pic = $_POST['pic'];


$sql1 = "UPDATE users SET profilePic='$pic' WHERE UserId = '$uid';";
mysqli_query($db , $sql1);

header("location: user-home.php");

?>

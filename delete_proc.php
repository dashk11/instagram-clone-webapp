<?php
session_start();



// connect to database
$db = mysqli_connect('localhost', 'root', '', 'blog');

if(isset($_POST['delete-button']))
{
$uid = $_SESSION['username'];
$picId = $_POST['picId'];
$sql1 = "DELETE FROM pics WHERE picId=$picId;";
mysqli_query($db , $sql1);


}
    header('location: user-home.php?delete=success');

?>

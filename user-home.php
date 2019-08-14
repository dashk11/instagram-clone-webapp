<?php
  session_start();

?>
<?php include "header.php";?>
<?php

$user = $_SESSION['username'];
echo "$user";
?>


<style>
  .login-btn{
    float: right;
    margin-top: -4%;

  }
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;
}
.navbar{
  margin-top: -1.5%;
}
.disp-img{
  width:60%;
  height: 80%;
}
.img_div{
  display: inline-block;
  width: 30%;
  padding-left: 10%;

}
.search-bar{
  float: right;
  margin-right: 10%;
  margin-top: 1%;
  position: relative;
}
.userIdName{
  font-size: 17px;
  font-weight: bold;
}
.profilePic{
  width:20%;
  height: 40%;
  border-radius: 250px;
}
.top-div{
  width: 100%;
  background-color: #32ba93;
}
</style>
<body>
  <div class="home-head well">
    <center><h1><i>Ingram</i></h1></center>
    <form class="" action="logout.php" method="get">
      <input class="login-btn btn btn-lg btn-danger" type="submit" name="logout" value="Logout">
    </form>
  </div>

  <nav class="navbar navbar-inverse">
  <div class="container-fluid">


    <form class="search-bar" action="search-users.php" method="post">
      <input type="search" name="search" value="">
      <input type="submit" value="search" name='search-button'>
    </form>


    <div class="navbar-header">
      <a class="navbar-brand" href="user-home.php">Ingram.com</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Myaccount</a></li>
      <li class="#"><a href="create_pic.php">Upload pic</a></li>
      <li class="#"><a href="statistics.php">Statistics </a></li>
      <li class="#"><a href="trending.php">Trending </a></li>





    </ul>
  </div>
</nav>

<!--  <div class=" display-images well">-->
<?php
$username = $_SESSION['username'];
$db = mysqli_connect('localhost', 'root', '', 'blog');
$query = "SELECT * FROM users WHERE UserId = '$username'";

if ($result = mysqli_query($db, $query)) {
        /* fetch associative array */

    while ($row = $result->fetch_assoc()) {
        $img = $row["profilePic"];

    }
}
echo "<div class='top-div'>
      <h2> Profile picture</h2><br>
      <span  >
      'User Id :  <span class='userIdName'>$username</span><br><br>';
      <img src='image/$img' class='profilePic'></span> <br><br>

      <form class='' action='profile-pic-proc.php' method='post'>
         <input class='btn btn-primary'type='file' name='pic' accept='image/*' ><br>
         <input   name='user' value='$username'  hidden>
         <input type='text' name='hashtags' placeholder='hashtags' hidden>
         <input class='btn btn-success'type='submit' 'name=profile-pic-submit'>

      </form>
   </div>";
  echo "<br><br>";


?>
<?php
    $db = mysqli_connect('localhost', 'root', '', 'blog');
    $username = $_SESSION['username'];

    $query = "SELECT * FROM pics WHERE UserId = '$username' ORDER  BY timee";

    if ($result = mysqli_query($db, $query)) {
            /* fetch associative array */

        while ($row = $result->fetch_assoc()) {
            $img = $row["pic"];
            $hashtag = $row["hashtag"];
            $picId = $row["picId"];
            echo "<div class='well img_div'>
                    <form action='delete_proc.php' method='post'>
                    <img class='disp-img' src='image/$img'></img><br>
                    <input name='img' value='$img' hidden>
                    <input name='picId' value='$picId' hidden>
                    <h3>$hashtag</h3>
                    <input type='submit' name='delete-button'value='Delete'></input>
                  </div>";
        }
    }
    mysqli_close($db);
?>
<!--  </div>-->
</body>


</html>

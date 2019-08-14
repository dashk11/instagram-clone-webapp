<?php
  session_start();

?>
<?php include "header.php" ?>

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
.search-bar{
  float: right;
  margin-right: 10%;
  margin-top: 1%;
  position: relative;
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
      <li class="#"><a href="user-home.php">Myaccount</a></li>
      <li class="active"><a href="create_pic.php">Upload pic</a></li>
      <li class="#"><a href="statistics.php">Statistics </a></li>
      <li class="#"><a href="trending.php">Trending </a></li>


    </ul>
  </div>


</nav>

  <div class="well">
    <form class="" action="upload_proc.php" method="post">
      <input type="file" name="pic" accept="image/*"><br>
      <input type="text" name="hashtags" placeholder="hashtags"><br><br>
      <input type="submit" name="pic-submit">

    </form>
  </div>
</body>

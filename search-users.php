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

.search-bar{
  float: right;
  margin-right: 10%;
  margin-top: 1%;
  position: relative;
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
      <li ><a href="user-home.php">Myaccount</a></li>
      <li class="#"><a href="create_pic.php">Upload pic</a></li>
      <li class="#"><a href="statistics.php">Statistics </a></li>
      <li class="#"><a href="trending.php">Trending </a></li>

    </ul>
  </div>
</nav>
<?php

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'blog');
if(isset($_POST['search-button'])){





$uid = $_SESSION['username'];
$search = $_POST['search'];
echo "<h2>Showing results for $search  </h2><br><br>";

$sql2 = "UPDATE hashtagcount SET hcount=hcount+1 WHERE hashtag = '$search'  ;";
mysqli_query($db, $sql2);

$query = "SELECT UserId FROM users WHERE UserId = '$search' ";
$result = mysqli_query($db, $query);
$row = $result->fetch_assoc();
$user = $row["UserId"];



if ($row["UserId"] == $search) {
        echo "<div class='well found'>
              <form action='view-user.php' method='post'>
                User ==>
                <input name='view-id' value='$user' hidden>
                <input class='btn btn-primary'name='view-btn' type='submit' value='$user'>
              </div>";

}
else{
    $query = "SELECT * FROM pics WHERE hashtag = '$search' ";

    if ($result = mysqli_query($db, $query)) {
        while ($row = $result->fetch_assoc()) {
            $hashtag = $row["hashtag"];
            $img = $row["pic"];
            $user = $row["UserId"];


            echo "<div class='well img_div'>
            <img class='disp-img' src='image/$img'></img><br>
            <h4>User - $user</h4>
            <h3>$hashtag</h3>
            </div>";
        }
    }
}



}

?>
</body>
</html>

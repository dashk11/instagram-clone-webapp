
<?php
  session_start();

?>
<?php include "header.php" ?>

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


</style>
<body>
  <div class="home-head well">
    <center><h1>BLOG</h1></center>
    <form class="" action="logout.php" method="get">
      <input class="login-btn btn btn-lg btn-danger" type="submit" name="logout" value="Logout">
    </form>
  </div>

  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Blog.com</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="user-home.php">Home</a></li>
      <li class="active"><a href="myblogs.php">MyBlogs</a></li>
      <li class="create-blog.php"><a href="create-blog.php">Create blog</a></li>
      <li><a href="#">Contact Us</a></li>

    </ul>
  </div>
</nav>

  <div class="well">
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'blog');

    $query1 = "SELECT * FROM blogs";
    $blog_id = 0;
    if ($result = mysqli_query($db, $query1)) {
        /* fetch associative array */
        $i=6;
        while ($row = mysqli_fetch_row($result)) {
          $x = $row[$i];
          if(isset($_POST[$x])) {
            $blog_id =  $x;
          }

      }
    }
    if(isset($_POST[$blog_id])) {
        $blog_id2 = (int)$blog_id;
        $query2 = "SELECT * FROM blogs WHERE BlogId = '$blog_id2'";
        $result = mysqli_query($db, $query2);
        $row = mysqli_fetch_row($result);
        echo "<center> <h1>$row[3]</h1></center><br>
              <span class='author-name'><h3>By $row[1]</h3></span></div>";
        echo " <div class='jumbotron'>

              <br>
              <span> <h3>$row[4]<h3></span>

              </div>";
    }
    ?>

</body>

</script>
</html>

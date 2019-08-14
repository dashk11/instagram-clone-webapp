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
      <li class="#"><a href="create-blog.php">Create blog</a></li>
      <li><a href="#">Contact Us</a></li>

    </ul>
  </div>
</nav>

  <div class="well">
    <table>
      <tr>
        <th><h2>Title</h2></th>
        <th><h2>Likes</h2></th>
      </tr>

        <?php
          $db = mysqli_connect('localhost', 'root', '', 'blog');
          $uid = $_SESSION['username'];
          $query1 = "SELECT * FROM blogs where UserId='$uid'";


          if ($result = mysqli_query($db, $query1)) {
              /* fetch associative array */
              $i=1;
              while ($row = mysqli_fetch_row($result)) {
                echo "<tr>
                      <form action='view-myblogs.php' method='post'>

                        <td><h2><input type='submit' name=".$i." value='".$row[3]."'></input></h2></td>

                        <td><h2>".$row[5]."</h2></td>
                      <form>

                      </tr>";
              }
            }


        ?>


    </table>
  </div>
</body>

<script type="text/javascript">
  function(){

  }
</script>
</html>

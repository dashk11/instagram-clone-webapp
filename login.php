<?php
session_start();
$_SESSION['status'] = "loggedOut";
 ?>
<?php include "header.php" ?>

<style>

.login-form{
  width: 500px;
  height: 400px;
  background-color: gray;
  margin-left: 30%;
}
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
    <center><h1><i>Ingram</i></h1></center>
    <a href="login.php">
    <div class="login-btn btn btn-lg btn-success">
      Login / Register
    </div></a>
  </div>

  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Ingram.com</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="index.php">Home</a></li>
 

    </ul>
  </div>
</nav>
<div class="login-form">
  <h1>Login</h1><br><br>
  <form class="" action="proc/login-proc.php" method="post">
    Username <input class="form-control"type="text" name="username" value="" required><br>
    Password <input class="form-control"type="password" name="password" value="" required><br>
    <input class="btn btn-lg btn-danger"type="submit" name="login-submit" value="Submit"><br>
    <a href="register_frontend.php">Register?</a>
  </form>
</div>


</body>
</html>

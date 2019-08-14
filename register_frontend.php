<?php
session_start();
$_SESSION['status'] = "loggedOut";
 ?>

<?php include "header.php" ?>

<style>

.login-form{
  width: 500px;
  height: 600px;
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
      <li class="active"><a href="#">Home</a></li>
   >

    </ul>
  </div>
</nav>
<div class="login-form">
  <center><h1>Register</h1></center><br><br>
  <form class="" action="proc/register_proc.php" method="post">
    Username <input class="form-control"type="text" name="uid" value="" required><br>
    Name <input class="form-control"type="text" name="name" value="" required><br>
    Age <input class="form-control"type="text" name="age" value="" required><br>
    E-mail <input class="form-control"type="text" name="email" value="" required><br>
    Password <input class="form-control"type="password" name="pass1" value="" required><br>
    Re-Enter Password <input class="form-control"type="password" name="pass2" value="" required><br>
    <input class="btn btn-lg btn-danger"type="submit" name="register-submit" value="Submit"><br>
    <a href="login.php">Login?</a>
  </form>

</div>
<br><br>


</body>
</html>

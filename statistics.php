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
      <li class="active"><a href="statistics.php">Statistics </a></li>
      <li class="#"><a href="trending.php">Trending </a></li>





    </ul>
  </div>
</nav>

<!--  <div class=" display-images well">-->
<?php
    $db = mysqli_connect('localhost', 'root', '', 'blog');

      $username = $_SESSION['username']; //who i am viewing


      $query = "SELECT * FROM pics WHERE UserId = '$username' ";
      $img = '';
      $i = 0;
       if ($result = mysqli_query($db, $query)) {
            /* fetch associative array */

         while ($row = $result->fetch_assoc()) {
             $img = $row["pic"];
             $views = $row["views"];
             $date = $row["timee"];

             echo "<div class='well img_div'>
                    <form action='delete_proc.php' method='post'>
                      <img class='disp-img' src='image/$img'></img><br>
                      <input name='img' value='$img' hidden><br>
                      Downloads:<h3>$views</h3><br>
                      Date : <h3>$date</h3><br>
                    </form>
                  </div>";
                  $i=$i+1;
         }
         echo "<input id='total' value='$i' hidden>";
      }
       mysqli_close($db);






?>

<script>

/*
var id;


function displayy(){
  var ourRequest = new XMLHttpRequest();
  ourRequest.open('GET', 'pic_data'+'.json');
  ourRequest.onload = function() {
    if (ourRequest.status >= 200 && ourRequest.status < 400) {
      var ourData = JSON.parse(ourRequest.responseText);
      renderHTML2(ourData); // display HTML
    } else {
      console.log("We connected to the server, but it returned an error.");
    }

  };
  ourRequest.send();
}

function renderHTML2(data) {
  var displayContainer = document.getElementById("disp");
  var htmlString;

  for (i = 0; i < data.length; i++) {
    document.getElementById("views"+i+"").value = data[i+1].views;
  }


  console.log(htmlString);
}


function views(id){
  var btn = document.getElementById("btn");

    var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET', 'pic_data'+'.json');
    ourRequest.onload = function() {
      if (ourRequest.status >= 200 && ourRequest.status < 400) {
        var ourData = JSON.parse(ourRequest.responseText);
        renderHTML(ourData,id); // display HTML
      } else {
        console.log("We connected to the server, but it returned an error.");
      }

    };
    ourRequest.send();
}


function renderHTML(data,id) {
  var displayContainer = document.getElementById("disp");

  for (i = 0; i < data.length; i++) {
    if(data[i].picId == id){

         var da = parseInt(data[i].views) + 1;

         var ourRequest = new XMLHttpRequest();
         var ourData = JSON.parse(ourRequest.open('GET', 'pic_data'+'.json'));
         ourdata[i].views = da.toString();
    }

  }



}

*/

</script>

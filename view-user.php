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
.userIdName{
  font-size: 17px;
  font-weight: bold;
}
.search-bar{
  float: right;
  margin-right: 10%;
  margin-top: 1%;
  position: relative;
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
      <li ><a href="user-home.php">Myaccount</a></li>
      <li class="#"><a href="create_pic.php">Upload pic</a></li>
      <li class="#"><a href="statistics.php">Statistics </a></li>
      <li class="#"><a href="trending.php">Trending </a></li>





    </ul>
  </div>
</nav>

<?php
$username = $_POST['view-id']; //who i am viewing
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


   </div>";
  echo "<br><br>";


?>

<!--  <div class=" display-images well">-->
<?php
    $db = mysqli_connect('localhost', 'root', '', 'blog');
    if(isset($_POST['view-btn'])){
      $username = $_POST['view-id']; //who i am viewing
      $current_user = $_SESSION['username']; //my user id



      $query = "SELECT * FROM pics WHERE UserId = '$username' ORDER  BY timee";
      $img = '';
      $i = 0;
       if ($result = mysqli_query($db, $query)) {
            /* fetch associative array */

         while ($row = $result->fetch_assoc()) {
             $img = $row["pic"];
             $views = $row["views"];
             $picId = $row["picId"];
             $hashtag = $row["hashtag"];


             echo "<div class='well img_div'>
                    <form action='delete_proc.php' method='post'>
                      <img class='disp-img' src='image/$img'></img><br>
                      <input name='img' value='$img' hidden><br>

                      <h3>$hashtag</h3><br>

                      <input id='usr' value='$username' hidden><br>
                    </form>





                  </div>";
                  $i=$i+1;



         }


      }
      $query2 = "SELECT * FROM pics WHERE UserId = '$username'";
      $i = 0;
      $form2txt = '<h3> Downloads</h3>';
       if ($result = mysqli_query($db, $query2)) {
            /* fetch associative array */

         while ($row = $result->fetch_assoc()) {
             $img = $row["pic"];
             $views = $row["views"];
             $picId = $row["picId"];
             $hashtag = $row["hashtag"];


             $form2txt = $form2txt . "

                      <input id= '$picId' value='$views' name='views$picId'hidden></input><br>
                      <input id='usr' value='$username' name='usr'hidden><br>
                      <input id='picId' value='$picId' name='picId$i'hidden><br>
                      <input id='total' name='total' value='$i' hidden>
                      <a  href='image/$img' download='myimage' onclick='incrView($picId)'>DOWNLOAD pic$i</a>

                      ";

                  $i=$i+1;



         }





      }
      echo "<br><br>";
      echo "<div class='well img_div'>
             <form class='form2' action='views-proc.php' method='post'>

                  ".$form2txt."<br><br>
                  <input type='submit' value='GO' name='view-btn2'>
             </form>

           </div>";
       mysqli_close($db);




  }


?>

<script>
var id;
function incrView(id){
    var view = parseInt(document.getElementById(id).value);
    view = view + 1;
    document.getElementById(id).value = view;
}


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

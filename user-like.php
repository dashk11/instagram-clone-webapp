<?php
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'blog');
if (isset($_POST['like_btn'])){

  $current_uid = $_POST['usr'];
  $liked_uid = $_POST['usr_view'];
  $liked_pic = $_POST['img'];


  $sql = "SELECT * FROM likes WHERE User_Id = '$current_uid' AND image='$liked_pic' AND user='$liked_uid' ; ";
  $result = mysqli_query($db ,$sql);
  $resultCheck = mysqli_num_rows($result);
  if($resultCheck > 0){

  }else{

    $sql2 = "SELECT likes from pics where UserId='$liked_uid' and pic = '$liked_pic';";
 
    if ($result = mysqli_query($db, $sql2)) {
        while ($row = $result->fetch_assoc()) {
              $current_likes = integer($row["likes"]);
              echo "$current_likes";
        }
    }

    echo "<h1>$current_likes</h1>";
    /*
    $sql3 = "INSERT INTO pics(likes) VALUES ('$current_uid' ,'$liked_pic','$liked_uid');";
    mysqli_query($db , $sql3);     */

  }
}


?>

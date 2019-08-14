<?php

$db = mysqli_connect('localhost', 'root', '', 'blog');
if (isset($_POST['view-btn2'])){

  $current_uid = $_POST['usr'];
  //$view_pic = $_POST['img'];
  $total = $_POST['total'];


  for ($i=0; $i <$total+1 ; $i++) {

    $picId = $_POST['picId'.$i.''];
    $view = $_POST['views'.$picId.''];

    $sql = "UPDATE pics SET views=$view WHERE picId = $picId  ; ";
    mysqli_query($db, $sql);

    echo "$picId $view";


  }

  header('location: user-home.php?update=success');


}


?>

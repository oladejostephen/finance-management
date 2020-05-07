<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'project');  
  $pdf = $_FILES['pdf']['name'];
  $target = "../pdf/".basename($pdf);
  $update = "UPDATE user SET pdf = '$pdf' WHERE matric = '".$_SESSION['matric']."' ";
move_uploaded_file($_FILES['pdf']['tmp_name'], $target);
$result = $db->query($update);
if ($result){
header('location:'.$_SERVER['HTTP_REFERER']);
  // echo "Good update";
  # code...
}else{
echo "Please try again" .$db->error;
  # code...
}
?>
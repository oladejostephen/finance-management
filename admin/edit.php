<?php  
$db = mysqli_connect('localhost', 'root', '', 'project');
$referer = $_SERVER['HTTP_REFERER'];
  $payment_type = mysqli_real_escape_string($db, $_POST['payment_type']);
  $payment_amount = mysqli_real_escape_string($db, $_POST['payment_amount']);
  $payment_status = mysqli_real_escape_string($db, $_POST['payment_status']);
  $idupdate = $_POST['idupdate'];
  

$update = "UPDATE payment SET payment_type = '$payment_type', payment_amount = '$payment_amount', payment_status = '$payment_status' WHERE id = '$idupdate' ";
$result = $db->query($update);
// die(mysqli_error($conn));
if ($result) {
 header('location:'.$_SERVER['HTTP_REFERER']);
  // echo "Good update";
  # code...
}else{
  echo "Please try again" .$db->error;
  # code...
}
?>
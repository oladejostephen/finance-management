<?php  
$db = mysqli_connect('localhost', 'root', '', 'project');
$referer = $_SERVER['HTTP_REFERER'];
  $matric_number = mysqli_real_escape_string($db, $_POST['matric_number']);
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $sex = mysqli_real_escape_string($db, $_POST['sex']);
  

$update = "UPDATE user SET first_name = '$first_name', last_name = '$last_name', email = '$email', sex = '$sex' WHERE matric = '$matric_number' ";
$result = $db->query($update);
// die(mysqli_error($db));
if ($result) {
 echo "<script>alert('Record Successfully Updated');window.location.href='student_name.php';</script>";
 // header('location: all_student.php');
  // echo "Good update";
  # code...
}else{
  echo "Please try again" .$db->error;
  # code...
}
?>



<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'project');
echo $got1 = $_GET['ref'];
echo "<br>";
echo $got2 = $_GET['name'];
echo "<br>";
echo $got3 = $_GET['email'];
echo "<br>";
echo $got4 = $_GET['semester'];
echo "<br>";
echo $got5 = $_GET['year'];
echo "<br>";
echo $got6 = $_GET['matric'];
echo "<br>";
echo $got7 = $_GET['type'];
echo "<br>";
echo $got8 = $_GET['amount'];
echo "<br>";
echo $got9 = $_GET['id'];

$date_paid =  date('l\, jS\, F Y  H:i:s a');
if (!empty($got1)) {
	$payment_status = "Paid";
	$savepayment = mysqli_query($db, "INSERT INTO payment_details(payment_id, payment_idd, payer_name, payer_matric, payer_email, payment_type, payment_amount, payment_semester, payer_year, payment_status, date_paid) VALUES('$got1', '$got9', '$got2', '$got6', '$got3', '$got7', '$got8', '$got4', '$got5', '$payment_status', '$date_paid')");
	if ($savepayment) {
		echo "Good";
		
		header('location: dashboard.php');
	}else{
		echo "Bad";
		echo "Please try again" .$db->error;
		header('location: dashboard.php');
	}
}else{
	// echo "I didn't get it";
}
?>
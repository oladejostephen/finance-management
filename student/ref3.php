<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'project');
$get = $_GET['id'];
$get2 = $_GET['email'];
$get2;
$get;
"<br>";
$p = $_SESSION['matric'];
$refselect1 = mysqli_query($db, "SELECT * FROM user WHERE matric = '".$_SESSION['matric']."' ");
$fetchselect1 = mysqli_fetch_array($refselect1);
$w = $fetchselect1['first_name'];
$q = $fetchselect1['last_name'];
$y = $fetchselect1['class'];

$refselect = mysqli_query($db, "SELECT * FROM payment WHERE id = '$get' ");
$fetchselect = mysqli_fetch_array($refselect);
$i = $fetchselect['payment_type'];
$t = $fetchselect['payment_semester'];
$h = $fetchselect['payment_amount'];
$j = $fetchselect['payment_year'];
$n = $fetchselect['payment_status'];

$na = $w."\x20\x20\x20".$q;
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V12</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="close/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="close/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="close/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="close/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="close/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="close/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="close/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="close/css/util.css">
	<link rel="stylesheet" type="text/css" href="close/css/main.css">
	<style type="text/css">
		#text{
			text-transform: uppercase;
			font-weight: bolder;
			background: #ccc;
		}
		#text2{
			font-weight: bold;
			font-size: 16px;

		}
	</style>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('close/images/img-01.jpg');">
			<div class="wrap-login100">
				<div class="panel-body">
                        <form action="#" id="loginForm" method="POST">
                            <div class="text-center">
                                 <span class="success"></span>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label id="text2">Payer Name:</label>
                                    <input id="text" readonly="" type="text" value="<?php echo $na ?>" name="matric" class="form-control" required="">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label id="text2">Payer Matric Number:</label>
                                    <input id="text" readonly="" value="<?php echo $p ?>" type="text" name="matric" class="form-control" required="">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label id="text2">Payer Email:</label>
                                    <input id="text" readonly="" value="<?php echo $get2 ?>" type="text" name="matric" class="form-control" required="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label id="text2">Payment Type:</label>
                                    <input id="text" readonly="" value="<?php echo $i ?>" type="text" name="matric" class="form-control" required="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label id="text2">Payment Amount:</label>
                                    <input id="text" readonly="" value="#<?php echo $h ?>.00"  type="text" name="matric" class="form-control" required="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label id="text2">Payment Status:</label>
                                    <input id="text" readonly="" value="<?php echo $n ?>"  type="text" name="matric" class="form-control" required="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label id="text2">Payment Semester:</label>
                                    <input id="text" readonly="" value="<?php echo $t ?>"  type="text" name="matric" class="form-control" required="">
                                </div>
                            </div>
                            <div class="text-center">
                            	<form >
                            		<script src="https://js.paystack.co/v1/inline.js"></script>
                                      <button type="button" onclick="payWithPaystack()" class="btn btn-custon-rounded-two btn-success btn-block" data-toggle="tooltip" data-placement="left" title="Click here Pay Now!">Procced to Pay
                                      </button><br>
                                 </form>
                                <button class="btn btn-custon-rounded-two btn-default">
                                	<a href="dashboard.php" style="color: #fff">Back to Dashboard</a>
                                	</button>
                            </div>
                        </form>
                    </div>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->	
	<script src="close/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="close/vendor/bootstrap/js/popper.js"></script>
	<script src="close/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="close/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="close/js/main.js"></script>

</body>
</html>
 <script>
    function payWithPaystack(){
    var handler = PaystackPop.setup({
    key: 'pk_test_93253e4094828ef15dfd864b9decb3dfceb75a8f',
    email: '<?php echo $get2?>',
    amount: '<?php echo $h?>00',
    currency: "NGN",
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    firstname: 'Stephen',
    lastname: 'King',
    // label: "Optional string that replaces customer email"
    metadata: {
     custom_fields: [
        {
            display_name: "Mobile Number",
            variable_name: "mobile_number",
            value: "+2348012345678"
        }
     ]
    },
    callback: function(response){ 
      alert('success. transaction ref is ' + response.reference);
      window.location.href = 'ref.php?<?php echo "name=$na&id=$get&type=$i&amount=$h&matric=$p&email=$get2&semester=$t&year=$y&"?>ref=' + response.reference;

    },
    onClose: function(){
      alert('window closed');
    }
    });
    handler.openIframe();
    }
    </script> 
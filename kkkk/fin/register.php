<?php
$db = mysqli_connect('localhost', 'root', '', 'project');
$errors = array();
$matricerror = $phnerror = $sexerror = $classerror = $regsuccess = "";
if (isset($_POST['register_user'])) {
  // receive all input values from the form
  $matric = mysqli_real_escape_string($db, $_POST['matric']);
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $con_password = mysqli_real_escape_string($db, $_POST['con_password']);
  $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
  $sex = mysqli_real_escape_string($db, $_POST['sex']);
  $class = mysqli_real_escape_string($db, $_POST['class']);
 
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $result2 = mysqli_query($db, "SELECT * FROM user WHERE matric = '$matric' ");
        $user = mysqli_fetch_assoc($result2);

    if ($user) { // if user exists
        if ($user['matric'] === $matric) {
            $matricerror = "Matric Number already exists";
          array_push($errors, "");
        }
      }
    if ($user) { // if user exists
        if ($user['phone_number'] === $phone_number) {
             $phnerror = "This Phone Number has already exist";
          array_push($errors, "");
          # code...
        }
    }
     if ($password != $con_password) {
      array_push($errors, "The two passwords did not match");
      }
     if ($sex == "select your sex") {
      $sexerror = "Select your gender";
      array_push($errors, "");
      }
       if ($class == "select your class") {
         $classerror = "Select your class";
        array_push($errors, "");
      }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = password_hash($password, PASSWORD_DEFAULT);//encrypt the password before saving in the database
    $date_reg = date('l\, F jS\, Y  H:i:s a');
    $role = "student";

    $sql = "INSERT INTO user(matric, username, first_name, last_name, email, password, phone_number, sex, class, role, date_reg)  VALUES('$matric', '$matric', '$first_name', '$last_name', '$email', '$password', '$phone_number', '$sex', '$class', '$role', '$date_reg')";
    $success = mysqli_query($db, $sql);
    // die(mysqli_error($db));
    // header('location: login.php');
    if ($success) {
        $regsuccess = "Record Successfully Registered";
        array_push($errors, "");
    }
  }
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register | Nalika - Material Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <style type="text/css">
        .error{
            font-family: cursive;
            color: red;
            font-size: 14px;
            font-weight: bold;
        }
        .success{
            font-family: cursive;
            color: green;
            font-weight: bold;
            font-size: 18px;
        }
    </style>
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center custom-login">
                    <h3>Registration</h3>
                    <p> </p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="#" id="loginForm" method="POST">
                            <?php include_once 'errors.php';?>
                            <div class="text-center">
                                 <span class="success"><?php echo $regsuccess;?></span>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Matric Number</label>
                                    <input type="text" name="matric" class="form-control" required="">
                                    <span class="error"><?php echo $matricerror;?></span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" class="form-control" required="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" class="form-control" required="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Repeat Password</label>
                                    <input type="password" name="con_password" type="password" class="form-control" required="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control" required="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Phone Number</label>
                                    <input type="number" name="phone_number" class="form-control" required="">
                                    <span class="error"><?php echo $phnerror;?></span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Gender</label>
                                    <select class="form-control" name="sex">
                                        <option value="select your sex">Select your sex</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <span class="error"><?php echo $sexerror;?></span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Class</label>
                                    <select class="form-control" name="class">
                                        <option value="select your class">Select your Class</option>
                                        <option value="ND I">ND I</option>
                                        <option value="ND II">ND II</option>
                                    </select>
                                    <span class="error"><?php echo $classerror;?></span>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="register_user" class="btn btn-success loginbtn btn-block">Register</button><br>
                                <label>If already registered login here</label>
                                <button  title="click here to login"><a  href="index.php" style="color: #fff">Login</a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        </div>
        <div class="row">
            <!-- <div class="col-md-12 text-center">
                <p>Copyright © 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
            </div> -->
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>
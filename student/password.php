<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'project');
$errors = array();
if (!isset($_SESSION['matric'])) {
  header("location:logout.php");
  # code...
}
 require 'menu.php';
        require 'top_nav.php';
$e1 = $e2 = $e3 = "";
$query2 = "SELECT password FROM user WHERE matric = '".$_SESSION['matric']."' ";
$result2 = mysqli_query($db, $query2);
$name2 = mysqli_fetch_assoc($result2);
$cur_pass = $name2['password'];

// echo $name2['password'];
if (isset($_POST['passupdate'])){
  $oldpass = mysqli_real_escape_string($db, $_POST['oldpass']);
  $newpass = mysqli_real_escape_string($db, $_POST['newpass']);
  $conpass = mysqli_real_escape_string($db, $_POST['conpass']);
  
  if (password_verify($_POST['oldpass'], $name2['password'])) {
      if ($newpass == $conpass) {
      $newpass = password_hash($newpass, PASSWORD_DEFAULT);  
         $update = "UPDATE user SET password = '$newpass' WHERE matric = '".$_SESSION['matric']."' ";
           $check = mysqli_query($db, $update); # code...
           if ($check) {
                $e3 = "Password Successfully Changed";
                       array_push($errors, "");
               # code...
           }
              
                     }else{                        
                    $e1 = "The New Password did not match with Confirm Password";
                       array_push($errors, "");
                     } 
                    }else{
                      $e2 = "The Old password is incorrect";
                      array_push($errors, "");
                    }
                      
                    }



        ?>
        <style type="text/css">
            label{
                color: white;
            }
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
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-home"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2>Change Password</h2>
												<p>Welcome <span class="bread-ntd">Student</span></p>
											</div>
										</div>
                                    </div>
                                    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
											<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
										</div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Change Password</h4>
                             <div class="text-center">
                                <span class="error"><?php echo $e1;?></span>
                                <span class="success"><?php echo $e3;?></span>
                                <span class="error"><?php echo $e2;?></span>
                            </div>
                           <form method="post" action="password.php">
                          <div class="modal-body">
                           <label>Old Password</label>
                           <input type="Password" required="" class="form-control" name="oldpass">
                           <label>New Password</label>
                           <input type="Password" required="" class="form-control" name="newpass">
                           <label>Confirm Password</label>
                           <input type="Password" required="" class="form-control" name="conpass">
                          </div>
                            <button type="submit" name="passupdate" class="btn btn-success">Change</button>
                          </form>
                        </div>
                       <!--  <a><button href="product-payment.html" class="btn btn-custon-rounded-two btn-success"><i aria-hidden="true"></i> Proceed To Payment</button> </a>
                        <a><button href="#" class="btn btn-custon-rounded-two btn-warning"><i aria-hidden="true"></i> Print</button> </a> -->
                    </div>
                </div>
            </div>
        </div>
      <?php require 'footer.php';?>
<?php
session_start();
$successmgs = "";
$db = mysqli_connect('localhost', 'root', '', 'project');
if (!isset($_SESSION['matric'])) {
  header("location:logout.php");
  # code...
} require 'menu.php';
 require 'top_nav.php';
$fetch = mysqli_query($db, "SELECT * FROM payment ");
$errors = array();
if (isset($_POST['save'])) {
  // receive all input values from the form
  $payment_type = mysqli_real_escape_string($db, $_POST['payment_type']);
  $payment_amount = mysqli_real_escape_string($db, $_POST['payment_amount']);
  $payment_status = mysqli_real_escape_string($db, $_POST['payment_status']);
  $payment_semester = mysqli_real_escape_string($db, $_POST['payment_semester']);
  $payment_year = mysqli_real_escape_string($db, $_POST['payment_year']);
 
//check if payment type already exist
  $user = mysqli_query($db, "SELECT * FROM payment WHERE payment_type ='$payment_type' LIMIT 1 ");
  if (mysqli_num_rows($user) == 100) {
    array_push($errors, "Payment already exists");
  }
  if ($payment_status == "opt1") {
     array_push($errors, "Please Select Payment Status");
      # code...
  }
  if ($payment_semester == "opt2") {
     array_push($errors, "Please Select Semester");
      # code...
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
      $sql = "INSERT INTO payment(payment_type, payment_amount, payment_status, payment_semester, payment_year, date_reg)  VALUES('$payment_type', '$payment_amount', '$payment_status', '$payment_semester', '$payment_year', SYSDATE())";
         $saved =   mysqli_query($db, $sql);
         if ($saved) {
          $successmgs = "Record Successfully saved";
          array_push($errors, "");
             # code...
         }else{
           echo "Please try again" .$db->error;
  }
}
}
 ?>

    <style type="text/css">
      .success{
        font-size: 20px;
        font-family: cursive;
        color: green;
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
												<h2>Add Payment</h2>
												<p>Welcome <span class="bread-ntd">Admin </span></p>
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
        <!-- Single pro tab start-->
        <div class="single-product-tab-area mg-b-30">
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i> Add Payment</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                      <form method="POST" action="payment-edit.php">
                                        <div class="row">
                                            <?php require 'errors.php';?>
                                            <div class="text-center">
                                              <span class="success"><?php echo $successmgs ?></span>
                                              </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                      <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                        <input type="text" name="payment_type" class="form-control" required="" placeholder="Payment type">
                                                    </div>
                                                  </div>
                                                </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                     <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                                                        <input type="number" name="payment_amount" required="" class="form-control" placeholder="Amount">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                       <select required="" name="payment_semester" class="form-control pro-edt-select form-control-primary">
                                                            <option value="opt1">Select Payment Semester</option>
                                                            <option value="First Semester">First Semeter</option>
                                                            <option value="Second Semester">Second Semester</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                         <select required="" name="payment_status" class="form-control pro-edt-select form-control-primary">
                                                            <option value="opt1">Select Payment Status</option>
                                                            <option value="Compulsory">Compulsory</option>
                                                            <option value="Not Compulsory">Not Compulsory</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                    <select required="" name="payment_year" class="form-control pro-edt-select form-control-primary">
                        															<option value="opt2">Select Payment Year</option>
                        															<option value="ND I">ND I</option>
                        															<option value="ND II">ND II</option>
                        														</select>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button type="submit" name="save" class="btn btn-ctl-bt btn-lg waves-effect waves-light m-r-10">Save
											                           		</button>
                                                </div>
                                            </div>
                                        </div>
                                     </form>
                                    </div>
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
                            <h4>List of all Created payments</h4>
                            <table>
                                <tr>
                                    <th>Payment Type</th>
                                    <th>Status</th>
                                    <th>Semester</th>
                                    <th>Amount</th>
                                    <th>Date Created</th>
                                </tr>
                                 <?php 
                                    if ($fetch->num_rows>0){
                                    while($row=$fetch->fetch_assoc()){
                                        $a1 = $row['payment_type'];
                                        $a2 = $row['payment_semester'];
                                        $a3 = $row['payment_status'];
                                        $a4 = $row['payment_amount'];
                                        $a5 = $row['date_reg'];
                                        ?>
                                <tr>
                                    <td style="color: white"><?php echo $a1;?></td>
                                    <td >
                                        <button class="pd-setting" style="background:rgb(66, 5, 5);"><?php echo $a2 ?></button>
                                    <td>
                                        <button class="pd-setting"><?php echo $a3 ?></button>
                                    </td>                                  
                                    <td style="color: white">#<?php echo $a4 ?>.00</td> 
                                    <td style="color: white"><?php echo $a5 ?></td>                                  
                                </tr>
                                <?php
                            }
                            }
                            ?>
                            </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php';?>
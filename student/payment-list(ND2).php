<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'project');
if (!isset($_SESSION['matric'])) {
  header("location:logout.php");
  # code...
} require 'menu.php';
        require 'top_nav.php';
$selectpayment2 = mysqli_query($db, "SELECT * FROM user WHERE matric = '".$_SESSION['matric']."' ");
        while ($rowpayment2 = mysqli_fetch_array($selectpayment2)) {
            $class = $rowpayment2['class'];
        }    
$fetch = mysqli_query($db, "SELECT * FROM payment WHERE payment_year = '$class' AND payment_semester = 'First Semester'");
$fetch2 = mysqli_query($db, "SELECT * FROM payment WHERE payment_year = '$class' AND payment_semester = 'Second Semester'");
?>
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
												<h2>Payment List (ND2) First Semester</h2>
												<p>Welcome <span class="bread-ntd">Student </span></p>
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
                            <h4>Fees</h4>
                            <div class="add-product">
                                <a href="product-edit.html">Add Payment</a>
                            </div>
                              <table>
                                <tr>
                                    <th>Payment Type</th>
                                    <th>Payment Semester</th>
                                    <th>Payment Chioce</th>
                                    <th>Payment Status</th>
                                    <th>Amount</th>
                                </tr>
                                <?php
                                if ($fetch->num_rows>0) {
                                    while ($row=mysqli_fetch_array($fetch)) {
                                        $d1 = $row['payment_type'];
                                        $d2 = $row['payment_amount'];
                                        $d3 = $row['payment_status'];
                                        $d4 = $row['payment_semester'];
                                        $id = $row['id'];
                                    ?>
                                <tr>
                                    <td><?php echo $d1 ?></td>
                                     <td>
                                    <button class="pd-setting" disabled="" style="background:rgb(66, 5, 5);"><?php echo $d4?></button>
                                    </td>  
                                    <td>
                                        <button class="pd-setting"  disabled=""><?php echo $d3 ?></button>
                                    </td>
                                     <td>
                                            <button type="button" data-toggle="modal" data-target="#EditModal<?php echo $id ?>" class="btn btn-custon-rounded-two btn-success" title="Click here Pay Now!">Not Paid</button>
                                    </td>
                                    <td>#<?php echo $d2 ?>.00</td>
                                </tr>
                    <div class="modal fade" id="EditModal<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                     <form method="POST" action="edit.php">
                             <input type="hidden" name="idupdate" value="<?php echo $id ?>">
                          <div class="modal-body">
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Payment Type:</label>
                                <input type="text" value="<?php echo $d1 ?>" name="payment_type" class="form-control" id="recipient-name">
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Amount:</label>
                                <input type="number" value="<?php echo $d2 ?>" name="payment_amount" class="form-control" id="recipient-name">
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Status:</label>
                              <!--  <select name="payment_status" class="form-control">
                                   <option value="Compulsory" <?php if($c=="Compulsory") echo 'selected="selected"'; ?>>Compulsory
                                   </option>
                                   <option value="Not Compulsory" <?php if($c=="Not Compulsory") echo 'selected="selected"'; ?>>Not Compulsory</option>
                               </select> -->
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form >
                                            <script src="https://js.paystack.co/v1/inline.js"></script>
                                            <button type="button" onclick="payWithPaystack()" class="btn btn-custon-rounded-two btn-success" data-toggle="tooltip" data-placement="left" title="Click here Pay Now!">Not Paid</button>
                                        </form>
                            <button type="submit" class="btn btn-success">Update Payment</button>
                          </div>                      
                     </form>
                    </div>
                  </div>
                </div>
                                <?php
                            }
                                    # code...
                                }?>
                            </table>
                        </div>
                      <!--   <a button href="product-payment.html" class="btn btn-custon-rounded-two btn-success"><i aria-hidden="true"></i> Proceed To Payment</button> </a>
                        <a button href="#" class="btn btn-custon-rounded-two btn-warning"><i aria-hidden="true"></i> Print</button> </a>
 -->
                    </div>
                </div>
            </div>
            <hr>
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
												<h2>Payment List (ND2) Second Semester</h2>
												<p>Welcome <span class="bread-ntd">Student </span></p>
											</div>
										</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
											<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
										</div>
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
                            <h4>Fees</h4>
                            <div class="add-product">
                                <a href="product-edit.html">Add Payment</a>
                            </div>
                            <table>
                                <tr>
                                    <th>Payment Type</th>
                                    <th>Payment Semester</th>
                                    <th>Payment Chioce</th>
                                    <th>Payment Status</th>
                                    <th>Amount</th>
                                </tr>
                                <?php
                                if ($fetch2->num_rows>0) {
                                    while ($row=mysqli_fetch_array($fetch2)) {
                                        $e1 = $row['payment_type'];
                                        $e2 = $row['payment_amount'];
                                        $e3 = $row['payment_status'];
                                        $e4 = $row['payment_semester'];
                                    ?>
                                <tr>
                                    <td><?php echo $e1 ?></td>
                                     <td>
                                    <button class="pd-setting" disabled="" style="background:rgb(66, 5, 5);"><?php echo $e4?></button>
                                    </td>  
                                    <td>
                                        <button class="pd-setting"  disabled=""><?php echo $e3 ?></button>
                                    </td>
                                     <td>
                                         <form >
                                            <script src="https://js.paystack.co/v1/inline.js"></script>
                                            <button type="button" onclick="payWithPaystack()" class="btn btn-custon-rounded-two btn-success" data-toggle="tooltip" data-placement="left" title="Click here Pay Now!">Not Paid</button>
                                        </form>
                                    </td>
                                    <td>#<?php echo $e2 ?>.00</td>
                                </tr>
                                <?php
                            }
                                    # code...
                                }?>
                            </table>
                        </div>
                       <!--  <a><button href="product-payment.html" class="btn btn-custon-rounded-two btn-success"><i aria-hidden="true"></i> Proceed To Payment</button> </a>
                        <a><button href="#" class="btn btn-custon-rounded-two btn-warning"><i aria-hidden="true"></i> Print</button> </a> -->
                    </div>
                </div>
            </div>
        </div>
        <?php require 'footer.php';?>

<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_93253e4094828ef15dfd864b9decb3dfceb75a8f',
      email: '<?php echo 'fait@gmail.com'?>',
      amount: '<?php echo $b2 ?>000',
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
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>
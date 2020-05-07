<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'project');
if (!isset($_SESSION['matric'])) {
  header("location:logout.php");
  # code...
}
$fetch00 = mysqli_query($db, "SELECT * FROM payment_details WHERE payer_matric = '".$_SESSION['matric']."' ");
 require 'menu.php';
        require 'top_nav.php';?>    
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
												<h2>All Payment History</h2>
												<p>Welcome <span class="bread-ntd">Student</span></p>
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
                            <table>
                                    
                                <tr>
                                    <th>Payment Type</th>
                                    <th>Payment ID</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Semester</th>
                                    <th>Date</th>
                                </tr>
                                 <?php
                                if ($fetch00->num_rows>0) {
                                    while ($row00=mysqli_fetch_array($fetch00)) {
                                        $b100 = $row00['payment_type'];
                                        $b200 = $row00['payment_amount'];
                                        $b300 = $row00['payment_status'];
                                        $b400 = $row00['payment_semester'];
                                        $b500 = $row00['date_paid'];
                                        $id = $row00['payment_id'];

                                    ?>
                                <tr>
                                    <!-- <td>
                                        <button class="pd-setting">Compulsory</button>
                                    </td>  -->                                   
                                    <td style="text-transform: uppercase;"><?php echo $b100; ?></td>
                                    <td><?php echo $id; ?></td>
                                    <td><button disabled="" class="pd-setting"><?php echo $b300; ?></button></td>
                                    <td>#<?php echo $b200; ?>.00</td>
                                    <td><?php echo $b400; ?></td>
                                    <td><?php echo $b500; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                            </table>
                        </div>
                       <!--  <a><button href="product-payment.html" class="btn btn-custon-rounded-two btn-success"><i aria-hidden="true"></i> Proceed To Payment</button> </a>
                        <a><button href="#" class="btn btn-custon-rounded-two btn-warning"><i aria-hidden="true"></i> Print</button> </a> -->
                    </div>
                </div>
            </div>
        </div>
      <?php require 'footer.php';?>
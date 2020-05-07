<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'project');
if (!isset($_SESSION['matric'])) {
  header("location:logout.php");
  # code...
} require 'menu.php';
 require 'top_nav.php';
$fetch = mysqli_query($db, "SELECT * FROM payment WHERE payment_year =  'ND I' AND payment_semester = 'First Semester'");
$fetch2 = mysqli_query($db, "SELECT * FROM payment WHERE payment_year =  'ND I' AND payment_semester = 'Second Semester' ");


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
												<h2>Payment List For ND I</h2>
												<p>Welcome <span class="bread-ntd">Admin </span></p>
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
                                
                            </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Fees</h4>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <ul id="myTab" class="tab-review-design">
                                        <li class="active"><a href="#description">first semester</a></li>
                                         <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                         &nbsp&nbsp&nbsp&nbsp&nbsp
                                       
                                        <li><a href="#INFORMATION">second semester</a></li>
                                          <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div class="product-tab-list product-details-ect tab-pane fade active in" id="description">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="review-content-section">
                                                       <table>                                    
                                                            <tr>                                   
                                                                <th>Payment Type</th>
                                                                <th>Status</th>
                                                                <th>Semester</th>
                                                                <th>Amount</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <?php 
                                                            if ($fetch->num_rows>0){
                                                            while($row=$fetch->fetch_assoc()){
                                                                $id = $row['id'];
                                                                ?>
                                                            <tr>                                    
                                                                <td style="color:white;"><?php echo $row['payment_type']?></td>
                                                                <td>
                                                                    <button disabled="" class="pd-setting style="><?php echo $row['payment_status']?></button>
                                                                </td>
                                                                <td>
                                                                    <button disabled="" class="pd-setting" style="background:rgb(66, 5, 5);"><?php echo $row['payment_semester']?></button>
                                                                    </td>
                                                                <td style="color:white;">#<?php echo $row['payment_amount']?>.00</td>
                                                                <td style="color:white;">
                                                                    <button href="#" data-toggle="modal" data-target="#EditModal<?php echo $id ?>" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                                    <button href="#" data-toggle="modal" data-target="#DeleteModal<?php echo $id ?>" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                                </td>
                                                            </tr>



            <!--Delete modal-->

                  <div class="modal" id="DeleteModal<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="width: 350px">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Warning?</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">Are you sure you want to delete?</div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                          <a class="btn btn-danger" href="delete.php?id=<?php echo $id ?>">Yes</a>
                        </div>
                      </div>
                    </div>
                  </div>

                <!--Add payment modal -->
                <?php
                $fetchsaved = mysqli_query($db, "SELECT * FROM payment where id = '$id' ");
                while ($row2=mysqli_fetch_array($fetchsaved)) {
                  $a = $row2['payment_type'];
                  $b = $row2['payment_amount'];
                  $c = $row2['payment_status'];
               
                ?>
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
                                <input type="text" value="<?php echo $a ?>" name="payment_type" class="form-control" id="recipient-name">
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Amount:</label>
                                <input type="number" value="<?php echo $b ?>" name="payment_amount" class="form-control" id="recipient-name">
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Status:</label>
                               <select name="payment_status" class="form-control">
                                   <option value="Compulsory" <?php if($c=="Compulsory") echo 'selected="selected"'; ?>>Compulsory
                                   </option>
                                   <option value="Not Compulsory" <?php if($c=="Not Compulsory") echo 'selected="selected"'; ?>>Not Compulsory</option>
                               </select>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Update Payment</button>
                          </div>                      
                     </form>
                    </div>
                  </div>
                </div>
            <?php  } ?>
                <!--End Add payment modal -->
                                                                    <?php    # code...
                                                                }
                                                                # code...
                                                            }?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="review-content-section">
                                                        <table>                                    
                                                            <tr>                                  
                                                                <th>Payment Type</th>
                                                                <th>Status</th>
                                                                <th>Semester</th>
                                                                <th>Amount</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <?php 

                                                            if ($fetch2->num_rows>0){
                                                            while($rows=$fetch2->fetch_assoc()){
                                                                $id = $rows['id'];
                                                                ?>
                                                            <tr>                                    
                                                                <td><?php echo $rows['payment_type']?></td>
                                                                <td>
                                                                    <button disabled="" class="pd-setting"><?php echo $rows['payment_status']?></button>
                                                                </td>
                                                                <td>
                                                                    <button disabled="" class="pd-setting" style="background:rgb(66, 5, 5);"><?php echo $rows['payment_semester']?></button>
                                                                    </td>                                                          
                                                                <td>#<?php echo $rows['payment_amount']?>.00</td>
                                                                <td>
                                                                    <button href="#" data-toggle="modal" data-target="#EditModal2<?php echo $id ?>"  title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                                    <button href="#" data-toggle="modal" data-target="#DeleteModal2<?php echo $id ?>" data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                                </td>
                                                            </tr>
                <!--Delete modal-->
                  <div class="modal" id="DeleteModal2<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="width: 350px">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Warning?</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">Are you sure you want to delete?</div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                          <a class="btn btn-danger" href="delete.php?id=<?php echo $id ?>">Yes</a>
                        </div>
                      </div>
                    </div>
                  </div>

                <!--Add payment modal -->
                <?php
                $fetchsaved = mysqli_query($db, "SELECT * FROM payment where id = '$id' ");
                while ($row2=mysqli_fetch_array($fetchsaved)) {
                  $a = $row2['payment_type'];
                  $b = $row2['payment_amount'];
                  $c = $row2['payment_status'];
               
                ?>
                 <div class="modal fade" id="EditModal2<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="text" value="<?php echo $a ?>" name="payment_type" class="form-control" id="recipient-name">
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Amount:</label>
                                <input type="number" value="<?php echo $b ?>" name="payment_amount" class="form-control" id="recipient-name">
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Status:</label>
                               <select name="payment_status" class="form-control">
                                   <option value="Compulsory" <?php if($c=="Compulsory") echo 'selected="selected"'; ?>>Compulsory
                                   </option>
                                   <option value="Not Compulsory" <?php if($c=="Not Compulsory") echo 'selected="selected"'; ?>>Not Compulsory</option>
                               </select>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Update Payment</button>
                          </div>                      
                     </form>
                    </div>
                  </div>
                </div>
            <?php  } ?>
                <!--End Add payment modal -->
                                                            <?php    # code...
                                                                }
                                                                # code...
                                                            }?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <table>
                              
                            </table>

                        </div>                        
                        <!-- <a><button href="#" class="btn btn-custon-rounded-two btn-warning"><i aria-hidden="true"></i> Print</button> </a> -->
                    </div>
                </div>
            </div>
            <hr>
        </div>

       
<?php require 'footer.php';?>
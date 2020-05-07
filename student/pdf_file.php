<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'project');
if (!isset($_SESSION['matric'])) {
  header("location:logout.php");
  # code...
}
$selectadmin = mysqli_query($db, "SELECT * FROM user WHERE matric = '".$_SESSION['matric']."' ");
 while ($row3=mysqli_fetch_array($selectadmin)) {
    $first_name = $row3['first_name'];
    $class = $row3['class'];
    }

$fetch = mysqli_query($db, "SELECT * FROM upload where class = '$class  '");
 require 'menu.php';
 require 'top_nav.php';
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
                                                <h2>PDF Files for &nbsp<?php echo $class ?>&nbsp</h2>
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
                            <h4>PDFs</h4>
                            <!-- <div class="add-product">
                                <a href="product-edit.html">Add Payment</a>
                            </div> -->
                            <table>
                                <tr>
                                    <th>File Description</th>
                                    <th>Date Upload</th>
                                    <th>Download</th>
                                </tr>
                                <?php
                                 if ($fetch->num_rows>0){
                                    while($row=$fetch->fetch_assoc()){
                                        $a1 = $row['class'];
                                        $a2 = $row['pdf'];
                                        $a4 = $row['date_reg'];
                                        $a3 = $row['file_name'];
                                        ?>
                                <tr>
                                    <td><?php echo $a3 ?></td>
                                    <td><?php echo $a4 ?></td>
                                    <td><a target="_blank" href="<?php echo '../admin/upload_pdf/'.$a2?>"><button data-toggle="tooltip" data-placement="left" class="btn btn-custon-rounded-two btn-success" title="Click here to Download!" style="color: #fff">Download</button></a></td>
                                 <!--     <td>
                                    <button class="pd-setting" disabled="" style="background:rgb(66, 5, 5);"><?php echo $b4?></button>
                                    </td>  
                                    <td>
                                        <button class="pd-setting"  disabled=""><?php echo $b3 ?></button>
                                    </td>
                                     <td>
                                        <?php
                                        $paid = mysqli_query($db, "SELECT * FROM payment_details WHERE payment_idd = '$id' ");
                                        $paid2 = mysqli_fetch_array($paid);
                                        $pd = $paid2['payment_id'];
                                        if (!empty($pd)) {?>
                                            <button disabled="" data-toggle="tooltip" data-placement="left" class="btn btn-custon-rounded-two btn-success" title="Click here Pay Now!" style="color: #fff">Paid</button>
                                        <?php
                                    }else{?>
                                            <button data-toggle="tooltip" data-placement="left" class="btn btn-custon-rounded-two btn-danger" title="Click here Pay Now!" style="background-color: rgba(186, 13, 13, 0.99)"><a <?php echo "href='ref3.php?id=$id&email=$email'"?> style="color: #fff">Not Paid</a></button>
                               <?php }?>
                                    </td>
                                    <td>#<?php echo $b2 ?>.00</td>                                     -->
                                </tr> 
                   
                                <?php
                            }
                                    # code...
                                }
                                ?>
                            </table>
                       </div>
                      <!--  <form >
                        <script src="https://js.paystack.co/v1/inline.js"></script>
                              <button type="button" onclick="payWithPaystack()"> Pay </button> 
                        <br>
                        <button type="button" onclick="payWithPaystack()" class="btn btn-custon-rounded-two btn-success"><i aria-hidden="true"></i> Proceed To Payment9</button>
                        </form>
                        <button href="#" class="btn btn-custon-rounded-two btn-warning"><i aria-hidden="true"></i> Print</button>
                         -->
                    </div>
                </div>
            </div>

        </div>
      
<?php require 'footer.php';?>
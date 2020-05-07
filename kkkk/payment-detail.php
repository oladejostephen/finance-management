<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'project');
if (!isset($_SESSION['matric'])) {
  header("location:logout.php");
  # code...
}
$fetch000 = mysqli_query($db, "SELECT * FROM payment_details ");
 require 'menu.php';
 require 'top_nav.php';?>

 <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<style type="text/css">
    #de{
        background: #152036;
    }
    #de{
        background: #152036;
    }
    label{
        color: #fff;
    }
    label select option{

       color: #fff;
    }
    input{
        color: #152036;
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
												<h2>Payment Details</h2>
												<p>Welcome <span class="bread-ntd">Admin</span></p>
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


                    <!-- <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">  -->  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>  

<h4>List Of all Payment Made</h4>
<body style="margin:20px auto">  

<table id="myTable" class="table table-striped" style="width: 100%; background: #152036;">  
        <thead>  
          <tr id="de">  
             <th>Payer Name</th>
                <th>Payer Matric</th>
                <th>Payer ID</th>
                <th>Payment Type</th>
                <th>Status</th>
                <th>Amount</th>
                <th>Semester</th>
                <th>Date</th>  
          </tr>  
        </thead>  
        <tbody id="de">
        <?php
            if ($fetch000->num_rows>0) {
                while ($row000=mysqli_fetch_array($fetch000)) {
                    $bd = $row000['payment_type'];
                    $bs = $row000['payer_name'];
                    $ba = $row000['payer_matric'];
                    $bz = $row000['payment_amount'];
                    $bx = $row000['payer_email'];
                    $bv = $row000['payment_status'];
                    $bn = $row000['payment_semester'];
                    $bm = $row000['date_paid'];
                    $id = $row000['payment_id'];

                    ?> 
          <tr id="de">  
                <td id="de" style="text-transform: uppercase;color: white"><?php echo $bs ?></td>
                <td id="de" style="text-transform: uppercase;color: white"><?php echo $ba ?></td>
                <td id="de"style="color: white"><?php echo $id ?></td>
                <td id="de" style="text-transform: uppercase;color: white"><?php echo $bd ?></td>
                <td id="de"><button disabled="" data-toggle="tooltip" data-placement="left" class="btn btn-custon-rounded-two btn-success" title="Click here Pay Now!" style="color: #fff"><?php echo $bv ?></button></td>
                <td id="de"style="color: white">#<?php echo $bz ?>.00</td>
                <td id="de"style="color: white"><?php echo $bn ?></td>
                <td id="de"style="color: white"><?php echo $bm ?></td>
          </tr>
           <?php
                            }
                        }
                        ?>   
        </tbody>  
      </table> 
</body>  
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
                </div>
               <!--  <a><button href="product-payment.html" class="btn btn-custon-rounded-two btn-success"><i aria-hidden="true"></i> Proceed To Payment</button> </a>
                <a><button href="#" class="btn btn-custon-rounded-two btn-warning"><i aria-hidden="true"></i> Print</button> </a> -->
            </div>
        </div>
    </div>
</div>
<!--  -->
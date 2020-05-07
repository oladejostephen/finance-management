<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'project');
if (!isset($_SESSION['matric'])) {
  header("location:logout.php");
  # code...
}
$fetch000 = mysqli_query($db, "SELECT * FROM user  WHERE role = 'student'");
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
												<h2>All Student</h2>
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

<h4>List Of all Student Registered</h4>
<body style="margin:20px auto">  

<table id="myTable" class="table table-striped" style="width: 100%; background: #152036;">  
        <thead>  
          <tr id="de">  
             <th>Name</th>
                <th>Matric Number</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Class</th>
                <th>Date Reg</th>
               <!--  <th>Date</th>   -->
          </tr>  
        </thead>  
        <tbody id="de">
        <?php
            if ($fetch000->num_rows>0) {
                while ($row000=mysqli_fetch_array($fetch000)) {
                    $bd = $row000['matric'];
                    $bs = $row000['first_name'];
                    $ba = $row000['last_name'];
                    $bz = $row000['email'];
                    $bx = $row000['phone_number'];
                    $bv = $row000['sex'];
                    $bn = $row000['class'];
                    $bm = $row000['date_reg'];

                    ?> 
          <tr id="de">

                <td id="de" style="text-transform: uppercase; color: white;"><?php echo $bs ."\x20\x20\x20". $ba ?></td>
                <td id="de" style="text-transform: uppercase; color: white;"><?php echo $bd ?></td>
                <!-- <td id="de"><?php echo $id ?></td> -->
                <td id="de" style="text-transform: uppercase; color: white;"><?php echo $bz ?></td>
                <td id="de" style="text-transform: uppercase; color: white;"><?php echo $bx ?></td>
                <td id="de" style="text-transform: uppercase; color: white;"><?php echo $bv ?></td>
                <td id="de" style="text-transform: uppercase; color: white;"><?php echo $bn ?></td>
                <td id="de"style="color: white;" ><?php echo $bm ?></td>
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
<?php
session_start();
// error_reporting(0);
$successmgs = $successmgs2 = "";
$search = "";
$db = mysqli_connect('localhost', 'root', '', 'project');
if (!isset($_SESSION['matric'])) {
  header("location:logout.php");
  # code...
} require 'menu.php';
 require 'top_nav.php';
$errors = array();
$fetch = mysqli_query($db, "SELECT * FROM upload ");
if(isset($_POST['upload'])){
  $class = mysqli_real_escape_string($db, $_POST['class']);
  $file_name = mysqli_real_escape_string($db, $_POST['file_name']);
  $pdf = $_FILES['pdf']['name'];
  $date_reg = date('l\, F jS\, Y  H:i:s a');
  $target = "upload_pdf/".basename($pdf);

  if(($_FILES["pdf"]["type"] == "application/pdf")){    
    $insert = mysqli_query($db, "INSERT INTO upload(class, file_name, pdf, date_reg)  VALUES('$class', '$file_name', '$pdf', '$date_reg')");
    move_uploaded_file($_FILES['pdf']['tmp_name'], $target);
    // die(mysqli_error($db));
    if ($insert) {
      $successmgs = "File Successfully Uploaded";
    }else{      
    die(mysqli_error($db));
    }
  }else{
    array_push($errors, "Doesn't surpport file format");
  }

}


 ?>
<style type="text/css">
    #de{
        background: #152036;
    }
    #de{
        background: #152036;
    }
    th{
      color: #fff;
    }
    #rv{
      background: #152036;
    }
    tr td{
      color: #fff;
    }
</style>
    <style type="text/css">
      .success{
        font-size: 20px;
        font-family: cursive;
        color: green;
      }
      label{
        color: white;
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
												<h2>Promote Student</h2>
												<p>Welcome <span class="bread-ntd"><?php echo $_SESSION['first_name'];?></span></p>
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
        <!-- Single pro tab start-->
        <div class="single-product-tab-area mg-b-30">
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Search for Student to promote with Matric Number</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                      <div class="row">
                                        <div class="col-12 col-lg-12">
                                         <form method="POST" action="upload_pdf.php" enctype="multipart/form-data">
                                            <div class="row">
                                                <?php require 'errors.php';?>
                                                <div class="text-center">
                                                  <span class="success"><?php echo $successmgs ?></span>
                                                  <span class="success"><?php echo $successmgs2 ?></span>
                                                  </div>
                                                    <div class="review-content-section">          
                                                        <label>Select PDF To Upload</label>
                                                       <div class="input-group mg-b-pro-edt">
                                                          <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                            <input type="file" name="pdf" required="" class="form-control">
                                                        </div>  
                                                        <label>File Name</label>
                                                       <div class="input-group mg-b-pro-edt">
                                                          <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                            <input type="text" name="file_name" required="" class="form-control" placeholder="Enter File Name">
                                                        </div>    
                                                        <label>Select Class</label>
                                                        <div class="input-group mg-b-pro-edt">
                                                          <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                           <select name="class" class="form-control">
                                                             <option value="ND I">ND I</option>
                                                             <option value="ND II">ND II</option>
                                                           </select>
                                                        </div>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="text-center custom-pro-edt-ds">
                                                        <button type="submit" name="upload" class="btn btn-ctl-bt btn-lg waves-effect waves-light m-r-10">Upload
                                                        </button>
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
                                    <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>List Of PDF Uploaded</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                      <div class="row">
                                        <div class="col-12 col-lg-12">
                                          <div class="review-content-section">
                                        <table class="table table-striped">
                                                <tr id="de">
                                                    <th>PDF Name</th>
                                                    <th>Class</th>
                                                    <th>Date Uploaded</th>
                                                </tr>
                                                 <?php 
                                                    if ($fetch->num_rows>0){
                                                    while($row=$fetch->fetch_assoc()){
                                                        $a1 = $row['class'];
                                                        $a2 = $row['file_name'];
                                                        $a3 = $row['date_reg'];
                                                        ?>
                                                <tr>
                                                    <td id="rv"><?php echo $a2; ?></td>
                                                    <td id="rv"><?php echo $a1 ?></td>
                                                    <td id="rv"><?php echo $a3 ?></td>                                
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

<?php require 'footer.php';?>
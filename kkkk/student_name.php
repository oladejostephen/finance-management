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
$fetch = mysqli_query($db, "SELECT * FROM user ");
$errors = array();

if (isset($_POST['save'])) {
  // receive all input values from the form
  $search = mysqli_real_escape_string($db, $_POST['search']);

 if (empty($search)) {
    array_push($errors, "Enter a Matric Number");
  }

  if (count($errors) == 0) {
    $query = "SELECT * FROM user WHERE matric='$search' ";
    $results = mysqli_query($db, $query);
    $re = mysqli_num_rows($results);

    if (mysqli_num_rows($results) == 1) {
       while($rows=$results->fetch_assoc()){
        array_push($errors, $successmgs);
        $successmgs = "Record found";
      }
         }else{
            array_push($errors, "Record not found");
     }
}
}

$fetchdata = mysqli_query($db, "SELECT * FROM user WHERE matric = '$search' ");


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
												<h2>Edit Student Name</h2>
												<p>Welcome <span class="bread-ntd"><?php echo $_SESSION['first_name'];?></span></p>
											</div>
										</div>
                                    </div>
                                    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
											<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
										</div> -->
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
                                    <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Search for Student with Matric Number</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                      <div class="row">
                                        <div class="col-12 col-md-8">
                                         <form method="POST" action="student_name.php">
                                            <div class="row">
                                                <?php require 'errors.php';?>
                                                <div class="text-center">
                                                  <span class="success"><?php echo $successmgs ?></span>
                                                  <span class="success"><?php echo $successmgs2 ?></span>
                                                  </div>
                                                    <div class="review-content-section">
                                                        <div class="input-group mg-b-pro-edt">
                                                          <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                            <input type="text" name="search" class="form-control" placeholder="Input Matric Number">
                                                        </div>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="text-center custom-pro-edt-ds">
                                                        <button type="submit" name="save" class="btn btn-ctl-bt btn-lg waves-effect waves-light m-r-10">Search
                                                        </button>
                                                      </div>
                                                  </div>
                                         </form>
                                        </div>
                                        <div class="col-6 col-md-4">
                                          <div class="row">
                                            <?php
                                            if (mysqli_num_rows($fetchdata) == 1) {
                                                  while($data=$fetchdata->fetch_assoc()){
                                                    $stumatric = $data['matric'];
                                                    $stufname = $data['first_name'];
                                                    $stulname = $data['last_name'];
                                                    $stugender = $data['sex'];
                                                    $stuemail = $data['email'];
                                                    $stupics = $data['pdf'];
                                                    ?>
                                                    <form method="POST" action="update.php">
                                                    <div class="profile-dtl">
                                                      <a href="#"><img src="../pdf/<?php echo $stupics ?>" alt="<?php echo $pics ?>" /></a>
                                                      <h2><span class="min-dtn"></span></h2>
                                                  </div>
                                                    <div class="review-content-section">
                                                        <div class="input-group mg-b-pro-edt">
                                                          <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                          <input type="hidden" name="matric_number" value="<?php echo $stumatric ?>">
                                                            <input disabled="" type="text" name="matric" class="form-control" placeholder="" value="<?php echo $stumatric ?>">
                                                        </div>
                                                      </div>
                                                      <div class="review-content-section">
                                                        <div class="input-group mg-b-pro-edt">
                                                          <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                            <input type="text" name="first_name" class="form-control" placeholder="" value="<?php echo $stufname ?>">
                                                        </div>
                                                      </div>
                                                      <div class="review-content-section">
                                                        <div class="input-group mg-b-pro-edt">
                                                          <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                            <input type="text" name="last_name" class="form-control" placeholder="" value="<?php echo $stulname ?>">
                                                        </div>
                                                      </div>
                                                      <div class="review-content-section">
                                                        <div class="input-group mg-b-pro-edt">
                                                          <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                            <input type="email" name="email" class="form-control" placeholder="" value="<?php echo $stuemail ?>">
                                                        </div>
                                                      </div>
                                                       <div class="input-group mg-b-pro-edt" style="padding-left: 15px; padding-right: 15px">
                                                        <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                       <select required="" name="sex" class="form-control pro-edt-select form-control-primary">
                                                            <option value="male<?php if($stugender=="male") echo '"selected"'; ?>">Male</option>
                                                            <option value="female<?php if($stugender=="female") echo '"selected"'; ?>">Female</option>
                                                        </select>
                                                    </div>
                                                      <div class="row">
                                                    <div class="text-center custom-pro-edt-ds">
                                                        <button type="submit" name="update_data" class="btn btn-ctl-bt btn-lg waves-effect waves-light m-r-10">Update
                                                        </button>
                                                </div>
                                              </form>
                                            </div>
                                            <?php
                                          }
                                        }
                                        ?>
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
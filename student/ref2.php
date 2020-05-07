<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'project');
$get = $_GET['id'];
$get2 = $_GET['email'];
echo $get2;
echo $get;
echo "<br>";
echo $_SESSION['matric'];

$refselect1 = mysqli_query($db, "SELECT * FROM user WHERE matric = '".$_SESSION['matric']."' ");
$fetchselect1 = mysqli_fetch_array($refselect1);
echo $w = $fetchselect1['first_name'];
echo $q = $fetchselect1['last_name'];

$refselect = mysqli_query($db, "SELECT * FROM payment WHERE id = '$get' ");
$fetchselect = mysqli_fetch_array($refselect);
echo $i = $fetchselect['payment_type'];
echo $t = $fetchselect['payment_semester'];
echo $h = $fetchselect['payment_amount'];
echo $j = $fetchselect['payment_year'];
echo $n = $fetchselect['payment_status'];
// $f = $fetchselect['first_name'];
// $l = $fetchselect['last_name'];
// $j = $f.$l;
// echo $j."<br>";
// echo $fetchselect['matric'];
// echo $fetchselect['sex'];
// echo $fetchselect['class'];
// echo $fetchselect['email'];
echo date('l\, jS\, F Y  H:i:s a');
// if (!empty($get)) {
// 	$savepayment = mysqli_query($db, "INSERT INTO payment_details(payment_id, payer_name, payer_matric, payment_type, payment_semester, date_paid, payer_sex, payer_class, payer_email) VALUES()");
// 	// echo "I got it";
// }else{
// 	// echo "I didn't get it";
// }

?>
<form method="POST" action="">
                             <input type="text" name="idupdate" value="<?php echo $get ;?>">
                          <div class="modal-body">
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Payment Type:</label>
                                <input type="text" value="<?php echo $i ?>" name="payment_type" class="form-control" id="recipient-name">
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Amount:</label>
                                <input type="number" value="<?php echo $h ?>" name="payment_amount" class="form-control" id="recipient-name">
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
                            <button type="submit" name="save" class="btn btn-success">Update Payment</button>
                          </div>                      
                     </form>

 <script>
    function payWithPaystack(){
    var handler = PaystackPop.setup({
    key: 'pk_test_93253e4094828ef15dfd864b9decb3dfceb75a8f',
    email: '<?php echo $get2?>',
    amount: '<?php echo $h?>',
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
      window.location.href = 'ref.php?ref=' + response.reference;

    },
    onClose: function(){
      alert('window closed');
    }
    });
    handler.openIframe();
    }
    </script> 
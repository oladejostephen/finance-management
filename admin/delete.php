 <?php
$db = mysqli_connect('localhost', 'root', '', 'project');
 		$id = $_GET['id'];
        $delete = mysqli_query($db, "DELETE FROM payment where id = $id");
        if ($delete) {
        	header('location:'.$_SERVER['HTTP_REFERER']);
        	# code...
        }else{
        	echo "Please try again" .$db->error;
        }
        ?>
 <?php
    session_start();
    if($_SESSION['matric']){ // Destroying All Sessions
    unset($_SESSION["matric"]);
    session_destroy();
    header("Location: ../index.php"); // Redirecting To Home Page
    }else{
    	header("Location: ../index.php");
    }
    ?>
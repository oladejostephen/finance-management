<?php
$db = mysqli_connect('localhost', 'root', '', 'project');
$selectpics = mysqli_query($db, "SELECT * FROM user WHERE matric = '".$_SESSION['matric']."' ");
 while ($row3=mysqli_fetch_array($selectpics)) {
    $pics = $row3['pdf'];
    }
?>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard V.1 | Nalika - Material Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- nalika Icon CSS
        ============================================ -->
    <link rel="stylesheet" href="css/nalika-icon.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
            <a href="dashboard.php"><img class="main-logo" width="210" height="210" src="../img/lago.png" alt="" /></a>
                <!-- <strong><img src="img/logo/logosn.png" alt="" /></strong> -->
            </div>
            <div class="nalika-profile">
                <div class="profile-dtl">
                    <a href="#"><img src="../pdf/<?php echo $pics ?>" alt="<?php echo $pics ?>  " /></a>
                    <h2><?php echo $_SESSION['first_name']; ?><span class="min-dtn"></span></h2>
                </div>
                <div class="profile-social-dtl">
                </div>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="has-arrow" href="index.php">
                                <i class="fa big-icon fa-money icon-wrap"></i>
                                   <span class="mini-click-non">Payment</span>
                                </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard" href="dashboard.php"><span class="mini-sub-pro">Dashboard</span></a></li>
                                <li><a title="Payment List" href="payment-list(ND1).php"><span class="mini-sub-pro">My Payment</span></a></li>
                                <!-- <li><a title="Payment List" href="payment-list(ND2).php"><span class="mini-sub-pro">Payment List (ND2)</span></a></li> -->
                                
                                <li><a title="Payment Detail" href="payment-detail.php"><span class="mini-sub-pro">Payment History</span></a></li>
                                <li><a title="Payment Detail" href="pdf_file.php"><span class="mini-sub-pro">PDF File</span></a></li>
                                 <li><a title="Logout" href="logout.php"><span class="mini-sub-pro">Logout</span></a></li>
                            </ul>
                        </li>
                        <li>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
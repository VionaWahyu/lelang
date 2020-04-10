
<?php if(!isset($_SESSION["pelanggan"]) ) {
        echo "
        <script>
            alert('Login dahulu!');
            document.location.href = '../login.php';
        </script>";
} 
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Toko Buku</title>

        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
        <!-- Retina iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
        <!-- Retina iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
        <!-- Standard iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
        <!-- Standard iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

        <!-- Styles -->
        <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
        <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
        <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
        <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
        <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

        <link href="assets/css/lib/helper.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
    </head>

    <body>

        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                    <div class="logo"><a href="index.html"><!-- <img src="assets/images/logo.png" alt="" /> --><span>Toko Buku</span></a></div>
                    <ul>
                        
                    <li><a href="app-email.html"><i class="ti-home"></i> Dashboard</a></li>

                    <li><a class="sidebar-sub-toggle"><i class="ti-book"></i>  Buku  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="romance.php">Romance</a></li>
                            <li><a href="horor.php">Horror</a></li>
                        </ul>
                    </li>

                    <li><a href="pemesan.php"><i class="ti-user"></i> Pemesan</a></li>
                    
                    </ul>
                </div>
            </div>
        </div>
        <!-- /# sidebar -->

         <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-right">
                            <ul>
                                <li class="header-icon dib"><span class="user-avatar"><?php echo $_SESSION["pelanggan"]["username"]; ?> <i class="ti-angle-down f-s-10"></i></span>
                                    <div class="drop-down dropdown-profile">
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li><a href="../logout.php"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
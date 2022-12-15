<?php
session_start();
if (!isset($_SESSION['login'])) {

?>
    <script>
        alert("SILAHKAN LOGIN!");
        window.open('login.php', '_self');
    </script>
<?php
} else {
    $status = $_SESSION['hak_akses'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Administrasi PPDB</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.php" class="site_title"><i class="fa fa-tachometer" aria-hidden="true"></i> <span>SIA PPDB</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="images/apple-touch-icon.png" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <?php
                            include 'koneksi/koneksi.php';
                            $sql_user = mysqli_query($conn, "SELECT * FROM user WHERE hak_akses = '$status' AND id_user='$_SESSION[id_user];'");
                            $data_user = mysqli_fetch_assoc($sql_user);
                            ?>
                            <span>Welcome,</span>
                            <h2><?php echo strtoupper($data_user['hak_akses']); ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="index.php"><i class="fa fa-home"></i> Home</a>
                                </li>
                                <?php if ($status == 'admin') { ?>
                                    <li><a><i class="fa fa-edit"></i> Master <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="data_agama.php">Agama</a></li>
                                            <li><a href="data_negara.php">Kewarganegaraan</a></li>
                                            <li><a href="data_jurusan.php">Jurusan</a></li>
                                            <li><a href="data_jenjang.php">Jenjang</a></li>
                                        </ul>
                                    </li>
                                <?php } ?>
                                <li><a href="form_pendaftaran.php"><i class="fa fa-desktop"></i>Pendaftaran</a>
                                </li>
                                <li><a href="data_pendaftaran.php"><i class="fa fa-bar-chart-o"></i> Data Pendaftaran</a>
                                </li>
                            </ul>
                        </div>
                        <?php
                        if ($status == 'admin') {
                        ?>
                            <div class="menu_section">
                                <h3>Setting User</h3>
                                <ul class="nav side-menu">
                                    <li><a href="registrasi.php"><i class="fa fa-user-plus"></i>Registrasi User</a>
                                    </li>
                                    <li><a href="data_user.php"><i class="fa fa-users"></i>Data User</a>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li><a onclick="return confirm('Yakin Ingin Log Out');" href="logout.php"><i class="fa fa-sign-out"></i>Log Out</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->


                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/img.jpg" alt=""> Halo, <?= strtoupper($data_user['nama']); ?>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" onclick="return confirm('Yakin Ingin Log Out');" href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </li>

                            <!--  -->
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
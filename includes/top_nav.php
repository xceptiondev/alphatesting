<?php
session_start();
include "my_conn.php";

if(!isset($_SESSION['stfid'])) {?>
<script>
window.location = "index.php";
</script>
<?php
exit;
}

//Session from login
$stf_id = $_SESSION["stfid"];
$stfcat = $_SESSION["stfcat"];
$session_id = $_SESSION["sess_id"];

//Check registration
    $query = "SELECT * FROM stf_reg JOIN off_lst ON stf_reg.stf_off = off_lst.off_lst_id where stf_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $stf_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $stf_fname = $row['stf_fname']." ".$row['stf_oname']." ".$row['stf_lname']; //$stfname before
    $stf_desig = $row['stf_desgn'];
    $stf_off = $row['off_nm'];
    $stf_off_id = $row['off_lst_id'];
    $stf_email = $row ['stf_email'];
    //Start sessions
    $_SESSION["stfname"] = $stf_fname;
    $_SESSION["stfdesig"] = $stf_desig;
    $_SESSION["stfoffice"] = $stf_off;
    $_SESSION["stfoffid"] = $stf_off_id;
    $_SESSION["stfemail"] = $stf_email;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>NOUN Quality Management System</title>
    <link href="assets/vendor/css/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="assets/vendor/js/all.js" crossorigin="anonymous"></script>
    <!-- Sweet Alert Scripts -->
    <script type="text/javascript" src="assets/vendor/swal/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/vendor/swal/dist/sweetalert2.all.min.css">
</head>
<body class="sb-nav-fixed">
<!-- Top Nav -->
<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
<!-- Sidebar Toggle-->
<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#"><img src="assets/img/QA_logo.png" width="131" height="80" alt="NOUN Quality Management System"/><span class="d-none d-lg-inline site_logo_text">NOUN Quality Management System</span> </a>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
                </div>
            </form>
            <!-- User Information-->
           <b> <?php
            echo strtoupper($stf_fname);
            ?></b>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="r_password.php">Change Password</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="stflogout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
<!-- End Top Nav -->

<?php
// <!-- Top Nav Bar -->
include "includes/top_nav.php";
// <!-- Site bar -->
include "includes/sidebar.php";
?>
 <!-- Body content-->
<div id="layoutSidenav_content">
<main>
<div class="container-fluid mt-4">
        <div class="breadcrumb-item active"><h6>Office: <?php echo $stf_off?></h6></div>
        <h2>DMIS SAdmin</h2><div>
<div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">ADMINS</h5>
                    <?php
                        $query = "SELECT COUNT(usr_grp) as count FROM usr_acc where usr_grp = 1 or 2 or 3 or 4";
                        $stmt = mysqli_prepare($conn, $query);
                        //mysqli_stmt_bind_param($stmt, "s", $stfid);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $admcnt = $row["count"];
                    ?>
                    <p style="font-size: 36px; font-weight: 300;"><?php echo $admcnt; ?></p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">ACTIVE USERS</h5>
                    <?php
                        $query = "SELECT COUNT(acc_stat) as count FROM usr_acc where acc_stat = 1";
                        $stmt = mysqli_prepare($conn, $query);
                        //mysqli_stmt_bind_param($stmt, "s", $stfid);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $usrscnt = $row["count"];
                    ?>
                    <p style="font-size: 36px; font-weight: 300;"><?php echo $usrscnt; ?></p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">OFFICES</h5>
                    <?php
                        $query = "SELECT COUNT(off_lst_id) as count FROM off_lst";
                        $stmt = mysqli_prepare($conn, $query);
                        //mysqli_stmt_bind_param($stmt, "s", $stfid);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $offcnt = $row["count"];
                    ?>
                    <p style="font-size: 36px; font-weight: 300;"><?php echo $offcnt; ?></p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">SOPs</h5>
                    <?php
                        $query = "SELECT COUNT(DISTINCT off_lst_id) as count FROM off_sop limit 1";
                        $stmt = mysqli_prepare($conn, $query);
                        //mysqli_stmt_bind_param($stmt, "s", $stfid);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $sopcnt = $row["count"];
                    ?>
                    <p style="font-size: 36px; font-weight: 300;"><?php echo $sopcnt; ?></p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Footer -->
<?php
include "footer.php";
?>

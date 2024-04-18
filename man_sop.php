<?php
// <!-- Top Nav Bar -->
include "includes/top_nav.php";
// <!-- Site bar -->
include "includes/sidebar.php";
?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid mt-4">
        <div class="breadcrumb-item active"><h6>Office: <?php echo $stf_off?></h6></div>
        <h2>Manage SOPs</h2><div>
 <!-- Body content-->
 <div class="card mb-4">
  <div class="card-header">
 <div class ="card-body">
<?php
if($stfcat = 1 || 2){?>
<a class="btn btn-primary rounded-pill px-3" href="mngsops1.php">Submit SOPs</a>
<?php
}
?>
</div></div></div>
<div class="card mb-2">
  <div class="card-header">
    <i class="fas fa-table me-1"></i>
        <!-- Card-header -->
        Offices
    </div>
    <div class="card-body">
    
    <?php 
    $query = "SELECT * FROM me_stf_lst AS t1 JOIN off_lst AS t2 ON t1.asn_off = t2.off_lst_id WHERE stf_id= ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $stf_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) <= 0) {?>
        <h4 style="color: red">No Office(s) assigned to <?php echo $stf_fname;?>.</h4>
        <?php
        }else{?>
    <table class="table table-hover">
        <thead>
          <tr><th>#</th>
            <th>Offices Assigned</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php
        $number = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $offnm2 = $row["off_nm"];
        $offid2 = $row["off_lst_id"];
        ?>
        <tbody>
        <tr>
            <td><?php  echo $number; ?></td>
            <td><?php  echo $offnm2; ?></td>
            <td>
        <form action="mngsops.php" method="POST">
            <input name="offnm2" value="<?php echo $offnm2;?>" type="hidden">
            <input name="offid2" value="<?php echo $offid2;?>" type="hidden">
            <button class="btn btn-primary rounded-pill px-3" type="submit" name="upl">Upload</button>
            <a class="btn btn-warning rounded-pill px-3" href="viewsops.php">View</a>
            <!-- <button class="btn btn-warning rounded-pill px-3" type="submit" name="upd">Update</button>
            <button class="btn btn-danger rounded-pill px-3" type="submit" name="del">Delete</button> -->
        </form>
            </td>
            <?php ++$number?></tr>
            <?php
          }
          ?>
        </tbody>
      </table>
</div>
<?php 
    }
    mysqli_close( $conn);
    ?>
  </div>
<!-- Footer -->
<?php
include "footer.php";
?>
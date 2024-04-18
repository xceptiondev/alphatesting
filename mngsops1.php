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
        <h2>SOPs</h2><div>
        <a class="btn btn-primary" href="man_sop.php">Back</a>
 <!-- Body content-->

<div class="card mb-4">
  <div class="card-header">
      <i class="fas fa-table me-1"></i>
        <!-- Card-header -->
        Select Office, Type Activities and Steps
    </div>
    <div class="card-body">
    <!-- select office to upload SOP -->
<form action="upl_sop.php" method="post">
<div class="input-group mb-3">
  <label class="input-group-text"><h6>Offices</h6></label>
    <select class="form-select" name="offid2" required>
    <option value>No Office Selected...</option>
    <?php
    $query = "SELECT * FROM off_lst";
    $stmt = mysqli_prepare($conn, $query);
    //mysqli_stmt_bind_param($stmt, "sss",);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

  if($result) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $offid2 = $row["off_lst_id"];
        $offnm2 = $row["off_nm"];
        ?>
        <option value = "<?php echo $offid2?>">
            <?php echo $offnm2;?>
        </option>
        <?php
        }}
        ?>
  </select>
</div>
<?php
mysqli_close($conn);
?>
<div class="row">
  <div class="col-md-6">
    <div class="mb-3">
  <h6>Task/Activity</h6>
  <input type="text" name="act_nm" class="form-control" placeholder="Enter Activity Name" required>
</div>
<div class="mb-3">
  <h6>Sub-task/activity</h6>
  <input type="text" name="sb_act" class="form-control" placeholder="Enter Sub-activity Name">
</div>
<div class="mb-3">
  <h6>Task/Activity Timeline(Days)</h6>
  <input type="number" name="tline" class="form-control" placeholder="Enter Activity Timeline in number of days" required>
</div>
<h6>List Steps</h6>
<div class="mb-3">
  <input type="text" name="stp_1" class="form-control" placeholder="Step One" required>
  </div>
  <div class="mb-3">
  <input type="text" name="stp_2" class="form-control" placeholder="Step Two">
</div>
<div class="mb-3">
  <input type="text" name="stp_3" class="form-control" placeholder="Step Three">
  </div>
  <div class="mb-3">
  <input type="text" name="stp_4" class="form-control" placeholder="Step Four">
  </div>
  <div class="mb-3">
  <input type="text" name="stp_5" class="form-control" placeholder="Step Five">
  </div>
  <div class="mb-3">
  <input type="text" name="stp_6" class="form-control" placeholder="Step Six">
  </div>
  <div class="mb-3">
  <input type="text" name="stp_7" class="form-control" placeholder="Step Seven">
  </div>
  <div class="mb-3">
  <input type="text" name="stp_8" class="form-control" placeholder="Step Eight">
  </div>
  </div>
  <div class="col-md-6"><!-- right column -->
  <div class="mb-3">
  <input type="text" name="stp_9" class="form-control" placeholder="Step Nine">
  </div>
  <div class="mb-3">
  <input type="text" name="stp_10" class="form-control" placeholder="Step Ten">
  </div>
  <div class="mb-3">
  <input type="text" name="stp_11" class="form-control" placeholder="Step Eleven">
  </div>
  <div class="mb-3">
  <input type="text" name="stp_12" class="form-control" placeholder="Step Twelve">
  </div>
  <div class="mb-3">
  <input type="text" name="stp_13" class="form-control" placeholder="Step Thirteen">
  </div>
  <div class="mb-3">
  <input type="text" name="stp_14" class="form-control" placeholder="Step Fourteen">
  </div>
  <div class="mb-3">
  <input type="text" name="stp_15" class="form-control" placeholder="Step Fifteen">
</div>
<div class="mb-3">
  <input type="text" name="stp_16" class="form-control" placeholder="Step Sixteen">
  </div>
  <div class="mb-3">
  <input type="text" name="stp_17" class="form-control" placeholder="Step Seventeen">
  </div>
  <div class="mb-3">
  <input type="text" name="stp_18" class="form-control" placeholder="Step Eighteen">
  </div>
  <div class="mb-3">
  <input type="text" name="stp_19" class="form-control" placeholder="Step Nineteen">
</div>
<div class="mb-3">
  <input type="text" name="stp_20" class="form-control" placeholder="Step Twenty">
  </div>
</div>
<div class="input-group mb-3">
<button class = "btn btn-success" type="submit" name="upl_btn">Submit</button>
</form>
</div>
</div>
<!-- Footer -->
</main>
<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted" align="center">Copyright &copy; NOUN Directorate of Quality Assurance 2024</div>
                            <!-- <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> -->
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    	<script src="assets/vendor/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="assets/vendor/js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/vendor/js/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
 <!--End footer-->
    </body>
</html>
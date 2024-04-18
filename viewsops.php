<?php 
// <!-- Top Nav Bar -->
include "includes/top_nav.php";
// <!-- Site bar -->
include "includes/sidebar.php";

if(!isset($_SESSION['stfid'])) {?>
    <script>
		Swal.fire({										
			icon: "error",
			title: "Error...",
			text: "You are logged out, Kindly login."
		}).then(function() {
    	window.location = "login.php";
		});
		</script>
    <?php
    exit;
  }
  $stfid = $_SESSION["stfid"];
  $stfname = $_SESSION["stfname"];
  $stfdesig = $_SESSION["stfdesig"];
  $stfoffice = $_SESSION["stfoffice"];
  $stemail = $_SESSION["stfemail"];
?>
<body class="sb-nav-fixed">
<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
        <div class="breadcrumb-item active"><h6>Office: <?php echo $stfoffice?></h6></div>
        <h2>View Tasks</h2><div>
        <a class="btn btn-primary" href="man_sops.php">Back</a>
 <!-- Body content-->
 <div class="card mb-2">
  <div class="card-header">
      <i class="fas fa-table me-1"></i>
        <!-- Card-header -->
        Offices
    </div>
    <div class="card-body">
    
    <?php 
    //$query = "SELECT * FROM off_sop JOIN off_lst ON off_sop.off_lst_id = off_lst.off_lst_id where upl_by = ?";
    //$query = "SELECT * FROM off_sop AS t1 JOIN off_lst AS t2 ON t1.off_lst_id = t2.off_lst_id WHERE stfid= ?";
    $query = "SELECT * FROM off_sop";
    $stmt = mysqli_prepare($conn, $query);
    //mysqli_stmt_bind_param($stmt, "s", $stfid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

if($result) {?>
<div class="col-xl-12">
        <table class="table table-hover ">
        <thead>
          <tr><th>#</th>
            <th>Task/Activity</th>
            <th>Sub-task/activity</th>
            <th>Task/Actvity Steps</th>
            <th>Timeline</th>
            <th>Date Uploaded</th>
            <!-- <th>Uploaded by</th> -->
          </tr>
        </thead>

        <?php
        $number = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tsk = $row["tsk_nm"];
        $stsk = $row["sb_tsk"];
        $tskstp = trim($row["stp_1"]);
        $stp = trim($row["stp_2"]);
        $tl = $row["tline"];
        $dt = $row["dt_upl"];
        // $uplby = $row["upl_by"];
        ?>
        <tbody>
        <tr>
            <td><?php  echo $number; ?></td>
            <td><?php  echo $tsk; ?></td>
            <td><?php  echo $stsk; ?></td>
            <td><?php  echo "1. ".$tskstp.".  2. " .$stp; ?>....</td>
            <td><?php  echo $tl. " Days"; ?></td>
            <td><?php  echo $dt; ?></td>
            <?php ++$number?></tr>
            <?php
          }

          ?>
        </tbody>
      </table>

<?php 
    }
    mysqli_close($conn);
    ?>
  </div>
<!-- End Body content-->
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
    </body>
</html>
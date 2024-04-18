<?php
// <!-- Top Nav Bar -->
include "includes/top_nav.php";
// <!-- Site bar -->
include "includes/sidebar.php";
?>
<div id="layoutSidenav_content">
<main>
					<!-- Page Title Header -->
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Monitoring & Evaluation Unit</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Evaluate Staff Report</li>
                        </ol>
                        
						<!-- Office Selected Appears on top of Staff list table   asn_tsk2_stf.php-->
<form action="asn_tsk2_stf.php" method="POST"> 
<?php
if(isset($_POST['asntsk'])){
    $stfid2 = mysqli_real_escape_string($conn, $_POST['stfid2']);
    $offnm= mysqli_real_escape_string($conn, $_POST['offnm']);
    $stfnm= mysqli_real_escape_string($conn, $_POST['stfnm']);
    $offid= mysqli_real_escape_string($conn, $_POST['offid']);
?>
						<div class="row">
						  <div class="col-xl-10">
							<table class="table">
								<thead>
								  <tr>
									<th scope="col">&nbsp;</th>
									<th scope="col">Office Selected</th>
									<th scope="col">Staff Selected</th>
									<th></th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<th scope="row">1</th>
									<td><?php echo $offnm;?></td>
									<td><?php echo $stfnm;?></td>
									<td><a class="btn btn-success" onclick="history.back()">Return to Staff List</a></td>
								  </tr>
								</tbody>
							  </table>
						  </div>
						</div>
                        <?php
                        }
                        ?>
                        <div class="row">
							<div class="col-xl-12">
<h4>Task List to Assign to Staff: <?php echo $stfnm . $stfid2;?></h4>	

    <?php
    $query = "SELECT * FROM off_sop where off_lst_id = $offid";
    $stmt = mysqli_prepare($conn, $query);
    //mysqli_stmt_bind_param($stmt, "s", $stfid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

if($result) {?>
<div class="col-xl-12">
        <table class="table table-hover ">
        <thead>
          <tr>
            <th>#</th>
            <th>Select</th>
            <th>Task/Activity</th>
            <th>Sub-task/activity</th>
          </tr>
        </thead>

        <?php
        $number = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tsk = $row["sop_tsk"];
        $tskid = $row["tsk_id"];
        $stsk = $row["sub_tsk"];
        ?>
        <tbody>
        <tr>
        <td><?php  echo $number; ?></td>
            <td><input type="checkbox" name="checkbox_values[]"></td>
            <td><?php  echo trim($tsk); ?></td>
            <td><?php  echo trim($stsk); ?></td>
            <?php ++$number?>
        </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
            <input name= "stfnm" value= "<?php echo $stfnm;?>" type="hidden">
            <input name= "stfid2" value= "<?php echo $stfid2;?>" type="hidden">
            <input name= "offnm" value= "<?php echo $offnm;?>" type="hidden">
            <input name= "tsk" value= "<?php echo $tsk;?>" type="hidden">
            <input name= "checkbox_values[]" value= "<?php echo $tskid;?>" type="hidden">
            <input name= "offid" value= "<?php echo $offid;?>" type="hidden">

      <input type="submit" name = "asn_btn"class="btn btn-secondary" value="Assign Task">
</form>
<?php 
    }
    ?>
  </div>                       
                    </div>
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
		<script src="assets/vendor/bootstrap/js/bootstrap.js" crossorigin="anonymous"></script>
        <script src="assets/vendor/js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/vendor/js/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

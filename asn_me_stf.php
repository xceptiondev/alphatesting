<?php
// <!-- Top Nav Bar -->
include "includes/top_nav.php";
// <!-- Site bar -->
include "includes/sidebar.php";
?><div id="layoutSidenav_content">
<main>
					<!-- Page Title Header -->
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">M&E Unit Assign Staff to Offices</h3>
<!-- Office Selected Appears on top of Staff list table   asn_tsk2_stf.php--> 
<?php
if(isset($_POST['asnoff'])){
    $stfid2 = mysqli_real_escape_string($conn, $_POST['stfid2']);
    $stfnm2= mysqli_real_escape_string($conn, $_POST['stfnm2']);
    //$offasn= mysqli_real_escape_string($conn, $_POST['offasn']);
    ?>
						<div class="row">
						  <div class="col-xl-10">
							<table class="table">
								<thead>
								  <tr>
									<th scope="col">&nbsp;</th>
									<!-- <th scope="col">Office Selected</th> -->
									<th scope="col">Staff Selected</th>
									<th></th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<th scope="row">1</th>
									<td><?php echo $stfnm2;?></td>
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
<h4>Select Office(s) to Assign to: <?php echo $stfnm2;?></h4>
<form action="asn_off2_me_stf.php" method="POST">
    <?php
    $query = "SELECT * FROM off_lst";
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
            <th>Offices</th>
        </tr>
        </thead>

        <?php
        $number = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $offnm = $row["off_nm"];
        $offid2 = $row["off_lst_id"];
        ?>
        <tbody>
        <tr>
        <td><?php  echo $number; ?></td>
            <td><input type="checkbox" name= "checkbox_values[]" value= "<?php echo $offid2;?>"></td>
            <td><?php  echo trim($offnm); ?></td>
            <?php ++$number?>
        </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
            <input name= "stfnm2" value= "<?php echo $stfnm2;?>" type="hidden">
            <input name= "stfid2" value= "<?php echo $stfid2;?>" type="hidden">
            <input name= "offnm" value= "<?php echo $offnm;?>" type="hidden">
            <input name= "tsk" value= "<?php echo $tsk;?>" type="hidden">
            <input name= "offid2" value= "<?php echo $offid2;?>" type="hidden">

      <input type="submit" name = "asn_btn"class="btn btn-secondary" value="Assign Task">
</form>
<?php 
    }
    mysqli_close($conn);
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
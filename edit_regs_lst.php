<?php
if (isset($_POST['editReg'])){
	$Stf_fnm = $_POST['fname'];
	$Stf_onm = $_POST['oname'];
	$Stf_lnm = $_POST['lname'];
	$Stf_id = $_POST['stfid'];
	$Stf_ml = $_POST['stfml'];
	$Stf_pos = $_POST['stfpos'];
	$Stf_off = $_POST['stfoff'];
	
	$reg_id = $_POST['regid'];
}else{
	echo "No record to process";
	header("Location: stf_reg_list.php");
}

//Get the list of staff from the Master list table
require "my_conn.php";
$offLst = "SELECT * FROM off_lst";
if (!$off_rs = $conn->query($offLst)){
	echo "Unable to retrieve records from the Database";
}

if ($off_rs->num_rows == 0){
	echo "No records found";
}

//This script here get edited record and save to DB
if (isset($_POST['ed_rec'])){
	session_start();
	require "my_conn.php";
	
	//Get form data
	$stf_pos = $conn->real_escape_string(strip_tags($_POST['stf_pos']));
	$stf_off_nm = $conn->real_escape_string(strip_tags($_POST['off_list']));
	$stf_regid = $_POST['reg_id'];

	$upd_evl = "UPDATE stf_reg SET `stf_desgn`='".$stf_pos."',`stf_off`=".$stf_off_nm." WHERE reg_id = $stf_regid";
	if ($conn->query($upd_evl) === true) {
		$upd_msg = $conn->affected_rows . ' Staff record updated successfully.';
		echo "This is what happened $upd_msg";
		//session_start();
		$_SESSION['upd_msg'] = $upd_msg;
	} else {
		$upd_msg = "ERROR: Could not execute query: " . $conn->error;
		echo "This is what happened $upd_msg";
		$_SESSION['upd_msg'] = $upd_msg;
	}
	
	$conn->close();
}


// <!-- Top Nav Bar -->
include "includes/top_nav.php";
// <!-- Site bar -->
include "includes/sidebar.php";
?>
    <div id="layoutSidenav_content">
				<!-- Content Body Here -->
                <main>
					<!-- Page Title Header -->
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Staff Registration List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Manage Registered Staff Record</li>
                        </ol>
						<div class="row col-12">
							<h5>Edit Record of <?php echo $Stf_fnm." ". $Stf_lnm; ?></h5>
						</div>
                            
                        <div class="row">
							<div class="col-xl-12">
								<form method="POST" action="">
								  <div class="row mb-3">
									  <div class="col-md-4">
										  <label for="stf_fname" class="col-form-label">First Name</label>
										  <input type="text" class="form-control" name="stf_fname" id="stf_fname" placeholder="Enter Staff First Name" value="<?php echo $Stf_fnm; ?>" disabled>
									  </div>
									  <div class="col-md-4">
										  <label for="stf_oname" class="col-form-label">Other Name</label>
										  <input type="text" class="form-control" name="stf_oname" id="stf_oname" placeholder="Enter Staff Other Name" value="<?php echo $Stf_onm; ?>"  disabled>
									  </div>
									  <div class="col-md-4">
										  <label for="stf_lname" class="col-form-label">Last Name</label>
										  <input type="text" class="form-control" name="stf_lname" id="stf_lname" placeholder="Enter Staff Surname Name" value="<?php echo $Stf_lnm; ?>"  disabled>
									  </div>
								  </div>
								  <div class="row mb-3">
									  <div class="col-md-2">
										  <label for="stf_id_no" class="col-form-label">Staff ID</label>
										  <input type="number" class="form-control" name="stf_id_no" id="stf_id_no" placeholder="Staff ID" value="<?php echo $Stf_id; ?>"  disabled>
									  </div>
									  <div class="col-md-5">
										  <label for="stf_mail" class="col-form-label">Email</label>
										  <input type="email" class="form-control" name="stf_mail" id="stf_mail" placeholder="Enter Staff Official Email here" value="<?php echo $Stf_ml; ?>"  disabled>
									  </div>
									  <div class="col-md-5">
										  <label for="stf_pos" class="col-form-label">Postion</label>
										  <input type="text" class="form-control" name="stf_pos" id="stf_pos" placeholder="Enter Staff Position here" value="<?php echo $Stf_pos; ?>">
									  </div>
								  </div>
								  <div class="row mb-3">
									  <div class="col-md-6">
										  	
										  	<label for="off_list" class="col-form-label">Office</label>
										  	<select class="form-select" aria-label="Default select example" name="off_list">
												<option >Select Office from List</option>
												
											  <!-- Display list of Offices from DB in dropdown-->
												<?php
													while($rw = $off_rs->fetch_assoc()) {
														$off_id = $rw['off_lst_id'];
														$off = $rw['off_nm'];
														if ($off_id == $Stf_off){
															echo "<option selected value='$off_id'>$off</option>";
														}else{
															echo "<option value='$off_id'>$off</option>";
														}
														
													}
														?>
											  
											  
											  <!--<option value="2">Two</option>
											  <option value="3">Three</option-->>
											</select>
									  </div>
									  <div class="col-md-6">
										  <label for="rec_id" class="col-form-label" hidden="">Main ID:</label>
										  <input type="hidden" class="form-control" id="reg_id" name="reg_id" value="<?php echo $reg_id; ?>">
									  </div>
								  </div>
								  <div class="row mb-3">
									  <div class="col-md-12" align="center">
										<a href="stf_reg_list.php" class="btn btn-danger">Dont Edit</a>
										<button type="submit" name="ed_rec" class="btn btn-primary">Save changes</button>
									  </div>
								  </div>
							  	</form>
							</div>
								                            
                        </div> <!-- End of row -->
                        
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
        <!--<script src="assets/vendor/js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/vendor/js/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>-->
    </body>
</html>


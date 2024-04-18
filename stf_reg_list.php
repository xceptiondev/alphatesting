<?php
// <!-- Top Nav Bar -->
include "includes/top_nav.php";
// <!-- Site bar -->
include "includes/sidebar.php";

//Get the list of staff from the Master list table
require "my_conn.php";
$stfReg = "SELECT `reg_id`, `stf_fname`, `stf_oname`, `stf_lname`, `stf_id`, `stf_email`, `stf_desgn`, stf_off, (SELECT off_nm FROM off_lst WHERE off_lst_id = stf_reg.stf_off ) AS `stf_off_nm` FROM `stf_reg`";
if (!$stf_rs = $conn->query($stfReg)){
	echo "Unable to retrieve records from the Database";
}

if ($stf_rs->num_rows == 0){
	echo "No records found";
}
?>
<div id="layoutSidenav_content">
				<!-- Content Body Here -->
                <main>
					<!-- Page Title Header -->
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Staff Registration List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">List of Registered Staff</li>
                        </ol>
                        
                            
                        <div class="row">
							<div class="col-xl-6">
								<?php
								//Get messages from action performed from this page
								//session_start();
								if (!empty($_SESSION['upd_msg'])){
									$upd_msg = $_SESSION['upd_msg'];
									echo "<p style='color: green; font-size:18px;'><strong> $upd_msg</strong></p>";
									unset($_SESSION['upd_msg']);
									//session_destroy();
									
								}
								?>
							</div>
							
								                            
                        </div> <!-- End of row -->
						<hr>
						<div class="row">
							<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-users me-1"></i>
                                Registered Staff Record Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Other Name</th>
                                            <th>Last Name</th>
                                            <th>Staff ID</th>
                                            <th>Email</th>
                                            <th>Position</th>
											<th>Office</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Other Name</th>
                                            <th>Last Name</th>
                                            <th>Staff ID</th>
                                            <th>Email</th>
                                            <th>Position</th>
											<th>Office</th>
											<th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										<?php
										while($rw = $stf_rs->fetch_assoc()) {
											$reg_id = $rw['reg_id'];
											$Stf_fnm = $rw['stf_fname'];
											$Stf_onm = $rw['stf_oname'];
											$Stf_lnm = $rw['stf_lname'];
											$stf_ID = $rw['stf_id'];
											$Stf_mail = $rw['stf_email'];
											$stf_posn = $rw['stf_desgn'];
											$stf_off = $rw['stf_off'];
											$stf_off_nm = $rw['stf_off_nm'];
											echo "<tr>";
											
                                            echo "<td>". $Stf_fnm ."</td>";
                                            echo "<td>". $Stf_onm ."</td>";
                                            echo "<td>". strtoupper($Stf_lnm) ."</td>";
                                            echo "<td>". $stf_ID ."</td>";
                                            echo "<td>". $Stf_mail ."</td>";
                                            echo "<td>". $stf_posn ."</td>";
											echo "<td>". $stf_off_nm ."</td>";
											echo "<td>";
											?>
											<!-- Button to edit record in another page-->
											<form method="POST" action="edit_regs_lst.php">
												<input type="hidden" name="fname" value="<?php echo $Stf_fnm; ?>">
												<input type="hidden" name="oname" value="<?php echo $Stf_onm; ?>">
												<input type="hidden" name="lname" value="<?php echo $Stf_lnm; ?>">
												<input type="hidden" name="stfid" value="<?php echo $stf_ID; ?>">
												<input type="hidden" name="stfml" value="<?php echo $Stf_mail; ?>">
												<input type="hidden" name="stfpos" value="<?php echo $stf_posn; ?>">
												<input type="hidden" name="stfoff" value="<?php echo $stf_off; ?>">
												
												<input type="hidden" name="regid" value="<?php echo $reg_id; ?>">
												<button type="submit" class="btn btn-primary" name="editReg">Edit</button>
											</form>
											<!--<button type="button" class="btn btn-danger" disabled>Delete</button>-->
											
											<!-- End of Modal to edit record-->
											<?php
											echo "</td>";
                                        	echo "</tr>";
										}
										?>
                                        
                                    </tbody>
                                </table>
								<?php
						
						$stf_rs->close();
						?>
                            </div>
                        </div>
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
        <!--<script src="assets/vendor/js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>-->
        <script src="assets/vendor/js/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

<?php
// <!-- Top Nav Bar -->
include "includes/top_nav.php";
// <!-- Site bar -->
include "includes/sidebar.php";

//Get the list of staff from the Master list table
require "my_conn.php";
$stfMas = "SELECT * FROM stf_mas_tbl";
if (!$stf_rs = $conn->query($stfMas)){
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
                        <h1 class="mt-4">Staff Master List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Manage HR Staff Record</li>
                        </ol>
                        
                            
                        <div class="row">
							<div class="col-xl-6">
								<!-- Button trigger Add Staff modal -->
								<button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#add_stf_mas_lst">
								  Add Staff
								</button>

								<!-- Modal to Add Staff to Master Table -->
								<div class="modal fade" id="add_stf_mas_lst" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-lg">
									<div class="modal-content">
									  <div class="modal-header">
										<h4 class="modal-title" id="exampleModalLabel">Add Staff Details to Master List</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									  </div>
									  <div class="modal-body">
										  <div class="container-fluid">
											  <form method="POST" action="ins_stf_mas.php">
												  <div class="row mb-3">
													  <div class="col-md-4">
														  <label for="stf_fname" class="col-form-label">First Name</label>
														  <input type="text" class="form-control" name="stf_fname" id="stf_fname" placeholder="Enter Staff First Name" required>
													  </div>
													  <div class="col-md-4">
														  <label for="stf_oname" class="col-form-label">Other Name</label>
														  <input type="text" class="form-control" name="stf_oname" id="stf_oname" placeholder="Enter Staff Other Name">
													  </div>
													  <div class="col-md-4">
														  <label for="stf_lname" class="col-form-label">Last Name</label>
														  <input type="text" class="form-control" name="stf_lname" id="stf_lname" placeholder="Enter Staff Surname Name" required>
													  </div>
												  </div>
												  <div class="row mb-3">
													  <div class="col-md-2">
														  <label for="stf_id_no" class="col-form-label">Staff ID</label>
														  <input type="number" class="form-control" name="stf_id_no" id="stf_id_no" placeholder="Staff ID" required>
													  </div>
													  <div class="col-md-5">
														  <label for="stf_mail" class="col-form-label">Email</label>
														  <input type="email" class="form-control" name="stf_mail" id="stf_mail" placeholder="Enter Staff Official Email here" required>
													  </div>
													  <div class="col-md-5">
														  <label for="stf_pos" class="col-form-label">Postion</label>
														  <input type="text" class="form-control" name="stf_pos" id="stf_pos" placeholder="Enter Staff Position here" required>
													  </div>
												  </div>
												  <div class="row mb-3">
													  <div class="col-md-6">
														  <label for="stf_off" class="col-form-label">Office</label>
														  <input type="text" class="form-control" name="stf_off" id="stf_off" placeholder="Enter Staff Office" required>
													  </div>
												  </div>
												  <div class="row mb-3">
													  <div class="col-md-12" align="center">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">Save changes</button>
													  </div>
												  </div>
											  </form>
										  </div>
									  </div>
									  <div class="modal-footer">
										
									  </div>
									</div>
								  </div>
								</div>
								<!-- End of Add Staff to Master List Modal -->
								
							</div>
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
                                <i class="fas fa-users"></i>
                                HR Staff Record
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
											$rec_id = $rw['rec_id'];
											$Stf_fnm = $rw['Stf_fname'];
											$Stf_onm = $rw['Stf_oname'];
											$Stf_lnm = $rw['Stf_lname'];
											$stf_ID = $rw['stf_ID'];
											$Stf_mail = $rw['Stf_email'];
											$stf_posn = $rw['stf_posn'];
											$stf_off_nm = $rw['stf_off'];
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
											<form method="POST" action="edit_mas_lst.php">
												<input type="hidden" name="fname" value="<?php echo $Stf_fnm; ?>">
												<input type="hidden" name="oname" value="<?php echo $Stf_onm; ?>">
												<input type="hidden" name="lname" value="<?php echo $Stf_lnm; ?>">
												<input type="hidden" name="stfid" value="<?php echo $stf_ID; ?>">
												<input type="hidden" name="stfml" value="<?php echo $Stf_mail; ?>">
												<input type="hidden" name="stfpos" value="<?php echo $stf_posn; ?>">
												<input type="hidden" name="stfoff" value="<?php echo $stf_off_nm; ?>">
												<input type="hidden" name="recid" value="<?php echo $rec_id; ?>">
												<button type="submit" class="btn btn-primary" name="editMas">Edit</button>
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
        <script type="text/javascript">
			var editStaffModal = document.getElementById('editStaffModal')
		editStaffModal.addEventListener('show.bs.modal', function (event) {
		  // Button that triggered the modal
		  var button = event.relatedTarget
		  // Extract info from data-bs-* attributes
		  var fnm= button.getAttribute('data-bs-stf_fnm');
		  var onm= button.getAttribute('data-bs-stf_onm');
		  var lnm= button.getAttribute('data-bs-stf_lnm');
		  var st_id= button.getAttribute('data-bs-stf_id');
		  // If necessary, you could initiate an AJAX request here
		  // and then do the updating in a callback.
		  //
		  // Update the modal's content.
		  var modalTitle = editStaffModal.querySelector('.modal-title');
		  //var modalBodyInput = editStaffModal.querySelector('.modal-body input');

		  var fname = document.getElementById("fnm");
		  var oname = document.getElementById("onm");
		  var lname = document.getElementById("lnm");
		  var s_id = document.getElementById("s_id");


		  modalTitle.textContent = 'New message to ' + fnm + ' ' +lnm;
		  fname.value = fnm;
		  oname.value = onm;
		  lname.value = lnm;
		  s_id.value = st_id;
		})
		</script>
    	<script src="assets/vendor/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!--<script src="js/scripts.js"></script>
        <script src="assets/vendor/js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>-->
        <script src="assets/vendor/js/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
		
    </body>
</html>

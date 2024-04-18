<?php
//From login check for QA Admin details and replace below script
if (!session_start() || empty($_SESSION['adm_stf_nm']) ){
	header("Location: 401.php");
	exit();
}
$qa_adm_stf_nm = $_SESSION['adm_stf_nm'];
$qa_adm_stf_id = $_SESSION['adm_stf_id'];
$qa_adm_unit = $_SESSION['adm_unit'];

//Get Staff Details
if (!isset($_POST['stf_tsk_lst'])){
	echo "FORBIDDEN!!!";
	header("Location: 401.php");
	exit();
	
}

$stf_id = $_POST['stf_id'];
$stf_off = $_POST['stf_off'];
$off_nm = $_POST['off_nm'];
$stf_fname = "Ikechukwu"; //This will be replaced with the $_POST value
$stf_lname = "Akujobi"; //This will be replaced with the $_POST value

$stf_fu_nm = $stf_fname." ".$stf_lname;

//Get List of task assigned to staff
$tsk_qr = "SELECT * FROM `asn_tsk` WHERE stf_id = ? AND off_id = ?";
require "my_conn.php";
$gtsk = $conn->prepare($tsk_qr);
$gtsk ->bind_param('ii', $stf_id, $stf_off);
$gtsk->execute();
$rs = $gtsk->get_result();

if ($rs->num_rows == 0){
	$msg = "No Task Assigned to Staff at this moment....Please check back leter or contact Directorate of Quality Assurance";
	echo $msg;
	
}
$sn = 0;
if ($rs->num_rows > 0){
	$msg = $rs->num_rows;

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
                        <h3 class="mt-4"><?php echo $qa_adm_unit; ?> Unit</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Evaluate Staff Submissions</li>
                        </ol>
                        
						<!-- Office Selected Appears on top of Staff list table -->
						<div class="row">
						  <div class="col-xl-10">
							<table class="table">
								<thead>
								  <tr>
									<th scope="col">&nbsp;</th>
									<th scope="col">Office Selected</th>
									<th scope="col">Staff Selected</th>
									<th scope="col">&nbsp;</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<th scope="row">1</th>
									<td><?php echo $off_nm; ?></td>
									<td><?php echo $stf_fu_nm; ?></td>
									<td><a href="evl_off_stf.php" class="btn btn-info">Return back to Staff List</a></td>
								  </tr>
								</tbody>
							  </table>
						  </div>
						</div>
                            
                        <div class="row">
							<div class="col-xl-12">
								<h4>Staff Task List</h4>
								<p><?php echo "Staff has $msg Task(s) assigned"; ?></p>
								<table class="table table-striped">
								  <thead>
									<tr>
									  <th scope="col">S/N</th>
									  <th scope="col">Activity/Task</th>
									  <th scope="col">Sub-Activity</th>
									  <th scope="col">Steps Performed</th>
									  <!--<th scope="col">Activity Timeline</th>-->
									  <th scope="col">Date Assigned</th>
									  <th scope="col">Evidence</th>
									  <th scope="col">Action</th>
									</tr>									
								  </thead>
								  <tbody>
									<?php
									
									while ($rw = $rs->fetch_assoc()){
										$sn ++;
										$tsk_desc = $rw["tsk_desc"];
										$sub_tsk = $rw["sub_tsk"];
										$tsk_stp = $rw["tsk_stp"];
										$tsk_tline = $rw["tsk_tline"];
										$dt_asn = $rw["dt_asn"];
										
										$img_evd = $rw["img_evd"];
										$pdf_evd = $rw["pdf_evd"];		
										$vid_evd = $rw["vid_evd"];
										$evl_scr = $rw["evl_scr"];
										$idf_gap = $rw["idf_gap"];
										$sug_imp = $rw["sug_imp"];

										echo "<tr>";
										echo "<th scope='row'>$sn</td>";
										echo "<td>$tsk_desc</td>";

										//check if there is a Sub-Task associated with the Task
										if (empty($sub_tsk)){
											$sub_tsk = "No Sub-Task for this Activity";
										}

										echo "<td>$sub_tsk</td>";
										echo "<td>$tsk_stp</td>";
										/*echo "<td>$tsk_tline</td>";*/
										echo "<td>$dt_asn</td>";

										//Check if any evidence has been uploaded either as a Image or PDF
										

										//Check if Evidences were uploaded by staff and staff has score
										if (empty($img_evd) && empty($pdf_evd)){
											$img_evd_no = "No Image Uploaded";
											$pdf_evd_no = "No PDF document Uploaded";
											//$evl_scr_no = "Staff Not Evaluated Yet";

											echo "<td>$img_evd_no <br> <br>$pdf_evd_no</td>";
											/*echo "<td>$evl_scr_no</td>";
											echo "<td>$evl_scr_no</td>";
											echo "<td>$evl_scr_no</td>";*/

											?>
											<td>
											  <!-- Button trigger modal to send a reminder to staff -->
												<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
												  Send Reminder
												</button>

												<!-- Modal message of email sent -->
												<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												  <div class="modal-dialog modal-dialog-centered">
													<div class="modal-content">
													  <div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Email Reminder to Staff</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													  </div>
													  <div class="modal-body">
														An email has been sent to the staff requesting they upload their evidence for the Task assigned to them.
													  </div>
													  <div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
													  </div>
													</div>
												  </div>
												</div>
											</td>
											<?php
										}else if (empty($evl_scr)) {
											//This is when the staff has not been evaluated yet
											$evl_scr_no = "Staff Not Evaluated Yet";
											$evd_msg = "Evidence Uploaded";
											echo "<td>$evd_msg</td>";
											/*echo "<td>$evl_scr_no</td>";
											echo "<td>$evl_scr_no</td>";
											echo "<td>$evl_scr_no</td>";*/

											?>
											<td>
											  <form method="POST" name="tsk_select" action="ass_tsk_evd.php">
												  <input type="hidden" name="stf_id" value="<?php echo $stf_id; ?>">
												  <input type="hidden" name="stf_off" value="<?php echo $stf_off; ?>">
												  <input type="hidden" name="stf_fu_nm" value="<?php echo $stf_fu_nm; ?>">
												  <input type="hidden" name="off_nm" value="<?php echo $off_nm; ?>">
												  
												  <input type="hidden" name="tsk_desc" value="<?php echo $tsk_desc; ?>">
												  <input type="hidden" name="sub_tsk" value="<?php echo $sub_tsk; ?>">
												  <input type="hidden" name="tsk_stp" value="<?php echo $tsk_stp; ?>">
												  <input type="hidden" name="tsk_tline" value="<?php echo $tsk_tline; ?>">
												  <input type="hidden" name="date_asn" value="<?php echo $dt_asn; ?>">
												  <input type="hidden" name="img_evd" value="<?php echo $img_evd; ?>">
												  <input type="hidden" name="pdf_evd" value="<?php echo $pdf_evd; ?>">
												  <input type="hidden" name="vid_evd" value="<?php echo $vid_evd; ?>">
												  <input type="hidden" name="evl_scr" value="<?php echo $evl_scr; ?>">
												  <input type="hidden" name="idf_gap" value="<?php echo $idf_gap; ?>">
												  <input type="hidden" name="sug_imp" value="<?php echo $sug_imp; ?>">
												  
												  <button type="submit" class="btn btn-secondary" name="evd_submit" id="evd_submit">Evaluate</button>
											  </form>
											</td>
											<?php
										}else{
											$evd_msg = "Evidence Uploaded";
											echo "<td>$evd_msg <br>";
											/*echo "<td>$evl_scr %</td>";
											echo "<td>$idf_gap</td>";
											echo "<td>$sug_imp</td>";*/

											?>
											<td>
											  <form method="POST" name="tsk_select" action="ass_tsk_evd.php">
												  <input type="hidden" name="stf_id" value="<?php echo $stf_id; ?>">
												  <input type="hidden" name="stf_off" value="<?php echo $stf_off; ?>">
												  <input type="hidden" name="stf_fu_nm" value="<?php echo $stf_fu_nm; ?>">
												  <input type="hidden" name="off_nm" value="<?php echo $off_nm; ?>">
												  
												  <input type="hidden" name="tsk_desc" value="<?php echo $tsk_desc; ?>">
												  <input type="hidden" name="sub_tsk" value="<?php echo $sub_tsk; ?>">
												  <input type="hidden" name="tsk_stp" value="<?php echo $tsk_stp; ?>">
												  <input type="hidden" name="tsk_tline" value="<?php echo $tsk_tline; ?>">
												  <input type="hidden" name="date_asn" value="<?php echo $dt_asn; ?>">
												  <input type="hidden" name="img_evd" value="<?php echo $img_evd; ?>">
												  <input type="hidden" name="pdf_evd" value="<?php echo $pdf_evd; ?>">
												  <input type="hidden" name="vid_evd" value="<?php echo $vid_evd; ?>">
												  <input type="hidden" name="evl_scr" value="<?php echo $evl_scr; ?>">
												  <input type="hidden" name="idf_gap" value="<?php echo $idf_gap; ?>">
												  <input type="hidden" name="sug_imp" value="<?php echo $sug_imp; ?>">
												  <button type="submit" class="btn btn-secondary" name="evd_submit" id="evd_submit">View Details</button>
											  </form>
											</td>
											<?php
										}
										echo "</tr>";
									}
									?>
										</tbody>
									</table>
									<?php
								}

								// close connection
								$conn->close();
								?>
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
		<script src="assets/vendor/bootstrap/js/bootstrap.js" crossorigin="anonymous"></script>
        <script src="assets/vendor/js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/vendor/js/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

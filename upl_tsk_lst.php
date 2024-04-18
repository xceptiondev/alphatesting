<?php
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
                        <h3 class="mt-4">Staff Office: <?php echo $stf_off?></h3>
					
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Upload Task/Activity Evidence</li>
                        </ol>
						
					<?php
	if (isset($_SESSION['uplMsg'])){
		$uplMsg = $_SESSION['uplMsg'];
	}else{
		$uplMsg = "";
	}
	
	//Get List of task assigned to staff
	$tsk_qr = "SELECT * FROM `asn_tsk` WHERE stf_id = $stf_id AND off_id = $stf_off_id";
	require "my_conn.php";
	$gtsk = $conn->prepare($tsk_qr);
	$gtsk->execute();
	$rs = $gtsk->get_result();
	
	if ($rs->num_rows == 0){?>
		<h4 style="color: red">No Task Assigned to Staff at this moment....Please check back later or contact Directorate of Quality Assurance</h4>
		<?php
		
	}
	$sn = 0;
	if ($rs->num_rows > 0){	
					?>
								<!--<h4>Assigned Task(s) for: <?php //echo $stf_fu_nm; ?></h4>-->
								<div class="row">
						<div class="col-xl-6">
								<table class="table">
									<thead>
										<tr>
											<th>Assigned Task to:</th>
											<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php echo $stf_fname; ?></td>
											<td>
												<?php
												if (!empty($uplMsg)){
													echo "<span style='color: darkgreen; font-size:18px;'><b>$uplMsg</b></span>";
													unset($_SESSION['uplMsg']);
												}
												?>
											</td>
											
										</tr>
									</tbody>
								</table>
							</div>
                            
                        <div class="row">
							
								<hr>
								<table class="table table-striped">
								  <thead>
									<tr>
									  <th scope="col">S/N</th>
									  <th scope="col">Activity/Task</th>
									  <th scope="col">Sub-Activity</th>
									  <th scope="col">Steps Performed</th>
									  <th scope="col">Activity Timeline</th>
									  <th scope="col">Date Assigned</th>
									  <th scope="col">Evidence</th>
									  <th scope="col">Action</th>
									</tr>									
								  </thead>
								  <tbody>
								  <?php
									$msg = $rs->num_rows;
									echo "Staff has $msg Task(s) assigned";
									while ($rw = $rs->fetch_assoc()){
										$sn ++;
										$tsk_id = $rw["tsk_id"];
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
										echo "<td>$tsk_tline</td>";
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
											  <form method="POST" name="tsk_select" action="upl_tsk_evd.php">
												  <input type="text" name="stf_id" value="<?php echo $stf_id; ?>" hidden="">
												  <input type="text" name="tsk_id" value="<?php echo $tsk_id; ?>" hidden="">
												  <input type="text" name="tsk_desc" value="<?php echo $tsk_desc; ?>" hidden="">
												  <input type="text" name="off_id" value="<?php echo $stf_off; ?>" hidden="">
												  <input type="text" name="dat_asn" value="<?php echo $dt_asn; ?>" hidden="">
												  <button type="submit" class="btn btn-secondary" name="evd_submit" id="evd_submit">Upload Evidence</button>
											  </form>
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
											  <form method="POST" name="tsk_select" action="view_upd_tsk.php">
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
										}else{
											$evd_msg = "Evidence Uploaded";
											echo "<td>$evd_msg <br>";
											/*echo "<td>$evl_scr %</td>";
											echo "<td>$idf_gap</td>";
											echo "<td>$sug_imp</td>";*/

											?>
											<td>
											  <form method="POST" name="tsk_select" action="view_upd_tsk.php">
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
        <script src="js/scripts.js"></script><!--
        <script src="assets/vendor/js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/vendor/js/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>-->
    </body>
</html>

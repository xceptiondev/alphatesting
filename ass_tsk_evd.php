<?php
//Get Staff Details

//This is the information gotten after the user has logged in. Session starts if it has not already started
if (!session_start() || empty($_SESSION['adm_stf_nm']) ){
	header("Location: 401.php");
	exit();
}
$qa_adm_stf_nm = $_SESSION['adm_stf_nm'];
$qa_adm_stf_id = $_SESSION['adm_stf_id'];
$qa_adm_unit = $_SESSION['adm_unit'];


/*$stf_fu_nm = $_SESSION['stf_name'];
$stf_id = $_SESSION['stf_id'];
$off_nm = $_SESSION['stf_off_nm'];
$stf_off = $_SESSION['stf_off'];*/

if(!isset($_POST["evd_submit"])){
	header("Location: evl_stf_tsk_lst.php");
	exit();
}
$stf_id = $_POST['stf_id'];
$off_nm = $_POST['off_nm'];
$stf_off = $_POST['stf_off'];
$stf_fu_nm = $_POST['stf_fu_nm'];

$tsk_desc =$_POST["tsk_desc"];
$sub_tsk =$_POST["sub_tsk"];
$tsk_stp =$_POST["tsk_stp"];
$tsk_tline =$_POST["tsk_tline"];
$date_asn =$_POST["date_asn"];
$img_evd =$_POST["img_evd"];
$pdf_evd =$_POST["pdf_evd"];
$vid_evd =$_POST["vid_evd"];
$evl_scr =$_POST["evl_scr"];
$idf_gap =$_POST["idf_gap"];
$sug_imp =$_POST["sug_imp"];

if (empty($evl_scr)){
	$req_evl = "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#evl_msg'>Assess Staff</button>";
	$evl_scr = "<b style='color: red;'>Not Assessed Yet!</b>";
	$idf_gap = "<b style='color: red;'>Not Assessed Yet!</b>";
	$sug_imp = "<b style='color: red;'>Not Assessed Yet!</b>";
}else{
	$evl_scr = $evl_scr."%";
	$req_evl = "";
}

?>
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
                        <h3 class="mt-4"><?php echo $qa_adm_unit; ?></h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Staff Activity Submission Preview</li>
                        </ol>
						<div class="col-md-12">
								<table class="table">
									<thead>
										<tr>
											<th>Assigned Task to:</th>
											<th>Staff Office:</th>
											<th>&nbsp;</th>
											<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php echo $stf_fu_nm; ?></td>
											<td><?php echo $off_nm; ?></td>
											<td>
												<form method="POST" action="evl_stf_tsk_lst.php">
													  <input type="hidden" name="stf_id" value="<?php echo $stf_id; ?>">
													  <input type="hidden" name="stf_off" value="<?php echo $stf_off; ?>">
													  <input type="hidden" name="off_nm" value="<?php echo $off_nm; ?>">
													  <button type="submit" class="btn btn-secondary" name="stf_tsk_lst" id="stf_tsk_lst">Return to Staff Task List</button>
												  </form>
											</td>
											<td><!-- Button trigger modal for requesting evaluation -->
												<?php echo $req_evl; ?>
												<div class="message_box" style="margin:10px 0px; color: limegreen; font-weight: bold"></div>
												<!-- Modal with form to update score and other fields -->
												<div class="modal fade" id="evl_msg" data-bs-backdrop="static" tabindex="-1" aria-labelledby="evl_msgLabel" aria-hidden="true">
												  <div class="modal-dialog modal-dialog-centered modal-xl">
													<div class="modal-content">
													  <div class="modal-header">
														<h5 class="modal-title" id="evl_msgLabel">Assessing Staff Compliance</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													  </div>
													  <div class="modal-body">
														<form method="POST" action="">
															<p><b>Compliance Score</b></p>
															<div class="form-check form-check-inline">
															  <input class="form-check-input" type="radio" name="compScore" id="compScore1" value="0" required>
															  <label class="form-check-label" for="compScore1">
																0
															  </label>
															</div>
															<div class="form-check form-check-inline">
															  <input class="form-check-input" type="radio" name="compScore" id="compScore2" value="25">
															  <label class="form-check-label" for="compScore2">
																1
															  </label>
															</div>
															<div class="form-check form-check-inline">
															  <input class="form-check-input" type="radio" name="compScore" id="compScore3" value="50" required>
															  <label class="form-check-label" for="compScore3">
																2
															  </label>
															</div>
															<div class="form-check form-check-inline">
															  <input class="form-check-input" type="radio" name="compScore" id="compScore4" value="75" required>
															  <label class="form-check-label" for="compScore4">
																3
															  </label>
															</div>
															<div class="form-check form-check-inline">
															  <input class="form-check-input" type="radio" name="compScore" id="compScore5" value="100" required>
															  <label class="form-check-label" for="compScore5">
																4
															  </label>
															</div>
															<div>
																<p><b>Key:</b></p>
																<ul>
																	<li>0	=	Zero adherence (0%).</li>
																	<li>1	=	Only few of the steps were followed and no adequate evidence to support tasks achieved (25%)</li>
																	<li>2	=	The evidence supporting the achieved tasks need major review (50%)</li>
																	<li>3	=	The evidence supporting the achieved tasks need minor review (75%)</li>
																	<li>4	=	All the tasks in the steps were achieved with evidence (100%)</li>
																</ul>
															</div>
															<div class="mb-3">
															  <label for="idy_gap" class="form-label"><b>Identified Gaps</b></label>
																<textarea id="idy_gap" name="idy_gap" class="form-control" aria-describedby="idy_gapHelpBlock" required></textarea>
																<div id="idy_gapHelpBlock" class="form-text">
																  Provide analysis of Identified Gaps in Staff carrying out this Task.
																</div>
															</div>
															<div class="mb-3">
															  <label for="sug_impr" class="form-label"><b>Suggested Improvements</b></label>
																<textarea id="sug_impr" name="sug_impr" class="form-control" aria-describedby="sug_imprHelpBlock" required></textarea>
																<div id="sug_imprHelpBlock" class="form-text">
																  Provide suggestions that can improve Staff's ability to carry out this Task effectively.
																</div>
															</div>
															<div class="mb-3" align="center">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-primary" name="comp_scr" id="comp_scr">Save Assessment</button>
															</div>
														</form>
													  </div>
													  <div class="modal-footer">
														
													  </div>
													</div>
												  </div>
												</div></td>
										</tr>
									</tbody>
								</table>
							</div>
                        
                            
                        <div class="row">
							<div class="col-md-6">
								<h5>Task Description and Details</h5>
								<hr>
								<div class="row">
									<div class="col-12 m-2"><strong>Activity/Task Name</strong></div>
									<div class="col-12 m-2"><?php echo $tsk_desc; ?></div>
								</div>
								<div class="row">
									<div class="col-12 m-2"><strong>Sub-Activity/Task</strong></div>
									<div class="col-12 m-2"><?php echo $sub_tsk; ?></div>
								</div>
								<div class="row">
									<div class="col-12"><strong>Steps Performed</strong></div>
									<div class="col-12"><?php echo $tsk_stp; ?></div>
								</div>
								<hr>
								<div class="row">
									<div class="col-4">
										<p><strong>Date Assigned</strong></p>
										<p><?php echo $date_asn; ?></p>
									</div>
									<div class="col-4">
										<p><strong>Time Line</strong></p>
										<p><?php echo $tsk_tline; ?></p>
									</div>
									<div class="col-4">
										<p><strong>Compliance Score</strong></p>
										<p id="evl_scr_msg"><?php echo $evl_scr; ?></p>
									</div>
								</div>
								<hr>
								<div class="row col-12">
									<div class="col-6"><p><strong>Identified Gaps</strong></p><p id="idy_gap_msg"><?php echo $idf_gap; ?></p></div>
									<div class="col-6"><p><strong>Suggested Improvements</strong></p><p id="sug_impr_msg"><?php echo $sug_imp; ?></p></div>
								</div>
								
							</div>
							<div class="col-md-6">
								<h5>Uploaded Evidences</h5>
								<div class="row">
									<div class="col-md-12" id="shw_img_evd">
									<?php
									if (!empty($img_evd)){
										?>
										<img src="<?php echo $img_evd; ?>" class="img-fluid img-b" alt="Photo Evidence">
										<?php
									}else{
										?>
										<p>No Image Uploaded</p>
										<?php
									}
									?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12" id="shw_pdf_evd">
										<?php
										if (!empty($pdf_evd)){
											echo "<a href='$pdf_evd' target='_blank'><i class='fa-regular fa-file-pdf'></i> View PDF Document</a>";
										}
										?>
										
									</div>
									
								</div>
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
        <script src="js/jquery-3.7.1.min.js"></script>
    	<script src="assets/vendor/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="assets/vendor/js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/vendor/js/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
		
		<script>
		$(document).ready(function() {
			var delay = 2000;
			$('#comp_scr').click(function(e){
				e.preventDefault();
				var compScore = $("input[name='compScore']:checked").val();
				var idy_gap = $('#idy_gap').val();
				var sug_impr = $('#sug_impr').val();
				var dataStr = "compScore="+compScore+"&idy_gap="+idy_gap+"&sug_impr="+sug_impr;
				alert(dataStr);
				$.ajax
					({
					 type: "POST",
					 url: "ins.php",
					 data: dataStr,
					 beforeSend: function() {
					 $('.message_box').php('<img src="Loader.gif" width="25" height="25"/>');
					 //This is the place it replaces the details shown above with the ones from the form
					 $('#evl_scr_msg').php(compScore);
					 $('#idy_gap_msg').php(idy_gap);
					 $('#sug_impr_msg').php(sug_impr);

					 },		 
					 success: function(data)
					 {
						 setTimeout(function() {
							$('.message_box').php(data);
						}, delay);

					 }
					 });
			});

		});

		</script>
    </body>
</html>

<?php
// <!-- Top Nav Bar -->
include "includes/top_nav.php";
//Get Staff Details

//This is the information gotten after the user has logged in. Session starts if it has not already started
if (!session_start() && empty($_SESSION['stf_name']) ){
	header("Location: upl_tsk_lst.php");
	exit();
}

if(!isset($_POST["evd_submit"])){
	header("Location: upl_tsk_lst.php");
	exit();
}
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
	$req_evl = "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#evl_msg'>Request Evaluation</button>";
}else{
	$req_evl = "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#evl_msg'>Request Re-evaluation</button>";
}
// <!-- Site bar -->
include "includes/sidebar.php";
?>
<div id="layoutSidenav_content">
				<!-- Content Body Here -->
                <main>
					<!-- Page Title Header -->
                    <div class="container-fluid px-4">
                        <h3 class="mt-4"><?php echo $stf_off;?></h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Staff Activity Submission Preview</li>
                        </ol>
						<div class="col-md-12">
								<table class="table">
									<thead>
										<tr>
											<th>Assigned Task to:</th>
											<th>&nbsp;</th>
											<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php echo $stf_fname; ?></td>
											<td><a href="upl_tsk_lst.php" class="btn btn-secondary">Return to Task List</a></td>
											<td><!-- Button trigger modal for requesting evaluation -->
												<?php echo $req_evl; ?>

												<!-- Modal -->
												<div class="modal fade" id="evl_msg" tabindex="-1" aria-labelledby="evl_msgLabel" aria-hidden="true">
												  <div class="modal-dialog modal-dialog-centered">
													<div class="modal-content">
													  <div class="modal-header">
														<h5 class="modal-title" id="evl_msgLabel">Request Evaluation</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													  </div>
													  <div class="modal-body">
														An Email has been sent to QA Admin requesting Evaluation or Re-evaluation of Evidences and score in Compliance
													  </div>
													  <div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
								<h5>Task Description and Details appear here</h5>
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
										<p><?php echo $evl_scr; ?>%</p>
									</div>
								</div>
								<hr>
								<div class="row col-12">
									<div class="col-6"><p><strong>Identified Gaps</strong></p><p><?php echo $idf_gap; ?>.</p></div>
									<div class="col-6"><p><strong>Suggested Improvements</strong></p><p><?php echo $sug_imp; ?></p></div>
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
               
<!-- Footer -->
<?php
include "footer.php";
?>
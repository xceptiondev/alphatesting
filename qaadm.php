<?php
// <!-- Top Nav Bar -->
include "includes/top_nav.php";

/* 
This page is for QA Only - Simply to assign roles to QA Admins and Oficers before they can perfrom their functions
Form elements created successfully. Form submits successfully.
*/
session_start();
$insMsg = "";
if (!empty($_SESSION['insMsg'])){
	$insMsg = $_SESSION['insMsg'];
}

require "my_conn.php";
$getQA = "SELECT qa_usr_id, stf_fname, stf_oname, stf_lname, stf_desgn, usr_cate.cate_displ_nm FROM stf_reg INNER JOIN qaroles ON stf_reg.reg_id = qaroles.stf_reg_id INNER JOIN usr_cate ON qaroles.qa_cate = usr_cate.usr_cate_id";
$qars = $conn->query($getQA);

//User Category Table for QA Admins but not Super Admin or MIS included here. If there are any changes in the User category table, replace their IDs here
$qa_usr_cate = "SELECT usr_cate_id, cate_displ_nm FROM `usr_cate` WHERE `usr_cate_id` IN (3,5,6,7,8,9) ORDER BY cate_displ_nm";
$qa_cates = $conn->query($qa_usr_cate);
if ($qa_cates->num_rows > 0){
	$c = 0;
	while ($cate_lst = $qa_cates->fetch_array()) {
		$catzid[$c] = $cate_lst['usr_cate_id'];
		$catznm[$c] = $cate_lst['cate_displ_nm'];
		$c++;
	}
}
// <!-- Site bar -->
include "includes/sidebar.php";
?>
            <div id="layoutSidenav_content">
				<!-- Content Body Here -->
                <main>
					<!-- Page Title Header -->
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Manage QA Roles</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Assign QA Officers to Roles</li>
                        </ol>
                        
                         <!--Page body comes here-->   
                        <div class="row">
							<div class="col-xl-10">
								<h4>Registered QA Staff</h4>
								<p style="color: darkgreen; font-size: 18px; font-weight: bold;"><?php echo $insMsg; unset($_SESSION['insMsg']); $insMsg = ""; ?></p>
								<?php
								if ($qars->num_rows > 0){
									$gtno = $qars->num_rows;
									?>
								<table class="table table-hover">
									<thead>
										<tr>
											<th scope="col">Full Name</th>
											<th scope="col">Designation</th>
											<th scope="col">Assigned Role</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$c =0;
									//$cate_lst = $qa_cates->fetch_assoc();
									//Place the registered QA Staff Details in the table here
									while($gtrw = $qars->fetch_array()) {
										$qaID = $gtrw['qa_usr_id'];
										$qafnm = $gtrw['stf_fname'];
										$qaonm = $gtrw['stf_oname'];
										$qalnm = $gtrw['stf_lname'];
										$qastf_pos = $gtrw['stf_desgn'];
										$qastf_r = $gtrw['cate_displ_nm'];
										echo "<tr>";
										echo "<td>$qafnm $qaonm $qalnm</td>";
										echo "<td>$qastf_pos</td>";
										echo "<td>$qastf_r</td>";
										echo "<td>";
										//Place form with list of user categories and user ID here
										$fomnm = "form".$qaID;
										
										if (count($catzid) != 0){
											?>
											<form method="POST" name="<?php echo $fomnm; ?>" action="qacate.php">
												<input type="hidden" name="qa_ro_id" value="<?php echo $qaID; ?>">
											<?php
											for ($i=0; $i<count($catzid); $i++) {
												?>
												<div class="form-check form-check-inline">
												  <input class="form-check-input" type="radio" name="qa_catz" id="catsz" value="<?php echo $catzid[$i]; ?>">
												  <label class="form-check-label" for="inlineRadio1"><?php echo $catznm[$i]; ?></label>
												</div>
												
												<?php
											}
											?>
												<div class="form-check">
													<button type="button" name="hide" class="btn btn-secondary">Dont Change</button>
													<button type="submit" name="asnr" class="btn btn-primary">Change Role</button>
												</div>
										</form>
											
											<?php
										}else{
											echo "<span style='color: darkgreen; font-size: 18px>QA Categories <b>HAS NOT</b> been set yet! Contact Web Admin for assistance</span>";
										}
										echo "</td>";
										echo "</tr>";
									}								
									?>	
									</tbody>
								</table>
										<?php
									$qars->close();
									//Get the User Categories for QA that they will be assigned to
								}else{
									echo "<p style='color:darkgreen; font-size: 18px;'>QA StafF <b>HAS NOT REGISTERED</b> here yet! Please register first.</p>";
									$conn->close();
								}
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
		<script type="text/javascript">
			
		</script>
		<!--
        <script src="assets/vendor/js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/vendor/js/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>-->
    </body>
</html>

<?php
// <!-- Top Nav Bar -->
include "includes/top_nav.php";
// <!-- Site bar -->
include "includes/sidebar.php";

/*
This page allows Admins to manage user categories for user who will be accessing the system
*/
//Include the Session variables here for admins who should access this page. Check from the database if the user has authority to access this page
//Session check comes here

$sqlMsg = "";
//Get the list of categories from the DB
$getCate = "SELECT * FROM `usr_cate`";
require "my_conn.php";
if (!$cat_rs = $conn->query($getCate)){
	$sqlMsg = "Unable to query records from the database";
	exit();
}

if (!$cat_rs->num_rows > 0){
	$sqlMsg ="No record found";
}								
?>

            <div id="layoutSidenav_content">
				<!-- Content Body Here -->
                <main>
					<!-- Page Title Header -->
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">User Access Administration </h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Manage User Categories</li>
                        </ol>
                        
                         <!--Page body comes here-->   
                        <div class="row">
							<div class="col-xl-6">
								<!-- Button trigger Add Category modal -->
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
								  Add Category
								</button>

								<!-- Modal to Add Useer Category-->
								<div class="modal fade" id="addCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
								  <div class="modal-dialog  modal-lg">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="addCategoryLabel">Add new Category</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									  </div>
									  <div class="modal-bod">
										  <div class="container-fluid">
										  <!-- Here is the form to Add Categories -->
											  <form method="POST" action="incate.php">
												  <div class="row mt-3">
													  <div class="col-md-6 mb-3">
														  <label for="catenm" class="form-label">Category Name</label>
														  <input type="text" class="form-control" maxlength="25" name="catenm">
													  </div>
													  <div class="col-md-6 mb-3">
														  <label for="catesm" class="form-label">Category Short Name</label>
														  <input type="text" class="form-control" maxlength="10" name="catesm">
													  </div>
												  </div>
												  <div class="row mt-3">
													  <div class="col-md-12 mb-3">
														  <label for="catedesc" class="form-label">Category Description</label>
														  <textarea name="catedesc" class="form-control"></textarea>
													  </div>
												  </div>
												  <div class="row">
													  <div class="col mb-3" align="center">
														  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														  <button type="submit" class="btn btn-primary" name="addCate">Save</button>
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
								<!-- End of Modal to Add Category -->
							</div>
							<div class="col-xl-6">
								<div style="color: darkgreen; font-weight: bold;">
									<?php 
									if (!empty($_SESSION['insMsg'])){
										$sqlMsg = $_SESSION['insMsg'];
										echo $sqlMsg;
										unset($_SESSION['insMsg']);
									}else{
										echo $sqlMsg;
									}
									
									?>
								</div>
							</div>
								                            
                        </div> <!-- End of row -->
						<div class="row mt-4">
							<div class="col-md-10 ">
								<?php
								if ($cat_rs->num_rows > 0){
									?>
									<table class="table table-hover table-responsive">
										<thead>
											<tr>
												<th>Category Name</th>
												<th>Category Short Name</th>
												<th>Category Description</th>
												<th>&nbsp;</th>
											</tr>
										</thead>
										<tbody>
											<?php
											while($rw = $cat_rs->fetch_array()) {
												$CateID = $rw['usr_cate_id'];
												$CateNm = $rw['cate_displ_nm'];
												$CateSm = $rw['cate_code'];
												$CateDes = $rw['cate_desc'];
												echo "<tr>";
												echo "<td>$CateNm</td>";
												echo "<td>$CateSm</td>";
												echo "<td>$CateDes</td>";
												echo "<td>";
												?>
												<!-- Here we place a button to edit each category-->
												<!-- Button trigger Edit Category modal -->
												<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editCategory"
														data-bs-cateid="<?php echo $CateID; ?>"
														data-bs-catenm="<?php echo $CateNm; ?>"
														data-bs-catesm="<?php echo $CateSm; ?>"
														data-bs-catedesc="<?php echo $CateDes; ?>">
												  Edit Category
												</button>

												<!-- Modal to Edit User Category-->
												<div class="modal fade" id="editCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
												  <div class="modal-dialog  modal-lg">
													<div class="modal-content">
													  <div class="modal-header">
														<h5 class="modal-title" id="editCategoryLabel">Edit Category</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													  </div>
													  <div class="modal-bod">
														  <div class="container-fluid">
														  <!-- Here is the form to Add Categories -->
															  <form method="POST" action="incate.php">
																  <div class="row mt-3">
																	  <div class="col-md-6 mb-3">
																		  <label for="catenm" class="form-label">Category Name</label>
																		  <input type="text" class="form-control" maxlength="25" name="catenm" id="catenm">
																	  </div>
																	  <div class="col-md-6 mb-3">
																		  <label for="catesm" class="form-label">Category Short Name</label>
																		  <input type="text" class="form-control" maxlength="10" name="catesm" id="catesm">
																	  </div>
																  </div>
																  <div class="row mt-3">
																	  <div class="col-md-12 mb-3">
																		  <label for="catedesc" class="form-label">Category Description</label>
																		  <textarea name="catedesc" id="catedesc" class="form-control"></textarea>
																	  </div>
																	  <div class="col-md-6 mb-3">
																		  <label for="cateid" class="form-label" hidden="">Category</label>
																		  <input type="hidden" class="form-control" maxlength="20" name="cateid" id="cateid">
																	  </div>
																  </div>
																  <div class="row">
																	  <div class="col mb-3" align="center">
																		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																		  <button type="submit" class="btn btn-primary" name="edtCate">Update</button>
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
												<!-- End of Modal to Add Category -->
												
												<?php
												echo "</td>";
												echo "</tr>";
											}
											$cat_rs->close();
											?>
										</tbody>
									</table>
									<?php
								}
								$conn->close();
								?>
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
			var editCategory = document.getElementById('editCategory')
			editCategory.addEventListener('show.bs.modal', function (event) {
			  // Button that triggered the modal
			  var button = event.relatedTarget
			  // Extract info from data-bs-* attributes
			  var cateid = button.getAttribute('data-bs-cateid')
			  var catenm = button.getAttribute('data-bs-catenm')
			  var catesm = button.getAttribute('data-bs-catesm')
			  var catedesc = button.getAttribute('data-bs-catedesc')
			  // If necessary, you could initiate an AJAX request here
			  // and then do the updating in a callback.
			  //
			  // Update the modal's content.
			  var modalTitle = editCategory.querySelector('.modal-title')
			  //var modalBodyInput = editCategory.querySelector('.modal-body input')
			  var cnm = document.getElementById("catenm");
			  var csnm = document.getElementById("catesm");
			  var cdesc = document.getElementById("catedesc");
			  var cid = document.getElementById("cateid");

			  modalTitle.textContent = 'Edit category ' + catenm
			  //modalBodyInput.value = catenm
				cnm.value = catenm;
			  csnm.value = catesm;
			  cdesc.value = catedesc;
			  cid.value = cateid;
			})
		</script>
    	<script src="assets/vendor/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script><!--
        <script src="assets/vendor/js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/vendor/js/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>-->
    </body>
</html>

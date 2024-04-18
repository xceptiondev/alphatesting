<?php
// <!-- Top Nav Bar -->
include "includes/top_nav.php";
// <!-- Site bar -->
include "includes/sidebar.php";
?>
         
<div id="layoutSidenav_content">
				<!-- Content Body Here -->
                <main>
					<?php
				if (isset($_POST['evd_submit'])){
	$tsk_id = $_POST['tsk_id'];
	$tsk_desc = $_POST['tsk_desc'];
	$date_asn = $_POST['dat_asn'];
}
?>
					<!-- Page Title Header -->
                    <div class="container-fluid px-4">
                        <h3 class="mt-4"><?php echo $stf_off; ?></h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Upload Task/Activity Evidence</li>
                        </ol>
                        
                            
                        <div class="row">
							<div class="col-xl-12">
								
								<table class="table">
									<thead>
										<tr>
											<th>Assigned Task to:</th>
											<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php echo $stf_fname .$stf_id; ?></td>
											<td><a href="upl_tsk_lst.php" class="btn btn-success">Return to Task List</a></td>
										</tr>
									</tbody>
								</table>
								<h5>Submit Evidence for this Task</h5>
								
								<!-- This form to upload evidence for the task assigned to staff -->
								
								<form class="row g-3" method="POST" action="upl.php" enctype="multipart/form-data">
								  <div class="col-md-6">
									<label for="tsk_asn" class="form-label">Task Assigned</label>
 									<input type="text" disabled class="form-control" id="tsk_asn" value="<?php echo $tsk_desc; ?>">
									<input type="hidden" name="tsk_id" value="<?php echo $tsk_id; ?>">
								  </div>
								  <div class="col-md-4">
									<label for="date_asn" class="form-label">Date Assigned</label>
 									<input type="text" readonly class="form-control" id="date_asn" name="date_asn" value="<?php echo $date_asn; ?>">
									<!--<input type="hidden" class="form-control" id="date_asn" name="date_asn" value="<?php echo $date_asn; ?>">-->
									<input type="hidden" name="stf_id" value="<?php echo $stf_id; ?>">
									<input type="hidden" name="off_id" value="<?php echo $stf_off_id; ?>">
								  </div>
								  <div class="col-md-2">
									<div>Task Status</div>
										  	<div class="form-check">
											  <input class="form-check-input" type="radio" name="tsk_stat" id="tsk_completed" value="Completed" required>
											  <label class="form-check-label" for="tsk_completed">Completed</label>
											</div>
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="tsk_stat" id="tsk_uncompleted" value="Uncompleted">
											  <label class="form-check-label" for="tsk_uncompleted">Uncompleted</label>
											</div>
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="tsk_stat" value="Discontinued" id="tsk_discontinued">
											  <label class="form-check-label" for="tsk_discontinued">Discontinued</label>
											</div>
								  </div>
								  <div class="col-4">
									<label for="formFile" class="form-label">Upload Picture Evidence</label>
  									<input class="form-control" type="file" id="img_evd" name="img_evd" accept="image/jpeg, image/png, .jpg" required>
									<p>[MAX FILE SIZE = 2MB]</p>
									<p id="img_msg"></p>
								  </div>
								  <div class="col-4">
									<label for="formFile" class="form-label">Upload PDF Document Evidence</label>
  									<input class="form-control" type="file" id="pdf_evd" name="pdf_evd" accept=".pdf, application/pdf" >
  									<p>[MAX FILE SIZE = 2MB]</p>
									<p id="pdf_msg"></p>
								  </div>
								  <div class="col-4">
									<label for="formFile" class="form-label">Upload Short Video Evidence</label>
  									<input class="form-control" type="file" id="vid_evd" name="vid_evd" accept=".mp4" disabled>
								  </div>
								  <div class="col-4" id="img_prevw">&nbsp;</div>
								  <div class="col-4" id="pdf_prevw">&nbsp;</div>
								  <div class="col-4">&nbsp;</div>
								  <div class="col-6">
									<button type="submit" class="btn btn-primary" name="upl" id="file-submit">Upload Evidence</button>
								  </div>
								  <div class="col-6">
									<button type="reset" class="btn btn-success" name="reset-form" id="reset-form">Reset</button>
								  </div>
								</form>
								
								<!-- End of form -->
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
		<script type="text/javascript">
			//Input image and message on size
			let imgInput = document.getElementById("img_evd");
			let imgMsg = document.getElementById("img_msg");

			//Input pdf and message on size
			let pdfInput = document.getElementById("pdf_evd");
			let pdfMsg = document.getElementById("pdf_msg");
			
			let fileSubmit = document.getElementById("file-submit");

			//Create image tag that will preview the selected image
			  const img_view = document.createElement("img");
			  img_view.src = "";
			  document.getElementById("img_prevw").appendChild(img_view);

			  //Listen to activity on the form for change in image input element
			  imgInput.addEventListener("change", function () {
			  var selectedFile = imgInput.files[0];
			  var allowedImgTypes = ['image/jpeg', 'image/png'];


			  if (!allowedImgTypes.includes(selectedFile.type)){
			  	var invFile =document.getElementById("img_evd");
				alert('Invalid file selected. Please select an image JPEG, JPG or PNG file');
				invFile.value = "";
				return;				
			  }
			if (imgInput.files.length > 0) {
			  const fileSize = imgInput.files.item(0).size;
			  const fileMb = fileSize / 1024 ** 2;
			  if (fileMb >= 2) {
			  	//invFile.value = "";
				imgMsg.innerHTML = "<span style='color: red;'><strong>Please select a file less than 2MB.</strong></span>";
				fileSubmit.disabled = true;
			  } else {
				imgMsg.innerHTML = "Success, your Image file size at " + fileMb.toFixed(1) + "MB is accepted.";
				fileSubmit.disabled = false;
				var reader = new FileReader();
				
				img_view.width = 400;			//Image: set width and height to display on page
				img_view.height = 600;

				const file = imgInput.files;
				reader.onload = event => {
				  img_view.setAttribute('src', event.target.result);
				}
				reader.readAsDataURL(file[0]);
				document.getElementById("img_prevw").appendChild(img_view);
			  }
			}
		  });
			 //Listen to the selected PDF file
			 pdfInput.addEventListener("change", function () {
			  var selectedFile = pdfInput.files[0];
			  var allowedImgTypes = ['application/pdf'];
			  const ifr = document.createElement("iframe");
			  
			  ifr.style.width = "400px";
			  ifr.style.height = "600px";
			  ifr.setAttribute("src", "");
			  //document.getElementById("pdf_prevw").appendChild(ifr);
			  document.getElementById("pdf_prevw").removeChild(document.getElementById("pdf_prevw").lastChild);
			  


			  if (!allowedImgTypes.includes(selectedFile.type)){
			  	var invFile =document.getElementById("pdf_evd");
			  	fileSubmit.disabled = true;
				alert('Invalid file selected. Please select a PDF document file');
				invFile.value = "";
				return;				
			  }
			if (pdfInput.files.length > 0) {
			  const fileSize = pdfInput.files.item(0).size;
			  const fileMb = fileSize / 1024 ** 2;
			  if (fileMb >= 2) {
			  	//invFile.value = "";
				pdfMsg.innerHTML = "<span style='color: red; font-size: 18px;'><strong>Please select a file less than 2MB.</strong></span>";
				fileSubmit.disabled = true;
			  } else {
				
				pdfMsg.innerHTML = "Success, your PDF file size at " + fileMb.toFixed(1) + "MB is accepted.";
				pdf_url = URL.createObjectURL(selectedFile);
				ifr.setAttribute("src", pdf_url);
				document.getElementById("pdf_prevw").appendChild(ifr);
				fileSubmit.disabled = false;
			  }
			}
		  });
			 
			

	   </script>
	   
    	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script><!--
        <script src="assets/vendor/js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/vendor/js/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>-->
    </body>
</html>

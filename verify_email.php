<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>NOUN Staff Performance Evaluation System</title>
		<script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
        <link href="assets/vendor/css/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="assets/vendor/js/all.js" crossorigin="anonymous"></script>
		
		<!-- Sweet Alert Scripts -->
		<script type="text/javascript" src="assets/vendor/swal/dist/sweetalert2.all.min.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/vendor/swal/dist/sweetalert2.all.min.css">
    </head>
    <body>
		<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html"><img src="assets/img/QA_logo.png" width="131" height="80" alt="NOUN Quality Assurance Directorate"/> <span class="d-none d-lg-inline">Staff Performance Evaluation System</span> </a>
            <!-- Sidebar Toggle hamburger button 
          <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button> -->
            <!-- Navbar Search
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form> End of Search bar -->
            <!-- User Info and dropdown comes here Navbar
			<span>Ikechukwu Akujobi</span>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Messages</a></li>
                        <li><a class="dropdown-item" href="#!">Change Password</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul> End of User info is here -->
    	</nav>
        <div id="layoutAuthentication" class="login-bg">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center ">
                            <div class="col-lg-5 ">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Verify Email</h3></div>
                                    <div class="card-body">
                                        <?php
										//This is testing the verify email section of the app
										if (isset($_GET['stf_token'])){
											// Get token details from the link. Either email link or link from redirection from the resgistration page
											$get_eml_token = $_GET['stf_token'];
											$off_mail = "@noun.edu.ng";
											$stfv_d = explode("_", $get_eml_token, -1);
											$stf_token = $stfv_d[0];
											$stf_id = $stfv_d[1];
											$stf_eml = $stfv_d[2].$off_mail;
											//echo "This token sent $get_eml_token";
											//Create a form where user will enter the token
											?>
											
											<form name="vTo" method="POST" action="">
												<div class="form-floating mb-3">
													<input class="form-control" id="stf_email" name="stf_email" type="email" value="<?php echo $stf_eml ?>" hidden placeholder="name@example.com" required />
													<label for="stf_email">Email address</label>
												</div>
												<div class="form-floating mb-3">
													<input class="form-control" id="stf_tkn" name="stf_tkn" type="text" placeholder="Password" required />
													<label for="stf_tkn">Token</label>
												</div>

												<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
													<button type="submit" name="submit_tkn" class="btn btn-primary">Verify Email</button>
													<!--<a class="btn btn-primary" href="index.html">Verify Email</a>-->
												</div>
                                        	</form>
											<?php
										}else{
											//If the link was not followed and user clicked Verify Email from the Login page. Create the form where he will enter his email and token.
											echo "<p><strong>Please provide your official Email and Token sent to your Email</strong></p>";
											?>
											<form name="vTo" method="POST" action="">
												<div class="form-floating mb-3">
													<input class="form-control" id="stf_email" name="stf_email" type="email" placeholder="name@example.com" required/>
													<label for="stf_email">Email address</label>
												</div>
												<div class="form-floating mb-3">
													<input class="form-control" id="stf_tkn" name="stf_tkn" type="text" placeholder="Password" required />
													<label for="stf_tkn">Token</label>
												</div>

												<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
													<button type="submit" name="submit_tkn" class="btn btn-primary">Verify Email</button>
													<!--<a class="btn btn-primary" href="index.html">Verify Email</a>-->
												</div>
                                        	</form>
											<?php
										}
										if (isset($_POST['submit_tkn'])){
											require "my_conn.php";													//Connect to DB
											$stf_eml = $_POST['stf_email'];
											$eml_toks = $_POST['stf_tkn'];

											$chk_tkn = "SELECT reg_id, stf_fname, stf_lname, reg_token FROM stf_reg WHERE stf_email = ? AND substring(reg_token, 1, 10) = ?";

											$rs = $conn->prepare($chk_tkn);
											$rs->bind_param("ss", $stf_eml, $eml_toks);
											$rs->execute();
											$stf_d = $rs->get_result();

											if ($stf_d->num_rows>0){
												while ($row = $stf_d->fetch_assoc()){
													$get_ID = $row['reg_id'];
													$get_Fname = $row['stf_fname'];
													$get_Lname = $row['stf_lname'];
												}
												$upd_rec = "UPDATE stf_reg SET v_stat = 1, usr_cate=2 WHERE reg_id = ?";
												$rs_upd = $conn->prepare($upd_rec);
												$rs_upd ->bind_param('i', $get_ID);
												if ($rs_upd->execute()){
													echo "Staff Verification Complete - Status changed Successfully";
													?>
													<script type="text/javascript">

														$(document).ready(function(){
															var ve = "verify_email.php";
														  Swal.fire({
															icon: "success",
															title: "CONGRATS",
															text: "Your Email has been verified successfully!"
														  }).then(function (){
															window.location.href = "index.php"; 	/*This need to be replaced with the actual web address */	
														  })
														});
														//window.location = "verify_email.php";
														</script>
													<?php
													
												}else{
													echo "The Update didnt work....Check your SQL Query and try again";
												}
												
												//echo "CONGRATS <br>". ucfirst($get_Fname)." ".ucfirst($get_Lname)."<br>Yes token has been submitted. Email Verified Successfully";
												
											}else{
												echo "<p style='color: orange;''><strong>We couldn't find your record. Please contact Admin</p><strong>";
											}

										}

										?>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Click here to register!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted" align="center">Copyright &copy; NOUN Directorate of Quality Assurance 2024</div>
                            <div>
                                <a href="#">Powered by DMIS</a>
                                &middot;
                                <a href="#">Enquiries & Feedback</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

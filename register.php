<?php
/*
This version of register can update staff registration table with staff office ID and also the User account table.
Tested and working fine.
*/
?>
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
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Staff Registration</h3></div>
                                    <div class="card-body">
										<?php
										// if form not yet submitted
										// display form
										if (!isset($_POST['submit'])) {
										?>
                                        <form name="chk_conf_pwd" onsubmit="return ConfirmPWD()" method="POST" action="" class="row g-3 needs-validation" novalidate>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="stf_id" name="stf_id" type="number" placeholder="name@example.com" required />
                                                <label for="stf_id">Staff ID</label>
												<div class="invalid-feedback">Your Staff ID is required</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="stf_email" name="stf_email" type="email" placeholder="name@example.com" required />
                                                <label for="stf_email">Staff Email address</label>
												<div class="invalid-feedback">Your Staff Email is required</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="stf_pwd" name="stf_pwd" type="password" placeholder="Create a password" required />
                                                        <label for="stf_pwd">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="confm_pwd" name="confm_pwd" type="password" placeholder="Confirm password" required />
                                                        <label for="confm_pwd">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-success btn-block" name="submit" type="submit">Create Account</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="index.php">Have an account? Go to login</a></div>
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
                            <div class="text-muted" align="center">Copyright &copy; NOUN Directorate of Quality Assurance <?php echo date("Y"); ?></div>
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
        <script src="assets/vendor/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
		<script type="text/javascript">
			function ConfirmPWD(){
				var stf_id = document.forms["chk_conf_pwd"]["stf_id"].value;
				
				var stf_pwd = document.forms["chk_conf_pwd"]["stf_pwd"].value;
				var chk_pwd = document.forms["chk_conf_pwd"]["confm_pwd"].value;

				//For Valid Emails
				let stf_eml = document.forms["chk_conf_pwd"]["stf_email"].value;
				let chk_stf_eml = stf_eml.includes("@noun.edu.ng");

				//Check for empty fields
				if (stf_id =="" || stf_eml ==""){
					Swal.fire({										// If its empty and it does match confirm password field
						icon: "error",
						title: "Error...",
						text: "Staff ID and Staff Email are required"
					});
					return false;
				}

				if (stf_pwd == "" || stf_pwd != chk_pwd){		//Check if the field is not empty and it matches
					Swal.fire({										// If its empty and it does match confirm password field
						icon: "error",
						title: "Password Error...",
						text: "Password is INVALID or DON'T match!!!"
					});
					return false;

				}else if(chk_stf_eml === false){
					Swal.fire({										// If its empty and it does match confirm password field
						icon: "error",
						title: "Oops...",
						text: "Email is INVALID. ONLY Official Email Required!"
					});
					return false;
					
				}				
			}
		</script>
    </body>
</html>

<?php
}else{			//After form is submitted, get what was submitted from the form
	$stf_id = ltrim($_POST['stf_id'], "0");					//Get staff ID from the form
	$stf_email = $_POST['stf_email'];			//Get staff email from form
	$stf_pwd = $_POST['stf_pwd'];				//Get staff password from form

	//See what is retrieved from the form - This part will be deleted once we are sure its working
	/*echo "Staff ID: ". $stf_id."<br>";
	echo "Staff Email: ". $stf_email."<br>";
	echo "Staff Password: ". $stf_pwd."<br>";*/

	//Check if submitted email is valid official email
	$off_email_ends = "@noun.edu.ng";
	$chk_email = strpos($stf_email, $off_email_ends);
	if ($chk_email === false){
		echo "Email is NOT a valid Official Email. Contact ICT to rectify this...";
	}

	require "my_conn.php";				//Connects to DB to check if the record exists in Master List
	$get_rec = "SELECT * FROM stf_mas_tbl WHERE stf_ID = ? AND Stf_email = ?";	//Check if record is on the Master List
	$chk_reg = "SELECT * FROM stf_reg WHERE stf_ID = '$stf_id' AND Stf_email = '$stf_email'"; 		//Check if staff has registered before

	//Here we execute the query to search for the record of the staff
	if ($res = $conn->prepare($get_rec)){
		$res -> bind_param("ss", $stf_id,  $stf_email);
		$res->execute();
		$stf_rec = $res->get_result();
		//printf($row);
		if ($stf_rec->num_rows > 0){		//If record exists this will be more than 0
			while ($row = $stf_rec->fetch_assoc()){
				$Stf_recID = $row["rec_id"];
				$Stf_fname = $row["Stf_fname"];
				$Stf_oname = $row["Stf_oname"];
				$Stf_lname = $row["Stf_lname"];
				$Stf_ID = $row["stf_ID"];
				$Stf_email = $row["Stf_email"];
				$stf_posn = $row["stf_posn"];
				$stf_off = $row["stf_off"];
			}
			if ($chk_res = $conn->query($chk_reg)){			//Check if user has registered before
				if ($chk_res->num_rows > 0){
					while ($getUsr = $chk_res->fetch_assoc()){
						$v_stat = $getUsr['v_stat'];				//Check email verification status of user. If user has verified earlier he can go to log in.
						$stf_token = $getUsr['reg_token'];
					}
					if ($v_stat == 0){
						// echo "User has already registered but has not verified their email. Please click on Verify Email on the Login page.";
						//Get User details and join them to one. Email section remove the @noun. Create Session key.
						$vstf_eml_pt = explode("@", $stf_email);
						$vstf_id = $stf_id;
						$_SESSION['stf_key'] = rand(10000, 999999);
						$v_data = $stf_token."_".$vstf_id."_".$vstf_eml_pt[0]."_".$_SESSION['stf_key'];
						$stfv_data = json_encode($v_data);
						echo "<br>";
						echo "Processing data. Please wait ...";
						echo "<script>var v_data = '$stfv_data';</script>";

						//verify_email.php?stf_token=" + v_data
						?>
						<script type="text/javascript">

						$(document).ready(function(){
							var ve = "verify_email.php?stf_token=" + v_data;
						  Swal.fire({
						    icon: "info",
						    title: "Staff has already registered",
						    text: "Proceed to Verify your Email!"
						  }).then(function (){
						  	window.location.href = "verify_email.php?stf_token=" + v_data; 	/*This need to be replaced with the actual web address */	
						  })
						});
						//window.location = "verify_email.php";
						</script>
						
						<?php
					}else{
						echo "User has already registered and verified. Please login to continue";
						?>
						<script type="text/javascript">

						$(document).ready(function(){
							var ve = "verify_email.php";
						  Swal.fire({
						    icon: "info",
						    title: "Staff has already registered",
						    text: "Verification completed, proceed to Login"
						  }).then(function (){
						  	window.location.href = "index.php";
						  })
						});
						//window.location = "verify_email.php";
						</script>
						
						<?php
					}				
					
				}else{												//if the record does not exist then continue with the registration process
					//Get current Date and Time, get user staff ID and email and hash it using md5. This is used for the token generation
					//Insert record from the Master list to the Registration table here
					$reg_dateTime = date('Y-m-d H:i:s');
					$usrIP = $_SERVER['REMOTE_ADDR'];
					$usrBInfo = $_SERVER['HTTP_USER_AGENT'];

					$stfTokenInfo = $reg_dateTime.$Stf_email.$Stf_ID;
					$stfToken = hash('md5', $stfTokenInfo);

					$vstf_eml_pt = explode("@", $Stf_email);
					$vstf_id = $Stf_ID;
					$_SESSION['stf_key'] = rand(10000, 999999);

					//Verification data
					$v_data = $stfToken."_".$vstf_id."_".$vstf_eml_pt[0]."_".$_SESSION['stf_key'];
					$stfv_data = json_encode($v_data);
					echo "<script>var v_data = '$stfv_data';</script>";

					//Insert query for staff registration table - ALL Fields Template
					/* 
					$stf_RegTbl = "INSERT INTO stf_reg (reg_id, stf_fname, stf_oname, stf_lname, stf_id, stf_email, stf_desgn, stf_passw, reg_token, reg_date, stf_ip, stf_dev_info) VALUES ('', '$Stf_fname', '$Stf_oname','$Stf_lname', '$Stf_ID', '$Stf_email', '$stf_des', '$stf_pwd', '$stfToken', '$reg_dateTime', '$usrIP', '$usrBInfo'
					*/
					//Check if the Staff office is available and correct and insert the ID of office into staff registration table
					if (!empty($stf_off)){
						$getOffID = "SELECT off_lst_id, off_nm FROM off_lst";
						$rs = $conn->query($getOffID);
						if ($rs->num_rows > 0){
							while($rw = $rs->fetch_array()) {
								//echo $rw['off_lst_id'] . ":" . $rw['off_nm'] . "<br>";
								$off_id = $rw['off_lst_id'];
								$off_nm = $rw['off_nm'];
								//$pos = strpos($off_nm, $stf_off);
								if (preg_match("/\b{$stf_off}\b/i", $off_nm)){
									//echo "Found the Office ID $off_id and <br> Office Name is $off_nm";
									$stf_off = $off_id;
									break;
								}

							}
						}
					}

					//Insert records to Staff Registration table
					$stf_RegTbl = "INSERT INTO stf_reg (stf_fname, stf_oname, stf_lname, stf_id, stf_email, stf_desgn, stf_off, stf_passw, reg_token, reg_date, stf_ip, stf_dev_info) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
					
					if ($ins_rec = $conn->prepare($stf_RegTbl)){
						$ins_rec->bind_param('sssssssissss', $Stf_fname, $Stf_oname,$Stf_lname, $Stf_ID, $Stf_email, $stf_posn,$stf_off, $stf_pwd, $stfToken, $reg_dateTime, $usrIP, $usrBInfo);
						if ($ins_rec->execute()){
							$rec_reg_id = $conn->insert_id; //Get the ID of the inserted record and insert into user account
							$usr_acc = "INSERT INTO usr_acc (stf_reg_id, stf_id_no, stf_mail, usr_pwd) VALUES ($rec_reg_id, $Stf_ID, '$Stf_email','$stf_pwd')";
							if ($conn->query($usr_acc) === true){
								echo "User Account created successfull <br>";
							}else{
								echo "ERROR: Could not execute query: $usr_acc. " . $conn->error;
							}
							echo "User Registration Succesful!";
							?>
						<script type="text/javascript">

						$(document).ready(function(){
							var ve = "verify_email.php";
						  Swal.fire({
						    icon: "success",
						    title: "User Registration Succesful!",
						    html: 'A <b>Token</b> has been sent to your Email. Enter the <b>Token</b> to complete the registration process'
						  }).then(function (){
						  	window.location.href = "verify_email.php?stf_token=" + v_data ;
						  })
						});
						//window.location = "verify_email.php";
						</script>
						
						<?php
						}else{
							echo "ERROR: Unable to complete the registration. Please contact Admin.". $conn ->error;
						}
					}else{
						echo "ERROR: Could not prepare query for Staff Registration. ". $conn ->error;
					}
				}
				$chk_res->close();	
			}else{
				echo "Unable to check user registration status. Contact Admin";
			}
			$res->close();					
		}else{														//If the record is not found on the Master List say something
			echo "Record NOT found on the Master List. Please contact Admin";
			?>
			<script type="text/javascript">
				$(document).ready(function(){
					Swal.fire({
						title: "Record NOT Found on the Master List",
						text: "Do you wish to try again",
						showDenyButton: true,
						showCancelButton: false,
						confirmButtonText: "Yes, try again",
						denyButtonText: "No need"
					}).then((result) => {
						if (result.isConfirmed){
							window.location.href = "register.php";
						}else if (result.isDenied){
							window.location.href = "index.php";
						}
					})
				});
			</script>
			<?php
		}
	}else{
		echo "ERROR: Unable to prepare query on Master List. ";
	}																//Query execution ends here
	// close connection
	$conn->close();
}
?>

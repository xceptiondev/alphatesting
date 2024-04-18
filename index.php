<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>NOUN Quality Management System</title>
        <link href="assets/vendor/css/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="assets/vendor/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
		<nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php"><img src="assets/img/QA_logo.png" width="131" height="80" alt="NOUN Quality Assurance Directorate"/> <span class="d-none d-lg-inline site_logo_text">NOUN Quality Management System</span> </a>
    	</nav>
        <div id="layoutAuthentication" class="login-bg">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center ">
                            <div class="col-lg-5 ">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                    <form action="stf_login_code.php" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="uaccess" required maxlength="30">
                                        <label for="inputEmail">Staff ID</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="paccess" required maxlength="30">
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <!-- <input class="form-check-input" id="inputRememberPassword" type="checkbox" value=""/> -->
                                                <!-- <label class="form-check-label" for="inputRememberPassword">Remember Password</label> -->
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="r_password.php">Forgot Password?</a>
                                            <div class="mb-3">
                                            <button type="submit" name="login_btn" class="btn btn-success">Login</button>
                                            </div>
                                        </div> 
                                   
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">
											<a href="verify_email.php">Verify Email Token</a>
											<p>Or</p>
											<a href="register.php">You can Create Account here</a>
										</div>
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
                            <!--<div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>-->
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

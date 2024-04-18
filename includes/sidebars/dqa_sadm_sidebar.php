<!-- Site bar -->
<div id="layoutSidenav">
	<div id="layoutSidenav_nav">
		<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
			<div class="sb-sidenav-menu">
				<div class="nav">
					<div class="sb-sidenav-menu-heading"></div>
					<a class="nav-link active" href="qa_sadmin.php">
						<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
						DASHBOARD
					</a>
					<a class="nav-link" href="message_inbox.php">
						<div class="sb-nav-link-icon"><i class="fas fa-message"></i></div>
						MESSAGES
					</a>
					<a class="nav-link" href="upl_tsk_lst.php">
						<div class="sb-nav-link-icon"><i class="fas fa-file-arrow-up"></i></div>
						TASK UPLOAD
					</a>
					<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#qaAdmin" aria-expanded="false" aria-controls="qaAdmin">
							<div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
							QA ADMIN
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="qaAdmin" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="qaadm.php">Assign QA Roles</a>
								<a class="nav-link" href="m_e_admin_assign_users.php">Assign to Office</a>
								<a class="nav-link" href="asn_tsk.php">Assign Task</a>
								<a class="nav-link" href="man_sop.php">Manage SOP</a>
								<a class="nav-link" href="evl_off_lst.php">Evaluate Staff</a>
								<a class="nav-link" href="ass_tsk_evd.php">Assessments</a>
							</nav>
						</div>
					<div class="sb-sidenav-menu-heading">BACKEND ADMIN</div>
						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#manageOffice" aria-expanded="false" aria-controls="manageOffice">
							<div class="sb-nav-link-icon"><i class="fas fa-building-columns"></i></div>
							NOUN OFFICES
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="manageOffice" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="man_off_cate.php">Office Category</a>
							<a class="nav-link" href="man_off.php">Office List</a>
						</nav>
					</div>
					<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#manageStaff" aria-expanded="false" aria-controls="manageStaff">
						<div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
						REGISTRATION
						<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
					</a>
					<div class="collapse" id="manageStaff" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
						<nav class="sb-sidenav-menu-nested nav">
							<a class="nav-link" href="stf_mas_list.php">Staff Master List</a>
							<a class="nav-link" href="stf_reg_list.php">Registered Staff</a>
						</nav>
					</div>
					<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#manageUsers" aria-expanded="false" aria-controls="manageUsers">
						<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
						MANAGE USERS
						<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
					</a>
					<div class="collapse" id="manageUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
						<nav class="sb-sidenav-menu-nested nav">
							<a class="nav-link" href="usr_act.php">User Accounts</a>
							<a class="nav-link" href="usr_priv.php">User Privileges</a>
							<a class="nav-link" href="user_ac_cate.php">User Category</a>
						</nav>
					</div>
			</div>
		</div>
	</nav>
</div>
<!-- End Site bar -->
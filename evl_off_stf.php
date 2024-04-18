<?php
// <!-- Top Nav Bar -->
include "includes/top_nav.php";
// <!-- Site bar -->
include "includes/sidebar.php";

//Get QA Admin details here
// session_start();
// $qa_adm_stf_nm = $_SESSION['adm_stf_nm'];
// $qa_adm_stf_id = $_SESSION['adm_stf_id'];
// $qa_adm_unit = $_SESSION['adm_unit'];

//Assuming these are the Staff Details. These values shall be gotten from the DB table
// $stf_id = 12;
// $stf_off = 24;
// $off_nm = "Directorate of Management Information Systems";
// $stf_fname = "Ikechukwu";
// $stf_lname = "Akujobi";
// $stf_fu_nm = $stf_fname." ".$stf_lname;

//Making it avaulable in other related pages
// $_SESSION['stf_id'] = $stf_id;
// $_SESSION['stf_off'] = $stf_off;
// $_SESSION['off_nm'] = $off_nm;
// $_SESSION['stf_fu_nm'] = $stf_fu_nm;

$qa_adm_stf_nm = $_SESSION["stfname"];
$qa_adm_stf_id = $stf_id;
$qa_adm_unit = $_SESSION["stfoffice"];
?>
<div id="layoutSidenav_content">
<!-- Content Body Here -->
<main>
	<!-- Page Title Header -->
	<div class="container-fluid px-4">
		<h3 class="mt-4"><?php echo $qa_adm_unit; ?> Unit</h3>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active">Evaluate Staff Submissions</li>
		</ol>
		<?php

	if(isset($_POST['evl_tsk_btn'])){
    $offasn= mysqli_real_escape_string($conn, $_POST['offasn']);
    $stf_fu_nm = mysqli_real_escape_string($conn, $_POST['stfnm']);
	?>
			<!-- Office Selected Appears on top of Staff list table -->
			<div class="row">
				<div class="col-xl-8">
				<table class="table">
					<thead>
						<tr>
						<th scope="col">&nbsp;</th>
						<th scope="col">Office Selected</th>
						<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<tr>
									<th scope="row">1</th>
									<td><?php echo $offasn; ?></td>
									<td><a href="evl_off_lst.php" class="btn btn-info">Return back to Office List</a></td>
								  </tr>
								</tbody>
							  </table>
						  </div>
						</div>
                            
                        <div class="row">
							<div class="col-xl-12">
								<h4>Staff List</h4>
								<table class="table table-striped">
								  <thead>
									<tr>
									  <th scope="col">S/N</th>
									  <th scope="col">Staff</th>
									  <th scope="col">Action</th>
									</tr>									
								  </thead>
								  <tbody>
									<tr>
									  <th scope="row">1</th>
									  <td><?php echo $stf_fu_nm; ?></td>
									  <td>
										  <form method="POST" action="evl_stf_tsk_lst.php">
											  <input type="hidden" name="stf_id" value="<?php echo $stf_id; ?>">
											  <input type="hidden" name="stf_off" value="<?php echo $stf_off; ?>">
											  <input type="hidden" name="off_nm" value="<?php echo $off_nm; ?>">
											  <button type="submit" class="btn btn-secondary" name="stf_tsk_lst" id="stf_tsk_lst">View Staff Task List</button>
										  </form>
									  </td>
									</tr>
									<tr>
									  <th scope="row">2</th>
									  <td>Grace E. Iniobong</td>
									  <td><a href="evl_stf_tsk_lst.php" role="button" class="btn btn-dark">View Staff Task List</a></td>
									</tr>
									<tr>
									  <th scope="row">3</th>
									  <td>Festus O. Okaghare</td>
									  <td><a href="evl_stf_tsk_lst.php" role="button" class="btn btn-dark">View Staff Task List</a></td>
									</tr>
									<tr>
									  <th scope="row">4</th>
									  <td>Femi Olumide Daniels</td>
									  <td><a href="evl_stf_tsk_lst.php" role="button" class="btn btn-dark">View Staff Task List</a></td>
									</tr>
									<tr>
									  <th scope="row">5</th>
									  <td>Calista Majekodunmi Ogunjobi</td>
									  <td><a href="evl_stf_tsk_lst.php" role="button" class="btn btn-dark">View Staff Task List</a></td>
									</tr>
									<tr>
									  <th scope="row">6</th>
									  <td>Humfrey Aloysius Ene</td>
									  <td><a href="evl_stf_tsk_lst.php" role="button" class="btn btn-dark">View Staff Task List</a></td>
									</tr>
								  </tbody>
								</table>
								<?php
}
mysqli_close($conn);	?>
							</div>								                            
                        </div> <!-- End of row -->   
                    </div>
 <!-- Footer -->
<?php
include "footer.php";

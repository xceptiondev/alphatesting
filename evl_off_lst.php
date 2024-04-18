<?php
// <!-- Top Nav Bar -->
include "includes/top_nav.php";
// <!-- Site bar -->
include "includes/sidebar.php";

// This is only for testing. QA Admin details MUST be gotten from Log in session
// $qa_adm_stf_id = 18;
// $qa_adm_fname = "Ikechukwu";
// $qa_adm_lname = "Onyia";
// $qa_adm_unit = "Compliance";
// $qa_adm_stf_nm = $qa_adm_fname." ".$qa_adm_lname;

// $stfid = $_SESSION["stfid"];
// $stfname = $_SESSION["stfname"];
// $stfdesig = $_SESSION["stfdesig"];
// $stfoff = $_SESSION["stfoffice"];
// $stemail = $_SESSION["stfemail"];
// $stfcat= $_SESSION["stfcat"];
// $offid = $_SESSION["stfoffid"];

//From log in this will be reversed as this will come from the log in script and replaces the above script

// $_SESSION['adm_stf_nm'] = $qa_adm_stf_nm;
// $_SESSION['adm_stf_id'] = $qa_adm_stf_id;
// $_SESSION['adm_unit'] = $qa_adm_unit;

$qa_adm_stf_nm = $_SESSION["stfname"];
$qa_adm_stf_id = $stf_id;
$qa_adm_unit = $_SESSION["stfoffice"];

//Below will be the query to get the offices assigned to the QA Admin to get the list of offices.
?>
<!-- Content Body Here -->
<div id="layoutSidenav_content">
<main>
<!-- Page Title Header -->
<div class="container-fluid px-4">
<h3 class="mt-4"><?php echo $qa_adm_unit; ?> Unit</h3>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item active">Evaluate Staff Submissions</li>
</ol>   
<div class="row">
	<div class="col-xl-10">
	<?php
		$c = 'me_stf_lst';
		$a = 'off_lst';
		$sqlSelect1 = "SELECT * FROM $c a INNER JOIN $a b on a.asn_off = b.off_lst_id where a.stf_id = ?";
		//$sqlSelect1 = "SELECT * FROM $c where stf_id = ?";
		$stmt1 = mysqli_prepare($conn, $sqlSelect1);
		mysqli_stmt_bind_param($stmt1, "i", $stf_id);
		mysqli_stmt_execute($stmt1);
		$result1 = mysqli_stmt_get_result($stmt1);
		
		if(mysqli_num_rows($result1) <= 0){?>
		<h4 style="color: red">No Office(s) assigned to <?php echo $stf_fname;?></h4>
		<?php
		}else{?>
		<h4>Assigned Offices</h4>
			<table class="table table-hover">
			<thead>
			<tr>
				<th scope="col">S/N</th>
				<th scope="col">Offices</th>
				<th scope="col">Action</th>
			</tr>									
			</thead>
			<?php
			$number = 1;
			while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
			$offasn = $row1["off_nm"];
			?>	
			<tbody>
			<tr>
				<th scope="row"><?php  echo $number; ?></th>
				<?php //Get the from the query the Office ID and Office name assigned to the QA Admin and replace here ?>
				<td><?php echo $offasn;?></td>
				<!-- This button below will be replaced with a form and hidden fields to Post the info about the office-->
				<td>
				<form action="evl_off_stf.php" method="POST">
				<input name= "stfnm" value= "<?php echo $qa_adm_stf_nm;?>" type="hidden">
				<input name= "offasn" value= "<?php echo $offasn;?>" type="hidden">
				<!-- <a href="evl_off_stf.php" role="button" class="btn btn-danger">View Staff List</a> -->
				<button class="btn btn-dark" type="submit" name="evl_tsk_btn">View Staff List</button>
				</form>
				</td>
			</tr>
			</form>
			</td>
			<?php ++$number?></tr>
			<?php
			}
			?>
			</tbody>
			</table>
		<?php 
			}
			mysqli_close($conn);
			?>
		</div>
	</div>								                            
</div> <!-- End of row -->
<!-- Footer -->
<?php
include "footer.php";
?>
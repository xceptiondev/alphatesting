<title>NOUN Quality Management System</title>
<?php
session_start();
include "my_conn.php";
// include "swtalrt.php";
//post from login submit button
if(isset($_POST["login_btn"])) {
	//Log in form inputs
	//Check if user id is a staff id
	$access = mysqli_real_escape_string($conn, $_POST["uaccess"]);
	$access = ltrim($access, '0');
	$stfpword = mysqli_real_escape_string($conn, $_POST['paccess']);

	// Check if staff exists
	$query = "SELECT * FROM usr_acc where stf_id_no = ?";
	$stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $access);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if(!$row){?>
	<script>
	Swal.fire({
	icon: "error",
	title: "Login Error...",
	text: "Incorrect Staff ID or Password."
	}).then(function() {
	window.location = "index.php";
	});
	</script>
	<?php
	exit;}

	if($row["stf_id_no"] != $access){
	require_once("swtalrt.php");	
	?>
	<script>
	Swal.fire({
		icon: "error",
		title: "Login Error...",
		text: "Incorrect Staff ID."
	}).then(function() {
	window.location = "index.php";
	});
	</script>
	<?php
	exit;}
	
	//authenticate password
	//$zencrypt = $row['usr_pwd'];
	//if(password_verify($usr_pwd, $zencrypt)) {
	if($row["usr_pwd"] == $stfpword){
		$usrid = $row['stf_id_no'];
		$usrcat = $row['usr_grp'];
		$session_id = rand (1,999);

		//start sessions

		$_SESSION["stfcat"] = $usrcat;
		$_SESSION["stfid"] = $usrid;
		$_SESSION["sess_id"] = $session_id;
		
		//Redirect to dashboard [userscat(1-10)]
		if ($usrcat == 1){
		//QA Super Admin	
		$page = "qa_sadmin.php";
		}
		elseif ($usrcat == 2){
		//MIS Super Admin
		$page = "s_admin.php";
		}
		elseif($usrcat == 3){
		//QMS admin - QA			
		$page = "qms_qa_admn.php";
		}
		elseif ($usrcat == 4){
		//QMS admin - MIS
		$page = "qms_admn.php";
		}
		elseif ($usrcat == 5) {
		//Compliance Admin
		$page = "cmp_adm.php";
		}
		elseif ($usrcat == 6) {
		//ME_Admin
		$page = "me_adm.php";
		}
		elseif ($usrcat == 7) {
		//Compliance_Officer
		$page = "cmp_dsh.php";
		}
		elseif ($usrcat == 8) {
		//Me_Officer	
		$page = "me_dsh.php";
		}
		elseif ($usrcat == 9) {
		//Staff Dashboard
		$page = "stf_dsh.php";
		}
		elseif ($usrcat == 10) {
		//Management Dashboard
		$page = "mgt_dsh.php";
		}
	}
	else{
		require_once("swtalrt.php");
		?>
		<script>
		Swal.fire({										
		icon: "error",
		title: "Login Error...",
		text: "Incorrect Password!!!"
		}).then(function() {
		window.location = "index.php";
		});
		</script>
		<?php
		exit;
	}
	//get the client IP address
	function getClientIP() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		return $ipaddress;
	}
	// Get the client IP address
	$ip = getClientIP();
	//store logs on log table
	$logdt = date('Y-m-d h:i:sa');
	$uagent = $_SERVER['HTTP_USER_AGENT'];
	$query = "INSERT INTO log_table (stfid, ip, dtlogs, device_info)
	VALUES(?, ?, ?, ?)";
	$logresult = mysqli_prepare($conn, $query);
	mysqli_stmt_bind_param($logresult, 'ssss', $usrid, $ip, $logdt, $uagent);
	mysqli_stmt_execute($logresult);
	header("Location:$page");
}
else{
	require_once("swtalrt.php");
	?>
	<script>
	Swal.fire({										
		icon: "error",
		title: "Error...",
		text: "Try again"
	}).then(function() {
	window.location = "index.php";
	});
	</script>
<?php
}
mysqli_close($conn);
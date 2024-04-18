<?php
session_start();
//No user is allowed to access this page directly from the browser. Ensure that it redirects back to login or home page.

if (isset($_POST['asnr']) && !empty($_POST['qa_catz'])){
	$qa_id = $_POST['qa_ro_id'];
	$qar = $_POST['qa_catz'];	
	
	if (!is_numeric($qa_id) && !is_numeric($qa_id)){
		echo "Value is NOT integer";
		header("location: qaadm.php");
		exit();
	}
	//Update QA Role in the QA Roles Table and also in the User Accounts Table
	$updQRole = "UPDATE qaroles SET qa_cate = $qar WHERE qa_usr_id = $qa_id";
	require "my_conn.php";
	if ($conn->query($updQRole) === true) {
		$insCatzMsg =  $conn->affected_rows . ' QA Role updated successfully.';
		$_SESSION['insMsg'] = $insCatzMsg;
		$conn->close();
		header("Location: qaadm.php");
		exit();
	} else {
		$insCatzMsg = "ERROR: Could not execute query: " . $conn->error;
		$_SESSION['insMsg'] = $insCatzMsg;
		header("Location: qaadm.php");
		exit();
	}
}else{
	$insCatzMsg = "No record Category selected";
	$_SESSION['insMsg'] = $insCatzMsg;
	header("Location: qaadm.php");
	exit();
}
?>
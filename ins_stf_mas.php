<?php

	require "my_conn.php";
	
	//Get form data
	
	$stf_fname = $conn->real_escape_string(strip_tags($_POST['stf_fname']));
	$stf_oname = $conn->real_escape_string(strip_tags($_POST['stf_oname']));
	$stf_lname = $conn->real_escape_string(strip_tags($_POST['stf_lname']));
	$stf_id_no = $conn->real_escape_string(strip_tags($_POST['stf_id_no']));
	$stf_mail = $conn->real_escape_string(strip_tags($_POST['stf_mail']));
	$stf_pos = $conn->real_escape_string(strip_tags($_POST['stf_pos']));
	$stf_off_nm = $conn->real_escape_string(strip_tags($_POST['stf_off']));

	$upd_evl = "INSERT INTO stf_mas_tbl (`Stf_fname`,`Stf_oname`, `Stf_lname`, stf_ID, Stf_email, stf_posn, stf_off ) VALUES (?,?,?,?,?,?,?)"; //Dont forget to get the Task ID and replace it here
	$upd_qry = $conn->prepare($upd_evl);
	$upd_qry->bind_param('sssisss', ucfirst($stf_fname), ucfirst($stf_oname), ucfirst($stf_lname), $stf_id_no, $stf_mail, ucwords($stf_pos), ucwords($stf_off_nm));
	if ($upd_qry->execute()){
		echo "New Category added Successfully";
		header("Location: stf_mas_list.php");
	}else{
		echo "Unable to execute the query". $conn->error;
	}
	$conn->close();
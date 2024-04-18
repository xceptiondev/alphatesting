<?php
if (isset($_POST['addCate'])){
	session_start();
	require "my_conn.php";
	
	//Get form data
	
	$usrCategoryName = $conn->real_escape_string(strip_tags($_POST['catenm']));
	$cate_code = $conn->real_escape_string(strip_tags($_POST['catesm']));
	$cateDesc = $conn->real_escape_string(strip_tags($_POST['catedesc']));

	$addCate = "INSERT INTO usr_cate (`cate_displ_nm`,`cate_code`, `cate_desc`) VALUES (?,?,?)"; //Dont forget to get the Task ID and replace it here
	$add_qry = $conn->prepare($addCate);
	$add_qry->bind_param('sss', $usrCategoryName, $cate_code, $cateDesc);
	if ($add_qry->execute()){
		$_SESSION['insMsg'] = "New Category $usrCategoryName added Successfully";
		
	}else{
		$_SESSION['insMsg'] = "Unable to execute the query". $conn->error;
		
	}
	$conn->close();
	header("Location: user_ac_cate.php");
	exit();
}

if (isset($_POST['edtCate'])){
	session_start();
	require "my_conn.php";
	
	//Get form data
	
	$usrCategoryName = $conn->real_escape_string(strip_tags($_POST['catenm']));
	$cate_code = $conn->real_escape_string(strip_tags($_POST['catesm']));
	$cateDesc = $conn->real_escape_string(strip_tags($_POST['catedesc']));
	$cateID = $conn->real_escape_string(strip_tags($_POST['cateid']));

	$edtCate = "UPDATE usr_cate SET cate_displ_nm = '".$usrCategoryName."', cate_code='".$cate_code."', cate_desc='".$cateDesc."' WHERE usr_cate_id = $cateID"; //Dont forget to get the Task ID and replace it here
	if ($conn->query($edtCate) === true){
		$_SESSION['insMsg'] = "Category $usrCategoryName has been updated Successfully";
		
	}else{
		$_SESSION['insMsg'] = "Unable to execute the query". $conn->error;
		
	}
	$conn->close();
	header("Location: user_ac_cate.php");
	exit();
}

if (!isset($_POST['addCate']) && !isset($_POST['edtCate'])){
	header("Location: 401.php");
	exit();
}

<?php
session_start();
$_SESSION['uplMsg'] = "";
if (isset($_POST['upl'])){
  $tsk_id = strip_tags($_POST["tsk_id"]);
  //$date_asn = $_POST["date_asn"];
  $stf_id = strip_tags($_POST["stf_id"]);
  $stf_off_id = strip_tags($_POST["off_id"]);
  $tsk_stat = strip_tags($_POST["tsk_stat"]);
  
  //Get Image Uploaded
  $img_dir = "img_evd/".$stf_off_id."/";
  if (!file_exists($img_dir)){
     mkdir("$img_dir");
  }
  
  $img_new_nm = $stf_id."_".date("Y-m-d h:i:s");
  $img_file_nm = hash("md5", "$img_new_nm");
  $img_file = $img_dir . basename($_FILES["img_evd"]["name"]);
  if (move_uploaded_file($_FILES["img_evd"]["tmp_name"], $img_file)){
     $ext = pathinfo($_FILES["img_evd"]["name"], PATHINFO_EXTENSION);
     $img_file_new = $img_dir.$img_file_nm.".".$ext;
     
     rename("$img_file", "$img_file_new"); //rename image file on folder
     $_SESSION['uplMsg'] = "Image Evidence submitted successfully $img_file_new";
	 $img_evd = $img_file_new;	 
  }else{
      $_SESSION['uplMsg'] = "Was unable to upload Image file";
	  $img_evd= "";
  }
  //PDF file upload
  if (isset($_FILES["pdf_evd"]) && !empty($_FILES["pdf_evd"])){
      $pdf_dir = "pdf_evd/".$stf_off_id."/";
      if (!file_exists($pdf_dir)){
        mkdir("$pdf_dir");
      }

      //$stf_nm1 = explode(" ", $stf_nm);
      $pdf_new_nm = $stf_id."_".date("Y-m-d h:i:s");// rename file
      $pdf_file_nm = hash("md5", "$pdf_new_nm");
      $pdf_file = $pdf_dir . basename($_FILES["pdf_evd"]["name"]);
      if (move_uploaded_file($_FILES["pdf_evd"]["tmp_name"], $pdf_file)){
        $ext = pathinfo($_FILES["pdf_evd"]["name"], PATHINFO_EXTENSION);
        $pdf_file_new = $pdf_dir.$pdf_file_nm.".".$ext;
       
        rename("$pdf_file", "$pdf_file_new");
        $_SESSION['uplMsg'] = "PDF Evidence submitted successfully $pdf_file_new";
      }else{
        $_SESSION['uplMsg'] = "Was unable to upload PDF file";
        $pdf_file_new = "";
      }
  }else{
    $_SESSION['uplMsg'] = "No PDF file selected";
    $pdf_file_new = "";
  }
  //Insert into record
	 $dt_upl = date('Y-m-d');
	 require "my_conn.php";
  	 $stf_evd = "UPDATE `asn_tsk` SET tsk_stat ='".$tsk_stat."', img_evd = '".$img_evd."', pdf_evd ='".$pdf_file_new."', vid_evd ='".$vid_file_new."', dt_upl = '".$dt_upl."'  WHERE tsk_id = $tsk_id AND stf_id = $stf_id AND off_id = $stf_off_id";
	 if ($conn->query($stf_evd) === true) {
		$_SESSION['uplMsg'] = $conn->affected_rows . ' Task Evidence successfully updated.';
		?>
		<script>
			alert("Updated");
		</script>
		<?php
		header("Location: upl_tsk_lst.php");
		$stf_evd->close();
	  }else{
		$_SESSION['uplMsg'] = "Record was not excuted from the prepared statement " . $conn->error;
	  }
	  $conn->close();
}else{
	header("Location: 401.html");
	exit();
}
?>



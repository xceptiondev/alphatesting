<?php
session_start();
?>
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
		<!-- Sweet Alert Scripts -->
		<script type="text/javascript" src="assets/vendor/swal/dist/sweetalert2.all.min.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/vendor/swal/dist/sweetalert2.all.min.css">
    </head>
    <body>
<?php
include "my_conn.php";

if(isset($_POST["upl_btn"])) {
    //Sanitize and prepare data for insertion
    $actnm = mysqli_real_escape_string($conn, trim($_POST["act_nm"]));
    $sbact = mysqli_real_escape_string($conn, trim($_POST["sb_act"]));
    $tl = mysqli_real_escape_string($conn, $_POST["tline"]);
    $stp1 = mysqli_real_escape_string($conn, trim($_POST["stp_1"]));
    $stp2 = mysqli_real_escape_string($conn, trim($_POST["stp_2"]));
    $stp3 = mysqli_real_escape_string($conn, trim($_POST["stp_3"]));
    $stp4 = mysqli_real_escape_string($conn, trim($_POST["stp_4"]));
    $stp5 = mysqli_real_escape_string($conn, trim($_POST["stp_5"]));
    $stp6 = mysqli_real_escape_string($conn, trim($_POST["stp_6"]));
    $stp7 = mysqli_real_escape_string($conn, trim($_POST["stp_7"]));
    $stp8 = mysqli_real_escape_string($conn, trim($_POST["stp_8"]));
    $stp9 = mysqli_real_escape_string($conn, trim($_POST["stp_9"]));
    $stp10 = mysqli_real_escape_string($conn, trim($_POST["stp_10"]));
    $stp11 = mysqli_real_escape_string($conn, trim($_POST["stp_11"]));
    $stp12 = mysqli_real_escape_string($conn, trim($_POST["stp_12"]));
    $stp13 = mysqli_real_escape_string($conn, trim($_POST["stp_13"]));
    $stp14 = mysqli_real_escape_string($conn, trim($_POST["stp_14"]));
    $stp15 = mysqli_real_escape_string($conn, trim($_POST["stp_15"]));
    $stp16 = mysqli_real_escape_string($conn, trim($_POST["stp_16"]));
    $stp17 = mysqli_real_escape_string($conn, trim($_POST["stp_17"]));
    $stp18 = mysqli_real_escape_string($conn, trim($_POST["stp_18"]));
    $stp19 = mysqli_real_escape_string($conn, trim($_POST["stp_19"]));
    $stp20 = mysqli_real_escape_string($conn, trim($_POST["stp_20"]));         
    $offid2 = mysqli_real_escape_string($conn, $_POST["offid2"]);
    $date = date('Y-m-d h:i:sa');
    $uplby = $_SESSION["stfname"];
    $uplid = $_SESSION["stfid"];

            //check if task is already uploaded
            $query1 = "SELECT * FROM off_sop WHERE off_lst_id = ? AND tsk_nm = ? AND sb_tsk = ?";
            $stmt1 = mysqli_prepare($conn, $query1);
            mysqli_stmt_bind_param($stmt1, "iss", $offid2, $actnm, $sbact);
            mysqli_stmt_execute($stmt1);
            $result1 = mysqli_stmt_get_result($stmt1);
            if(mysqli_num_rows($result1)>= 1) {
            ?>
            <script>
            Swal.fire({
              icon: "error",
              title: "Error...",
              text: "Not Submitted, Task Already Exists for that Office!"
            }).then(function() {
              window.location = "man_sop.php";
            });
            </script>
            <?php
            }
            else{
            //Perform INSERT query
            $query = "INSERT INTO off_sop (off_lst_id, tsk_nm, sb_tsk, stp_1, stp_2,stp_3, stp_4,stp_5, stp_6,stp_7,stp_8, stp_9,stp_10, stp_11, stp_12, stp_13, stp_14, stp_15, stp_16, stp_17, stp_18, stp_19, stp_20, tline, dt_upl, upl_by, upl_by_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $logresult = mysqli_prepare($conn, $query);
		        mysqli_stmt_bind_param($logresult, 'issssssssssssssssssssssissi', $offid2, $actnm, $sbact, $stp1, $stp2, $stp3, $stp4, $stp5, $stp6, $stp7, $stp8, $stp9,$stp10, $stp11, $stp12,$stp13, $stp14, $stp15,$stp16, $stp17, $stp18, $stp19, $stp20, $tl, $date, $uplby, $uplid);

		        mysqli_stmt_execute($logresult);

            $result = mysqli_stmt_get_result($logresult);
            ?>
            <script>
            Swal.fire({
              icon: "success",
              title: "Success",
              text: "Task Successfully Submitted"
            }).then(function() {
              window.location = "man_sop.php";
            });
            </script>
		        <?php
            }
    } else {
        ?>
		<script>
		Swal.fire({
			icon: "error",
			title: "Error...",
			text: "Task not Submitted, Try again"
		}).then(function() {
    	window.location = "man_sop.php";
		});
		</script>
		<?php
    }
    mysqli_close($conn);
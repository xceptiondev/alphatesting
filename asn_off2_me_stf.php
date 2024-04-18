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

if(isset($_POST["asn_btn"])) {
  //Sanitize and prepare data for insertion
  $checkbox_values = $_POST["checkbox_values"];
  $offid2 = mysqli_real_escape_string($conn, $_POST["offid2"]);
  $stfid2 = mysqli_real_escape_string($conn, $_POST["stfid2"]);
  $stfnm2 = mysqli_real_escape_string($conn, $_POST["stfnm2"]);
  $date = date('Y-m-d h:i:sa');
  $asnby = $_SESSION["stfname"];
  $asnbyid = $_SESSION["stfid"];

  if(isset($checkbox_values)){
      foreach($checkbox_values as $value) { 
      //check if the office(s) is already assigned to the staff
      $query1 = "SELECT stf_id, asn_off FROM me_stf_lst WHERE stf_id = ? AND asn_off = ?";
      $stmt1 = mysqli_prepare($conn, $query1);
      mysqli_stmt_bind_param($stmt1, "is", $stfid2, $value);
      mysqli_stmt_execute($stmt1);
      $result1 = mysqli_stmt_get_result($stmt1);
          if(mysqli_num_rows($result1)>= 1) {
          ?>
          <script>
          Swal.fire({
          icon: "error",
          title: "Error...",
          text: "Not Submitted, Office(s) Already Assigned to <?php echo $stfnm2?>!",
          }).then(function() {
          window.location = "m_e_admin_assign_users.php";
          });
          </script>
          <?php
          }
          else{
          //Perform INSERT query
          $query = "INSERT INTO me_stf_lst (stf_id, asn_off, dt_asn, asn_by, asn_by_id) VALUES (?, ?, ?, ?, ?)";
          $logresult = mysqli_prepare($conn, $query);
          mysqli_stmt_bind_param($logresult, 'isssi', $stfid2, $value,  $date, $asnby, $asnbyid);
          mysqli_stmt_execute($logresult);
          $result = mysqli_stmt_get_result($logresult);
          ?>
          <script>
          Swal.fire({
          icon: "success",
          title: "Success",
          text: "Office(s) Successfully Assigned to <?php echo $stfnm2?>"
          }).then(function() {
          window.location = "m_e_admin_assign_users.php";
          });
          </script>
          <?php
          }
        }
      }
else {
        ?>
		<script>
		Swal.fire({
			icon: "error",
			title: "Error...",
			text: "Task not Submitted, Try again"
		}).then(function() {
    	window.location = "m_e_admin_assign_users.php";
		});
		</script>
		<?php
    }
  }
  mysqli_close($conn);
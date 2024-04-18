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
  // Sanitize and prepare data for insertion
  $stfid2 = mysqli_real_escape_string($conn, $_POST["stfid2"]);
  $stfnm = mysqli_real_escape_string($conn, $_POST["stfnm"]);
  $date = date('Y-m-d h:i:sa');
  $asnby = $_SESSION["stfname"];
  $asnbyid = $_SESSION["stfid"];
  $stfoff = $_SESSION["stfoffid"];

  // Check if task is set
  if(isset($_POST['task']) && is_array($_POST['task'])) {
      // Get the task from the form
      foreach($_POST['task'] as $task_item) {
          // Explode the task string and assign values to variables
          $task_parts = explode('|', $task_item);
          if(count($task_parts) == 5) {
              list($tskid, $tsk, $stsk, $tsksp, $tl) = $task_parts;

              // Check if the task is already assigned to the staff
              $query1 = "SELECT stf_id, off_id, tsk_id, tsk_desc, sub_tsk FROM asn_tsk WHERE stf_id = ? AND off_id=? AND tsk_id = ? AND tsk_desc = ? AND sub_tsk = ?";
              $stmt1 = mysqli_prepare($conn, $query1);
              mysqli_stmt_bind_param($stmt1, "iiiss", $stfid2, $stfoff, $tskid, $tsk, $stsk);
              mysqli_stmt_execute($stmt1);
              $result1 = mysqli_stmt_get_result($stmt1);

              if(mysqli_num_rows($result1) >= 1) {
                  ?>
                  <script>
                  Swal.fire({
                  icon: "error",
                  title: "Error...",
                  text: "Not assigned, Task(s) Already Assigned to <?php echo $stfnm ?>!",
                  }).then(function() {
                  window.location = "asn_tsk_staff_list.php";
                  });
                  </script>
                  <?php
              } else {
                  // Perform INSERT query
                  $query = "INSERT INTO asn_tsk (tsk_id, tsk_desc, sub_tsk, tsk_stp, tsk_tline, stf_id, off_id, dt_asn, asn_by) VALUES (?,?,?,?,?,?,?,?,?)";
                  $logresult = mysqli_prepare($conn, $query);
                  mysqli_stmt_bind_param($logresult, 'isssiiiss', $tskid, $tsk, $stsk, $tsksp, $tl, $stfid2, $stfoff, $date, $asnby);
                  mysqli_stmt_execute($logresult);
                  $result = mysqli_stmt_get_result($logresult);
                  ?>
                  <script>
                  Swal.fire({
                      icon: "success",
                      title: "Success",
                      text: "Task(s) Successfully Assigned to <?php echo $stfnm ?>",
                      timer: null, // Prevent automatic closing
                  }).then(function() {
                      window.location = "asn_tsk_staff_list.php";
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
                  text: "Invalid task format",
              }).then(function() {
                  window.location = "asn_tsk_staff_list.php";
              });
              </script>
              <?php
          }
      }
  } else {
      ?>
      <script>
      Swal.fire({
          icon: "error",
          title: "Error...",
          text: "No tasks selected",
      }).then(function() {
          window.location = "asn_tsk_staff_list.php";
      });
      </script>
      <?php
  }

  mysqli_close($conn);
}

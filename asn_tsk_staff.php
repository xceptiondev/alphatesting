<?php
// <!-- Top Nav Bar -->
include "includes/top_nav.php";
// <!-- Site bar -->
include "includes/sidebar.php";
?>
<div id="layoutSidenav_content">
<main>
					<!-- Page Title Header -->
                    <div class="container-fluid px-4">
                    <h3 class="mt-4">Compliance: Assign Task(s) To Staff</h3>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Evaluate Staff Report</li>
                        </ol> -->                        
						<!-- Office Selected Appears on top of Staff list table   asn_tsk2_stf.php-->
<form action="asn_tsk2_stf.php" method="POST"> 
<?php
if(isset($_POST['asntsk'])){
    $stfid2 = mysqli_real_escape_string($conn, $_POST['stfid2']);
    $offnm= mysqli_real_escape_string($conn, $_POST['offnm']);
    $stfnm= mysqli_real_escape_string($conn, $_POST['stfnm']);
    $offid2= mysqli_real_escape_string($conn, $_POST['offid2']);
?>
						<div class="row">
						  <div class="col-xl-10">
							<table class="table">
								<thead>
								  <tr>
									<th scope="col">&nbsp;</th>
									<th scope="col">Office Selected</th>
									<th scope="col">Staff Selected</th>
									<th></th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<th scope="row">1</th>
									<td><?php echo $offnm;?></td>
									<td><?php echo $stfnm;?></td>
									<td><a class="btn btn-success" onclick="history.back()">Return to Staff List</a></td>
								  </tr>
								</tbody>
							  </table>
						  </div>
						</div>
            <?php
            }
            ?>
            <div class="row">
							<div class="col-xl-12">
<h4>Select Task/Activity to Assign to: <?php echo $stfnm;?></h4>	
    <?php
    $query = "SELECT * FROM off_sop where off_lst_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $offid2);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) <= 0) {?>
<h4 style="color: red">No Task(s) Uploaded for <?php echo $offnm;?>, Upload Task(s).</h4>
<?php
}else{?>
<div class="col-xl-12">
        <table class="table table-hover ">
        <thead>
          <tr>
            <th>#</th>
            <th>Select</th>
            <th>Task/Activity</th>
            <th>Sub-task/activity</th>
            <th>Task/activity Steps</th>
          </tr>
        </thead>
        <?php
        $number = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tskid = $row["tsk_id"];
        $tsk = $row["tsk_nm"];
        $stsk = $row["sb_tsk"];
        $tsksp = $row["stp_1"];
        $tl = $row["tline"];
        $task = $tskid.'|'.$tsk.'|'.$stsk.'|'.$tsksp.'|'.$tl;
        ?>
        <tbody>
        <tr>
        <td><?php  echo $number; ?></td>
            <td><input type="checkbox" name= "task[]" value= "<?php echo htmlspecialchars($task); ?>"></td>
            <td><?php  echo trim($tsk); ?></td>
            <td><?php  echo trim($stsk); ?></td>
            <td><?php  echo trim($tsksp); ?></td>
            <?php ++$number?>
        </tr>
        <?php
          }
          ?>
      </tbody>
      </table>
        <input name= "stfnm" value= "<?php echo $stfnm;?>" type="hidden">
        <input name= "stfid2" value= "<?php echo $stfid2;?>" type="hidden">
        <input name= "offnm" value= "<?php echo $offnm;?>" type="hidden">
        <input name= "offid" value= "<?php echo $offid2;?>" type="hidden">
        <input type="submit" name = "asn_btn"class="btn btn-secondary" value="Assign Task">
      </form>
<?php 
    }
    ?>
</div>
</div>
<!-- Footer -->
<?php
include "footer.php";
?>
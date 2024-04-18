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
                            <li class="breadcrumb-item active">Assign Task(s) to Staff</li>
                        </ol> -->
                        <!-- Office Selected Appears on top of Staff list table, DB Live -->
<?php
if(isset($_POST['vslst'])){
    $offnm= mysqli_real_escape_string($conn, $_POST['offnm']);
    $offid2= mysqli_real_escape_string($conn, $_POST['offid']);
?>
<div class="row">
<div class="col-xl-8">
<table class="table">
<thead>
<tr>
<th scope="col">&nbsp;</th>
<th scope="col">Office Selected</th>
<th></th>
</tr>
</thead>
<tbody>
<tr>
<th scope="row">1</th>
<td><?php echo $offnm;?></td>
<td><a href="asn_tsk.php" class="btn btn-success" onclick="history.back()">Return to Office List</a></td>
</tr>
</tbody>
</table>
</div>
</div>

<?php
    $query = "SELECT * FROM stf_reg WHERE stf_off = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $offid2);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) <= 0) {?>
<h4 style="color: red">No Staff List Found</h4>
<?php
}else{?>
<h4>Staff List</h4>
   <table class="table table-hover">
      <thead>
        <tr><th>#</th>
            <th>Staff</th>
            <th>Assigned Task(s)</th>
            <th>Action</th>
        </tr>
        </thead>
        <?php
        $number = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $stfnm = $row['stf_fname']." ".$row['stf_oname']." ".$row['stf_lname'];
        $offid2 = $row["stf_off"];
        $stfid2 = $row["stf_id"];
        ?>  
        <tbody>
        <tr>
            <td><?php  echo $number; ?></td>
            <td><?php  echo $stfnm; ?></td>
            <td><?php   
            //assinged tasks
            //check for assinged tasks for staff
            $sqlSelect1 = "SELECT tsk_desc FROM asn_tsk where stf_id = ?";
            $stmt1 = mysqli_prepare($conn, $sqlSelect1);
            mysqli_stmt_bind_param($stmt1, "i", $stfid2);
            mysqli_stmt_execute($stmt1);
            $result1 = mysqli_stmt_get_result($stmt1);

            if(mysqli_num_rows($result1) <= 0){
                $asntsk = "No Task Assigned";
                echo $asntsk;
            }else{
                while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                $asntsk = $row1["tsk_desc"];
                echo $asntsk. ", ";}  
            }
                ?></td>
        <td>
        <form action="asn_tsk_staff.php" method="POST">
            <input name= "stfnm" value= "<?php echo $stfnm;?>" type="hidden">
            <input name= "stfid2" value= "<?php echo $stfid2;?>" type="hidden">
            <input name= "offnm" value= "<?php echo $offnm;?>" type="hidden">
            <input name= "offid2" value= "<?php echo $offid2;?>" type="hidden">
            <button class="btn btn-dark" type="submit" name="asntsk">Assign Task...</button>
        </form>
        </td>
        <?php ++$number?></tr>
        <?php 
        ?>
    </tbody>
    <?php 
}
?>
</table>
<?php
}
}
mysqli_close($conn);
?>
</div>
<!-- Footer -->
<?php
include "footer.php";
?>
<?php
// <!-- Top Nav Bar -->
include "includes/top_nav.php";
// <!-- Site bar -->
include "includes/sidebar.php";
?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid mt-4">
    <!-- select office to assign task-->
    <h3>Assign M&E to Office(s)</h3>
    <h4>Select Staff</h4>
    <?php
    $a = "stf_reg";
    $b = 20; //set office id, it for qa office should come from the table offlst.
    $sqlSelect = "SELECT * FROM $a where stf_off = $b";
    //$sqlSelect = "SELECT * FROM $c";
    //$sqlSelect = "SELECT * FROM $c a INNER JOIN $a b on a.stf_id = b.stf_id where b.off_lst_id = 20 ";
    $stmt = mysqli_prepare($conn, $sqlSelect);
    //mysqli_stmt_bind_param($stmt, "s", $stfid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
if($result) {?>
<div class="col-xl-12">
        <table class="table table-hover ">
        <thead>
          <tr>
    <th>#</th>
    <!-- <th>ID.</th> -->
    <th>M&E Officer</th>
    <th>Currently Assigned to</th>
    <th>Action</th>
    </tr>
    </thead>
        <?php
        $number = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $stfid2 = $row['stf_id']; 
            $stfnm2 =  $row['stf_fname']." ".$row['stf_oname']." ".$row['stf_lname'];
            ?>
            <tbody>
            <tr>
            <tr>
              <td><?php  echo $number; ?></td>
              <!-- <td><?php  echo $stfid2; ?></td> -->
              <td><?php  echo $stfnm2; ?></td>
              <td><?php    
              //check for assinged tasks for staff
              $c = 'me_stf_lst';
              $a = 'off_lst';
              $sqlSelect1 = "SELECT * FROM $c a INNER JOIN $a b on a.asn_off = b.off_lst_id where a.stf_id = ?";
                //$sqlSelect1 = "SELECT * FROM $c where stf_id = ?";
                $stmt1 = mysqli_prepare($conn, $sqlSelect1);
                mysqli_stmt_bind_param($stmt1, "i", $stfid2);
                mysqli_stmt_execute($stmt1);
                $result1 = mysqli_stmt_get_result($stmt1);
              
              if(mysqli_num_rows($result1) <= 0){
                $offasn = "No Office(s) Assigned";
                  echo $offasn;
              }else{
                    $number = 1;
                  while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                  $offasn = $row1["off_nm"];
                    echo $number.". ";
                    echo $offasn. "<br>";
                     ++$number;
                    }
              }
            ?>
            </td>
              <td>
            <form action="asn_me_stf.php" method="POST">
            <input name="stfid2" value="<?php echo $stfid2;?>" type="hidden">
            <input name="stfnm2" value="<?php echo $stfnm2;?>" type="hidden">
            <button class="btn btn-warning" type="submit" name="asnoff">Assign Office</button>
        </form>
            </td>
            <?php ++$number?></tr>
            <?php
          }
        //   else{
        //     $dataArray = "NULL";
        //   }
        }
          ?>
        </tbody>
      </table>
<?php 
mysqli_close($conn);
?>
    </div>
<!-- Footer -->
</main>
<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted" align="center">Copyright &copy; NOUN Directorate of Quality Assurance 2024</div>
                            <!-- <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> -->
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    	<script src="assets/vendor/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="assets/vendor/js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/vendor/js/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
 <!--End footer-->
    </body>
</html>
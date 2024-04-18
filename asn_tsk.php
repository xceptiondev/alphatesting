<?php
// <!-- Top Nav Bar -->
include "includes/top_nav.php";
// <!-- Site bar -->
include "includes/sidebar.php";
?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid mt-4">

    <div class="breadcrumb-item active"><h6>Office: <?php echo $stf_off?></h6></div>

    <!-- select office to assign task-->
    <h3>M&E: Assign Task To Staff</h3>
    <h4>Select Staff Office</h4>
    <?php
    $query = "SELECT * FROM off_lst";
    $stmt = mysqli_prepare($conn, $query);
    //mysqli_stmt_bind_param($stmt, "sss",);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

if($result) {?>
<div class="col-xl-8">
        <table class="table table-hover ">
        <thead>
          <tr><th>#</th>
            <th>Offices</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php
        $number = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $offnm = $row["off_nm"];
        $offid2 = $row["off_lst_id"];
        ?>
        <tbody>
        <tr>
            <td><?php  echo $number; ?></td>
            <td><?php  echo $offnm; ?></td>
            <td>
        <form action="asn_tsk_staff_list.php" method="POST">
            <input name="offnm" value="<?php echo $offnm;?>" type="hidden">
            <input name="offid" value="<?php echo $offid2;?>" type="hidden">
            <button class="btn btn-danger" type="submit" name="vslst">View Staff List</button>
        </form>
            </td>
            <?php ++$number?></tr>
            <?php
          }
          ?>
        </tbody>
      </table>
<?php 
    }
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

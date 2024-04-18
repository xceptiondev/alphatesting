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
                        <h1 class="mt-4">Manage Offices</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Office Category</li>
                        </ol>
                        
                            
                        <div class="row">
							<div class="col-xl-6">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
								  Add Office Category
								</button>

								<!-- Modal -->
								<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								  <div class="modal-dialog">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="staticBackdropLabel">Add Office Category</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									  </div>
									  <div class="modal-body">
										<form method="POST" action="" name="off_cate" >
											<input type="text" name="off_cate" placeholder="Office Category Name" />
										</form>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Save</button>
									  </div>
									</div>
								  </div>
								</div>
							</div>		                            
                        </div> <!-- End of row -->
						<hr>
<div class="row">
<div>
								<!--<span style="color: red; margin: 10px; padding-top: 20px;"><strong>No record found</strong></span>-->
<table class="table table-hover">
<?php
    $query = "SELECT * FROM off_cate";
    $stmt = mysqli_prepare($conn, $query);
    //mysqli_stmt_bind_param($stmt, "s", $stfid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

if($result) {?>
<div class="col-xl-12">
        <table class="table table-hover ">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Office Category</th>
            <th>No of Office</th>
            <th></th>
        </tr>
        </thead>
        <?php
        $number = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $offcate = $row["off_cate_name"];
        $offcateid = $row["off_cate_id"];
        ?>
        <tbody>
        <tr>
        <td><?php  echo $number; ?></td>
           <td><?php  echo trim($offcate); ?></td>
           <td><?php  echo trim($offcate); ?></td>
           <td><a href="#" class="btn btn-secondary">Add Office</a></td>
            <?php ++$number?>
        </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
            <!-- <input name= "stfnm" value= "<?php echo $stfnm;?>" type="hidden">
            <input name= "stfid2" value= "<?php echo $stfid2;?>" type="hidden">
            <input name= "offnm" value= "<?php echo $offnm;?>" type="hidden">
            <input name= "tsk" value= "<?php echo $tsk;?>" type="hidden">
            <input name= "offid" value= "<?php echo $offid;?>" type="hidden"> -->
<?php 
    }
    mysqli_close($conn);?>	
</div>
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
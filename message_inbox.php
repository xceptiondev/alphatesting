<?php
// <!-- Top Nav Bar -->
include "includes/top_nav.php";
// <!-- Site bar -->
include "includes/sidebar.php";
// <!-- End Site bar -->
?>
<div id="layoutSidenav_content" class="messages">
                <main>
				   <!-- Page title starts here -->
				   <div class="container-fluid px-4">
					 <h3 class="mt-4">Messages</h3>
					 <ol class="breadcrumb mb-4">
                       <li class="breadcrumb-item active">Messages</li>
                     </ol>
				   </div>
				   <!-- End of page title -->
				   <!-- Emaill Messages Content starts here -->
				   <div class="messages-body">
					 <div class="row">
					   <div class="col-md-2">		<!-- this is the left section of the email page -->
						   
						 <form class="msg-search-box">
						   <input type="text" placeholder="Search mail..." name="search_mail">
						   <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i></button>
						 </form>
						 <div class="d-none d-md-block m-t-20">
						   <ul class="nav flex-column nav-pills flex-md-fill">
							 <li class="nav-item my-nav-item">
								<a href="#" class="nav-link active"><i class="fa fa-inbox fa-fw "></i> Inbox (10)</a>
							 </li>
							 <li class="nav-item my-nav-item">
								<a href="#" class="nav-link my-nav-links"><i class="fa fa-inbox fa-fw "></i> Sent</a>
							 </li>
							 <li class="nav-item my-nav-item">
								<a href="#" class="nav-link my-nav-links"><i class="fa fa-pencil fa-fw "></i> Draft</a>
							 </li>
							 <li class="nav-item my-nav-item">
								<a href="#" class="nav-link my-nav-links"><i class="fa fa-trash fa-fw "></i> Trash</a>
							 </li>
							 <li class="nav-item my-nav-item">
								<a href="#" class="nav-link my-nav-links"><i class="fa fa-star fa-fw "></i> Archive</a>
							 </li>
						   </ul>
						   <h5 class="m-t-20">Folders</h5>
						   <ul class="nav flex-column nav-pills flex-md-fill">
							 <li class="nav-item my-nav-item">
								<a href="#" class="nav-link my-nav-links"><i class="fa fa-folder fa-fw "></i> 2023</a>
							 </li>
							 <li class="nav-item my-nav-item">
								<a href="#" class="nav-link my-nav-links"><i class="fa fa-folder fa-fw "></i> Requests</a>
							 </li>
							 <li class="nav-item my-nav-item">
								<a href="#" class="nav-link my-nav-links"><i class="fa fa-folder fa-fw "></i> Important</a>
							 </li>
							 <li class="nav-item my-nav-item">
								<a href="#" class="nav-link my-nav-links"><i class="fa fa-folder fa-fw "></i> Downloads</a>
							 </li>
						   </ul>
						 </div>
					   </div>
					   <div class="col-md-10">		<!-- this is the right section of the email page -->
						 <!--<p>This is the right side of the email page</p>-->
						 <div class="message-btn-row d-none d-md-block">
							 <a href="#" class="btn btn-sm btn-dark"><i class="fa fa-plus m-r-5"></i> New</a>
							 <a href="#" class="btn btn-sm btn-dark disabled">Reply</a>
							 <a href="#" class="btn btn-sm btn-dark disabled">Delete</a>
							 <a href="#" class="btn btn-sm btn-dark disabled">Archive</a>
							 <a href="#" class="btn btn-sm btn-dark disabled">Junk</a>
							 <a href="#" class="btn btn-sm btn-dark disabled">Move to</a>
						 </div>
						 <div class="message-content">
							 <form id="email_contents" >
								 <table class="table table-message table-hover">
								   <thead>
									  <tr>
										<th class="email-message"><input type="checkbox" id="select_All" name="select_All" value="All_Selected"></th>
										<th colspan="2">
											<div class="dropdown">
												<a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" id="view-mails_dropdown" aria-expanded="false">View All</a>
												<ul class="dropdown-menu" aria-labelledby="view-mails_dropdown">
													<li class="active"><a href="#">All</a></li>
													<li><a href="#">Unread</a></li>
													<li><a href="#">Compliance Unit</a></li>
													<li><a href="#">Monitoring & Evaluation Unit</a></li>
													<li><a href="#">QA Director</a></li>
													<li><a href="#">Updates</a></li>
												</ul>
											</div>
                                       </th>
									   <th>
											<div class="dropdown">
												<a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" id="arrange_dropdown" aria-expanded="false">Arrange by</a>
												<ul class="dropdown-menu" aria-labelledby="arrange_dropdown">
													<li class="active"><a href="#">Date</a></li>
													<li><a href="#">From Director QA</a></li>
													<li><a href="#">From Compliance Unit</a></li>
													<li><a href="#">From M&E Unit</a></li>
												</ul>
											</div>
										</th>
									  </tr>
								   </thead>
								   <tbody>
									 <tr>
									   <td>
										 <input type="checkbox" name="message_id" id="message_id" value="message_content_in_db">
									   </td>
									   <td>
										 <a href="#msgModal" data-bs-toggle="modal" data-bs-target="#msgModal"><strong>Monitoring & Evaluation Unit</strong></a>
										 <!--<a href="#msgModal" data-bs-toggle="modal" data-bs-target="#msgModal">Read</a>-->
									   </td>
									   <td>
										 <a href="#msgModal" data-bs-toggle="modal" data-bs-target="#msgModal"><strong>Your Activity Report has been Assessed</strong></a>
									   </td>
									   <td>
										 <a href="#msgModal" data-bs-toggle="modal" data-bs-target="#msgModal"><strong>21/01/2024</strong></a>
									   </td
									 </tr>
									 <tr>
									   <td>
										 <input type="checkbox" name="message_id" id="message_id" value="message_content_in_db">
									   </td>
									   <td>
										 <p><strong>Compliance Unit</strong></p>
									   </td>
									   <td>
										 <p><strong>Report Received</strong></p>
									   </td>
									   <td>
										 <p><strong>18/01/2024</strong></p>
									   </td
									 </tr>
									 <tr>
									   <td>
										 <input type="checkbox" name="message_id" id="message_id" value="message_content_in_db">
									   </td>
									   <td>
										 <p><strong>Compliance Unit</strong></p>
									   </td>
									   <td>
										 <p><strong>Re: You have not updated your activity report</strong></p>
									   </td>
									   <td>
										 <p><strong>15/01/2024</strong></p>
									   </td
									 </tr>
									 <tr>
									   <td>
										 <input type="checkbox" name="message_id" id="message_id" value="message_content_in_db">
									   </td>
									   <td>
										 <p>Director Quality Assurance</p>
									   </td>
									   <td>
										 <p>Welcome Onboard Quality Drive</p>
									   </td>
									   <td>
										 <p>22/12/2023</p>
									   </td
									 </tr>
									 <tr>
									   <td>
										 <input type="checkbox" name="message_id" id="message_id" value="message_content_in_db">
									   </td>
									   <td>
										 <p>System</p>
									   </td>
									   <td>
										 <p>Registration Successful</p>
									   </td>
									   <td>
										 <p>21/12/2023</p>
									   </td
									 </tr>
								   </tbody>
								 </table>
							     <div class="row messages-footer">
								   <div class="col-6">1 to 5 of 5</div>
								   <div class="col-6">
									 <nav aria-label="Messages Pagination">
									   <ul class="pagination justify-content-end">
										 <li class="page-item disabled">
										   <a class="page-link" href="#" aria-label="Previous">
											 <span aria-hidden="true">&laquo;</span>
										   </a>
										 </li>
										 <li class="page-item active"><a class="page-link" href="#">1</a></li>
										 <li class="page-item"><a class="page-link" href="#">2</a></li>
										 <li class="page-item"><a class="page-link" href="#">3</a></li>
										 <li class="page-item">
										   <a class="page-link" href="#" aria-label="Next">
											 <span aria-hidden="true">&raquo;</span>
										   </a>
										 </li>
									   </ul>
									 </nav>
								   </div>
								 </div>
							 </form>
						     <!-- Modal popup for the messages  comes here -->
							 <div class="modal fade" id="msgModal" tabindex="-1" aria-labelledby="msgModalLable" aria-hidden="true">
							   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
								   <div class="modal-content">
									   <div class="modal-header">
										 <h5 class="modal-title" id="msgModalLabel"><strong>Your Activity Report has been Assessed</strong></h5>
									   </div>
									   <div class="modal-body">
										   <p>21 Jan 2024</p>
										   <p>Dear Onyia,</p>
										   <p>This is to inform you that your Activity Report which you submitted has been assessed.</p>
										   <p>You can view the assessment <a href="#">here</a>.</p>
										   <p>Best regards,</p>
										   <p><strong>Monitoring and Evaluation Unit - Directorate of Quality Assurance</strong></p>
									   </div>
									   <div class="modal-footer">
										 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									   </div>
								   </div>
							   </div>
							 </div>
							 <!-- Modal opoup for the messages  ends here -->
						 </div>
					   </div>
					 </div>
				   </div>
				   <!-- Email Messages Content ends here -->    
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted" align="center">Copyright &copy; NOUN Directorate of Quality Assurance 2024</div>
                            <div>
                                <a href="#">Powered by DMIS</a>
                                &middot;
                                <a href="#">Enquiries & Feedback</a>
                            </div>
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
    </body>
</html>

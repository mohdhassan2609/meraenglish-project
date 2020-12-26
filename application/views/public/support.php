<?php include("header.php") ?>

			
			<!-- ============================ Agency List Start ================================== -->
			<section class="bg-light p-0">
			
				<div class="wrapper">
            <!-- Sidebar Holder -->
            <!-- <div id="sidebar">
							
                <div class="sidebar-header">
                    <h3>Student Dashboard</h3>
                </div>
				
				<div class="d-user-avater">
					<img src="assets/img/user-3.jpg" class="img-fluid avater" alt="">
					<h4>Adam Harshvardhan</h4>
					<span>Canada USA</span>
				</div>
								
				<ul class="list-unstyled components">
					
					<li class=""><a href="dashboard.php"><i class="fa fa-th" aria-hidden="true"></i> Dashboard</a></li>
					<li class=""><a href="my-profile.php"><i class="ti-user"></i>My Profile</a></li>
					<li class=""><a href="my-courses.php"><i class="ti-heart"></i>Courses</a></li>
					<li class=""><a href="other-courses.php"><i class="ti-heart"></i>Other Courses</a></li>
					<li class=""><a href="my-order.php"><i class="ti-shopping-cart"></i>My Order</a></li>
					<li class=""><a href="change-password.php"><i class="ti-lock"></i>Change Password</a></li>
					<li class=""><a href="reviews.php"><i class="ti-comment-alt"></i>Reviews</a></li>
					<li class=""><a href="dashboard-faq.php"><i class="ti-comment-alt"></i>FAQ's</a></li>
					<li class="active"><a href="support.php"><i class="ti-comment-alt"></i>Support</a></li>
					<li class=""><a href="chat.php"><i class="ti-comment-alt"></i>Online Chat</a></li>
					<li class=""><a href="login.php"><i class="ti-power-off"></i>Log Out</a></li>
					
					
				</ul>

                
            </div> -->
			<?php $this->view('public/includes/sidenavbar'); ?>
           
            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default d-block d-md-none">
                    <div class="">
                        <div class="navbar-header d-flex">
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
							<h4 class="pt-2 pl-3">Dashboard Menu</h4>
                        </div>
                    </div>
                </nav>
				
				
				<div class="row">
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">Home</a></li>
											<li class="breadcrumb-item active" aria-current="page">Support</li>
										</ol>
									</nav>
								</div>
							</div>
							<!-- /Row -->
							
							<!-- Row -->
							<div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
								    	 <form  class="contact-admin"  value="tbl_contact_form" name="table_name" method="post" role="form">
								        	<div class="dashboard_container">
        										<div class="dashboard_container_header">
        											<div class="dashboard_fl_1">
        												<h4>Contact Admin</h4>
        											</div>
        										</div>
        										 
									           	<div class="dashboard_container_body">
										            <div class="prc_wrap-body">
    											    	<div class="row">
    												    	<div class="col-lg-6 col-md-12">
    													       	<div class="form-group">
    														    	<label>Name</label>
    														       	<input type="text" class="form-control simple" name="name" required>
    														    </div>
    												    	</div>
    													<div class="col-lg-6 col-md-12">
    														<div class="form-group">
    															<label>Email</label>
    															<input type="email" class="form-control simple" name="email" required>
    														</div>
    													</div>
    												</div>
    												
    												<div class="form-group">
    													<label>Subject</label>
    													<input type="text" class="form-control simple" name="subject">
    												</div>
    												
    												<div class="form-group">
    													<label>Message</label>
    													<textarea class="form-control simple"  name="message"></textarea>
    												</div>
    												
    												<div class="form-group">
    													<button class="btn btn-theme" type="submit">Submit Request</button>
    												</div>
    										
										    	</div>
										    </div>
										    </div>
												</form>
												
												
								     <form  class="grievance-form"  value="tbl_grievance_form" name="table_name" method="post" role="form">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4> Complaint/Grievance </h4>
											</div>
										</div>
										 
										<div class="dashboard_container_body">
										   
											<div class="prc_wrap-body">
											   
    												<div class="row">
    													<div class="col-lg-6 col-md-12">
    														<div class="form-group">
    															<label>Name</label>
    															<input type="text" class="form-control simple" name="name" required>
    														</div>
    													</div>
    													<div class="col-lg-6 col-md-12">
    														<div class="form-group">
    															<label>Email</label>
    															<input type="email" class="form-control simple" name="email" required>
    														</div>
    													</div>
    												</div>
    												
    												<div class="form-group">
    													<label>Subject</label>
    													<input type="text" class="form-control simple" name="subject">
    												</div>
    												
    												<div class="form-group">
    													<label>Message</label>
    													<textarea class="form-control simple"  name="message"></textarea>
    												</div>
    												
    												<div class="form-group">
    													<button class="btn btn-theme" type="submit">Submit Request</button>
    												</div>
    										
											</div>
										</div>
									</div>
												</form>
								</div>
								
							</div>
							
						</div>
					
					</div>
				
				
				
            </div>
        </div>
		
			</section>
			<!-- ============================ Agency List End ================================== -->
			
			

		


<?php include("footer.php") ?>
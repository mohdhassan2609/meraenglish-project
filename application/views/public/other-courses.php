<?php include("header.php") ?>

			
			<!-- ============================ Agency List Start ================================== -->
			
			<section class="bg-light p-0">
			
				<div class="wrapper">
					<!-- Sidebar Holder
					<div id="sidebar">
									
						<div class="sidebar-header">
							<h3>Student Dashboard</h3>
						</div>
						
						<div class="d-user-avater">
							<img src="<?=base_url()?>assets/front/img/user-3.jpg" class="img-fluid avater" alt="">
							<h4>Adam Harshvardhan</h4>
							<span>Canada USA</span>
						</div>
										
						<ul class="list-unstyled components">
							
							<li class=""><a href="dashboard.php"><i class="fa fa-th" aria-hidden="true"></i> Dashboard</a></li>
					<li class=""><a href="my-profile.php"><i class="ti-user"></i>My Profile</a></li>
					<li class=""><a href="my-courses.php"><i class="ti-heart"></i>Courses</a></li>
					<li class="active"><a href="other-courses.php"><i class="ti-heart"></i>Other Courses</a></li>
					<li class=""><a href="my-order.php"><i class="ti-shopping-cart"></i>My Order</a></li>
					<li class=""><a href="change-password.php"><i class="ti-lock"></i>Change Password</a></li>
					<li class=""><a href="reviews.php"><i class="ti-comment-alt"></i>Reviews</a></li>
					<li class=""><a href="dashboard-faq.php"><i class="ti-comment-alt"></i>FAQ's</a></li>
					<li class=""><a href="support.php"><i class="ti-comment-alt"></i>Support</a></li>
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
													<li class="breadcrumb-item active" aria-current="page">Other Cources <?php echo $_SESSION['loginid']?> </li>
												</ol>
											</nav>
										</div>
									</div>
									<!-- /Row -->
									
									<!-- Row -->
									
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="dashboard_container">
												<div class="dashboard_container_header">
													<div class="dashboard_fl_1">
													<h4>Unlock by Purchasing </h4>
													</div>
													<div class="dashboard_fl_2">
														<ul class="mb0">
															<li class="list-inline-item">

															</li>
															<li class="list-inline-item">
																<form class="form-inline my-2 my-lg-0">
																	<input class="form-control" type="search" placeholder="Search Courses" aria-label="Search">
																	<button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
																</form>
															</li>
														</ul>
													</div>
												</div>
												<div class="dashboard_container_body p-4">
													<div class="row">
														<?php 
                                                            if(sizeof($other_courses) > 0):                														
														    foreach($other_courses as $course):?>
														<div class="col-lg-4 col-md-4 col-sm-6">
															<div class="edu-watching">
																<div class="property_video sm">
																	<div class="thumb">
																		<img class="pro_img img-fluid w100" src="<?=base_url()?>assets/front/img/course-2.jpg" alt="7.jpg">
																		<div class="overlay_icon">
																			<div class="bb-video-box">
																				<div class="bb-video-box-inner">
																					<div class="bb-video-box-innerup">
																						<a href="" data-toggle="modal" data-target="#popup-video<?=$course->id?>" class="theme-cl"><i class="ti-lock"></i></a>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="edu_duration"><?=$course->duration?></div>
																</div>
																<div class="edu_video detail">
																	<div class="edu_video_header">
																		<h4><a href="cources-details/<?=$course->id ?>"><?=$course->course_title?></a></h4>
																	</div>
																	<!--<div class="edu_video_bottom">-->
																	<!--	<div class="edu_video_bottom_left">-->
																	<!--		<span>Lession 08 of 10</span>	-->
																	<!--	</div>-->
																	<!--	<div class="edu_video_bottom_right">-->
																	<!--		<i class="ti-desktop"></i>Designing-->
																	<!--	</div>-->
																	<!--</div>-->
																</div>
															</div>
														</div>
														<?php endforeach;?>
														<?php else:?>
														    
														<div class="col-lg-12 col-md-12 col-sm-12">
                                                                No Other Courses to show
													    </div>
													    <?php endif;?>
													</div>
												</div>
												
											</div>
										</div>
									</div>
									
									
									
								</div>
							
							</div>
						
						
						
					</div>
				</div>
		
		
			</section>



			<!-- Video Modal -->
			<?php foreach($other_courses as $course):?>
													
			<div class="modal fade" id="popup-video<?=$course->id?>" tabindex="-1" role="dialog" aria-labelledby="popup-video" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<iframe class="embed-responsive-item" width="100%" height="480" src="<?=$course->preview_video?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
		<?php endforeach;?>
			<!-- End Video Modal -->			

		


<?php include("footer.php") ?>
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
					<li class="active"><a href="dashboard-faq.php"><i class="ti-comment-alt"></i>FAQ's</a></li>
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
											<li class="breadcrumb-item active" aria-current="page">FAQ's</li>
										</ol>
									</nav>
								</div>
							</div>
							<!-- /Row -->
							
							<!-- Row -->
							<div class="row">
								
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container p-4">
										<div class="dashboard_container_body">
											<div class="property_block_wrap_header">
												<ul class="nav nav-tabs customize-tab tabs_creative" id="myTab" role="tablist">
												  <li class="nav-item">
													<a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
												  </li>
												  
												  <li class="nav-item">
													<a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false">Payment</a>
												  </li>
												  
												  <li class="nav-item">
													<a class="nav-link" id="upgrade-tab" data-toggle="tab" href="#upgrade" role="tab" aria-controls="upgrade" aria-selected="false">Upgrade</a>
												  </li>
												  
												</ul>
											</div>
							
											<div class="tab-content tabs_content_creative" id="myTabContent">
												
												<!-- general Query -->
												<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
													
													<div class="accordion" id="generalac">
														<div class="card">
															<div class="card-header" id="headingOne">
															  <h2 class="mb-0">
																<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
																  How To Install Learnup Theme?
																</button>
															  </h2>
															</div>

															<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#generalac">
															  <div class="card-body">
																<p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
															  </div>
															</div>
														</div>
														<div class="card">
															<div class="card-header" id="headingTwo">
															  <h2 class="mb-0">
																<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
																  What is main Requirements For Learnup?
																</button>
															  </h2>
															</div>
															<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#generalac">
															  <div class="card-body">
																<p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
															  </div>
															</div>
														</div>
														<div class="card">
															<div class="card-header" id="headingThree">
															  <h2 class="mb-0">
																<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
																  Why Choose Learnup Theme?
																</button>
															  </h2>
															</div>
															<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#generalac">
															  <div class="card-body">
																<p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
															  </div>
															</div>
														</div>
													</div>
													
												</div>
												
												<!-- general Query -->
												<div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
													
													<div class="accordion" id="paymentac">
														<div class="card">
															<div class="card-header" id="headingOne1">
															  <h2 class="mb-0">
																<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#paymentcollapse" aria-expanded="true" aria-controls="paymentcollapse">
																  May I Request For Refund?
																</button>
															  </h2>
															</div>

															<div id="paymentcollapse" class="collapse show" aria-labelledby="headingOne1" data-parent="#paymentac">
															  <div class="card-body">
																<p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
															  </div>
															</div>
														</div>
														<div class="card">
															<div class="card-header" id="headingTwo1">
															  <h2 class="mb-0">
																<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#paymentcollapseTwo" aria-expanded="false" aria-controls="paymentcollapseTwo">
																  May I Get Any Offer in Future?
																</button>
															  </h2>
															</div>
															<div id="paymentcollapseTwo" class="collapse" aria-labelledby="headingTwo1" data-parent="#paymentac">
															  <div class="card-body">
																<p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
															  </div>
															</div>
														</div>
														<div class="card">
															<div class="card-header" id="headingThree1">
															  <h2 class="mb-0">
																<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#paymentcollapseThree" aria-expanded="false" aria-controls="paymentcollapseThree">
																  How Much Time It will Take For refund?
																</button>
															  </h2>
															</div>
															<div id="paymentcollapseThree" class="collapse" aria-labelledby="headingThree1" data-parent="#paymentac">
															  <div class="card-body">
																<p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
															  </div>
															</div>
														</div>
													</div>
													
												</div>
												
												<!-- general Query -->
												<div class="tab-pane fade" id="upgrade" role="tabpanel" aria-labelledby="upgrade-tab">
													
													<div class="accordion" id="upgradeac">
														<div class="card">
															<div class="card-header" id="headingOne2">
															  <h2 class="mb-0">
																<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#upgradecollapseOne" aria-expanded="true" aria-controls="upgradecollapseOne">
																  How To Upgrade Learnup Theme?
																</button>
															  </h2>
															</div>

															<div id="upgradecollapseOne" class="collapse show" aria-labelledby="headingOne2" data-parent="#upgradeac">
															  <div class="card-body">
																<p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
															  </div>
															</div>
														</div>
														<div class="card">
															<div class="card-header" id="headingTwo2">
															  <h2 class="mb-0">
																<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#upgradecollapseTwo" aria-expanded="false" aria-controls="upgradecollapseTwo">
																  Learnup available for WordPress Version?
																</button>
															  </h2>
															</div>
															<div id="upgradecollapseTwo" class="collapse" aria-labelledby="headingTwo2" data-parent="#upgradeac">
															  <div class="card-body">
																<p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
															  </div>
															</div>
														</div>
														<div class="card">
															<div class="card-header" id="headingThree2">
															  <h2 class="mb-0">
																<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#upgradecollapseThree" aria-expanded="false" aria-controls="upgradecollapseThree">
																  Why We need to upgrade Learnup?
																</button>
															  </h2>
															</div>
															<div id="upgradecollapseThree" class="collapse" aria-labelledby="headingThree2" data-parent="#upgradeac">
															  <div class="card-body">
																<p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
															  </div>
															</div>
														</div>
													</div>
													
												</div>
											
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
			<!-- ============================ Agency List End ================================== -->
			
			

		


<?php include("footer.php") ?>
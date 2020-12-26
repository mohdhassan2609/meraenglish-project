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
                                    <li class="active"><a href="reviews.php"><i class="ti-comment-alt"></i>Reviews</a></li>
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
                                    <li class="breadcrumb-item active" aria-current="page">Reviews</li>
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
                                        <h4>All Reviews</h4>
                                    </div>
                                </div>
                                <div class="dashboard_container_body">
                                    <div class="reviews-comments-wrap">
                                        <!-- reviews-comments-item -->  
                                        <?php
                                        foreach ($items as $re) {
                                            $videos = $this->frontend_model->get_records('tbl_videos', "status='0' and id='$re->video_id' order by date_time asc")[0];
                                            $courses = $this->frontend_model->get_records('tbl_courses', " status='0'and id='$videos->course_id' order by date_time asc")[0];
                                            ?>
                                            <div class="reviews-comments-item">
                                                <div class="review-comments-avatar">
                                                    <img src="assets/front/img/user-1.jpg" class="img-fluid" alt=""> 
                                                </div>
                                                <div class="reviews-comments-item-text">
                                                    <h4><a href="#"><?= $courses->course_title; ?></a> <span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i><?= $re->date_time; ?></span></h4>

                                                    <div class="listing-rating high" data-starrating2="5"><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><span class="review-count">3</span> </div>
                                                    <div class="clearfix"></div>
                                                    <p><?= $re->review; ?></p>
                                                    <!--<div class="pull-left reviews-reaction">-->
                                                    <!--	<a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>-->
                                                    <!--	<a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>-->
                                                    <!--	<a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>-->
                                                    <!--</div>-->
                                                </div>
                                            </div>
                                            <!--reviews-comments-item end--> 
                                        <?php } ?>

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
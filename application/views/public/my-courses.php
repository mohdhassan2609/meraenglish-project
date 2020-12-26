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
                <img src="<??>assets/img/user-3.jpg" class="img-fluid avater" alt="">
                <h4>Adam Harshvardhan</h4>
                <span>Canada USA</span>
            </div>
                            
            <ul class="list-unstyled components">
                
                <li class=""><a href="dashboard.php"><i class="fa fa-th" aria-hidden="true"></i> Dashboard</a></li>
        <li class=""><a href="my-profile.php"><i class="ti-user"></i>My Profile</a></li>
        <li class="active"><a href="my-courses.php"><i class="ti-heart"></i>Courses</a></li>
        <li class=""><a href="other-courses.php"><i class="ti-heart"></i>Other Courses</a></li>
        <li class=""><a href="my-order.php"><i class="ti-shopping-cart"></i>My Order</a></li>
        <li class=""><a href="change-password.php"><i class="ti-lock"></i>Change Password</a></li>
        <li class=""><a href="reviews.php"><i class="ti-comment-alt"></i>Reviews</a></li>
        <li class=""><a href="dashboard-faq.php"><i class="ti-comment-alt"></i>FAQ's</a></li>
        <li class=""><a href="support.php"><i class="ti-comment-alt"></i>Support</a></li>
        <li class=""><a href="chat.php"><i class="ti-comment-alt"></i>Online Chat</a></li>
        <li class=""><a href="login.php"><i class="ti-power-off"></i>Log Out</a></li>
                
        <!--<li>
            <a href="#">About</a>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>-->
        <!-- </ul>

        
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
                                    <li class="breadcrumb-item active" aria-current="page">My Courses</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- /Row -->

                    <!-- Row -->

                    <div class="container">
                        <div class="row">
                            <?php
                            if (sizeof($records) >= 1) {
                                foreach ($records as $record):
                                    ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="education_block_grid style_2 p-3 row">
                                            <div class="education_block_thumb n-shadow col-lg-12 p-0">
                                                <a href="#0"><img src="assets/img/co-1.jpg" class="img-fluid" alt=""></a>
                                                <div class="cources_price">Badges</div>
                                            </div>

                                            <div class="col-lg-12">                         
                                                <div class="education_block_body p-2">
                                                    <h3><a href="#0"><?= $record->course_title; ?></a></h3>
                                                </div>

                                                <div class="cources_info">
                                                    <div class="cources_info_style3 w-100 p-0">
                                                        <?php //$video_record = $this->frontend_model->get_records('tbl_courses', "status=0"); ?>
                                                        <ul>
                                                            <?php if ($record->course_type == '1') { ?>
                                                                <li><i class="ti-eye mr-2"></i>8682 Views</li>
                                                                <li><i class="ti-time mr-2"></i><?= $record->duration ?></li>
                                                            <?php } ?>
                                                            <li><i class="ti-star text-warning mr-2"></i>4.7 Reviews</li>
                                                        </ul>
                                                    </div>

                                                </div>

                                                <div class="ed_view_box style_3 m-0">
                                                    <div class="ed_view_features half_list pl-4 pr-3 mb-0">
                                                        <span>Course Features</span>
                                                        <ul>
                                                            <?php $feature = explode(",", $record->features); ?>




                                                            <li><i class="ti-user"></i><?= $feature[0]; ?></li>
                                                            <?php if ($record->course_type == '1') { ?>
                                                                <li><i class="ti-time"></i><?= $feature[1]; ?></li>
                                                            <?php } ?>
                                                            <li><i class="ti-bar-chart-alt"></i><?= $feature[2]; ?></li>
                                                            <li><i class="ti-cup"></i><?= $feature[3]; ?></li>  


                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <!-- <a href="my-courses-details/<?= $record->id ?>" type="submit" class="btn btn-outline-theme w-100">View Course</a> -->
                                                    <a href="<?= base_url() ?>my-courses-details/<?= $record->id ?>" type="submit" class="btn btn-outline-theme w-100">View Course</a>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    <?php
                                endforeach;
                            } else {
                                ?>
                                <tr>
                                    <td>

                                        <h4>No Courses available</h4>
                                    </td>
                                </tr>
                            <?php } ?>

                        </div>
                    </div>





                </div>

            </div>



        </div>
    </div>


</section>



<!-- Video Modal -->
<div class="modal fade" id="popup-video" tabindex="-1" role="dialog" aria-labelledby="popup-video" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <iframe class="embed-responsive-item" width="100%" height="480" src="https://www.youtube.com/embed/qN3OueBm9F4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
</div>
<!-- End Video Modal -->            




<?php include("footer.php") ?>

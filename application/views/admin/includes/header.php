
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Mera English</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->

        <link href="<?php echo base_url() ?>assets/front/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />

        <!-- Bootstrap Tables css -->
        <link href="<?php echo base_url() ?>assets/admin/libs/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css">

        <!-- App css -->
        <link href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/admin/css/app.min.css" rel="stylesheet" type="text/css">


        <link href="<?php echo base_url() ?>assets/admin/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

        <style>
            .error-span {
                display: none;
            }
            .error{
                color:red;
                font-weight: normal;

            }


        </style>


        <script src="<?php echo base_url(); ?>assets/admin/js/jQuery-2.1.4.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
        <link href="<?php echo base_url() ?>assets/admin/css/chosen.css" rel="stylesheet" type="text/css" />



        <script type="text/javascript">

            var baseURL = "<?php echo base_url(); ?>";

        </script>









    </head>

    <body>






        <!-- Begin page -->
        <div id="wrapper">




            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <!-- <li class="d-none d-sm-block">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fe-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li> -->

                    <!-- <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-bell noti-icon"></i>
                            <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                          
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    <span class="float-right">
                                        <a href="" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                                </h5>
                            </div>
                            <div class="slimscroll noti-scroll">
                             
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon">
                                        <img src="<?php echo base_url() ?>assets/admin/images/users/user-1.jpg"
                                            class="img-fluid rounded-circle" alt=""> </div>
                                    <p class="notify-details">Cristina Pride</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Hi, How are you? What about our next meeting</small>
                                    </p>
                                </a>
                              
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">1 min ago</small>
                                    </p>
                                </a>
                            
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="<?php echo base_url() ?>assets/admin/images/users/user-4.jpg"
                                            class="img-fluid rounded-circle" alt=""> </div>
                                    <p class="notify-details">Karen Robinson</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Wow ! this admin looks good and awesome design</small>
                                    </p>
                                </a>
                               
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning">
                                        <i class="mdi mdi-account-plus"></i>
                                    </div>
                                    <p class="notify-details">New user registered.
                                        <small class="text-muted">5 hours ago</small>
                                    </p>
                                </a>
                               
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">4 days ago</small>
                                    </p>
                                </a>
                              
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-secondary">
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked
                                        <b>Admin</b>
                                        <small class="text-muted">13 days ago</small>
                                    </p>
                                </a>
                            </div>
                           
                            <a href="javascript:void(0);"
                                class="dropdown-item text-center text-primary notify-item notify-all">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li> -->

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                           href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?= base_url() ?>assets/front/img/user-7.jpg" alt="user-image"
                                 class="rounded-circle">



                            <span class="pro-user-name ml-1">
                                <?php echo $role_text; ?> <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">


                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="<?php echo base_url(); ?>admin/logout" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>



                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo text-center">
                        <span class="logo-lg">

                            <img src="<?php echo base_url() ?>assets/front/img/mera-logo.jpg" alt="" width=200>


                        </span>
                        <span class="logo-sm">

                            <img src="<?php echo base_url() ?>assets/front/img/mera-logo.jpg" alt="" height="" width=70>

                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>


            </div>
        </li>
    </ul>
</div>
<!-- end Topbar -->

<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>


                <?php
                if ($role == ROLE_ADMIN || $role == ROLE_SUPER_ADMIN || $role == ROLE_MANAGER) {
                    ?>


                    <li>
                        <a href="<?= base_url() ?>admin/dashboard">
                            <i class="fe-users"></i>
                            <span>Dashboard</span>
                        </a>

                    </li>



                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-pocket"></i>
                            <span>Courses</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">



                            <li>
                                <a href="<?= base_url() ?>admin/add_course">Add Course</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>admin/course_list">List Course</a>
                            </li>
                            <!--<li>
                                <a href="<?= base_url() ?>admin/add_video">Add Video/Text</a>
                            </li>-->


                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-pocket"></i>
                            <span>Section</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">



                            <li>
                                <a href="<?= base_url() ?>admin/banner">Banner</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>admin/media-coverage">Media Coverage</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>admin/settings">
                            <i class="fe-pocket"></i>
                            <span>General Settings</span>
    <!--                                <span class="menu-arrow"></span>-->
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-pocket"></i>
                            <span>contact</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">



                            <li>
                                <a href="<?= base_url() ?>admin/contact_list">Contact list</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>admin/grievance">Complaint / Grievance</a>
                            </li>


                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-pocket"></i>
                            <span>Clients</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="<?= base_url() ?>admin/clients">College List</a></li>
                                <li>
                                <a href="<?= base_url() ?>admin/corporates">Corporate List</a>
                            </li>
                        </ul>
                    
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-pocket"></i>
                            <span>Newsletters</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">



                            <li>
                                <a href="<?= base_url() ?>admin/newsletter">Newsletter Subscription</a>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-pocket"></i>
                            <span>Reviews</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">



                            <li>
                                <a href="<?= base_url() ?>admin/success_stories">Success Stories</a>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-pocket"></i>
                            <span>Orders</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">



                            <li>
                                <a href="<?= base_url() ?>admin/orders">Orders</a>
                            </li>


                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-pocket"></i>
                            <span>Users</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">



                            <li>
                                <a href="<?= base_url() ?>admin/users">Users</a>
                            </li>


                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-folder-plus"></i>
                            <span>Profile </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level nav" aria-expanded="false">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/logout">Logout</a>
                            </li>

                        </ul>
                    </li>

                <?php }
                ?>
            </ul>


        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<?php include("header.php") ?>


<!-- ============================ Agency List Start ================================== -->
<section class="bg-light p-0">

    <div class="wrapper">
        <!-- Sidebar Holder -->
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
                                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- /Row -->

                    <!-- Row -->
                    <div class="row">
                        <form class="change_pwd" this_id="006" method="POST" role="form">	
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="dashboard_container">
                                    <div class="dashboard_container_header">
                                        <div class="dashboard_fl_1">
                                            <h4>New Password</h4>
                                        </div>
                                    </div>
                                    <div class="dashboard_container_body p-4">
                                        <!-- Basic info -->


                                        <!-- Social Account info -->
                                        <div class="form-submit">	
                                            <div class="submit-section">
                                                <div class="form-row">

                                                    <div class="form-group col-md-6">
                                                        <label>Password</label>
                                                        <input type="text" class="form-control" name="password" id="pwd1" placeholder="Password">
                                                        <input type="hidden" class="form-control" name="id" value="<?= $_SESSION['loginid'] ?>" placeholder="Password">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Repet Password</label>
                                                        <input type="text" class="form-control"  placeholder="Repet Password" id="pwd2" name="confirm_password">
                                                    </div>



                                                    <div class="form-group col-lg-12 col-md-12">
                                                        <button class="btn btn-theme" type="submit">Submit</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- / Social Account info -->

                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>



        </div>
    </div>

</section>
<!-- ============================ Agency List End ================================== -->






<?php include("footer.php") ?>



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
                                    <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- /Row -->

                    <!-- Row -->
                    <form class="update_data" this_id="001" method="post">
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="dashboard_container">
                                    <div class="dashboard_container_header">
                                        <div class="dashboard_fl_1">
                                            <h4>Profile Detail</h4>
                                        </div>
                                    </div>
                                    <div class="dashboard_container_body p-4">
                                        <!-- Basic info -->
                                        <div class="submit-section">
                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label>Your Name</label>
                                                    <input type="text" class="form-control" value="<?= $record->first_name ?>" name="first_name">
                                                    <input type="hidden" class="form-control" value="tbl_general_users" name="table_name">
                                                    <input type="hidden" class="form-control" value="<?= $record->id ?>" name="id">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" value="<?= $record->email ?>" name="email">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" value="<?= $record->username ?>" name="username">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Mobile</label>
                                                    <input type="number" class="form-control" value="<?= $record->phone_number ?>" name="phone_number">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="image">Profile Image </label>
                                                    <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg" class="form-control">

                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" value="<?= $record->address ?>" name="address">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>City</label>
                                                    <input type="text" class="form-control" value="<?= $record->city ?>" name="city">
                                                </div>


                                                <div class="form-group col-md-6">
                                                    <label>State</label>
                                                    <input type="text" class="form-control"  value="<?= $record->state ?>" name="state">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Zip</label>
                                                    <input type="text" class="form-control" value="<?= $record->post_code ?>" name="post_code">
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>About</label>
                                                    <textarea class="form-control"  value="<?= $record->about_me ?>" name="about_me"><?= $record->about_me ?></textarea>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Basic info -->

                                        <!-- Social Account info -->
                                        <div class="form-submit">	
                                            <!-- <h4 class="pl-2 mt-2">Social Accounts</h4>
                                            <div class="submit-section">
                                                    <div class="form-row">
                                                    
                                                            <div class="form-group col-md-6">
                                                                    <label>Facebook</label>
                                                                    <input type="text" class="form-control" value="https://facebook.com/">
                                                            </div>
                                                            
                                                            <div class="form-group col-md-6">
                                                                    <label>Twitter</label>
                                                                    <input type="email" class="form-control" value="https://twitter.com/">
                                                            </div>
                                                            
                                                            <div class="form-group col-md-6">
                                                                    <label>Google Plus</label>
                                                                    <input type="text" class="form-control" value="https://googleplus.com/">
                                                            </div>
                                                            
                                                            <div class="form-group col-md-6">
                                                                    <label>LinkedIn</label>
                                                                    <input type="text" class="form-control" value="https://linkedin.com/">
                                                            </div>
                                                            
                                            -->		<div class="form-group col-lg-12 col-md-12">
                                                <button class="btn btn-theme" type="submit">Save Changes</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- / Social Account info -->

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







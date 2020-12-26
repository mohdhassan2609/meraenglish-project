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
       <!-- <link rel="shortcut icon" href="<?php echo base_url() ?>assets\admin\\images\favicon.ico">
-->
        <!-- App css -->
        <link href="<?php echo base_url() ?>assets\admin\\css\bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets\admin\\css\icons.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets\admin\\css\app.min.css" rel="stylesheet" type="text/css">

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">
 
                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                
                                        <span><img src="<?php echo base_url() ?>assets/front/img/mera-logo.jpg"  height="" width=200></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                                </div>


                                <?php $this->load->helper('form'); ?>
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
        <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>                    
            </div>
        <?php }
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>                    
            </div>
        <?php } ?>

                                <form action="<?php echo base_url(); ?>admin/loginMe" method="post">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address</label>
                                        <input  type="email" class="form-control"  name="email" required  placeholder="Enter your email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" required placeholder="Enter your password">
                                    </div>

                                    <!-- <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked="">
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div> -->

                                    <div class="form-group mb-0 text-center">
                                  
                                        <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                    </div>

                                </form>

                                <div class="text-center">
                                    <h5 class="mt-3 text-muted">Sign in with</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <!-- <p> <a href="?php echo base_url(); ?>forgotPassword" class="text-white-50 ml-1">Forgot your password?</a></p> -->
                                <!-- <p class="text-white-50">Don't have an account? <a href="pages-register.html" class="text-white ml-1"><b>Sign Up</b></a></p> -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


       

        <!-- Vendor js -->
        <script src="<?php echo base_url() ?>assets\admin\\js\vendor.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url() ?>assets\admin\\js\app.min.js"></script>
        
    </body>
</html>
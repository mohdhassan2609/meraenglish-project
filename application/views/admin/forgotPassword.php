<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>UBold - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets\admin\\images\favicon.ico">

        <!-- App css -->
        <link href="<?php echo base_url() ?>assets\admin\\css\bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets\admin\\css\icons.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets\admin\\css\app.min.css" rel="stylesheet" type="text/css">

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">

                    <?php $this->load->helper('form'); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                        </div>
                    </div>
                    <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    $send = $this->session->flashdata('send');
                    $notsend = $this->session->flashdata('notsend');
                    $unable = $this->session->flashdata('unable');
                    $invalid = $this->session->flashdata('invalid');
                    if ($error) {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('error'); ?>                    
                        </div>
                    <?php
                    }

                    if ($send) {
                        ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $send; ?>                    
                        </div>
                    <?php
                    }

                    if ($notsend) {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $notsend; ?>                    
                        </div>
                    <?php
                    }

                    if ($unable) {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $unable; ?>                    
                        </div>
                    <?php
                    }

                    if ($invalid) {
                        ?>
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $invalid; ?>                    
                        </div>
                    <?php } ?>

                    <form action="<?php echo base_url(); ?>admin/resetPasswordUser" method="post">
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="Email" name="login_email" required />
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-pattern">

                                <div class="card-body p-4">

                                    <div class="text-center w-75 m-auto">
                                        <a href="index.html">
                                            <span><img src="<?php echo base_url() ?>assets\admin\\images\logo-dark.png" alt="" height="22"></span>
                                        </a>
                                        <p class="text-muted mb-4 mt-3">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                                    </div>

                                    <form action="<?php echo base_url(); ?>admin/loginMe">

                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Email address</label>
                                            <input type="email" class="form-control" placeholder="Email" name="login_email" required >
                                        </div>

                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-primary btn-block" type="submit"> Reset Password </button>
                                        </div>

                                    </form>

                                </div> <!-- end card-body -->
                            </div>
                            <!-- end card -->

                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <p class="text-white-50">Back to <a href="<?php echo base_url() ?>admin/" class="text-white ml-1"><b>Log in</b></a></p>
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


        <footer class="footer footer-alt">
            2015 - 2019 &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a> 
        </footer>

        <!-- Vendor js -->
        <script src="<?php echo base_url() ?>assets\admin\\js\vendor.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url() ?>assets\admin\\js\app.min.js"></script>

    </body>
</html>






<!-- ============================ Footer Start ================================== -->
<footer class="dark-footer skin-dark-footer">
    <div>
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-3">
                    <div class="footer-widget">
                        <img src="<?= base_url() ?>assets/front/img/mera-logo.jpg" class="img-footer" alt="" />
                        <div class="footer-add">
                            <p> No.161, First floor, Thambuchetty Street, Chennai - 624001.</p>
                            <p>+91 96001 01503</p>
                            <p>Santhosh@meraenglish.com</p>
                        </div>

                    </div>
                </div>		
                <!--<div class="col-lg-2 col-md-3">-->
                <!--    <div class="footer-widget">-->
                <!--        <h4 class="widget-title">Navigations</h4>-->
                <!--        <ul class="footer-menu">-->
                <!--            <li><a href="<?= base_url() ?>about-us">About Us</a></li>-->
                <!--            <li><a href="<?= base_url() ?>faq">FAQs Page</a></li>-->
                <!--            <?php if (isset($_SESSION['loginid']) && $_SESSION['isloggedin'] == TRUE) { ?>-->
                <!--                <li><a href="<?= base_url() ?>checkout">Checkout</a></li>-->
                <!--            <?php } else { ?>-->
                <!--                <li><a href="#">Checkout</a></li>-->
                <!--            <?php } ?>-->
                <!--            <li><a href="<?= base_url() ?>contact-us">Contact</a></li>-->
                <!--            <li><a href="<?= base_url() ?>blog">Blog</a></li>-->
                <!--        </ul>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="col-lg-2 col-md-3">
                    <div class="footer-widget">
                        <h4 class="widget-title">Shortcuts</h4>
                        <ul class="footer-menu">
                            <li><a href="<?= base_url() ?>about-us">About us</a></li>
                            <li><a href="<?= base_url() ?>clients">Clients</a></li>
                            <li><a href="<?= base_url() ?>contact-us">Contact</a></li>
                            <li><a href="#0">Privacy policy </a></li>
                            <li><a href="#0">Terms & conditions</a></li> 
                        </ul>
                    </div>
                </div>

                <!--<div class="col-lg-2 col-md-3">-->
                <!--    <div class="footer-widget">-->
                <!--        <h4 class="widget-title">Help & Support</h4>-->
                <!--        <ul class="footer-menu">-->
                <!--            <li><a href="#0">Documentation</a></li>-->
                <!--            <li><a href="#0">Live Chat</a></li>-->
                <!--            <li><a href="#0">Mail Us</a></li>-->
                <!--            <li><a href="<?= base_url() ?>privacy-policy">Privacy</a></li>-->
                <!--            <li><a href="<?= base_url() ?>faq">Faqs</a></li>-->
                <!--        </ul>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="col-lg-6 col-md-12">
                    <div class="footer-widget">
                        <h4 class="widget-title">Download Apps</h4>
                        <a href="#0" class="other-store-link">
                            <div class="other-store-app">
                                <div class="os-app-icon">
                                    <i class="lni-playstore theme-cl"></i>
                                </div>
                                <div class="os-app-caps">
                                    Google Play
                                    <span>Get It Now</span>
                                </div>
                            </div>
                        </a>
                        <a href="#0" class="other-store-link">
                            <div class="other-store-app">
                                <div class="os-app-icon">
                                    <i class="lni-apple theme-cl"></i>
                                </div>
                                <div class="os-app-caps">
                                    App Store
                                    <span>Now it Available</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6">
                    <p class="mb-0">© 2020 Mera English. Designd By <a href="#0">Best Ad Agency</a>.</p>
                </div>

                <div class="col-lg-6 col-md-6 text-right">
                    <ul class="footer-bottom-social">
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <!--<li><a href="#"><i class="ti-twitter"></i></a></li>-->
                        <!--<li><a href="#"><i class="ti-instagram"></i></a></li>-->
                        <li><a href="#"><i class="ti-linkedin"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- ============================ Footer End ================================== -->

<!-- Log In Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="registermodal">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title">Log In</h4>
                <div class="login-form">
                    <form class="form_login">

                        <div class="form-group">
                            <label>Email or Phone Number</label>
                            <input type="text" class="form-control required" placeholder="Email" name="contact" >
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control required" placeholder="*******" name="password">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-md full-width pop-login">Login</button>
                        </div>

                    </form>
                </div>

                <div class="social-login mb-3">
                    <ul>
                        <li>
                            <input id="reg" class="checkbox-custom" name="reg" type="checkbox">
                            <label for="reg" class="checkbox-custom-label">Save Password</label>
                        </li>
                        <li><a href="<?= base_url() ?>forget-password" class="theme-cl">Forget Password?</a></li>
                    </ul>
                </div>

                <div class="text-center">
                    <p class="mt-2">Haven't Any Account? <a href="#" data-toggle="modal" data-target="#signup" class="link" data-dismiss="modal">Click here</a></p>								
                    OR
                    <br>
                </div>


                <ul class="btn-login list_none text-center mt-2">
                    <li><a href="#" class="btn btn-facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                    <li><a href="#" class="btn btn-google"><i class="fa fa-google" aria-hidden="true"></i> Google</a></li>
                </ul>


            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Sign Up Modal -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="sign-up">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title">Sign Up</h4>
                <div class="login-form">
                    <form class="form_register">


                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control required">
                            <span class="text-danger error-span">This input is required.</span>


                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control required">
                                <span class="text-danger error-span">This input is required.</span>
                            </div>


                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" name="phone" class="form-control required">
                                <span class="text-danger error-span">This input is required.</span>
                            </div>


                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control required">
                                <span class="text-danger error-span">This input is required.</span>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="Password2" class="form-control required">
                                <span class="text-danger error-span">This input is required.</span>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" id="Password3"  class="form-control">
                                <span class="text-danger error-span">This input is required.</span>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login">Sign Up</button>
                            </div>

                    </form>
                </div>
                <ul class="btn-login list_none text-center mt-2">
                    <li><a href="#" class="btn btn-facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                    <li><a href="#" class="btn btn-google"><i class="fa fa-google" aria-hidden="true"></i> Google</a></li>
                </ul>

                <div class="text-center">
                    OR

                    <p class="mt-3"><i class="ti-user mr-1"></i>Already Have An Account? <a href="#" class="link" data-toggle="modal" data-target="#login" data-dismiss="modal">Go For LogIn</a></p>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- End Modal -->

<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<script src="<?= base_url() ?>assets/front/js/jquery.min.js"></script>

<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css" rel="stylesheet">


<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->

<script src="<?= base_url() ?>assets/front/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/front/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/front/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/front/js/slick.js"></script>
<script src="<?= base_url() ?>assets/front/js/jquery.counterup.min.js"></script>
<script src="<?= base_url() ?>assets/front/js/counterup.min.js"></script>
<script src="<?= base_url() ?>assets/front/js/custom.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>



<script>
    (function ($) {
        $(document).ready(function () {
            var $chatbox = $('.chatbox'),
                    $chatboxTitle = $('.chatbox__title'),
                    $chatboxTitleClose = $('.chatbox__title__close'),
                    $chatboxCredentials = $('.chatbox__credentials');
            $chatboxTitle.on('click', function () {
                $chatbox.toggleClass('chatbox--tray');
            });
            $chatboxTitleClose.on('click', function (e) {
                e.stopPropagation();
                $chatbox.addClass('chatbox--closed');
            });
            $chatbox.on('transitionend', function () {
                if ($chatbox.hasClass('chatbox--closed'))
                    $chatbox.remove();
            });

        });
    })(jQuery);
</script>














<script>
    (function () {

        $("#cart").on("click", function () {
            $(".shopping-cart").fadeToggle("fast");
        });

    })();
</script>


<script type="text/javascript">
    var baseurl = "<?php echo base_url(); ?>";

    var baseURL = "<?php echo base_url(); ?>";
</script>

<script src="<?= base_url() ?>assets/front/js/main.js"></script>
<script src="<?= base_url() ?>assets/front/js/script.js"></script>

<script src="<?= base_url() ?>assets/front/js/cart.js"></script>
<script src="<?= base_url() ?>assets/front/js/pagination.min.js" type="text/javascript"></script>




</body>


</html>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="author" content="www.frebsite.nl" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <title>Mera English</title>

        <!-- Custom CSS -->
        <link href="<?= base_url() ?>assets/front/css/styles.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/front/css/gird.css" rel="stylesheet">

        <!-- Custom Color Option -->
        <link href="<?= base_url() ?>assets/front/css/colors.css" rel="stylesheet">

        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css" />

        <script src="<?= base_url() ?>assets/front/plugins/jquery-1.12.4.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <link href="<?= base_url() ?>assets/front/css/pagination.css" rel="stylesheet" type="text/css"/>

        <style>
            .error-span {
                display: none;
            }
            .error{
                color:red;
                font-weight: normal;

            }



        </style>


        <script>
            var baseURL = "<?= base_url() ?>";
        </script>

        <script>
            var baseurl = "<?= base_url() ?>";
        </script>

    </head>

    <body class="red-skin">

        <div id="preloader"><div class="preloader"><span></span><span></span></div></div>

        <div id="main-wrapper">

            <div class="alert alert_top alert-dismissible fade show" role="alert">
                <div class="container"> 
                    <div class="alert_caption">	
                        <p><?= $entroll_content->text_content ?> <a href="<?= $entroll_content->url ?>" target="_blank">Enroll Now</a></p>
<!--                        <p>We've Launched New Tool For Web Designers <a href="<?= base_url() ?>course-list">Enroll Now</a></p>-->
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="header header-light head-shadow">
                <div class="container">
                    <nav id="navigation" class="navigation navigation-landscape">
                        <div class="nav-header">
                            <a class="nav-brand" href="<?= base_url() ?>">
                                <img src="<?= base_url() ?>assets/front/img/mera-logo.jpg" class="logo" alt="" />
                            </a>
                            <div class="nav-toggle"></div>
                        </div>
                        <div class="nav-menus-wrapper" style="transition-property: none;">
                            <ul class="nav-menu">
                                <!--<li><a href="<?= base_url() ?>">Home</a></li>-->
                                <li><a href="<?= base_url() ?>about-us">About Us</a></li>
                                <li class=""><a href="<?= base_url() ?>course-list">Courses<span class="submenu-indicator"></span></a>
                                    <ul class="nav-dropdown nav-submenu">
                                        <?php for ($i = 0; $i < 3 && $i < sizeof($recent_courses); $i++): ?>

                                            <li><a href="<?= base_url() ?>cources-details/<?= $recent_courses[$i]->id ?>"><?= $recent_courses[$i]->course_title ?></a></li>
                                        <?php endfor; ?>
                                    </ul>
                                </li>
                                <li><a href="<?= base_url() ?>clients">Clients</a></li>
                                <!--<li><a href="<?= base_url() ?>blog">Blog</a></li>-->
                                <!--<li><a href="<?= base_url() ?>media-coverage">Media</a></li>-->
                                <li><a href="<?= base_url() ?>contact-us">Contact</a></li>
                            </ul>

                            <ul class="nav-menu nav-menu-social align-to-right">
                                <li class="login_click search" style="width: 230px;">
                                    <form class="search-data">
                                        <input class="form-control" type="search" name="text" placeholder="Search Courses" aria-label="Search" style="width:75%;float:left;height: 50px !important;">
                                        <button class="btn my-2 my-sm-0" type="submit" style="width:25%;height: 50px !important;"><i class="ti-search" style="margin-left:-5px"></i></button>
                                    </form>
                                </li>



                                <?php if (isset($_SESSION['loginid']) && $_SESSION['isloggedin'] == TRUE) { ?>
                                    <li class=""><a href="#">My Account<span class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">

                                            <li><a href="<?= base_url(); ?>student-dashboard">Dashboard</a></li>
                                            <li><a href="<?= base_url(); ?>logout">logout</a></li>

                                        </ul>
                                    </li>
                                <?php } else { ?>
                                    <li class="login_click light">
                                        <a href="#" data-toggle="modal" data-target="#login">Sign in</a>
                                    </li>
                                    <li class="login_click theme-bg">
                                        <a href="#" data-toggle="modal" data-target="#signup">Sign up</a>
                                    </li>

                                <?php } ?>
                                <li><a id="cart"><i class="fa fa-shopping-cart"></i> Cart <span class="badge"><?= count($_SESSION['cart_items']) ?></span></a></li>
                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Navigation -->
            <div class="clearfix"></div>
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->




            <div class="container cart-menu">
                <div class="shopping-cart">
                    <div class="shopping-cart-header">
                        <i class="fa fa-shopping-cart cart-icon"></i><span class="badge"><?= count($_SESSION['cart_items']) ?></span>
                        <div class="shopping-cart-total">
                            <?php
                            $_SESSION['total'] = 0;
                            if ($_SESSION['cart_items']) {
                                $carts = $_SESSION['cart_items'];

                                foreach ($carts as $cart) {
                                    $record = $this->frontend_model->get_records('tbl_courses', "status='0' and id=$cart->product_id")[0];
                                    $_SESSION['total'] += (int) $record->cost * $cart->product_quantity;
                                    //	$value=(isset($_SESSION['product_count']))?$_SESSION['product_count']:"1";
                                    //	$_SESSION['total']*=$value;
                                }
                            }
                            ?>

                            <span class="lighter-text">Total:</span>
                            <span class="main-color-text">₹<?= $_SESSION['total'] ?></span>
                        </div>
                    </div> <!--end shopping-cart-header -->




                    <ul class="shopping-cart-items">
                        <?php
                        if ($_SESSION['cart_items']):
                            $carts = $_SESSION['cart_items'];
                            //$_SESSION['total']=0;
                            foreach ($carts as $cart):
                                $record = $this->frontend_model->get_records('tbl_courses', "status=0 and id=$cart->product_id")[0];
                                //	$value=(isset($_SESSION['product_count']))?$_SESSION['product_count']:"1";
                                //$_SESSION['total']*=$value;
                                ?>
                                <li class="clearfix">
                                    <img src="<?= base_url() ?>uploads/common/<?= $record->course_banner ?>" alt="item1" style="width:100px"/>
                                    <span class="item-name"><?= $record->course_title ?></span>
                                    <?php if ($record->course_amt_type != '2') { ?>
                                    <span class="item-price">₹<?= $record->cost ?></span>
                                    <?php } else { ?>
                                    <span class="item-price">Free</span>
                                    <?php } ?>
                                    <span class="item-quantity">Quantity: <?= $cart->product_quantity ?></span>
                                </li>

    <?php endforeach;
endif;
?>

                    </ul>

                    <a href="<?= base_url() ?>cart" class="button">View Cart</a>

                    <?php if (isset($_SESSION['loginid']) && $_SESSION['isloggedin'] == TRUE) { ?>
                        <a href="<?= base_url() ?>checkout" class="button">Checkout</a>
<?php } else { ?>
                        <a href="#" data-toggle="modal" data-target="#login" class="button">Checkout</a>

<?php } ?>


                </div> <!--end shopping-cart -->
            </div> 



<?php include("header.php") ?>



<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" style="background-image: url(<?= base_url() ?>assets/front/img/slider-2.jpg);">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title text-left">
                    <h1>Courses</h1>
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Courses</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>

<!-- ============================ Featured Courses Start ================================== -->
<section  class="bg-light">
    <div class="container">


        <div class="row align-items-center">
            <?php if (!empty($records)) { ?>
                <?php foreach ($records as $record): ?>
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="education_block_grid style_2 p-3 row">
                            <div class="education_block_thumb n-shadow col-lg-6 p-0">
                                <a href="#0">
                                    <?php if ($record->course_banner != '') { ?>
                                        <img src="<?= base_url() ?>uploads/common/<?= $record->course_banner ?>" class="img-fluid" alt="">
                                    <?php } else { ?>
                                        <img src="<?= base_url() ?>assets/front/img/my-course.jpg" class="img-fluid" alt="">
                                    <?php } ?>
                                </a>
                                <div class="cources_price">Badges</div>
                            </div>

                            <div class="col-lg-6">							
                                <div class="education_block_body p-2">
                                    <h3><a href="#0"><?= $record->course_title ?></a></h3>
                                </div>

                                <!--<div class="cources_facts">
                                        <ul class="cources_facts_list">
                                                <li class="facts-1">Expert</li>
                                                <li class="facts-2">Professional</li>
                                                <li class="facts-5">Design</li>
                                        </ul>
                                </div>-->

                                <div class="cources_info">
                                    <div class="cources_info_style3 w-100 p-0">
                                        <ul>
                                            <?php if ($record->course_type == '1') { ?>
                                                <li><i class="ti-eye mr-2"></i>8682 Views</li>
                                                <li><i class="ti-time mr-2"></i><?= $record->duration ?></li>
                                            <?php } ?>
                                            <li><i class="ti-star text-warning mr-2"></i>4.7 Reviews</li>
                                        </ul>
                                    </div>
                                    <?php if ($record->course_amt_type != '2') { ?>
                                        <div class="cources_price_foot"><span class="price_off">₹<?= $record->discount_price ?></span><?= $record->cost ?>/-</div>
                                    <?php } else { ?>
                                        <div class="cources_price_foot">Free</div>
                                    <?php } ?>
                                </div>

                                <div class="ed_view_box style_3 m-0">
                                    <div class="ed_view_short pl-4 pr-4 pb-2">
                                        <p><?= $record->description ?></p>
                                    </div>
                                    <div class="ed_view_features half_list pl-4 pr-3 mb-0">
                                        <span>Course Features</span>
                                        <ul>
                                            <li><i class="ti-user"></i>3k Students View</li>
                                            <?php if ($record->course_type == '1') { ?>
                                                <li><i class="ti-time"></i>2 hour 30 min</li>
                                            <?php } ?>
                                            <li><i class="ti-bar-chart-alt"></i>Principiante</li>
                                            <li><i class="ti-cup"></i>04 Certified</li>
                                        </ul>
                                    </div>
                                </div>
                                <form class="single-add-to-cart-form">

                                    <div class="d-flex justify-content-center">
                                        <a type="submit" class="btn btn-outline-theme w-100" href="cources-details/<?= $record->id ?>">Details</a>
                                        <input type="hidden" name="product_id" value="<?= $record->id ?>"/>
                                        <input type="hidden" name="product_quantity" class="variation_id" value="1"/>

                                        <button type="submit" class="btn btn-theme text-white w-100">Join Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>	
                    </div>
                <?php endforeach; ?>
            <?php } else { ?>
                <h4 style="text-align:center;">No Courses Found</h4>
            <?php } ?>

        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <!-- Pagination -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">

                                <div class="paginations">
                                    <?= $links; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<!-- ============================ Featured Courses End ================================== -->






<?php include("footer.php") ?>
<!-- ============================ Featured Courses Start ================================== -->
<section  class="bg-light" style="margin-top: -73px;">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">
                    <p>New &amp; Trending</p>
                    <h2><span class="theme-cl">Featured</span> Courses by professional Instructor</h2>
                </div>
            </div>
        </div>


        <?php $record = $this->frontend_model->get_records('tbl_courses', "status='0' and post_status = '1'")[0]; ?>
        <?php $reviews = $this->frontend_model->get_records('tbl_user_reviews', "video_id=$record->id"); ?>
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-6 col-sm-12">
                <div class="education_block_grid style_2 p-3 row">
                    <div class="education_block_thumb n-shadow col-lg-6 p-0">
                        <a href="#0">
                            <?php if ($record->course_banner != '') { ?>
                                <img src="<?= base_url() ?>uploads/common/<?= $record->course_banner ?>" class="img-fluid" alt="">
                            <?php } else { ?>
                                <img src="<?= base_url() ?>assets/front/img/idioms.jpg" class="img-fluid" alt="">
                            <?php } ?>
                        </a>
                        <!--<div class="cources_price">Badges</div>-->
                    </div>

                    <div class="col-lg-6">                          
                        <div class="education_block_body p-2">
                            <h3><a href="#0"><?= $record->course_title ?></a></h3>
                        </div>

                        <div class="cources_info">
                            <?php if ($record->course_type == '1') { ?>
                                <div class="cources_info_style3 w-100 p-0">

                                    <ul>
                                        <li><i class="ti-eye mr-2"></i>8682 Views</li>
                                        <li><i class="ti-time mr-2"></i><?= $record->duration ?></li>
                                        <li><i class="ti-star text-warning mr-2"></i><?= sizeof($reviews) ?>  Reviews</li> 
                                    </ul>
                                </div>
                            <?php } else { ?>
                                <div class="cources_info_style3 w-100 p-0">
                                    <ul>
                                        <li><i class="ti-star text-warning mr-2"></i><?= sizeof($reviews) ?>  Reviews</li> 
                                    </ul>
                                </div>
                            <?php } ?>
                            <div class="cources_price_foot"><span class="price_off">₹<?= $record->discount_price ?></span><?= $record->cost ?>/-</div>
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



        </div>




        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="text-center">
                    <a href="<?= base_url() ?>course-list" class="btn btn-theme-2">More Courses</a>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ============================ Featured Courses End ================================== -->

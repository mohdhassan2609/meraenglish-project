
<style>
    div.stars {
        width: 270px;
        display: inline-block;
    }

    input.star { display: none; }

    label.star {
        float: right;
        padding: 10px;
        font-size: 36px;
        color: #444;
        transition: all .2s;
    }

    input.star:checked ~ label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s;
    }

    input.star-5:checked ~ label.star:before {
        color: #FE7;
        text-shadow: 0 0 20px #952;
    }

    input.star-1:checked ~ label.star:before { color: #F62; }

    label.star:hover { transform: rotate(-15deg) scale(1.3); }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome;

    }
</style>


<?php
$rating = array();
$rating['total'] = 0;
$rating['rating_1'] = 0;
$rating['rating_2'] = 0;
$rating['rating_3'] = 0;
$rating['rating_4'] = 0;
$rating['rating_5'] = 0;

foreach ($reviews as $r) {
    $rating['total'] += $r->ratings;
    if ($r->ratings == 1)
        $rating['rating_1']++;
    if ($r->ratings == 2)
        $rating['rating_2']++;
    if ($r->ratings == 3)
        $rating['rating_3']++;
    if ($r->ratings == 4)
        $rating['rating_4']++;
    if ($r->ratings == 5)
        $rating['rating_5']++;
}
$rating['avg'] = round($rating['total'] / sizeof($reviews), 1);
$rating['rat_1_%'] = round($rating['rating_1'] / sizeof($reviews), 3) * 100;
$rating['rat_2_%'] = round($rating['rating_2'] / sizeof($reviews), 3) * 100;
$rating['rat_3_%'] = round($rating['rating_3'] / sizeof($reviews), 3) * 100;
$rating['rat_4_%'] = round($rating['rating_4'] / sizeof($reviews), 3) * 100;
$rating['rat_5_%'] = round($rating['rating_5'] / sizeof($reviews), 3) * 100;
?>

<!-- ============================ Course Header Info Start================================== -->
<div class="image-cover ed_detail_head lg" style="background:#f4f4f4 url(<?= base_url() ?>uploads/common/<?= $record->course_banner ?>);" data-overlay="8">
    <div class="container">
        <div class="row">

            <div class="col-lg-7 col-md-9">
                <div class="ed_detail_wrap light">
                    <ul class="cources_facts_list">
                        <li class="facts-1">Graphic</li>
                        <li class="facts-5">Design</li>
                    </ul>
                    <div class="ed_header_caption">
                        <h2 class="ed_title"><?= $record->course_title ?></h2>
                        <!--<ul>
                                <li><i class="ti-calendar"></i>10 - 20 weeks</li>
                                <li><i class="ti-control-forward"></i>102 Lectures</li>
                                <li><i class="ti-user"></i>502 Student Enrolled</li>
                        </ul>-->
                    </div>

                    <div class="ed_rate_info">
                        <div class="star_info" data-starrating2="5">


                            <?php $count = 1; ?>
                            <?php while ($count <= $reviews->ratings): ?>
                                <i class="ti-star active"></i>
                                <?php
                                $count++;
                            endwhile;
                            ?>
                            <?php while ($count <= 5): ?>
                                <i class="ti-star filled "></i>
                                <?php
                                $count++;
                            endwhile;
                            ?>

                        </div>
                        <?php if (!empty($reviews)) { ?>
                            <div class="review_counter">
                                <strong class="good"><?= $rating['avg'] ?></strong> <?= sizeof($reviews) ?> Reviews
                            </div>
                        <?php } else { ?>
                            <div class="review_counter">
                                <?php $rating['avg'] = 0; ?>
                                <strong class="good"><?= $rating['avg'] ?></strong> <?= 0 ?> Reviews
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Course Header Info End ================================== -->

<!-- ============================ Course Detail ================================== -->
<section class="bg-light">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-8">

                <div class="inline_edu_wrap">
                    <div class="inline_edu_first">
                        <h4><?= $record->course_title ?></h4>
                        <div class="cources_info_style3 w-100 p-0">
                            <ul>
                                <?php if ($records->course_type == '1') {
                                    ?>
                                    <li><i class="ti-eye mr-2"></i>8682 Views</li>
                                    <li><i class="ti-time mr-2"></i><?= $record->duration; ?></li>
                                <?php } ?>
                                <li><i class="ti-star text-warning mr-2"></i><?= sizeof($reviews) ?> Reviews</li>
                            </ul>
                        </div>

                    </div>	
                    <div class="inline_edu_last">
                        <?php if ($record->course_amt_type != '2') { ?>
                            <div class="cources_price_foot"><span class="price_off">₹<?= $record->discount_price ?></span>₹<?= $record->cost ?>/-</div>
                        <?php } else { ?>
                            <div class="cources_price_foot">Free &nbsp;</div>
                        <?php } ?>
                        <form class="single-add-to-cart-form">

                            <input type="hidden" name="product_id" value="<?= $record->id ?>"/>
                            <input type="hidden" name="product_quantity" class="variation_id" value="1"/>

                            <button class="btn btn-theme enroll-btn">Enroll Now<i class="ti-angle-right"></i></button>

                        </form>

                    </div>
                </div>

                <div class="property_video xl">
                    <div class="thumb">
                        <?php if ($record->course_banner != '') { ?>
                            <img class="pro_img img-fluid w100" src="<?= base_url() ?>uploads/common/<?= $record->course_banner ?>" alt="">
                        <?php } else { ?>
                            <img class="pro_img img-fluid w100" src="<?= base_url() ?>assets/front/img/my-course.jpg" alt="">
                        <?php } ?>
                    <!--<img src="<?= base_url() ?>uploads/common/<?= $record->course_banner ?>" alt="7.jpg">-->
                        <div class="overlay_icon">
                            <?php if ($records->course_type == '1') { ?>
                                <div class="bb-video-box">
                                    <div class="bb-video-box-inner">
                                        <div class="bb-video-box-innerup">
                                            <a href="<?= $record->preview_video ?>" data-toggle="modal" data-target="#popup-video" class="theme-cl"><i class="ti-control-play"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <!-- All Info Show in Tab -->
                <div class="tab_box_info mt-4">
                    <ul class="nav nav-pills mb-3 light" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="overview-tab" data-toggle="pill" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                        </li>
                        <?php if ($records->course_type == '1') { ?>
                            <li class="nav-item">
                                <a class="nav-link" id="curriculum-tab" data-toggle="pill" href="#curriculum" role="tab" aria-controls="curriculum" aria-selected="false">Curriculum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="instructor-tab" data-toggle="pill" href="#instructor" role="tab" aria-controls="instructor" aria-selected="false">Instructor</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-tab" data-toggle="pill" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">

                        <!-- Overview Detail -->
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <!-- Overview -->
                            <div class="edu_wraper">
                                <h4 class="edu_title">Course Overview</h4>
                                <p><?= $records->course_overview; ?></p>
                                <h6>Requirements</h6>
                                <ul class="lists-3">
                                    <li><?= $records->requirements; ?></li>
                                    <!-- <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                                    <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                                    <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                                    <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li> -->
                                </ul>
                            </div>

                            <!-- Overview -->
                            <div class="edu_wraper">
                                <h4 class="edu_title">What you'll learn</h4>
                                <ul class="edu_list third">
                                    <li><?= $records->what_you_will_learn; ?></li>
                                    <!-- <li>At vero eos et accusamus</li>
                                    <li>At vero eos et accusamus</li>
                                    <li>At vero eos et accusamus</li>
                                    <li>At vero eos et accusamus</li>
                                    <li>At vero eos et accusamus</li>
                                    <li>At vero eos et accusamus</li>
                                    <li>At vero eos et accusamus</li>
                                    <li>At vero eos et accusamus</li> -->
                                </ul>
                            </div>
                        </div>

                        <!-- Curriculum Detail -->
                        <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                            <div class="edu_wraper">
                                <h4 class="edu_title">Course Circullum</h4>
                                <div id="accordionExample" class="accordion shadow circullum">
                                    <?php $i = 1; ?>
                                    <?php foreach ($curriculums as $curriculum): ?>
                                        <!-- Part 1 -->
                                        <div class="card">
                                            <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                                <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapse-<?= $curriculum->id ?>" aria-expanded="true"  aria-controls="collapse-<?= $curriculum->id ?>" class="d-block position-relative text-dark collapsible-link py-2 " style="background-color: #FFF !important;"><?= $curriculum->curriculum; ?>: <?= $curriculum->curriculum_title; ?></a></h6>
                                            </div>
                                            <div id="collapse-<?= $curriculum->id ?>" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
                                                <div class="card-body pl-3 pr-3">

                                                    <ul class="lectures_lists">
                                                        <?php
                                                        $video_record = $this->frontend_model->get_records('tbl_video_content', "status=0 and video_id='$curriculum->id'");
                                                        ?>
                                                        <?php foreach ($video_record as $video): ?>
                                                            <li><div class="lectures_lists_title">
                                                                    <i class="ti-control-play"></i>Lecture: <?= $i; ?></div><?= $video->title; ?></li>

                                                            <?php
                                                            $i++;
                                                        endforeach;
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>


                                </div>
                            </div>
                        </div>

                        <!-- Instructor Detail -->
                        <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                            <div class="single_instructor">
                                <div class="single_instructor_thumb">
                                    <a href="#"><img src="<?= base_url() ?>uploads/common/<?= $record->ins_img; ?>" class="img-fluid" alt=""></a>
                                </div>
                                <div class="single_instructor_caption">
                                    <h4><a href="#"><?= $record->ins_name; ?></a></h4>
                                    <ul class="instructor_info">
                                        <li><i class="ti-video-camera"></i><?= $record->no_of_videos; ?></li>
                                        <li><i class="ti-control-forward"></i><?= $record->no_of_lectures; ?></li>
                                        <li><i class="ti-user"></i>Exp. <?= $record->ins_experience; ?> Year</li>
                                    </ul>
                                    <p><?= $record->ins_description; ?></p>
                                    <ul class="social_info">
                                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                                        <li><a href="#"><i class="ti-twitter"></i></a></li>
                                        <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Detail -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">

                            <!-- Overall Reviews -->
                            <div class="rating-overview">
                                <div class="rating-overview-box">
                                    <span class="rating-overview-box-total"><?= $rating['avg'] ?></span>
                                    <span class="rating-overview-box-percent">out of 5.0</span>
                                    <div class="star-rating" data-rating="5"><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i>
                                    </div>
                                </div>

                                <div class="rating-bars">
                                    <div class="rating-bars-item">
                                        <span class="rating-bars-name">5 Star</span>
                                        <span class="rating-bars-inner">
                                            <span class="rating-bars-rating high" data-rating="4.7">
                                                <span class="rating-bars-rating-inner" style="width: <?= $rating['rat_5_%'] ?>%;"></span>
                                            </span>
                                            <strong><?= $rating['rat_5_%'] ?>%</strong>
                                        </span>
                                    </div>
                                    <div class="rating-bars-item">
                                        <span class="rating-bars-name">4 Star</span>
                                        <span class="rating-bars-inner">
                                            <span class="rating-bars-rating good" data-rating="3.9">
                                                <span class="rating-bars-rating-inner" style="width: <?= $rating['rat_4_%'] ?>%;"></span>
                                            </span>
                                            <strong><?= $rating['rat_4_%'] ?>%</strong>
                                        </span>
                                    </div>
                                    <div class="rating-bars-item">
                                        <span class="rating-bars-name">3 Star</span>
                                        <span class="rating-bars-inner">
                                            <span class="rating-bars-rating mid" data-rating="3.2">
                                                <span class="rating-bars-rating-inner" style="width: <?= $rating['rat_3_%'] ?>%;"></span>
                                            </span>
                                            <strong><?= $rating['rat_3_%'] ?>%</strong>
                                        </span>
                                    </div>
                                    <div class="rating-bars-item">
                                        <span class="rating-bars-name">1 Star</span>
                                        <span class="rating-bars-inner">
                                            <span class="rating-bars-rating poor" data-rating="2.0">
                                                <span class="rating-bars-rating-inner" style="width: <?= $rating['rat_1_%'] ?>%;"></span>
                                            </span>
                                            <strong><?= $rating['rat_1_%'] ?>%</strong>
                                        </span>
                                    </div>
                                </div>
                            </div>


                            <?php if (!empty($reviews)) { ?>
                                <!-- Reviews -->
                                <div class="list-single-main-item fl-wrap">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Item Reviews -  <span> <?php count($reviews); ?> </span></h3>
                                    </div>
                                    <div class="reviews-comments-wrap">
                                        <!-- reviews-comments-item -->  
                                        <?php foreach ($reviews as $review) : ?>
                                            <div class="reviews-comments-item">
                                                <div class="review-comments-avatar">
                                                    <img src="<?= base_url() ?>assets/front/img/user-1.jpg" class="img-fluid" alt="">
                                                </div>
                                                <?php $date = date_create($review->date_time); ?>
                                                <div class="reviews-comments-item-text">
                                                    <h4><a href="#"><?= $review->name; ?></a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i><?php echo date_format($date, "H:i:s a d M, Y"); ?></span></h4>
                                                    <div class="listing-rating high" data-starrating2="5">
                                                        <?php $count = 1; ?>
                                                        <?php while ($count <= $review->ratings): ?>
                                                            <i class="ti-star active"></i>
                                                            <?php
                                                            $count++;
                                                        endwhile;
                                                        ?>
                                                        <?php while ($count <= 5): ?>
                                                            <i class="ti-star"></i>
                                                            <?php
                                                            $count++;
                                                        endwhile;
                                                        ?>
                                                        <span class="review-count"><?= $review->ratings ?></span> </div>
                                                    <div class="clearfix"></div>
                                                    <p><?= $review->review; ?></p>
                                                    <!--<div class="pull-left reviews-reaction">-->
                                                    <!--	<a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>-->
                                                    <!--	<a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>-->
                                                    <!--	<a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>-->
                                                    <!--</div>-->
                                                </div>
                                            </div>
                                            <!--reviews-comments-item end-->  
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="list-single-main-item fl-wrap">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Item Reviews -  <span> O  </span></h3>
                                    </div>
                                    <div class="reviews-comments-wrap">
                                        <!-- reviews-comments-item -->  
                                        <h4 style="text-align:center;">No Reviews Found</h4>
                                        <!--reviews-comments-item end-->  


                                    </div>
                                </div>
                            <?php } ?>
                            <?php $id = $_SESSION['login_id']; ?>
                            <!-- Submit Reviews -->
                            <div class="edu_wraper">
                                <h4 class="edu_title">Submit Reviews</h4>
                                <div>
                                    <form class="review-form form-submit">
                                        <div class="row">

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" placeholder="Your Name" name="name" required >
                                                    <input type="hidden" value="tbl_user_reviews" name="table_name" >
                                                    <input type="hidden" name="user_id"  value="<?php
                                                    if ($id) {

                                                        echo $id;
                                                    } else {
                                                        ?> 0<?php } ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" placeholder="Your Email" name="email" required>

                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Rating</label>
                                                    <div class="stars">
                                                        <input class="star star-5" id="star-5" type="radio" name="rating" value= '5'/>
                                                        <label class="star star-5" for="star-5"></label>
                                                        <input class="star star-4" id="star-4" type="radio" name="rating" value= '4'/>
                                                        <label class="star star-4" for="star-4"></label>
                                                        <input class="star star-3" id="star-3" type="radio" name="rating" value= '3'/>
                                                        <label class="star star-3" for="star-3"></label>
                                                        <input class="star star-2" id="star-2" type="radio" name="rating" value= '2'/>
                                                        <label class="star star-2" for="star-2"></label>
                                                        <input class="star star-1" id="star-1" type="radio" name="rating" value= '1'/>
                                                        <label class="star star-1" for="star-1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" value="<?= $item->id; ?>" name="video_id" >
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Review</label>
                                                    <textarea name="review" class="form-control" cols="30" rows="6" placeholder="Type your reviews...." required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-theme">Submit Review</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-md-4">

                <!-- Course info -->
                <div class="ed_view_box style_3">

                    <div class="property_video sm">
                        <div class="thumb">
                            <?php if ($record->course_banner_1 != '') { ?>
                                <img class="pro_img img-fluid w100" src="<?= base_url() ?>uploads/common/<?= $record->course_banner_1; ?>" alt="7.jpg">
                            <?php } else { ?>
                                <img class="pro_img img-fluid w100" src="<?= base_url() ?>assets/front/img/my-course.jpg" alt="7.jpg">
                            <?php } ?>
                            <div class="overlay_icon">
                                <?php if ($record_course->course_type == '1') { ?>
                                    <div class="bb-video-box">
                                        <div class="bb-video-box-inner">
                                            <div class="bb-video-box-innerup">
                                                <a href="" data-toggle="modal" data-target="#popup-video" class="theme-cl"><i class="ti-control-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="ed_view_price pl-4">
                        <span>Actual Price</span>
                        <?php if ($record->course_amt_type != '2') { ?>
                            <h2 class="theme-cl"><span class="price_off"></span>₹<?= $record->discount_price; ?></h2>
                        <?php } else { ?>
                            <h2 class="theme-cl"><span class="price_off"></span>Free</h2>
                        <?php } ?>

                    </div>

                    <div class="ed_view_short pl-4 pr-4 pb-2">
                        <p><?= $record->description; ?></p>
                    </div>

                    <div class="ed_view_features half_list pl-4 pr-3">
                        <span>Course Features</span>
                        <ul>
                            <?php $keyword = explode(",", $feature->features); ?>                               
                            <li><i class="ti-user"></i><?= $keyword[0]; ?></li>
                            <?php if ($records->course_type == '1') { ?>
                                <li><i class="ti-time"></i><?= $keyword[1]; ?></li>
                            <?php } ?>
                            <li><i class="ti-bar-chart-alt"></i><?= $keyword[2]; ?></li>
                            <li><i class="ti-cup"></i><?= $keyword[3]; ?></li>  
                        </ul>
                    </div>
                    <div class="ed_view_link">
                        <form class="single-add-to-cart-form">

                            <input type="hidden" name="product_id" value="<?= $record->id ?>"/>
                            <input type="hidden" name="product_quantity" class="variation_id" value="1"/>

                            <button class="btn btn-theme enroll-btn">Enroll Now<i class="ti-angle-right"></i></button>

                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>
<!-- ============================ Course Detail ================================== -->







<!-- Video Modal -->
<div class="modal fade" id="popup-video" tabindex="-1" role="dialog" aria-labelledby="popup-video" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <iframe class="embed-responsive-item" width="100%" height="480" src="<?= $record->preview_video ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
</div>
<!-- End Video Modal -->


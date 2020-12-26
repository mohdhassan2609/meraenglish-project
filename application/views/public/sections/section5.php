    <!-- ============================ Testimonial Start ================================== -->
            <section style="background:url(<?=base_url()?>assets/front/img/testimonial.png)" style="margin-top: -60px;">
                <div class="container">
                
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6 col-sm-12">
                            <div class="sec-heading center">
                                <p>What People Say?</p>
                                <h2><span class="theme-cl">Reviews</span> By Our Success & Top Students</h2>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div id="testimonials_style" class="slick-carousel-3 arrow_middle">
                                <?php $tests= $this->frontend_model->get_records('tbl_testimonials_add', "status='0' order by date_time asc"); 
                                    foreach($tests as $test): ?>
                                <div class="testimonial-detail">
                                    <div class="client-detail-box">
                                        <div class="pic">
                                            <img src="<?=base_url()?>uploads/common/<?= $test->image; ?>" alt="">
                                        </div>
                                        <div class="client-detail">
                                            <h3 class="testimonial-title"><?= $test->name; ?></h3>
                                            <span class="post"><?= $test->designation; ?></span>
                                        </div>
                                    </div>
                                    <p class="description">
                                        " <?= $test->description; ?> "
                                    </p>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>  
            <!-- ============================ Testimonial End ================================== -->

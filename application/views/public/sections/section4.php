<!-- ========================== Brand Section =============================== -->
                        <!--<section class="bg-light">-->
<section   style="margin-top: -44px;">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">
                    <!--<p>New &amp; Trending</p>-->								
                    <h2><span class="theme-cl">Media </span> Coverage</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <?php $media = $this->frontend_model->get_records('tbl_media_coverage', "status='0' order by date_time desc limit 0,5"); ?>
                    <!-- Single Article -->
                    <div class="col-lg-1 col-md-1 col-sm-1"></div>
                    <?php foreach ($media as $m) { ?>
                        <div class="col-lg-2 col-md-2 col-sm-12">
                            <div class="articles_grid_style">
                                <div class="articles_grid_thumb">
                                    <a href="<?= $m->link ?>"><img src="<?= base_url() ?>uploads/common/<?php echo $m->image ?>" class="img-fluid" alt="" style="width: 100%; height: 150px;" /></a>
                                </div>
                                <div class="articles_grid_caption">
                                    <h5 style="display: flex;"><a href="<?= $m->link ?>"><?= $m->title ?></a></h5>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-lg-1 col-md-1 col-sm-1"></div>
                </div>
                <div class="text-center">										
                    <a href="<?= base_url() ?>media-coverage" class="btn btn-theme-2">More Media</a>
                </div>
            </div>
        </div>

    </div>
</section>
<!--<section>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">
                    <p>New &amp; Trending</p>								
                    <h2><span class="theme-cl">Events &amp;</span> Awards</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="single_brand" id="brand-slide">

                     single 
                    <div class="single_brands">
                        <img src="<?= base_url() ?>assets/front/img/brand-1.png" class="img-fluid" alt="" />
                    </div>

                     single 
                    <div class="single_brands">
                        <img src="<?= base_url() ?>assets/front/img/brand-2.png" class="img-fluid" alt="" />
                    </div>

                     single 
                    <div class="single_brands">
                        <img src="<?= base_url() ?>assets/front/img/brand-3.png" class="img-fluid" alt="" />
                    </div>

                     single 
                    <div class="single_brands">
                        <img src="<?= base_url() ?>assets/front/img/brand-4.png" class="img-fluid" alt="" />
                    </div>

                     single 
                    <div class="single_brands">
                        <img src="<?= base_url() ?>assets/front/img/brand-5.png" class="img-fluid" alt="" />
                    </div>

                     single 
                    <div class="single_brands">
                        <img src="<?= base_url() ?>assets/front/img/brand-6.png" class="img-fluid" alt="" />
                    </div>

                     single 
                    <div class="single_brands">
                        <img src="<?= base_url() ?>assets/front/img/brand-7.png" class="img-fluid" alt="" />
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>-->
<!-- ========================== Brand Section =============================== -->



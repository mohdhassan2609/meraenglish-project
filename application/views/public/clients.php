
<?php include("header.php") ?>



<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" style="background-image: url(<?= base_url() ?>assets/front/img/slider-2.jpg);">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title text-left">
                    <h1>Our Clients</h1>
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Our Clients</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>


<!-- ========================== Brand Section =============================== -->
                        <!--<section class="bg-light">-->
<section>
    <div class="container">
        <div class="row">
            <?php if (!empty($records)) { ?>
            <?php foreach ($records as $record) { ?>
                <!-- Single Article -->
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="articles_grid_style" style="height: 295px;">
                        <div class="articles_grid_thumb">
                            <a href="blog-detail">
                                <img src="<?= base_url() ?>uploads/common/<?= $record->desktop_image ?>" class="img-fluid" alt="" />
                            </a>
                        </div>
                        <div class="articles_grid_caption">
                            <h4><?= $record->name ?></h4>
                            <p><?= $record->description ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php } else { ?>
                <div class="text-center">
                    <p>No Records found</p>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- ========================== Brand Section =============================== -->

<?php include("footer.php") ?>
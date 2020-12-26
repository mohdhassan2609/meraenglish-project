<?php include("header.php") ?>



<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" style="background-image: url(<?= base_url() ?>assets/front/img/slider-2.jpg);">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title text-left">
                    <h1>Media Coverage</h1>
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Media Coverage</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>


<!-- ========================== Articles Section =============================== -->
<section class="">
    <div class="container">

        <div class="row">
            <?php foreach ($records as $m) { ?>
                <!-- Single Article -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="articles_grid_style">
                        <div class="articles_grid_thumb">
                            <a href="<?= $m->link ?>"><img src="<?= base_url() ?>uploads/common/<?php echo $m->image ?>" class="img-fluid" alt="" style="width: 100%; height: 200px;" /></a>
                        </div>
                        <div class="articles_grid_caption">
                            <h4><a href="<?= $m->link ?>"><?= $m->title ?></a></h4>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!--Row-->
        <div class = "row">
            <div class = "col-lg-12 col-md-12 col-sm-12">

                <!--Pagination-->
                <div class = "row">
                    <div class = "col-lg-12 col-md-12 col-sm-12">

                        <!--Pagination-->
                        <div class = "row">
                            <div class = "col-lg-12 col-md-12 col-sm-12">
                                <ul class = "pagination p-center">
                                    <li class = "page-item">
                                        <a class = "page-link" href = "#" aria-label = "Previous">
                                            <span class = "ti-arrow-left"></span>
                                            <span class = "sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class = "page-item"><a class = "page-link" href = "#">1</a></li>
                                    <li class = "page-item"><a class = "page-link" href = "#">2</a></li>
                                    <li class = "page-item active"><a class = "page-link" href = "#">3</a></li>
                                    <li class = "page-item"><a class = "page-link" href = "#">...</a></li>
                                    <li class = "page-item"><a class = "page-link" href = "#">18</a></li>
                                    <li class = "page-item">
                                        <a class = "page-link" href = "#" aria-label = "Next">
                                            <span class = "ti-arrow-right"></span>
                                            <span class = "sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!--/Row-->

    </div>
</section>
<!--========================== Articles Section ============================== = -->




<?php include("footer.php")
?>
<?php include("header.php") ?>

<div class="chatbox chatbox22 chatbox--tray">
    <div class="chatbox__title">
        <h5><a href="javascript:void()">Leave a message</a></h5>
        <!--<button class="chatbox__title__tray">
            <span></span>
        </button>-->
        <button class="chatbox__title__close">
            <span>
                <svg viewBox="0 0 12 12" width="12px" height="12px">
                <line stroke="#FFFFFF" x1="11.75" y1="0.25" x2="0.25" y2="11.75"></line>
                <line stroke="#FFFFFF" x1="11.75" y1="11.75" x2="0.25" y2="0.25"></line>
                </svg>
            </span>
        </button>
    </div>
    <div class="chatbox__body">
        <div class="chatbox__body__message chatbox__body__message--left">

            <div class="chatbox_timing">
                <ul>
                    <li><a href="#"><i class="fa fa-calendar"></i> 22/11/2018</a></li>
                    <li><a href="#"><i class="fa fa-clock-o"></i> 7:00 PM</a></a></li>
                </ul>
            </div>
            <img src="https://www.gstatic.com/webp/gallery/2.jpg" alt="Picture">
            <div class="clearfix"></div>
            <div class="ul_section_full">
                <ul class="ul_msg">
                    <li><strong>Person Name</strong></li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                </ul>
                <div class="clearfix"></div>
                <ul class="ul_msg2">
                    <li><a href="#"><i class="fa fa-pencil"></i> </a></li>
                    <li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li>
                </ul>
            </div>

        </div>
        <div class="chatbox__body__message chatbox__body__message--right">

            <div class="chatbox_timing">
                <ul>
                    <li><a href="#"><i class="fa fa-calendar"></i> 22/11/2018</a></li>
                    <li><a href="#"><i class="fa fa-clock-o"></i> 7:00 PM</a></a></li>
                </ul>
            </div>

            <img src="https://www.gstatic.com/webp/gallery/2.jpg" alt="Picture">
            <div class="clearfix"></div>
            <div class="ul_section_full">
                <ul class="ul_msg">
                    <li><strong>Person Name</strong></li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                </ul>
                <div class="clearfix"></div>
                <ul class="ul_msg2">
                    <li><a href="#"><i class="fa fa-pencil"></i> </a></li>
                    <li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li>
                </ul>
            </div>

        </div>
        <div class="chatbox__body__message chatbox__body__message--left">

            <div class="chatbox_timing">
                <ul>
                    <li><a href="#"><i class="fa fa-calendar"></i> 22/11/2018</a></li>
                    <li><a href="#"><i class="fa fa-clock-o"></i> 7:00 PM</a></a></li>
                </ul>
            </div>

            <img src="https://www.gstatic.com/webp/gallery/2.jpg" alt="Picture">
            <div class="clearfix"></div>
            <div class="ul_section_full">
                <ul class="ul_msg">
                    <li><strong>Person Name</strong></li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                </ul>
                <div class="clearfix"></div>
                <ul class="ul_msg2">
                    <li><a href="#"><i class="fa fa-pencil"></i> </a></li>
                    <li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li>
                </ul>
            </div>

        </div>
        <div class="chatbox__body__message chatbox__body__message--right">

            <div class="chatbox_timing">
                <ul>
                    <li><a href="#"><i class="fa fa-calendar"></i> 22/11/2018</a></li>
                    <li><a href="#"><i class="fa fa-clock-o"></i> 7:00 PM</a></a></li>
                </ul>
            </div>

            <img src="https://www.gstatic.com/webp/gallery/2.jpg" alt="Picture">
            <div class="clearfix"></div>
            <div class="ul_section_full">
                <ul class="ul_msg">
                    <li><strong>Person Name</strong></li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                </ul>
                <div class="clearfix"></div>
                <ul class="ul_msg2">
                    <li><a href="#"><i class="fa fa-pencil"></i> </a></li>
                    <li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li>
                </ul>
            </div>

        </div>
        <div class="chatbox__body__message chatbox__body__message--left">

            <div class="chatbox_timing">
                <ul>
                    <li><a href="#"><i class="fa fa-calendar"></i> 22/11/2018</a></li>
                    <li><a href="#"><i class="fa fa-clock-o"></i> 7:00 PM</a></a></li>
                </ul>
            </div>

            <img src="https://www.gstatic.com/webp/gallery/2.jpg" alt="Picture">
            <div class="clearfix"></div>
            <div class="ul_section_full">
                <ul class="ul_msg">
                    <li><strong>Person Name</strong></li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                </ul>
                <div class="clearfix"></div>
                <ul class="ul_msg2">
                    <li><a href="#"><i class="fa fa-pencil"></i> </a></li>
                    <li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li>
                </ul>
            </div>

        </div>
    </div>
    <div class="panel-footer">
        <div class="input-group btn-color-2">
            <input id="btn-input" type="text" class="form-control input-sm chat_set_height" placeholder="Type your message here..." tabindex="0" dir="ltr" spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off" contenteditable="true" />

            <span class="input-group-btn">
                <button class="btn bt_bg btn-sm" id="btn-chat">
                    Send</button>
            </span>
        </div>
    </div>
</div>





<!-- ============================ Agency List Start ================================== -->

<section class="bg-light p-0">

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php $this->view('public/includes/sidenavbar'); ?>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-default d-block d-md-none">
                <div class="">
                    <div class="navbar-header d-flex">
                        <button type="button" id="sidebarCollapse" class="navbar-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <h4 class="pt-2 pl-3">Dashboard Menu</h4>
                    </div>
                </div>
            </nav>


            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">My Courses Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- /Row -->

                    <!-- Row -->

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="dashboard_container">
                                <div class="dashboard_container_header">
                                    <div class="dashboard_fl_1">
                                        <h4>Courses Name</h4>
                                    </div>
                                    <div class="dashboard_fl_2">
                                        <ul class="mb0">
                                            <li class="list-inline-item">
                                            </li>
                                            <li class="list-inline-item">
                                                <form class="search-courses-title form-inline my-2 my-lg-0">
                                                    <input class="form-control" type="search" placeholder="Search Courses" name="title" aria-label="Search">
                                                    <button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="dashboard_container_body p-4">
                                    <div class="row">


                                        <?php
                                        $video_urls = $this->frontend_model->get_records('tbl_video_content', "video_id='$video->id' and status=0 ");
                                        ?>

                                        <?php foreach ($video_urls as $url): ?>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="edu-watching">
                                                    <div class="education_block_grid style_2 p-3">
                                                        <div class="edu_video_header">
                                                            <h3><a href="<?= base_url() ?>my-courses-video-page/<?= $video->id ?>/<?= $url->id ?>" class="theme-cl"><?= $url->title ?></a></h3>
                                                            <h4><a href="<?= base_url() ?>my-courses-video-page/<?= $video->id ?>/<?= $url->id ?>"> <?= $video->curriculum ?> : <?= $video->title ?> (<?= $video_count ?>) </a></h4>
                                                        </div>
                                                        <div class="edu_video_bottom">
                                                            <div class="edu_video_bottom_left">
                                                                <span>Lesson <?= $video_count++ ?> of <?= sizeof($video_urls) ?></span>   
                                                            </div>                                                                 </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style="border-bottom: 1px solid #eee;">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>



    </div>
</div>


</section>



<!-- Video Modal -->
<div class="modal fade" id="popup-video" tabindex="-1" role="dialog" aria-labelledby="popup-video" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <iframe class="embed-responsive-item" width="100%" height="480" src="https://www.youtube.com/embed/qN3OueBm9F4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
</div>
<!-- End Video Modal -->            




<?php include("footer.php") ?>
<?php include("header.php") ?>


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
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- /Row -->

                    <!-- Row -->
                    <div class="row">
                        <?php
                        $id = $_SESSION['loginid'];
                        $course = $this->frontend_model->get_records('tbl_orders', "status = '0' and user_id = '$id'");
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="dashboard_stats_wrap widget-1">
                                <div class="dashboard_stats_wrap_content"><h4><?= count($course); ?></h4> <span>No.of Courses Bought</span></div>
                                <div class="dashboard_stats_wrap-icon"><i class="ti-location-pin"></i></div>
                            </div>	
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="dashboard_stats_wrap widget-2">
                                <div class="dashboard_stats_wrap_content"><h4>102</h4> <span>No.of Courses Completed</span></div>
                                <div class="dashboard_stats_wrap-icon"><i class="ti-pie-chart"></i></div>
                            </div>	
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="dashboard_stats_wrap widget-4">
                                <div class="dashboard_stats_wrap_content"><h4>70</h4> <span>No.of Courses Remaining</span></div>
                                <div class="dashboard_stats_wrap-icon"><i class="ti-user"></i></div>
                            </div>	
                        </div>

                    </div>
                    <!-- /Row -->

                    <!-- Row -->
                    <div class="row">

                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="dashboard_container">
                                        <div class="dashboard_container_header">
                                            <div class="dashboard_fl_1">
                                                <h4>Recent Order</h4>
                                            </div>
                                        </div>
                                        <div class="dashboard_container_body p-4">
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped table-bordered dt-responsive" style="width:100%">
                                                    <thead>

                                                        <tr>
                                                            <th>Order Id</th>
                                                            <th>Date</th>    
                                                            <th>Total</th>                                                              
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $ordersvars = $this->frontend_model->get_records('tbl_orders', "is_paid=1 and user_id=" . $_SESSION['loginid']);

                                                        foreach ($ordersvars as $ordersvar) {

                                                            $orderitemvar = $this->frontend_model->get_records('tbl_order_item', "status=0 and order_id= '$ordersvar->order_id'and user_id=" . $_SESSION['loginid'])[0];

                                                            $record = $this->frontend_model->get_records('tbl_courses', "status=0 and id= $orderitemvar->product_id")[0];
                                                            ?>

                                                            <tr>
                                                                <td><?= $orderitemvar->order_id; ?></td>
                                                                <?php
                                                                $myvalue = $ordersvar->date_time;
                                                                $datetime = new DateTime($myvalue);
                                                                $date = $datetime->format('Y-m-d');
                                                                ?>

                                                                <td><?= $date; ?></td>
                                                                <td><?= $orderitemvar->price; ?></td>
                                                                <td>                                                                
                                                                    <a href="<?php base_url() ?> invoice/<?= $orderitemvar->order_id; ?>"><button class="btn btn-success p-1" type="button"> <i class="fa fa-eye"></i> </button></a>
                                                                    <button class="btn btn-info p-1" type="button"> <i class="fa fa-print"></i> </button>
                                                                    <button class="btn btn-primary p-1" type="button"> <i class="fa fa-download"></i> </button>
                                                                    <button class="btn btn-danger p-1" type="button"> <i class="fa fa-question-circle"></i> </button>
                                                                </td>
                                                            </tr>
                                                        <?php }
                                                        ?>


                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $nots = $this->frontend_model->get_records('tbl_notification', "status='0' order by date_time asc") ?>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Notifications</h6>
                                </div>
                                <div class="ground-list ground-hover-list">
                                    <?php foreach ($nots as $not): ?>
                                        <div class="ground ground-list-single">
                                            <a href="#">
                                                <div class="btn-circle-40 btn-success"><i class="ti-calendar"></i></div>
                                            </a>

                                            <div class="ground-content">
                                                <h6><a href="#"><?= $not->title; ?></a></h6>
                                                <small class="text-fade"><?= $not->description; ?></small>
                                                <span class="small"><?= $not->time; ?></span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>		
                        </div>

                    </div>
                    <!-- /Row -->

                    <!-- Row -->


                </div>

            </div>



        </div>
    </div>

</section>






<?php include("footer.php") ?>
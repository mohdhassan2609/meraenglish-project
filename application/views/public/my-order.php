<?php include("header.php") ?>


<!-- ============================ Agency List Start ================================== -->

<section class="bg-light p-0">

    <div class="wrapper">
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
                                    <li class="breadcrumb-item active" aria-current="page">My Orders</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- /Row -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="dashboard_container">
                                <div class="dashboard_container_header">
                                    <div class="dashboard_fl_1">
                                        <h4>Order Details</h4>
                                    </div>
                                </div>
                                <div class="dashboard_container_body p-4">
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
        </div>
    </div>
</section>



<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
<?php include("footer.php") ?>

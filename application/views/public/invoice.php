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
                                    <li class="breadcrumb-item active" aria-current="page">Support</li>
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
                                        <h4><a href="my-order.php"><button class="btn btn-info p-1" type="button"> <i class="fa fa-arrow-left"></i> Back to My Order </button></a></h4>
                                    </div>
                                </div>
                                <div class="dashboard_container_body">
                                    <div class="prc_wrap-body">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body p-50">
                                                    <div class="invoice" id="invoice">
                                                        <div class="d-md-flex justify-content-between align-items-center">
                                                            <h2 class="font-weight-800 d-flex align-items-center">
                                                                <img class="m-r-20" src="<?php echo base_url() ?>assets/front/img/mera-logo.jpg" width="200px">
                                                            </h2>
                                                            <h3 class="text-xs-left m-b-0">Invoice <?= $order->order_id ?></h3>
                                                        </div>
                                                        <hr class="m-t-b-50">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p>
                                                                    <b><?= $pageTitle ?></b>
                                                                </p>
                                                            </div>
                                                            <?php foreach ($order_addresses as $order_address): ?>
                                                                <?php if ($order_address->option_name == "billing"): ?>
                                                                    <div class="col-md-4 invoice-col">
                                                                        Billing Address
                                                                        <address>
                                                                            <strong>
                                                                                <?= ucfirst($order_address->first_name) ?> 
                                                                                <?= ucfirst($order_address->last_name) ?>
                                                                            </strong><br>
                                                                            <?php if ($order_address->company_name != ""): ?>
                                                                                Company Name: <?= $order_address->company_name ?><br>
                                                                            <?php endif; ?>
                                                                            Address: <?= $order_address->address1 ?><br>
                                                                            <?php if ($order_address->address2 != ""): ?>
                                                                                Landmark: <?= $order_address->address2 ?><br>
                                                                            <?php endif; ?>
                                                                            City: <?= $order_address->city ?><br>
                                                                            State: <?= $order_address->state ?><br>
                                                                            Pincode: <?= $order_address->pincode ?><br>
                                                                            Mobile Number: <?= $order_address->phone_number ?><br>
                                                                            <?php if ($order_address->email != ""): ?>
                                                                                Email: <?= $order_address->email ?><br>
                                                                            <?php endif; ?>
                                                                        </address>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if ($order_address->option_name == "shipping"): ?>
                                                                    <div class="col-md-4 invoice-col">
                                                                        Shipping Address
                                                                        <address>
                                                                            <strong>
                                                                                <?= ucfirst($order_address->first_name) ?> 
                                                                                <?= ucfirst($order_address->last_name) ?>
                                                                            </strong><br>
                                                                            <?php if ($order_address->company_name != ""): ?>
                                                                                Company Name: <?= $order_address->company_name ?><br>
                                                                            <?php endif; ?>
                                                                            Address: <?= $order_address->address1 ?><br>
                                                                            <?php if ($order_address->address2 != ""): ?>
                                                                                Landmark: <?= $order_address->address2 ?><br>
                                                                            <?php endif; ?>
                                                                            City: <?= $order_address->city ?><br>
                                                                            State: <?= $order_address->state ?><br>
                                                                            Pincode: <?= $order_address->pincode ?><br>
                                                                            Mobile Number: <?= $order_address->phone_number ?><br>
                                                                            <?php if ($order_address->email != ""): ?>
                                                                                Email: <?= $order_address->email ?><br>
                                                                            <?php endif; ?>
                                                                        </address>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                            <div class="col-sm-4 invoice-col">
                                                                <b>Order ID: <?= $order->order_id ?></b><br>
                                                                <br>
                                                                <b>Payment Method:</b> <?php echo ucfirst($order->payment_method) ?><br>
                                                                <b>Payment Status:</b> <?php echo ucfirst($order->payment_method) ?><br>
                                                                <b>Order Status:</b> <?php echo ucfirst($order->payment_method) ?><br>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive" tabindex="1">
                                                            <table class="table mb-4 mt-4">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Course Name</th>
                                                                        <th class="text-right">Quantity</th>
                                                                        <th class="text-right">Sub cost</th>
                                                                        <!--<th class="text-right">Total</th>-->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i = 1; ?>
                                                                    <?php foreach ($order_items as $order_item): ?>
                                                                        <tr class="text-right ">
                                                                            <td class="text-left">1</td>
                                                                            <td class="text-left">
                                                                                <?= $this->frontend_model->get_record('tbl_courses', "id=" . $order_item->product_id, 'course_title') ?>
                                                                                <br>
                                                                            </td>
                                                                            <td><?= $order_item->quantity ?></td>
                                                                            <td>₹<?= number_format($order_item->price, 2) ?></td>
                                                                            <!--<td>₹40</td>-->
                                                                        </tr>
                                                                        <?php $i++; ?>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="text-right">
                                                            <p>Sub - Total amount: ₹<?= number_format($order->sub_total, 2) ?></p>
                                                            <p>vat (<?= $this->frontend_model->get_record('tbl_product', "status = '0' and id=" . $order_item->product_id, 'product_gst') ?>%) : ₹<?= number_format($order->gst, 2) ?></p>
                                                            <p>Shipping: ₹<?= number_format($order->shipping, 2) ?></p>
                                                            <h4 class="font-weight-800">Total : ₹<?= number_format($order->total, 2) ?></h4>
                                                        </div>
<!--                                                        <p class="text-center small text-muted  m-t-50">
                                                            <span class="row">
                                                                <span class="col-md-6 offset-3">
                                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, at.
                                                                </span>
                                                            </span>
                                                        </p>-->
                                                    </div>
                                                    <div class="text-right d-print-none">
                                                        <hr class="mb-5 mt-5">
                                                        <a href="javascript:void(0)" class="btn btn-success m-l-5" onclick="printDiv()">
                                                            <i class="fa fa-print" aria-hidden="true"></i> Print
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

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
<!-- ============================ Agency List End ================================== -->


<script>
    function printDiv() {
        var printContents = document.getElementById('invoice').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>



<?php include("footer.php") ?>
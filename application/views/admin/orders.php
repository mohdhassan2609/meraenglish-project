<div class="content-page">
    <div class="content">


        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Order</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">


                        <table data-toggle="table" data-search="true" data-show-refresh="true" data-sort-name="id"
                               data-page-list="[5, 10, 20]" data-page-size="5" data-pagination="true"
                               data-show-pagination-switch="true" class="table-borderless">
                            <thead class="thead-light">
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Order ID</th>
                                    <th>Course</th>
                                    <th>Total</th>
                                    <th>Order Status</th>
                                    <th>Est. / Delivered Date</th>
                                    <th class="text-center">Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($records)) {
                                    $inc = 1;
                                    foreach ($records as $record) {
                                        $order_process = $this->common_model->get_records('tbl_order_process', "status = '0' and order_id = '" . $record->order_id . "'")[0];
                                        ?>
                                        <tr>
                                            <td><?php echo $inc; ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="<?= base_url() ?>admin/order-details/<?= $record->order_id ?>">
        <?php echo $record->order_id ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?= base_url() ?><?= $record->slug ?>" target="_blank">
        <?php echo $record->course_title ?>
                                                </a>
                                            </td>
                                            <td>₹<?php echo number_format($this->common_model->get_record('tbl_orders', "status = '0' and order_id='" . $record->order_id . "'", "total"), 2) ?></td>
                                            <td><?= ucfirst($order_process->process) ?></td>
                                            <td><?= $order_process->est_delivery_date ?></td>
                                            <td class="text-center">
        <?php if ($this->common_model->get_record('tbl_orders', "status = '0' and order_id='" . $record->order_id . "'", "is_paid") == 1): ?>
                                                    <span class="btn btn-sm btn-success">Paid</span>
                                                <?php else: ?>
                                                    <span class="btn btn-sm btn-warning">Unpaid</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
        <?php
        $inc++;
    }
}
?>
                            </tbody>
                        </table>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

        </div>

    </div> <!-- container -->

</div> <!-- content -->

</div>


<div class="rightbar-overlay"></div>
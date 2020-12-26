<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard">Dashboard</a></li>

                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-4">
                    <a href="<?= base_url() ?>admin/course_list">
                        <div class="card-box bg-pattern">
                            <div class="row">
                                <div class="col-6">




                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAACu0lEQVRoge2Zu24TQRSGP9vYSIEoPS2dkxq6YF4A5QIpQwOKEgEJFKmpUMQDUNAggQMPQEeDlIgHICAwdhCi49KFCJGCmGLOepbN7npm9uKNsr80knfm/HPOn5lzZjYLJUrkghawC/QtWw+YztHfLnApbmKXSb3WdRCSmT/PqGIRTMXHs0Vq/qoxDmyCSYrE/qKEHDuUQoqGEyNkm+jyt51BPM7+TiVwGlY90qhgNv4GCNbvfkR/IicGcPU34CVZkTBUMRdVAQ7TdJwm8j5IBzgxVevYoBRSNGQlJO+DdCQrkuWh+Z+TJC9II+OVOVI0lEKKhlJI0XBchdwEfsQZjOI8eOl7bgALwHOgA+xL6wCbMtYQ24msAnLhPUG/3M0Bn4m+2vj/7zubVUCuvApqez/0zfEWuAM0gTPSJoFVYMdnt0FMauQtBLSIP8AS8XlbBZbF1hNjFJDpLdZVyBxaROxnggBaaDEzYQY2QrZieCZooHNiyZAzASzK7xXh9oB60DDPrbWAzgmTY6AOvBLOOlAD3snz1TQCcuW9EM5tQ/tHYv8TOC99a9LXHhZQljnySThNA9t1sf0NXPT1T0p/J0hIK0fexPBOi82ePI/7ePdDhM0Df6XNB8bGZY69YUJMYfMHiBJyTZ73gevSdwG1Cl5eBJG5EBMEt9YY6qT35moD3+T344g5pjDcWqZw4W0KZzXQv4haFW/O1+j7VRD3xOZpGgG58rzyu8PR8tsE3kuLuhzWZDy2/Lp+LrbhNdDf2ZdDxseAczH8W8LtEnIg9nxBZdluiL9Z9BWlNUy5D5eBA9RniSthBtOi0Dawr8AXC/vv6C2z4ROzgtoyUaihVuJAOA8sxGeOKlpMH3XtWEMddmelTQF30TlxiBJRyDfcGcy2dpeI7VQk1FEVqA18BH5J+wA8k7EjiQ3wD8eUnDgceMFpAAAAAElFTkSuQmCC"/>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <?php
                                        $query = $this->db->query("SELECT * FROM tbl_courses where status= '0' ");
                                        ?>


                                        <h3 class="text-dark my-1"><span
                                                data-plugin="counterup"><?php echo $query->num_rows(); ?></span></h3>
                                        <p class="text-muted mb-0 text-truncate">Total No Of Coures</p>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-box-->
                    </a>
                </div> <!-- end col -->

                <div class="col-md-4">
                    <a href="<?= base_url() ?>admin/orders">
                        <div class="card-box bg-pattern">
                            <div class="row">
                                <div class="col-6">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAACu0lEQVRoge2Zu24TQRSGP9vYSIEoPS2dkxq6YF4A5QIpQwOKEgEJFKmpUMQDUNAggQMPQEeDlIgHICAwdhCi49KFCJGCmGLOepbN7npm9uKNsr80knfm/HPOn5lzZjYLJUrkghawC/QtWw+YztHfLnApbmKXSb3WdRCSmT/PqGIRTMXHs0Vq/qoxDmyCSYrE/qKEHDuUQoqGEyNkm+jyt51BPM7+TiVwGlY90qhgNv4GCNbvfkR/IicGcPU34CVZkTBUMRdVAQ7TdJwm8j5IBzgxVevYoBRSNGQlJO+DdCQrkuWh+Z+TJC9II+OVOVI0lEKKhlJI0XBchdwEfsQZjOI8eOl7bgALwHOgA+xL6wCbMtYQ24msAnLhPUG/3M0Bn4m+2vj/7zubVUCuvApqez/0zfEWuAM0gTPSJoFVYMdnt0FMauQtBLSIP8AS8XlbBZbF1hNjFJDpLdZVyBxaROxnggBaaDEzYQY2QrZieCZooHNiyZAzASzK7xXh9oB60DDPrbWAzgmTY6AOvBLOOlAD3snz1TQCcuW9EM5tQ/tHYv8TOC99a9LXHhZQljnySThNA9t1sf0NXPT1T0p/J0hIK0fexPBOi82ePI/7ePdDhM0Df6XNB8bGZY69YUJMYfMHiBJyTZ73gevSdwG1Cl5eBJG5EBMEt9YY6qT35moD3+T344g5pjDcWqZw4W0KZzXQv4haFW/O1+j7VRD3xOZpGgG58rzyu8PR8tsE3kuLuhzWZDy2/Lp+LrbhNdDf2ZdDxseAczH8W8LtEnIg9nxBZdluiL9Z9BWlNUy5D5eBA9RniSthBtOi0Dawr8AXC/vv6C2z4ROzgtoyUaihVuJAOA8sxGeOKlpMH3XtWEMddmelTQF30TlxiBJRyDfcGcy2dpeI7VQk1FEVqA18BH5J+wA8k7EjiQ3wD8eUnDgceMFpAAAAAElFTkSuQmCC"/>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <?php
                                        $query = $this->db->query("SELECT * FROM tbl_orders where status= '0' ");
                                        ?>


                                        <h3 class="text-dark my-1"><span
                                                data-plugin="counterup"><?php echo $query->num_rows(); ?></span></h3>
                                        <p class="text-muted mb-0 text-truncate">Total No Of Orders</p>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-box-->
                    </a>
                </div> <!-- end col -->

                <div class="col-md-4">
                    <a href="<?= base_url() ?>admin/orders">
                        <div class="card-box bg-pattern">
                            <div class="row">
                                <div class="col-6">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAACu0lEQVRoge2Zu24TQRSGP9vYSIEoPS2dkxq6YF4A5QIpQwOKEgEJFKmpUMQDUNAggQMPQEeDlIgHICAwdhCi49KFCJGCmGLOepbN7npm9uKNsr80knfm/HPOn5lzZjYLJUrkghawC/QtWw+YztHfLnApbmKXSb3WdRCSmT/PqGIRTMXHs0Vq/qoxDmyCSYrE/qKEHDuUQoqGEyNkm+jyt51BPM7+TiVwGlY90qhgNv4GCNbvfkR/IicGcPU34CVZkTBUMRdVAQ7TdJwm8j5IBzgxVevYoBRSNGQlJO+DdCQrkuWh+Z+TJC9II+OVOVI0lEKKhlJI0XBchdwEfsQZjOI8eOl7bgALwHOgA+xL6wCbMtYQ24msAnLhPUG/3M0Bn4m+2vj/7zubVUCuvApqez/0zfEWuAM0gTPSJoFVYMdnt0FMauQtBLSIP8AS8XlbBZbF1hNjFJDpLdZVyBxaROxnggBaaDEzYQY2QrZieCZooHNiyZAzASzK7xXh9oB60DDPrbWAzgmTY6AOvBLOOlAD3snz1TQCcuW9EM5tQ/tHYv8TOC99a9LXHhZQljnySThNA9t1sf0NXPT1T0p/J0hIK0fexPBOi82ePI/7ePdDhM0Df6XNB8bGZY69YUJMYfMHiBJyTZ73gevSdwG1Cl5eBJG5EBMEt9YY6qT35moD3+T344g5pjDcWqZw4W0KZzXQv4haFW/O1+j7VRD3xOZpGgG58rzyu8PR8tsE3kuLuhzWZDy2/Lp+LrbhNdDf2ZdDxseAczH8W8LtEnIg9nxBZdluiL9Z9BWlNUy5D5eBA9RniSthBtOi0Dawr8AXC/vv6C2z4ROzgtoyUaihVuJAOA8sxGeOKlpMH3XtWEMddmelTQF30TlxiBJRyDfcGcy2dpeI7VQk1FEVqA18BH5J+wA8k7EjiQ3wD8eUnDgceMFpAAAAAElFTkSuQmCC"/>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <?php
                                        $query = $this->db->query("SELECT * FROM tbl_orders where status= '0' and is_paid='1' ");
                                        ?>


                                        <h3 class="text-dark my-1"><span
                                                data-plugin="counterup"><?php echo $query->num_rows(); ?></span></h3>
                                        <p class="text-muted mb-0 text-truncate">Total No Of Paid</p>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-box-->
                    </a>
                </div> <!-- end col -->



            </div>
        </div> <!-- end card-box-->
        </a>



    </div> <!-- end col -->

</div>
<!-- end row-->








</div>
</div>
</div>
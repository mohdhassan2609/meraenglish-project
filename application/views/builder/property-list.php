
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Proptoday</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Builder</a></li>
                                            <li class="breadcrumb-item active">Property</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Property</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                      

                                        <table data-toggle="table" data-search="true" data-show-refresh="true" data-sort-name="id"
                            data-page-list="[5, 10, 20]" data-page-size="5" data-pagination="true"
                            data-show-pagination-switch="true" class="table-borderless">
                            <thead class="thead-light">
                                <tr>
                                    <th data-field="id" data-sortable="true" data-formatter="">S.No</th>
                                    <th data-field="builder" data-sortable="true">Property Id</th>

                                    <th data-field="img1" data-sortable="true">Property Name</th>
                                    <th data-field="img2" data-sortable="true">Property Image</th>


                                    <th data-field="date" data-sortable="true">Date</th>
                                    <th data-field="dae1" data-sortable="true">Property Status</th>
                                    <th data-field="dae" data-sortable="true">Property Type</th>

                                    <th data-field="amount" data-align="center" data-sortable="true"
                                        data-sorter="priceSorter">Actions</th>
                                  

                                </tr>
                            </thead>
                
                
                                    
                                                <tbody>
                                                    <?php $i=1;?>
                                                      <?php foreach($properties as $property):?>
                                                      
                                                    <tr>
                                                      

                                                        <td><?=$i?></td>
                                                         <?php $info=$this->common_model->get_records('tbl_detailed_property_info', "status='0' and id='$property->detailed_property_info_id'")[0];?>
                                                        <td>
                                                            <?=$info->property_id?>
                                                        </td>
                                                       
                                                        <td><a href="javascript: void(0);" class="text-body font-weight-bold"><?=$property->property_name?></a> </td>
                                                        <?php $images=$this->common_model->get_records('tbl_property_images', "status='0' and id='$property->property_image_id'")[0];
                                                        ?>

                                                        <td>
                                                            <a href="ecommerce-prduct-detail.html"><img src="<?= base_url()?><?php if($images->profile_image){ echo 'uploads/common/'.$images->profile_image;}else{echo 'assets/front/images/'.'profile.jpg';}?>" alt="product-img" height="32"></a>
                                                            
                                                        </td>
                                                        <td>
                                                             <?=$property->date_time?><small class="text-muted"></small>
                                                        </td>

                                                        <?php $status=$this->common_model->get_records('tbl_master', "status='0' and id='$property->property_status'")[0];
                                                       ?>
                                                        <td>

                                                            <?=$status->property_status?>
                                                        </td>
                                                        <?php $type=$this->common_model->get_records('tbl_property_type', "status='0' and id='$property->property_type'")[0];?>
                                                        <td>
                                                            <?=$type->property_type_name?>
                                                        </td>
                                                      <!--  <td>
                                                            Mastercard
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-info">Shipped</span></h5>
                                                        </td>-->
                                                        <td>
                                                            <a href="<?=base_url()?>builder/property/<?=$property->id?>" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon deletelist" style="<?php if($record->status == 1){ echo 'display: none;'; } ?>"  data-table="tbl_property_details" data-id="<?php echo $property->id; ?>"> <i class="mdi mdi-delete"></i></a>

                                                                                           </td>
                                                    </tr>
                                                    <?php $i++;?>
                                                    <?php endforeach;?>
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>

                                      
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

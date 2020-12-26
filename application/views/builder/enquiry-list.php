
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Builder</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Enquiry</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>
 <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <div class="row mb-2">
                                            <div class="col-lg-8">
                                                <form class="form-inline">
                                                    <div class="form-group mb-2">
                                                        <label for="inputPassword2" class="sr-only">Search</label>
                                                        <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                                    </div>
                                                </form>                            
                                            </div>
                                        </div> -->

                                        
                        <table data-toggle="table" data-search="true" data-show-refresh="true" data-sort-name="id"
                            data-page-list="[5, 10, 20]" data-page-size="5" data-pagination="true"
                            data-show-pagination-switch="true" class="table-borderless">
                            <thead class="thead-light">
                                <tr>
                                    <th data-field="id" data-sortable="true" data-formatter="">ID</th>
                                    <th data-field="builder" data-sortable="true">Property Id</th>

                                    <th data-field="img1" data-sortable="true">Name</th>
                                    <th data-field="img2" data-sortable="true">Phone No</th>


                                    <th data-field="date" data-sortable="true">Email</th>
                                    <th data-field="dae" data-sortable="true">Message</th>

                                    <th data-field="amount" data-align="center" data-sortable="true"
                                        data-sorter="priceSorter">Actions</th>
                                    <th data-field="status" data-align="center" data-sortable="true"
                                        data-formatter="statusFormatter">Status</th>

                                </tr>
                            </thead>
                
                                    
                                                <tbody>
                                                    <?php $inc=1;
                                                    foreach($records as $record)
                            {
                        ?>
                                <tr>


                                    <td><?php echo $inc; ?></td>

                                      <?php $prop=$this->common_model->get_records('tbl_property_details', "status='0' and id='$record->item_id'")[0];?>
                                    <?php $prop_id=$this->common_model->get_records('tbl_detailed_property_info', "status='0' and id='$prop->detailed_property_info_id'")[0];?>
                                    <td><a href="<?= base_url()?>builder/property-list/<?=$prop->id?>"><?php echo $prop_id->property_id; ?></a></td>

                                    <td><?php echo $record->name ?></td>
                                    <td><?php echo $record->phone ?></td>
                                    <td><?php echo $record->email ?></td>
                                    <td><?php echo $record->message ?></td>


                                 
                                   
                                    <?php
                                    $myvalue = $record->date_time;

                                 $datetime = new DateTime($myvalue);
 
                                     $date = $datetime->format('Y-m-d');
                                   $time = $datetime->format('H:i:s');
                                  ?>

                                    <td><?php echo $date;echo " ".$time?></td>



                            <!--        <td class="text-center">
                                        <?php if($record->id != 0): ?>
                                        <?php if(0 == 1): ?>

                                        <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#addSlider"
                                            onclick="$('#addSlider input[name=sub_category_id]').val('<?=$record->id?>')"><i
                                                class="fa fa-plus"></i></a>
                                        <?php endif; ?>

                                        <button type="button" class="btn btn-success waves-effect waves-light"
                                            data-toggle="modal" data-target="#con-close-modal" onclick="
                                
                                    
                                $('.update_data input[name=name]').val('<?=$record->name?>');
                                $('.update_data input[name=phone]').val('<?=$record->phone?>');
                                $('.update_data input[name=email]').val('<?=$record->email?>');
                                $('.update_data input[name=message]').val('<?=$record->message?>');

                            

                            
                        
                                
                                $('.update_data input[name=row_id]').val('<?=$record->id?>');
                                $('.update_data input[name=status]').val('<?=$record->status?>');
                            
                            
                                "><i class="fe-edit"></i></button>




                                        <a class="btn btn-danger deletecats <?= $record->id;?>" onclick="myFunction(this,<?= $record->id;?>,'tbl_enquiry')"
                                            style="<?php if($record->status == 1){ echo 'display: none;'; } ?>" href="#"
                                            data-table="tbl_enquiry" data-id="<?php echo $record->id; ?>"><i
                                                class="fa fa-times"></i></a>

                                        <a class="btn btn-sm btn-success activebtn"
                                            style="<?php if($record->status == 0){ echo 'display: none;'; } ?>" href="#"
                                            data-table="tbl_enquiry" data-id="<?php echo $record->id; ?>"><i
                                                class="fa fa-check"></i></a>
                                        <?php endif; ?>
                                    </td>-->



                                    <td class="text-center">
                                        <?php if($record->id != 0): ?>
                                        <?php if($record->status == 0){ echo "<span class='badge label-table badge-success'>Active</span>"; }else{  echo "<span class='badge label-table badge-danger'>Inactive</span>"; } ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php
                            $inc++;
                            }
                        
                        ?>

                                                    
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

<div class="content-page">
    <div class="content">


        <div class="container-fluid">






            <!-- <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                            <form role="form" action="<?php echo base_url() ?>admin/add_category_post"
                                this_id="form-001" class="insert_data" method="post" role="form">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="builder_area">builder Area <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" name="builder_area">
                                        <span class="text-danger error-span">This input is required.</span>



                                        <input type="hidden" value="tbl_builder" name="table_name">
                                        <input type="hidden" value="" name="row_id">


                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="builder_name">builder Name</label>
                                        <input type="text" class="form-control required" name="builder_name">
                                        <span class="text-danger error-span">This input is required.</span>


                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="desktop_url">desktop_url</label>
                                        <input type="file" class="form-control" name="desktop_url">
                                    </div>

                                    <div class="form-group col-md-6">

                                        <label for="mobile_url">mobile_url</label>
                                        <input type="file" class="form-control" name="mobile_url">

                                    </div>
                                </div>




                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div> -->





            



            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <form reload-action="true" this_id="form-002" class="update_data" method="post" role="form">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>


                            <div class="modal-body p-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" name="name">
                                            <span class="text-danger error-span">This input is required.</span>


                                            <input type="hidden" value="tbl_enquiry" name="table_name">
                                            <input type="hidden" value="" name="row_id">



                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">phone No</label>
                                            <input type="text" class="form-control" name="phone">
                                            <span class="text-danger error-span">This input is required.</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Email">Email</label>
                                            <input type="text" class="form-control" name="email">
                                            <span class="text-danger error-span">This input is required.</span>
                                        </div>
                                    </div>

                                  


                                   
                                   

                                   
                                </div>


                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect"
                                    data-dismiss="modal">Close</button>


                                <button type="submit" class="btn btn-info waves-effect waves-light">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal -->





        </div> <!-- container -->

    </div> <!-- content -->

</div>


<!-- Vendor js -->
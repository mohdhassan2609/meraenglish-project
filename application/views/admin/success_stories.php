<div class="content-page">
    <div class="content">


        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Reviews</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Success Stories</a></li>

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
                                    <th data-field="id" data-sortable="true" data-formatter="">ID</th>
                                    <th data-field="name" data-sortable="true">Name</th>
                                    <th data-field="image" data-sortable="true">Image</th>
                                     <th data-field="designation" data-sortable="true">Designation</th>
                                    <th data-field="description" data-sortable="true">Description</th>
                                    <th data-field="created_on" data-sortable="true" data-formatter="dateFormatter">
                                        Created On
                                    </th>
                                    <th data-field="amount" data-align="center" data-sortable="true"
                                        data-sorter="priceSorter">Actions</th>
                                    <th data-field="status" data-align="center" data-sortable="true"
                                        data-formatter="statusFormatter">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
						if(!empty($records))
						{
							$inc = 1;
							foreach($records as $record)
							{
						?>
                                <tr>
                                    <td><?php echo $inc; ?></td>
                                        <td><?php echo $record->name ?></td>
                                        <td><a target="_blank"
                                            href="<?=base_url()?>uploads/common/<?php echo $record->image ?>"><img
                                                width="50" height="50"
                                                src="<?=base_url()?>uploads/common/<?php echo $record->image ?>"></a>
                                    </td>
                                    <td><?php echo $record->designation ?>
                                    
                                    
                                    </td>
                                     <td><?php echo $record->description ?></td>
                                    <?php
                                    $myvalue = $record->date_time;

                                 $datetime = new DateTime($myvalue);
 
                                     $date = $datetime->format('Y-m-d');
                                   $time = $datetime->format('H:i:s');
                                  ?>
                                    
                                    <td><?php echo $date;echo " ".$time?></td>
                                  
                                  
                                    <td class="text-center">
                                        <?php if($record->id != 0): ?>
                                        <?php if(0 == 1): ?>

                                        <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#addSlider"
                                            onclick="$('#addSlider input[name=sub_category_id]').val('<?=$record->id?>')"><i
                                                class="fa fa-plus"></i></a>
                                        <?php endif; ?>

                                        <button type="button" class="btn btn-success waves-effect waves-light"
                                            data-toggle="modal" data-target="#con-close-modal" onclick="
								
									
								$('.update_data input[name=name]').val('<?=$record->name?>');
                                $('.update_data .img-a').attr('href', '<?=base_url()?>uploads/common/<?=$record->image?>');
							$('.update_data .img1').attr('src', '<?=base_url()?>uploads/common/<?=$record->image?>');
                                $('.update_data input[name=row_id]').val('<?=$record->id?>');
                                			$('.update_data input[name=designation]').val('<?=$record->designation?>');
					            $('.update_data input[name=description]').val('<?=$record->description?>');
					            
								"><i class="fe-edit"></i></button>
                                  
                                                
                                                 <a class="btn btn-danger deletecats <?= $record->id;?>" onclick="myFunction(this,<?= $record->id;?>,'tbl_testimonials_add')"
                                            style="<?php if($record->status == 1){ echo 'display: none;'; } ?>"
                                            data-table="tbl_testimonials_add" data-id="<?php echo $record->id; ?>"><i
                                                class="fa fa-times"></i></a>
                                                <a class="btn btn-sm btn-success activebtn"
                                            style="<?php if($record->status == 0){ echo 'display: none;'; } ?>" href="#"
                                            data-table="tbl_testimonials_add" data-id="<?php echo $record->id; ?>"><i
                                                class="fe-check"></i></a>
                                        <?php endif; ?>
                                    </td>



                                    <td class="text-center">
                                        <?php if($record->id != 0): ?>
                                        <?php if($record->status == 0){ echo "<span class='badge label-table badge-success'>Active</span>"; }else{  echo "<span class='badge label-table badge-danger'>Inactive</span>"; } ?>
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
                    </div> <!-- end card-box-->
                </div> <!-- end col-->
            </div>

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


                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" name="name">

                                            <span class="text-danger error-span">This input is required.</span>
                                            <input type="hidden" value="tbl_testimonials_add" name="table_name">
                                            <input type="hidden" value="" name="row_id">


                                        </div>
                                    </div>
                                    <div class="form-row">
                                        
                                            <div class="form-group col-md-6">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>

                                        <div class="form-group col-md-6">

                                            <label for="designation">Designation</label>
                                            <input type="text" class="form-control" name="designation">

                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="description">Description</label>
                                            <input type="text" class="form-control" name="description">

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


<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script>
    
function approval(id,status){  
      if(confirm("Confirmation Needed!") === true)
        {
            var row_id = id;
            var status=status;
            var tis = this;
            $.ajax({
                type: 'POST',
                url: baseURL + "admin/approve",
                data:  {row_id:row_id,post_status:status},
                dataType: "json",
                success: function(response){
                    if(response.result == 1)
                    {
                        toastr.success('Success!');
                        window.location.reload();
                    }
                    else if(response.result == 2){
                        toastr.success('something went wrong!');

                    }
                    
                }
            });
        }
    
    
}

</script>
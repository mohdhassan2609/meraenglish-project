<div class="content-page">
    <div class="content">


        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Property</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Builder Property</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <table data-toggle="table" data-search="true" data-show-refresh="true" data-sort-name="id"
                            data-page-list="[5, 10, 20]" data-page-size="5" data-pagination="true"
                            data-show-pagination-switch="true" class="table-borderless">
                            <thead class="thead-light">

                                <tr>


                                    <th data-field="id" data-sortable="true" data-formatter="">Sno</th>
                                    <th data-field="property" data-sortable="true" data-formatter="">Property Name</th>


                                    <th data-field="price" data-sortable="true" data-formatter="">Price</th>
                                    <th data-field="Area" data-sortable="true" data-formatter="">Area</th>

                                    <th data-field="created" data-sortable="true" data-formatter="">Created Day/Time
                                    </th>
                                    <th data-field="Actions" data-sortable="true" data-formatter="">Actions</th>

                                    <th data-field="post" data-sortable="true" data-formatter="">Post</th>
                                    <th data-field="status" data-sortable="true" data-formatter="">Status</th>




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


                                    <td><?php echo $record->property_name ?></td>
                                    <td><?php echo $record->price ?></td>
                                    <td><?php echo $record->area ?></td>

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
                                        <!-- <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#editSlider" onclick="get_records('tbl_category_images', 'sub_category_id=?=$record->id?>')"><i class="fa fa-book"></i></a>
									 -->
                                        <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#addSlider"
                                            onclick="$('#addSlider input[name=sub_category_id]').val('<?=$record->id?>')"><i
                                                class="fa fa-plus"></i></a>
                                        <?php endif; ?>
                                        <a class="btn btn-sm btn-warning"
                                            href="<?=base_url()?>admin/property/<?=$record->id?>"><i
                                                class="fe-edit"></i></a>

                                        <a class="btn btn-sm btn-danger deletecats <?= $record->id;?>" onclick="myFunction(this,<?= $record->id;?>,'tbl_built_up_area')"
                                            style="<?php if($record->status == 1){ echo 'display: none;'; } ?>" href="#"
                                            data-table="tbl_property_details" data-id="<?php echo $record->id; ?>"><i
                                                class="fa fa-times"></i></a>

                                        <a class="btn btn-sm btn-success activebtn"
                                            style="<?php if($record->status == 0){ echo 'display: none;'; } ?>" href="#"
                                            data-table="tbl_bhk" data-id="<?php echo $record->id; ?>"><i
                                                class="fa fa-check"></i></a>

                                        <?php endif; ?>
                                    </td>
                                      <?php if($record->post_status == 'W'){ $status=1; }else if($record->post_status == 'A'){$status=0;}else if($record->post_status == 'R'){$status=1;}?>
                                     
                                    <td class="text-center">
                                     
                                        <a class="btn btn-sm <?php if($record->post_status == 'W' || $record->post_status == 'R'){ echo 'btn-success';}else if($record->post_status == 'A'){echo 'btn-danger';} ?> approve"
                                             href="javascript:void(0);" onclick="approval(<?=$record->id?>,<?=$status?>)">
                                           <?php if($record->post_status == 'W' || $record->post_status == 'R'){ echo 'Approve'; }else{echo 'Reject';} ?></a>
                                       </td>
                                        <td class="text-center">
                                        <?php if($record->id != 0): ?>
                                        <?php if($record->status == 0){ echo "<span class='btn btn-sm btn-success'>Active</span>"; }else{  echo "<span class='btn btn-sm btn-danger'>Inactive</span>"; } ?>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form reload-action="true" this_id="form-002" class="update_data" method="post" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bhk">BHK Type <span class="text-danger">*</span></label>
                                <input type="number" class="form-control required" name="bhk_no">

                                <span class="text-danger error-span">This input is required.</span>
                                <input type="hidden" value="tbl_bhk" name="table_name">
                                <input type="hidden" value="" name="row_id">



                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="desktop_img_url">desktop_url</label>
                                <input type="text" class="form-control" name="desktop_img_url">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile_url">mobile_url</label>
                                <input type="text" class="form-control" name="mobile_img_url">
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default pull-left" data-dismiss="modal" value="Close">
                    <input type="submit" class="btn btn-primary" value="Save changes">
                </div>
            </form>
        </div>
    </div>
</div>


<!-- <div class="modal fade" id="modal-default">
	  <div class="modal-dialog">
		<div class="modal-content">
			<form reload-action="true" this_id="form-002" class="update_data" method="post" role="form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Edit</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">                                
							<div class="form-group">

							<label for="name">Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control required" name="name">
								
								<span class="text-danger error-span">This input is required.</span>
								<input type="hidden" value="tbl_sub_category" name="table_name">
								<input type="hidden" name="row_id">
							</div>
						</div>
						<div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="age">age <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" name="age">
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender">gender</label>
                                        <input type="text" class="form-control" name="gender" placeholder="Leave blank for auto generation">
                                    </div>
                                </div>
					
					
		
						
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default pull-left" data-dismiss="modal" value="Close">
					<input type="submit" class="btn btn-primary" value="Save changes">
				</div>
			</form>
		</div>
		/.modal-content -->
<!-- </div> -->

<!-- </div> -->

<div class="modal fade" id="addSlider">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="#" this_id="form-003" class="insert_data" method="post" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Add Slider</h4>
                </div>
                <div class="modal-body">
                    <div id="arr">
                        <div class="well col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Desktop</label>
                                    <input type="file" class="form-control required" name="image">
                                    <span class="text-danger error-span">This input is required.</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="file" class="form-control required" name="image_1">
                                    <span class="text-danger error-span">This input is required.</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Link *" class="form-control required"
                                            name="link">
                                        <span class="text-danger error-span">This input is required.</span>
                                        <input type="hidden" name="table_name" value="tbl_category_images">
                                        <input type="hidden" name="sub_category_id" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default pull-left" data-dismiss="modal" value="Close">
                    <input type="submit" class="btn btn-primary" value="Save changes">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editSlider">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Sliders</h4>
            </div>
            <div class="modal-body" id="arr1">
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default pull-right" data-dismiss="modal" value="Close">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function get_records(table_name, where) {
    $('#arr1').html("");
    var img;
    $.ajax({
        type: 'POST',
        url: baseURL + "admin/get_records",
        data: "table_name=" + table_name + "&where=" + where,
        dataType: "json",
        success: function(response) {
            console.log(response);
            if (response.result == 1) {
                $.each(response.records, function(key, val) {

                    if (val.image !== "default-image.jpg") {
                        img = val.image;
                    } else {
                        img = "";
                    }
                    $('#arr1').append('	<div class="well col-md-12">' +
                        '<div class="col-md-2">' +
                        '<a href="<?=base_url()?>uploads/category/' + val.image +
                        '" target="_blank"><img width="50" height="50" src="<?=base_url()?>uploads/category/' +
                        val.image + '"></a>' +
                        '</div>' +
                        '<div class="col-md-2">' +
                        '<a href="<?=base_url()?>uploads/category/' + val.image_1 +
                        '" target="_blank"><img width="50" height="50" src="<?=base_url()?>uploads/category/' +
                        val.image_1 + '"></a>' +
                        '</div>' +
                        '<div class="col-md-6">' +
                        '<input type="text" value="' + val.link + '" class="form-control">' +
                        '</div>' +
                        '<div class="col-md-2">' +
                        '<span class="btn btn-sm btn-danger pull-right" onclick=deleteBtn("tbl_category_images","id=' +
                        val.id + '",this,"uploads/category/' + img +
                        '")><i class="fa fa-trash"></i></span>' +
                        '</div>' +
                        '</div>');
                });
            } else {
                toastr.error('Something went wrong! Please try again later!');
            }
        }
    });
}

function deleteBtn(table_name, where, tis, delete_image) {
    if (confirm('Are you sure to delete this?') === true) {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/delete_data",
            data: "table_name=" + table_name + "&where=" + where + "&delete_image=" + delete_image,
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response.result == 1) {
                    toastr.success('Success!');
                    $(tis).parents('.well').remove();
                } else {
                    toastr.error('Something went wrong! Please try again later!');
                }
            }
        });
    }
}
function approval(id,status){  
    if(status==1)
    {
        var status='A';
    }
    else
    {
        var status='R';
    }
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



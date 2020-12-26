<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">



            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Registration</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">User Registration</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>



            <div class="row">
             
                <div class="col-md-8">
               

                    <div class="card-box">
                        <form role="form" action="<?php echo base_url() ?>admin/add_category_post" this_id="form-001"
                            class="insert_data" method="post" role="form">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user_type">User Type<span class="text-danger">*</span></label>
                                            <select class="selectpicker form-control" data-live-search="true"
                                                data-width="100%" name="user_type" required>
                                                <option value="Single">Single User</option>
                                                <option value="Individual">Individual</option>
                                                <option value="Multi">Multi User</option>
                                            </select>
                                            <span class="text-danger error-span">This input is required.</span>
                                            <input type="hidden" value="tbl_general_users" name="table_name">
                                            <input type="hidden" value="" name="row_id">



                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control required" name="first_name">
                                            <span class="text-danger error-span">This input is required.</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control required" name="last_name">
                                            <span class="text-danger error-span">This input is required.</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control required" name="email">
                                            <span class="text-danger error-span">This input is required.</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control required" name="password">
                                            <span class="text-danger error-span">This input is required.</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_number">Mobile</label>
                                            <input type="number" class="form-control required" name="phone_number">
                                            <span class="text-danger error-span">This input is required.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary pull-right" value="Submit" />
                            </div>
                        </form>
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


                                    <th data-field="number" data-sortable="true">Sno</th>
                                    <th data-field="userTye" data-sortable="true">User Type</th>


                                    <th data-field="first name" data-sortable="true">First Name</th>
                                    <th data-field="last name" data-sortable="true">Last Name</th>
                                    <th data-field="emailr" data-sortable="true">Email</th>
                                    <th data-field="mobile" data-sortable="true">Mobile</th>
                                    <th data-field="enquiries" data-sortable="true">Enquiries</th>
                                   <!-- <th data-field="reviews" data-sortable="true">Reviews</th>-->

                                    <th data-field="fav" data-sortable="true">Favourites</th>

                                    <th data-field="viewed" data-sortable="true">Recently Viewed</th>
                                    <th data-field="isverified" data-sortable="true">Is Verified</th>
                                    <th data-field="createdob" data-sortable="true">Created Day/Time</th>
                                    <th data-field="actions" data-sortable="true">Actions</th>
                                    <th data-field="status" data-sortable="true">Status</th>




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

       <?php $lists=$this->common_model->get_custom_query("select * from tbl_user_wishlist WHERE user_id='$record->id'  and status='0' ");


        $reviews=$this->common_model->get_records('tbl_user_reviews', "status = '0' and  user_id='$record->id'");

        $viewed=$this->common_model->get_records('tbl_recently_viewed', "status = '0' and  login_id='$record->id'");
        $enquiries=$this->common_model->get_custom_query("select * from tbl_enquiry WHERE login_id='$record->id'  and status='0' ");
        $free_evaluation=$this->common_model->get_custom_query("select * from tbl_evaluation WHERE user_id='$record->id'  and status='0'");

        $joint_ventures=$this->common_model->get_custom_query("select * from tbl_ventures WHERE user_id='$record->id'  and status='0'");

        $sell=$this->common_model->get_custom_query("select * from tbl_residential WHERE user_id='$record->id'  and status='0' ");


        $evaluation_count=sizeof($free_evaluation);
        $ventures_count=sizeof($joint_ventures);
        $sell_count=sizeof($sell);
        $fav_count=sizeof($lists);
        $review_count=sizeof($reviews);
        $enquiry_count=sizeof($enquiries);
        $viewed=sizeof($viewed);
?>
                                    <td><?php echo $inc; ?></td>


                                    <td><?php echo $record->user_type ?></td>
                                    <td><?php echo $record->first_name ?></td>
                                    <td><?php echo $record->last_name ?></td>
                                    <td><?php echo $record->email ?></td>
                                    <td><?php echo $record->phone_number ?></td>

                                    <td><a href="<?=base_url()?>admin/user-enquiry/<?=$record->id?>"><?php echo $enquiry_count ?></a></td>
                                    <!--<td><a href="<?=base_url()?>admin/property-list/<?=$record->id?>/2"><?php echo $review_count ?></a></td>-->

                                    <td><a href="<?=base_url()?>admin/property-list/<?=$record->id?>/1"><?php echo $fav_count ?></a></td>

                                    <td><a href="<?=base_url()?>admin/property-list/<?=$record->id?>/3"><?php echo $viewed ?></a></td>
                                    <td><?php echo $record->is_verified ?></td>
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
                                        <a class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#modal-default" onclick="
								
									
                                                                   
									$('.update_data input[name=row_id]').val('<?=$record->id?>');
									$('.update_data input[name=status]').val('<?=$record->status?>');
                                    $('.update_data input[name=first_name]').val('<?=$record->first_name?>');
                                    $('.update_data input[name=last_name]').val('<?=$record->last_name?>');
									$('.update_data input[name=user_type]').val('<?=$record->user_type?>');
                                    $('.update_data input[name=phone_number]').val('<?=$record->phone_number?>');
                                    $('.update_data input[name=email]').val('<?=$record->email?>');
                                
																
									"><i class="fe-edit"></i></a>

                                        <a class="btn btn-sm btn-danger deletecats <?= $record->id;?>" onclick="myFunction(this,<?= $record->id;?>,'tbl_general_users')"
                                            style="<?php if($record->status == 1){ echo 'display: none;'; } ?>" href="#"
                                            data-table="tbl_general_users" data-id="<?php echo $record->id; ?>"><i
                                                class="fa fa-times"></i></a>

                                        <a class="btn btn-sm btn-success activebtn"
                                            style="<?php if($record->status == 0){ echo 'display: none;'; } ?>" href="#"
                                            data-table="tbl_general_users" data-id="<?php echo $record->id; ?>"><i
                                                class="fa fa-check"></i></a>
                                        <?php endif; ?>
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

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
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
                                <label for="user_type">User Type<span class="text-danger">*</span></label>
                                <select class="selectpicker form-control" data-live-search="true" data-width="100%"
                                    name="user_type" required>
                                    <option value="Agent">Agent</option>

                                    <option value="Individual">Individual</option>
                                    <option value="Builder">Builder</option>
                                </select>

                                <span class="text-danger error-span">This input is required.</span>
                                <input type="hidden" value="tbl_general_users" name="table_name">
                                <input type="hidden" value="" name="row_id">



                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" class="form-control" name="first_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" class="form-control" name="last_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number">Mobile</label>
                                <input type="text" class="form-control" name="phone_number">
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
		<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div> -->

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
</script>


<!-- Vendor js -->

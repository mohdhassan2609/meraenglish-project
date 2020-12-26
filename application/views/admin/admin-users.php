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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin User Registration</a></li>

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
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control required" name="name">
                                            <span class="text-danger error-span">This input is required.</span>
                                            <input type="hidden" value="tbl_users" name="table_name">
                                            <input type="hidden" value="" name="row_id">
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
                                            <input type="number" class="form-control required" name="mobile">
                                            <span class="text-danger error-span">This input is required.</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user_type">User Type<span class="text-danger">*</span></label>
                                            <select class="selectpicker form-control" data-live-search="true"
                                                    data-width="100%" name="roleId" required>
                                                <option value="0">Select Role</option>
                                                <option value="1">Super Admin</option>
                                                <option value="2">System Administrator</option>
                                                <option value="3">Manager</option>
                                                <option value="4">Employee</option>
                                            </select>
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
                        <table data-toggle="table" data-search="true" data-show-refresh="true" data-sort-name="id" data-page-list="[5, 10, 20]" data-page-size="5" data-pagination="true" data-show-pagination-switch="true" class="table-borderless">
                            <thead class="thead-light">
                                <tr>
                                    <th data-field="number" data-sortable="true">Sno</th>
                                    <th data-field="userTye" data-sortable="true">Role</th>
                                    <th data-field="first name" data-sortable="true">Name</th>
                                    <th data-field="emailr" data-sortable="true">Email</th>
                                    <th data-field="mobile" data-sortable="true">Mobile</th>
                                    <th data-field="createdob" data-sortable="true">Created Day/Time</th>
                                    <th data-field="actions" data-sortable="true">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($records)) {
                                    $inc = 1;
                                    foreach ($records as $record) {
                                        ?>
                                        <tr>
                                            <td><?php echo $inc; ?></td>
                                            <td><?php
                                                if ($record->roleId == '1') {
                                                    echo 'Super Admin';
                                                }
                                                if ($record->roleId == '2') {
                                                    echo 'System Administrator';
                                                }
                                                if ($record->roleId == '3') {
                                                    echo 'Manager';
                                                }
                                                if ($record->roleId == '4') {
                                                    echo 'Employee';
                                                }
                                                ?></td>
                                            <td><?php echo $record->name ?></td>
                                            <td><?php echo $record->email ?></td>
                                            <td><?php echo $record->mobile ?></td>

                                            <?php
                                            $myvalue = $record->createdDtm;

                                            $datetime = new DateTime($myvalue);

                                            $date = $datetime->format('Y-m-d');
                                            $time = $datetime->format('H:i:s');
                                            ?>

                                            <td><?php
                                                echo $date;
                                                echo " " . $time
                                                ?></td>




                                            <td class="text-center">
                                                <?php if ($record->userId != 0): ?>
                                                    <a class="btn btn-sm btn-warning" data-toggle="modal"
                                                       data-target="#modal-default" onclick="



                                                               $('.update_data input[name=row_id]').val('<?= $record->userId ?>');
                                                               $('.update_data input[name=name]').val('<?= $record->name ?>');
                                                               $('.update_data input[name=roleId]').val('<?= $record->roleId ?>');
                                                               $('.update_data input[name=mobile]').val('<?= $record->mobile ?>');
                                                               $('.update_data input[name=email]').val('<?= $record->email ?>');


                                                       ">
                                                        <i class="fe-edit"></i>
                                                    </a>

                                                    <a class="btn btn-sm btn-danger deletecats <?= $record->userId; ?>" onclick="myFunction1(this,<?= $record->userId; ?>, 'tbl_users')"
                                                       style="<?php
                                                       if ($record->isDeleted == 1) {
                                                           echo 'display: none;';
                                                       }
                                                       ?>" href="#"
                                                       data-table="tbl_users" data-id="<?php echo $record->userId; ?>"><i
                                                            class="fa fa-times"></i></a>

                                                    <a class="btn btn-sm btn-success activebtn"
                                                       style="<?php
                                                       if ($record->isDeleted == 0) {
                                                           echo 'display: none;';
                                                       }
                                                       ?>" href="#"
                                                       data-table="tbl_users" data-id="<?php echo $record->userId; ?>"><i
                                                            class="fa fa-check"></i></a>
                                                    <?php endif; ?>
                                            </td>


                        <!--                                            <td class="text-center">
                                            <?php if ($record->id != 0): ?>
                                                <?php
                                                if ($record->status == 0) {
                                                    echo "<span class='btn btn-sm btn-success'>Active</span>";
                                                } else {
                                                    echo "<span class='btn btn-sm btn-danger'>Inactive</span>";
                                                }
                                                ?>
                                            <?php endif; ?>
                                                                    </td>-->
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
                                <label for="roleId">User Type<span class="text-danger">*</span></label>
                                <select class="selectpicker form-control" data-live-search="true" data-width="100%" name="roleId" required>
                                    <option <?= ($record->roleId == "" ? "selected" : "") ?> value="0">Select Role</option>
                                    <option <?= ($record->roleId == 1 ? "selected" : "") ?> value="1">Super Admin</option>
                                    <option <?= ($record->roleId == 2 ? "selected" : "") ?> value="2">System Administrator</option>
                                    <option <?= ($record->roleId == 3 ? "selected" : "") ?> value="3">Manager</option>
                                    <option <?= ($record->roleId == 4 ? "selected" : "") ?> value="4">Employee</option>
                                </select>

                                <span class="text-danger error-span">This input is required.</span>
                                <input type="hidden" value="tbl_users" name="table_name">
                                <input type="hidden" value="" name="row_id">



                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name">
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
                                <label for="mobile">Mobile</label>
                                <input type="text" class="form-control" name="mobile">
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
            success: function (response) {
                console.log(response);
                if (response.result == 1) {
                    $.each(response.records, function (key, val) {

                        if (val.image !== "default-image.jpg") {
                            img = val.image;
                        } else {
                            img = "";
                        }
                        $('#arr1').append('	<div class="well col-md-12">' +
                                '<div class="col-md-2">' +
                                '<a href="<?= base_url() ?>uploads/category/' + val.image +
                                '" target="_blank"><img width="50" height="50" src="<?= base_url() ?>uploads/category/' +
                                val.image + '"></a>' +
                                '</div>' +
                                '<div class="col-md-2">' +
                                '<a href="<?= base_url() ?>uploads/category/' + val.image_1 +
                                '" target="_blank"><img width="50" height="50" src="<?= base_url() ?>uploads/category/' +
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
                success: function (response) {
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

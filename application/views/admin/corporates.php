<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">



            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Clients</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>



            <div class="row">

                <div class="col-md-8">


                    <div class="card-box">
                        <form role="form" this_id="form-001" class="insert_data" method="post">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Title</label>
                                            <input type="text" class="form-control required" name="name" placeholder="">
                                            <input type="hidden" value="tbl_our_clients" name="table_name">
                                            <input type="hidden" value="" name="row_id">
                                            <span class="text-danger error-span">This input is required.</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="desktop_image">Client Logo</label>
                                            <input type="file" class="form-control required" name="desktop_image">
                                            <span class="text-danger error-span">This input is required.</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Short Description</label>
                                            <textarea type="text" class="form-control" rows="5" name="description"></textarea>
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
                                    <th data-field="desktop_image" data-sortable="true">Client Logo</th>
                                    <th data-field="userTye" data-sortable="true">Title</th>
                                    <th data-field="first name" data-sortable="true">Short Description</th>
                                    <th data-field="createdob" data-sortable="true">Created Day/Time</th>
                                    <th data-field="actions" data-sortable="true">Actions</th>
                                    <th data-field="status" data-sortable="true">Status</th>
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
                                            <td><img src="<?= base_url() ?>uploads/common/<?php echo $record->desktop_image ?>" style="width: 50px; height: 50px;"></td>
                                            <td><?php echo $record->name ?></td>
                                            <td><?php echo $record->description ?></td>
                                            <?php
                                            $myvalue = $record->date_time;

                                            $datetime = new DateTime($myvalue);

                                            $date = $datetime->format('Y-m-d');
                                            $time = $datetime->format('H:i:s');
                                            ?>

                                            <td><?php
                                                echo $date;
                                                echo " " . $time
                                                ?></td>




                                            <td class="text-center">
                                                <?php if ($record->id != 0): ?>
                                                    <a class="btn btn-sm btn-warning" data-toggle="modal"
                                                       data-target="#modal-default" onclick="
                                                               $('.update_data input[name=row_id]').val('<?= $record->id ?>');
                                                               $('.update_data input[name=name]').val('<?= $record->name ?>');
                                                               $('.update_data textarea[name=description]').val('<?= $record->description ?>');
                                                               $('.update_data input[name=desktop_image]').val('<?= $record->desktop_image ?>');
                                                       "><i class="fe-edit"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-danger deletecats <?= $record->id; ?>" onclick="myFunction(this,<?= $record->id; ?>, 'tbl_our_clients')"
                                                       style="<?php
                                                       if ($record->status == 1) {
                                                           echo 'display: none;';
                                                       }
                                                       ?>" href="#" data-table="tbl_entroll_section" data-id="<?php echo $record->id; ?>"><i class="fa fa-times"></i></a>
                                                   <?php endif; ?>
                                            </td>


                                            <td class="text-center">
                                                <?php if ($record->id != 0): ?>
                                                    <?php
                                                    if ($record->status == 0) {
                                                        echo "<span class='btn btn-sm btn-success'>Active</span>";
                                                    } else {
                                                        echo "<span class='btn btn-sm btn-danger'>Inactive</span>";
                                                    }
                                                    ?>
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
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="name">

                                <span class="text-danger error-span">This input is required.</span>
                                <input type="hidden" value="tbl_our_clients" name="table_name">
                                <input type="hidden" value="" name="row_id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text_content">Client Logo</label>
                                <input type="file" class="form-control" name="desktop_image">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Short Description</label>
                                <textarea type="text" class="form-control" rows="5" name="description"></textarea>
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

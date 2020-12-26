<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Section</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Banner</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>

    

            <!-- left column -->
        </div>



        <script>
        $(document).ready(function() {
            $(".add").click(function() {
                $('<div><input class="files" name="user_files[]" type="file" ><span class="rem" ><a href="javascript:void(0);" >Remove</span></div>')
                    .appendTo(".contents");
            });
            $('.contents').on('click', '.rem', function() {
                $(this).parent("div").remove();
            });

        });
        </script>



        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <table data-toggle="table" data-search="true" data-show-refresh="true" data-sort-name="id"
                        data-page-list="[5, 10, 20]" data-page-size="5" data-pagination="true"
                        data-show-pagination-switch="true" class="table-borderless">
                        <thead class="thead-light">

                            <tr>


                                <th data-field="id" data-sortable="true" data-formatter="">SI.no</th>

                                <th data-field="name" data-sortable="true" data-formatter="">Images</th>
                                <th data-field="action" data-sortable="true" data-formatter="">Action</th>






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


                                <td><?php echo $record->images?></td>




                                <td class="text-center">
                                    <?php if($record->id != 0): ?>
                                    <?php if(0 == 1): ?>
                                    <!-- <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#editSlider" onclick="get_records('tbl_category_images', 'sub_category_id=?=$record->id?>')"><i class="fa fa-book"></i></a>
									 -->
                                    <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#addSlider"
                                        onclick="$('#addSlider input[name=sub_category_id]').val('<?=$record->id?>')"><i
                                            class="fa fa-plus"></i></a>
                                    <?php endif; ?>
                                    <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default"
                                        onclick="
								
									
									
									$('.update_data input[name=userfile[]').val(`<?=$record->images?>`);
								
								
									"><i class="fe-edit"></i></a>


                                    <a class="btn btn-sm btn-danger deletecats"
                                        style="<?php if($record->status == 1){ echo 'display: none;'; } ?>" href="#"
                                        data-table="tbl_our_partners" data-id="<?php echo $record->id; ?>"><i
                                            class="fa fa-times"></i></a>
                                    <a class="btn btn-sm btn-success activebtn"
                                        style="<?php if($record->status == 0){ echo 'display: none;'; } ?>" href="#"
                                        data-table="tbl_our_partners" data-id="<?php echo $record->id; ?>"><i
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
            <form reload-action="true" this_id="form-002" class="file_data" method="post" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="files" name="userfile[]" type="file" multiple="multiple">

                                



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
</script>
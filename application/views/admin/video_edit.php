<div class="content-page">
    <div class="content">


        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Courses</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Course List</a></li>

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
                                    <th data-field="id" data-sortable="true" data-formatter="">Sno</th>
                                    <th data-field="Title" data-sortable="true">Course Type</th>
                                    <th data-field="Course_Banner" data-sortable="true">Curriculum</th>
                                    <th data-field="Course_Banner2" data-sortable="true">Curriculum Title</th>
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
                                if (!empty($records)) {
                                    $inc = 1;
                                    foreach ($records as $record) {
                                        ?>
                                        <tr>
                                            <td><?php echo $inc; ?></td>
                                            <td><?php
                                            $text = $this->common_model->get_records('tbl_courses', "id='$record->course_id' and status=0")[0];
                                                if ($text->course_type == '1') {
                                                    echo "Video Based Course";
                                                } else {
                                                    echo "Text Based Course";
                                                }
                                                ?></td>
                                            <td><?php echo $record->curriculum ?>
                                            </td>
                                            <td><?php echo $record->curriculum_title ?></td>
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


                                            <?php
                                            if ($record->post_status == '1') {
                                                $status = 0;
                                            } else if ($record->post_status == '0') {
                                                $status = 1;
                                            }
                                            ?>



                                            <td class="text-center">
                                                <?php if ($record->id != 0): ?>

                                                    <a  class="btn btn-success waves-effect waves-light"
                                                        href="<?= base_url() ?>admin/edit-video-content/<?= $id ?>/<?= $record->id ?>" ><i class="fe-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger deletecats <?= $record->id; ?>" onclick="myFunction(this,<?= $record->id; ?>,'tbl_videos')"
                                                       style="<?php
                                                       if ($record->status == 1) {
                                                           echo 'display: none;';
                                                       }
                                                       ?>" href="#"
                                                       data-table="tbl_builder" data-id="<?php echo $record->id; ?>"><i
                                                            class="fa fa-times"></i>
                                                    </a>

                                                    <a class="btn btn-sm btn-success activebtn"
                                                       style="<?php
                                                       if ($record->status == 0) {
                                                           echo 'display: none;';
                                                       }
                                                       ?>" href="#"
                                                       data-table="tbl_builder" data-id="<?php echo $record->id; ?>"><i
                                                            class="fa fa-check"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </td>



                                            <td class="text-center">
                                                <?php if ($record->id != 0): ?>
                                                    <?php
                                                    if ($record->status == 0) {
                                                        echo "<span class='badge label-table badge-success'>Active</span>";
                                                    } else {
                                                        echo "<span class='badge label-table badge-danger'>Inactive</span>";
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
                                        <div class="form-group col-lg-12">
                                            <label for="course_title">Course Title <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" name="course_title">

                                            <span class="text-danger error-span">This input is required.</span>
                                            <input type="hidden" value="tbl_courses" name="table_name">
                                            <input type="hidden" value="" name="row_id">


                                        </div>




                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="slug">Course Banner</label><br>
                                                <a target="_blank" href="#" class="img-a"><img class="img1" width="50"
                                                                                               height="50" src=""></a>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="slug">Course Banner 2</label><br>
                                                <a target="_blank" href="#" class="img-b"><img class="img2" width="50"
                                                                                               height="50" src=""></a>
                                            </div>

                                        </div>




                                        <div class="form-group col-md-12">
                                            <label for="course_banner">Course Banner</label>
                                            <input type="file" class="form-control" name="course_banner">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="course_banner2">Course Banner 2</label>
                                            <input type="file" class="form-control" name="course_banner2">
                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="preview_video">Preview video</label>
                                            <input type="text" class="form-control" name="preview_video">

                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="duration">Duration</label>
                                            <input type="text" class="form-control" name="duration">

                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="cost">Cost</label>
                                            <input type="text" class="form-control" name="cost">

                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="discount_price">Discount </label>
                                            <input type="text" class="form-control" name="discount_price">

                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="course_validation">Course Validation </label>
                                            <input type="text" class="form-control" name="course_validation">

                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="course_overview">Course Overview </label>
                                            <input type="text" class="form-control" name="course_overview">

                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="requirements">Requirements </label>
                                            <textarea class="form-control simple" name="requirements"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="what_you_will_learn">What you'll learn </label>
                                            <textarea class="form-control simple" name="what_you_will_learn"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="features">Features </label>
                                            <textarea class="form-control simple" name="features"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ins_name">Instructor Name</label>
                                            <input type="text" class="form-control" name="ins_name">
                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="ins_img">Instructor Image </label>

                                            <input type="file" class="form-control" name="ins_img">

                                        </div>  
                                        <div class="form-group col-md-6">

                                            <label for="no_of_videos">No. of Videos</label>
                                            <input type="text" class="form-control" name="no_of_videos">

                                        </div>  
                                        <div class="form-group col-md-6">

                                            <label for="no_of_lectures">No. of lectures </label>
                                            <input type="text" class="form-control" name="no_of_lectures">

                                        </div>  
                                        <div class="form-group col-md-6">

                                            <label for="ins_experience">Instructor Experience </label>
                                            <input type="text" class="form-control" name="ins_experience">

                                        </div>  <div class="form-group col-md-12">

                                            <label for="ins_description">Instructor Description </label>
                                            <textarea class="form-control simple" name="ins_description"></textarea>
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

    function approval(id, status) {
        if (confirm("Confirmation Needed!") === true)
        {
            var row_id = id;
            var status = status;
            var tis = this;
            $.ajax({
                type: 'POST',
                url: baseURL + "admin/approve",
                data: {row_id: row_id, post_status: status},
                dataType: "json",
                success: function (response) {
                    if (response.result == 1)
                    {
                        toastr.success('Success!');
                        window.location.reload();
                    } else if (response.result == 2) {
                        toastr.success('something went wrong!');

                    }

                }
            });
        }


    }

</script>
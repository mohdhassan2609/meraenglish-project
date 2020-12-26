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
                                    <th data-field="id" data-sortable="true" data-formatter="">ID</th>
                                    <th data-field="Title" data-sortable="true">Course Title</th>
                                    <th data-field="Course_Banner" data-sortable="true">Course Banner</th>
                                    <th data-field="Course_Banner2" data-sortable="true">Course Banner 2</th>
                                    <th data-field="preview_video" data-sortable="true">Preview Video</th>
                                    <th data-field="Duration" data-sortable="true">Duration</th>
                                    <th data-field="Cost" data-sortable="true">Cost</th>
                                    <th data-field="Course_overview" data-sortable="true">Course Overview</th>
                                    <th data-field="Requirements" data-sortable="true">Requirements</th>
                                    <th data-field="What_you_will_learn" data-sortable="true">What you'll learn</th>
                                    <th data-field="features" data-sortable="true">Features</th>
                                    <th data-field="Discount_price" data-sortable="true">Discount Price</th>

                                    <th data-field="ins_name" data-sortable="true">Instructor Name</th>
                                    <th data-field="is_img" data-sortable="true">Instructor Image</th>
                                    <th data-field="no_of_videos" data-sortable="true">No.of Videos</th>
                                    <th data-field="no_of_lectures" data-sortable="true">No.of Lectures</th>
                                    <th data-field="ins_experience" data-sortable="true">Instructor Experience</th>
                                    <th data-field="ins_description" data-sortable="true">Instructor Description</th>



                                    <th data-field="post" data-align="center" data-sortable="true"
                                        data-sorter="priceSorter">Post</th>

                                    <th data-field="created_on" data-sortable="true" data-formatter="dateFormatter">
                                        Created On
                                    </th>

                                    <th data-field="amount" data-align="center" data-sortable="true"
                                        data-sorter="priceSorter">Actions</th>
                                    <th data-field="edit-video-text" data-align="center" data-sortable="true"
                                        data-sorter="priceSorter">View Video/Text</th>
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
                                            <td><?php echo $record->course_title ?></td>
                                            <td><a target="_blank"
                                                   href="<?= base_url() ?>uploads/common/<?php echo $record->course_banner ?>"><img
                                                        width="50" height="50"
                                                        src="<?= base_url() ?>uploads/common/<?php echo $record->course_banner ?>"></a>
                                            </td>
                                            <td><a target="_blank"
                                                   href="<?= base_url() ?>uploads/common/<?php echo $record->course_banner_1 ?>"><img
                                                        width="50" height="50"
                                                        src="<?= base_url() ?>uploads/common/<?php echo $record->course_banner_1 ?>"></a>
                                            </td>
                                            <td><?php echo $record->preview_video ?>


                                            </td>
                                            <td><?php echo $record->duration ?></td>
                                            <td><?php echo $record->cost ?></td>
                                            <td><?php echo word_limiter($record->course_overview, 10) ?></td>
                                            <td><?php echo word_limiter($record->requirements, 10) ?></td>
                                            <td><?php echo word_limiter($record->what_you_will_learn, 10) ?></td>
                                            <td><?php echo $record->features ?></td>
                                            <td><?php echo $record->discount_price ?></td>

                                            <td><?php echo $record->ins_name ?></td>
                                            <td><a target="_blank"
                                                   href="<?= base_url() ?>uploads/common/<?php echo $record->ins_img ?>"><img
                                                        width="50" height="50"
                                                        src="<?= base_url() ?>uploads/common/<?php echo $record->ins_img ?>"></a>
                                            </td>
                                            <td><?php echo $record->no_of_videos ?></td>
                                            <td><?php echo $record->no_of_lectures ?></td>
                                            <td><?php echo $record->ins_experience ?></td>
                                            <td><?php echo word_limiter($record->ins_description, 10) ?></td>


                                            <?php
                                            if ($record->post_status == '1') {
                                                $status = 0;
                                            } else if ($record->post_status == '0') {
                                                $status = 1;
                                            }
                                            ?>

                                            <td class="text-center">

                                                <a class="btn btn-sm <?php
                                                if ($record->post_status == '0') {
                                                    echo 'btn-success';
                                                } else {
                                                    echo 'btn-danger';
                                                }
                                                ?> approve"
                                                   href="javascript:void(0);" onclick="approval(<?= $record->id ?>,<?= $status ?>)">
                                                       <?php
                                                       if ($record->post_status == '0') {
                                                           echo 'Approve';
                                                       } else {
                                                           echo 'Reject';
                                                       }
                                                       ?></a>
                                            </td>


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
                                                    <?php if (0 == 1): ?>

                                                        <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#addSlider"
                                                           onclick="$('#addSlider input[name=sub_category_id]').val('<?= $record->id ?>')"><i
                                                                class="fa fa-plus"></i></a>
                                                        <?php endif; ?>

                                                    <button type="button" class="btn btn-success waves-effect waves-light"
                                                            data-toggle="modal" data-target="#con-close-modal" onclick="

                                                                                $('.update_data input[name=row_id]').val('<?= $record->id ?>');
                                                                                $('.update_data input[name=course_title]').val('<?= $record->course_title ?>');
                                                                                $('.update_data select[name=course_type]').val('<?= $record->course_type ?>');
                                                                                $('.update_data input[name=preview_video]').val('<?= $record->preview_video ?>');

                                                                                $('.update_data .img-a').attr('href', '<?= base_url() ?>uploads/common/<?= $record->course_banner ?>');
                                                                                        $('.update_data .img1').attr('src', '<?= base_url() ?>uploads/common/<?= $record->course_banner ?>');
                                                                                                $('.update_data .img-b').attr('href', '<?= base_url() ?>uploads/common/<?= $record->course_banner_1 ?>');
                                                                                                        $('.update_data .img2').attr('src', '<?= base_url() ?>uploads/common/<?= $record->course_banner_1 ?>');
                                                                                                                // $('.update_data .img-b').attr('href', '?=base_url()?>uploads/common/?=$record->mobile_url?>');
                                                                                                                // $('.update_data .img2').attr('src', '?=base_url()?>uploads/common/?=$record->mobile_url?>');

                                                                                                                $('.update_data select[name=course_amt_type]').val('<?= $record->course_amt_type ?>');

                                                                                                                $('.update_data input[name=duration]').val('<?= $record->duration ?>');
                                                                                                                $('.update_data input[name=discount_price]').val('<?= $record->discount_price ?>');

                                                                                                                $('.update_data input[name=cost]').val('<?= $record->cost ?>');
                                                                                                                $('.update_data input[name=course_validation]').val('<?= $record->course_validation ?>');
                                                                                                                $('.update_data input[name=description]').val('<?= $record->description ?>');
                                                                                                                $('.update_data input[name=course_overview]').val('<?= $record->course_overview ?>');
                                                                                                                $('.update_data textarea[name=requirements]').val('<?= $record->requirements ?>');
                                                                                                                $('.update_data textarea[name=what_you_will_learn]').val('<?= $record->what_you_will_learn ?>');
                                                                                                                $('.update_data textarea[name=features]').val('<?= $record->features ?>');
                                                                                                                $('.update_data input[name=ins_name]').val('<?= $record->ins_name ?>');
                                                                                                                $('.update_data .img-c').attr('href', '<?= base_url() ?>uploads/common/<?= $record->course_banner ?>');
                                                                                                                        $('.update_data .img3').attr('src', '<?= base_url() ?>uploads/common/<?= $record->ins_img ?>');
                                                                                                                                $('.update_data input[name=no_of_videos]').val('<?= $record->no_of_videos ?>');
                                                                                                                                $('.update_data input[name=no_of_lectures]').val('<?= $record->no_of_lectures ?>');
                                                                                                                                $('.update_data input[name=ins_experience]').val('<?= $record->ins_experience ?>');
                                                                                                                                $('.update_data textarea[name=ins_description]').val('<?= $record->ins_description ?>');

                                                            "><i class="fe-edit"></i></button>




                                                    <a class="btn btn-danger deletecats <?= $record->id; ?>" onclick="myFunction(this,<?= $record->id; ?>, 'tbl_courses')"
                                                       style="<?php
                                                       if ($record->status == 1) {
                                                           echo 'display: none;';
                                                       }
                                                       ?>" href="#"
                                                       data-table="tbl_builder" data-id="<?php echo $record->id; ?>"><i
                                                            class="fa fa-times"></i></a>

                                                    <a class="btn btn-sm btn-success activebtn"
                                                       style="<?php
                                                       if ($record->status == 0) {
                                                           echo 'display: none;';
                                                       }
                                                       ?>" href="#"
                                                       data-table="tbl_builder" data-id="<?php echo $record->id; ?>"><i
                                                            class="fa fa-check"></i></a>
                                                    <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if($record->course_type != '2') { ?>
                                                <a href="<?= base_url() ?>admin/edit-video/<?= $record->id ?>"><button type="button" class="btn btn-success waves-effect waves-light"><i class="fe-eye"></i></button></a>
                                                <?php } else { ?>
                                                 <a href="<?= base_url() ?>admin/edit-text/<?= $record->id ?>"><button type="button" class="btn btn-success waves-effect waves-light"><i class="fe-eye"></i></button></a>
                                                <?php } ?>
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
                                        <div class="form-group col-lg-6">
                                            <label for="course_title">Course Title <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" name="course_title">

                                            <span class="text-danger error-span">This input is required.</span>
                                            <input type="hidden" value="tbl_courses" name="table_name">
                                            <input type="hidden" value="" name="row_id">


                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="course_title">Course Type <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control selectpicker required" data-live-search="true" data-width="100%" name="course_type" id="course_type" >
                                                <option value="1">Video Based Course</option>
                                                <option value="2">Text Based Course</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="slug">Course Banner</label><br>
                                                <a target="_blank" href="#" class="img-a"><img class="img1" width="50" height="50" src=""></a>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="slug">Course Banner 2</label><br>
                                                <a target="_blank" href="#" class="img-b"><img class="img2" width="50" height="50" src=""></a>
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

                                        <div class="form-group col-md-6" id="text1">
                                            <label for="course_video">Course Preview Video</label>
                                            <input type="text" class="form-control" name="preview_video">
                                            <span class="text-danger error-span">This input is required.</span>

                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="course_amt_type">Course Amount Type <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control selectpicker required"
                                                    data-live-search="true" data-width="100%"
                                                    name="course_amt_type" id="course_amt_type" >
                                                <option value="1">Paid Course</option>
                                                <option value="2">Free Course</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6" id="amt_type">

                                            <label for="cost">Cost</label>
                                            <input type="text" class="form-control" name="cost">

                                        </div>

                                        <div class="form-group col-md-6" id="amt_type_1">

                                            <label for="discount_price">Strikeout Price</label>
                                            <input type="text" class="form-control" name="discount_price">

                                        </div>
                                        <div class="form-group col-md-6" id="text">

                                            <label for="duration">Duration </label>
                                            <input type="text" class="form-control" name="duration" placeholder="6h 40min">
                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="description">Course Banner Description </label>
                                            <input type="text" class="form-control" name="description" />

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

                                            <label for="course_validation">Course Validation </label>
                                            <input type="text" class="form-control" name="course_validation">

                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="features">Features </label>
                                            <textarea class="form-control simple" name="features[]"></textarea>
                                        </div>
                                        <div class="form-group col-md-6" id="text7">
                                            <label for="ins_name">Instructor Name</label>
                                            <input type="text" class="form-control" name="ins_name">
                                        </div>
                                        <div class="form-group col-md-6" id="text8">

                                            <label for="ins_img">Instructor Image </label>

                                            <input type="file" class="form-control" name="ins_img">

                                        </div>  
                                        <div class="form-group col-md-6" id="text9">

                                            <label for="no_of_videos">No. of Videos</label>
                                            <input type="text" class="form-control" name="no_of_videos">

                                        </div>  
                                        <div class="form-group col-md-6" id="text10">

                                            <label for="no_of_lectures">No. of lectures </label>
                                            <input type="text" class="form-control" name="no_of_lectures">

                                        </div>  
                                        <div class="form-group col-md-6" id="text11">

                                            <label for="ins_experience">Instructor Experience </label>
                                            <input type="text" class="form-control" name="ins_experience">

                                        </div>  <div class="form-group col-md-12" id="text12">

                                            <label for="ins_description">Instructor Description </label>
                                            <textarea class="form-control simple" name="ins_description"></textarea>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
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
    $(document).ready(function () {
        $("#course_type").change(function () {
            if ($(this).val() == 2)
            {
                $("#text").hide();
                $("#text1").hide();
                $("#text3").hide();
                $("#text6").hide();
                $("#text7").hide();
                $("#text8").hide();
                $("#text9").hide();
                $("#text10").hide();
                $("#text11").hide();
                $("#text12").hide();
            } else
            {
                $("#text").show();
                $("#text1").show();
                $("#text3").show();
                $("#text6").show();
                $("#text7").show();
                $("#text8").show();
                $("#text9").show();
                $("#text10").show();
                $("#text11").show();
                $("#text12").show();
            }
        });
    });

    $(document).ready(function () {
        $("#course_amt_type").change(function () {
            if ($(this).val() == 2) {
                $('#amt_type').hide();
                $('#amt_type_1').hide();
            } else {
                $('#amt_type').show();
                $('#amt_type_1').show();
            }
        });
    });

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
<div class="content-page">
    <div class="content">


        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Courses</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Text/Video</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-pane" id="profile-tab-5">
                                <form this_id="form-005" id="form5" class="text_edit_form" method="post"
                                      role="form" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col-md-12">

                                            <label>Course Name<span class="text-danger">*</span></label>
                                            <?php $records = $this->common_model->get_records('tbl_courses', "status = '0'order by date_time asc"); ?>
                                            <input type="hidden" class="form-control required" name="id" value="<?= $course->id ?>">

                                            <select class="form-control selectpicker required"
                                                    data-live-search="true" data-width="100%"
                                                    name="course_id" id="select_course">
                                                <option value="">--Select Course--
                                                </option>
                                                <?php foreach ($records as $record): ?>

                                                    <option value="<?= $record->id ?>" <?php
                                                    if ($course->course_id == $record->id) {
                                                        echo "selected";
                                                    }
                                                    ?>>
                                                                <?= $record->course_title; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="text-danger error-span">This input is required.</span>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="curriculum">Curriculum<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" name="curriculum" value="<?= $course->curriculum ?>">
                                            <span class="text-danger error-span">This input is required.</span>

                                        </div>

                                        <div class="form-group col-md-6">

                                            <label for="curriculum_title">Curriculum Title</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control required" name="curriculum_title" value="<?= $course->curriculum_title ?>">
                                            <span class="text-danger error-span">This input is required.</span>


                                        </div>
                                    </div>

                                    <?php
                                    $count = 0;
                                    foreach ($video_contents as $video_content) {
                                        if ($video_content->title) {
                                            $count += 1;
                                        }
                                        ?>

                                            <!--                                        <input type="hidden" class="form-control required" name="id2[]" value="<?= $video_content->id ?>">
                                                                                    <input type="hidden" class="form-control required" id="title-<?= $i ?>" value="<?= $video_content->title ?>">
                                                                                    <input type="hidden" class="form-control required" id="description-<?= $i ?>" value="<?= $video_content->description ?>">
                                                                                    <input type="hidden" class="form-control required" id="url-<?= $i ?>" value="<?= $video_content->url ?>">-->
                                    <?php } ?>

                                    <input type="hidden" class="form-control required" id="limit" value="<?php
                                    if ($count == 0) {
                                        echo "0";
                                    } else {
                                        echo $count;
                                    }
                                    ?>">     
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">

                                                <input type="hidden" id="id5"  name="uniq_id"
                                                       value="<?= $_SESSION['id'] ?>">
                                            </div>
                                        </div>
                                        <!--                                        <div class="col-12" id="video" style="display: none;">
                                                                                    <input id="btnAdd" type="button" class="btn btn-primary waves-effect waves-light" value="Add Video Based Course" /><br>
                                                                                    <div id="TextBoxContainer">
                                                                                        Textboxes will be added here 
                                                                                    </div>
                                                                                </div>-->
                                        <div class="col-12" id="text" style="display: none;">
                                            <div id="TextBoxContainer2">

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div>
                                                <li class="next list-inline-item">
                                                    <input id="btnAdd2" type="button" class="btn btn-primary waves-effect waves-light" value="Add Text Based Course"  />
                                                </li>
                                                <li class="next list-inline-item float-right">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save & Update</button>
                                                </li>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>




            </div> <!-- container -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">


                        <table data-toggle="table" data-search="true" data-show-refresh="true" data-sort-name="id"
                               data-page-list="[5, 10, 20]" data-page-size="5" data-pagination="true"
                               data-show-pagination-switch="true" class="table-borderless">
                            <thead class="thead-light">
                                <tr>
                                    <th data-field="id" data-sortable="true" data-formatter="">Sno</th>
                                    <th data-field="Title" data-sortable="true">Title</th>
                                    <th data-field="Course_Banner" data-sortable="true">Description</th>
                                    <th data-field="Course_Banner2" data-sortable="true">Text Content</th>
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
                                if (!empty($video_contents)) {
                                    $inc = 1;
                                    foreach ($video_contents as $video_content) {
                                        ?>
                                        <tr>
                                            <td><?php echo $inc; ?></td>
                                            <td><?php echo $video_content->title ?>
                                            </td>
                                            <td><?php echo $video_content->description ?>
                                            </td>
                                            <td><?php  echo word_limiter($video_content->url, 20) ?></td>
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
                                            if ($video_content->post_status == '1') {
                                                $status = 0;
                                            } else if ($video_content->post_status == '0') {
                                                $status = 1;
                                            }
                                            ?>



                                            <td class="text-center">
                                                <?php if ($video_content->id != 0): ?>

                                                    <a href="<?= base_url() ?>admin/text-content-edit/<?= $video_content->id ?>" class="btn btn-success waves-effect waves-light"><i class="fe-edit"></i></a>
                                                    <a class="btn btn-danger deletecats <?= $video_content->id; ?>" onclick="myFunction(this,<?= $video_content->id; ?>, 'tbl_video_content')"
                                                       style="<?php
                                                       if ($video_content->status == 1) {
                                                           echo 'display: none;';
                                                       }
                                                       ?>" href="#"
                                                       data-table="tbl_builder" data-id="<?php echo $video_content->id; ?>"><i
                                                            class="fa fa-times"></i>
                                                    </a>

                                                    <a class="btn btn-sm btn-success activebtn"
                                                       style="<?php
                                                       if ($video_content->status == 0) {
                                                           echo 'display: none;';
                                                       }
                                                       ?>" href="#"
                                                       data-table="tbl_builder" data-id="<?php echo $video_content->id; ?>"><i
                                                            class="fa fa-check"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </td>



                                            <td class="text-center">
                                                <?php if ($video_content->id != 0): ?>
                                                    <?php
                                                    if ($video_content->status == 0) {
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

        </div> <!-- content -->

    </div>

    <div class="rightbar-overlay"></div>
    <script src="https://ckeditor.com/latest/ckeditor.js"></script>

    <!-- Vendor js -->
    <script>
                                            $(function () {
                                                var limit = parseInt($("#limit").val());

                                                var count = limit + 1;
                                                $("#btnAdd").bind("click", function () {
                                                    var div = $("<div />");
                                                    var limit = $("#limit").val();
                                                    div.html(GetDynamicTextBox("", count, limit));
                                                    $("#TextBoxContainer").append(div);
                                                    count++;
                                                });
                                                $("#btnGet").bind("click", function () {
                                                    var values = "";
                                                    $("input[name=title[]").each(function () {
                                                        values += $(this).val() + "\n";
                                                    });
                                                    alert(values);
                                                });
                                                $("body").on("click", ".remove", function () {

                                                    $(this).closest("div").remove();
                                                });
                                            });
                                            function GetDynamicTextBox(value, count, limit) {

                                                return '<div id="tag' + count + '"><div class="col-12"> <div class="form-group"><h4>ADD VIDEO ' + count + '</h4></div></div>' + '<br>' + '<div class="col-md-6"><div class="form-group"><label>Video Title</label><input type="text"  class="form-control" name="title[]"></div></div><div class="col-md-6"> <div class="form-group"> <label for="description"> Description</label> <textarea class="form-control" id="description" rows="7" name="description[]"></textarea></div></div><div class="col-6"><div class="form-group"><label>Video URL</label><input type="text"  class="form-control" name="url[]"></div></div><br><input type="button" value="Remove" class="btn btn-primary waves-effect waves-light remove" />';

                                            }
                                            $(function () {

                                                var limit = parseInt($("#limit").val());

                                                var count1 = limit + 1;
                                                $("#btnAdd2").bind("click", function () {
                                                    var div;

                                                    div = '<div id="tag' + count1 + '"><div class="col-12"> <div class="form-group"><h4>ADD TEXT ' + count1 + '</h4></div></div>' + '<br>' + '<div class="col-md-12"><div class="form-group"><label>Title</label><input type="text"  class="form-control" name="title[]" ><input type="hidden" value="new" name="row_id[]" /></div></div><div class="col-md-12"> <div class="form-group"> <label for="description"> Description</label> <textarea class="form-control" id="description" rows="7" name="description[]"></textarea></div></div><div class="col-12"><div class="form-group"><label>Text Content</label> <textarea name="url[]"  rows="10" cols="80" id="editor' + count1 + '" class="textarea editor" onload="func()" ></textarea></div></div><br><input type="button" value="Remove" class="btn btn-pimary waves-effect waves-light remove" style="background-color:blue;"/><br/><br/></div>';
                                                    count1++;


                                                    $("#TextBoxContainer2").append(div);

                                                    $('.editor').each(function () {

                                                        CKEDITOR.replace(this.id);



                                                    });

                                                });

                                                $("body").on("click", ".remove", function () {

                                                    $("tag" + count1).remove();

                                                });

                                            });

                                            $("#course_type").change(function () {

                                                if ($(this).val() == 1)
                                                {
                                                    $("#video").show();

                                                    $("#text").hide();
                                                } else
                                                {

                                                    $("#text").show();
                                                    $("#video").hide();
                                                }
                                            });

                                            $(document).ready(function () {
                                                if ($("#course_type").val() == 1)
                                                {
                                                    $("#video").show();

                                                    $("#text").hide();
                                                } else
                                                {

                                                    $("#text").show();
                                                    $("#video").hide();
                                                }
                                                $('.editor').each(function () {

                                                    CKEDITOR.replace(this.id);




                                                });
                                            });/*
                                             $(function () {
                                             var count = 1;
                                             var div1,i;
                                             var limit=$("#limit").val();
                                             for(i=0;i<limit;i++)
                                             {
                                             var title=$("#title-"+i).val();
                                             var desc=$("#description-"+i).val();
                                             var url=$("#url-"+i).val();
                                             
                                             div1+='<div id="tag'+i+'"><div class="col-12"> <div class="form-group"><h4>ADD VIDEO ' + count + '</h4></div></div>' + '<br>' + '<div class="col-md-6"><div class="form-group"><label>Video Title</label><input type="text"  class="form-control" name="title[]" value="'+title+'"></div></div><div class="col-md-6"> <div class="form-group"> <label for="description"> Description</label> <textarea class="form-control" id="description" rows="7" name="description[]">'+desc+'</textarea></div></div><div class="col-6"><div class="form-group"><label>Video URL</label><input type="text"  class="form-control" name="url[]" value="'+url+'"></div></div><br><input type="button" value="Remove" class="btn btn-primary waves-effect waves-light remove" /></div>';
                                             }
                                             
                                             $("#TextBoxContainer").append(div1);
                                             count++;
                                             });
                                             $("#btnGet").bind("click", function () {
                                             var values = "";
                                             $("input[name=title[]").each(function () {
                                             values += $(this).val() + "\n";
                                             });
                                             alert(values);
                                             });
                                             $("body").on("click", ".remove", function () {
                                             
                                             $("tag"+i).remove();
                                             });
                                             
                                             $(function () {
                                             var count1 = 1;
                                             var div,i;
                                             var limit=$("#limit").val();
                                             
                                             for(var i=0;i<limit;i++)
                                             {
                                             var title=$("#title-"+i).val();
                                             var desc=$("#description-"+i).val();
                                             var url=$("#url-"+i).val();
                                             div+='<div id="tag'+i+'"><div class="col-12"> <div class="form-group"><h4>ADD TEXT ' + count1 + '</h4></div></div>' + '<br>' + '<div class="col-md-6"><div class="form-group"><label>Title</label><input type="text"  class="form-control" name="title[]" value="'+title+'"></div></div><div class="col-md-6"> <div class="form-group"> <label for="description"> Description</label> <textarea class="form-control" id="description" rows="7" name="description[]">'+desc+'</textarea></div></div><div class="col-12"><div class="form-group"><label>Text Content</label> <textarea name="url[]"  rows="10" cols="80" id="editor' + count1 + '" class="textarea editor" onload="func()" >'+url+'</textarea></div></div><br><input type="button" value="Remove" class="btn btn-pimary waves-effect waves-light remove" style="background-color:blue;"/></div>';
                                             count1++;
                                             }
                                             
                                             $("#TextBoxContainer2").append(div);
                                             
                                             $('.editor').each( function () {
                                             
                                             CKEDITOR.replace( this.id );
                                             
                                             
                                             
                                             
                                             });
                                             
                                             $("body").on("click", ".remove", function () {
                                             
                                             $("tag"+i).remove();
                                             
                                             });
                                             
                                             });
                                             
                                             });*/

                                            CKEDITOR.editorConfig = function (config) {
                                                config.toolbar = [
                                                    {name: 'document', items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates']},
                                                    {name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']},
                                                    {name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt']},
                                                    '/',
                                                    {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat']},
                                                    {name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language']},
                                                    {name: 'links', items: ['Link', 'Unlink', 'Anchor']},
                                                    {name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak']},
                                                    '/',
                                                    {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
                                                    {name: 'colors', items: ['TextColor', 'BGColor']},
                                                    {name: 'tools', items: ['Maximize', 'ShowBlocks']}
                                                ];
                                            };
    </script>


<div class="content-page">
    <div class="content">


        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Courses</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Add Text</a></li>

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
                                <form this_id="form-005" id="form5" class="insert_data_7" method="post"
                                      role="form" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col-md-6">

                                            <label>Course Name<span class="text-danger">*</span></label>
                                            <?php $records = $this->common_model->get_records('tbl_courses', "status = '0'order by date_time asc"); ?>

                                            <select class="form-control selectpicker required" data-live-search="true" data-width="100%" name="course_title" id="select_course" value="<?= $records->course_title ?>">
                                                <option value="">--Select Course--</option>
                                                <?php foreach ($records as $record): ?>
                                                    <option value="<?= $record->id ?>">
                                                        <?= $record->course_title; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="text-danger error-span">This input is required.</span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="curriculum">Curriculum<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" name="curriculum" >
                                            <span class="text-danger error-span">This input is required.</span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">

                                            <label for="curriculum_title">Curriculum Title</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control required" name="curriculum_title">
                                            <span class="text-danger error-span">This input is required.</span>


                                        </div>
                                    </div>


                                    <div class="row">
                                        <!--                                        <div class="col-12">
                                                                                    <div class="form-group">
                                        
                                                                                        <input type="hidden" id="id5"  name="uniq_id"
                                                                                               value="<?= $_SESSION['id'] ?>">
                                                                                        <input type="hidden" value="tbl_videos" name="table_name">
                                                                                    </div>
                                                                                </div>-->
                                        <!--                                        <div class="col-12" id="video" style="display: none;">
                                                                                    <br>
                                                                                    <div id="TextBoxContainer">
                                                                                        
                                                                                    </div>
                                                                                    <input id="btnAdd" type="button" class="btn btn-primary waves-effect waves-light" value="Add Video Based Course" /><br>
                                                                                </div>
                                                                                <div class="col-12" id="text" style="display: none;">
                                                                                    <br>
                                                                                    <div id="TextBoxContainer2">
                                                                                        
                                                                                    </div>
                                                                                    <input id="btnAdd2" type="button" class="btn btn-primary waves-effect waves-light" value="Add Text Based Course"  /><br>
                                                                                </div>-->
                                        <div class="col-12">
                                            <div>
                                                <li class="next list-inline-item float-right">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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

        </div> <!-- content -->

    </div>

    <div class="rightbar-overlay"></div>
    <script src="https://ckeditor.com/latest/ckeditor.js"></script>

    <!-- Vendor js -->
    <script>
        $(function () {
            var count = 1;
            $("#btnAdd").bind("click", function () {
                var div = $("<div />");

                div.html(GetDynamicTextBox("", count));
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
        function GetDynamicTextBox(value, count) {





            return '<div class="col-12"> <div class="form-group"><h4>ADD VIDEO ' + count + '</h4></div></div>' + '<br>' + '<div class="col-md-6"><div class="form-group"><label>Video Title</label><input type="text"  class="form-control" name="title[]"></div></div><div class="col-md-6"> <div class="form-group"> <label for="description"> Description</label> <textarea class="form-control" id="description" rows="7" name="description[]"></textarea></div></div><div class="col-6"><div class="form-group"><label>Video URL</label><input type="text"  class="form-control" name="url[]"></div></div><br><input type="button" value="Remove" class="btn btn-primary waves-effect waves-light remove" /><br><br>';

        }
        $(function () {
            var count1 = 1;
            $("#btnAdd2").bind("click", function () {
                var div = $("<div />");

                div.html('<div class="col-12"> <div class="form-group"><h4>ADD TEXT ' + count1 + '</h4></div></div>' + '<br>' + '<div class="col-md-6"><div class="form-group"><label>Title</label><input type="text"  class="form-control" name="title[]"></div></div><div class="col-md-6"> <div class="form-group"> <label for="description"> Description</label> <textarea class="form-control" id="description" rows="7" name="description[]"></textarea></div></div><div class="col-12"><div class="form-group"><label>Text Content</label> <textarea name="url[]"  rows="10" cols="80" id="editor' + count1 + '" class="textarea editor" onload="func()"></textarea></div></div><br><input type="button" value="Remove" class="btn btn-pimary waves-effect waves-light remove" style="background-color:blue;"/><br><br>');
                $("#TextBoxContainer2").append(div);

                count1++;
                $('.editor').each(function () {

                    CKEDITOR.replace(this.id);



                });

            });

            $("body").on("click", ".remove", function () {

                $(this).closest("div").remove();

            });

        });


        $("#select_course").change(function () {
            var data = $(this).val();
            $.ajax({
                type: "POST",
                url: baseURL + "admin/select-course-type",
                data: {data: data},
                dataType: "json",
                success: function (response) {
                    if (response.result == "1") {
                        //                    alert("test");
                        //                    $("#video").show();
                        //                    $("#text").hide();
                    } else if (response.result == "2") {
                        //                    $("#text").show();
                        //                    $("#video").hide();
                    }
                },
                error: function () {
                    alert('Error occured');
                }
            });
        });
        //    $("#course_type").change(function () {
        //
        //        if ($(this).val() == 1)
        //        {
        //            $("#video").show();
        //
        //            $("#text").hide();
        //        } else
        //        {
        //
        //            $("#text").show();
        //            $("#video").hide();
        //        }
        //    });

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


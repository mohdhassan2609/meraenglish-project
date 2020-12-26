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
                                                <option value="">--Select Course--</option>
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

                                        <div class="col-12" id="text" style="display: none;">
                                            <div id="TextBoxContainer">
                                                <!--Textboxes will be added here -->

                                                <?php
                                                if ($video_contents[0]->title != "") {
                                                    $i = 1;
                                                    foreach ($video_contents as $video_content) {
                                                        ?>
                                                        <div >
                                                            <div class="col-12"> 
                                                                <div class="form-group">
                                                                    <h4>ADD VIDEO  <?= $i; ?></h4>
                                                                </div>
                                                            </div><br>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Title</label>
                                                                    <input type="text"  class="form-control" name="title[]" value="<?= $video_content->title ?>">
                                                                    <input type="hidden" value="<?= $video_content->id ?>" name="row_id[]" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12"> 
                                                                <div class="form-group"> 
                                                                    <label for="description"> Description</label> <textarea class="form-control" id="description" rows="7" name="description[]"><?= $video_content->description ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Video Url</label> 
                                                                    <input name="url[]" class="form-control" value="<?= $video_content->url ?>" >
                                                                </div>
                                                            </div><br>
                                                            <input type="button" value="Remove" class="btn btn-pimary waves-effect waves-light remove <?= $video_content->id; ?>" style="background-color:blue;" onclick="myFunction(this,<?= $video_content->id; ?>, 'tbl_video_content')"/>
                                                            <br/>
                                                            <br/>
                                                        </div>

                                                        <?php
                                                        $i++;
                                                    }
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div>
                                                <li class="next list-inline-item">
                                                    <input id="btnAdd" type="button" class="btn btn-primary waves-effect waves-light" value="Add Video Based Course" />
                                                </li>
                                                <li class="next list-inline-item float-right">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
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

            return '<div id="tag' + count + '"><div class="col-12"> <div class="form-group"><h4>ADD VIDEO ' + count + '</h4></div></div>' + '<br>' + '<div class="col-md-12"><div class="form-group"><label>Video Title</label><input type="text"  class="form-control" name="title[]"><input type="hidden" value="new" name="row_id[]" /></div></div><div class="col-md-12"> <div class="form-group"> <label for="description"> Description</label> <textarea class="form-control" id="description" rows="7" name="description[]"></textarea></div></div><div class="col-12"><div class="form-group"><label>Video URL</label><input type="text"  class="form-control" name="url[]"></div></div><br><input type="button" value="Remove" class="btn btn-primary waves-effect waves-light remove" /><br><br>';

        }
        $(function () {

            var limit = parseInt($("#limit").val());

            var count1 = limit + 1;
            $("#btnAdd2").bind("click", function () {
                var div;

                div += '<div id="tag' + count1 + '"><div class="col-12"> <div class="form-group"><h4>ADD VIDEO ' + count1 + '</h4></div></div>' + '<br>' + '<div class="col-md-6"><div class="form-group"><label>Video Title</label><input type="text"  class="form-control" name="title[]"><input type="hidden" value="new" name="row_id[]" /></div></div><div class="col-md-6"> <div class="form-group"> <label for="description"> Description</label> <textarea class="form-control" id="description" rows="7" name="description[]"></textarea></div></div><div class="col-6"><div class="form-group"><label>Video URL</label><input type="text"  class="form-control" name="url[]"></div></div><br><input type="button" value="Remove" class="btn btn-primary waves-effect waves-light remove" />';
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


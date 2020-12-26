<div class="content-page">
    <div class="content">


        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Courses</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Text Content</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form reload-action="true" this_id="form-002" class="text_edit_form_one" method="post" role="form">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>


                                <div class="modal-body p-4">
                                    <div class="row">

                                        <?php $record = $records[0]; ?>
                                        <div class="form-row">
                                            <div class="form-group col-lg-12">
                                                <label for="course_title">Title <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control required" name="title" value="<?php echo $record->title ?>">

                                                <span class="text-danger error-span">This input is required.</span>
                                                <input type="hidden" value="tbl_video_content" name="table_name">
                                                <input type="hidden" value="<?php echo $record->id ?>" name="row_id">
                                                <input type="hidden" value="<?php echo $record->video_id ?>" name="video_id">


                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label for="course_title">Description </label>
                                                <textarea class="form-control" name="description" rows="5"><?php echo $record->description ?></textarea>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="slug">Text Content</label><br>
                                                    <textarea type="text" name="url" class="form-control editor" id="editor"><?php echo $record->url ?></textarea>
                                                </div>

                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
<!--                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>-->
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script src="https://ckeditor.com/latest/ckeditor.js"></script>

<!-- Vendor js -->
<script>
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
    });

//    CKEDITOR.editorConfig = function (config) {
//        config.toolbar = [
//            {name: 'document', items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates']},
//            {name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']},
//            {name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt']},
//            '/',
//            {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat']},
//            {name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language']},
//            {name: 'links', items: ['Link', 'Unlink', 'Anchor']},
//            {name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak']},
//            '/',
//            {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
//            {name: 'colors', items: ['TextColor', 'BGColor']},
//            {name: 'tools', items: ['Maximize', 'ShowBlocks']}
//        ];
//    };
</script>
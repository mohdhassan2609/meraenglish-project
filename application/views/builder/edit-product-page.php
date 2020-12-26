<?php $record = $records[0]; ?>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Edit-property</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            
			<div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mb-3">Post Your Property</h4>


                            <div id="progressbarwizard">

                                <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
                                    <li class="nav-item">
                                        <a href="#account-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <span class="d-none d-sm-inline">Basic
                                                Details</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-tab-2" data-toggle="tab"
                                            class="nav-link rounded-0 pt-2 pb-2 ">
                                            <span class="d-none d-sm-inline">Property Images</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-tab-3" data-toggle="tab"
                                            class="nav-link rounded-0 pt-2 pb-2 ">
                                            <span class="d-none d-sm-inline">Location Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-tab-4" data-toggle="tab"
                                            class="nav-link rounded-0 pt-2 pb-2 ">
                                            <span class="d-none d-sm-inline">Detailed Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-tab-5" data-toggle="tab"
                                            class="nav-link rounded-0 pt-2 pb-2 ">
                                            <span class="d-none d-sm-inline">Floor plan</span>
                                        </a>
                                    </li>

								

									<li class="nav-item">
                                        <a href="#profile-tab-6" data-toggle="tab"
                                            class="nav-link rounded-0 pt-2 pb-2 ">
                                            <span class="d-none d-sm-inline">	Amenities</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#finish-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                            <span class="d-none d-sm-inline">Finish</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content b-0 mb-0">

                                    <div id="bar" class="progress mb-3" style="height: 7px;">
                                        <div
                                            class="bar progress-bar progress-bar-striped progress-bar-animated bg-success">
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="account-2">
									<?php include("edit-product/basic-info.php"); ?>





                                 
                                    </div>

                                    <div class="tab-pane" id="profile-tab-2">
									
									<?php include("edit-product/property-images.php"); ?>



                                     
                                    </div>
                                    <div class="tab-pane" id="profile-tab-3">
									<?php include("edit-product/Property-location-info.php"); ?>
									
                                    </div>
                                    <div class="tab-pane" id="profile-tab-4">
									<?php include("edit-product/Detailed-property-info.php"); ?>
									<!-- ?php include("edit-product/Builder-info.php"); ?> -->
                                    
                                    </div>
                                    <div class="tab-pane" id="profile-tab-5">
									<?php include("edit-product/Floor-plan.php"); ?>
                                       
                                    </div>
									<div class="tab-pane" id="profile-tab-6">
									<?php include("edit-product/Amenities.php"); ?>
								
                                       
                                    </div>
									





                                    <div class="tab-pane" id="finish-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <h2 class="mt-0"><i class="mdi mdi-check-all"></i>
                                                    </h2>
                                                    <h3 class="mt-0">Thank you !</h3>

                                                    <p class="w-75 mb-2 mx-auto">
                                                        Property posted successfully.
                                                    </p>


                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </div>
                                        <!--    <ul class="list-inline mb-0 wizard">
                                                        <li class="previous list-inline-item">
                                                            <a href="javascript: void(0);" class="btn btn-secondary">Previous</a>
                                                        </li>
                                                        <li class="next list-inline-item float-right">
                                                            <a href="javascript: void(0);" class="btn btn-secondary">Next</a>
                                                        </li>
                                                    </ul>-->

                                    </div> <!-- tab-content -->
                                </div> <!-- end #progressbarwizard-->


                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
            </div>
        </div>


            <!-- <div class="row card-box">
                <div class="col-md-12 ">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs ">
                            <li class="active btn btn-primary mb-2"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Basic
                                    Details</a></li>
                            <li><a href="#tab_2" class="btn btn-primary ml-3 mb-2" data-toggle="tab" aria-expanded="true">Property Images</a></li>
                            <li><a href="#tab_6" class="btn btn-primary ml-3 mb-2" data-toggle="tab" aria-expanded="true">Property Location Info</a></li>
                            <li><a href="#tab_3"  class="btn btn-primary ml-3 mb-2" data-toggle="tab" aria-expanded="true">Detailed Property Info</a></li>

                            <li><a href="#tab_5" class="btn btn-primary ml-3 mb-2" data-toggle="tab" aria-expanded="true">Floor plan</a></li>
                            <li><a href="#tab_7"  class="btn btn-primary ml-3 mb-2" data-toggle="tab" aria-expanded="true">Amenities</a></li>
                        </ul>
                        <div class="tab-content ">
                            <div class="tab-pane active" id="tab_1">
                                ?php include("edit-product/basic-info.php"); ?>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                ?php include("edit-product/property-images.php"); ?>
                            </div>
                            <div class="tab-pane" id="tab_3">
                                ?php include("edit-product/Detailed-property-info.php"); ?>
                            </div>
                            <div class="tab-pane" id="tab_4">
                                ?php include("edit-product/Builder-info.php"); ?>
                            </div>
                            <div class="tab-pane" id="tab_5">
                                ?php include("edit-product/Floor-plan.php"); ?>
                            </div>
                            <div class="tab-pane" id="tab_6">
                                ?php include("edit-product/Property-location-info.php"); ?>
                            </div>
                            <div class="tab-pane" id="tab_7">
                                ?php include("edit-product/Amenities.php"); ?>
                            </div>
                            <div class="tab-pane" id="tab_8">
                            ?php include("edit-product/category_tech_specs_entry.php"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> -->

<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script> -->
<script src="https://ckeditor.com/latest/ckeditor.js"></script>


<script src="<?php echo base_url()?>assets/front/js/jquery-3.3.1.js"></script>

<script>
$('.select2').select2();

$('.update_product_data').submit(function(e) {
    e.preventDefault();
    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
    var tis = this;
    setTimeout(function() {
        if (is_required(this_id) === true) {
            $.ajax({
                type: 'POST',
                url: baseURL + "admin/update_product",
                data: new FormData($('.update_product_data')[0]),
                dataType: "json",
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $(this_id + ' button[type=submit]').attr('disabled', 'true');
                },
                success: function(response) {
                    console.log(response)
                    if (response.result == 1) {
                        toastr.success('Product updated!');
                        $(this_id + ' button[type=submit]').removeAttr('disabled');
                    } else {
                        toastr.error('Something went wrong! Please try again later!');
                        $(this_id + ' button[type=submit]').removeAttr('disabled');
                    }
                }
            });
        } else {
            toastr.error('Please check the required fields!');
        }
    }, 1000);
});
$('.insert_product_image').submit(function(e) {
    e.preventDefault();
    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    $.ajax({
        type: 'POST',
        url: baseURL + "admin/insert",
        data: new FormData($('.insert_product_image')[0]),
        dataType: "json",
        contentType: false,
        processData: false,
        beforeSend: function() {
            $(this_id + ' input[type=submit]').attr('disabled', 'true');
        },
        success: function(response) {
            console.log(response)
            if (response.result == 1) {
                $(this_id)[0].reset();
                $('.uploaded').empty();
                $('.image-uploader').removeClass('has-files');
                toastr.success('Product images uploaded!');
                $(this_id + ' input[type=submit]').removeAttr('disabled');
                $('#product-add-images').load("<?=base_url()?>admin/product-additional-images/" + $(
                    '.insert_product_image input[name=product_id]').val());
            } else {
                toastr.error('Something went wrong! Please try again later!');
                $(this_id + ' input[type=submit]').removeAttr('disabled');
            }
        }
    });
});

$('.insert_product_video').submit(function(e) {
    e.preventDefault();
    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    $.ajax({
        type: 'POST',
        url: baseURL + "admin/insert",
        data: new FormData($('.insert_product_video')[0]),
        dataType: "json",
        contentType: false,
        processData: false,
        beforeSend: function() {
            $(this_id + ' input[type=submit]').attr('disabled', 'true');
        },
        success: function(response) {
            console.log(response)
            if (response.result == 1) {
                $(this_id)[0].reset();
                $('.uploaded').empty();
                $('.image-uploader').removeClass('has-files');
                toastr.success('Product videos uploaded!');
                $(this_id + ' input[type=submit]').removeAttr('disabled');
                $('#product-add-videos').load("<?=base_url()?>admin/product-additional-videos/" + $(
                    '.insert_product_image input[name=product_id]').val());
            } else {
                toastr.error('Something went wrong! Please try again later!');
                $(this_id + ' input[type=submit]').removeAttr('disabled');
            }
        }
    });
});

$('.update_tech_spec_data').submit(function(e) {
    e.preventDefault();
    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    if (is_required(this_id) === true) {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/update_tech_spec",
            data: $(this_id).serialize(),
            dataType: "json",
            beforeSend: function() {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');
            },
            success: function(response) {
                console.log(response)
                if (response.result == 1) {
                    toastr.success('Technical spec are updated!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                } else {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else {
        toastr.error('Please check the required fields!');
    }
});

function deleteimage(data_id) {
    if (confirm('Are you sure to delete this image from product details?') === true) {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/update",
            data: 'row_id=' + data_id + '&table_name=tbl_product_images&status=1',
            dataType: "json",
            beforeSend: function() {
                $(this).attr('disabled', 'disabled');
            },
            success: function(response) {
                if (response.result == 1) {
                    toastr.success('Success!');
                    $('#product-add-images').load("<?=base_url()?>admin/product-additional-images/" + $(
                        '.insert_product_image input[name=product_id]').val());
                } else {
                    toastr.error('Something went wrong! Please try again later!');
                    $('span[data-id=' + data_id + ']').removeAttr('disabled');
                }
            }
        });
    }
}

function addbtn() {
    $('#technical_spec').append('<div class="row">' +
        '<div class="col-sm-5">' +
        '<div class="form-group">' +
        '<label for="slug">Title <span class="text-danger">*</span></label>' +
        '<input type="hidden" value="0" name="spec_row_id[]">' +
        '<select class="form-control select2 tech_specs" name="spec_id[]">' +
        '<option value=""></option>' +
        '<?php foreach($technical_specifications as $technical_specification): ?>' +
        '	<option value="<?=$technical_specification->id?>"><?=$technical_specification->title?></option>' +
        '<?php endforeach; ?>' +
        '</select>' +
        '</div>' +
        '</div>' +
        '<div class="col-sm-5">' +
        '<div class="form-group">' +
        '<label for="slug">Description <span class="text-danger">*</span></label>' +
        '<input type="text" class="form-control" name="spec_description[]">' +
        '</div>' +
        '</div>' +
        '<div class="col-sm-2">' +
        '<label for="slug">&nbsp;</label><br>' +
        '<a class="btn btn-sm btn-danger" onclick="removebtn(this)"><i class="fa fa-trash"></i></a>' +
        '<a class="btn btn-sm btn-success" onclick="addbtn()"><i class="fa fa-plus"></i></a>' +
        '</div>' +
        '</div>');
    $('.select2').select2();
}

function removebtn(tis) {
    $(tis).parent().parent().remove();
}

$('.quick_insert_data').submit(function(e) {
    e.preventDefault();
    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
    if (is_required(this_id) === true) {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/insert",
            data: $(this_id).serialize(),
            dataType: "json",
            beforeSend: function() {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');
            },
            success: function(response) {
                console.log(response)
                if (response.result == 1) {
                    $(this_id)[0].reset();
                    var data = {
                        id: response.insert_id,
                        text: $(this_id + " input[name=title]").val()
                    };
                    var newOption = new Option(data.text, data.id, false, false);
                    $('.tech_specs').append(newOption);
                    toastr.success('Success!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                } else {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else {
        toastr.error('Please check the required fields!');
    }
});
</script>
<script>
CKEDITOR.replace('editor', {
    filebrowserUploadUrl: 'ckeditor/ck_upload.php',
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('editor1', {
    filebrowserUploadUrl: 'ckeditor/ck_upload.php',
    filebrowserUploadMethod: 'form'
});

CKEDITOR.replace('editor2', {
    filebrowserUploadUrl: 'ckeditor/ck_upload.php',
    filebrowserUploadMethod: 'form'
});
CKEDITOR.editorConfig = function(config) {
    config.toolbar = [{
            name: 'document',
            items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates']
        },
        {
            name: 'clipboard',
            items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
        },
        {
            name: 'editing',
            items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt']
        },
        '/',
        {
            name: 'basicstyles',
            items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting',
                'RemoveFormat'
            ]
        },
        {
            name: 'paragraph',
            items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv',
                '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr',
                'BidiRtl', 'Language'
            ]
        },
        {
            name: 'links',
            items: ['Link', 'Unlink', 'Anchor']
        },
        {
            name: 'insert',
            items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak']
        },
        '/',
        {
            name: 'styles',
            items: ['Styles', 'Format', 'Font', 'FontSize']
        },
        {
            name: 'colors',
            items: ['TextColor', 'BGColor']
        },
        {
            name: 'tools',
            items: ['Maximize', 'ShowBlocks']
        }
    ];
};
</script>
<!-- image upload pack -->
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/image-uploader.min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/image-uploader.min.css">
<script>
$(function() {
    $('.input-images-1').imageUploader({
        imagesInputName: 'file_name',
        extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
        mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'],
    });
});
</script>
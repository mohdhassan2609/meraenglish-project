	<?php $record = $records[0]; ?>
	<div class="content-wrapper">
		<section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p>
                                Note: 
                                <ol>
                                    <li> Tax calculations are included. </li>
                                    <li> Badges and highlight for the product has been added. </li>
                                    <li> Please upload all the product images in max of 400px x 400px and minimum 200px x 200px. </li>
                                    <li> All the uploaded product images should be in aspect ratio 2:2 (Square). </li>
                                    <li> Added you save in price option. </li>
                                </ol>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
				<div class="col-md-12">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Basic Details</a></li>
							<li><a href="#tab_2" data-toggle="tab" aria-expanded="true">Product Images</a></li>
							<li><a href="#tab_6" data-toggle="tab" aria-expanded="true">Product Video </a></li>
							<li><a href="#tab_3" data-toggle="tab" aria-expanded="true">Technical Spec </a></li>
							<li><a href="#tab_5" data-toggle="tab" aria-expanded="true">Inventory</a></li>
							<li><a href="#tab_4" data-toggle="tab" aria-expanded="true">SEO </a></li>
							<li><a href="#tab_7" data-toggle="tab" aria-expanded="true">Badges / Highlight </a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<?php include("edit-product/basic-info.php"); ?>
							</div>
							<div class="tab-pane" id="tab_2">
								<?php include("edit-product/product-images.php"); ?>
							</div>
							<div class="tab-pane" id="tab_3">
								<?php include("edit-product/tech-spec.php"); ?>
							</div>
							<div class="tab-pane" id="tab_4">
								<?php include("edit-product/seo-info.php"); ?>
							</div>
							<div class="tab-pane" id="tab_5">
								<?php include("edit-product/inventory.php"); ?>
							</div>
							<div class="tab-pane" id="tab_6">
								<?php include("edit-product/product-video.php"); ?>
							</div>
							<div class="tab-pane" id="tab_7">
								<?php include("edit-product/product-badges-highlights.php"); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</section>
	</div>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
	<script src="https://ckeditor.com/latest/ckeditor.js"></script>

	<script>
		$('.select2').select2();
		
		$('.update_product_data').submit(function(e){
			e.preventDefault();
			var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
			var tis = this;
			setTimeout(function(){
				if(is_required(this_id) === true)
				{
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
						success: function(response){
							console.log(response)
							if(response.result == 1)
							{
								toastr.success('Product updated!');
								$(this_id + ' button[type=submit]').removeAttr('disabled');
							}
							else
							{
								toastr.error('Something went wrong! Please try again later!');
								$(this_id + ' button[type=submit]').removeAttr('disabled');
							}
						}
					});
				}
				else
				{
					toastr.error('Please check the required fields!');
				}
			}, 1000);
		});
		$('.insert_product_image').submit(function(e){
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
				success: function(response){
					console.log(response)
					if(response.result == 1)
					{
						$(this_id)[0].reset();
						$('.uploaded').empty();
						$('.image-uploader').removeClass('has-files');
						toastr.success('Product images uploaded!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
						$('#product-add-images').load("<?=base_url()?>admin/product-additional-images/" + $('.insert_product_image input[name=product_id]').val());
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
					}
				}
			});
		});
		
		$('.insert_product_video').submit(function(e){
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
				success: function(response){
					console.log(response)
					if(response.result == 1)
					{
						$(this_id)[0].reset();
						$('.uploaded').empty();
						$('.image-uploader').removeClass('has-files');
						toastr.success('Product videos uploaded!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
						$('#product-add-videos').load("<?=base_url()?>admin/product-additional-videos/" + $('.insert_product_image input[name=product_id]').val());
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
					}
				}
			});
		});
		
		$('.update_tech_spec_data').submit(function(e){
			e.preventDefault();
			var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
			
			if(is_required(this_id) === true)
			{
				$.ajax({
					type: 'POST',
					url: baseURL + "admin/update_tech_spec",
					data: $(this_id).serialize(),
					dataType: "json",
					beforeSend: function() {
						$(this_id + ' input[type=submit]').attr('disabled', 'true');
					},
					success: function(response){
						console.log(response)
						if(response.result == 1)
						{
							toastr.success('Technical spec are updated!');
							$(this_id + ' input[type=submit]').removeAttr('disabled');
						}
						else
						{
							toastr.error('Something went wrong! Please try again later!');
							$(this_id + ' input[type=submit]').removeAttr('disabled');
						}
					}
				});
			}
			else
			{
				toastr.error('Please check the required fields!');
			}
		});
		
		function deleteimage(data_id)
		{
			if(confirm('Are you sure to delete this image from product details?') === true)
			{	
				$.ajax({
					type: 'POST',
					url: baseURL + "admin/update",
					data: 'row_id=' + data_id + '&table_name=tbl_product_images&status=1',
					dataType: "json",
					beforeSend: function() {
						$(this).attr('disabled', 'disabled');
					},
					success: function(response){
						if(response.result == 1)
						{
							toastr.success('Success!');
							$('#product-add-images').load("<?=base_url()?>admin/product-additional-images/" + $('.insert_product_image input[name=product_id]').val());
						}
						else
						{
							toastr.error('Something went wrong! Please try again later!');
							$('span[data-id=' + data_id + ']').removeAttr('disabled');
						}
					}
				});
			}
		}
		
		function addbtn()
		{
			$('#technical_spec').append('<div class="row">'+
											'<div class="col-sm-4">'+
												'<div class="form-group">'+
													'<label for="slug">Title <span class="text-danger">*</span></label>'+
													'<input type="hidden" value="0" name="spec_row_id[]">'+
													'<select class="form-control select2 tech_specs" name="spec_id[]">'+
														'<option value=""></option>'+
														'<?php foreach($technical_specifications as $technical_specification): ?>'+
														'	<option value="<?=$technical_specification->id?>"><?=$technical_specification->title?></option>'+
														'<?php endforeach; ?>'+
													'</select>'+
												'</div>'+
											'</div>'+
											'<div class="col-sm-5">'+
												'<div class="form-group">'+
													'<label for="slug">Description <span class="text-danger">*</span></label>'+
													'<input type="text" class="form-control" name="spec_description[]">'+
												'</div>'+
											'</div>'+
											'<div class="col-sm-1">'+
												'<div class="form-group">'+
													'<label for="slug">Order <span class="text-danger">*</span></label>'+
													'<input type="text" class="form-control" name="spec_description[]">'+
												'</div>'+
											'</div>'+
											'<div class="col-sm-2">'+
												'<label for="slug">&nbsp;</label><br>'+
												'<a class="btn btn-sm btn-danger" onclick="removebtn(this)"><i class="fa fa-trash"></i></a>'+
												'<a class="btn btn-sm btn-success" onclick="addbtn()"><i class="fa fa-plus"></i></a>'+
											'</div>'+
										'</div>');
			$('.select2').select2();
		}
		
		function removebtn(tis)
		{
			$(tis).parent().parent().remove();
		}
		
		$('.quick_insert_data').submit(function(e){
			e.preventDefault();
			var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
			if(is_required(this_id) === true)
			{
				$.ajax({
					type: 'POST',
					url: baseURL + "admin/insert",
					data: $(this_id).serialize(),
					dataType: "json",
					beforeSend: function() {
						$(this_id + ' input[type=submit]').attr('disabled', 'true');
					},
					success: function(response){
						console.log(response)
						if(response.result == 1)
						{
							$(this_id)[0].reset();
							var data = { id: response.insert_id, text: $(this_id + " input[name=title]").val() };
							var newOption = new Option(data.text, data.id, false, false);
							$('.tech_specs').append(newOption);
							toastr.success('Success!');
							$(this_id + ' input[type=submit]').removeAttr('disabled');
						}
						else
						{
							toastr.error('Something went wrong! Please try again later!');
							$(this_id + ' input[type=submit]').removeAttr('disabled');
						}
					}
				});
			}
			else
			{
				toastr.error('Please check the required fields!');
			}
		});
	</script>
	<script>
		CKEDITOR.replace( 'editor' , {
        filebrowserUploadUrl: 'ckeditor/ck_upload.php',
        filebrowserUploadMethod: 'form'
    });
		CKEDITOR.replace( 'editor1' , {
        filebrowserUploadUrl: 'ckeditor/ck_upload.php',
        filebrowserUploadMethod: 'form'
    });
		
		CKEDITOR.replace('editor2', {
        filebrowserUploadUrl: 'ckeditor/ck_upload.php',
        filebrowserUploadMethod: 'form'
    });
		CKEDITOR.editorConfig = function( config ) {
        	config.toolbar = [
        		{ name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
        		{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        		{ name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
        		'/',
        		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
        		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
        		{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
        		{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak' ] },
        		'/',
        		{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
        		{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
        		{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }
        	];
        };
	</script>
	<!-- image upload pack -->
	<script type="text/javascript" src="<?=base_url()?>assets/admin/js/image-uploader.min.js"></script>
	<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/image-uploader.min.css">
	<script>
		$(function () {
			$('.input-images-1').imageUploader({
				imagesInputName: 'file_name',
				extensions: ['.jpg','.jpeg','.png','.gif','.svg'],
				mimes: ['image/jpeg','image/png','image/gif','image/svg+xml'],
			});
		});
	</script>
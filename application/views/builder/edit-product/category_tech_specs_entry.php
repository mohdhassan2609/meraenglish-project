<?php
	
	$specs= array();
	$product_technical_specifications2 = array();
		foreach($technical_specifications as $technical_specification){
			if($technical_specification->master_id == $record->tech_master_id)
			{
				array_push($specs, $technical_specification);
			}
		}
		
		foreach($product_technical_specifications as $spec){
			if($spec->master_id == $record->tech_master_id) array_push($product_technical_specifications2,$spec);
		}
 ?>
 
 
<div class="row">
	<div class="col-md-12">
		<form this_id="form-00<?=uniqid()?>" class="update_category_tech_specs" method="post">
			<div id="category_technical_spec">
				<input type="hidden" value="<?=$record->id?>" name="row_id">
				<input type="hidden" value="<?=$record->tech_master_id?>" name="category_id">


			<?php 
			if($record->tech_master_id == '0'){ ?>
			<div>
				<span class="text-danger error-span">Please Select a Master Spec from Basic Info to Avail options</span>
			</div>
			<?php }
			else {
				if(sizeof($product_technical_specifications2) > 0){
				 $i = 1;
				 foreach($product_technical_specifications2 as $product_technical_specification){ ?>
					
					<div class="row">
						<div class="col-sm-5">
							<div class="form-group">

								<label for="slug" class="w-100">
									Title 
									<span class="text-danger">*</span>
									<span class="pull-right" data-toggle="modal" data-target="#add_tech_spec_modal">Add new</span>
								</label>

								<input type="hidden" value="<?=$product_technical_specification->id?>" name="spec_row_id[]">

								<select class="form-control select2 required tech_specs" name="spec_id[]">
									<option value=""></option>
									<?php foreach($specs as $spec){ ?>
										<option <?php if($spec->id == $product_technical_specification->technical_specification_id){ echo "selected"; } ?> value="<?php echo $spec->id ;?>"><?=$spec->title?></option>
									<?php } ?>
								</select>

							</div>
						</div>

						<div class="col-sm-5">
							<div class="form-group">
								<label for="slug">Description <span class="text-danger">*</span></label>
								<input type="text" value="<?=$product_technical_specification->description?>" class="form-control required" name="spec_description[]">
							</div>
						</div>

						<div class="col-sm-2">
							<label>&nbsp;</label><br>

							<?php if($i != 1): ?>
								<a class="btn btn-sm btn-danger" onclick="removebtn(this)"><i class="fa fa-trash"></i></a>
							<?php endif; ?>

							<a class="btn btn-sm btn-success" onclick="addbtn_category()"><i class="fa fa-plus"></i></a>
						</div>
					</div>

				<?php $i++;
				  } 
				}  
				else { 
				 foreach($specs as $outer_loop){ ?>
				<div class="row">
					<div class="col-sm-5">
						<div class="form-group">
					
							<label for="slug" class="w-100">
								Title 
								<span class="text-danger">*</span>
								<span class="pull-right" data-toggle="modal" data-target="#add_tech_spec_modal">Add new</span>
							</label>

							<input type="hidden" value="0" name="spec_row_id[]">

							<select class="form-control select2 tech_specs" required name="spec_id[]">
								<option value=""></option>
								<?php foreach($specs as $spec): ?>
									<option <?php if($outer_loop->id == $spec->id){ echo "selected"; }?> value="<?php echo $spec->id ;?>"><?=$spec->title?></option>
								<?php endforeach; ?>
							</select>

						</div>
					</div>

					<div class="col-sm-5">
						<div class="form-group">
							<label for="slug">Description <span class="text-danger">*</span></label>
							<input type="text" required class="form-control" name="spec_description[]">
						</div>
					</div>

					<div class="col-sm-2">
						<label for="slug">&nbsp;</label><br>
						<a class="btn btn-sm btn-success" onclick="addbtn_category()"><i class="fa fa-plus"></i></a>
					</div>

				</div>
			<?php } } }?>

			</div>
			<div class="row">
				<div class="col-md-12">
					<button type="submit" class="btn btn-primary pull-right" data-name="save_exit" onclick="setTimeout(function(){ window.location.assign('<?=base_url()?>admin/products'); }, 4000);">Save & Exit</button>
				    <button type="submit" class="btn btn-primary pull-right">Save & Continue</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="add_tech_spec_modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form this_id="form-00<?=uniqid()?>" class="quick_insert_data" method="post">
				<div class="modal-header">
					<h5 class="modal-title">Add Tech Spec</h5>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="slug">Title</label>
								<input type="text" class="form-control" name="title">
								<input type="hidden" value="tbl_technical_specifications" name="table_name">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>

$('.update_category_tech_specs').submit(function(e){
			e.preventDefault();
			var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
			
			if(is_required(this_id) === true)
			{
				$.ajax({
					type: 'POST',
					url: baseURL + "admin/update_category_tech_specs",
					data: $(this_id).serialize(),
					dataType: "json",
					beforeSend: function() {
						$(this_id + ' input[type=submit]').attr('disabled', 'true');
					},
					success: function(response){
						console.log(response.result);
						if(response.result == 1)
						{
							toastr.success('Category related Technical spec are updated!');
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

	function addbtn_category()
		{
			$('#category_technical_spec').append('<div class="row">'+
											'<div class="col-sm-5">'+
												'<div class="form-group">'+
													'<label for="slug">Title <span class="text-danger">*</span></label>'+
													'<input type="hidden" value="0" name="spec_row_id[]">'+
													'<select class="form-control select2 tech_specs" name="spec_id[]">'+
														'<option value=""></option>'+
														'<?php foreach($specs as $spec): ?>'+
														'	<option value="<?php echo $spec->id ;?>"><?=$spec->title?></option>'+
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
											'<div class="col-sm-2">'+
												'<label for="slug">&nbsp;</label><br>'+
												'<a class="btn btn-sm btn-danger" onclick="removebtn(this)"><i class="fa fa-trash"></i></a>'+
												'<a class="btn btn-sm btn-success" onclick="addbtn_category()"><i class="fa fa-plus"></i></a>'+
											'</div>'+
										'</div>');
			$('.select2').select2();
		}
</script>
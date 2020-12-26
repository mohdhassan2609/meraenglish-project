	<?php $record6=$this->common_model->get_records('tbl_builders_info', "status = '0' and id='$record->builders_info_id'")[0];?>

	<form this_id="form-00<?=uniqid()?>" class="update_data" method="post" role="form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="builders_name">Builders Name<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record6->builders_name?>" name="builders_name">
					<input type="hidden" value="tbl_builders_info" name="table_name">
					<input type="hidden" value="<?=$record->builders_info_id?>" name="row_id">
				
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="builders_image">Builders Image </label>
					<input type="file" name="builders_image" accept="image/x-png,image/gif,image/jpeg" class="form-control">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">                                
				<a target="_blank" href="<?=base_url()?>uploads/common/<?=$record6->builders_image?>">
					<img style="border: 1px solid #000;" width="100" height="100" src="<?=base_url()?>uploads/common/<?=$record6->builders_image?>">
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary pull-right" data-name="save_exit" onclick="setTimeout(function(){ window.location.assign('<?=base_url()?>builder/property'); }, 4000);">Save & Exit</button>
				<button type="submit" class="btn btn-primary pull-right">Save & Continue</button>
			</div>
		</div>
	</form>
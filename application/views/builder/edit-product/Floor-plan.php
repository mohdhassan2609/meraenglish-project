	<?php $record5=$this->common_model->get_records('tbl_floor_plans', "status = '0' and id='$record->floor_plans_id'")[0];?>
				
	<form this_id="form-00<?=uniqid()?>" class="builder_update_data" method="post" role="form" enctype="multipart/form-data">
		<div class="row">

		</div>
		<div class="row">
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="plan_image">Plan Image </label>
					<input type="file" name="plan_image" accept="image/x-png,image/gif,image/jpeg" class="form-control">
					<span class="text-danger error-span">This input is required.</span>
					<input type="hidden" value="tbl_floor_plans" name="table_name">
					<input type="hidden" value="<?=$record->floor_plans_id?>" name="row_id">
				
				</div>
			</div>
			<div class="col-md-6">                                
				<a target="_blank" href="<?=base_url()?>uploads/common/<?=$record5->plan_image?>">
					<img style="border: 1px solid #000;" width="100" height="100" src="<?=base_url()?>uploads/common/<?=$record5->plan_image?>">
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="plan_description">Plan Description <span class="text-danger">*</span></label>
					<textarea class="form-control required" id="editor" name="plan_description" rows="14" dir="ltr" ><?=$record5->plan_description?></textarea>
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary pull-right" data-name="save_exit" onclick="setTimeout(function(){ window.location.assign('<?=base_url()?>builder/property'); }, 4000);">Save & Exit</button>
				<button type="submit" class="btn btn-primary pull-right">Save & Continue</button>
			</div>
		</div>
	</form>

	<?php $record1=$this->common_model->get_records('tbl_property_location', "status = '0' and id='$record->location_id'")[0];?>
				
	<form this_id="form-00<?=uniqid()?>" class="builder_update_data" method="post" role="form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="location">Location<span class="text-danger">*</span></label>
					<?php $record_01=$this->common_model->get_records('tbl_locations', "status = '0' ");?>
					<select class="selectpicker w100 show-tick form-control" id="select" name="location">
						
						<?php foreach($record_01 as $record01):?>

							<option value="<?= $record01->id;?>" id="<?= $record01->id;?>" <?php if($record01->id==$record1->location){echo "selected";}?>><?= $record01->location_name;?></option>
						<?php endforeach;?>
					</select>

					<span class="text-danger error-span">This input is required.</span>
					<input type="hidden" value="tbl_property_location" name="table_name">
					<input type="hidden" value="<?=$record->location_id?>" name="row_id">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="sub_location">Sub Location<span class="text-danger">*</span></label>
					<?php $record_02=$this->common_model->get_records('tbl_sub_location', "status = '0' ");?>
					<select class="selectpicker w100 show-tick form-control"  name="sub_location">
						
						<?php foreach($record_02 as $record02):?>
							<option value="<?= $record02->id;?>" id="<?= $record02->id;?>" <?php if($record02->id==$record1->sub_location){echo "selected";}?>><?= $record02->sub_location_name;?></option>
						<?php endforeach;?>
					</select>

				</div>
			</div>
		</div>
		<div class="row">
			
			<div class="col-md-6">
				<div class="form-group">
					<label for="address">Address<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record1->address?>" name="address">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="state">State<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record1->state?>" name="state">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		<div class="row">
			
			<div class="col-md-6">
				<div class="form-group">
					<label for="city">City<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record1->city?>" name="city">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="neighborhood">neighborhood<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record1->neighborhood?>" name="neighborhood">
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

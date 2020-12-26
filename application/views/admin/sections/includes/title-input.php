<?php 
	$value = "";
	$row_id = 0;
	$rr = $this->common_model->get_records('tbl_common_inputs', "page_section_id = '" . $page_section_id . "' and option_name = '" . $option_name . "'");
	if(sizeof($rr) > 0):
		$row_id = $rr[0]->id;
		$value = $rr[0]->value;
	endif;
?>
	<form this_id="form-001-<?=uniqid()?>-<?=time()?>" class="update_in_data" method="post" role="form">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="slug"><?=$title?> <span class="text-danger">*</span></label>
						<input type="text" class="form-control required" value="<?=$value?>" name="value">
						<span class="text-danger error-span">This input is required.</span>
						<input type="hidden" value="tbl_common_inputs" name="table_name">
						<input type="hidden" value="<?=$row_id?>" name="row_id">
						<input type="hidden" value="<?=$page_section_id?>" name="page_section_id">
						<input type="hidden" value="<?=$option_name?>" name="option_name">
					</div>
				</div>
			</div>
			<input type="submit" class="btn btn-primary pull-right" value="Update" />
		</div>
	</form>
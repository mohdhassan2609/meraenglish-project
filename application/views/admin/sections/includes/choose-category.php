
	<?php
		if(sizeof($this->common_model->get_records('tbl_common_inputs', "page_section_id = '" . $page_section_id . "' and option_name = 'category_1'")) > 0)
		{
			
		}
		else
		{
			new_common_inputs_row($page_section_id, "category_1", $this);
		}
		
		$row_id = $this->common_model->get_record('tbl_common_inputs', "page_section_id = '" . $page_section_id . "' and option_name = 'category_1'", "id");
		$link = $this->common_model->get_record('tbl_common_inputs', "page_section_id = '" . $page_section_id . "' and option_name = 'category_1'", "value");
	?>

	<form this_id="form-6012-<?=uniqid()?>" class="update_data" method="post" role="form">
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="slug">Category <span class="text-danger">*</span></label>
						<?php $uniqid = uniqid(); ?>
						<select class="form-control required select2" name="value">
							<?php foreach($this->common_model->get_records("tbl_category", "status = '0' order by name asc") as $cat): ?>
								<option <?php if($cat->id == $value){ echo "selected"; } ?> value="<?=$cat->id?>"><?=ucfirst(html_entity_decode($cat->name))?></option>
							<?php endforeach; ?>
						</select>
						<span class="text-danger error-span">This input is required.</span>
						<input type="hidden" value="tbl_common_inputs" name="table_name">
						<input type="hidden" value="<?=$row_id?>" name="row_id">
					</div>
				</div>
			</div>
			<input type="submit" class="btn btn-primary pull-right" value="Submit" />
		</div>
	</form>

	<?php
		if(sizeof($this->common_model->get_records('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = '$grid'")) > 0)
		{
			
		}
		else
		{
			single_image_row($page_section_id, $grid, $this);
		}
		
		$row_id = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = '$grid'", "id");
		$link = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = '$grid'", "link");
		$image = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = '$grid'", "image");
		$text = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = '$grid'", "text");
		$text2 = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = '$grid'", "text2");
	?>

	<form this_id="form-6012-<?=uniqid()?>" class="update_data" method="post" role="form">
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="slug">
							Image <?php if(isset($image_size)){ echo $image_size; } ?>
							&nbsp;
							<a href="<?=base_url()?>uploads/common/<?=$image?>" target="_blank">View Current Image</a>
						</label>
						<input type="file" class="form-control" name="image">
						<span class="text-danger error-span">This input is required.</span>
						<input type="hidden" value="tbl_image_with_link" name="table_name">
						<input type="hidden" value="<?=$row_id?>" name="row_id">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="slug">Title <span class="text-danger">*</span></label>
						<input type="text" class="form-control required" value="<?=$text?>" name="text">
						<span class="text-danger error-span">This input is required.</span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="slug">Category <span class="text-danger">*</span></label>
						<?php $uniqid = uniqid(); ?>
						<select class="form-control required select2" multiple="multiple" value="<?=$text2?>" id="category_replace_<?=$uniqid?>">
							<?php foreach($this->common_model->get_records("tbl_category", "status = '0' order by name asc") as $cat): ?>
								<option <?php if(in_array($cat->id, explode(',', $text2))){ echo "selected"; } ?> value="<?=$cat->id?>"><?=ucfirst(html_entity_decode($cat->name))?></option>
							<?php endforeach; ?>
						</select>
						<span class="text-danger error-span">This input is required.</span>
						<input type="hidden" value="<?=$text2?>" name="text2">
					</div>
				</div>
			</div>
			<input type="submit" class="btn btn-primary pull-right" value="Submit" onclick="$('input[name=text2]').val($('#category_replace_<?=$uniqid?>').val())" />
		</div>
	</form>
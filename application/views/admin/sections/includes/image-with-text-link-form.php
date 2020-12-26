<form role="form" action="<?php echo base_url() ?>admin/add_category_post" this_id="form-602-<?=uniqid()?>" class="insert_data" method="post" role="form">
	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="slug">Image <span class="text-danger">*</span></label>
					<input type="file" class="form-control required" name="image">
					<span class="text-danger error-span">This input is required.</span>
					<input type="hidden" value="tbl_image_with_link" name="table_name">
					<input type="hidden" value="<?=$page_section_id?>" name="page_section_id">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="slug">Link <span class="text-danger">*</span></label>
					<input type="text" class="form-control required" name="link">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="slug">Text</label>
					<input type="text" class="form-control" name="text">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		<input type="submit" class="btn btn-primary pull-right" value="Submit" />
	</div>
</form>
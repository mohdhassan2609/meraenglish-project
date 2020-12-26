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
			<div class="col-md-6">
				<div class="form-group">
					<label for="slug">Link <span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$link?>" name="link">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		<input type="submit" class="btn btn-primary pull-right" value="Submit" />
	</div>
</form>
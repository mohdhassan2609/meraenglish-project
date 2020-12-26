<table class="table table-responsive">
	<tr>
		<th>Sl. No.</th>
		<th>Image</th>
		<th>Name</th>
		<th>Designation</th>
		<th>Comment</th>
		<th>Action</th>
	</tr>
	<?php $i=1; ?>
	<?php foreach($this->common_model->get_records('tbl_testimonial', "page_section_id = '" . $page_section_id . "'") as $record): ?>
		<tr>
			<td><?=$i?></td>
			<td><a href="<?=base_url()?>uploads/common/<?=$record->image?>" target="_blank">View Image</a></td>
			<td><input type="text" class="form-control required" value="<?=$record->name?>"></td>
			<td><input type="text" class="form-control required" value="<?=$record->sub_text?>"></td>
			<td><input type="text" class="form-control required" value="<?=$record->comment?>"></td>
			<td><span class="pull-right btn btn-sm btn-danger" onclick="delete_testimonial('tbl_testimonial', '<?=$record->id?>', this"><i class="fa fa-close"></i></span></td>
		</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
</table>
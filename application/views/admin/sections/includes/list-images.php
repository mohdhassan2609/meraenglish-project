<table class="table table-responsive">
	<tr>
		<th>Sl. No.</th>
		<th>Desktop Image</th>
		<th>Mobile Image</th>
		<th>Link</th>
		<th>Action</th>
	</tr>
	<?php $i=1; ?>
	<?php if(isset($grid)){ $grid = $grid; }else{ $grid = "grid_1"; } ?>
	<?php if(sizeof($this->common_model->get_records('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = '$grid'")) > 0): ?>
		<?php foreach($this->common_model->get_records('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = '$grid'") as $record): ?>
			<tr>
				<td><?=$i?></td>
				<td><a href="<?=base_url()?>uploads/common/<?=$record->image?>" target="_blank">View Image</a></td>
				<td><a href="<?=base_url()?>uploads/common/<?=$record->image_1?>" target="_blank">View Image</a></td>
				<td><input type="text" class="form-control required" value="<?=$record->link?>" name="link"></td>
				<td><span class="pull-right btn btn-sm btn-danger" onclick="deleteBtn('tbl_image_with_link', 'id=<?=$record->id?>', this, '<?=base_url()?>uploads/common/<?=$record->image?>', '<?=base_url()?>uploads/common/<?=$record->image_1?>')"><i class="fa fa-close"></i></span></td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
	<?php else: ?>
			<tr>
				<td colspan="5" class="text-center">No records</td>
			</tr>
	<?php endif; ?>
</table>
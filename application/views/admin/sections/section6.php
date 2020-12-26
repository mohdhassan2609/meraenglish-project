<div class="box box-primary">
	<div class="row">
		<div class="col-md-12 text-center">
			<h3>Guide</h3>
		</div>
	</div>
	
	<div class="box-body">
		<img src="<?=base_url()?>uploads/sections/<?=$this->common_model->get_record('tbl_sections', "section_code='$section_code'", "guide_image")?>" class="w--100">
	</div>
</div>

<?php $arr = array(); ?>

<div class="box box-primary">
	<div class="row">
		<div class="col-md-12">
			<h3><img src="<?=base_url()?>uploads/numbers/1.jpg" width="50"> Slider</h3>
			<hr>
		</div>
	</div>
	
		<?php
			$arr['page_section_id'] = $page_section_id;
			$arr['image_size'] = "770 x 331 px";
			$arr['grid'] = "grid_1";
			$tis->load->view('admin/sections/includes/image-upload-form.php', $arr); 
		?>
		
	<div class="box-body" data-table="tbl_image_with_link" data-page-section-id="<?=$page_section_id?>">
		<?php
			$arr1['page_section_id'] = $page_section_id;
			$arr1['grid'] = "grid_1";
			$tis->load->view('admin/sections/includes/list-image.php', $arr1); 
		?>
	</div>
</div>

<?php $arr = array(); ?>

<div class="box box-primary">
	<div class="row">
		<div class="col-md-12">
			<h3><img src="<?=base_url()?>uploads/numbers/2.jpg" width="50"> Advertisement</h3>
			<hr>
		</div>
	</div>
	
	<div class="box-body">
		<?php
			$arr['page_section_id'] = $page_section_id;
			$arr['image_size'] = "370 x 150 px";
			$arr['grid'] = "grid_2";
			if(sizeof($this->common_model->get_records('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = 'grid_2'")) > 0)
			{
				$arr['row_id'] = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = 'grid_2'", "id");
				$arr['link'] = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = 'grid_2'", "link");
				$arr['image'] = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = 'grid_2'", "image");
				$tis->load->view('admin/sections/includes/update-single-image-upload-form.php', $arr); 
			}
			else
			{
				single_image_row($page_section_id, 'grid_2', $this);
				$arr['row_id'] = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = 'grid_2'", "id");
				$arr['link'] = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = 'grid_2'", "link");
				$arr['image'] = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = 'grid_2'", "image");
				$tis->load->view('admin/sections/includes/update-single-image-upload-form.php', $arr); 
			}
		?>
	</div>
</div>

<?php $arr = array(); ?>

<div class="box box-primary">
	<div class="row">
		<div class="col-md-12">
			<h3><img src="<?=base_url()?>uploads/numbers/3.jpg" width="50"> Advertisement</h3>
			<hr>
		</div>
	</div>
	
	<div class="box-body">
		<?php
			$arr['page_section_id'] = $page_section_id;
			$arr['image_size'] = "370 x 150 px";
			$arr['grid'] = "grid_3";
			if(sizeof($this->common_model->get_records('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = 'grid_3'")) > 0)
			{
				$arr['row_id'] = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = 'grid_3'", "id");
				$arr['link'] = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = 'grid_3'", "link");
				$arr['image'] = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = 'grid_3'", "image");
				$tis->load->view('admin/sections/includes/update-single-image-upload-form.php', $arr); 
			}
			else
			{
				single_image_row($page_section_id, 'grid_3', $this);
				$arr['row_id'] = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = 'grid_3'", "id");
				$arr['link'] = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = 'grid_3'", "link");
				$arr['image'] = $this->common_model->get_record('tbl_image_with_link', "page_section_id = '" . $page_section_id . "' and grid = 'grid_3'", "image");
				$tis->load->view('admin/sections/includes/update-single-image-upload-form.php', $arr); 
			}
		?>
	</div>
</div>

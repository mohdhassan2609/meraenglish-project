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
			<h3><img src="<?=base_url()?>uploads/numbers/1.jpg" width="50"> Choose Category</h3>
			<hr>
		</div>
	</div>
	
	<div class="box-body">
		<?php
			$arr['page_section_id'] = $page_section_id;
			$arr['image_size'] = "300 x 400 px";
			$arr['grid'] = "grid_2";
			$tis->load->view('admin/sections/includes/choose-category.php', $arr); 
		?>
	</div>
</div>

<?php $arr = array(); ?>

<div class="box box-primary">
	<div class="row">
		<div class="col-md-12">
			<h3><img src="<?=base_url()?>uploads/numbers/2.jpg" width="50"> Slider</h3>
			<hr>
		</div>
	</div>
	
		<?php
			$arr['page_section_id'] = $page_section_id;
			$arr['image_size'] = "263 x 629 px";
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
			<h3><img src="<?=base_url()?>uploads/numbers/3.jpg" width="50"> Choose Products</h3>
			<hr>
		</div>
	</div>
	
	<div class="box-body">
		<?php
			$arr['page_section_id'] = $page_section_id;
			$arr['image_size'] = "300 x 400 px";
			$arr['grid'] = "grid_3";
			$tis->load->view('admin/sections/includes/choose-products.php', $arr); 
		?>
	</div>
</div>

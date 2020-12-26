<div class="row">
	<!-- left column -->
	<div class="col-md-12">
	  <!-- general form elements -->
		
		<div class="box box-primary">
			<div class="box-header text-center">
				<h4>Product Additional Images </h4>
			</div>
			<div class="box-body">
				<div class="row">
					<?php $inv = 1; ?>
					<?php 
						
							$product_images = $this->common_model->get_records("tbl_property_images", "id='" . $property->property_image_id. "' and status = '0'"); 
						
					?>
					<?php foreach($product_images as $product_image): ?>
						<div class="col-md-4 text-center">
							<form class="padding--15 allborder-ddd builder_update_data" onsubmit="return false;">
								<?php $imgs=explode(",",$product_image->image); ?>
                        		<?php foreach($imgs as $img):?>
                        
								<a target="_blank" href="<?=base_url()?>uploads/common/<?=$img?>">
									<img class="w--100" src="<?=base_url()?>uploads/common/<?=$img?>">
								
								</a>
								<?php endforeach;?>
								<br>
								<br>

								<?php $imgs=explode(",",$product_image->attachment); ?>
                        		<?php foreach($imgs as $img):?>
								<a target="_blank" href="<?=base_url()?>uploads/common/<?=$attachment?>">
								
								<div class="text-left">
									<label>Image Alt Text</label>
									<input class="w--100 form-control" value="<?=$product_image->alt?>" type="text" name="alt" placeholder="Image Alt Text">
									<label>Replace image</label>
									<input class="w--100 form-control" type="file" name="image[]" multiple="multiple">
									<input type="hidden" value="tbl_property_images" name="table_name">
									<input type="hidden" value="<?=$product_image->id?>" name="row_id">
									<br>
								</div>
								<button type="submit" class="btn btn-sm btn-success">Save</button>
								<span class="btn btn-sm btn-danger" onclick="deleteimage('<?=$product_image->id?>')">Remove</span>
							</form>
						</div>
						<?php
							if(($inv%3) == 0)
							{
								echo '</div>';
								echo '<hr>';
								echo '<div class="row">';
							}
						?>
					<?php $inv++; ?>
					<?php endforeach; ?>
				</div>
				
				<?php if(sizeof($product_images) < 1): ?>
					<div class="row">
						<div class="col-md-12 text-center">
							No records.
						</div>
					</div>
				<?php endif; ?>
				
			</div>
		</div>
	</div>
</div>  
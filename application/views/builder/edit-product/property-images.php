<?php 	$product_image = $this->common_model->get_records("tbl_property_images", "id='" . $record->property_image_id. "' and status = '0'")[0]; 
						
					?>
<form this_id="form-00<?=uniqid()?>" class="builder_image_data" method="post" role="form" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12">                                
			<div class="form-group">

				<label for="name">Banner Image<span class="text-danger">*</span> (400px x 400px preferred)</label>
					<div class="text-left">
									   <input type="file" class="w--100 form-control" id="banner" name="banner" >
                                    <br><br>
									<label for="name">Profile Image<span class="text-danger">*</span> (400px x 400px preferred)</label>                         
									<input class="w--100 form-control" type="file" name="profile_image" ><br>
									<label for="name">Gallery Images <span class="text-danger">*</span> (400px x 400px preferred)</label>
									<input class="w--100 form-control" type="file" name="userfile[]" multiple="multiple"><br>
									<label for="name">Attachments <span class="text-danger">*</span> (400px x 400px preferred)</label>
									<input class="w--100 form-control" type="file" name="file[]" multiple="multiple">
							
								</div>
							
				<div class="input-images-1" style="padding-top: .5rem;"></div>
				<input type="hidden" value="tbl_property_images" name="table_name">
				<input type="hidden" value="<?=$product_image->id?>" name="row_id">
				<span class="text-danger error-span">This input is required.</span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">                                
		    <button type="submit" class="btn btn-primary pull-right" data-name="save_exit" onclick="setTimeout(function(){ window.location.assign('<?=base_url()?>builder/property'); }, 4000);">Save & Exit</button>
			<button type="submit" class="btn btn-primary pull-right">Save & Continue</button>
			<br>
			<br>
		</div>
	</div>
</form>
<div class="row">
	<div class="col-md-12">                                
		<div id="product-add-images">
				<div class="col-md-4 text-center">
					<label>Banner Image</label>
								<a target="_blank" href="<?=base_url()?>uploads/common/<?=$product_image->banner_image?>">
									<img class="w--100" src="<?=base_url()?>uploads/common/<?=$product_image->banner_image?>" style="height: 200px;width: 400px;">
								
								</a>

								<br>
								<br>

					
						<label>Profile Image</label>
								<a target="_blank" href="<?=base_url()?>uploads/common/<?=$product_image->profile_image?>">
									<img class="w--100" src="<?=base_url()?>uploads/common/<?=$product_image->profile_image?>" style="height: 200px;width: 400px;">
								
								</a>

								<br>
								<br>

								
		</div>
						<div class="col-md-4 text-center">
						
						<label>Gallery Images</label>
								<?php $imgs=explode(",",$product_image->image); ?>
                        		<?php foreach($imgs as $img):?>
                        
								<a target="_blank" href="<?=base_url()?>uploads/common/<?=$img?>">
									<img class="w--100" src="<?=base_url()?>uploads/common/<?=$img?>" style="height: 200px;width: 400px;">
								
								</a>
								<?php endforeach;?>
								<br>
								<br>

								<?php $attachments=explode(",",$product_image->attachment); ?>
                        		<?php foreach($attachments as $attachment):?>
								<a target="_blank" href="<?=base_url()?>uploads/common/<?=$attachment?>">Attachment</a>
								<?php endforeach;?>
		</div>
	</div>
</div></div>
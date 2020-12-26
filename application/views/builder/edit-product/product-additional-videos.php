<div class="row">
	<!-- left column -->
	<div class="col-md-12">
	  <!-- general form elements -->
		
		<div class="box box-primary">
			<div class="box-header text-center">
				<h4>Product Additional Videos </h4>
			</div>
			<div class="box-body">
				<div class="row">
					<?php $inv = 1; ?>
					<?php 
						if(!isset($product_videos))
						{
							//$product_videos = $this->common_model->get_records("tbl_product_videos", "product_id='" . $product_id . "' and status = '0'"); 
						}
					?>
					<?php foreach($product_videos as $product_video): ?>
						<div class="col-md-4 text-center">
							<form class="padding--15 allborder-ddd update_data" onsubmit="return false;">
								<a target="_blank" href="<?=base_url()?>uploads/common/<?=$product_video->thumbnail_image?>">
									<img class="w--100" src="<?=base_url()?>uploads/common/<?=$product_video->thumbnail_image?>">
								</a>
								<br>
								<br>
								<div class="text-left">
									<label>Video Link</label>
									<input class="w--100 form-control" value="<?=$product_video->video_link?>" type="text" name="video_link" placeholder="Image Alt Text">
									<label>Replace image</label>
									<input class="w--100 form-control" type="file" name="thumbnail_image">
									<input type="hidden" value="tbl_product_videos" name="table_name">
									<input type="hidden" value="<?=$product_video->id?>" name="row_id">
									<br>
								</div>
								<button type="submit" class="btn btn-sm btn-success">Save</button>
							</form>
							<form class="padding--15 allborder-ddd update_data" onsubmit="return false;">
								<input type="hidden" value="1" name="status">
								<input type="hidden" value="tbl_product_videos" name="table_name">
								<input type="hidden" value="<?=$product_video->id?>" name="row_id">
								<button class="btn btn-sm btn-danger" type="submit">Remove</button>
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
				
				<?php if(sizeof($product_videos) < 1): ?>
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
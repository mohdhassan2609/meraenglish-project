
	<?php $rr2 = $this->common_model->get_records('tbl_front_listing', "page_section_id = '" . $page_section_id . "' and tab_name = '" . $tab_name . "'"); ?>
	<?php if(sizeof($rr2) > 0): ?>
	
	<?php else: ?>
		<?php 
			$inffo['page_section_id'] = $page_section_id;
			$inffo['tab_name'] = $tab_name;
			$inffo['category'] = "0";
			$inffo['sub_category'] = "0";
			$inffo['child_category'] = "0";
			$inffo['product'] = "0";
			$inffo['brand'] = "0";
			
			$this->common_model->insert('tbl_front_listing', $inffo);
			$rr2 = $this->common_model->get_records('tbl_front_listing', "page_section_id = '" . $page_section_id . "' and tab_name = '" . $tab_name . "'");
		?>
	<?php endif; ?>
	<form this_id="form-602-<?=uniqid()?>-<?=time()?>" class="update_product_listing_data" method="post" role="form">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">                                
					<div class="form-group">
						<label for="name"> Category</label>
						<select class="form-control arr" name="category">
							<option value="0">Select Category</option>
							<?php foreach($this->common_model->get_records('tbl_category', 'status = 0') as $record): ?>
								<option <?php if($record->id == $rr2[0]->category){ echo "selected"; } ?> value="<?=$record->id?>"><?=$record->name?></option>
							<?php endforeach; ?>
						</select>
						<span class="text-danger error-span aerror-span">Please select anyone of these!</span>
						<input type="hidden" value="tbl_front_listing" name="table_name">
						<input type="hidden" value="<?=$rr2[0]->id?>" name="row_id">
					</div>
				</div>
				<hr>
					<div class="col-md-12 text-center">
						<b>(OR)</b>
					</div>
				<hr>
				<div class="col-md-12">                                
					<div class="form-group">
						<label for="name"> Sub Category </label>
						<select class="form-control arr" name="sub_category">
							<option value="0">Select Sub Category</option>
							<?php foreach($this->common_model->get_records('tbl_sub_category', 'status = 0') as $record): ?>
								<option <?php if($record->id == $rr2[0]->sub_category){ echo "selected"; } ?> value="<?=$record->id?>"><?=$record->name?></option>
							<?php endforeach; ?>
						</select>
						<span class="text-danger error-span aerror-span">Please select anyone of these!</span>
					</div>
				</div>
				<hr>
					<div class="col-md-12 text-center">
						<b>(OR)</b>
					</div>
				<hr>
				<div class="col-md-12">                                
					<div class="form-group">
						<label for="name"> Child Category</label>
						<select class="form-control arr" name="child_category">
							<option value="0">Select Child Category</option>
							<?php foreach($this->common_model->get_records('tbl_child_category', 'status = 0') as $record): ?>
								<option <?php if($record->id == $rr2[0]->child_category){ echo "selected"; } ?> value="<?=$record->id?>"><?=$record->name?></option>
							<?php endforeach; ?>
						</select>
						<span class="text-danger error-span aerror-span">Please select anyone of these!</span>
					</div>
				</div>
				<hr>
					<div class="col-md-12 text-center">
						<b>(OR)</b>
					</div>
				<hr>
				<div class="col-md-12">                                
					<div class="form-group">
						<label for="name"> Products</label>
						<select class="form-control arr select2" multiple="multiple" name="product_1">
						<?php $sps = explode(",", $rr2[0]->product); ?>
							<?php foreach($this->common_model->get_records('tbl_product', "status = '0' and product_status = 'approved'") as $record): ?>
								<?php foreach($sps as $sp): ?>
									<option <?php if($record->id == $sp){ echo "selected"; } ?> value="<?=$record->id?>"><?=$record->name?></option>
								<?php endforeach; ?>
							<?php endforeach; ?>
						</select>
						<span class="text-danger error-span aerror-span">Please select anyone of these!</span>
					</div>
				</div>
			</div>
			<input type="submit" class="btn btn-primary pull-right" value="update" />
		</div>
	</form>
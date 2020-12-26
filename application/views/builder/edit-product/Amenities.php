
	<form this_id="form-00<?=uniqid()?>" class="update_data_amenities" method="post" role="form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">

							
					 	<?php $records_1=$this->common_model->get_records('tbl_amenities', "status = '0'");?>
					 	<?php $amn=explode(",",$record->ameneties);?>
					
						<?php foreach($records_1 as $record1):?>
							<ul>	
							<input type="checkbox"  id="<?php echo $record1->id;?>" name="amenities[]" value="<?php echo $record1->id;?>" <?php foreach($amn as $am):?><?php if($record1->id==$am){echo "checked";}?><?php endforeach;?>>

							<label  for="<?php echo $record1->id;?>"><?=$record1->name;?></label>
</ul>
			
						<?php endforeach;?>


				     <input type="hidden" value="<?=$record->id?>" name="id">
				

				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary pull-right" data-name="save_exit" onclick="setTimeout(function(){ window.location.assign('<?=base_url()?>builder/property'); }, 4000);">Save & Exit</button>
				<button type="submit" class="btn btn-primary pull-right">Save & Continue</button>
			</div>
		</div>
	</form>
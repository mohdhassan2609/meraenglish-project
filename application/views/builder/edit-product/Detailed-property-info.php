	<?php $record3=$this->common_model->get_records('tbl_detailed_property_info', "status = '0' and id='$record->detailed_property_info_id'")[0];?>
				
	<form this_id="form-00<?=uniqid()?>" class="builder_update_data" method="post" role="form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="property_id">Property ID<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record3->property_id?>" name="property_id" disabled>
					<span class="text-danger error-span">This input is required.</span>

					<input type="hidden" value="tbl_detailed_property_info" name="table_name">
					<input type="hidden" value="<?=$record->detailed_property_info_id?>" name="row_id">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="area_size">Area Size<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record3->area_size?>" name="area_size">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					   <label>.</label>
                         <select class="selectpicker form-control " data-live-search="true" data-width="100%" name="size_prefix" >
                         	<option value="<?=$record3->size_prefix?>" selected><?=$record3->size_prefix?></option>
                                  <option value="sqft">Sq-ft
                                  </option>
                                  <option value="acre">acre
                                  </option>
                                  <option value="perch">perch
                                    </option>
                          </select>

					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="landarea">Land Area<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record3->landarea?>" name="landarea">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">					   
					<label>.</label>
                         <select class="selectpicker form-control " data-live-search="true" data-width="100%" name="landarea_size_postfix" >
                         	<option value="<?=$record3->landarea_size_postfix?>" selected><?=$record3->landarea_size_postfix?></option>
                                  <option value="sqft">Sq-ft
                                  </option>
                                  <option value="acre">acre
                                  </option>
                                  <option value="perch">perch
                                    </option>
                          </select>

					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="bedrooms">Bedrooms<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record3->bedrooms?>" name="bedrooms">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="bathrooms">Bathrooms<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record3->bathrooms?>" name="bathrooms">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="balconies">Balconies<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record3->balconies?>" name="balconies">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="is_your_property">Is Your Property<span class="text-danger">*</span></label>
					<select class="selectpicker w100 show-tick form-control" id="select" name="is_your_property">
							<option value="<?=$record3->is_your_property?>" selected><?=$record3->is_your_property?></option>
							<option value="Furnished">Furnished</option>
							<option value="Semi-Furnished">Semi-Furnished</option>
							<option value="Unfurnished">Unfurnished</option>
					
					</select>

					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="floor_no">Floor Number<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record3->floor_no?>" name="floor_no">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="total_floors">Total Floors<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record3->total_floors?>" name="total_floors">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>

			<div class="col-md-6">                                
				<div class="form-group">
					<label for="car_parking_area">Car Parking Area<span class="text-danger">*</span></label>
					<select class="selectpicker w100 show-tick form-control" id="select" name="car_parking_area">
							<option value="<?=$record3->car_parking_area?>" selected><?=$record3->car_parking_area?></option>
							<option value="Open Space">Open Space</option>
							<option value="Covered Area">Covered Area</option>
							<option value="Not Applicable">Not Applicable</option>
					</select>

					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="no_of_car_parking">No. of Car Parking Area<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record3->no_of_car_parking?>" name="no_of_car_parking">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="garages">Garages<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record3->garages?>" name="garages">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="garages_size">Garage Size<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record3->garages_size?>" name="garages_size">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="transaction_type">Transaction Type<span class="text-danger">*</span></label>
					<select class="selectpicker w100 show-tick form-control" id="select" name="transaction_type">
								<option value="<?=$record3->transaction_type?>" selected><?=$record3->transaction_type?></option>
								<option value="New Property">New Property</option>
								<option value="Resale">Resale</option>
											
					</select>

					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="possession_status">Possession Status<span class="text-danger">*</span></label>
					<select class="selectpicker w100 show-tick form-control" id="s" name="possession_status">
						<option value="<?=$record3->possession_status?>" selected><?=$record3->possession_status?></option>
						<option value="Under Construction">Under Construction</option>
						<option value="Ready to Move">Ready to Move</option>
					
					</select>

					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6" id="month">                                
				<div class="form-group">
					<label for="available_from">Available From<span class="text-danger">*</span></label>
					<select class="selectpicker w100 show-tick form-control"  name="month_a">
						<option value="<?=$record3->month_a?>" selected><?=$record3->month_a?></option>
						<option value="">Select month</option>
						<option value="1">1</option>
						<option value="2">2</option>
					</select>

					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6" id="year">                                
				<div class="form-group">
					<label for="available_from"></label>
					<select class="selectpicker w100 show-tick form-control"  name="year_a">
						
						<option value="">Select year</option>
						<option value="<?=$record3->year_a?>" selected><?=$record3->year_a?></option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
					</select>

					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6" id="age" style="display:none">                                
				<div class="form-group">
					<label for="age_of_construction">Age of Construction</label>
					<select class="selectpicker w100 show-tick form-control"  name="age_of_construction">
						<option value="<?=$record3->age_of_construction?>" selected><?=$record3->age_of_construction?></option>
						<option value="">Select Age of Construction</option>
						<option value="5 to 10 years">5 to 10 years</option>
						<option value="above 10 years">above 10 years</option>	
					</select>

					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="year_built">Year Built<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record3->year_built?>" name="year_built">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="virtual_tour">360 Virtual Tour<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record3->virtual_tour?>" name="virtual_tour">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			   <div class="col-md-6">
                         <div class="form-group">
                                 <label for="map">Location URL</label>
                                  <input type="text" class="form-control required" value="<?=$record3->map?>"  name="map">
                            </div>
                </div>
                                             
			<?php $url=explode(",",$record3->video_url);?>
			   <div class="col-6">
                                                                <div class="form-group">
                                                                       <label for="url1">VideoURL-1</label>
                                                                        <input type="text" class="form-control"  name="video_url[]"  value="<?=$url[0]?>">
                                                                </div>
                                                                </div>
                                                                   <div class="col-6">
                                                                <div class="form-group ">
                                                                       <label for="url2">VideoURL-2</label>
                                                                        <input type="text" class="form-control"  name="video_url[]"  value="<?=$url[1]?>">
                                                                </div>                                                                </div>
                                                                   <div class="col-6">
                                                                <div class="form-group">
                                                                       <label for="url3">VideoURL-3</label>
                                                                        <input type="text" class="form-control"  name="video_url[]"  value="<?=$url[2]?>">
                                                                </div></div>
                                                                   <div class="col-6">
                                                              <div class="form-group ">
                                                                       <label for="url4">VideoURL-4</label>
                                                                        <input type="text" class="form-control"  name="video_url[]"  value="<?=$url[3]?>">
                                                                </div>
                                                                </div>
                                                                
		           <div class="col-12">
                                                                <div class="form-group">
                                                                      <label for="whatsnearby"><b>What's Nearby</b> </label>
                                                                </div>
                                                                </div>
                                                                   <div class="col-6">
                                                                <div class="form-group">
                                                                       <label for="education">Education</label>
                                                                        <input type="text" class="form-control"  name="education" placeholder="Enter the different places seperated by comma" value="<?=$record3->education?>">
                                                                </div>
                                                                </div>
                                                                   <div class="col-6">
                                                                <div class="form-group">
                                                                       
                                                                    <label for="edistance">Distance in miles</label>
                                                                    <input type="text" class="form-control"  name="edistance" value="<?=$record3->edistance?>">
                                                                                        </div>
                                                                </div>
                                                                   <div class="col-6">
                                                                <div class="form-group">
                                                                        <label for="Health">Health & Medical</label>
                                                                         <input type="text" class="form-control"  name="health" placeholder="Enter different places seperated by comma" value="<?=$record3->health?>">
                                                                </div>
                                                                </div>
                                                                   <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="hdistance">Distance in miles</label>
                                                                    <input type="text" class="form-control"  name="hdistance" value="<?=$record3->hdistance?>">
                                                                </div>
                                                                </div>
                                                                   <div class="col-6">
                                                                <div class="form-group">
                                                                       
                                                                        <label for="transport">Transportation</label>
                                                                        <input type="text" class="form-control"  name="transport" placeholder="Enter different places seperated by comma" value="<?=$record3->transport?>">
                                                                                            </div>
                                                                </div>
                                                                   <div class="col-6">
                                                                <div class="form-group">
                                                                       <label for="tdistance">Distance in miles</label>
                                                                        <input type="text" class="form-control"  name="tdistance" value="<?=$record3->tdistance?>">
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


<script src="<?php echo base_url()?>assets/front/js/jquery-3.3.1.js"></script>
<script>
        $("#s").change(function(){
        if($(this).val()=="Ready to Move")
        {
            $("#age").show();
            $("#month").hide();

            $("#year").hide();
        }
        else
        {
            $("#age").hide();
            $("#month").show();

            $("#year").show();
        }
    });

</script>
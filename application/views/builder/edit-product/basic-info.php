	<form this_id="form-00<?=uniqid()?>" class="builder_update_data" method="post" role="form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="property_name">Property Name<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record->property_name?>" name="property_name">
					<span class="text-danger error-span">This input is required.</span>
					<input type="hidden" value="tbl_property_details" name="table_name">
					<input type="hidden" value="<?=$record->id?>" name="row_id">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="price">Price<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record->price?>" name="price">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		<div class="row">
			
			<div class="col-md-6">
				<div class="form-group">
					<label for="area">Area<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record->area?>" name="area">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="sqft">Sqft<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record->sqft?>" name="sqft">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		<div class="row">
			
			<div class="col-md-6">
				<div class="form-group">
					<label for="rooms">Rooms<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record->rooms?>" name="rooms">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="RERA_ID">RERA_ID<span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record->RERA_ID?>" name="RERA_ID">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			
		
			<div class="col-md-6">
				<div class="form-group">
					<label for="property_status">Property Status<span class="text-danger">*</span></label>
					<?php $records_1=$this->common_model->get_records('tbl_master', "status = '0' ");?>
					<select class="selectpicker w100 show-tick form-control"  name="property_status" id="select_status">
						
						<?php foreach($records_1 as $record1):?>
							<option value="<?= $record1->id;?>" id="<?= $record1->id;?>" <?php if($record1->id==$record->property_status){echo "selected";}?>><?= $record1->property_status;?></option>
						<?php endforeach;?>
					</select>

				</div>
			</div>
		
			<div class="col-md-6">
				<div class="form-group">
					<label for="property_type">Property Type<span class="text-danger">*</span></label>
					<?php $records_2=$this->common_model->get_records('tbl_property_type', "status = '0' ");?>
					<select class="selectpicker w100 show-tick form-control"  name="property_type" id="select_type">
						
						<?php foreach($records_2 as $record2):?>
							<option value="<?= $record2->id;?>" id="<?= $record2->id;?>" <?php if($record2->id==$record->property_type){echo "selected";}?>><?= $record2->property_type_name;?></option>
						<?php endforeach;?>
					</select>

				</div>
			</div>
<div class="col-md-6">
				<div class="form-group">
					<label for="category">Category<span class="text-danger">*</span></label>
					<?php $record_00=$this->common_model->get_records('tbl_category', "status = '0' ");?>
					<select class="selectpicker w100 show-tick form-control"  name="category_id" id="select_category">
						
						<?php foreach($record_00 as $record0):?>
							<option value="<?= $record0->id;?>" id="<?= $record0->id;?>" <?php if($record0->id==$record->category_id){echo "selected";}?>><?= $record0->property_category;?></option>
						<?php endforeach;?>
					</select>

				</div>
			</div>
		<div class="col-md-6">
				<div class="form-group">
					<label for="subcategory">Sub Category<span class="text-danger">*</span></label>
					<?php $record_00=$this->common_model->get_records('tbl_subcategory', "status = '0' ");?>
					<select class="selectpicker w100 show-tick form-control"  name="subcategory_id"
                                                            id="select_subcategory">
						
						<?php foreach($record_00 as $record0):?>
							<option value="<?= $record0->id;?>" id="<?= $record0->id;?>" <?php if($record0->id==$record->subcategory_id){echo "selected";}?>><?= $record0->property_subcategory;?></option>
						<?php endforeach;?>
					</select>

				</div>
			</div>
		<div class="col-md-6">
				<div class="form-group">
					<label for="built">Built Up Area<span class="text-danger">*</span></label>
					<?php $record_09=$this->common_model->get_records('tbl_built_up_area', "status = '0' ");?>
					<select class="selectpicker w100 show-tick form-control"  name="built_up_area">
						
						<?php foreach($record_09 as $record9):?>
							<option value="<?= $record9->id;?>" id="<?= $record9->id;?>" <?php if($record0->id==$record->built_up_area){echo "selected";}?>><?= $record9->built_up_area;?></option>
						<?php endforeach;?>
					</select>

				</div>
			</div>

		<div class="col-md-6">
				<div class="form-group">
					<label for="bhk">BHK<span class="text-danger">*</span></label>
					<?php $record_10=$this->common_model->get_records('tbl_bhk', "status = '0' ");?>
					<select class="selectpicker w100 show-tick form-control"  name="bhk"
                                                           >
						
						<?php foreach($record_10 as $record10):?>
							<option value="<?= $record10->id;?>" id="<?= $record10->id;?>" <?php if($record10->id==$record->bhk){echo "selected";}?>><?= $record10->bhk_no;?></option>
						<?php endforeach;?>
					</select>

				</div>
			</div>
		
			
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="description">Description <span class="text-danger">*</span></label>
					<textarea class="form-control required" id="editor" name="description" value="<?=$record->description?>"><?=$record->description?></textarea>
					<span class="text-danger error-span">This input is required.</span>
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
        <script type="text/javascript">

        $('#select_status').on('change', function() {

            var selected_val = $('#select_status').val();
            get_property_type(selected_val);
        });

        $('#select_type').on('change', function() {

            var selected_val2 = $('#select_type').val();
            get_property_category(selected_val2);
        });

        $('#select_category').on('change', function() {

            var selected_val3 = $('#select_category').val();
            get_property_subcategory(selected_val3);
        });

        function get_property_type(status_id) {
            $.ajax({
                url: baseurl + "get-property-type",
                type: 'post',
                data: {
                    status_id: status_id
                },
                dataType: 'json',

                success: function(json) {
                    var options = '';
                    options += '<option value="">Select Type</option>';
                    for (var i = 0; i < json.length; i++) {
                        options += '<option value="' + json[i].id + '">' +
                            json[i].property_type_name + '</option>';
                    }
                    $("#select_type").html(options);
                    //alert(options);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText +
                        "\r\n" + xhr.responseText);
                }
            });

        }

        function get_property_category(status_id) {
            $.ajax({
                url: baseurl + "get-property-category",
                type: 'post',
                data: {
                    status_id: status_id
                },
                dataType: 'json',

                success: function(json) {
                    var options = '';
                    options += '<option value="">Select Category</option>';
                    for (var i = 0; i < json.length; i++) {
                        options += '<option value="' + json[i].id + '">' +
                            json[i].property_category + '</option>';
                    }
                    $("#select_category").html(options);
                    //alert(options);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText +
                        "\r\n" + xhr.responseText);
                }
            });

        }

        function get_property_subcategory(status_id) {
            $.ajax({
                url: baseurl + "get-property-subcategory",
                type: 'post',
                data: {
                    status_id: status_id
                },
                dataType: 'json',

                success: function(json) {
                    var options = '';
                    options +=
                        '<option value="">Select Subcategory</option>';
                    for (var i = 0; i < json.length; i++) {
                        options += '<option value="' + json[i].id + '">' +
                            json[i].property_subcategory + '</option>';
                    }
                    $("#select_subcategory").html(options);
                    //alert(options);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText +
                        "\r\n" + xhr.responseText);
                }
            });

        }
        </script>
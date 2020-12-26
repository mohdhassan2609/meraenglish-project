

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Proptoday</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Builder</a></li>
                                <li class="breadcrumb-item active">Add Property</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add Property</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mb-3">Post Your Property</h4>


                            <div id="progressbarwizard">

                                <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
                                    <li class="nav-item">
                                        <a href="#account-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <span class="d-none d-sm-inline">Listing
                                                Details</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-tab-2" data-toggle="tab"
                                            class="nav-link rounded-0 pt-2 pb-2 ">
                                            <span class="d-none d-sm-inline">Location</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-tab-3" data-toggle="tab"
                                            class="nav-link rounded-0 pt-2 pb-2 ">
                                            <span class="d-none d-sm-inline">Detailed
                                                Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-tab-4" data-toggle="tab"
                                            class="nav-link rounded-0 pt-2 pb-2 ">
                                            <span class="d-none d-sm-inline">Property
                                                Media</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-tab-5" data-toggle="tab"
                                            class="nav-link rounded-0 pt-2 pb-2 ">
                                            <span class="d-none d-sm-inline">Floor
                                                Plans</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-tab-6" data-toggle="tab"
                                            class="nav-link rounded-0 pt-2 pb-2 ">
                                            <span class="d-none d-sm-inline">Additional Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#finish-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                            <span class="d-none d-sm-inline">Finish</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content b-0 mb-0">

                                    <div id="bar" class="progress mb-3" style="height: 7px;">
                                        <div
                                            class="bar progress-bar progress-bar-striped progress-bar-animated bg-success">
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="account-2">


                                        <form this_id="form-001" id="form1" class="insert_data_1" method="post"
                                            role="form" enctype="multipart/form-data">

                                              <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="propertyTitle">Property
                                                            Title</label>
                                                        <input type="text" class="form-control" name="property_name"
                                                            id="propertyTitle" value="<?=$record->property_name?>">

                                                        <input type="hidden" id="builder_id1" name="builders_info_id"
                                                                value="<?=$_SESSION['login_id']?>">
                                                      <input  type="hidden" id="form11" name="uniq_id"
                                                            value="<?=$_SESSION['id']?>">
                                                  
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Property Status</label>
                                                        <?php $records=$this->common_model->get_records('tbl_master', "status = '0'");?>
                                                        <select class="form-control selectpicker"
                                                            data-live-search="true" data-width="100%"
                                                            name="property_status" id="select_status" value="<?=$record->property_status?>">
                                                            <option value="">--Select Status--
                                                            </option>
                                                            <?php foreach($records as $record):?>

                                                            <option value="<?=$record->id?>">
                                                                <?= $record->property_status;?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                         </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Property Type</label>
                                                        <select data-live-search="true" data-width="100%"
                                                            name="property_type" id="select_type" class="form-control">
                                                            <option value="">--Select
                                                                Type--</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Category</label>
                                                        <select class="form-control" data-live-search="true"
                                                            data-width="100%" name="category_id" id="select_category">

                                                            <option value="">--Select
                                                                Category--</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Sub Category</label>
                                                        <select class="form-control" data-live-search="true"
                                                            data-width="100%" name="subcategory_id"
                                                            id="select_subcategory">

                                                            <option value="">--Select
                                                                Subcategory--</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="propertyDescription">Project Overview</label>
                                                        <textarea class="form-control" id="propertyDescription"
                                                            name="description" rows="7" value="<?=$record->description?>"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="formGroupExamplePrice">Price</label>
                                                        <input type="text" class="form-control"
                                                            id="formGroupExamplePrice" name="price" value="<?=$record->price?>">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Rooms</label>
                                                        <select class="selectpicker form-control "
                                                            data-live-search="true" data-width="100%" name="rooms" value="<?=$record->rooms?>">
                                                            <option data-tokens="1">1
                                                            </option>
                                                            <option data-tokens="2">2
                                                            </option>
                                                            <option data-tokens="3">3
                                                            </option>
                                                            <option data-tokens="4">4
                                                            </option>
                                                            <option data-tokens="5">5
                                                            </option>
                                                            <option data-tokens=">5">>5
                                                            </option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">

                                                        <label for="formGroupExampleArea">Area</label>
                                                        <input type="text" class="form-control"
                                                            id="formGroupExampleArea" name="area" value="<?=$record->area?>">


                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>.</label>
                                                        <select class="selectpicker form-control "
                                                            data-live-search="true" data-width="100%" name="sqft" value="<?=$record->sqft?>">
                                                            <option value="sqft">Sq-ft
                                                            </option>
                                                            <option value="acre">acre
                                                            </option>
                                                            <option value="perch">perch
                                                            </option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <?php $record_12=$this->common_model->get_records('tbl_built_up_area', "status = '0'");?>
                                                        <label>Built Up Area</label>
                                                        <select class="selectpicker w100 show-tick form-control "
                                                            name="built_up_area" id="built_up_area">
                                                            <option value="">
                                                                Built-up-area</option>
                                                            <?php foreach($record_12 as $record12):?>
                                                            <option value="<?= $record12->id;?>">
                                                                <?= $record12->built_up_area;?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <?php $record_13=$this->common_model->get_records('tbl_bhk', "status = '0'");?>

                                                        <label>BHK</label>
                                                        <select class="selectpicker w100 show-tick form-control "
                                                            name="bhk" id="bhk">
                                                            <option value="">BHK
                                                            </option>
                                                            <?php foreach($record_13 as $record13):?>
                                                            <option value="<?= $record13->id;?>">
                                                                <?= $record13->bhk_no;?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>RERA ID</label>
                                                        <input type="text" class="form-control" name="RERA_ID" value="<?=$record->RERA_ID?>">

                                                    </div>
                                                </div>
                                              <!--  <div class="col-6">
                                                    <div class="form-group">
                                                        <label>DTCP</label>
                                                        <input type="text" class="form-control" name="DTCP">

                                                    </div>
                                                </div>-->
                                                <div class="col-12">

                                                    <ul class="list-inline mb-0 wizard">
                                                        
                                                        <li class="next list-inline-item float-right">
                                                            <button type="submit"
                                                                class="btn btn-secondary">Save & Continue</button>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <!-- end col -->
                                            </div> <!-- end row -->
                                        
                                        </form>



                                    </div>

                                    <div class="tab-pane" id="profile-tab-2">
                                        <form this_id="form-002" id="form2" class="insert_data_2" method="post"
                                            role="form" enctype="multipart/form-data">

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="propertyAddress">Address</label>
                                                        <input type="text" class="form-control" id="propertyAddress"
                                                            name="address">
                                                        <input id="id" type="hidden" name="uniq_id"
                                                            value="<?=$_SESSION['id']?>">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Location</label>
                                                        <?php $records=$this->common_model->get_records('tbl_locations', "status = '0'");?>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%" name="location"
                                                            id="location">
                                                            <?php foreach($records as $record):?>

                                                            <option value="<?=$record->id?>">
                                                                <?= $record->location_name;?>
                                                            </option>
                                                            <?php endforeach;?>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="propertyState">County /
                                                            State</label>
                                                        <input type="hidden" class="form-control" id="propertyState"
                                                            name="state">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">

                                                        <label>Sub Location</label>
                                                        
                                                             <select data-live-search="true" data-width="100%"
                                                            name="sub_location" id="sublocation" class="form-control" >
                                                            <option value="">--Select
                                                                Sub-location--</option>
                                                        </select>

                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="propertyState">County /
                                                            State</label>
                                                        <input type="text" class="form-control" id="propertyState"
                                                            name="state">
                                                    </div>
                                                </div>

                                             <!--   <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="propertyCity">City</label>
                                                        <input type="text" class="form-control" id="propertyCity"
                                                            name="city">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="neighborHood">Neighborhood</label>
                                                        <input type="text" class="form-control" id="neighborHood"
                                                            name="neighborhood">
                                                    </div>
                                                </div>-->
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="zipCode">Zip</label>
                                                        <input type="text" class="form-control" id="zipCode"
                                                            name="pincode">
                                                    </div>
                                                </div>
                                                <div class="col-12">

                                                    <ul class="list-inline mb-0 wizard">
                                                        <li class="previous list-inline-item">
                                                            <a href="javascript: void(0);"
                                                                class="btn btn-secondary">Previous</a>
                                                        </li>
                                                        <li class="next list-inline-item float-right">
                                                            <button type="submit"
                                                                class="btn btn-secondary">Save & Continue</button>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <!-- end col -->
                                            </div> <!-- end row -->
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="profile-tab-3">
                                        <form this_id="form-003" id="form3" class="insert_data_3" method="post"
                                            role="form" enctype="multipart/form-data">


                                            <div class="row">
                                               <!-- <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="propertyId">Property
                                                            ID</label>
                                                        <input type="text" class="form-control" id="propertyId"
                                                            name="property_id">

                                                      </div>
                                                </div>-->
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="propertyASize">Area
                                                            Size</label>
                                                        <input type="text" class="form-control" id="propertyASize"
                                                            name="property_size">
                                                              <input id="id2" type="hidden" name="uniq_id"
                                                            value="<?=$_SESSION['id']?>">
                                                    
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">

                                                        <label>.</label>
                                                    <select class="selectpicker form-control "
                                                            data-live-search="true" data-width="100%" name="size_prefix" value="<?=$record->sqft?>">
                                                            <option value="sqft">Sq-ft
                                                            </option>
                                                            <option value="acre">acre
                                                            </option>
                                                            <option value="perch">perch
                                                            </option>
                                                        </select>


                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">

                                                        <label for="landArea">Land
                                                            Area</label>
                                                        <input type="text" class="form-control" id="landArea"
                                                            name="landarea">


                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">

                                                        <label>.</label>
                                                        <select class="selectpicker form-control "
                                                            data-live-search="true" data-width="100%" name="landarea_sizepostfix" value="<?=$record->sqft?>">
                                                            <option value="sqft">Sq-ft
                                                            </option>
                                                            <option value="acre">acre
                                                            </option>
                                                            <option value="perch">perch
                                                            </option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>No. of Bedrooms</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%" name="bedrooms">
                                                            <option data-tokens="1">1
                                                            </option>
                                                            <option data-tokens="2">2
                                                            </option>
                                                            <option data-tokens="3">3
                                                            </option>
                                                            <option data-tokens="4">4
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>No. of Bathrooms</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%" name="bathrooms">
                                                            <option data-tokens="1">1
                                                            </option>
                                                            <option data-tokens="2">2
                                                            </option>
                                                            <option data-tokens="3">3
                                                            </option>
                                                            <option data-tokens="4">4
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>No. of Balconies</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%" name="balconies">
                                                            <option data-tokens="1">1
                                                            </option>
                                                            <option data-tokens="2">2
                                                            </option>
                                                            <option data-tokens="3">3
                                                            </option>
                                                            <option data-tokens="4">4
                                                            </option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Is your Property</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="is_your_property" id="furnished">
                                                            <option data-tokens="">
                                                                Select</option>
                                                            <option data-tokens="Furnished">
                                                                Furnished</option>
                                                            <option data-tokens="Semi-Furnished">
                                                                Semi-Furnished</option>
                                                            <option data-tokens="Unfurnished">
                                                                Unfurnished</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Floor No. of your
                                                            Property</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%" name="floor_no">
                                                            <option data-tokens="1">1
                                                            </option>
                                                            <option data-tokens="2">2
                                                            </option>
                                                            <option data-tokens="3">3
                                                            </option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Total Floors in your
                                                            building</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="total_floors">
                                                            <option data-tokens="1">1
                                                            </option>
                                                            <option data-tokens="2">2
                                                            </option>                                                            <option data-tokens="3">3
                                                            </option>
                                                            <option data-tokens="4">4
                                                            </option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        
                                                        <label>Car Parking Area</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="car_parking_area">
                                                            <option data-tokens="Open Space">
                                                                Open Space</option>
                                                            <option data-tokens="Covered Area">
                                                                Covered Area</option>
                                                            <option data-tokens="Not Applicable">
                                                                Not Applicable</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>No. of Car
                                                            parking</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="no_of_car_parking">
                                                            <option data-tokens="1">1
                                                            </option>
                                                            <option data-tokens="2">2
                                                            </option>
                                                                            <option data-tokens="3">3
                                                            </option>
                                                            <option data-tokens="4">4
                                                            </option>

                                                        </select>

                                                    </div>
                                                </div>
                                                 <div class="col-4">
                                                    <div class="form-group">
                                                        
                                                        <label>Two Wheeler Parking</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="two_wheeler_parking">
                                                            <option data-tokens="Open Space">
                                                                Open Space</option>
                                                            <option data-tokens="Covered Area">
                                                                Covered Area</option>
                                                            <option data-tokens="Not Applicable">
                                                                Not Applicable</option>
                                                        </select>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Transaction Type</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="transaction_type">
                                                            <option data-tokens="New Property">
                                                                New Property</option>
                                                            <option data-tokens="Resale">
                                                                Resale</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Possession Status</label>
                                                         <?php $records=$this->common_model->get_records('tbl_possession_status', "status = '0'");?>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="possession_status" id="status1">
                                                            <option value="">--Select Status--
                                                            </option>
                                                            <?php foreach($records as $record):?>

                                                            <option value="<?=$record->possession_name?>">
                                                                <?= $record->possession_name;?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4" id="month1">
                                                    <div class="form-group">
                                                        <label>Available From</label>
                                                          <input type="date" class="form-control" 
                                                            name="available_from">
                                                    
                                                    </div>
                                                </div>
                                                <div class="col-4" id="age1" style="display:none">
                                                    <div class="form-group">
                                                        <label>Age of
                                                            Construction</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="age_of_construction">
                                                            <option data-tokens="Brand new">
                                                                Brand new</option>
                                                            <option data-tokens="<5 years">
                                                                <5 years</option>
                                                            <option data-tokens=">5 years">
                                                                >5 years</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="year_built">Year
                                                            Built</label>
                                                        <?php $records_20=$this->common_model->get_records('tbl_yearbuilt', "status = '0'");?>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%" name="year_built">
                                                            <?php foreach($records_20 as $record20):?>

                                                            <option value="<?=$record20->id?>">
                                                                <?= $record20->yearbuilt;?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="virtualTour">360°
                                                            Virtual Tour</label>
                                                        <input type="text" class="form-control" id="virtualTour"
                                                            name="virtual_tour">

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="map">Location URL</label>
                                                        <input type="text" class="form-control" 
                                                            name="map">

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="videoUrl">Video URL
                                                            1</label>
                                                        <input type="text" class="form-control" id="videoUrl"
                                                            name="video_url[]">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="videoUrl">Video URL
                                                            2</label>
                                                        <input type="text" class="form-control" id="videoUrl2"
                                                            name="video_url[]">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="videoUrl">Video URL
                                                            3</label>
                                                        <input type="text" class="form-control" id="videoUrl3"
                                                            name="video_url[]">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="videoUrl">Video URL
                                                            4</label>
                                                        <input type="text" class="form-control" id="videoUrl4"
                                                            name="video_url[]">
                                                    </div>
                                                </div>
                                                  <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="whatsnearby"><b>Additional Details</b> </label>
                                                    </div>
                                                </div>
                                              <div class="col-4" id="ac" style="display:none">
                                                    <div class="form-group">
                                                        <label>AC</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="ac">
                                                            <option data-tokens="0">
                                                                0</option>
                                                            <option data-tokens="1">
                                                                1</option>
                                                            <option data-tokens="2">
                                                                2</option>
                                                            <option data-tokens="3">
                                                                3</option>
                                                        <option data-tokens="4">
                                                                4</option>
                                                        <option data-tokens="5+">
                                                                5+</option>
                                                        

                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="col-4" id="wardrobe" style="display:none">
                                                    <div class="form-group">
                                                        <label>Wardrobe</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="wardrobe">
                                                            <option data-tokens="0">
                                                                0</option>
                                                            <option data-tokens="1">
                                                                1</option>
                                                            <option data-tokens="2">
                                                                2</option>
                                                            <option data-tokens="3">
                                                                3</option>
                                                        <option data-tokens="4">
                                                                4</option>
                                                        <option data-tokens="5+">
                                                                5+</option>
                                                        

                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="col-4" id="tv" style="display:none">
                                                    <div class="form-group">
                                                        <label>TV</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="tv">
                                                            <option data-tokens="0">
                                                                0</option>
                                                            <option data-tokens="1">
                                                                1</option>
                                                            <option data-tokens="2">
                                                                2</option>
                                                            <option data-tokens="3">
                                                                3</option>
                                                        <option data-tokens="4">
                                                                4</option>
                                                        <option data-tokens="5+">
                                                                5+</option>
                                                        

                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="col-4" id="sofa" style="display:none">
                                                    <div class="form-group">
                                                        <label>Sofa</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="sofa">
                                                            <option data-tokens="0">
                                                                0</option>
                                                            <option data-tokens="1">
                                                                1</option>
                                                            <option data-tokens="2">
                                                                2</option>
                                                            <option data-tokens="3">
                                                                3</option>
                                                        <option data-tokens="4">
                                                                4</option>
                                                        <option data-tokens="5+">
                                                                5+</option>
                                                        

                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="col-4" id="fridge" style="display:none">
                                                    <div class="form-group">
                                                        <label>Fridge</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="fridge">
                                                            <option data-tokens="0">
                                                                0</option>
                                                            <option data-tokens="1">
                                                                1</option>
                                                            <option data-tokens="2">
                                                                2</option>
                                                            <option data-tokens="3">
                                                                3</option>
                                                        <option data-tokens="4">
                                                                4</option>
                                                        <option data-tokens="5+">
                                                                5+</option>
                                                        

                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="col-4" id="wmachine" style="display:none">
                                                    <div class="form-group">
                                                        <label>Washing Machine</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="washing_machine">
                                                            <option data-tokens="0">
                                                                0</option>
                                                            <option data-tokens="1">
                                                                1</option>
                                                            <option data-tokens="2">
                                                                2</option>
                                                            <option data-tokens="3">
                                                                3</option>
                                                        <option data-tokens="4">
                                                                4</option>
                                                        <option data-tokens="5+">
                                                                5+</option>
                                                        

                                                        </select>
                                                    </div>
                                                </div>
                                                
                                              <div class="col-4" id="microwave" style="display:none">
                                                    <div class="form-group">
                                                        <label>Microwave</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="microwave">
                                                            <option data-tokens="0">
                                                                0</option>
                                                            <option data-tokens="1">
                                                                1</option>
                                                            <option data-tokens="2">
                                                                2</option>
                                                            <option data-tokens="3">
                                                                3</option>
                                                        <option data-tokens="4">
                                                                4</option>
                                                        <option data-tokens="5+">
                                                                5+</option>
                                                        

                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="col-4" id="dtable" style="display:none">
                                                    <div class="form-group">
                                                        <label>Dining Table</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="dining_table">
                                                            <option data-tokens="0">
                                                                0</option>
                                                            <option data-tokens="1">
                                                                1</option>
                                                            <option data-tokens="2">
                                                                2</option>
                                                            <option data-tokens="3">
                                                                3</option>
                                                        <option data-tokens="4">
                                                                4</option>
                                                        <option data-tokens="5+">
                                                                5+</option>
                                                        

                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="col-4" id="store_room" style="display:none">
                                                    <div class="form-group">
                                                        <label>Store Room</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="store_room">
                                                            <option data-tokens="0">
                                                                0</option>
                                                            <option data-tokens="1">
                                                                1</option>
                                                            <option data-tokens="2">
                                                                2</option>
                                                            <option data-tokens="3">
                                                                3</option>
                                                        <option data-tokens="4">
                                                                4</option>
                                                        <option data-tokens="5+">
                                                                5+</option>
                                                        

                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="col-4" id="study_room" style="display:none">
                                                    <div class="form-group">
                                                        <label>Study Room</label>
                                                        <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="study_room">
                                                            <option data-tokens="0">
                                                                0</option>
                                                            <option data-tokens="1">
                                                                1</option>
                                                            <option data-tokens="2">
                                                                2</option>
                                                            <option data-tokens="3">
                                                                3</option>
                                                        <option data-tokens="4">
                                                                4</option>
                                                        <option data-tokens="5+">
                                                                5+</option>
                                                        

                                                        </select>
                                                    </div>
                                                </div>
                                                
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                                
                                             
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="whatsnearby"><b>What's
                                                                Nearby</b> </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="education">Education</label>
                                                        <input type="text" class="form-control" name="education"
                                                            placeholder="Enter the different places seperated by comma">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">

                                                        <label for="edistance">Distance
                                                            in miles</label>
                                                        <input type="text" class="form-control" name="edistance">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="Health">Health &
                                                            Medical</label>
                                                        <input type="text" class="form-control" name="health"
                                                            placeholder="Enter different places seperated by comma">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="hdistance">Distance
                                                            in miles</label>
                                                        <input type="text" class="form-control" name="hdistance">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">

                                                        <label for="transport">Transportation</label>
                                                        <input type="text" class="form-control" name="transport"
                                                            placeholder="Enter different places seperated by comma">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="tdistance">Distance
                                                            in miles</label>
                                                        <input type="text" class="form-control" name="tdistance">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h4>Features</h4>
                                                    </div>
                                                </div>
                                               <!-- <div class="col-12">
                                                    <div class="form-group">
                                                        
                                                            <?php $features=$this->common_model->get_records('tbl_features', "status = '0'");?>
                                                                    <select class="selectpicker form-control"
                                                            data-live-search="true" data-width="100%"
                                                            name="features[]" multiple="multiple">
                                                         
                                                            <?php foreach($features as $feature):?>
                                                            <option data-tokens="<?=$feature->id?>"><?=$feature->feature?></option>
                                                       
                                                                
                                                            <?php endforeach;?>
                                                             </select>
                                                        
                                                    </div>
                                                </div>-->
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                                    <textarea  class="form-control" id="editor2" name="features" rows="30"></textarea>
                                                          </div>
                                                    </div>
                                            
                                                
                                                
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h4>Amenities</h4>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <ul class="ui_kit_checkbox selectable-list">

                                                            <?php $records_1=$this->common_model->get_records('tbl_amenities', "status = '0' limit 0,5");?>
                                                            <?php foreach($records_1 as $record1):?>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    value="<?= $record1->id;?>" id="<?= $record1->id;?>"
                                                                    name="amenities[]">
                                                                <label class="custom-control-label"
                                                                    for="<?= $record1->id;?>"><?=$record1->name;?></label>
                                                            </div>

                                                            <?php endforeach;?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <ul class="ui_kit_checkbox selectable-list">
                                                            <?php $records_2=$this->common_model->get_records('tbl_amenities', "status = '0' limit 5,5");?>
                                                            <?php foreach($records_2 as $record2):?>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    value="<?= $record2->id;?>" id="<?= $record2->id;?>"
                                                                    name="amenities[]">
                                                                <label class="custom-control-label"
                                                                    for="<?= $record2->id;?>"><?=$record2->name;?></label>
                                                            </div>

                                                            <?php endforeach;?>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <ul class="ui_kit_checkbox selectable-list">
                                                            <?php $records_3=$this->common_model->get_records('tbl_amenities', "status = '0' limit 10,5");?>
                                                            <?php foreach($records_3 as $record3):?>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    value="<?= $record3->id;?>" id="<?= $record3->id;?>"
                                                                    name="amenities[]">
                                                                <label class="custom-control-label"
                                                                    for="<?= $record3->id;?>"><?=$record3->name;?></label>
                                                            </div>

                                                            <?php endforeach;?>

                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-12">

                                                    <ul class="list-inline mb-0 wizard">
                                                        <li class="previous list-inline-item">
                                                            <a href="javascript: void(0);"
                                                                class="btn btn-secondary">Previous</a>
                                                        </li>
                                                        <li class="next list-inline-item float-right">
                                                            <button type="submit"
                                                                class="btn btn-secondary">Save & Continue</button>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <!-- end col -->
                                            </div> <!-- end row -->
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="profile-tab-4">
                                        <form this_id="form-004" id="form4" class="insert_data_4" method="post"
                                            role="form" enctype="multipart/form-data">
                                            <div class="row">
                                                 <div class="col-12">
                                                    <div class="form-group">
                                                        <ul class="mb0">
                                                            <li class="list-inline-item">
                                                                <div id="gallery4">

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <div class="resume_uploader mb30">
                                                            <h4>Banner Image</h4>

                                                            <label class="upload">
                                                                <input type="file" id="banner" name="banner" >
                                                                Select Image
                                                            </label>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <ul class="mb0">
                                                            <li class="list-inline-item">
                                                                <div id="gallery1">

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <div class="resume_uploader mb30">
                                                            <h4>Featured Image</h4>

                                                            <label class="upload">
                                                                <input type="file" id="gallery-profile" name="profile_image" >
                                                                Select Image
                                                            </label>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <ul class="mb0">
                                                            <li class="list-inline-item">
                                                                <div id="gallery">

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="portfolio_upload">
                                                             <h4>Gallery</h4>

                                                            <input type="file" name="userfile[]"
                                                                accept="image/x-png,image/gif,image/jpeg"
                                                                id="gallery-photo-add" multiple="multiple">
                                                            <div class="icon"><span class="flaticon-download"></span>
                                                            </div>
                                                            <p>Drag and drop images here
                                                            </p>

                                                            <input type="hidden" value="tbl_property_images"
                                                                name="table_name">
                                                            <input type="hidden" id="id3" name="uniq_id"
                                                                value="<?=$_SESSION['id']?>">

                                                        </div>

                                                    </div>
                                                </div>
                                                   <div class="col-12">
                                                    <div class="form-group">
                                                        <ul class="mb0">
                                                            <li class="list-inline-item">
                                                                <div id="gallery6">

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <div class="resume_uploader mb30">
                                                            <h4>Actual Image</h4>

                                                            <label class="upload">
                                                                <input type="file" id="actual" name="actual" multiple>
                                                                Select Image
                                                            </label>

                                                        </div>

                                                    </div>
                                                </div>
                                            <br>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="resume_uploader mb30">
                                                            <h4>Attachments</h4>

                                                            <label class="upload">
                                                                <input type="file" name="file[]" multiple="multiple">
                                                                Select Attachment
                                                            </label>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-12">

                                                    <ul class="list-inline mb-0 wizard">
                                                        <li class="previous list-inline-item">
                                                            <a href="javascript: void(0);"
                                                                class="btn btn-secondary">Previous</a>
                                                        </li>
                                                        <li class="next list-inline-item float-right">
                                                            <button type="submit"
                                                                class="btn btn-secondary">Save & Continue</button>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <!-- end col -->
                                            </div> <!-- end row -->
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="profile-tab-5">
                                        <form this_id="form-005" id="form5" class="insert_data_5" method="post"
                                            role="form" enctype="multipart/form-data">


                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                    
                                                        <input type="hidden" id="id5"  name="uniq_id"
                                                            value="<?=$_SESSION['id']?>">
                                                        <input type="hidden" value="tbl_floor_plans" name="table_name">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                
                                               <input id="btnAdd" type="button" value="Add Floor Plans" /><br>
                                                 <div id="TextBoxContainer">
                                                <!--Textboxes will be added here -->
                                            </div>
                                    
                                        <br>
                                           
                                            </div>
                                            <hr>
                                               
                                            <!--<input id="btnGet"  type="button" value="Get Values" />-->
                                               
                                               
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h4>Site Plan</h4>
                                                    </div>
                                                </div>
                                                  <div class="col-12">
                                                    <div class="form-group">
                                                        <ul class="mb0">
                                                            <li class="list-inline-item">
                                                                <div id="gallery5">

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Site Plan Image</label>
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">

                                                                <input  type="file"
                                                                    accept=".png, .jpg, .jpeg" name="site_image" id="gallery05">
                                                                <label for="imageUpload"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div id="imagePreview">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="planDescription">Site Plan
                                                            Description</label>
                                                        <textarea class="form-control" id="planDescription" rows="7"
                                                            name="site_description"></textarea>
                                                    </div>
                                                </div>
                                              
                                                <div class="col-12">

                                                    <ul class="list-inline mb-0 wizard">
                                                        <li class="previous list-inline-item">
                                                            <a href="javascript: void(0);"
                                                                class="btn btn-secondary">Previous</a>
                                                        </li>
                                                        <li class="next list-inline-item float-right">
                                                            <button type="submit" class="btn btn-secondary">Save & Continue</button>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <!-- end col -->
                                            </div> <!-- end row -->
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="profile-tab-6">
                                         <form this_id="form-0051"  class="insert_data_6" method="post"
                                            role="form" enctype="multipart/form-data" id="display_luxury" style="display: none;">

                                        <div class="row" >
                                               
                                             
                                             

                                                <div class="col-12">
                                                    <div class="form-group">
                                                    
                                                        <input type="hidden" id="id7"  name="uniq_id"
                                                            value="<?=$_SESSION['id']?>">
                                                        <input type="hidden" value="tbl_additional_info" name="table_name">
                                                         <input type="hidden" value="L" name="display_additionalinfo">
                                                    </div>
                                                </div>
                                                   <div class="col-6">
                                                    <div class="form-group">
                                                        <label>No. of floors</label>
                                                        <select class="form-control" name="floor_no[]" >
                                                            <option value="B">B</option>
                                                            <option value="G">G</option>
                                                            <option value="S">S</option>
                                                            <option value="B+G">B+G</option>
                                                            <option value="B+G+S">B+G+S</option>

                                                            <option value="B+S">B+S</option>
                                                        </select>
                                                    </div>
                                                </div>
                                              
                                                 <div class="col-6">
                                                    <div class="form-group">
                                                        <label>No. of floors</label>
                                                        <select class="form-control" name="floor_no[]" >
                                                            <option value="B">B</option>
                                                            <option value="G">G</option>
                                                            <option value="S">S</option>
                                                            <option value="B+G">B+G</option>
                                                            <option value="B+G+S">B+G+S</option>

                                                            <option value="B+S">B+S</option>
                                                        </select>
                                                    </div>
                                                </div>
                                              
                                        
                                              <!--   <div class="col-12">
                                                    <div class="form-group">
                                                        <ul class="mb0">
                                                            <li class="list-inline-item">
                                                                <div id="gallery5">

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                               <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Plan Image</label>
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">

                                                                <input  type="file"
                                                                    accept=".png, .jpg, .jpeg" name="plan_image" id="gallery05">
                                                                <label for="imageUpload"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div id="imagePreview">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->
                                                <div class="col-12">
                                                
                                               <!-- <input id="btnAdd2" type="button" value="Add More Floors" /><br>-->
                                                 <div id="TextBoxContainer2">
                                                <!--Textboxes will be added here -->
                                            </div>
                                    
                                        <br>
                                           
                                            </div>
                                                  <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Undivided Share</label>
                                                            <input type="text" class="form-control" 
                                                            name="undivided_share">
                                                   
                                                         
                                                      </div>
                                                </div>
                                                 <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Metrics</label>
                                                       <select class="form-control" name="metrics" >
                                                            <option value="Sqft">Sqft</option>
                                                        </select>
                                                      </div>
                                                </div>
                                                 <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Carpet Area</label>
                                                            <input type="text" class="form-control" 
                                                            name="carpet_area">
                                                   
                                                         
                                                      </div>
                                                </div>
                                                 <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Metrics</label>
                                                       <select class="form-control" name="metrics_c" >
                                                           <option value="Sqft">Sqft</option>
                                                        </select>
                                                      </div>
                                                </div>
                                               <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Project Plan</label>
                                                       <select class="form-control" name="project_plan" >
                                                            <option value="1">1 BHK</option>
                                                            <option value="2">2 BHK</option>
                                                            <option value="3">3 BHK</option>
                                                            <option value="4">4 BHK</option>
                                                            <option value="5">5 BHK</option>
                                                            <option value="6">6 BHK</option>
                                                            <option value="7">7 BHK</option>
                                                            <option value="8">8 BHK</option>

                                                        </select>
                                                      </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Builder Price</label>
                                                        <input type="text" class="form-control" 
                                                            name="builder_price" placeholder=" 5 Lakhs onwards to 1 Crores">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Price per Sqft</label>
                                                        <input type="text" class="form-control" 
                                                            name="price_per_sqft">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Total Floors</label>
                                                        <input type="text" class="form-control" 
                                                            name="total_floors">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Total Launched Apartment</label>
                                                        <input type="text" class="form-control" 
                                                            name="total_launched_apartment">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Launch Date</label>
                                                        <input type="date" class="form-control" 
                                                            name="launch_date">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Possession Start Date</label>
                                                        <input type="date" class="form-control" 
                                                            name="possession_start_date">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label >Type of Flooring in your rooms</label>
                                                        <select class="form-control" name="type_of_flooring" >
                                                            <option value="Mosaic">Mosaic</option>
                                                            <option value="Vitrified">Vitrified</option>
                                                            <option value="Wooden">Wooden</option>
                                                            <option value="Ceramic Tiles">Ceramic Tiles</option>

                                                            <option value="Italian Marble">Italian Marble</option>
                                                             <option value="Normal Tiles/Kotah Stones">Normal Tiles/Kotah Stones</option>
                                                            <option value="Granite">Granite</option>
                                                            <option value="Marbonite">Marbonite</option>

                                                        </select>
                                                    </div>
                                                
                                            </div></div>
                                            <div class="row">
                                                <div class="col-12">

                                                    <ul class="list-inline mb-0 wizard">
                                                        <li class="previous list-inline-item">
                                                            <a href="javascript: void(0);"
                                                                class="btn btn-secondary">Previous</a>
                                                        </li>
                                                        <li class="next list-inline-item float-right">
                                                            <button type="submit" class="btn btn-secondary">Post
                                                                Your Property</button>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </form>
                                               <form this_id="form-005" class="insert_data_6" method="post"
                                            role="form" enctype="multipart/form-data" id="display_residential_rent" style="display: none;">


                                            <div class="row" >

                                                <div class="col-12">
                                                    <div class="form-group">
                                                    
                                                        <input type="hidden" id="id7"  name="uniq_id"
                                                            value="<?=$_SESSION['id']?>">
                                                        <input type="hidden" value="tbl_additional_info" name="table_name">

                                                         <input type="hidden" value="RR" name="display_additionalinfo">
                                                    </div>
                                                </div>
                                        

                                              <!--   <div class="col-12">
                                                    <div class="form-group">
                                                        <ul class="mb0">
                                                            <li class="list-inline-item">
                                                                <div id="gallery5">

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                               <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Plan Image</label>
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">

                                                                <input  type="file"
                                                                    accept=".png, .jpg, .jpeg" name="plan_image" id="gallery05">
                                                                <label for="imageUpload"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div id="imagePreview">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->
                                                  
                                              
                                                 <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Carpet Area</label>
                                                            <input type="text" class="form-control" 
                                                            name="carpet_area">
                                                   
                                                         
                                                      </div>
                                                </div>
                                                 <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Metrics</label>
                                                       <select class="form-control" name="metrics_c" >
                                                            <option value="Sqft">Sqft</option>
                                                        </select>
                                                      </div>
                                                </div>
                                               
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Rental Value</label>
                                                        <input type="text" class="form-control" 
                                                            name="rental_value">
                                                    </div>
                                                </div>
                                                 <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Launch Date</label>
                                                        <input type="date" class="form-control" 
                                                            name="launch_date">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Possession Start Date</label>
                                                        <input type="date" class="form-control" 
                                                            name="possession_start_date">
                                                    </div>
                                                </div>
                                               
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Pooja Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="pooja_room">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Over Looking</label>
                                                        <select class="form-control" name="over_looking" >
                                                            <option value="Garden">Garden</option>
                                                            <option value="Park">Park</option>
                                                            <option value="Main Road">Main Road</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Modular Kitchen</label>
                                                        <select class="form-control" name="modular_kitchen" >
                                                            <option value="dry_kitchen">Dry Kitchen</option>
                                                            <option value="wet_kitchen">Wet Kitchen</option>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Monthly Maintenance</label>
                                                        <input type="text" class="form-control" 
                                                            name="monthly_maintenance">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Tenant Preferred</label>
                                                        <input type="text" class="form-control" 
                                                            name="tenant_preferred">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Security Deposit</label>
                                                        <input type="text" class="form-control" 
                                                            name="security_deposit">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Servant Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="servant_room">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Waiting Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="waiting_room">
                                                    </div>
                                                </div>
                                                

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Security Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="security_room">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Driver Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="driver_room">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Open Terrace</label>
                                                        <input type="text" class="form-control" 
                                                            name="open_terrace">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Type of Ownership</label>
                                                        <input type="text" class="form-control" 
                                                            name="type_of_ownership">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Feehold</label>
                                                        
                                                               <select class="form-control" name="feehold_lease" >
                                                            <option value="Feehold lease">Feehold lease</option>
                                                            <option value="POA">POA</option>
                                                            <option value="co-operative society">co-operative society</option>
                                                            </select>
                                           
                                                    </div>
                                                </div>
                                                
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Other Charges</label>
                                                        <input type="text" class="form-control" 
                                                            name="other_charges">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label >Type of Flooring in your rooms</label>
                                                        <select class="form-control" name="type_of_flooring" >
                                                            <option value="Mosaic">Mosaic</option>
                                                            <option value="Vitrified">Vitrified</option>
                                                            <option value="Wooden">Wooden</option>
                                                            <option value="Ceramic Tiles">Ceramic Tiles</option>

                                                            <option value="Italian Marble">Italian Marble</option>
                                                             <option value="Normal Tiles/Kotah Stones">Normal Tiles/Kotah Stones</option>
                                                            <option value="Granite">Granite</option>
                                                            <option value="Marbonite">Marbonite</option>

                                                        </select>
                                                    </div>
                                                
                                            </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Lock in Period</label>
                                                        <input type="text" class="form-control" 
                                                            name="lock_in_period">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Water Availabiltiy</label>
                                                        
                                                             <select class="form-control" name="water_availability" >
                                                            <option value="No">No</option>
                                                            <option value="Less than 10 hrs">Less than 10 hrs</option>
                                                            <option value="24 hrs available">24 hrs available</option>
                                                            </select>
                                           
                                                    </div>
                                                </div>
                                           
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Notice Period</label>
                                                        <input type="text" class="form-control" 
                                                            name="notice_period">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label >Approved By</label>
                                                        <select class="form-control" name="type_of_flooring" >
                                                            <option value="CMDA">CMDA</option>
                                                            <option value="CMC">CMC</option>
                                                            <option value="DTCP">DTCP</option>
                                                           
                                                        </select>
                                                    </div>
                                                
                                            </div>
                                             <div class="col-4">
                                                    <div class="form-group">
                                                        <label >Wheel Chair Friendly</label>
                                                        <select class="form-control" name="wheel_chair_friendly" >
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                           
                                                        </select>
                                                    </div>
                                                
                                            </div>
                                               
                                             <div class="col-4">
                                                    <div class="form-group">
                                                        <label >Pet Friendly</label>
                                                        <select class="form-control" name="pet_friendly" >
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                           
                                                        </select>
                                                    </div>
                                                
                                            </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Width of Facing Road</label>
                                                        <input type="text" class="form-control" 
                                                            name="width_of_facing_road">
                                                    </div>
                                                </div>
                                                <!-- end col --></div>
                        <div class="row">
                                                <div class="col-12">

                                                    <ul class="list-inline mb-0 wizard">
                                                        <li class="previous list-inline-item">
                                                            <a href="javascript: void(0);"
                                                                class="btn btn-secondary">Previous</a>
                                                        </li>
                                                        <li class="next list-inline-item float-right">
                                                            <button type="submit" class="btn btn-secondary">Post
                                                                Your Property</button>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                            </form>
                                             <!-- end row -->
                                    <form this_id="form-005"  class="insert_data_6" method="post"
                                            role="form" enctype="multipart/form-data" id="display_commercial_rent" style="display: none;">


                                            <div class="row" >
                                            

                                                <div class="col-12">
                                                    <div class="form-group">
                                                    
                                                        <input type="hidden" id="id7"  name="uniq_id"
                                                            value="<?=$_SESSION['id']?>">
                                                        <input type="hidden" value="tbl_additional_info" name="table_name">

                                                         <input type="hidden" value="CR" name="display_additionalinfo">
                                                    </div>
                                                </div>
                                        

                                              <!--   <div class="col-12">
                                                    <div class="form-group">
                                                        <ul class="mb0">
                                                            <li class="list-inline-item">
                                                                <div id="gallery5">

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                               <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Plan Image</label>
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">

                                                                <input  type="file"
                                                                    accept=".png, .jpg, .jpeg" name="plan_image" id="gallery05">
                                                                <label for="imageUpload"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div id="imagePreview">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->
                                                 <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Carpet Area</label>
                                                            <input type="text" class="form-control" 
                                                            name="carpet_area">
                                                   
                                                         
                                                      </div>
                                                </div>
                                                 <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Metrics</label>
                                                       <select class="form-control" name="metrics_c" >
                                                            <option value="Sqft">Sqft</option>
                                                        </select>
                                                      </div>
                                                </div>
                                               
                                                
                                        <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Facing</label>
                                                        <select class="form-control" name="facing" >
                                                            <option value="East">East</option>
                                                            <option value="North">North</option>
                                                            <option value="North East">North East</option>
                                                            <option value="North West">North West</option>
                                                            <option value="South">South</option>
                                                            <option value="South East">South East</option>
                                                            <option value="South West">South West</option>
                                                            
                                                            <option value="West">West</option>
                                                            
                                                            </select>
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Launch Date</label>
                                                        <input type="date" class="form-control" 
                                                            name="launch_date">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Possession Start Date</label>
                                                        <input type="date" class="form-control" 
                                                            name="possession_start_date">
                                                    </div>
                                                </div>
                                             
                                              
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Rental Value</label>
                                                        <input type="text" class="form-control" 
                                                            name="rental_value">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Pooja Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="pooja_room">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Total Floors</label>
                                                        <input type="text" class="form-control" 
                                                            name="total_floors">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Floor No.</label>
                                                        <input type="text" class="form-control" 
                                                            name="floor_no">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Monthly Maintenance</label>
                                                        <input type="text" class="form-control" 
                                                            name="monthly_maintenance">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Work Station</label>
                                                        <input type="text" class="form-control" 
                                                            name="work_station">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>MD Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="md_room">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Cabins</label>
                                                        <input type="text" class="form-control" 
                                                            name="cabins">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Meeting Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="meeting_room">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Waiting Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="waiting_room">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Server Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="server_room">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Reception</label>
                                                        <input type="text" class="form-control" 
                                                            name="reception">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Building Class</label>
                                                        <input type="text" class="form-control" 
                                                            name="building_class">
                                                    </div>
                                                </div>
                                          <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Pantry</label>
                                                        <select class="form-control" name="pantry" >
                                                            <option value="Dry Pantry">Dry Pantry</option>
                                                            <option value="Wet Pantry">Wet Pantry</option>
                                                            </select>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>No. of Units Available</label>
                                                        <input type="text" class="form-control" 
                                                            name="no_of_units_available">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Lift</label>
                                                        <input type="text" class="form-control" 
                                                            name="lift">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Power Supply</label>
                                                      
                                                       <select class="form-control" name="power_supply" >
                                                            <option value="Available">available</option>
                                                            <option value="Unavailable">unavailable</option>
                                                            </select>

                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Power Back</label>
                                                             <select class="form-control" name="power_back" >
                                                            <option value="100% back up">100% back up</option>
                                                            <option value="No or Rare power cut">No or Rare power cut</option>
                                                            </select>

                                                    </div>
                                                </div>
                                                  <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Ideal For</label>
                                                        <select class="form-control" name="ideal_for" >
                                                            <option value="Call Center">Call Center</option>
                                                            <option value="BPO">BPO</option>
                                                            <option value="Coaching Center">Coaching Center</option>
                                                            <option value="Private Consulting">Private Consulting</option>
                                                            <option value="IT/ITES and Related">IT/ITES and Related</option>
                                                            <option value="Private Office">Private Office</option>
                                                            
                                                            </select>
                                                    </div>
                                                </div>
                                                 <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="planDescription">No. of floors</label>
                                                        <select class="form-control" name="floors" >
                                                            <option value="B+G+7 floors">B+G+7 floors</option>
                                                            <option value="Still+10 floors">Still+10 floors</option>
                                                            <option value="B+Still+7 floors">B+Still+7 floors</option>
                                                            <option value="G+4 floors">G+4 floors</option>

                                                        </select>
                                                    </div>
                                                </div>
                                              

                                                  <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Tenants Prefered</label>
                                                        <select class="form-control" name="tenant_preferred" >
                                                            <option value="MNC Company">MNC Company</option>
                                                            <option value="Indian Company">Indian Company</option>
                                                            </select>
                                                    </div>
                                                </div>

                                             
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Over Looking</label>
                                                        <select class="form-control" name="over_looking" >
                                                            <option value="Garden">Garden</option>
                                                            <option value="Park">Park</option>
                                                            <option value="Main Road">Main Road</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Modular Kitchen</label>
                                                        <select class="form-control" name="modular_kitchen" >
                                                            <option value="dry_kitchen">Dry Kitchen</option>
                                                            <option value="wet_kitchen">Wet Kitchen</option>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Monthly Maintenance</label>
                                                        <input type="text" class="form-control" 
                                                            name="monthly_maintenance">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Tenant Preferred</label>
                                                        <input type="text" class="form-control" 
                                                            name="tenant_preferred">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Security Deposit</label>
                                                        <input type="text" class="form-control" 
                                                            name="security_deposit">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Servant Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="servant_room">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Security Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="security_room">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Driver Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="driver_room">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Open Terrace</label>
                                                        <input type="text" class="form-control" 
                                                            name="open_terrace">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Type of Ownership</label>
                                                        <input type="text" class="form-control" 
                                                            name="type_of_ownership">
                                                    </div>
                                                </div>

                                                 <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Feehold</label>
                                                        
                                                               <select class="form-control" name="feehold_lease" >
                                                            <option value="Feehold lease">Feehold lease</option>
                                                            <option value="POA">POA</option>
                                                            <option value="co-operative society">co-operative society</option>
                                                            </select>
                                           
                                                    </div>
                                                </div>
                                                
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Other Charges</label>
                                                        <input type="text" class="form-control" 
                                                            name="other_charges">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label >Type of Flooring in your rooms</label>
                                                        <select class="form-control" name="type_of_flooring" >
                                                            <option value="Mosaic">Mosaic</option>
                                                            <option value="Vitrified">Vitrified</option>
                                                            <option value="Wooden">Wooden</option>
                                                            <option value="Ceramic Tiles">Ceramic Tiles</option>

                                                            <option value="Italian Marble">Italian Marble</option>
                                                             <option value="Normal Tiles/Kotah Stones">Normal Tiles/Kotah Stones</option>
                                                            <option value="Granite">Granite</option>
                                                            <option value="Marbonite">Marbonite</option>

                                                        </select>
                                                    </div>
                                                
                                            </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Lock in Period</label>
                                                        <input type="text" class="form-control" 
                                                            name="lock_in_period">
                                                    </div>
                                                </div>
                                        <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Water Availabiltiy</label>
                                                        
                                                             <select class="form-control" name="water_availability" >
                                                            <option value="No">No</option>
                                                            <option value="Less than 10 hrs">Less than 10 hrs</option>
                                                            <option value="24 hrs available">24 hrs available</option>
                                                            </select>
                                           
                                                    </div>
                                                </div>
                                           
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Notice Period</label>
                                                        <input type="text" class="form-control" 
                                                            name="notice_period">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label >Approved By</label>
                                                        <select class="form-control" name="type_of_flooring" >
                                                            <option value="CMDA">CMDA</option>
                                                            <option value="CMC">CMC</option>
                                                            <option value="DTCP">DTCP</option>
                                                           
                                                        </select>
                                                    </div>
                                                
                                            </div>
                                             <div class="col-4">
                                                    <div class="form-group">
                                                        <label >Wheel Chair Friendly</label>
                                                        <select class="form-control" name="wheel_chair_friendly" >
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                           
                                                        </select>
                                                    </div>
                                                
                                            </div>
                                               
                                             <div class="col-4">
                                                    <div class="form-group">
                                                        <label >Pet Friendly</label>
                                                        <select class="form-control" name="pet_friendly" >
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                           
                                                        </select>
                                                    </div>
                                                
                                            </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Width of Facing Road</label>
                                                        <input type="text" class="form-control" 
                                                            name="width_of_facing_road">
                                                    </div>
                                                </div>
                                                <!-- end col --></div>
                        <div class="row">
                                                <div class="col-12">

                                                    <ul class="list-inline mb-0 wizard">
                                                        <li class="previous list-inline-item">
                                                            <a href="javascript: void(0);"
                                                                class="btn btn-secondary">Previous</a>
                                                        </li>
                                                        <li class="next list-inline-item float-right">
                                                            <button type="submit" class="btn btn-secondary">Post
                                                                Your Property</button>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                            </form>
                                            <!-- end row -->
                                                <form this_id="form-005"  class="insert_data_6" method="post"
                                            role="form" enctype="multipart/form-data" id="display_residential_sale" style="display: none;">
                                              <div class="row" >
                                           


                                                <div class="col-12">
                                                    <div class="form-group">
                                                    
                                                        <input type="hidden" id="id7"  name="uniq_id"
                                                            value="<?=$_SESSION['id']?>">
                                                        <input type="hidden" value="tbl_additional_info" name="table_name">

                                                         <input type="hidden" value="RS" name="display_additionalinfo">
                                                    </div>
                                                </div>
                                        

                                              <!--   <div class="col-12">
                                                    <div class="form-group">
                                                        <ul class="mb0">
                                                            <li class="list-inline-item">
                                                                <div id="gallery5">

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                               <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Plan Image</label>
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">

                                                                <input  type="file"
                                                                    accept=".png, .jpg, .jpeg" name="plan_image" id="gallery05">
                                                                <label for="imageUpload"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div id="imagePreview">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->
                                                  <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Carpet Area</label>
                                                            <input type="text" class="form-control" 
                                                            name="carpet_area">
                                                   
                                                         
                                                      </div>
                                                </div>
                                                 <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Metrics</label>
                                                       <select class="form-control" name="metrics_c" >
                                                            <option value="Sqft">Sqft</option>
                                                        </select>
                                                      </div>
                                                </div>
                                               
                                        <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Facing</label>
                                                        <select class="form-control" name="facing" >
                                                            <option value="East">East</option>
                                                            <option value="North">North</option>
                                                            <option value="North East">North East</option>
                                                            <option value="North West">North West</option>
                                                            <option value="South">South</option>
                                                            <option value="South East">South East</option>
                                                            <option value="South West">South West</option>
                                                            
                                                            <option value="West">West</option>
                                                            
                                                            </select>
                                                    </div>
                                                </div>

                                              
                                                
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Pooja Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="pooja_room">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Undivided Share</label>
                                                       <select class="form-control" name="undivided_share" >
                                                            <option value="40%">40%</option>
                                                            <option value="500 Sqft">500 Sqft</option>
                                                        </select>
                                                      </div>
                                                </div>
                                               
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Total Floors</label>
                                                        <input type="text" class="form-control" 
                                                            name="total_floors">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Floor No.</label>
                                                        <input type="text" class="form-control" 
                                                            name="floor_no">
                                                    </div>
                                                </div>
                                                 <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="planDescription">No. of floors</label>
                                                        <select class="form-control" name="floors" >
                                                            <option value="B+G+7 floors">B+G+7 floors</option>
                                                            <option value="Still+10 floors">Still+10 floors</option>
                                                            <option value="B+Still+7 floors">B+Still+7 floors</option>
                                                            <option value="G+4 floors">G+4 floors</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Over Looking</label>
                                                        <select class="form-control" name="over_looking" >
                                                            <option value="Garden">Garden</option>
                                                            <option value="Park">Park</option>
                                                            <option value="Main Road">Main Road</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Security Deposit</label>
                                                        <input type="text" class="form-control" 
                                                            name="security_deposit">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Booking Amount</label>
                                                        <input type="text" class="form-control" 
                                                            name="booking_amount">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Servant Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="servant_room">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Security Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="security_room">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Driver Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="driver_room">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Open Terrace</label>
                                                        <input type="text" class="form-control" 
                                                            name="open_terrace">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Other Charges</label>
                                                        <input type="text" class="form-control" 
                                                            name="other_charges">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label >Type of Flooring in your rooms</label>
                                                        <select class="form-control" name="type_of_flooring" >
                                                            <option value="Mosaic">Mosaic</option>
                                                            <option value="Vitrified">Vitrified</option>
                                                            <option value="Wooden">Wooden</option>
                                                            <option value="Ceramic Tiles">Ceramic Tiles</option>

                                                            <option value="Italian Marble">Italian Marble</option>
                                                             <option value="Normal Tiles/Kotah Stones">Normal Tiles/Kotah Stones</option>
                                                            <option value="Granite">Granite</option>
                                                            <option value="Marbonite">Marbonite</option>

                                                        </select>
                                                    </div>
                                                
                                            </div>
                                             <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Water Availabiltiy</label>
                                                        
                                                             <select class="form-control" name="water_availability" >
                                                            <option value="No">No</option>
                                                            <option value="Less than 10 hrs">Less than 10 hrs</option>
                                                            <option value="24 hrs available">24 hrs available</option>
                                                            </select>
                                           
                                                    </div>
                                                </div>
                                                 <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Feehold</label>
                                                        
                                                               <select class="form-control" name="feehold_lease" >
                                                            <option value="Feehold lease">Feehold lease</option>
                                                            <option value="POA">POA</option>
                                                            <option value="co-operative society">co-operative society</option>
                                                            </select>
                                           
                                                    </div>
                                                </div>
                                                 <div class="col-4">
                                                    <div class="form-group">
                                                        <label>No. of Units Available</label>
                                                        <input type="text" class="form-control" 
                                                            name="no_of_units_available">
                                                    </div>
                                                </div>

                                             <div class="col-4">
                                                    <div class="form-group">
                                                        <label >Wheel Chair Friendly</label>
                                                        <select class="form-control" name="wheel_chair_friendly" >
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                           
                                                        </select>
                                                    </div>
                                                
                                            </div>
                                               
                                             <div class="col-4">
                                                    <div class="form-group">
                                                        <label >Pet Friendly</label>
                                                        <select class="form-control" name="pet_friendly" >
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                           
                                                        </select>
                                                    </div>
                                                
                                            </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Width of Facing Road</label>
                                                        <input type="text" class="form-control" 
                                                            name="width_of_facing_road">
                                                    </div>
                                                </div></div>
                                                <!-- end col -->
                                                 <div class="row">
                                                <div class="col-12">

                                                    <ul class="list-inline mb-0 wizard">
                                                        <li class="previous list-inline-item">
                                                            <a href="javascript: void(0);"
                                                                class="btn btn-secondary">Previous</a>
                                                        </li>
                                                        <li class="next list-inline-item float-right">
                                                            <button type="submit" class="btn btn-secondary">Post
                                                                Your Property</button>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                       
                                            </form>
                                             <!-- end row -->
                                                <form this_id="form-005"  class="insert_data_6" method="post"
                                            role="form" enctype="multipart/form-data" id="display_commercial_sale" style="display: none;">
                                             <div class="row" >
                                            


                                                <div class="col-12">
                                                    <div class="form-group">
                                                    
                                                        <input type="hidden" id="id7"  name="uniq_id"
                                                            value="<?=$_SESSION['id']?>">
                                                        <input type="hidden" value="tbl_additional_info" name="table_name">

                                                         <input type="hidden" value="CS" name="display_additionalinfo">
                                                    </div>
                                                </div>
                                        
                                              <!--   <div class="col-12">
                                                    <div class="form-group">
                                                        <ul class="mb0">
                                                            <li class="list-inline-item">
                                                                <div id="gallery5">

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                               <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Plan Image</label>
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">

                                                                <input  type="file"
                                                                    accept=".png, .jpg, .jpeg" name="plan_image" id="gallery05">
                                                                <label for="imageUpload"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div id="imagePreview">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->
                                                 <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Carpet Area</label>
                                                            <input type="text" class="form-control" 
                                                            name="carpet_area">
                                                   
                                                         
                                                      </div>
                                                </div>
                                                 <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Metrics</label>
                                                       <select class="form-control" name="metrics_c" >
                                                            <option value="Sqft">Sqft</option>
                                                        </select>
                                                      </div>
                                                </div>
                                               
                                        <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Facing</label>
                                                        <select class="form-control" name="facing" >
                                                            <option value="East">East</option>
                                                            <option value="North">North</option>
                                                            <option value="North East">North East</option>
                                                            <option value="North West">North West</option>
                                                            <option value="South">South</option>
                                                            <option value="South East">South East</option>
                                                            <option value="South West">South West</option>
                                                            
                                                            <option value="West">West</option>
                                                            
                                                            </select>
                                                    </div>
                                                </div>

                                              
                                           
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Pooja Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="pooja_room">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Total Floors</label>
                                                        <input type="text" class="form-control" 
                                                            name="total_floors">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Floor No.</label>
                                                        <input type="text" class="form-control" 
                                                            name="floor_no">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Monthly Maintenance</label>
                                                        <input type="text" class="form-control" 
                                                            name="monthly_maintenance">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Work Station</label>
                                                        <input type="text" class="form-control" 
                                                            name="work_station">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>MD Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="md_room">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Cabins</label>
                                                        <input type="text" class="form-control" 
                                                            name="cabins">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Meeting Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="meeting_room">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Waiting Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="waiting_room">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Server Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="server_room">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Reception</label>
                                                        <input type="text" class="form-control" 
                                                            name="reception">
                                                    </div>
                                                </div>
                                                   <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Building Class</label>
                                                        <input type="text" class="form-control" 
                                                            name="building_class">
                                                    </div>
                                                </div>
                                          <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Pantry</label>
                                                        <select class="form-control" name="pantry" >
                                                            <option value="Dry Pantry">Dry Pantry</option>
                                                            <option value="Wet Pantry">Wet Pantry</option>
                                                            </select>
                                                    </div>
                                                </div>
                                                 <div class="col-4">
                                                    <div class="form-group">
                                                        <label>LEED Certification</label>
                                                        <select class="form-control" name="LEED_certification" >
                                                            <option value="Platinum Certified">Platinum Certified</option>
                                                            <option value="Good certified">Good certified</option>
                                                            </select>
                                                    </div>
                                                </div>

                                         
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>No. of Units Available</label>
                                                        <input type="text" class="form-control" 
                                                            name="no_of_units_available">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Lift</label>
                                                        <input type="text" class="form-control" 
                                                            name="lift">
                                                    </div>
                                                </div>

                                                  <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Power Supply</label>
                                                      
                                                       <select class="form-control" name="power_supply" >
                                                            <option value="Available">available</option>
                                                            <option value="Unavailable">unavailable</option>
                                                            </select>

                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Power Back</label>
                                                             <select class="form-control" name="power_back" >
                                                            <option value="100% back up">100% back up</option>
                                                            <option value="No or Rare power cut">No or Rare power cut</option>
                                                            </select>

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Ideal For</label>
                                                        <select class="form-control" name="ideal_for" >
                                                            <option value="Call Center">Call Center</option>
                                                            <option value="BPO">BPO</option>
                                                            <option value="Coaching Center">Coaching Center</option>
                                                            <option value="Private Consulting">Private Consulting</option>
                                                            <option value="IT/ITES and Related">IT/ITES and Related</option>
                                                            <option value="Private Office">Private Office</option>
                                                            
                                                            </select>
                                                    </div>
                                                </div>
                                                 <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="planDescription">No. of floors</label>
                                                        <select class="form-control" name="floors" >
                                                            <option value="B+G+7 floors">B+G+7 floors</option>
                                                            <option value="Still+10 floors">Still+10 floors</option>
                                                            <option value="B+Still+7 floors">B+Still+7 floors</option>
                                                            <option value="G+4 floors">G+4 floors</option>

                                                        </select>
                                                    </div>
                                                </div>
                                              

                                                  <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Tenants Preferred</label>
                                                        <select class="form-control" name="tenant_preferred" >
                                                            <option value="MNC Company">MNC Company</option>
                                                            <option value="Indian Company">Indian Company</option>
                                                            </select>
                                                    </div>
                                                </div>

                                             
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Over Looking</label>
                                                        <select class="form-control" name="over_looking" >
                                                            <option value="Garden">Garden</option>
                                                            <option value="Park">Park</option>
                                                            <option value="Main Road">Main Road</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Modular Kitchen</label>
                                                        <select class="form-control" name="modular_kitchen" >
                                                            <option value="dry_kitchen">Dry Kitchen</option>
                                                            <option value="wet_kitchen">Wet Kitchen</option>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Security Deposit</label>
                                                        <input type="text" class="form-control" 
                                                            name="security_deposit">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Servant Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="servant_room">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Security Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="security_room">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Driver Room</label>
                                                        <input type="text" class="form-control" 
                                                            name="driver_room">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Open Terrace</label>
                                                        <input type="text" class="form-control" 
                                                            name="open_terrace">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Type of Ownership</label>
                                                        <input type="text" class="form-control" 
                                                            name="type_of_ownership">
                                                    </div>
                                                </div>

                                                 <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Feehold</label>
                                                        
                                                               <select class="form-control" name="feehold_lease" >
                                                            <option value="Feehold lease">Feehold lease</option>
                                                            <option value="POA">POA</option>
                                                            <option value="co-operative society">co-operative society</option>
                                                            </select>
                                           
                                                    </div>
                                                </div>
                                                
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Other Charges</label>
                                                        <input type="text" class="form-control" 
                                                            name="other_charges">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label >Type of Flooring in your rooms</label>
                                                        <select class="form-control" name="type_of_flooring" >
                                                            <option value="Mosaic">Mosaic</option>
                                                            <option value="Vitrified">Vitrified</option>
                                                            <option value="Wooden">Wooden</option>
                                                            <option value="Ceramic Tiles">Ceramic Tiles</option>

                                                            <option value="Italian Marble">Italian Marble</option>
                                                             <option value="Normal Tiles/Kotah Stones">Normal Tiles/Kotah Stones</option>
                                                            <option value="Granite">Granite</option>
                                                            <option value="Marbonite">Marbonite</option>

                                                        </select>
                                                    </div>
                                                
                                            </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Lock in Period</label>
                                                        <input type="text" class="form-control" 
                                                            name="lock_in_period">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Water Availabiltiy</label>
                                                        
                                                             <select class="form-control" name="water_availability" >
                                                            <option value="No">No</option>
                                                            <option value="Less than 10 hrs">Less than 10 hrs</option>
                                                            <option value="24 hrs available">24 hrs available</option>
                                                            </select>
                                           
                                                    </div>
                                                </div>
                                           
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Notice Period</label>
                                                        <input type="text" class="form-control" 
                                                            name="notice_period">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label >Approved By</label>
                                                        <select class="form-control" name="type_of_flooring" >
                                                            <option value="CMDA">CMDA</option>
                                                            <option value="CMC">CMC</option>
                                                            <option value="DTCP">DTCP</option>
                                                           
                                                        </select>
                                                    </div>
                                                
                                            </div>
                                             <div class="col-4">
                                                    <div class="form-group">
                                                        <label >Wheel Chair Friendly</label>
                                                        <select class="form-control" name="wheel_chair_friendly" >
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                           
                                                        </select>
                                                    </div>
                                                
                                            </div>
                                               
                                             <div class="col-4">
                                                    <div class="form-group">
                                                        <label >Pet Friendly</label>
                                                        <select class="form-control" name="pet_friendly" >
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                           
                                                        </select>
                                                    </div>
                                                
                                            </div>

                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Width of Facing Road</label>
                                                        <input type="text" class="form-control" 
                                                            name="width_of_facing_road">
                                                    </div>
                                                </div>
                                                <!-- end col --></div>
                                        <div class="row">
                                                <div class="col-12">

                                                    <ul class="list-inline mb-0 wizard">
                                                        <li class="previous list-inline-item">
                                                            <a href="javascript: void(0);"
                                                                class="btn btn-secondary">Previous</a>
                                                        </li>
                                                        <li class="next list-inline-item float-right">
                                                            <button type="submit" class="btn btn-secondary">Post
                                                                Your Property</button>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                            </form>
                                            <!-- end row -->
                                         
                                           
                                           
                                                <!-- end col -->
                                             <!-- end row -->
                                            
                                          <form this_id="form-0051"  class="insert_data_6" method="post"
                                            role="form" enctype="multipart/form-data" id="display_button" style="display: none;">

                                        <div class="row" >
                                               
                                             
                                             

                                                <div class="col-12">
                                                    <div class="form-group">
                                                    
                                                        <input type="hidden" id="id7"  name="uniq_id"
                                                            value="<?=$_SESSION['id']?>">
                                                        <input type="hidden" value="tbl_additional_info" name="table_name">
                                                         <input type="hidden" value="N" name="display_additionalinfo">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-12">

                                                    <ul class="list-inline mb-0 wizard">
                                                         <li class="previous list-inline-item">
                                                            <a href="javascript: void(0);"
                                                                class="btn btn-secondary">Previous</a>
                                                        </li>
                                                       
                                                        <li class="next list-inline-item float-right">
                                                            <button type="submit" class="btn btn-secondary">Post
                                                                Your Property</button>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                       </div>
                                    </div>

                                    <div class="tab-pane" id="finish-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <h2 class="mt-0"><i class="mdi mdi-check-all"></i>
                                                    </h2>
                                                    <h3 class="mt-0">Thank you !</h3>

                                                    <p class="w-75 mb-2 mx-auto">
                                                       Your Property will be posted after admin approval.</p>


                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </div>
                                        <!--    <ul class="list-inline mb-0 wizard">
                                                        <li class="previous list-inline-item">
                                                            <a href="javascript: void(0);" class="btn btn-secondary">Previous</a>
                                                        </li>
                                                        <li class="next list-inline-item float-right">
                                                            <a href="javascript: void(0);" class="btn btn-secondary">Next</a>
                                                        </li>
                                                    </ul>-->

                                    </div> <!-- tab-content -->
                                </div> <!-- end #progressbarwizard-->


                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
        <script src="<?php echo base_url()?>assets/front/js/jquery-3.3.1.js"></script>
        <script>
        $("#status1").change(function() {
            if ($(this).val() == "Ready to Move") {
                $("#age1").show();
                $("#month1").hide();

                $("#year1").hide();
            } else {
                $("#age1").hide();
                $("#month1").show();

                $("#year1").show();
            }
        });
           $("#furnished").change(function() {
            if (($(this).val() == "Furnished")||($(this).val() == "Semi-Furnished")) {
                $("#ac").show();
                $("#wardrobe").show();
                $("#tv").show();
                $("#sofa").show();
                $("#fridge").show();
                $("#wmachine").show();
                $("#mwave").show();
                $("#dtable").show();
                $("#store_room").show();
                $("#study_room").show();

            } else {
               $("#ac").hide();
                $("#wardrobe").hide();
                $("#tv").hide();
                $("#sofa").hide();
                $("#fridge").hide();
                $("#wmachine").hide();
                $("#mwave").hide();
                $("#dtable").hide();
                $("#store_room").hide();
                $("#study_room").hide();
            }
        });



        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML(
                                    '<img style="width:250px;height: 250px;">'
                                )).attr('src', event.target.result)
                                .appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallery-photo-add').on('change', function() {
                imagesPreview(this, 'div#gallery');
            });
        });

        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML(
                                    '<img style="width:250px;height: 250px;">'
                                )).attr('src', event.target.result)
                                .appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallery-profile').on('change', function() {
                imagesPreview(this, 'div#gallery1');
            });
        });

         $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML(
                                    '<img style="width:250px;height: 250px;">'
                                )).attr('src', event.target.result)
                                .appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallery05').on('change', function() {
                imagesPreview(this, 'div#gallery5');
            });
        });
          $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML(
                                    '<img style="width:250px;height: 250px;">'
                                )).attr('src', event.target.result)
                                .appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#actual').on('change', function() {
                imagesPreview(this, 'div#gallery6');
            });
        });
        
         $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML(
                                    '<img style="width:250px;height: 250px;">'
                                )).attr('src', event.target.result)
                                .appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#banner').on('change', function() {
                imagesPreview(this, 'div#gallery4');
            });
        });
        $('#select_status').on('change', function() {

            var selected_val = $('#select_status').val();

            get_property_type(selected_val);
        });

        $('#select_type').on('change', function() {

            var selected_val2 = $('#select_type').val();
            if(($('#select_status').val()=='17'&&selected_val2=='9')||($('#select_status').val()=='18'&&selected_val2=='11')||($('#select_status').val()=='17'&&selected_val2=='10')||($('#select_status').val()=='18'&&selected_val2=='12'))
            {
                $("#display_luxury").show();
                $("#display_residential_rent").hide();
                $("#display_commercial_rent").hide();

                $("#display_commercial_sale").hide(); 
                $("#display_residential_sale").hide(); 
            }
            else if(($('#select_status').val()=='15'&&selected_val2=='4'))
            {
                $("#display_residential_rent").show();
                $("#display_commercial_rent").hide();

                $("#display_commercial_sale").hide(); 
                $("#display_residential_sale").hide(); 
                $("#display_luxury").hide();

            }

            else if(($('#select_status').val()=='15'&&selected_val2=='8'))
            {
                $("#display_commercial_rent").show();
                $("#display_residential_rent").hide();

                $("#display_commercial_sale").hide(); 
                $("#display_residential_sale").hide(); 
                $("#display_luxury").hide();

            }
              else if(($('#select_status').val()=='14'&&selected_val2=='7'))
            {

                $("#display_residential_sale").show();  
                $("#display_commercial_rent").hide();
                $("#display_residential_rent").hide();

                $("#display_commercial_sale").hide(); 
                $("#display_luxury").hide();

            }
             else if(($('#select_status').val()=='14'&&selected_val2=='3'))
            {

                $("#display_commercial_sale").show();  
                $("#display_commercial_rent").hide();
                $("#display_residential_rent").hide();

                $("#display_residential_sale").hide(); 
                $("#display_luxury").hide();

            }
            else{
                
                 $("#display_button").show();
                 $("#display_commercial_sale").hide();  
                $("#display_commercial_rent").hide();
                $("#display_residential_rent").hide();

                $("#display_residential_sale").hide(); 
                $("#display_luxury").hide();

            }
          
            get_property_category(selected_val2);
        });

        $('#select_category').on('change', function() {

            var selected_val3 = $('#select_category').val();
            get_property_subcategory(selected_val3);
        });
        $('#location').on('change', function() {

            var selected_val = $('#location').val();

            get_property_sublocation(selected_val);
        });

        function get_property_sublocation(status_id) {
            $.ajax({
                url: baseurl + "get-property-sublocation",
                type: 'post',
                data: {
                    status_id: status_id
                },
                dataType: 'json',

                success: function(json) {
                    var options = '';
                    options += '<option value="">Select Sub-location</option>';
                    for (var i = 0; i < json.length; i++) {
                        options += '<option value="' + json[i].id + '">' +
                            json[i].sub_location_name + '</option>';
                    }
                    $("#sublocation").html(options);
                    //alert(options);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText +
                        "\r\n" + xhr.responseText);
                }
            });

        }
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
        $(function () {
            var count=1;
    $("#btnAdd").bind("click", function () {
        var div = $("<div />");
        
        div.html(GetDynamicTextBox("",count));
        $("#TextBoxContainer").append(div);
        count++;
    });
    $("#btnGet").bind("click", function () {
        var values = "";
        $("input[name=bhk[]]").each(function () {
            values += $(this).val() + "\n";
        });
        alert(values);
    });
    $("body").on("click", ".remove", function () {
        $(this).closest("div").remove();
    });
});
function GetDynamicTextBox(value,count) {

                                                
                                                   
                                                       
                                                    
    return '<div class="col-12"> <div class="form-group"> <h4>Floor Plan '+count+'</h4></div</div>'+'<br>'+ '<div class="col-4"><div class="form-group"><label>Title</label>     <input type="text"  class="form-control" name="title[]">    </div></div>   <div class="col-4"><div class="form-group"> <label>BHK</label> <select class="form-control" name="plan_bhk[]" ><option value="1">1 BHK</option><option value="2">2 BHK</option> <option value="3">3 BHK</option><option value="4">4 BHK</option>            <option value="5">5 BHK</option>  <option value="6">6 BHK</option><option value="7">7 BHK</option>  <option value="8">8 BHK</option>    </select>    </div></div><div class="col-4"><div class="form-group"><label>Sqft</label>     <input type="text"  class="form-control" name="sqft[]">    </div></div>      <div class="col-4">   <div class="form-group"><label>Plan Image</label>     <div class="avatar-upload"> <div class="avatar-edit">  <input  type="file" accept=".png, .jpg, .jpeg" name="plan_image[]" id="gallery05"><label for="imageUpload"></label> </div>          <div class="avatar-preview">    <div id="imagePreview">  </div>            </div>    </div>  </div></div><div class="col-12"> <div class="form-group"> <label for="planDescription">Plan Description</label> <textarea class="form-control" id="planDescription" rows="7" name="plan_description[]"></textarea><br><input type="button" value="Remove" class="remove" /> </div>  </div>'
          
            
}
  $(function () {
            var count=2;
    $("#btnAdd2").bind("click", function () {
        var div = $("<div />");
        
        div.html(GetDynamicTextBox2("",count));
        $("#TextBoxContainer2").append(div);
        count++;
    });
    $("body").on("click", ".remove", function () {
        $(this).closest("div").remove();
    });
});
function GetDynamicTextBox2(value,count) {

                                                
                                                   
                                                       
                                                    
    return '<div class="col-12"> <div class="form-group"> <h4>Floor Plan'+count+'</h4></div</div>'+'<br>' 
          + '<div class="col-6"><div class="form-group"><label>No. of floors</label><select class="form-control" name="floor_no[]" > <option value="B">B</option>  <option value="G">G</option>         <option value="S">S</option>    <option value="B+G">B+G</option>    <option value="B+G+S">B+G+S</option>    <option value="B+S">B+S</option> </select>  </div></div> <div class="col-6"><div class="form-group"><label>No. of Rooms</label> <select class="form-control" name="rooms[]" ><option value="1">1</option> <option value="2">2</option> <option value="3">3</option><option value="4">4</option>  <option value="5">5</option> <option value="6">6</option> </select></div></div>'
          
            
}

        </script>
                                                
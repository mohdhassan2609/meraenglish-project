<div class="content-wrapper">
    
    <section class="content">
		<div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <form role="form" action="#" this_id="form-001" class="update_data" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="slug">Column 1 <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" value="<?=html_entity_decode($column1->value)?>" name="value">
										<span class="text-danger error-span">This input is required.</span>
                                        <input type="hidden" value="<?=$column1->column_name?>" name="column_name">
                                        <input type="hidden" value="<?=$column1->option_name?>" name="option_name">
                                        <input type="hidden" value="tbl_bottom_footer" name="table_name">
                                        <input type="hidden" value="<?=$column1->id?>" name="row_id">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary pull-right" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-primary">
                    <form role="form" action="#" this_id="form-002" class="update_data" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="slug">Column 2 <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" value="<?=html_entity_decode($column2->value)?>" name="value">
										<span class="text-danger error-span">This input is required.</span>
                                        <input type="hidden" value="<?=$column2->column_name?>" name="column_name">
                                        <input type="hidden" value="<?=$column2->option_name?>" name="option_name">
                                        <input type="hidden" value="tbl_bottom_footer" name="table_name">
                                        <input type="hidden" value="<?=$column2->id?>" name="row_id">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary pull-right" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-primary">
                    <form role="form" action="#" this_id="form-003" class="update_data" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="slug">Column 3 <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" value="<?=html_entity_decode($column3->value)?>" name="value">
										<span class="text-danger error-span">This input is required.</span>
                                        <input type="hidden" value="<?=$column3->column_name?>" name="column_name">
                                        <input type="hidden" value="<?=$column3->option_name?>" name="option_name">
                                        <input type="hidden" value="tbl_bottom_footer" name="table_name">
                                        <input type="hidden" value="<?=$column3->id?>" name="row_id">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary pull-right" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </section>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
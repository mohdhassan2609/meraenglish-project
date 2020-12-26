<div class="content-wrapper">
    
    <section class="content">
        <div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-md-6">
								<h3 class="margin0">Products List</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body table-responsive">
<table>
     <tr>
       <td>
          <input type='text' readonly id='search_fromdate' class="datepicker" placeholder='From date'>
       </td>
       <td>
          <input type='text' readonly id='search_todate' class="datepicker" placeholder='To date'>
       </td>
       <td>
          <input type='button' id="btn_search" value="Search">
       </td>
     </tr>
   </table>
                  <table class="table table-hover data_table">
					<thead>
						<tr>
							<th>Sl. No.</th>
							<th>Store</th>
							<th>Product Name</th>
							<th>Category</th>
							<th>Price</th>
							<th class="text-center">Actions</th>
							<th class="text-center">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(!empty($records))
						{
							$inc = 1;
							foreach($records as $record)
							{
						?>
						<tr>
							<td><?php echo $inc; ?></td>
							<td>
								<a target="_blank" href="<?=base_url()?>store/<?=$this->common_model->slugify($this->common_model->get_record("tbl_stores", "store_id='" . $record->store_id . "'", "name"));?>/<?=$record->store_id?>">
									<?=$this->common_model->get_record("tbl_stores", "store_id='" . $record->store_id . "'", "name")?><br>
								</a>								
								Store ID: <?php echo $record->store_id ?>
								
								<?php if($this->common_model->get_record("tbl_stores", "store_id='" . $record->store_id . "'", "is_verified") != 1): ?>
									<span class="text-danger"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
								<?php else: ?>
									<span class="text-success"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
								<?php endif; ?>
							</td>
							<td>
								<a target="_blank" href="<?=base_url()?><?=$record->slug?>">
									<?php echo $record->name ?>
								</a>
							</td>
							<td>
								<ul>
									<li>
										<a target="_blank" href="<?=base_url()?><?=$this->common_model->get_record("tbl_category", "id='" . $record->category . "'", "slug")?>">
											<?php echo $this->common_model->get_category_name($record->category) ?>
										</a>
										(Parent)
									</li>
									<li>
										<a target="_blank" href="<?=base_url()?><?=$this->common_model->get_record("tbl_sub_category", "id='" . $record->sub_category . "'", "slug")?>">
											<?php echo $this->common_model->get_sub_category_name($record->sub_category) ?> 
										</a>
										(Sub)
									</li>
									<li>
										<a target="_blank" href="<?=base_url()?><?=$this->common_model->get_record("tbl_child_category", "id='" . $record->child_category . "'", "slug")?>">
											<?php echo $this->common_model->get_child_category_name($record->child_category) ?> 
										</a>
										(Child)
									</li>
								</ul>
							</td>
							<td>₹<?php echo $record->price ?></td>
							<td class="text-center">
								<a class="btn btn-sm btn-info" href="<?=base_url()?>admin/product/<?=$record->id?>"><i class="fa fa-pencil"></i></a>
							</td>
							<td class="text-center">
								<form id="product_status_form_<?=$inc?>" class="update_data">
									<select class="form-control" name="product_status" onchange="$('#product_status_form_<?=$inc?>').submit();">
										<option <?=($record->product_status=="pending"?"selected":"")?> value="pending"> Pending</option>
										<option <?=($record->product_status=="approved"?"selected":"")?> value="approved"> Approve</option>
										<option <?=($record->product_status=="declined"?"selected":"")?> value="declined"> Decline</option>
									</select>
									<input value="tbl_product" name="table_name" type="hidden">
									<input value="<?=$record->id?>" name="row_id" type="hidden">
								</form>
							</td>
						</tr>
						<?php
							$inc++;
							}
						}
						?>
					</tbody>
                  </table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

<!-- jQuery UI CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jQuery UI JS -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
$(document).ready(function(){

   // Datapicker 
   $( ".datepicker" ).datepicker({
      "dateFormat": "yy-mm-dd"
   });

 

  // Search button

/*'ajax': {
       'url':'ajaxfile.php',
       'data': function(data){
          // Read values
          var from_date = $('#search_fromdate').val();
          var to_date = $('#search_todate').val();

          // Append to data
          data.searchByFromdate = from_date;
          data.searchByTodate = to_date;
       }
     }
*/


  $('#btn_search').click(function(){
 
     dataTable.draw();
  });

});
</script>
    
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
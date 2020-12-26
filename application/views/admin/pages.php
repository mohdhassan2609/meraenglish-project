<div class="content-wrapper">
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body table-responsive">
                  <table class="table table-hover data_table">
					<thead>
						<tr>
							<th>Sl. No.</th>
							<th>Page Name</th>
							<th>Type</th>
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
						  <td><?php echo $record->name ?></td>
						  <td><?php echo ucfirst($record->page_type); ?></td>
						  <td class="text-center">
							<?php if($record->page_type == 'customizable'): ?>
								<a class="btn btn-sm btn-success" href="<?=base_url()?>admin/page-editor/<?=$record->id?>"><i class="fa fa-book"></i></a>
							<?php endif; ?>
							
							<a class="btn btn-sm btn-info" href="<?=base_url()?>admin/edit-page/<?=$record->id?>"><i class="fa fa-pencil"></i></a>
							<?php if($record->id != '1'): ?>
								<a class="btn btn-sm btn-danger deletebtn" style="<?php if($record->status == 1){ echo 'display: none;'; } ?>" href="#" data-table="tbl_pages" data-id="<?php echo $record->id; ?>"><i class="fa fa-close"></i></a>
								
								<a class="btn btn-sm btn-success activebtn" style="<?php if($record->status == 0){ echo 'display: none;'; } ?>" href="#" data-table="tbl_pages" data-id="<?php echo $record->id; ?>"><i class="fa fa-check"></i></a>
							<?php endif; ?>
						  </td>
						  <td class="text-center"><?php if($record->status == 0){ echo "<span class='btn btn-sm btn-success'>Active</span>"; }else{  echo "<span class='btn btn-sm btn-danger'>Inactive</span>"; } ?></td>
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
	
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
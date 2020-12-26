<div class="content-page">
    <div class="content">


        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Contact</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Complaint/ Grievance</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">


                        <table data-toggle="table" data-search="true" data-show-refresh="true" data-sort-name="id"
                            data-page-list="[5, 10, 20]" data-page-size="5" data-pagination="true"
                            data-show-pagination-switch="true" class="table-borderless">
                            <thead class="thead-light">
                                <tr>
                                    <th data-field="id" data-sortable="true" data-formatter="">ID</th>
                                    <th data-field="name" data-sortable="true">Name</th>
                                    <th data-field="email" data-sortable="true">Email</th>
                                    <th data-field="subject" data-sortable="true">Subject</th>
                                    <th data-field="message" data-sortable="true">Message</th>



                                    <th data-field="created_on" data-sortable="true" data-formatter="dateFormatter">
                                        Created On
                                    </th>

                                    <th data-field="amount" data-align="center" data-sortable="true"
                                        data-sorter="priceSorter">Actions</th>
                                    <th data-field="status" data-align="center" data-sortable="true"
                                        data-formatter="statusFormatter">Status</th>

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


                                    <td><?php echo $record->name?></td>

                                    <td><?php echo $record->email?></td>
                                    <td><?php echo $record->subject?></td>
                                    <td><?php echo $record->message?></td>
                                    

                                   


                                    <?php
                                    $myvalue = $record->date_time;

                                 $datetime = new DateTime($myvalue);
 
                                     $date = $datetime->format('Y-m-d');
                                   $time = $datetime->format('H:i:s');
                                  ?>

                                    <td><?php echo $date;echo " ".$time?></td>



                                    <td class="text-center">
                                        <?php if($record->id != 0): ?>
                                        <?php if(0 == 1): ?>

                                        <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#addSlider"
                                            onclick="$('#addSlider input[name=sub_category_id]').val('<?=$record->id?>')"><i
                                                class="fa fa-plus"></i></a>
                                        <?php endif; ?>


                                        
                                        <a class="btn btn-danger deletecats <?= $record->id;?>" onclick="myFunction(this,<?= $record->id;?>,'tbl_contact_form')"
                                            style="<?php if($record->status == 1){ echo 'display: none;'; } ?>"
                                            data-table="tbl_contact_form" data-id="<?php echo $record->id; ?>"><i
                                                class="fa fa-times"></i></a>





                                            

                                        <a class="btn btn-sm btn-success activebtn"
                                            style="<?php if($record->status == 0){ echo 'display: none;'; } ?>" href="#"
                                            data-table="tbl_contact_form" data-id="<?php echo $record->id; ?>"><i
                                                class="fe-check"></i></a>
                                        <?php endif; ?>
                                    </td>

                                        



                                    <td class="text-center">
                                        <?php if($record->id != 0): ?>
                                        <?php if($record->status == 0){ echo "<span class='badge label-table badge-success'>Active</span>"; }else{  echo "<span class='badge label-table badge-danger'>Inactive</span>"; } ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php
							$inc++;
							}
						}
						?>








                            </tbody>
                        </table>
                    </div> <!-- end card-box-->
                </div> <!-- end col-->
            </div>







       





        </div> <!-- container -->

    </div> <!-- content -->

</div>


<div class="rightbar-overlay"></div>

<!-- Vendor js -->
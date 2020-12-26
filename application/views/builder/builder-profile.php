
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Proptoday</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Builder</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Profile</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-4 col-xl-4">
                                <div class="card-box text-center">
                                    <img src="<?=base_url()?><?php if($record->builders_image){ echo 'uploads/common/'.$record->builders_image;}else{echo 'uploads/common/'.'user.png';}?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                    <h4 class="mb-0"><?=$record->first_name?></h4>
                                    <p class="text-muted"></p>

                                    <a type="button" href="<?=base_url()?>builder/property" class="btn btn-success btn-xs waves-effect mb-2 waves-light" style="color:white;">Property</a>
                                    <a type="button" href="<?=base_url()?>builder/enquiry-list/<?=$record->id?>" class="btn btn-danger btn-xs waves-effect mb-2 waves-light" style="color:white;">Enquiry</a>

                                    <div class="text-left mt-3">
                                        <h4 class="font-13 text-uppercase">Builders Company Profile :</h4>
                                        <p class="text-muted font-13 mb-3">
                                            <?=$record->description?>
                                        </p>
                                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2"><?=$record->first_name?>
                                                <?=$record->last_name?></span></p>

                                        <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2"><?=$record->mobile?>
                                                </span></p>

                                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 "><?=$record->email?></span></p>

                                     <!--   <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ml-2"></span></p>-->
                                    </div>

                              <!--      <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>-->
                                </div> <!-- end card-box -->

                                 <!--<div class="card-box">
                               <h4 class="header-title mb-3">Inbox</h4>

                                    <div class="inbox-widget slimscroll" style="max-height: 310px;">
                                         <!--   <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets\images\users\user-2.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Tomaslau</p>
                                            <p class="inbox-item-text">I've finished it! See you so...</p>
                                            <p class="inbox-item-date">
                                                <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                            </p>
                                        </div>
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets\images\users\user-3.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Stillnotdavid</p>
                                            <p class="inbox-item-text">This theme is awesome!</p>
                                            <p class="inbox-item-date">
                                                <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                            </p>
                                        </div>
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets\images\users\user-4.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Kurafire</p>
                                            <p class="inbox-item-text">Nice to meet you</p>
                                            <p class="inbox-item-date">
                                                <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                            </p>
                                        </div>

                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets\images\users\user-5.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Shahedk</p>
                                            <p class="inbox-item-text">Hey! there I'm available...</p>
                                            <p class="inbox-item-date">
                                                <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                            </p>
                                        </div>
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets\images\users\user-6.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Adhamdannaway</p>
                                            <p class="inbox-item-text">This theme is awesome!</p>
                                            <p class="inbox-item-date">
                                                <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                            </p>
                                        </div>

                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets\images\users\user-3.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Stillnotdavid</p>
                                            <p class="inbox-item-text">This theme is awesome!</p>
                                            <p class="inbox-item-date">
                                                <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                            </p>
                                        </div>
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="assets\images\users\user-4.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Kurafire</p>
                                            <p class="inbox-item-text">Nice to meet you</p>
                                            <p class="inbox-item-date">
                                                <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                            </p>
                                        </div>
                                    </div>

                                </div>-->

                            </div> 

                            <div class="col-lg-8 col-xl-8">
                                <div class="card-box">
                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                        <li class="nav-item">
                                            <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Profile
                                            </a>
                                        </li>
                                       <!-- <li class="nav-item">
                                            <a href="#timeline" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                Timeline
                                            </a>
                                        </li>-->
                                        <li class="nav-item">
                                            <a href="#settings" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                Settings
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="aboutme">
                                            <form class="update_data" this_id="005" method="POST" role="form">
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="firstname">First Name</label>
                                                            <input type="text" class="form-control" id="firstname" placeholder="Enter first name" value="<?=$record->first_name?>" name="first_name">
                                                            <input type="hidden" value="tbl_builder_register" name="table_name">
                                                             <input type="hidden" value="<?=$record->id?>" name="row_id">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastname">Last Name</label>
                                                            <input type="text" class="form-control" id="lastname" placeholder="Enter last name" value="<?=$record->last_name?>" name="last_name">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="userbio">Builders Company Profile</label>
                                                            <textarea class="form-control" id="editor1" rows="4" placeholder="Write something..." value="<?=$record->description?>" name="description"></textarea>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="useremail">Email Address</label>
                                                            <input type="email" class="form-control" id="useremail" placeholder="Enter email" value="<?=$record->email?>" name="email">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="bn">Company Name</label>
                                                            <input type="text" class="form-control" id="bn" value="<?=$record->builders_name?>" name="builders_name">
                                                            
                                                        </div>
                                                    </div>


                                                    <!-- end col -->
                                                </div> <!-- end row -->
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                </div>
                                            </form>
                                            
                                           <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i>Set Company Logo</h5>
                                               <form class="update_data" this_id="006" method="POST" role="form">
                                             <div class="row">
                                                     <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="profile">Company Logo</label>
                                                            <input type="file" class="form-control"  name="builders_image" id="gallery3" required>
                                                            <input type="hidden" class="form-control"  name="row_id" value="<?=$record->id?>" >
                                                            <input type="hidden" value="tbl_builder_register" name="table_name">
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                    <div class="form-group">
                                                        <ul class="mb0">
                                                            <li class="list-inline-item">
                                                                <div id="gallery03">

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                                                                 </div> 
                                          
                                                
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                </div>
                                            </form>
                                            </div>

                                         <!-- end tab-pane -->
                                        <!-- end about me section content -->

                               <!--         <div class="tab-pane" id="timeline">

                                            <form action="#" class="comment-area-box mt-2 mb-3">
                                                <span class="input-icon">
                                                    <textarea rows="3" class="form-control" placeholder="Write something..."></textarea>
                                                </span>
                                                <div class="comment-area-btn">
                                                    <div class="float-right">
                                                        <button type="submit" class="btn btn-sm btn-dark waves-effect waves-light">Post</button>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="btn btn-sm btn-light text-black-50"><i class="far fa-user"></i></a>
                                                        <a href="#" class="btn btn-sm btn-light text-black-50"><i class="fa fa-map-marker-alt"></i></a>
                                                        <a href="#" class="btn btn-sm btn-light text-black-50"><i class="fa fa-camera"></i></a>
                                                        <a href="#" class="btn btn-sm btn-light text-black-50"><i class="far fa-smile"></i></a>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="border border-light p-2 mb-3">
                                                <div class="media">
                                                    <img class="mr-2 avatar-sm rounded-circle" src="assets\images\users\user-3.jpg" alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="m-0">Jeremy Tomlinson</h5>
                                                        <p class="text-muted"><small>about 2 minuts ago</small></p>
                                                    </div>
                                                </div>
                                                <p>Story based around the idea of time lapse, animation to post soon!</p>

                                                <img src="assets\images\small\img-1.jpg" alt="post-img" class="rounded mr-1" height="60">
                                                <img src="assets\images\small\img-2.jpg" alt="post-img" class="rounded mr-1" height="60">
                                                <img src="assets\images\small\img-3.jpg" alt="post-img" class="rounded" height="60">

                                                <div class="mt-2">
                                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-reply"></i> Reply</a>
                                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-heart-outline"></i> Like</a>
                                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                                                </div>
                                            </div>

                                            <div class="border border-light p-2 mb-3">
                                                <div class="media">
                                                    <img class="mr-2 avatar-sm rounded-circle" src="assets\images\users\user-4.jpg" alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="m-0">Thelma Fridley</h5>
                                                        <p class="text-muted"><small>about 1 hour ago</small></p>
                                                    </div>
                                                </div>
                                                <div class="font-16 text-center font-italic text-dark">
                                                    <i class="mdi mdi-format-quote-open font-20"></i> Cras sit amet nibh libero, in
                                                    gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                                                    purus odio, vestibulum in vulputate at, tempus viverra turpis. Duis
                                                    sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper
                                                    porta. Mauris massa.
                                                </div>

                                                <div class="post-user-comment-box">
                                                    <div class="media">
                                                        <img class="mr-2 avatar-sm rounded-circle" src="assets\images\users\user-3.jpg" alt="Generic placeholder image">
                                                        <div class="media-body">
                                                            <h5 class="mt-0">Jeremy Tomlinson <small class="text-muted">3 hours ago</small></h5>
                                                            Nice work, makes me think of The Money Pit.

                                                            <br>
                                                            <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="mdi mdi-reply"></i> Reply</a>

                                                            <div class="media mt-3">
                                                                <a class="pr-2" href="#">
                                                                    <img src="assets\images\users\user-4.jpg" class="avatar-sm rounded-circle" alt="Generic placeholder image">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h5 class="mt-0">Kathleen Thomas <small class="text-muted">5 hours ago</small></h5>
                                                                    i'm in the middle of a timelapse animation myself! (Very different though.) Awesome stuff.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="media mt-2">
                                                        <a class="pr-2" href="#">
                                                            <img src="assets\images\users\user-1.jpg" class="rounded-circle" alt="Generic placeholder image" height="31">
                                                        </a>
                                                        <div class="media-body">
                                                            <input type="text" id="simpleinput" class="form-control border-0 form-control-sm" placeholder="Add comment">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-2">
                                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-danger"><i class="mdi mdi-heart"></i> Like (28)</a>
                                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                                                </div>
                                            </div>

                                            <div class="border border-light p-2 mb-3">
                                                <div class="media">
                                                    <img class="mr-2 avatar-sm rounded-circle" src="assets\images\users\user-6.jpg" alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="m-0">Jeremy Tomlinson</h5>
                                                        <p class="text-muted"><small>15 hours ago</small></p>
                                                    </div>
                                                </div>
                                                <p>The parallax is a little odd but O.o that house build is awesome!!</p>

                                                <iframe src='https://player.vimeo.com/video/87993762' height='300' class="img-fluid border-0"></iframe>
                                            </div>

                                            <div class="text-center">
                                                <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading mr-1"></i> Load more </a>
                                            </div>

                                        </div>-->

                                        <div class="tab-pane" id="settings">
                                               <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i> Change Password</h5>
                                               <form class="change_builder_pwd" this_id="006" method="POST" role="form">
                                             <div class="row">
                                                     <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="userpassword">Password</label>
                                                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="old_password" required>
                                                            <input type="hidden" class="form-control"  name="id" value="<?=$record->id?>" >
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="pwd1">New Password</label>
                                                            <input type="password" class="form-control" id="pwd1" name="password" required>
                                        
                                              </div>                                               </div> 
                                              <div class="col-md-6">
                                                        <div class="form-group">
                                                           <label for="pwd2">Confirm New Password</label>
                                                        <input type="password" class="form-control" id="pwd2" name="confirm_password" required>
                                                    </div>
                                              </div>                                               </div> 
                                          
                                              <!--  <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth mr-1"></i> Social</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="social-fb">Facebook</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fab fa-facebook-square"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control" id="social-fb" placeholder="Url">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="social-tw">Twitter</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control" id="social-tw" placeholder="Username">
                                                            </div>
                                                        </div>
                                                    </div>                                                </div>  

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="social-insta">Instagram</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control" id="social-insta" placeholder="Url">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="social-lin">Linkedin</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control" id="social-lin" placeholder="Url">
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div> 

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="social-sky">Skype</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fab fa-skype"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control" id="social-sky" placeholder="@username">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="social-gh">Github</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fab fa-github"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control" id="social-gh" placeholder="Username">
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>-->
                                                
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                        <!-- end settings content-->
                                    </div>
                                    </div> <!-- end tab-content -->
                                </div> <!-- end card-box-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

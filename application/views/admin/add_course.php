<div class="content-page">
    <div class="content">


        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Courses</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Add Course</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                            <form role="form" action="<?php echo base_url() ?>admin/add_category_post"
                                  this_id="form-001" class="insert_data" method="post" role="form">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="ins_name"><h3><b>Course Details</b></h3></label>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="course_title">Course Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" name="course_title">

                                        <span class="text-danger error-span">This input is required.</span>
                                        <input type="hidden" value="tbl_courses" name="table_name">
                                        <input type="hidden" value="" name="row_id">


                                    </div>

                                    <div class="form-group col-md-6">

                                        <label>Course Type<span class="text-danger">*</span></label>

                                        <select class="form-control selectpicker required"
                                                data-live-search="true" data-width="100%"
                                                name="course_type" id="course_type" >
                                            <option value="">--Course Type-- </option>

                                            <option value="1">Video Based Course</option>

                                            <option value="2">Text Based Course</option>

                                        </select>
                                        <span class="text-danger error-span">This input is required.</span>

                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="course_banner">Course Banner</label>
                                        <input type="file" class="form-control" name="course_banner">
                                        <span class="text-danger error-span">This input is required.</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="course_banner">Course Banner 2</label>
                                        <input type="file" class="form-control" name="course_banner_1">
                                        <span class="text-danger error-span">This input is required.</span>
                                    </div>

                                    <div class="form-group col-md-6" id="text1">
                                        <label for="course_video">Course Preview Video</label>
                                        <input type="text" class="form-control" name="preview_video">
                                        <span class="text-danger error-span">This input is required.</span>

                                    </div>
                                    <div class="form-group col-md-6">

                                        <label>Course Amount Type <span class="text-danger">*</span></label>

                                        <select class="form-control selectpicker required"
                                                data-live-search="true" data-width="100%"
                                                name="course_amt_type" id="course_amt_type" >
                                            <option value="">--Course Amount Type--</option>
                                            <option value="1">Paid Course</option>
                                            <option value="2">Free Course</option>
                                        </select>
                                        <span class="text-danger error-span">This input is required.</span>

                                    </div>
                                    <div class="form-group col-md-6" id="amt_type">

                                        <label for="cost">Cost</label>
                                        <input type="text" class="form-control" name="cost">

                                    </div>
                                    <div class="form-group col-md-6" id="amt_type_1">

                                        <label for="discount_price">Strikeout Price</label>
                                        <input type="text" class="form-control" name="discount_price">

                                    </div>
                                    <div class="form-group col-md-6" id="text">

                                        <label for="duration">Duration </label>
                                        <input type="text" class="form-control" name="duration" placeholder="6h 40min">
                                    </div>
                                    <div class="form-group col-md-6">

                                        <label for="description">Course Banner Description </label>
                                        <textarea class="form-control simple required" name="description"></textarea>
                                        <span class="text-danger error-span">This input is required.</span>

                                    </div>
                                    <div class="form-group col-md-6">

                                        <label for="course_overview">Course Overview </label>
                                        <textarea class="form-control simple required" name="course_overview"></textarea>
                                        <span class="text-danger error-span">This input is required.</span>
                                    </div>
                                    <div class="form-group col-md-6">

                                        <label for="requirements">Requirements </label>
                                        <textarea class="form-control simple required" name="requirements"></textarea>
                                        <span class="text-danger error-span">This input is required.</span>
                                    </div>
                                    <div class="form-group col-md-6">

                                        <label for="what_you_will_learn">What you'll learn </label>
                                        <textarea class="form-control simple required" name="what_you_will_learn"></textarea>
                                        <span class="text-danger error-span">This input is required.</span>
                                    </div>

                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="ins_name"><h3><b>Course Features</b></h3></label>
                                    </div>

                                    <div class="form-group col-md-6">

                                        <label for="duration">Student Views</label>
                                        <input type="text" class="form-control required" name="features[]" placeholder="3k Students View">
                                        <span class="text-danger error-span">This input is required.</span>
                                    </div>

                                    <div class="form-group col-md-6" id="text3">

                                        <label for="duration">Duration</label>
                                        <input type="text" class="form-control" name="features[]" placeholder="2 hour 30 min">
                                    </div>

                                    <div class="form-group col-md-6">

                                        <label for="features">Principiante</label>
                                        <input type="text" class="form-control" name="features[]" placeholder="Principiante">
                                        <span class="text-danger error-span">This input is required.</span>
                                    </div>

                                    <div class="form-group col-md-6">

                                        <label for="features">Student Views</label>
                                        <input type="text" class="form-control" name="features[]" placeholder="04 Certified">
                                        <span class="text-danger error-span">This input is required.</span>
                                    </div>


                                    <!--                                
                            <div class="form-group col-md-6">

                                <label for="course_validation">Course Validation </label>
                                <input type="text" class="form-control" name="course_validation">

                            </div>  -->
                                    <br>
                                    <div class="form-group col-md-12" id="text6">
                                        <label for="ins_name"><h3><b>Instructor Details</b></h3></label>
                                    </div>

                                    <div class="form-group col-md-6" id="text7">
                                        <label for="ins_name">Instructor Name</label>
                                        <input type="text" class="form-control" name="ins_name">
                                    </div>
                                    <div class="form-group col-md-6" id="text8">

                                        <label for="ins_img">Instructor Image </label>

                                        <input type="file" class="form-control" name="ins_img">

                                    </div>  
                                    <div class="form-group col-md-4" id="text9">

                                        <label for="no_of_videos">No. of Videos</label>
                                        <input type="text" class="form-control" name="no_of_videos">

                                    </div>  
                                    <div class="form-group col-md-4" id="text10">

                                        <label for="no_of_lectures">No. of lectures </label>
                                        <input type="text" class="form-control" name="no_of_lectures">

                                    </div>  
                                    <div class="form-group col-md-4" id="text11">

                                        <label for="ins_experience">Instructor Experience </label>
                                        <input type="text" class="form-control" name="ins_experience">

                                    </div>  
                                    <div class="form-group col-md-12" id="text12">

                                        <label for="ins_description">Instructor Description </label>
                                        <textarea class="form-control simple" name="ins_description"></textarea>
                                    </div>  

                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!-- content -->
</div>

<div class="rightbar-overlay"></div>
<!-- Vendor js -->
<script>
    $("#course_type").change(function () {
        if ($(this).val() == 2)
        {
            $("#text").hide();
            $("#text1").hide();
            $("#text3").hide();
            $("#text6").hide();
            $("#text7").hide();
            $("#text8").hide();
            $("#text9").hide();
            $("#text10").hide();
            $("#text11").hide();
            $("#text12").hide();
        } else
        {
            $("#text").show();
            $("#text1").show();
            $("#text3").show();
            $("#text6").show();
            $("#text7").show();
            $("#text8").show();
            $("#text9").show();
            $("#text10").show();
            $("#text11").show();
            $("#text12").show();
        }
    });

    $("#course_amt_type").change(function () {
        if ($(this).val() == 2) {
            $('#amt_type').hide();
            $('#amt_type_1').hide();
        } else {
            $('#amt_type').show();
            $('#amt_type_1').show();
        }
    });
    $('.removeData').click(function (e) {
        e.preventDefault();
        if (confirm("Press a button!") === true) {
            var table = $(this).attr('data-table');
            var row_id = $(this).attr('data-id');
            var tis = this;
            $.ajax({
                type: 'POST',
                url: baseURL + "admin/removeData",
                data: 'table_name=' + table + '&row_id=' + row_id + '&status=1',
                dataType: "json",
                success: function (response) {
                    if (response.result == 1) {
                        toastr.success('Success!');
                        $(tis).hide();
                        $(tis).next('.activebtn').show();
                        $(tis).parent().next('td').html(
                                "<span class='badge label-table badge-danger'>Inactive</span>");
                    } else if (response.result == 2) {
                        toastr.success('something went wrong!');
                    }

                }
            });
        }
    });

// 
</script>
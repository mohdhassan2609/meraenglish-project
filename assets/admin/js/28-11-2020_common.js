/**
 * @author Praveen Murali
 */


jQuery(document).ready(function () {

    jQuery(document).on("click", ".deleteUser", function () {
        var userId = $(this).data("userid"),
                hitURL = baseURL + "deleteUser",
                currentRow = $(this);

        var confirmation = confirm("Are you sure to delete this user ?");

        if (confirmation)
        {
            jQuery.ajax({
                type: "POST",
                dataType: "json",
                url: hitURL,
                data: {userId: userId}
            }).done(function (data) {
                console.log(data);
                currentRow.parents('tr').remove();
                if (data.status = true) {
                    alert("User successfully deleted");
                } else if (data.status = false) {
                    alert("User deletion failed");
                } else {
                    alert("Access denied..!");
                }
            });
        }
    });


    jQuery(document).on("click", ".searchList", function () {

    });

});












$('.insert_data_1').submit(function (e) {
    e.preventDefault();

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    if (is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/form1",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');
            },
            success: function (response) {
                console.log(response)
                if (response.result == 1)
                {
                    //toastr.success('Success!');


                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                    $("#id").val(response.uniq_id);
                    $("#form11").val(response.uniq_id);
                    $(".ps-tab").removeClass("active");
                    $("#step-2").addClass("active");


                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else
    {
        toastr.error('Please check the required fields!');
    }

});



$('.insert_data_2').submit(function (e) {
    e.preventDefault();

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    if (is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/form2",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');
            },
            success: function (response) {
                console.log(response)
                if (response.result == 1)
                {
                    //toastr.success('Success!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                    $("#id2").val(response.uniq_id);

                    $("#form11").val(response.uniq_id);
                    $(".ps-tab").removeClass("active");
                    $("#step-3").addClass("active");



                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else
    {
        toastr.error('Please check the required fields!');
    }

});



$('.insert_data_3').submit(function (e) {
    e.preventDefault();

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    if (is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/form3",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');
            },
            success: function (response) {
                console.log(response)
                if (response.result == 1)
                {
                    //toastr.success('Success!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                    $("#id3").val(response.uniq_id);

                    $(".ps-tab").removeClass("active");
                    $("#step-4").addClass("active");


                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else
    {
        toastr.error('Please check the required fields!');
    }

});

$('.insert_data_4').submit(function (e) {
    e.preventDefault();

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    if (is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/form4",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');
            },
            success: function (response) {
                console.log(response)
                if (response.result == 1)
                {
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                    $("#id5").val(response.uniq_id);
                    $("#id6").val(response.uniq_id);
                    $(".ps-tab").removeClass("active");
                    $("#step-5").addClass("active");
                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else
    {
        toastr.error('Please check the required fields!');
    }

});
$('.insert_data_5').submit(function (e) {
    e.preventDefault();

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    if (is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/form5",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');
            },
            success: function (response) {
                console.log(response)
                if (response.result == 1)
                {
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                    $("#id6").val(response.uniq_id);
                    $("#id7").val(response.uniq_id);
                    // window.location.href="property";


                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else
    {
        toastr.error('Please check the required fields!');
    }

});

$('.insert_data_6').submit(function (e) {
    e.preventDefault();

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    if (is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/form6",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');
            },
            success: function (response) {
                console.log(response)
                if (response.result == 1)
                {
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                    $("#id6").val(response.uniq_id);
                    $("#id7").val(response.uniq_id);
                    window.location.href = "property";


                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else
    {
        toastr.error('Please check the required fields!');
    }

});

$('.new_page').submit(function (e) {
    e.preventDefault();

    $('input[name=content]').val($('.new_page .ck-content').html());

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    if (is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/insert",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');
            },
            success: function (response) {
                console.log(response)
                if (response.result == 1)
                {
                    $(this_id)[0].reset();
                    toastr.success('Success!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else
    {
        toastr.error('Please check the required fields!');
    }
});

$('.update_page').submit(function (e) {
    e.preventDefault();

    $('input[name=content]').val($('.update_page .ck-content').html());

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    if (is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/update",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');
            },
            success: function (response) {
                if (response.result == 1)
                {
                    toastr.success('Success!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else
    {
        toastr.error('Please check the required fields!');
    }
});





$('.insert_data').submit(function (e) {
    e.preventDefault();

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
    if (is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/insert",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,

            success: function (response) {
                console.log(response)
                if (response.result == 1)
                {
                    //location.reload();
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                    //alert(response.insert_id);
                    $("#builder_id").val(response.insert_id);
                    $("#idreg").val(response.uniq_id);
                    toastr.success('Success');

                    //window.location.href="builder/add-property";

                } else if (response.result == 2)
                {
                    toastr.error('Email Id already registered with us');
                } else if (response.result == 3)
                {
                    toastr.error('Contact already registered with us');
                } else if (response.result == 4)
                {
                    toastr.error('Account Blocked!! contact admin');
                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else
    {
        toastr.error('Please check the required fields!');
    }

});




$('.file_data').submit(function (e) {
    e.preventDefault();

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    if (is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/file_update",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');
            },
            success: function (response) {
                console.log(response)
                if (response.result == 1)
                {
                    $(this_id)[0].reset();
                    toastr.success('Success!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');



                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else
    {
        toastr.error('Please check the required fields!');
    }
});


$('.update_tags').submit(function (e) {
    e.preventDefault();


    var selected_tags = $('#select_tags').val();

    $table_name = $('.update_tags input[name=table_name]').val();
    $row_id = $('.update_tags input[name=row_id]').val();


    Swal.fire({
        title: 'Are you sure?',
        text: "You want To add tags," + selected_tags,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.value) {


            $.ajax({
                type: 'POST',
                url: baseURL + "admin/tags_insert",
                data: 'table_name=' + $table_name + '&row_id=' + $row_id + '&tags=' + selected_tags,
                dataType: "json",
                success: function (response) {
                    if (response.result == 1)
                    {

                        setTimeout(function () {
                            location.reload(1);
                        }, 2000);

                        document.getElementsByClassName(row_id).style.display = "none";



                        $(this).parent().next('td').html("<span class='btn btn-sm btn-danger'>Inactive</span>");



                    } else
                    {
                        toastr.error('Something went wrong! Please try again later!');
                    }
                }
            });


            Swal.fire(
                    'You added tags!',
                    'Your Record  is Updated.',
                    'success'
                    )



        }
    })
});






function myFunction(obj, row_id, table) {






    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {


            $.ajax({
                type: 'POST',
                url: baseURL + "admin/update",
                data: 'table_name=' + table + '&row_id=' + row_id + '&status=1',
                dataType: "json",
                success: function (response) {
                    if (response.result == 1)
                    {

                        setTimeout(function () {
                            location.reload(1);
                        }, 2000);

                        document.getElementsByClassName(row_id).style.display = "none";



                        $(this).parent().next('td').html("<span class='btn btn-sm btn-danger'>Inactive</span>");



                    } else
                    {
                        toastr.error('Something went wrong! Please try again later!');
                    }
                }
            });


            Swal.fire(
                    'Deleted!',
                    'Your Record  has been deleted.',
                    'success'
                    )



        }
    })


}

function myFunction1(obj, row_id, table) {






    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {


            $.ajax({
                type: 'POST',
                url: baseURL + "admin/update-admin-user",
                data: 'table_name=' + table + '&row_id=' + row_id + '&isDeleted=1',
                dataType: "json",
                success: function (response) {
                    if (response.result == 1)
                    {

                        setTimeout(function () {
                            location.reload(1);
                        }, 2000);

                        document.getElementsByClassName(row_id).style.display = "none";



                        $(this).parent().next('td').html("<span class='btn btn-sm btn-danger'>Inactive</span>");



                    } else
                    {
                        toastr.error('Something went wrong! Please try again later!');
                    }
                }
            });


            Swal.fire(
                    'Deleted!',
                    'Your Record  has been deleted.',
                    'success'
                    )



        }
    })


}

$('.change_builder_pwd').submit(function (e) {
    e.preventDefault();

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
    var validity = 0;

    var old_password = $("#pwd").val();
    var password = $("#pwd1").val();
    var confirm_Password = $("#pwd2").val();
    if (old_password == password || old_password == confirm_Password)
    {
        toastr.error("Old password and new password must not be same");
        $("#pwd1").val("");
        $("#pwd2").val("");
        return false;
    } else if (password != confirm_Password)
    {
        toastr.error("Passwords do not match");
        $("#pwd1").val("");
        $("#pwd2").val("");
        return false;
    } else
        validity++;



    if (validity == 1) {

        $.ajax({
            type: 'POST',
            url: baseURL + "builder/builder_change_password",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');
            },
            success: function (response) {
                console.log(response)
                if (response.result == 1)
                {
                    toastr.success('Success!');

                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                    $("#pwd").val("");

                    $("#pwd1").val("");
                    $("#pwd2").val("");


                } else if (response.result == 0)
                {
                    toastr.error('Old Password is Incorrect!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else
    {
        toastr.error('Please check the required fields!');
    }

});


function statusChange(obj, row_id, status, field, table) {

    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Update it!'
    }).then((result) => {
        if (result.value) {


            $.ajax({
                type: 'POST',
                url: baseURL + "admin/status-update",
                data: 'table=' + table + '&row_id=' + row_id + '&status=' + status + '&field=' + field,
                dataType: "json",
                success: function (response) {
                    if (response.result == 1)
                    {

                        setTimeout(function () {
                            location.reload(1);
                        }, 2000);

                        document.getElementsByClassName(row_id).style.display = "none";



                        //$(this).parent().next('td').html("<span class='btn btn-sm btn-danger'>Inactive</span>");



                    } else
                    {
                        toastr.error('Something went wrong! Please try again later!');
                    }
                }
            });


            Swal.fire(
                    'Updated!',
                    'Your Record  has been Updated.',
                    'success'
                    )



        }
    })

}

function myFunctionactivate(obj, row_id, table) {

    Swal.fire({
        title: 'Are you sure?',
        text: "You want to activate this section!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Activate it!'
    }).then((result) => {
        if (result.value) {


            $.ajax({
                type: 'POST',
                url: baseURL + "admin/activate",
                data: 'table_name=' + table + '&row_id=' + row_id + '&status=1',
                dataType: "json",
                success: function (response) {
                    if (response.result == 1)
                    {

                        setTimeout(function () {
                            location.reload(1);
                        }, 2000);

                        document.getElementsByClassName(row_id).style.display = "none";





                    } else
                    {
                        toastr.error('Something went wrong! Please try again later!');
                    }
                }
            });


            Swal.fire(
                    'Activated!',
                    'Your Record  has been Activated.',
                    'success'
                    )



        }
    })




}


$('.update_data').submit(function (e) {
    e.preventDefault();

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    if (is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/update",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');

            },
            success: function (response) {
                if (response.result == 1)
                {
                    toastr.success('Success!');

                    $(this_id + ' input[type=submit]').removeAttr('disabled');

                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else
    {
        toastr.error('Please check the required fields!');
    }
});
$('.builder_update_data').submit(function (e) {
    e.preventDefault();

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    if (is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "builder/builder-update",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');

            },
            success: function (response) {
                if (response.result == 1)
                {
                    toastr.success('Success!');

                    $(this_id + ' input[type=submit]').removeAttr('disabled');

                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else
    {
        toastr.error('Please check the required fields!');
    }
});

$('.deletebtn').click(function (e) {
    e.preventDefault();

    if (confirm("Press a button!") === true)
    {
        var table = $(this).attr('data-table');
        var row_id = $(this).attr('data-id');
        var tis = this;
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/update",
            data: 'table_name=' + table + '&row_id=' + row_id + '&status=1',
            dataType: "json",
            success: function (response) {
                if (response.result == 1)
                {
                    toastr.success('Success!');
                    $(tis).hide();
                    $(tis).next('.activebtn').show();
                    $(tis).parent().next('td').html("<span class='btn btn-sm btn-danger'>Inactive</span>");
                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                }
            }
        });
    }
});

$('.deletecats').click(function (e) {
    e.preventDefault();

    if (confirm("Press a button!") === true)
    {
        var table = $(this).attr('data-table');
        var row_id = $(this).attr('data-id');
        var tis = this;
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/deletecats",
            data: 'table_name=' + table + '&row_id=' + row_id + '&status=1',
            dataType: "json",
            success: function (response) {
                if (response.result == 1)
                {
                    toastr.success('Success!');
                    $(tis).hide();
                    $(tis).next('.activebtn').show();
                    $(tis).parent().next('td').html("<span class='btn btn-sm btn-danger'>Inactive</span>");
                } else if (response.result == 2) {
                    toastr.success('something went wrong!');

                }

            }
        });
    }
});
$('.builder_image_data').submit(function (e) {
    e.preventDefault();

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    if (is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/builder-image-update",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');

            },
            success: function (response) {
                if (response.result == 1)
                {
                    toastr.success('Success!');

                    $(this_id + ' input[type=submit]').removeAttr('disabled');

                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else
    {
        toastr.error('Please check the required fields!');
    }
});

$('.deletelist').click(function (e) {
    e.preventDefault();

    if (confirm("Press a button!") === true)
    {
        var table = $(this).attr('data-table');
        var row_id = $(this).attr('data-id');
        var tis = this;
        $.ajax({
            type: 'POST',
            url: baseURL + "builder/delete",
            data: 'table_name=' + table + '&row_id=' + row_id + '&status=1',
            dataType: "json",
            success: function (response) {
                if (response.result == 1)
                {
                    toastr.success('Success!');
                    $(tis).hide();
                    $(tis).next('.activebtn').show();
                    $(tis).parent().next('td').html("<span class='btn btn-sm btn-danger'>Inactive</span>");
                } else if (response.result == 2) {
                    toastr.success('something went wrong!');

                }

            }
        });
    }
});

$('.delete').click(function (e) {
    e.preventDefault();

    if (confirm("Press a button!") === true)
    {
        var table = $(this).attr('data-table');
        var row_id = $(this).attr('data-id');
        var tis = this;
        var status = $(this).attr('data-status');

        print(status);
        $.ajax({
            type: 'GET',
            url: baseURL + "admin/delete",
            data: 'table_name=' + table + '&id=' + row_id + '&id2=' + status,
            dataType: "json",
            success: function (response) {
                if (response.result == 1)
                {
                    toastr.success('Success!');
                    $(tis).hide();
                    $(tis).next('.activebtn').show();
                    $(tis).parent().next('td').html("<span class='btn btn-sm btn-danger'>Inactive</span>");
                }
                if (response.result == 2)
                {
                    toastr.error(response.msg);
                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                }
            }
        });
    }
});






$('.activebtn').click(function (e) {
    e.preventDefault();

    if (confirm("Press a button!") === true)
    {
        var table = $(this).attr('data-table');
        var row_id = $(this).attr('data-id');
        var tis = this;
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/update",
            data: 'table_name=' + table + '&row_id=' + row_id + '&status=0',
            dataType: "json",
            success: function (response) {
                if (response.result == 1)
                {
                    toastr.success('Success!');
                    $(tis).hide();
                    $(tis).prev('.deletebtn').show();
                    $(tis).parent().next('td').html("<span class='btn btn-sm btn-success'>Active</span>");
                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                }
            }
        });
    }
});

function update_table_data(this_id)
{
    var table = $(this_id).next().attr('data-table');
    var page_section_id = $(this_id).next().attr('data-page-section-id');

    $.ajax({
        type: 'POST',
        url: baseURL + "admin/get-table-data",
        data: 'table_name=' + table + '&page_section_id=' + page_section_id,
        //dataType: "json",
        success: function (response) {
            $(this_id).next().html(response);
        }
    });
}

function is_required(this_id) {
    $('.error-span').hide();
    var inc = 0;
    $(this_id + " .required").each(function () {
        console.log($(this).attr('name'));
        if ($(this).val() !== "undefined")
        {
            if ($(this).val() != null)
            {
                if (($(this).val()).length > 0)
                {

                } else
                {
                    console.log($(this).attr('name'));
                    $(this).next("span").show();
                    inc++;
                }
            } else
            {
                toastr.error('Something went wrong on ' + $(this).attr('name'));
                inc++;
            }
        }
    });
    if (inc === 0)
    {
        return true;
    }
    return false;
}

$('input').attr("autocomplete", "new-password");

$('.update_data_amenities').submit(function (e) {
    e.preventDefault();

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    if (is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "builder/update-amenities",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');
            },
            success: function (response) {
                console.log(response)
                if (response.result == 1)
                {
                    $(this_id)[0].reset();
                    toastr.success('Success!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                    window.location.reload();

                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else
    {
        toastr.error('Please check the required fields!');
    }
});


function CKupdate() {
    for (var instanceName in CKEDITOR.instances) {
        CKEDITOR.instances[instanceName].updateElement();
    }
}

$('.insert_data_7').submit(function (e) {
    e.preventDefault();
    CKupdate();

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    if (is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/form7",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');
            },
            success: function (response) {
                console.log(response)
                if (response.result == 1)
                {
                    toastr.success('Success!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                    $("#id6").val(response.uniq_id);
                    $("#id7").val(response.uniq_id);
//                    window.location.href = "property";


                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    } else
    {
        toastr.error('Please check the required fields!');
    }

});

$('.update_data_7').submit(function (e) {
    e.preventDefault();

    CKupdate();

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    $.ajax({
        type: 'POST',
        url: baseURL + "admin/update_form7",
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        processData: false,
        beforeSend: function () {
            $(this_id + ' input[type=submit]').attr('disabled', 'true');
        },
        success: function (response) {
            console.log(response)
            if (response.result == 1)
            {
                toastr.success('Success!');
                $(this_id + ' input[type=submit]').removeAttr('disabled');

                location.reload();
            } else
            {
                toastr.error('Something went wrong! Please try again later!');
                $(this_id + ' input[type=submit]').removeAttr('disabled');
            }
        }
    });


});

$('.text_edit_form').submit(function (e) {
    e.preventDefault();

    CKupdate();

    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';

    $.ajax({
        type: 'POST',
        url: baseURL + "admin/text-edit-form",
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        processData: false,
        beforeSend: function () {
            $(this_id + ' input[type=submit]').attr('disabled', 'true');
        },
        success: function (response) {
            console.log(response)
            if (response.result == 1)
            {
                toastr.success('Success!');
                $(this_id + ' input[type=submit]').removeAttr('disabled');

                //location.reload();
            } else
            {
                toastr.error('Something went wrong! Please try again later!');
                $(this_id + ' input[type=submit]').removeAttr('disabled');
            }
        }
    });


});
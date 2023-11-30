// "use strict";

var check_user_email_exits = $('#check_user_email_exits').val();
var token = $('#token-value').val();
var FormControlsClient = {

    init: function () {
        var btn = $("form :submit");
        $.validator.addMethod("pwcheck", function (value) {
            return /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/.test(value) // consists of only these
        });
        $("#add_user").validate({
            rules: {
                f_name: "required",
                l_name: "required",
                email: {
                    required: true,
                    email: true,
                    remote: {
                        async: false,
                        url: check_user_email_exits,
                        type: "post",
                        data: {
                            _token: function () {
                                return token;
                            },
                            email: function () {
                                return $("#email").val();
                            }
                        }
                    }
                },
                mobile: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                address: "required",
                zip_code: {
                    required: true,
                    minlength: 6,
                    maxlength: 6,
                    number: true
                },
                password: {
                    required: true,
                    pwcheck: true,
                    minlength: 8,
                },
                cnm_password: {
                    required: true,
                    equalTo: "#password",

                },
                country: "required",
                state: "required",
                city_id: "required",
            },
            messages: {
                username: {
                    required: "Please enter username.",
                    remote: "Username is already exits.."
                },
                f_name: "Please enter first name.",
                l_name: "Please enter last name.",
                email: {
                    required: "Please enter email.",
                    email: "Please enter valid email.",
                    remote: "Email is already exits."
                },
                mobile: {
                    required: "Please enter mobile.",
                    minlength: "mobile must be 10 digit.",
                    maxlength: "mobile must be 10 digit.",
                    number: "please enter digit 0-9.",
                },
                address: "Please enter address.",
                zip_code: {
                    required: "Please enter zip code.",
                    minlength: "zip code must be 6 digit.",
                    maxlength: "zip code must be 6 digit.",
                    number: "please enter digit 0-9.",
                },
                password: {
                    required: "Please enter password.",
                    pwcheck: 'Password must be minimum 8 characters.password must contain at least 1 lowercase, 1 Uppercase, 1 numeric and 1 special character.',
                    minlength: "Please enter atleast 8 digit."

                },
                cnm_password: {
                    required: "Please enter confirm password.",
                },
                country: "Please select country.",
                state: "Please select state.",
                city_id: "Please select city.",
                role: "Please select role.",
            },
            errorPlacement: function (error, element) {
                error.appendTo(element.parent()).addClass('text-danger');
            },
            submitHandler: function () {
                $('#show_loader').removeClass('fa-save');
                $('#show_loader').addClass('fa-spin fa-spinner');
                $("button[name='btn_add_user']").attr("disabled", "disabled").button('refresh');
                return true;
            }
        });
    }

};
jQuery(document).ready(function () {
    FormControlsClient.init();

    $("#role").select2({
        allowClear: true,
        placeholder: 'Select Role',
        // multiple:true
    });

    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'circle'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $("#upload-demo").hide();
    var fileTypes = ['jpg', 'jpeg', 'png'];
    $('#upload').on('change', function () {

        var reader = new FileReader();
        if (this.files[0].size > 5242880) { // 2 mb for bytes.
            //alert('File size should not be more than 2MB');
            message.fire({
                type: 'error',
                title: 'Error',
                text: 'File size should not be more than 5MB',
            });
            return false;
        }

        reader.onload = function (e) {
            result = e.target.result;
            arrTarget = result.split(';');
            tipo = arrTarget[0];

            if (tipo == 'data:image/jpeg' || tipo == 'data:image/png') {
                $("#upload-demo").show();
                $("#upload_img").show();
                $('#upload-demo-i').hide();
                $('#crop_image').hide();
                $('#demo_profile').hide();
                //$('#cancel_img').show();
                $uploadCrop.croppie('bind', {
                    url: e.target.result

                }).then(function () {
                    console.log('jQuery bind complete');
                });
            } else {
                message.fire({
                    type: 'error',
                    title: 'Error',
                    text: 'Accept only .jpg .png image',
                });

                // alert('Accept only .jpg .png image types');

            }
        }
        reader.readAsDataURL(this.files[0]);

    });


    $('#upload-result').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {

            $('#imagebase64').val(resp);

        });
    });


    var $imageupload = $('.imageupload');
    $imageupload.imageupload();

    $('#imageupload-disable').on('click', function () {
        $imageupload.imageupload('disable');
        $(this).blur();
    })

    $('#imageupload-enable').on('click', function () {
        $imageupload.imageupload('enable');
        $(this).blur();
    })

    $('#imageupload-reset').on('click', function () {
        $imageupload.imageupload('reset');
        $(this).blur();
    });

    $('#cancel_img').on('click', function () {

        $("#upload-demo").hide();
        $("#upload_img").hide();
        $('#upload-demo-i').show();
        $('#crop_image').show();
        $('#demo_profile').show();
        $('#remove_crop').show();
        // $('#cancel_img').hide();

    });




});

$(document).ready(function () {
    $("#role").select2({
        allowClear: true,
        placeholder: 'Select Role',
        // multiple:true
    });


});



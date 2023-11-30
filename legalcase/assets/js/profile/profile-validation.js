"use strict";
var checkExistRoute = $('#route-exist-check').val();
var token = $('#token-value').val();
var FormControlsProfile = {

    init: function () {
        var btn = $("form :submit");
        $("#add_user").validate({
            // ignore: '.select2-search__field,:hidden:not("textarea,.files,select")',
            rules: {

                f_name: "required",
                l_name: "required",
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
                country: "required",
                registration_no: "required",
                associated_name: "required",
                state: "required",
                city_id: "required",
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: checkExistRoute,
                        type: "post",
                        data: {
                            _token: function () {
                                return token;
                            },
                            email: function () {
                                return $("#email").val();
                            },
                            id: function () {
                                return $("#id").val();
                            }
                        }
                    }
                },

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
                registration_no: "Please enter registration no.",
                associated_name: "Please enter associated name.",
                address: "Please enter address.",
                zip_code: {
                    required: "Please enter zip code.",
                    minlength: "zip code must be 6 digit.",
                    maxlength: "zip code must be 6 digit.",
                    number: "please enter digit 0-9.",
                },
                country: "Please select country.",
                state: "Please select state.",
                city_id: "Please select city.",
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
        })
    }

};
jQuery(document).ready(function () {
    FormControlsProfile.init();

});

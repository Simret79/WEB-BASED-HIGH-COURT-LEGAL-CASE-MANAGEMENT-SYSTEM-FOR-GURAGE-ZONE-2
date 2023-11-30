"use strict";
var checkExistRoute = $('#common_check_exist').val();
var token = $('#token-value').val();
var FormControlsClient = {

    init: function () {
        var btn = $("form :submit");
        $.validator.addMethod("pwcheck", function (value) {
            return /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/.test(value) // consists of only these
        });

        $("#change_password").validate({
            rules: {
                old: "required",
                new: {
                    required: true,
                    pwcheck: true,
                    minlength: 8
                },
                confirm: {
                    required: true,
                    minlength: 8,
                    equalTo: "#new"
                }

            },
            messages: {

                old: "Please enter old password.",
                new: {
                    required: "Please enter new password.",
                    pwcheck: 'Password must be minimum 8 characters.password must contain at least 1 lowercase, 1 Uppercase, 1 numeric and 1 special character.',
                    minlength: "Please enter atleast 8 digit."
                },
                confirm: {
                    required: "Please enter confirm password.",
                    minlength: "password must be at least 8 characters long.",
                    equalTo: "Confirm password does not match to password."

                },
            },
            errorPlacement: function (error, element) {
                error.appendTo(element.parent()).addClass('text-danger');
            },
            submitHandler: function () {

                $("button[name='btn_add_change']").attr("disabled", "disabled").button('refresh');
                return true;
            }
        });
    }

};
jQuery(document).ready(function () {
    FormControlsClient.init();

});

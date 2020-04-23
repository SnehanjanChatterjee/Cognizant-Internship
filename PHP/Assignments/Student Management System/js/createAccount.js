$(document).ready(function () {

    // function togglePassword() {
    //     var x = document.getElementById("password");
    //     toggle(x);
    // }

    // function toggleConfirmPassword() {
    //     var x = document.getElementById("confirmPassword");
    //     toggle(x);
    // }
    // function toggle(x) {
    //     if (x.type === "password") {
    //         x.type = "text";
    //     } else {
    //         x.type = "password";
    //     }
    // }

    // In jQuery, to get the same result as document.getElementById, you can access the jQuery Object and 
    // get the first element in the object (Remember JavaScript objects act similar to associative arrays).
    $("#passwordToggler").click(function () {
        var x = $("#password")[0]; //returns a HTML DOM Object
        togglePassword(x);
    })
    $("#confirmPasswordToggler").click(function () {
        var x = $("#confirmPassword")[0];
        togglePassword(x);
    })
    function togglePassword(x) {
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    // Add Section
    $("#sclass").change(function () {
        var selectedClass = $(this).children("option:selected").val();

        $.ajax({
            url: "select.php",
            method: "POST",
            data: { stu_class: selectedClass }, // passing the selected class to Server
            success: function (response) {
                // On success
                // Converting the JSON output in Array Object
                result = $.parseJSON(response);

                // Empty the select box on every request
                $("#ssection")
                    .empty()
                    .append(
                        '<option selected="selected" value="select">Select the Section</option>'
                    );

                // Loop through the output and add the options to Section
                $.each(result, function (key, val) {
                    $("#ssection").append(
                        "<option value='" + val + "'>" + val + "</option>"
                    );
                    // alert(key + "--> " + val);

                    // Template literal/ ES6  -- ANOTHER WAY
                    /*$('#ssection').append(`<option value="${val}">
												${val}
											   </option>`);*/
                }); // End of .each()

                // Removing the disabled attribute
                $("#ssection").removeAttr("disabled");
            },
        });
    });

    // // Form Validation
    // $(".studentRegistrationForm").validate({
    //     // Specify validation rules
    //     rules: {
    //         // The key name on the left side is the name attribute
    //         // of an input field. Validation rules are defined
    //         // on the right side
    //         firstname: {
    //             required: true,
    //             lettersonly: true
    //         },
    //         lastname: {
    //             required: true,
    //             lettersonly: true
    //         },
    //         email: {
    //             required: true,
    //             // Specify that email should be validated
    //             // by the built-in "email" rule
    //             email: true
    //         },
    //         mobileNo: {
    //             required: true,
    //             minlength: 10,
    //             maxlength: 10,
    //             digits: true
    //         },
    //         password: {
    //             required: true,
    //             minlength: 8,
    //             passwordCheck: true
    //         },
    //         confirmPassword: {
    //             required: true,
    //             equalTo: "#password"
    //         }
    //     },
    //     // Specify validation error messages
    //     messages: {
    //         firstname: {
    //             required: "Please enter your firstname",
    //             lettersonly: "Please enter letters only"
    //         },
    //         lastname: {
    //             required: "Please enter your lastname",
    //             lettersonly: "Please enter letters only"
    //         },
    //         email: {
    //             required: "Please enter your email",
    //             email: "Please enter a valid email address"
    //         },
    //         mobileNo: {
    //             required: "Please enter your mobile number",
    //             maxlength: "Mobile No. should have 10 digits only",
    //             minlength: "Mobile No. should have 10 digits only",
    //             digits: true
    //         },
    //         password: {
    //             required: "Please provide a password",
    //             minlength: "Your password must be at least 8 characters long"
    //         }
    //     },
    //     // Make sure the form is submitted to the destination defined
    //     // in the "action" attribute of the form when valid
    //     submitHandler: function (form) {
    //         form.submit();
    //     }
    // });

    // $.validator.addMethod('passwordCheck', function (value, element) {
    //     return this.optional(element) || (value.match(/[a-zA-Z]/) && value.match(/[0-9]/));
    // },
    //     'Password must contain at least one numeric and one alphabetic character.');

    // Form validation
    $('#fnameCheck').hide();
    $('#lnameCheck').hide();
    $('#emailCheck').hide();
    $('#mobileNoCheck').hide();
    $('#passwordCheck').hide();
    $('#confirmPasswordCheck').hide();

    var fname_err = true;
    var lname_err = true;
    var email_err = true;
    var mobileNo_err = true;
    var password_err = true;
    var confirmPassword_err = true;

    // First name validation
    $('#firstname').keyup(function () {
        fname_check();
    });

    function fname_check() {

        var fname_val = $('#firstname').val();

        if (fname_val.length == '') {
            $('#fnameCheck').show();
            $('#fnameCheck').html("**Please enter your first name");
            $('#fnameCheck').focus();
            $('#fnameCheck').css("color", "red");
            fname_err = false;
            return false;
        } else {
            $('#fnameCheck').hide();
        }
        var regex = new RegExp(/^[a-zA-Z\s]+$/);
        if (!regex.test(fname_val)) {
            $('#fnameCheck').show();
            $('#fnameCheck').html("**First name should have letters only");
            $('#fnameCheck').focus();
            $('#fnameCheck').css("color", "red");
            fname_err = false;
            return false;
        } else {
            $('#fnameCheck').hide();
            return true;
        }
    }

    // Last name validation
    $('#lastname').keyup(function () {
        lname_check();
    });

    function lname_check() {

        var lname_val = $('#lastname').val();

        if (lname_val.length == '') {
            $('#lnameCheck').show();
            $('#lnameCheck').html("**Please enter your last name");
            $('#lnameCheck').focus();
            $('#lnameCheck').css("color", "red");
            lname_err = false;
            return false;
        } else {
            $('#lnameCheck').hide();
        }
        var regex = new RegExp(/^[a-zA-Z\s]+$/);
        if (!regex.test(lname_val)) {
            $('#lnameCheck').show();
            $('#lnameCheck').html("**Last name should have letters only");
            $('#lnameCheck').focus();
            $('#lnameCheck').css("color", "red");
            lname_err = false;
            return false;
        } else {
            $('#lnameCheck').hide();
            return true;
        }
    }

    // Email validation
    $('#email').keyup(function () {
        email_check();
    });

    function email_check() {

        var email_val = $('#email').val();

        if (email_val.length == '') {
            $('#emailCheck').show();
            $('#emailCheck').html("**Please enter your email");
            $('#emailCheck').focus();
            $('#emailCheck').css("color", "red");
            email_err = false;
            return false;
        } else {
            $('#emailCheck').hide();
        }

        var regex = new RegExp(/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
        if (!regex.test(email_val)) {
            $('#emailCheck').show();
            $('#emailCheck').html("**Please enter a valid email");
            $('#emailCheck').focus();
            $('#emailCheck').css("color", "red");
            email_err = false;
            return false;
        } else {
            $('#emailCheck').hide();
            return true;
        }
    }

    // Mobile No validation
    $('#mobileNo').keyup(function () {
        mobileNo_check();
    });

    function mobileNo_check() {

        var mobileNo_val = $('#mobileNo').val();

        if (mobileNo_val.length == '') {
            $('#mobileNoCheck').show();
            $('#mobileNoCheck').html("**Please enter your mobile number");
            $('#mobileNoCheck').focus();
            $('#mobileNoCheck').css("color", "red");
            mobileNo_err = false;
            return false;
        } else {
            $('#mobileNoCheck').hide();
        }

        var regex = new RegExp(/^([0-9]{10})+$/);
        if (!regex.test(mobileNo_val)) {
            $('#mobileNoCheck').show();
            $('#mobileNoCheck').html("**Mobile number should not contain alphabets and be of 10 digits");
            $('#mobileNoCheck').focus();
            $('#mobileNoCheck').css("color", "red");
            mobileNo_err = false;
            return false;
        } else {
            $('#mobileNoCheck').hide();
            return true;
        }
    }

    // Password validation
    $('#password').keyup(function () {
        password_check();
    });

    function password_check() {

        var password_val = $('#password').val();

        if (password_val.length == '') {
            $('#passwordCheck').show();
            $('#passwordCheck').html("**Please enter your password");
            $('#passwordCheck').focus();
            $('#passwordCheck').css("color", "red");
            password_err = false;
            return false;
        } else {
            $('#passwordCheck').hide();
        }

        var regex = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/);
        if (!regex.test(password_val)) {
            $('#passwordCheck').show();
            $('#passwordCheck').html("**Password should be between 8 to 15 characters which contains at least one lowercase letter, one uppercase letter, one numeric digit, and one special character");
            $('#passwordCheck').focus();
            $('#passwordCheck').css("color", "red");
            password_err = false;
            return false;
        } else {
            $('#passwordCheck').hide();
            return true;
        }
    }

    // Confirm Password
    $('#confirmPassword').keyup(function () {
        confirmPassword_check();
    });

    function confirmPassword_check() {

        var confirmPassword_val = $('#confirmPassword').val();
        var password_val = $('#password').val();

        if (password_val != confirmPassword_val) {
            $('#confirmPasswordCheck').show();
            $('#confirmPasswordCheck').html("**Passwords are not Matching");
            $('#confirmPasswordCheck').focus();
            $('#confirmPasswordCheck').css("color", "red");
            confirmPassword_err = false;
            return false;
        } else {
            $('#confirmPasswordCheck').hide();
            return true;
        }
    }

    $('#submitBtn').click(function () {

        if (fname_check() && lname_check() && email_check() && mobileNo_check() && password_check() && confirmPasswrd_check()) {
            return true;
        } else {
            return false;
        }
    });

});
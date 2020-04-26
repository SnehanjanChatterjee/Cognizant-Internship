$(document).ready(function () {
    $("#passwordToggler").click(function () {
        var x = $("#password")[0]; //returns a HTML DOM Object
        togglePassword(x);
    })

    function togglePassword(x) {
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    $("#cancelBtn").click(function () {
        window.location.href = "myProfile.php";
    })

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
                    .empty();

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
            $('#fnameCheck').html("<span style='color: red;'>**</span> Please enter your first name");
            $('#fnameCheck').focus();
            $('#fnameCheck').css("color", "white");
            fname_err = false;
            return false;
        } else {
            $('#fnameCheck').hide();
        }
        var regex = new RegExp(/^[a-zA-Z\s]+$/);
        if (!regex.test(fname_val)) {
            $('#fnameCheck').show();
            $('#fnameCheck').html("<span style='color: red;'>**</span> First name should have letters only");
            $('#fnameCheck').focus();
            $('#fnameCheck').css("color", "white");
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
            $('#lnameCheck').html("<span style='color: red;'>**</span> Please enter your last name");
            $('#lnameCheck').focus();
            $('#lnameCheck').css("color", "white");
            lname_err = false;
            return false;
        } else {
            $('#lnameCheck').hide();
        }
        var regex = new RegExp(/^[a-zA-Z\s]+$/);
        if (!regex.test(lname_val)) {
            $('#lnameCheck').show();
            $('#lnameCheck').html("<span style='color: red;'>**</span> Last name should have letters only");
            $('#lnameCheck').focus();
            $('#lnameCheck').css("color", "white");
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
            $('#emailCheck').html("<span style='color: red;'>**</span> Please enter your email");
            $('#emailCheck').focus();
            $('#emailCheck').css("color", "white");
            email_err = false;
            return false;
        } else {
            $('#emailCheck').hide();
        }

        var regex = new RegExp(/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
        if (!regex.test(email_val)) {
            $('#emailCheck').show();
            $('#emailCheck').html("<span style='color: red;'>**</span> Please enter a valid email");
            $('#emailCheck').focus();
            $('#emailCheck').css("color", "white");
            email_err = false;
            return false;
        } else {
            $('#emailCheck').hide();
            return true;
        }
    }
    // Class validation
    $('#sclass').blur(function () {
        class_check();
    });

    function class_check() {

        var class_val = $('#sclass').val();

        if (class_val == 'Select the Class' || class_val == '') {
            $('#classCheck').show();
            $('#classCheck').html("<span style='color: red;'>**</span> Please enter your class");
            $('#classCheck').focus();
            $('#classCheck').css("color", "white");
            class_err = false;
            return false;
        } else {
            $('#classCheck').hide();
            return true;
        }
    }

    // Section validation
    $('#ssection').blur(function () {
        section_check();
    });

    function section_check() {

        var section_val = $('#ssection').val();

        if (section_val == 'Select the Section' || section_val == '') {
            $('#sectionCheck').show();
            $('#sectionCheck').html("<span style='color: red;'>**</span> Please enter your section");
            $('#sectionCheck').focus();
            $('#sectionCheck').css("color", "white");
            section_err = false;
            return false;
        } else {
            $('#sectionCheck').hide();
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
            $('#mobileNoCheck').html("<span style='color: red;'>**</span> Please enter your mobile number");
            $('#mobileNoCheck').focus();
            $('#mobileNoCheck').css("color", "white");
            mobileNo_err = false;
            return false;
        } else {
            $('#mobileNoCheck').hide();
        }

        var regex = new RegExp(/^([0-9]{10})+$/);
        if (!regex.test(mobileNo_val)) {
            $('#mobileNoCheck').show();
            $('#mobileNoCheck').html("<span style='color: red;'>**</span> Mobile number should not contain alphabets and be of 10 digits");
            $('#mobileNoCheck').focus();
            $('#mobileNoCheck').css("color", "white");
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
            $('#passwordCheck').html("<span style='color: red;'>**</span> Please enter your password");
            $('#passwordCheck').focus();
            $('#passwordCheck').css("color", "white");
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
            $('#passwordCheck').css("color", "white");
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
            $('#confirmPasswordCheck').html("<span style='color: red;'>**</span> Passwords are not Matching");
            $('#confirmPasswordCheck').focus();
            $('#confirmPasswordCheck').css("color", "white");
            confirmPassword_err = false;
            return false;
        } else {
            $('#confirmPasswordCheck').hide();
            return true;
        }
    }

    $('#editBtn').click(function () {

        if (fname_check() && lname_check() && email_check() && class_check() && section_check() && mobileNo_check() && password_check() && confirmPassword_check()) {
            return true;
        } else {
            return false;
        }
    });

});
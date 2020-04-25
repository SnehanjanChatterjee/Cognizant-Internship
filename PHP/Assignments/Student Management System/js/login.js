$(document).ready(function () {
    // function openCreateAccount() {
    //     window.open("createAccount.php");
    // }

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
            $('#passwordCheck').html("<span style='color: red;'>**</span> Password should be between 8 to 15 characters which contains at least one lowercase letter, one uppercase letter, one numeric digit, and one special character");
            $('#passwordCheck').focus();
            $('#passwordCheck').css("color", "white");
            password_err = false;
            return false;
        } else {
            $('#passwordCheck').hide();
            return true;
        }
    }

    $('.my-Btn').click(function () {

        if (password_check()) {
            return true;
        } else {
            return false;
        }
    });
});
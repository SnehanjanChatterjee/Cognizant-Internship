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
});
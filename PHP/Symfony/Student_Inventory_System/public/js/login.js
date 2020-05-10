$(document).ready(function () {
    $("#passwordToggler").click(function () {
        var x = $("#inputPassword")[0]; //returns a HTML DOM Object
        togglePassword(x);
    })

    function togglePassword(x) {
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    // var input = document.getElementById("inputPassword");
    // var text = document.getElementById("passwordCapsLock");
    // input.addEventListener("keyup", function (event) {

    //     if (event.getModifierState("CapsLock")) {
    //         text.style.display = "block";
    //     } else {
    //         text.style.display = "none"
    //     }
    // });
});

$(document).ready(function () {
    $("#editProfileBtn").click(function () {
        // location.href = "myProfile.html";
        // location.target = "_blank";
        window.open('editProfile.php')
    });
    $("#SignOutBtn").click(function () {
        // location.href = "myProfile.html";
        // location.target = "_blank";
        // window.open('signOut.php')
        window.location.href = "signOut.php";
    })
});
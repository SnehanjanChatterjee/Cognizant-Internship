<!-- <?php
// Start the session
// Must be before any HTML tag
session_start();
?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <!-- Fonts -->


    <!-- Custom css -->
    <link rel="stylesheet" href="./css/myProfile.css" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/a747dc4c23.js" crossorigin="anonymous"></script>

    <title>My Profile</title>
</head>

<body>
    <div class="container jumbotron my-profile-dashboard">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <h2 style="text-align: center;">MY PROFILE</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h5>Name : <span id="name"> <?php echo $_SESSION['name']?></span> </h5>
                        <h5>Address : <span id="address"> <?php echo $_SESSION['address']?> </span> </h5>
                        <h5>Mobile Number : <span id="mobileNo"> <?php echo $_SESSION['mobile_no']?> </span> </h5>
                        <h5>Class : <span id="class"> <?php echo $_SESSION['class']?> </span> </h5>
                        <h5>Section: <span id="section"> <?php echo $_SESSION['section']?> </span> </h5>
                    </div>
                    <div class="col-6 text-center" style="margin: auto;">
                        <button type="button" name="myProfileBtn" id="myProfileBtn" class="btn btn-primary">EDIT
                            PROFILE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script src="./js/myProfile.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>
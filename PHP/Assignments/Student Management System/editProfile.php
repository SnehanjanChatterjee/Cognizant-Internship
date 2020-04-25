<?php
// Start the session
// Must be before any HTML tag
session_start();
?>

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
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">

    <!-- Custom css -->
    <link rel="stylesheet" href="./css/editProfile.css" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/a747dc4c23.js" crossorigin="anonymous"></script>

    <title>Edit Profile</title>
</head>

<body>
    <div class="container jumbotron my-edit">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <h2 style="text-align: center;">Edit your profile</h2>
                        <h6 style="text-align: center;">(Fields marked <span style=" color: red">*</span> are mandatory)</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="studentEditForm" action="editFormData.php" method="post" autocomplete="off">
                            <!-- First Name -->
                            <div class="form-group">
                                <label for="firstname">FIRST NAME<span style="color: red">*</span></label>
                                <input type="text" name="firstname" id="firstname" placeholder="First Name"
                                    class="form-control" />
                                <div class="pt-2">
                                    <h6 id="fnameCheck"></h6>
                                </div>
                            </div>
                            <!-- Last name -->
                            <div class="form-group">
                                <label for="lastname">LAST NAME<span style="color: red">*</span></label>
                                <input type="text" name="lastname" id="lastname" placeholder="Last Name"
                                    class="form-control" />
                                <div class="pt-2">
                                    <h6 id="lnameCheck"></h6>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">EMAIL<span style="color: red">*</span></label>
                                <input type="email" id="email" name="email" placeholder="xyz@gmail.com"
                                    class="form-control" />
                                <div class="pt-2">
                                    <h6 id="emailCheck"></h6>
                                </div>
                            </div>
                            <!-- Class -->
                            <div class="form-group">
                                <label for="sclass">CLASS<span style="color: red">*</span></label>
                                <select class="browser-default custom-select" name="sclass" id="sclass">
                                    <option selected>Select the Class</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Four</option>
                                    <option value="5">Five</option>
                                    <option value="6">Six</option>
                                    <option value="7">Seven</option>
                                    <option value="8">Eight</option>
                                    <option value="9">Nine</option>
                                    <option value="10">Ten</option>
                                    <option value="11">Eleven</option>
                                    <option value="12">Twelve</option>
                                </select>
                                <div class="pt-2">
                                    <h6 id="classCheck"></h6>
                                </div>
                            </div>
                            <!-- Section -->
                            <div class="form-group">
                                <label for="ssection">SECTION<span style="color: red">*</span></label>
                                <select class="browser-default custom-select" name="ssection" id="ssection" disabled>
                                    <option selected>Select the Section</option>
                                </select>
                                <div class="pt-2">
                                    <h6 id="sectionCheck"></h6>
                                </div>
                            </div>
                            <!-- Address -->
                            <div class="form-group">
                                <label for="address">ADDRESS</label>
                                <textarea class="form-control" name="address" id="address"
                                    rows="3"><?php echo($_SESSION['address'])?></textarea>
                            </div>
                            <!-- Mobile No. -->
                            <div class="form-group">
                                <label for="mobileNo">MOBILE NO.<span style="color: red">*</span></label>
                                <input type="text" id="mobileNo" name="mobileNo" placeholder="Mobile No."
                                    class="form-control" value="<?php echo($_SESSION['mobile_no'])?>" />
                                <div class="pt-2">
                                    <h6 id="mobileNoCheck"></h6>
                                </div>
                            </div>
                            <!-- Buttons -->
                            <div class="row">
                                <div class="col-lg-12 text-center" style="margin: auto;">
                                    <button type="submit" name="editBtn" id="editBtn" class="btn btn-lg btn-primary">EDIT</button>
                                    <button type="button" name="cancelBtn" id="cancelBtn" class="btn btn-lg btn-primary">CANCEL</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script src="./js/editProfile.js"></script>

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
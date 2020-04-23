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
    <link rel="stylesheet" href="./css/createAccount.css" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/a747dc4c23.js" crossorigin="anonymous"></script>

    <title>Create Account</title>
</head>

<body>
    <div class="container jumbotron my-createAccount-form">
        <div class="row">
            <!-- Student Form col -->
            <div class="col-12">
                <form class="studentRegistrationForm" action="index.php" method="post" autocomplete="off">
                    <h1 style="text-align: center;">Create Account</h1>
                    <h6 style="text-align: center;">(Fields marked <span style=" color: red">*</span> are mandatory)
                    </h6>

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
                        <input type="text" id="lastname" placeholder="Last Name" class="form-control" />
                        <div class="pt-2">
                            <h6 id="lnameCheck"></h6>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">EMAIL<span style="color: red">*</span></label>
                        <input type="email" id="email" name="email" placeholder="xyz@gmail.com" class="form-control" />
                        <div class="pt-2">
                            <h6 id="emailCheck"></h6>
                        </div>
                    </div>
                    <!-- Class -->
                    <div class="form-group">
                        <label for="sclass">CLASS<span style="color: red">*</span></label>
                        <select class="browser-default custom-select" id="sclass">
                            <option selected>Select the Class</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <!-- Section -->
                    <div class="form-group">
                        <label for="ssection">SECTION<span style="color: red">*</span></label>
                        <select class="browser-default custom-select" id="ssection" disabled>
                            <option selected>Select the Section</option>
                        </select>
                    </div>
                    <!-- Address -->
                    <div class="form-group">
                        <label for="address">ADDRESS</label>
                        <textarea class="form-control" id="address" rows="3"></textarea>
                    </div>
                    <!-- Mobile No. -->
                    <div class="form-group">
                        <label for="mobileNo">MOBILE NO.<span style="color: red">*</span></label>
                        <input type="text" id="mobileNo" name="mobileNo" placeholder="Mobile No."
                            class="form-control" />
                        <div class="pt-2">
                            <h6 id="mobileNoCheck"></h6>
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">PASSWORD<span style="color: red">*</span></label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" placeholder="Password"
                                class="form-control" data-toggle="password" />
                            <div class="input-group-append">
                                <div class="input-group-text" id="passwordToggler"><i class="fa fa-eye"></i></div>
                            </div>
                        </div>
                        <div class="pt-2">
                            <h6 id="passwordCheck"></h6>
                        </div>
                    </div>
                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="confirmPassword">CONFIRM PASSWORD<span style="color: red">*</span></label>
                        <div class="input-group">
                            <input type="password" name="confirmPassword" id="confirmPassword"
                                placeholder="Confirm Password" class="form-control" data-toggle="confirmPassword" />
                            <div class="input-group-append">
                                <div class="input-group-text" id="confirmPasswordToggler"><i class="fa fa-eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2">
                            <h6 id="confirmPasswordCheck"></h6>
                        </div>
                    </div>
                    <!-- Image -->
                    <div class="form-group">
                        <!-- Image Display -->
                        <div class="row" style="padding-bottom: 20px;">
                            <div class="col-lg-12">
                                <label for="img">UPLOAD IMAGE</label>
                                <div class="preview">
                                    <img src="" id="img" width="100" height="100">
                                </div>
                            </div>
                        </div>
                        <!-- Image Upload -->
                        <div class="row btn-row">
                            <div class="col-xs-12 col-md-12 col-lg-7 text-center" style="padding-bottom: 10px">
                                <input type="file" id="file" name="file" />
                            </div>
                            <div class="col-xs-12 col-md-12 col-lg-5 text-center" style="padding-bottom: 10px;">
                                <button type="button" class="btn btn-primary" value="Upload"
                                    id="but_upload">UPLOAD</button>
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="row" style="margin: auto;">
                        <!-- Use .text-center class to align button -->
                        <div class="col-xs-12 col-md-12 col-lg-12 text-center">
                            <button type="submit" id="submitBtn" class="btn btn-lg btn-primary">CREATE
                                ACCOUNT</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Student Form col ends -->
        </div>
    </div>

    <!-- jQuery GOOGLE CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> -->



    <!-- jQuery Validation Plugin -->
    <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script> -->
    <!-- <script src="./js/jquery.validate.js"></script> -->
    <!-- <script src="https://jquery.bassistance.de/validate/additional-methods.js"></script> -->
    <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
    <!-- <script src="http://jquery.bassistance.de/validate/additional-methods.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script> -->

    <!-- Custom JS -->
    <script src="./js/createAccount.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>
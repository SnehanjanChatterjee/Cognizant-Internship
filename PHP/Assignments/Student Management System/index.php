<?php
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
    <link rel="stylesheet" href="./css/login.css" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/a747dc4c23.js" crossorigin="anonymous"></script>

    <title>Login</title>
</head>

<body>
    <div class="container jumbotron my-login-form">
        <div class="row">
            <!-- Student Form col -->
            <div class="col-12">
                <form class="studentLoginForm" action="login.php" method="post" autocomplete="off">
                <div class="row my-login-header">
                    <div class="col-12">
                        <h1 style="text-align: center;">Student Login</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h6 style="text-align: center;" class="login-success">
                            <?php if(isset($_SESSION['registrationSuccessful'])){
                                echo($_SESSION['registrationSuccessful']);
                                // remove all session variables
                                session_unset();

                                // destroy the session
                                session_destroy();
                            }?>
                        </h6>
                    </div>
                </div>
                    
                    <!-- Username -->
                    <div class="form-group">
                        <label for="username">USERNAME</label>
                        <input type="text" name="username" id="username" placeholder="Enter your username"
                            class="form-control" required />
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">PASSWORD</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" placeholder="Password"
                                class="form-control" data-toggle="password" required />
                            <div class="input-group-append">
                                <div class="input-group-text" id="passwordToggler"><i class="fa fa-eye"></i></div>
                            </div>
                        </div>
                    </div>
                    <!-- Remember Me -->
                    <!-- <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="rememberMe" value="option1">
                            <label class="form-check-label" for="rememberMe">REMEMBER ME</label>
                        </div>
                    </div> -->
                    <!-- Buttons -->
                    <div class="row" style="width: 50%; margin: auto;">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">LOGIN</button>
                            &nbsp;
                            <button type="button" class="btn btn-primary"
                                onclick="window.location.href = 'createAccount.php'">SIGNUP</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Student Form col ends -->
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Custom JS -->
    <script src="./js/login.js"></script>

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
<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <?php include('header_links.php'); ?>
</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-more" style="background-image: url('assets/images/hero-bg.jpg'); ">
                </div>
                <form class="login100-form validate-form" action="api/login.php" method="post" id="login_form">
                    <span class="login100-form-title p-b-43">
                        Join Us
                    </span>

                    <!-- <form action="api/login.php" method="post" id="login_form"> -->
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <!-- <label for="exampleInputEmail1">Email Id<span style="color: red;">*</span></label> -->
                        <input class="input100" type="text" name="username" placeholder="Email">
                        <span class="focus-input100"></span>
                        <!-- <span class="label-input100">Email</span> -->
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="required">
                        <!-- <label for="exampleInputPassword1">Password<span style="color: red;">*</span></label> -->
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <!-- <span class="label-input100">Password</span> -->
                        <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required> -->
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn" name="user_login">
                            Signup
                        </button>
                        <!-- <input type="hidden" > -->
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            &copy; Swagsta 2022
                        </span>
                    </div>

                    <!-- <div class="button-bottom">
                                <button type="submit" class="w-100 btn btn-solid">login</button>
                                <input type="hidden" name ="user_login">

                                <div class="divider">
                                    <h6 style="display: flex; justify-content: center">or</h6>
                                </div>
                                <a href="index.php" class="w-100 btn btn-solid btn-outline">Create an account</a>

                            </div> -->
                    <div class="login100-form-social flex-c-m">
                        <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </a>

                        <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="js/main.js?key=<?= date('is') ?>"></script>

</body>

</html>
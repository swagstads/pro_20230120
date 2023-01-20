<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="assets/css/login_style.css">
    <style>
    .hero-logo {
        margin-right: 10px;
        background-image: url("assets/img/test.jpg");
    }

    .animation {
        margin: 0;
        padding: 0;
        display: flex;
    }

    .animation li::before {
        content: "";
        position: relative;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border: 1px solid snow;
        cursor: pointer;
        display: block;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        -webkit-transition: all 0.35s ease;
        -o-transition: all 0.35s ease;
        transition: all 0.35s ease;
        font-size: 14px;
        z-index: 2;
        animation: animate 1s linear infinite;
    }

    .animation li:hover {
        background-color: #86ff3b;
    }

    li {
        max-width: 100%;
    }

    li:nth-child(1) {
        margin-left: -844px;
        margin-top: 66px;
    }

    li:nth-child(2) {
        margin-left: 124px;
        margin-top: 132px;
    }

    li:nth-child(3) {
        margin-left: 355px;
        margin-top: 111px;
    }

    li:nth-child(4) {
        margin-left: 142px;
        margin-top: 145px;
    }

    .animation li .content {
        position: absolute;
        width: 200px;
        background: #fff;
        padding: 4px;
        visibility: hidden;
        opacity: 0;
        transition: 0.5s;
        box-sizing: border-box;
    }

    ::marker {
        color: transparent;
    }

    .animation li:hover .content {
        visibility: visible;
        opacity: 1;
    }

    @keyframes animate {
        0% {
            transform: scale(0.5);
            opacity: 0;
        }

        100% {
            transform: scale(1.5);
            opacity: 1;
        }
    }
    </style>
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <?php include('header_links.php'); ?>

    <script type="text/javascript">
    function valid() {
        if (document.addemp.password.value != document.addemp.confirmpassword.value) {
            alert("New Password and Confirm Password Field do not match !!");
            document.addemp.confirmpassword.focus();
            return false;
        }
        return true;
    }
    </script>

</head>

<body>
    <!-- signup page -->
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="api/signup.php" method="post" id="signup_form" name="addemp">
                <h1>Create Account</h1>
                <input type="text" name="name" placeholder="Full Name" required />
                <input type="number" name="contact" placeholder="Contact" pattern=".{9,}" required
                    title="10 characters minimum" />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" pattern=".{8,}" required
                    title="8 characters minimum" />
                <input type="password" name="confirmpassword" placeholder="Confirm Password" required />
                <button type="submit" name="add" onclick="return valid();" id="add">Sign Up</button>
                <div>
                    <p>Already Have an account?
                        <a href="#" class="ghost" id="signIn">Sign In</a>
                    </p>
                </div>
                <div class="">
                    <span>
                        &copy; Swagsta 2022
                    </span>
                </div>
            </form>
        </div>
        <!-- Login page -->
        <div class="form-container sign-in-container">
            <form action="api/login.php" method="post" id="signup_form">
                <h1>Login to continue shopping!</h1>
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <a href="#">Forgot your password?</a>
                <button type="submit" name="user_login">Login</button>
                <p>Don't Have an account?
                    <a href="#" class="ghost" id="signUp">Sign Up</a href="#">
                </p>
                <div class="">
                    <span>
                        &copy; Swagsta 2022
                    </span>
                </div>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <!-- <img src="assets/img/hero-bg.jpg" style="width:100%; height:100%"> -->
                </div>
                <div class="overlay-panel overlay-right">
                    <!-- <img src="assets/img/hero-bg.jpg" style="width:100%; height:100%"> -->
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/script.js"></script>
    <script src="assets\js\login.js"></script>
    <script src="assets\js\signup.js"></script>
    <script src="js/main.js?key=<?= date('is') ?>">
    </script>

</body>

</html>
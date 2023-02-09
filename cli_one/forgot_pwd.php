<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
    body {
        /* margin: 0;
	padding: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif; 
	height: 100vh; */
        background-color: #666666;
    }

    .hero-logo {
        margin-right: 10px;
        background-image: url("assets/images/test.jpg");
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
</head>

<body>
    <!-- Login page -->
    <div class="limiter" id="login">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="api/mail_api.php" method="post" id="login_form">
                    <span class="login100-form-title p-b-43">
                        Forgot Pasword!
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn" name="user_login">
                            Send Mail
                        </button>
                        <input type="hidden" name="mail" />
                    </div>
                    <!-- <div class="flex-sb-m w-full p-t-3 p-b-32">
					<div>
						<a href="#" class="txt1">
							Forgot Password?
						</a>
					</div>
				</div>							 -->
                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            &copy; Swagsta 2022
                        </span>
                    </div>
                </form>
                <div class="login100-more" style="background-image: url('assets/images/hero-bg.jpg'); ">
                </div>
            </div>
        </div>
    </div>

    <script src="assets\js\login.js"></script>
    <script src="js/main.js?key=<?= date('is') ?>">
    </script>

</body>

</html>
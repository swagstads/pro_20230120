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
        /* background-image: url("assets/images/test.jpg"); */
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
    #login_alert_message,
    #signup_alert_message{
        color: red;
    }
    
    #login_success_message,
    #signup_success_message{
        color: green;
    }
    #add:disabled{
        opacity: 0.5;
        cursor: not-allowed;
    }
    #signup_contact::-webkit-inner-spin-button {
        display: none
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
    <!-- signup page -->
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form onsubmit="signup_verify_user()" method="post" id="signup_form" name="addemp">
                <h1>Create Account</h1>

                <div id="signup_alert_message"></div>
                <div id="signup_success_message"></div>

                <input type="text" id="signup_name" name="name" placeholder="Full Name" required value="Rishabh Nahar" />
                <input type="number" id="signup_contact" name="mobile" minlength="10" maxlength="10" placeholder="Contact" pattern=".{9,}" required title="10 characters minimum" />
                <input type="email" id="signup_email" name="email" placeholder="Email" required value="rishabhn@gmail.com" />
                <input type="password" id="signup_password" name="password" placeholder="Password" value="signup_123" required title="8 characters minimum" />
                <input type="password" name="confirmpassword" placeholder="Confirm Password" value="signup_123" required />
                <button type="submit" name="add"  id="add">Sign Up</button>
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
            <form onsubmit="login_verify_user()" method="post" >
                <h1>Login to continue shopping!</h1>
                
                <div id="login_alert_message"></div>
                <div id="login_success_message"></div>

                <input type="email" id="login_email" name="email" placeholder="Email" required />
                <input type="password" id="login_password" name="password" placeholder="Password" required />
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
                    <!-- <img src="assets/images/hero-bg.jpg" style="width:100%; height:100%"> -->
                </div>
                <div class="overlay-panel overlay-right">
                    <!-- <img src="assets/images/hero-bg.jpg" style="width:100%; height:100%"> -->
                </div>
            </div>
        </div>
    </div>



<script>
    function signup_verify_user(){

        event.preventDefault()

        // Signup submit button
        let submit_bttn = document.getElementById("add");

        var api_url = '/api/signup.php';

        // form data values
        let name = document.getElementById("signup_name").value;
        let email = document.getElementById("signup_email").value;
        let password = document.getElementById("signup_password").value;
        let contact = document.getElementById("signup_contact").value;


        if(contact.length !== 10){
            document.getElementById("signup_alert_message").innerHTML = "Please provide valid mobile number";
        }
        else if (document.addemp.password.value.length < 8) {
            document.getElementById("signup_alert_message").innerHTML = "Password must be of 8 characters";
            document.addemp.password.focus();
        }
        else if (document.addemp.password.value != document.addemp.confirmpassword.value) {
            document.getElementById("signup_alert_message").innerHTML = "Password doesn't match";
            document.addemp.confirmpassword.focus();
        }
        else{
            // signup button disable
            submit_bttn.disabled = 'true'
            submit_bttn.textContent = 'Signing up...'

            // form data values in one variable
            var form_data = { "add": "register","name":name,"email":email,"password":password,"contact":contact};
            console.log("Form data",form_data);
            $.ajax({
                url: api_url,
                type: 'POST',
                data: form_data,
                success: function (returned_data) {
                    console.log(returned_data);
                    var jsonData = JSON.parse(returned_data);
                    var return_data = jsonData.response;
                    // console.log(jsonData);
                    if(jsonData.response[0].status === "ok"){
                        submit_bttn.textContent = 'Submit'
                        // submit_bttn.disabled = false
                    }
                    else{
                        submit_bttn.textContent = 'Submit'
                        submit_bttn.disabled = false
                    }
                    $("#signup_success_message").html( jsonData.response[0].success_message);
                    $("#signup_alert_message").html( jsonData.response[0].alert_message);
                }
            })
        }

    }

    function login_verify_user(){
        console.log("Login attempt");

        event.preventDefault()

        var api_url = '/api/login.php';

        let email = document.getElementById("login_email").value;
        let password = document.getElementById("login_password").value;

        var form_data = { "user_login": "login","email":email,"password":password};
        console.log(form_data);
        $.ajax({
                url: api_url,
                type: 'POST',
                data: form_data,
                success: function (returned_data) {
                    console.log(returned_data);
                    var jsonData = JSON.parse(returned_data);
                    var return_data = jsonData.response;
                    // console.log(jsonData.response);
                    console.log("response",jsonData.response[0]);
                    console.log("status",jsonData.response[0].alert_message);

                    $("#login_success_message").html( jsonData.response[0].success_message);
                    $("#login_alert_message").html( jsonData.response[0].alert_message);

                    if(jsonData.response[0].status === "ok"){
                        document.location = "/";
                    }
                    // else{
                    //     submit_bttn.textContent = 'Submit'
                    //     // submit_bttn.disabled = false
                    // }
                    

                }
            })
    }
</script>

    <script type="text/javascript" src="js/script.js"></script>
    <script src="assets\js\login.js"></script>
    <script src="assets\js\signup.js"></script>
    <script src="js/main.js?key=<?= date('is') ?>">
    </script>

</body>

</html>
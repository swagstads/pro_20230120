<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AToZ</title>
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/login.css">
  <?php include('header_links.php'); ?>

</head>
<body>

<div class="parent clearfix">
    <div class="bg-illustration">
        <a href="./index.php">
            <img class="logo" src="./assets/images/logo1.jpg" alt="logo">
        </a>

      <!-- <div class="burger-btn">
        <span></span>
        <span></span>
        <span></span>
      </div> -->

    </div>
    
    <div class="login">
      <div class="container">
        <h1>Login to access to<br />your account</h1>
        
        <div class="login-form">

        <div id="signup_alert_message"></div>
        <div id="signup_success_message"></div>

          <form  onsubmit="change_password()" method="post" >          
            <input type="password"  pattern=".{8,}" id="signup_password" name="password" placeholder="New Password" required title="Password must be of minimum 8 characters " />
            <input type="password" id="signup_confirm_password" name="confirmpassword" placeholder="Confirm Password" required />

            <div class="remember-form">
              <span>
                Want to Login? <a class="col-primary" href="./login-page.php">Login</a>
              </span>
              <!-- <input type="checkbox"> -->
              <!-- <span>Remember me</span> -->
            </div>

            <button id="signup_bttn" type="submit">Change Password</button>

          </form>
        </div>
    
      </div>
      </div>
  </div>

  <script>
    function change_password(){

    event.preventDefault()

    // Signup submit button
    let submit_bttn = document.getElementById("signup_bttn");

    var api_url = './api/change_password.php';

    // getting url details
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    // form data values
    let mail = urlParams.get('mail')
    let code = urlParams.get('code')
    let password = document.getElementById("signup_password").value;
    let confirmpassword = document.getElementById("signup_confirm_password").value;

    if (password != confirmpassword) {
        document.getElementById("signup_alert_message").innerHTML = "Password doesn't match";
        confirmpassword.focus();
    }
    else{
        // signup button disable
        submit_bttn.disabled = 'true'
        submit_bttn.textContent = 'Signing up...'

        // form data values in one variable
        var form_data = { "change_password": "yes","new_password":password,"mail":mail,"code":code};
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
</script>

</body>
</html>
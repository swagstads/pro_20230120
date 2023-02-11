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
        <a href="/index.php">
            <img src="./assets/images/logo1.jpg" alt="logo">
        </a>

      <div class="burger-btn">
        <span></span>
        <span></span>
        <span></span>
      </div>

    </div>
    
    <div class="login">
      <div class="container">
        <h1>Login to access to<br />your account</h1>
        
        <div class="login-form">

         

        <div id="signup_alert_message"></div>
        <div id="signup_success_message"></div>

          <form  onsubmit="signup_verify_user()" method="post" >          
            <input type="text" id="signup_name" name="name" placeholder="Full Name" required value="Rishabh Nahar" />   
            <input type="number" id="signup_contact" name="mobile" minlength="10" maxlength="10" placeholder="Contact" pattern=".{9,}" required title="10 characters minimum" />
            <input type="email" id="signup_email" name="email" placeholder="Email" required value="rishabhn@gmail.com" />
            <input type="password" id="signup_password" name="password" placeholder="Password" value="signup_123" required title="8 characters minimum" />
            <input type="password" id="signup_confirm_password" name="confirmpassword" placeholder="Confirm Password" value="signup_123" required />

            <div class="remember-form">
              <span>
                Already have an account? <a href="#">Login</a>
              </span>
              <!-- <input type="checkbox"> -->
              <!-- <span>Remember me</span> -->
            </div>

            <button id="signup_bttn" type="submit">SIGNUP</button>

          </form>
        </div>
    
      </div>
      </div>
  </div>

  <script>
    function signup_verify_user(){

event.preventDefault()

// Signup submit button
let submit_bttn = document.getElementById("signup_bttn");

var api_url = '/api/signup.php';

// form data values
let name = document.getElementById("signup_name").value;
let email = document.getElementById("signup_email").value;
let password = document.getElementById("signup_password").value;
let contact = document.getElementById("signup_contact").value;
let confirmpassword = document.getElementById("signup_confirm_password").value;

if(contact.length !== 10){
    document.getElementById("signup_alert_message").innerHTML = "Please provide valid mobile number";
}
else if (password.length < 8) {
    document.getElementById("signup_alert_message").innerHTML = "Password must be of 8 characters";
    password.focus();
}
else if (password != confirmpassword) {
    document.getElementById("signup_alert_message").innerHTML = "Password doesn't match";
    confirmpassword.focus();
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
</script>

</body>
</html>
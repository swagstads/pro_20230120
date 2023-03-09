<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AToZ</title>
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/login.css">
  <?php 
    include('header_links.php');
  ?>
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

          <div id="login_alert_message"></div>
          <div id="login_success_message"></div>

          <form  onsubmit="login_verify_user()" method="post" >

          <span>
            <input type="email" id="login_email" name="email" placeholder="Email" required />
          </span> 
          <span>
            <input type="password" id="login_password" name="password" placeholder="Password" required />
            <span class="Show-password-action" >
              <span>
                <input type="checkbox" name="" onclick="show_password()" id="show_password_checkbox"> 
                <span>Show Password</span>
              </span>
              <a href="./forget_password.php">Forgot password?</a>
            </span>
          </span>
          <br>

          <div class="remember-form">
            <span>
              Don't have account? <a class="col-primary" href="./signup-page.php">Signup</a>
            </span>

            <!-- <input type="checkbox"> -->
            <!-- <span>Remember me</span> -->
          </div>
          <!-- <div class="forget-pass">
            <a href="#">Forgot Password ?</a>
          </div> -->

          <button type="submit">LOG-IN</button>

          </form>
        </div>
    
      </div>
      </div>
  </div>

  <script>

    function show_password(){
      let checkbox = document.querySelector("#show_password_checkbox").checked;
      let password_inp = document.querySelector("#login_password")
      if(checkbox === true){
        password_inp.type = "text"
      } 
      else{
        password_inp.type = "password"
      }
    }

    function login_verify_user(){
        console.log("Login attempt");

        event.preventDefault()

        var api_url = './api/login.php';

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
                        document.location = "./index.php";
                    }
                }
            })
    }
</script>


</body>
</html>
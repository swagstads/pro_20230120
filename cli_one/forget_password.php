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
        <h1>Forgot Password</h1>
        
        <div class="login-form">

          <div id="login_alert_message"></div>
          <div id="login_success_message"></div>

          <form  action="./api/forget_password.php" method="POST">
                <span>
                    <input type="email" id="login_email" name="username" placeholder="Email" required />
                </span> 
                <span>
                <br>
                    <span>
                    <span class="Show-password-action" >
                        <span>
                            Remember password?<a href="./login-page.php">&nbsp;Login</a>
                        </span>
                    </span>
                </span>
                <button type="submit">Submit</button>

          </form>
        </div>
    
      </div>
      </div>
  </div>
    <script>    
        // getting url details
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        // form data values
        let alert_msg = urlParams.get('alert')
        let success_msg = urlParams.get('success')
        if(!!success_msg){
            $('#login_success_message').text(success_msg)
        }
        if(!!alert_msg){
            $("#login_alert_message").text(alert_msg)
        }


    </script>



</body>
</html>
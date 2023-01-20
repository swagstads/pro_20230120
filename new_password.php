<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from gambolthemes.net/html-items/cursus_demo_f12/forgot_password.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Sep 2020 09:26:11 GMT -->

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, shrink-to-fit=9" />
  <meta name="description" content="Gambolthemes" />
  <meta name="author" content="Gambolthemes" />
  <title>Ayurpass - Forgot Password</title>

  <!-- Favicon Icon -->
  <link rel="icon" type="image/png" href="images/fav.png" />

  <!-- Stylesheets -->
  <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,500" rel="stylesheet" />
  <link href="vendor/unicons-2.0.1/css/unicons.css" rel="stylesheet" />
  <link href="css/vertical-responsive-menu.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
  <link href="css/night-mode.css" rel="stylesheet" />

  <!-- Vendor Stylesheets -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet" />
  <link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet" />
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="vendor/semantic/semantic.min.css" />
  <style>
    #snackbar {
      visibility: hidden;
      min-width: 250px;
      margin-left: -125px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 2px;
      padding: 16px;
      position: fixed;
      z-index: 1;
      left: 50%;
      bottom: 30px;
      font-size: 17px;
    }

    #snackbar.show {
      visibility: visible;
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
      from {
        bottom: 0;
        opacity: 0;
      }

      to {
        bottom: 30px;
        opacity: 1;
      }
    }

    @keyframes fadein {
      from {
        bottom: 0;
        opacity: 0;
      }

      to {
        bottom: 30px;
        opacity: 1;
      }
    }

    @-webkit-keyframes fadeout {
      from {
        bottom: 30px;
        opacity: 1;
      }

      to {
        bottom: 0;
        opacity: 0;
      }
    }

    @keyframes fadeout {
      from {
        bottom: 30px;
        opacity: 1;
      }

      to {
        bottom: 0;
        opacity: 0;
      }
    }
  </style>
</head>

<body class="sign_in_up_bg">
  <div id="snackbar"></div>
  <!-- Signup Start -->
  <div class="container">
    <div class="row justify-content-lg-center justify-content-md-center">
      <!-- <div class="col-lg-12">
        <div class="main_logo25" id="logo">
          <a href="index.html"><img src="../assets/images/AYURPASS.png" alt="" style="width: 135px; height: 120px" /></a>
          <a href="index.html"><img class="logo-inverse" src="../assets/images/AYURPASS.png" alt="" style="width: 135px; height: 120px" /></a>
        </div>
      </div> -->

      <div class="col-lg-6 col-md-8">
        <div class="sign_form">
          <h2>Password Reset</h2>
          <form method="post" id="forgot_password_form">
            <div class="ui search focus mt-50">
              <div class="ui left icon input swdh95">
                <input class="prompt srch_explore" type="password" name="new_password" id="new_pwd" required="" placeholder="New password" />
                <i class="uil uil-key-skeleton-alt icon icon2"></i>
              </div>
              <br />
              <br />
              <div class="ui left icon input swdh95">
                <input class="prompt srch_explore" type="password" name="password" id="con_pwd" required="" placeholder="Confirm password" />
                <i class="uil uil-key-skeleton-alt icon icon2"></i>
                <?php
                $email = base64_decode($_GET['email']);
                ?>
                <input type="hidden" name="email" value="<?= $email; ?>">
                <input type="hidden" name="user_changepwd" value="">
              </div>
            </div>
            <button class="login-btn" type="submit" style="background: #61b15a" onclick="myFunction()">
              Reset Password
            </button>
          </form>
          <p class="mb-0 mt-30">Go Back <a href="sign_up.html">Sign In</a></p>
        </div>
        <div class="sign_footer">
          <img src="images/sign_logo.png" alt="" />© 2022
          <strong>Ayurpass</strong>. All Rights Reserved.
        </div>
      </div>
    </div>
  </div>
  <!-- Signup End -->


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/OwlCarousel/owl.carousel.js"></script>
  <script src="vendor/semantic/semantic.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/night-mode.js"></script>
  <script>
    // $("#forgot_password_form").submit(function(e) {
    //   e.preventDefault();

    //   var form = $(this);
    //   var url = "../application/forgot_password_api.php";
    //   var form_data = form.serialize();

    //   // console.log(form_data);
    //   $.ajax({
    //     type: "POST",
    //     url: url,
    //     data: form_data,
    //     success: function(data) {
    //       // console.log(data);
    //       var jsonData = JSON.parse(data);
    //       var return_data = jsonData.response;
    //       // console.log(jsonData);
    //       if (
    //         return_data[0].status == "failed") {
    //         show_msg("Password update failed");

    //         // console.log("Category already exists")
    //       } else if (return_data[0].status == "success") {
    //         show_msg("Password Changed");
    //         setTimeout(function() {
    //           window.location.href = "password_success.html";
    //         }, 2000);
    //       }
    //     },
    //   });
    // });

    function myFunction() {
      var np = document.getElementById('new_pwd').value;
      var cp = document.getElementById('con_pwd').value;
      if (np != cp) {
        alert("Please enter same password.");
      } else {
        $("#forgot_password_form").submit(function(e) {
          e.preventDefault();

          var form = $(this);
          var url = "api/forgot_password_api.php";
          var form_data = form.serialize();

          // console.log(form_data);
          $.ajax({
            type: "POST",
            url: url,
            data: form_data,
            success: function(data) {
              // console.log(data);
              var jsonData = JSON.parse(data);
              var return_data = jsonData.response;
              // console.log(jsonData);
              if (
                return_data[0].status == "failed") {
                show_msg("Password update failed");

                // console.log("Category already exists")
              } else if (return_data[0].status == "success") {
                show_msg("Password Changed");
                setTimeout(function() {
                  window.location.href = "logg_in.php";  
                }, 2000);
              }
            },
          });
        });
      }
      // console.log(np+"     "+cp);
    }

    function show_msg(msg) {
      var x = document.getElementById("snackbar");
      document.getElementById("snackbar").textContent = msg;
      x.className = "show";
      setTimeout(function() {
        x.className = x.className.replace("show", "");
      }, 3000);
    }
  </script>
</body>

<!-- Mirrored from gambolthemes.net/html-items/cursus_demo_f12/forgot_password.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Sep 2020 09:26:11 GMT -->

</html>
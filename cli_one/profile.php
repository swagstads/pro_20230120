<html>
  <head>
  <?php include('./header_links.php') ?>

    <style>
      .profile-page-container {
        width: 80%;
        margin: 50px auto;
        display: flex;
        flex-wrap: wrap;
        align-items:center
      }
      .left-section {
        width: 30%;
        text-align: center;
        padding: 20px;
        display:flex;
        flex-direction: column;
        align-items: center;
      }
      .left-section img {
        border-radius: 50%;
        width: 200px;
        height: 200px;
        object-fit: cover;
      }
      .right-section {
        width: 70%;
        padding: 20px;
      }
      h1 {
        font-size: 2em;
        margin-bottom: 20px;
      }
      .info {
        font-size: 1.2em;
        margin-bottom: 20px;
      }
      .info small{
        color: rgb(255, 127, 127)
      }
      .submit-button {
        border:none;
        background-color: #0d6efd;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        margin-top: 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
      }
      .submit-button:hover {
        color: white    
    }

input[type="text"],
input[type="email"],
input[type="password"],
input[type="tel"] {
  border: none;
  border-bottom: 1px solid #0d6efd;
  background-color: transparent;
  font-size: 1.5rem;
  padding: 10px 5px;
  width: 100%;
  transition: all 0.3s ease-in-out;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
input[type="tel"]:focus {
  border-bottom: 1px solid #bd8448;
  /* outline: none; */
}
input[type="text"]:disabled,
input[type="email"]:disabled,
input[type="password"]:disabled,
input[type="tel"]:disabled{
    border-bottom: 1px solid grey;
    opacity: 0.7;
    background: lightgrey
}

      @media (max-width: 768px) {
        .profile-page-container {
          width: 90%;
          flex-direction: row;
        }
        .left-section {
          width: 100%;
          margin-bottom: 20px;
        }
        .right-section {
          width: 100%;
        }
      }
    </style>
  </head>
  <body>
    <?php include('header.php') ?>
    <div class="profile-page-container">
        <div class="left-section">
            <img src="https://uxwing.com/wp-content/themes/uxwing/download/peoples-avatars/no-profile-picture-icon.png" alt="profile image">
        </div>
        <div class="right-section">
                <form onsubmit="update_user_details()" action="">
                    <p class="info name"><input type="text" required id="profile_name" ></p>
                    <p class="info email"><input type="email" name="" id="profile_email" disabled required></p>
                    <p class="info address"><input type="text" placeholder="Please provide your address" name="" id="profile_address" required></p>
                    <p class="info phone"><input type="tel" name="" id="profile_contact" required></p>
                    
                    <div class="submit-bttn">
                        <button type="submit" class="submit-button">Save</button>
                    </div>
                </form>
        </div>
    </div>


    <div id="shopify-section-vela-footer" class="shopify-section">
                <footer id="velaFooter">
                    <?php include('footer.php'); ?>
                </footer>
            </div>

    <?php include('footer_links.php'); ?>

    <script src="js/main.js?key=<?= date('is') ?>" type="text/javascript"></script>
    <script>
        let api_url = "./api/get_user_details.php";
        $.ajax({
            url: api_url,
            type: 'POST',
            success: function (returned_data) {
                console.log(returned_data);
                var jsonData = JSON.parse(returned_data);
                var return_data = jsonData.response[0];
                console.log(typeof(parseInt(return_data.phone)));
                if(return_data.status === "ok"){
                    $(".name input").val(return_data.name)
                    $(".email input").val(return_data.email)
                    $(".address input").val(return_data.address)
                    $(".phone input").val( return_data.phone )
                }
                else{
                    window.location.href = "./login-page.php"
                }
            }
        })


        function update_user_details(){
            event.preventDefault()
            let api_url = "./api/set_user_details.php";
            
            // form data values
            let name = document.getElementById("profile_name").value;
            let contact = document.getElementById("profile_contact").value;
            let address = document.getElementById("profile_address").value;

            var form_data = { "edit_user": "edit","name":name,"address":address,"contact":contact};
            $.ajax({
            url: api_url,
            type: 'POST',
            data: form_data,
            success: function (returned_data) {
                console.log(returned_data);
                var jsonData = JSON.parse(returned_data);
                var return_data = jsonData.response[0];
                console.log(return_data);
                alert(return_data.message)
                }
            })

        }

    </script>
  


  </body>
</html>

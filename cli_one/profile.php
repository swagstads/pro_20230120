<html>
  <head>
  <?php include('./header_links.php') ?>
  <link rel="stylesheet" href="./assets/css/profile.css">
  </head>
  <body>
  <header id="velaHeader" class="velaHeader">
      <?php include('header.php') ?>
  </header>
    <div class="profile-page-container">
      <form onsubmit="update_user_details()" action="" enctype="multipart/form-data">
          <div class="left-section">
              <img id="profile_img" src="https://uxwing.com/wp-content/themes/uxwing/download/peoples-avatars/no-profile-picture-icon.png" alt="profile image">
              <input type="file" onchange="preview_profile(this)" name="profile_picture" class="profile-picture-inp" id="profile_picture">
              <div class="profile-actions">
                <button type="button" onclick="$('#profile_picture').click()">Edit profile</button>
                <!-- <button type="button">View profile</button> -->
              </div>
          </div>
          <div class="right-section">
              <label for="name"><h4>Name:</h4></label>
              <p class="info name"><input type="text" required id="profile_name" ></p>

              <label for="email"><h4>Email:</h4></label>
              <p class="info email"><input type="email" name="" id="profile_email" disabled required></p>
                              
              <label for="phone"><h4>Phone Number:</h4></label>
              <p class="info phone"><input type="tel" name="" id="profile_contact" required></p>
                      
                      
              <div class="address-fields">
                <label for="Address"><h4>Address:</h4></label>
                <div class="address-field-row">
                  <input type="hidden" class="profile_address_id" name="" id="profile_address_id">
                  <p class="info address"><input type="text" placeholder="Address Line 1" name="" id="profile_address_line_1" required></p>
                  <p class="info address"><input type="text" placeholder="Address Line 2" name="" id="profile_address_line_2" value=""></p>
                </div>
                <div class="address-field-row">
                  <p class="info address"><input type="text" placeholder="City" name="" id="profile_address_city" required></p>
                  <p class="info address"><input type="text" placeholder="State" name="" id="profile_address_state" required></p>
                  <p class="info address"><input type="tel" pattern="[0-9]+"  placeholder="Zip" name="" id="profile_address_zip" required></p>
                </div>
              </div>

              <div class="submit-bttn">
                  <button type="submit" class="submit-button">Save</button>
              </div>
          </div>
      </form>
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

                    $("#profile_img").attr("src",return_data.profile_img);

                    $(".name input").val(return_data.name)
                    $(".email input").val(return_data.email)
                    // $(".address input").val(return_data.address)profile_address_line_1
                    
                    $("#profile_address_id").val(return_data.profile_address_id)
                    $("#profile_address_line_1").val(return_data.profile_address_line_1)
                    $("#profile_address_line_2").val(return_data.profile_address_line_2)
                    $("#profile_address_city").val(return_data.profile_address_city)
                    $("#profile_address_state").val(return_data.profile_address_state)
                    $("#profile_address_zip").val(return_data.profile_address_zip)
                    $(".phone input").val( return_data.phone )

                }
                else{
                    window.location.href = "./login-page.php"
                }
            }
        })

        function preview_profile(profile_inp){
            var file = profile_inp.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                console.log(e.target);
                $('#profile_img').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }

        function update_user_details(){
            event.preventDefault()
            let api_url = "./api/set_user_details.php";
            
            // form data values
            let name = document.getElementById("profile_name").value;
            let contact = document.getElementById("profile_contact").value;

            let profile_picture = document.getElementById("profile_picture").files[0];

            let profile_address_id = document.getElementById("profile_address_id").value;
            let profile_address_line_1 = document.getElementById("profile_address_line_1").value;
            let profile_address_line_2 = document.getElementById("profile_address_line_2").value;
            let profile_address_city = document.getElementById("profile_address_city").value;
            let profile_address_state = document.getElementById("profile_address_state").value;
            let profile_address_zip = document.getElementById("profile_address_zip").value;

            var form_data = new FormData();
            form_data.append("edit_user", "edit");
            form_data.append("name", name);
            form_data.append("contact", contact);
            form_data.append("profile_address_id", profile_address_id);
            form_data.append("profile_address_line_1", profile_address_line_1);
            form_data.append("profile_address_line_2", profile_address_line_2);
            form_data.append("profile_address_city", profile_address_city);
            form_data.append("profile_address_state", profile_address_state);
            form_data.append("profile_address_zip", profile_address_zip);
            form_data.append("profile_picture", profile_picture);

            console.log(form_data);

            $.ajax({
            url: api_url,
            type: 'POST',
            data: form_data,
            contentType: false,
            processData: false,
            success: function (returned_data) {
                  console.log(returned_data);
                  var jsonData = JSON.parse(returned_data);
                  var return_data = jsonData.response[0];
                  console.log(return_data);
                  show_msg(return_data.message);
                }
            })

        }

    </script>
  


  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php require("./header_links.php") ?>
  <style>
    .show-reviews-container-wrapper{
      min-height: 200px;
      padding: 20px;
    }
    .show-reviews-container-wrapper .show-reviews-container{

    }
    .show-reviews-container-wrapper .show-reviews-container .reviews{
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .show-reviews-container-wrapper .show-reviews-container .reviews .review{
      display: flex;
      flex-direction: column;
      background-color: aliceblue;
      padding: 20px;
    }
    .show-reviews-container-wrapper .show-reviews-container .reviews .review .user-info{
      display: flex;
      align-items: center;
      gap: 20px;
    }
    .show-reviews-container-wrapper .show-reviews-container .reviews .review .user-info .profile-img-container{
      width: 60px;
    }
    .show-reviews-container-wrapper .show-reviews-container .reviews .review .user-info .profile-img-container .profile-img{
      width: 60px;
    }
    .show-reviews-container .user-ratings{
      margin-left: 50px;
    }
    .show-reviews-container .user-feeedback{
      margin-left: 60px;
    }
  </style>
</head>
<body>

  <div class="show-reviews-container-wrapper">
      <div class="show-reviews-container">

          <div class="reviews">




          </div>


          <script>
            function getFeedbacks(){
              let api_url = "./api/fetch_feedbacks.php";

              product_id = "1";

              // form data values
              var form_data = {product_id: product_id};
              $.ajax({
              url: api_url,
              type: 'POST',
              data: form_data,
              success: function (returned_data) {
                  var jsonData = JSON.parse(returned_data);
                  var return_data = jsonData.response;
                  console.log(return_data);

                  let rated_star = '<span class="rate-star rate-star-1">'+
                              '<svg id="Layer_1" data-name="Layer 1" height="50px" width="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 841.89">'+
                              '<polygon class="star-elem rated-fill" points="297.64 258.25 350.5 365.36 468.7 382.54 383.17 465.91 403.36 583.64 297.64 528.05 191.91 583.64 212.1 465.91 126.57 382.54 244.78 365.36 297.64 258.25"/>'+
                              '</svg>'+
                          '</span>'
                  let unrated_start = '<span class="rate-star rate-star-1">'+
                              '<svg id="Layer_1" data-name="Layer 1" height="50px" width="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 841.89">'+
                              '<polygon class="star-elem" points="297.64 258.25 350.5 365.36 468.7 382.54 383.17 465.91 403.36 583.64 297.64 528.05 191.91 583.64 212.1 465.91 126.57 382.54 244.78 365.36 297.64 258.25"/>'+
                              '</svg>'+
                          '</span>'
                    
                  for (let i = 0; i < return_data.length; i++) {
                    let star = "";
                    for (let j = 0; j < return_data[i].stars; j++) {
                      star += rated_star;
                    }
                    for (let j = return_data[i].stars; j < 5; j++) {
                      star += unrated_start;
                    }

                    let review_container = 
                      '<div class="review">'+
                        '<div class="user-info">'+
                            '<div class="profile-img-container">'+
                              '<img src="'+return_data[i].profile_img+'"  class="profile-mg"  alt="">'+
                            '</div>'+
                            '<div class="user-name">'+
                              return_data[i].name+
                            '</div>'+
                        '</div>'+
                        '<div class="user-ratings">'+
                            star+
                        '</div>'+
                        '<div class="user-feeedback">'+
                              return_data[i].feedback+
                        '</div>'+
                      '</div>'

                    $(".reviews").append(review_container);
                  }
                  

                  }
              })
            }
            getFeedbacks()
          </script>

      </div>
  </div>


</body>
</html>
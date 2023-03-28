<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./assets/css/style.css">
  <style>
    *{
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    .ratings-container-wrapper{
      min-height: 300px;
      display: flex;
      justify-content: center;
    }
    .ratings-container-wrapper .ratings-container{
      display: flex;
      flex-direction: column;
      gap: 20px;
      width: 100%;
      padding: 10px;
      background-color: aliceblue;
    }
    .ratings-container-wrapper .upper-box{
      display: flex;
      justify-content: space-between;
      padding: 10px 0;
    }
    .ratings-container-wrapper .upper-box .user-info{
      display: flex;
      gap: 10px;
      align-items: center;
    }
    .ratings-container-wrapper .upper-box .user-info .profile{
      width: 40px;
    }
    .ratings-container-wrapper .upper-box .rating-star-input img{
      width: 40px;
    }
    .ratings-container .bottom-box .feedback-input{
      width: 100%;
      min-height: 150px;
      resize: none;
      padding: 10px;
      border: 1px solid rgba(0, 0, 0, 0.279);
      outline: none;
    }
    .submit-ratings-bttn{
      background-color: var(--col1);
      padding: 15px 45px;
      border: none;
      color: white;
    }
    @media (min-width: 768px) {
    .ratings-container {
        max-width: 768px !important;
      }            
    }
    @media (min-width: 992px) {
    .ratings-container {
        max-width: 985px !important;
      }            
    }
    @media (min-width: 1220px){
    .ratings-container {
        max-width: 1210px !important;
      }
    }
  </style>
</head>
<body>
    <div class="ratings-container-wrapper">
        <div class="ratings-container">
          
            <div class="upper-box">

              <div class="user-info">
                
                <div class="profile-img-container">
                  <img src="./assets/icons/profile-svgrepo-com.svg" class="profile"  alt="">
                </div>

                <div class="user-details">
                  Rishabh Nahar
                </div> 

              </div>

              <div class="rating-star-input">
                <img src="./assets/icons/performance.svg" alt="">
                <img src="./assets/icons/performance.svg" alt="">
                <img src="./assets/icons/performance.svg" alt="">
                <img src="./assets/icons/performance.svg" alt="">
                <img src="./assets/icons/performance.svg" alt="">
              </div>

            </div>

            <div class="bottom-box">
              <div class="feedback-section">
                <textarea name="Feedback" class="feedback-input" placeholder="Give me feedback" id="" cols="30" rows="10"></textarea>
              </div>
            </div>

            <div class="submit-bttn-container">
              <button class="submit-ratings-bttn">Submit</button>
            </div>

        </div>
    </div>
</body>
</html>
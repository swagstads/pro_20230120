<?php

session_start();

require('config.php');

$data = array();
$response["response"] = array();

$data['alert_message'] = "";
$data['success_message'] = "";

if (isset($_POST['user_login'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT name,email,profile_img,password,role,id,status FROM users WHERE email=:email";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->execute();
  
  $result = $query->fetch(PDO::FETCH_OBJ);

  if(isset($result->email)){
    if($result->status === 'active'){
          $verify_res = password_verify($password,$result->password);
          if($verify_res == 1){
              $_SESSION['username'] = $_POST['email'];
              $_SESSION['user_id'] = $result->id;
              $_SESSION['name'] = $result->name;
              if(isset($result->profile_img)){
                $_SESSION['profile_img'] = $result->profile_img;
              }
              else{
                $_SESSION['profile_img'] = "https://uxwing.com/wp-content/themes/uxwing/download/peoples-avatars/no-profile-picture-icon.png";
              }
              $data['status'] = "ok";
              $data['success_message'] = "Logged in";
          } 
          else if($verify_res != 1){
              $data['status'] = "fail";
              $data['alert_message'] = "Invalid password";
          }
          else{
              $data['status'] = "fail";
              $data['alert_message'] = "Something went wrong!, please try again later";
          }
      }
      else{
        $data['status'] = "fail";
        $data['alert_message'] = "Please verify your email first";
      }

  } else{
    $data['status'] = "fail";
    $data['alert_message'] = "Invalid email or password";
  }

array_push($response["response"], $data);
echo json_encode($response);

}

?>
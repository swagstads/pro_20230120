<?php
session_start();
// error_reporting(0);
require('config.php');

$data = array();
$response["response"] = array();

$data['message'] = "Something went wrong, try again!";

if(isset($_POST['edit_user'])){

    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];

    $uploadDir = './profiles/'.$user_id.'/';
    $filePath = "";

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
        $data['message'] = "Folder created successfully!";
    } else {
        $data['message'] = "Folder already exists!";
    }

    if (!empty($_FILES['profile_picture'])) {
        $tmpName = $_FILES['profile_picture']['tmp_name'];
        $fileName = time()."_".$user_id."_".".jpg";
        $filePath = $uploadDir . $fileName;
        if (move_uploaded_file($tmpName, $filePath)) {
        } else {
          $data['message'] = 'Error uploading file';
        }
      } else {
        $data['message'] = 'No file uploaded';
      }

    $profile_address_id = $_POST['profile_address_id'];
    $profile_address_line_1 = $_POST['profile_address_line_1'];
    $profile_address_line_2 = $_POST['profile_address_line_2'];
    $profile_address_city = $_POST['profile_address_city'];
    $profile_address_state = $_POST['profile_address_state'];
    $profile_address_zip = $_POST['profile_address_zip'];

    $address = $profile_address_line_1.", ".$profile_address_line_2.", ".$profile_address_city.", ".$profile_address_state.", ".$profile_address_zip;

    //Update profile
    $sql = " UPDATE users SET name=:name, phone=:contact, address=:address,profile_img=:filePath WHERE id=:user_id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':contact', $contact, PDO::PARAM_STR);
    $query->bindParam(':address', $address, PDO::PARAM_STR);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $query->bindParam(':filePath', $filePath, PDO::PARAM_STR);
    if($query->execute()){

          if(!empty($_FILES['profile_picture'])){
            $_SESSION["profile_img"] = $filePath;
          }

          // Insert Address
          // $sql = " UPDATE addresses 
          // SET 
          // addressline1=:profile_address_line_1,
          // addressline2=:profile_address_line_2,
          // city=:profile_address_city,
          // state=:profile_address_state,
          // zip=:profile_address_zip
      
          // WHERE id=:profile_address_id";
      
          
          $sql = " INSERT into 
          addresses ( user_id, addressline1, addressline2, city, state, zip)
          VALUES ( :user_id, :profile_address_line_1, :profile_address_line_2, :profile_address_city, :profile_address_state, :profile_address_zip)";
      
          $query = $dbh->prepare($sql);
          $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
          // $query->bindParam(':profile_address_id', $profile_address_id, PDO::PARAM_STR);
          $query->bindParam(':profile_address_line_1', $profile_address_line_1, PDO::PARAM_STR);
          $query->bindParam(':profile_address_line_2', $profile_address_line_2, PDO::PARAM_STR);
          $query->bindParam(':profile_address_city', $profile_address_city, PDO::PARAM_STR);
          $query->bindParam(':profile_address_state', $profile_address_state, PDO::PARAM_STR);
          $query->bindParam(':profile_address_zip', $profile_address_zip, PDO::PARAM_STR);
      
          $query->execute();
      
          $data['status'] = "ok";
          $data['message'] = "Profile updated";

    }
}

array_push($response["response"], $data);
echo json_encode($response);


?>
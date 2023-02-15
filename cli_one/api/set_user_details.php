<?php
session_start();
// error_reporting(0);
require('config.php');

$data = array();
$response["response"] = array();

$data['message'] = "";

if(isset($_POST['edit_user'])){

    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];

    $profile_address_id = $_POST['profile_address_id'];
    $profile_address_line_1 = $_POST['profile_address_line_1'];
    $profile_address_line_2 = $_POST['profile_address_line_2'];
    $profile_address_city = $_POST['profile_address_city'];
    $profile_address_state = $_POST['profile_address_state'];
    $profile_address_zip = $_POST['profile_address_zip'];

    $address = $profile_address_line_1.", ".$profile_address_line_2.", ".$profile_address_city.", ".$profile_address_state.", ".$profile_address_zip;

    //Update profile
    $sql = " UPDATE users SET name=:name, phone=:contact, address=:address WHERE id=:user_id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':contact', $contact, PDO::PARAM_STR);
    $query->bindParam(':address', $address, PDO::PARAM_STR);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $query->execute();
    

    // Insert Address
    $sql = " UPDATE addresses 
    SET 

    addressline1=:profile_address_line_1,
    addressline2=:profile_address_line_2,
    city=:profile_address_city,
    state=:profile_address_state,
    zip=:profile_address_zip

    WHERE id=:profile_address_id";

    
    // $sql = " INSERT into 
    // addresses ( addressline1, addressline2, city, state, zip,)
    // VALUES ( profile_address_line_1, profile_address_line_2, profile_address_city, profile_address_state, profile_address_zip, )";

    $query = $dbh->prepare($sql);
    $query->bindParam(':profile_address_id', $profile_address_id, PDO::PARAM_STR);
    $query->bindParam(':profile_address_line_1', $profile_address_line_1, PDO::PARAM_STR);
    $query->bindParam(':profile_address_line_2', $profile_address_line_2, PDO::PARAM_STR);
    $query->bindParam(':profile_address_city', $profile_address_city, PDO::PARAM_STR);
    $query->bindParam(':profile_address_state', $profile_address_state, PDO::PARAM_STR);
    $query->bindParam(':profile_address_zip', $profile_address_zip, PDO::PARAM_STR);

    $query->execute();

    $data['status'] = "ok";
    $data['message'] = "Profile updated";
}

array_push($response["response"], $data);
echo json_encode($response);


?>
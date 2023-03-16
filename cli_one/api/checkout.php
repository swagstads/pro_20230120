<?php
session_start();
// error_reporting(0);
require('config.php');

$data = array();
$response["response"] = array();

$data['message'] = "Failed to checkout";


if(isset( $_GET['checkout'] )){
    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['username'];
    
    //Update profile
    $sql = " SELECT name, phone, address, status FROM users WHERE id=:user_id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    
    
    // $query->bindParam(':name', $name, PDO::PARAM_STR);
    // $query->bindParam(':contact', $contact, PDO::PARAM_STR);
    // $query->bindParam(':address', $address, PDO::PARAM_STR);
    
    
    $query->execute();
    
    $result = $query->fetch(PDO::FETCH_OBJ);
    
    if( $result-> status === 'active'){

        $user_address = $result->address;

        if( $user_address !== null OR strlen($user_address) >= 10 ){
            $data['status'] = "ok";
            $data['message'] = "Address provided";
        
        }
        else{
            $data['status'] = "fail";
            $data['message'] = "Please provide your valid address";
        }
    }
    else{
        $data['status'] = "fail";
        $data['message'] = "You are and unauthorized user";
    }
}


array_push($response["response"], $data);
echo json_encode($response);


?>
<?php

session_start();

require('config.php');

$data = array();
$response["response"] = array();

// if(isset( $_POST['fetch_address'] )){

    $user_id = $_SESSION['user_id'];
    
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
        if( $result-> address !== null){
            $data['status'] = "ok";
            $data['message'] = "Address fetched";
            $data['address'] = $result->address;
        }
        else{
            $data['status'] = "fail";
            $data['message'] = "Please complete your profile";
        }
    }
    else{
        $data['status'] = "fail";
        $data['message'] = "You are and unauthorized user";
    }
// }


array_push($response["response"], $data);
echo json_encode($response);

?>
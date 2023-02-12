<?php


require('./config.php'); 

session_start();
date_default_timezone_set('Asia/Kolkata');
 
$response["response"] = array();
$data = array();

if ( isset($_SESSION['username']) ) {

    $stmt = $dbh->prepare(' SELECT * FROM users WHERE email=:username');
    $stmt->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
    $stmt->execute();

    $fetch_data = $stmt->fetch(PDO::FETCH_OBJ);

    $data["status"] = "ok";
    $data["id"] = $fetch_data->id;
    $data["name"] = $fetch_data->name;
    $data["email"] = $fetch_data->email;
    $data["address"] = $fetch_data->address;
    $data["phone"] = $fetch_data->phone;

}

else{
    $data["status"] = "Fail";
    $data["message"] = "Login first";
}

array_push($response["response"], $data);
echo json_encode($response);


?>
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
    $address = $_POST['address'];

    //Update profile
    $sql = " UPDATE users SET name=:name, phone=:contact, address=:address WHERE id=:user_id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':contact', $contact, PDO::PARAM_STR);
    $query->bindParam(':address', $address, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_OBJ);;
        $data['status'] = "ok";
        $data['message'] = "Profile updated";
}

array_push($response["response"], $data);
echo json_encode($response);


?>
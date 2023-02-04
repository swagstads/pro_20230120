<?php

require('./config.php'); 
date_default_timezone_set('Asia/Kolkata');
 
$response["response"] = array();
$data = array();

if (isset($_GET['fetch_products'])) {
    $response["response"] = array();
    $data = array();
    // $user_id=$_POST['user_id'];
    $product_id = $_GET['productid'];
    $stmt = $dbh->prepare(' SELECT * FROM products WHERE id=:product_id ');
        
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
    $stmt->execute();

    $fetch_data = $stmt->fetch(PDO::FETCH_OBJ);

    // print_r($fetch_data);
    $data["id"] = $fetch_data->id;

    $data["title"] = $fetch_data->title;
    $data["description"] = $fetch_data->description;
    $data["mrp"] = $fetch_data->mrp;
    $data["price"] = $fetch_data->price;
    $data["img_location"] = $fetch_data->img_location;

    $data["status"] = "success";
    $data["reason"] = "product_fetched";
    array_push($response["response"], $data);

    
    echo json_encode($response);
}

?>
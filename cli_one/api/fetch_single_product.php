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
    $stmt = $dbh->prepare(' SELECT * FROM product JOIN category ON FIND_IN_SET(category.id, product.category_id) WHERE id=:product_id ');
        
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
    $stmt->execute();

    $fetch_data = $stmt->fetch(PDO::FETCH_OBJ);

    // print_r($fetch_data);
    $data["id"] = $fetch_data->id;

    $data["title"] = $fetch_data->title;
    $data["description"] = $fetch_data->description;
    $data["mrp"] = $fetch_data->mrp;
    $data["price"] = $fetch_data->price;
    $stmt2 = $dbh->prepare(' SELECT image_name FROM product_media WHERE product_id = :product_id');
    $stmt2->bindParam(':product_id', $data["id"], PDO::PARAM_STR);
    $stmt2->execute();
    $im_count = $stmt2->rowCount();
    for ($j = 0; $j < $im_count; $j++){
        $fetch_image = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        $data["image_name"] = $fetch_image[$j]['image_name'];
    }
    $data["status"] = "success";
    $data["reason"] = "product_fetched";
    array_push($response["response"], $data);

    
    echo json_encode($response);
}

?>
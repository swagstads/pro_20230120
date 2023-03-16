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
    $stmt = $dbh->prepare(' SELECT *,p.id AS prod_id, c.id AS category_id FROM product p JOIN category c ON FIND_IN_SET(c.id, p.category_id) WHERE p.id=:product_id ');
        
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
    $stmt->execute();

    $fetch_data = $stmt->fetch(PDO::FETCH_OBJ);

    // print_r($fetch_data);
    $data["id"] = $fetch_data->prod_id;
    $data["title"] = $fetch_data->title;
    $data["description"] = $fetch_data->description;
    $data["category_name"] = $fetch_data->category_name;
    $data["category_id"] = $fetch_data->category_id;
    $data["mrp"] = $fetch_data->mrp;
    $data["price"] = $fetch_data->price;
    $data["product_quantity"] = $fetch_data->quantity;
    
    $stmt2 = $dbh->prepare('SELECT image_name FROM product_media WHERE product_id = :product_id');
    $stmt2->bindParam(':product_id', $data["id"], PDO::PARAM_STR);
    $stmt2->execute();

    $im_count = $stmt2->rowCount();
    $data["image_name"] = array();
    $fetch_image = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    
    if($im_count > 0){
        for ($j = 0; $j < $im_count; $j++){
            array_push($data["image_name"],$fetch_image[$j]['image_name']);
        }
        $data["image"] = "yes";
    }
    else{
        $data["image"] = "no";
    }
    $data["status"] = "success";
    $data["reason"] = "product_fetched";
    array_push($response["response"], $data);

    
    echo json_encode($response);
}

?>
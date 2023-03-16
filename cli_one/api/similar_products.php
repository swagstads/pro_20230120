<?php

require('./config.php'); 
date_default_timezone_set('Asia/Kolkata');

$response["response"] = array();
$data = array();


if(isset( $_GET['product_title'])){
    $product_title = $_GET['product_title'];
    $category_name = $_GET['product_category_name'];
    
    $stmt = $dbh->prepare(' SELECT *,p.id AS prod_id FROM product p JOIN category c ON FIND_IN_SET(c.id, p.category_id) WHERE p.title = :product_title OR category_name = :category_name ORDER BY click_count DESC LIMIT 10');
    $stmt->bindParam(':product_title', $product_title, PDO::PARAM_STR);
    $stmt->bindParam(':category_name', $category_name, PDO::PARAM_STR);
    $stmt->execute();
    
    $count = $stmt->rowCount();
    
    // $data["product_title"] = $_GET["product_title"];
    // array_push($response["response"], $data);
    
    if ($count > 0) {
        $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < $count; $i++) {
            $data["prod_id"] = $fetch_data[$i]['prod_id'];
            $data["title"] = $fetch_data[$i]['title'];
            $data["category"] = $fetch_data[$i]['category_name'];
            $data["description"] = $fetch_data[$i]['description'];
            $data["product_quantity"] = $fetch_data[$i]['quantity'];
            $data["mrp"] = $fetch_data[$i]['mrp'];
            $data["price"] = $fetch_data[$i]['price'];
    
            $stmt2 = $dbh->prepare('SELECT image_name FROM product_media WHERE product_id = :product_id');
            $stmt2->bindParam(':product_id', $fetch_data[$i]['prod_id'], PDO::PARAM_STR);
            if($stmt2->execute()){
                $data['image_name']  = "";
                if($fetch_image = $stmt2->fetch(PDO::FETCH_OBJ)){
                    $data['image_name'] = $fetch_image->image_name;
                }
    
    
            }
    
    
            $data["status"] = "success";
            $data["reason"] = "orders_fetched";
            array_push($response["response"], $data);
        }
    } 
    else {
        $data["status"] = "failed";
        $data["reason"] = "No results";
        array_push($response["response"], $data);
    
    }
}
echo json_encode($response);

?>
<?php

require('./config.php'); 
date_default_timezone_set('Asia/Kolkata');

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

//    print_r($_POST);  
$response["response"] = array();
$data = array();

// if (isset($_POST['show_products'])) {
    $stmt = $dbh->prepare(' SELECT * FROM product JOIN category ON FIND_IN_SET(category.id, product.category_id) ');
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
        $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < $count; $i++) {
            $data["id"] = $fetch_data[$i]['id'];
            $data["title"] = $fetch_data[$i]['title'];
            $data["category"] = $fetch_data[$i]['category_name'];
            $data["description"] = $fetch_data[$i]['description'];
            $data["mrp"] = $fetch_data[$i]['mrp'];
            $data["price"] = $fetch_data[$i]['price'];
            $stmt2 = $dbh->prepare(' SELECT image_name FROM product_media WHERE product_id = :product_id');
            $stmt2->bindParam(':product_id', $data["id"], PDO::PARAM_STR);
            $stmt2->execute();
            $im_count = $stmt2->rowCount();
            for ($j = 0; $j < $im_count; $j++){
                $fetch_image = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                $data["image_name"] = $fetch_image[$j]['image_name'];
            }
            $data["quantity"] = $fetch_data[$i]['quantity'];
            $data["status"] = "success";
            $data["reason"] = "orders_fetched";
            array_push($response["response"], $data);
        }
} 
// else {
//     $data["status"] = "failed";
//     $data["reason"] = "No results";
//     array_push($response["response"], $data);

// }
// }
echo json_encode($response);

?>
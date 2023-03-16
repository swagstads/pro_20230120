<?php

require('./config.php'); 
date_default_timezone_set('Asia/Kolkata');

$response["response"] = array();
$data = array();


$stmt = $dbh->prepare('SELECT *, p.id AS prod_id FROM product p JOIN category c ON FIND_IN_SET(c.id, p.category_id) ORDER BY click_count DESC LIMIT 9');
$stmt->execute();

$count = $stmt->rowCount();

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
echo json_encode($response);

?>
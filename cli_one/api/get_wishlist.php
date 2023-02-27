<?php


require('./config.php'); 

session_start();
date_default_timezone_set('Asia/Kolkata');
 
$response["response"] = array();
$data = array();

if ( isset($_SESSION['user_id']) ) {

    $stmt = $dbh->prepare(' SELECT wishlist.id, product.id AS pid, product.title, product.price, product_media.image_name FROM wishlist JOIN product ON product.id = wishlist.product_id JOIN product_media on product_media.product_id = wishlist.product_id WHERE wishlist.user_id = :user_id GROUP BY product.id;');
    $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
    $stmt->execute();

    $fetch_data_wishlist = $stmt->fetch(PDO::FETCH_OBJ);

    $data["status"] = "ok";
    $data["id"] = $fetch_data_users->id;
    $data["pid"] = $fetch_data_users->pid;
    $data["image_name"] = $fetch_data_users->image_name;
    $data["price"] = $fetch_data_users->price;
    $data["title"] = $fetch_data_users->title;

}

else{
    $data["status"] = "Fail";
    $data["message"] = "Login first";
}

array_push($response["response"], $data);
echo json_encode($response);


?>
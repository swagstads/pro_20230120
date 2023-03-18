<?php

session_start();
// error_reporting(0);
require('config.php');

$date=date_create();
$timestamp_now =  date_timestamp_get($date);

$data = array();
$response["response"] = array();
try {
    if(isset($_SESSION['user_id'])){
        if (isset($_POST['instant_checkout'])) {
            
        // if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $product_id = $_POST['productid'];
            $quantity = $_POST['quantity'];
            // $amount = $_POST['amount'];
            
            // get the stock quantity
            $sql = "SELECT quantity,p.id AS product_id  FROM product p JOIN category c ON FIND_IN_SET(c.id, p.category_id) WHERE p.id=:product_id " ;
            $query = $dbh->prepare($sql);
            $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_OBJ);
            $data["qnty"] = $row->quantity;
            $data['proid'] = $row->product_id;
            
            if( $row->quantity >= 1){
                $stmt2 = $dbh->prepare('SELECT image_name FROM product_media WHERE product_id = :product_id');
                $stmt2->bindParam(':product_id', $row["product_id"], PDO::PARAM_STR);
                $stmt2->execute();
                $fetch_image = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                $data['image_name'] = $fetch_image[0]['image_name'];
                array_push($response["response"], $data);
            }
            else{   
                // insert to cart
                $data["status"] = "ok";
                $data["message"] = "Something is wrong here";
            } 
        }       
        else{
            $data["status"] = "ok";
            $data["message"] = "Item out of stock";
        }
    }
    else{
        $data["status"] = "ok";
        $data["message"] = "Please login to add items to cart";
    }
} 
catch (\Throwable $th) {
    $data["status"] = "Fail";
    $data["message"] = "Something went wrong, please try again later.";
    $data["error"] = $th;
}

array_push($response["response"], $data);
echo json_encode($response);
?>
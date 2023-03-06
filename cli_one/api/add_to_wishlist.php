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
        // if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $product_id = $_POST['productid'];
            // $amount = $_POST['amount'];
            
            // get the stock quantity
            $sql = " SELECT p.id AS product_id  FROM product p JOIN category c ON FIND_IN_SET(c.id, p.category_id) WHERE p.id=:product_id " ;
            $query = $dbh->prepare($sql);
            $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_OBJ);
            $data['proid'] = $row->product_id;
            
            $sql = " SELECT * FROM wishlist WHERE user_id=:user_id AND product_id=:product_id " ;
            $query = $dbh->prepare($sql);
            $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_OBJ);
            
            if($query->rowCount() !== 0){
                $data["status"] = "ok";
                $data["message"] = "Item is already in wishlist";                       
            }
            else{   
                // insert to cart
                $sql = "INSERT INTO wishlist (user_id, product_id) 
                            VALUES (:user_id, :product_id)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
            
                $query->execute();
                $result = $query->fetch(PDO::FETCH_OBJ);
                
                $data["status"] = "ok";
                $data["message"] = "Item added to wishlist";
            }
        }
        else{

            $data["status"] = "ok";
            $data["message"] = "Please login to add items to wishlist";
        }

} catch (\Throwable $th) {
    $data["status"] = "Fail";
    $data["message"] = "Something went wrong, please try again later.";
    $data["error"] = $th;
}

array_push($response["response"], $data);
echo json_encode($response);


?>
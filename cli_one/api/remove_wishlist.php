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
        if (isset($_POST['move_to_cart'])) {
            
        // if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $product_id = $_POST['productid'];
            $wishlist_id = $_POST['wishlist_id'];
            // $amount = $_POST['amount'];
            
            // get the stock quantity
            $sql = " SELECT id,quantity FROM products WHERE id=:product_id" ;
            $query = $dbh->prepare($sql);
            $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_OBJ);
            $data["qnty"] = $row->quantity;
            $data['proid'] = $row->id;
            
            if( $row->quantity >= 1){

                    $sql = " SELECT * FROM Cart WHERE user_id=:user_id 
                                AND product_id=:product_id " ;
            
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                    $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
                    $query->execute();
                    $row = $query->fetch(PDO::FETCH_OBJ);
                    
                    if($query->rowCount() !== 0){
                        $data["status"] = "ok";
                        $data["message"] = "Item is already in cart";
                    }

                    else{   
                        // remove from wishlist
                        $sql = "DELETE FROM wishlist WHERE id = :wishlist_id;";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':wishlist_id', $wishlist_id, PDO::PARAM_STR);
                        $query->execute();
                        // insert to cart
                        $sql = "INSERT INTO Cart (user_id, quantity, product_id) 
                                    VALUES (:user_id, :quantity, :product_id)";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                        $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
                        $query->bindParam(':quantity', $quantity, PDO::PARAM_STR);
                    
                        $query->execute();
                        $result = $query->fetch(PDO::FETCH_OBJ);
                        
                        $data["status"] = "ok";
                        $data["message"] = "Item added to cart";
                    }
                    
                }
                else{
                    $data["status"] = "ok";
                    $data["message"] = "Item out of stock";
                }
            }
        }
        else{
            $data["status"] = "ok";
            $data["message"] = "Please login to add items to cart";
        }

} catch (\Throwable $th) {
    $data["status"] = "Fail";
    $data["message"] = "Something went wrong, please try again later.";
    $data["error"] = $th;
}


array_push($response["response"], $data);
echo json_encode($response);


?>
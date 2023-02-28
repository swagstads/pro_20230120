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
        if (isset($_POST['add_to_cart'])) {
            
        // if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $product_id = $_POST['productid'];
            $quantity = $_POST['quantity'];
            // $amount = $_POST['amount'];
            
            // get the stock quantity
            $sql = " SELECT quantity,p.id AS product_id  FROM product p JOIN category c ON FIND_IN_SET(c.id, p.category_id) WHERE p.id=:product_id " ;
            $query = $dbh->prepare($sql);
            $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_OBJ);
            $data["qnty"] = $row->quantity;
            $data['proid'] = $row->product_id;
            
            if( $row->quantity >= 1){

                    $sql = " SELECT * FROM Cart WHERE user_id=:user_id AND product_id=:product_id " ;
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                    $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
                    $query->execute();
                    $row = $query->fetch(PDO::FETCH_OBJ);
                    
                    if($query->rowCount() !== 0 and $row->status === "in cart"){
                        if($quantity == $row->quantity){
                            $data["status"] = "ok";
                            $data["message"] = "Item is already in cart";
                        }
                        else if($quantity >= 1){
                        $sql = "UPDATE Cart SET quantity=:quantity  WHERE  user_id=:user_id AND product_id=:product_id  ";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                        $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
                        $query->bindParam(':quantity', $quantity, PDO::PARAM_STR);
                        $query->execute();
                        $result = $query->fetch(PDO::FETCH_OBJ);
            
                            $data["status"] = "ok";
                            $data["message"] = "Quantity updated";
                        }
                        else{
                            $data["status"] = "fail";
                            $data["message"] = "Quantity must be more than or equal to 1";
                        }
                    }

                    else{   
                            // insert to cart
                            $sql = "INSERT INTO Cart (user_id, quantity, product_id,status) 
                                        VALUES (:user_id, :quantity, :product_id,'in cart')";
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
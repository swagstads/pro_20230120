<?php

session_start();
// error_reporting(0);
require('config.php');

$date=date_create();
$timestamp_now =  date_timestamp_get($date);

$data = array();
$response["response"] = array();
if(isset($_SESSION['user_id'])){
    if (isset($_POST['instant_checkout'])) {    
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
                
                // insert to cart
                $sql = "INSERT INTO Cart (user_id, quantity, product_id,status) 
                            VALUES (:user_id, :quantity, :product_id,'instant_checkout')";
                $query = $dbh->prepare($sql);
                $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
                $query->bindParam(':quantity', $quantity, PDO::PARAM_STR);    
                $query->execute();
                $result = $query->fetch(PDO::FETCH_OBJ);
                $data["cart_id"] = $dbh->lastInsertId();
                $data["status"] = "ok";
                $data["message"] = "Redirecting to Instant Checkout";
            }
            else{
                $data["status"] = "ok";
                $data["message"] = "Item out of stock";
            }
        array_push($response["response"], $data);
        echo json_encode($response);
    }
    else if(isset($_POST['fetch_checkout'])){
        $user_id = $_SESSION['user_id'];
        // $product_id = $_POST['productid'];
        $quantity = $_POST['quantity'];
        $cart_id= $_POST['cart_id'];
        $sql =  "SELECT *,
                c.quantity AS cart_quantity,
                c.id AS cart_id, 
                p.quantity AS product_quantity 
                FROM cart c JOIN product p ON c.product_id = p.id 
                WHERE c.id=:cart_id AND c.status = 'instant_checkout'";
    
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_STR);
        $stmt->execute();
        
        $count = $stmt->rowCount();
        
        $data['row_count'] = $count;
    
        if($count > 0){
            $data['status'] = 'ok';
            $data['message'] = 'Got some cart data';
    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data['prod_id_'] = $row['product_id'];
                $data['cart_id'] = $row['cart_id'];
                $data['product_name'] = $row['title'];
                $data['product_description'] = $row['description'];
                $data['product_mrp'] = $row['mrp'];
                $data['product_price'] = $row['price'];
                $data['product_quantity'] = $row['product_quantity'];
    
                $stmt2 = $dbh->prepare('SELECT image_name FROM product_media WHERE product_id = :product_id');
                $stmt2->bindParam(':product_id', $row["product_id"], PDO::PARAM_STR);
                $stmt2->execute();
    
                $fetch_image = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    
                $data['image_name'] = $fetch_image[0]['image_name'];
    
                array_push($response["response"], $data);
                echo json_encode($response);
            }
        }
        array_push($response["response"], $data);
        echo json_encode($response);
    }    
    else{
        $data["status"] = "ok";
        $data["message"] = "Something went wrong, please try again later.";    
        array_push($response["response"], $data);
        echo json_encode($response);
    }
}
else{
    $data["status"] = "Fail";
    $data["message"] = "Please login to buy this product";
    array_push($response["response"], $data);
    echo json_encode($response);
}


?>
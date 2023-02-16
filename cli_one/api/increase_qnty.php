<?php

session_start();
// error_reporting(0);
require('config.php');

$date=date_create();
$timestamp_now =  date_timestamp_get($date);

$data = array();
$response["response"] = array();

try {

    // if(isset($_POST['quantity_action'])){

        $quantity = $_POST['quantity'];
        $product_id = $_POST['product_id'];
        // update quantity in cart
        $sql = "UPDATE cart SET quantity=:quantity WHERE product_id=:product_id AND user_id=:user_id" ;
        $query = $dbh->prepare($sql);
        $query->bindParam(':quantity', $quantity, PDO::PARAM_STR);
        $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $query->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
        if($query->execute()){    
            $data["status"] = "ok";
            $data['message'] = "quantity updated";
        }
        else{
            $data["status"] = "fail";
            $data['message'] = "quantity not updated";
        }
    // }
    
} catch (\Throwable $th) {
    echo "ERROR: ".$th;
    $data["status"] = "fail";
    $data['message'] = "click count not updated";
}

array_push($response["response"], $data);
echo json_encode($response);
?>
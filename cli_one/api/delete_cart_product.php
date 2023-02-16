<?php

session_start();
// error_reporting(0);
require('config.php');

$date=date_create();
$timestamp_now =  date_timestamp_get($date);

$data = array();
$response["response"] = array();

try {

    if(isset($_POST['remove'])){
        $product_id = $_POST['product_id'];
        // update quantity in cart
        $sql = "DELETE FROM cart  WHERE product_id=:product_id AND user_id=:user_id" ;
        $query = $dbh->prepare($sql);
        $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $query->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
        if($query->execute()){    
            $data["status"] = "ok";
            $data['message'] = "Product deleted";
        }
        else{
            $data["status"] = "fail";
            $data['message'] = "Product not deleted";
        }
    }
    
} catch (\Throwable $th) {
    echo "ERROR: ".$th;
    $data["status"] = "fail";
    $data['message'] = "something went wrong";
}

array_push($response["response"], $data);
echo json_encode($response);
?>
<?php

session_start();
// error_reporting(0);
require('config.php');

$date=date_create();
$timestamp_now =  date_timestamp_get($date);

$data = array();
$response["response"] = array();

try {
    if(isset($_POST['product_id'])){
        $product_id = $_POST['product_id'];
        $sql = "UPDATE product SET click_count = click_count + 1  WHERE id=:product_id" ;
        $query = $dbh->prepare($sql);
        $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        if($query->execute()){    
            $data["status"] = "ok";
            $data['message'] = "click count updated";
        }
        else{
            $data["status"] = "fail";
            $data['message'] = "click count not updated";
        }
    }
    
} catch (\Throwable $th) {
    echo "ERROR: ".$th;
    $data["status"] = "fail";
    $data['message'] = "click count not updated";
}

array_push($response["response"], $data);
echo json_encode($response);
?>
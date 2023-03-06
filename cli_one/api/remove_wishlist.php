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
        $wishlist_id = $_POST['wishlist_id'];
        $sql = "DELETE FROM wishlist WHERE id = :wishlist_id;";
        $query = $dbh->prepare($sql);
        $query->bindParam(':wishlist_id', $wishlist_id, PDO::PARAM_STR);
        $query->execute();
        $data["status"] = "ok";
        $data["message"] = "Item removed form wishlist";
    }else{
        $data["status"] = "ok";
        $data["message"] = "Please login to remove items from wishlist";
    }

} catch (\Throwable $th) {
    $data["status"] = "Fail";
    $data["message"] = "Something went wrong, please try again later.";
    $data["error"] = $th;
}


array_push($response["response"], $data);
echo json_encode($response);


?>
<?php

session_start();

require('config.php');

$data = array();
$response["response"] = array();

$data['alert_message'] = "";
$data['success_message'] = "";


$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

$sql = "SELECT user_id, product_id FROM recent_views WHERE user_id=:user_id AND product_id=:product_id ";
$query = $dbh->prepare($sql);
$query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
$query->bindParam(':user_id', $user_id, PDO::PARAM_STR);

if($query->execute()){
    $result = $query->fetch(PDO::FETCH_OBJ);

    if(isset($result->user_id)){
        $sql = "UPDATE recent_views  SET timestamp = CURRENT_TIMESTAMP  WHERE user_id=:user_id AND product_id=:product_id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);

        if($query->execute()){
            $data["status"] = "ok";
            $data["success_message"] = "Update timstamp in recent_views table";
        }
        else{
            $data["status"] = "fail";
            $data["alert_message"] = "Error updating in recent_views";
        }

    }
    else{
        // Inserting into recent views
        $sql = "INSERT INTO recent_views (user_id, product_id) VALUES (:user_id,:product_id)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);

        if($query->execute()){
            $data["status"] = "ok";
            $data["success_message"] = "Saved in recent_views table";
        }
        else{
            $data["status"] = "fail";
            $data["alert_message"] = "Error saving in recent_views";
        }

    }

}
else{
    $data["status"] = "fail";
    $data["alert_message"] = "Error saving in recent_views";
}






//   $result = $query->fetch(PDO::FETCH_OBJ);
array_push($response["response"], $data);
echo json_encode($response);


?>
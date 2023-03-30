<?php

require('./config.php'); 
date_default_timezone_set('Asia/Kolkata');

$response["response"] = array();
$data = array();

$product_id = $_POST['product_id'];

$stmt = $dbh->prepare('SELECT * FROM ratings WHERE product_id=:product_id ORDER BY timestamp DESC LIMIT 4');
$stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
if($stmt->execute()){
    $count = $stmt->rowCount();
    if($count > 0){
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < $count; $i++) {
            $user_id = $result[$i]['user'];

            $stmt2 = $dbh->prepare(' SELECT name, profile_img FROM users WHERE id=:user_id');
            $stmt2->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            if($stmt2->execute()){
                $user_details = $stmt2->fetch(PDO::FETCH_OBJ);
                $data['name'] = $user_details->name;
                $data['profile_img'] = $user_details->profile_img;
                $data['feedback'] =  $result[$i]['feedback'];
                $data['stars'] =  $result[$i]['stars'];
                array_push($response["response"], $data);
            }
            
        }
    }
    else{
        $data['status'] = "ok";
        $data["message"] = "No feedbacks yet...";
    }



}


echo json_encode($response);

?>
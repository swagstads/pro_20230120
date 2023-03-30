<?php

session_start();
// error_reporting(0);
require('config.php');

$data = array();
$response["response"] = array();

try {

    if(isset($_POST['product_id'])){
        $prod_id = $_POST['product_id'];
        $user_id = $_SESSION['user_id'];
        $feedback = $_POST['feedback'];  
        $stars = $_POST['stars'];


        $sql = "INSERT INTO ratings(`product_id`, `user`, `feedback`, `stars`) 
                VALUES (:product_id,:user_id,:feedback,:stars)";

        $query = $dbh->prepare($sql);
        $query->bindParam(':stars', $stars, PDO::PARAM_STR);
        $query->bindParam(':feedback', $feedback, PDO::PARAM_STR);
        $query->bindParam(':product_id', $prod_id, PDO::PARAM_STR);
        $query->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
        
        if($query->execute()){    
            $data["status"] = "ok";
            $data['message'] = "Feedback Added";
        }
        else{
            $data["status"] = "fail";
            $data['message'] = "Feedback not added";
        }
    }
    
} catch (\Throwable $th) {
    echo "ERROR: ".$th;
    $data["status"] = "fail";
    $data['message'] = "Error, try again later!";
}

array_push($response["response"], $data);
echo json_encode($response);
?>
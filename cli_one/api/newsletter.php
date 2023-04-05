<?php

session_start();

require('config.php');

$data = array();
$response["response"] = array();

$data['message'] = "";

if(isset($_POST['email'])){

        // Inserting into recent views
        $sql = "INSERT INTO newsletter_subscription (email) VALUES (:email)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        
        if($query->execute()){
            $data["status"] = "ok";
            $data["message"] = "Thank you for subscribing";
        }
        else{
            $data["status"] = "fail";
            $data["message"] = "Something went wrong, Check your connection and try again!";
        }
}

//   $result = $query->fetch(PDO::FETCH_OBJ);
array_push($response["response"], $data);
echo json_encode($response);


?>
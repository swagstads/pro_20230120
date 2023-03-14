<?php


require('./config.php'); 

session_start();
date_default_timezone_set('Asia/Kolkata');
 
$response["response"] = array();
$data = array();

if ( isset($_SESSION['username']) ) {

    $stmt = $dbh->prepare(' SELECT * FROM users WHERE email=:username');
    $stmt->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
    $stmt->execute();

    $fetch_data_users = $stmt->fetch(PDO::FETCH_OBJ);

    $data["status"] = "ok";
    $data["id"] = $fetch_data_users->id;
    $data["name"] = $fetch_data_users->name;
    $data["email"] = $fetch_data_users->email;
    $data["phone"] = $fetch_data_users->phone;
    if(isset($fetch_data_users->profile_img)){
        $data["profile_img"] = $fetch_data_users->profile_img;
    }

    try {
        //code...
        $stmt2 = $dbh->prepare(' SELECT * FROM addresses WHERE user_id=:user_id ORDER BY modified_on DESC');
        $stmt2->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
        $stmt2->execute();
        if($fetch_address_users = $stmt2->fetch(PDO::FETCH_OBJ)){
                $data["profile_address_id"] = $fetch_address_users->id;
                $data["profile_address_line_1"] = $fetch_address_users->addressline1;
                $data["profile_address_line_2"] = $fetch_address_users->addressline2;
                $data["profile_address_city"] = $fetch_address_users->city;
                $data["profile_address_state"] = $fetch_address_users->state;
                $data["profile_address_zip"] = $fetch_address_users->zip;
        }
        else{
            $data["profile_address_status"] = "fail" ;
            $data["profile_address_reason"] = "Address not found"; 
        }

    } catch (\Throwable $th) {
        
    }



}
else{
    $data["status"] = "Fail";
    $data["message"] = "Login first";
}

array_push($response["response"], $data);
echo json_encode($response);


?>
<?php
session_start();
// error_reporting(0);
require('config.php');

$data = array();
$response["response"] = array();

$data['message'] = "";

if(isset($_POST['edit_address'])){

    $user_id = $_SESSION['user_id'];

    $address_line_1 = $_POST['address_line_1'];
    $address_line_2 = $_POST['address_line_2'];
    $address_city = $_POST['address_city'];
    $address_state = $_POST['address_state'];
    $address_zip = $_POST['address_zip'];

    $address = $address_line_1.", ".$address_line_2.", ".$address_city.", ".$address_state.", ".$address_zip;

    $sql = "UPDATE users SET address=:address WHERE id = :user_id ";
    $query = $dbh->prepare($sql);
    $query->bindParam(':address', $address, PDO::PARAM_STR);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    if($query->execute()){

        $data['status'] = "ok";
        $data['message'] = "Address updated in cart";

        $sql = " INSERT INTO addresses (user_id, addressline1, addressline2, city,status, state, zip )
        VALUES ( :user_id, :address_line_1, :address_line_2, :address_city,'secondary', :address_state, :address_zip )";

        $query = $dbh->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':address_line_1', $address_line_1, PDO::PARAM_STR);
        $query->bindParam(':address_line_2', $address_line_2, PDO::PARAM_STR);
        $query->bindParam(':address_city', $address_city, PDO::PARAM_STR);
        $query->bindParam(':address_state', $address_state, PDO::PARAM_STR);
        $query->bindParam(':address_zip', $address_zip, PDO::PARAM_STR);

        if($query->execute()){
            $data['status'] = "ok";
            $data['message'] = "address updated";
            $data['updated_address'] = $address;
        }else{
            $data['status'] = "fail";
            $data['message'] = "address not updated";        
        }

    }
    else{
        $data['status'] = "fail";
        $data['message'] = "address not updated";
    }
}

array_push($response["response"], $data);
echo json_encode($response);


?>
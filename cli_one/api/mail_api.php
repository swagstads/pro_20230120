<?php
// session_start();
// require('connection.php');
require('mail.php');
include('config.php');

// $dbConn = getDB();

date_default_timezone_set('Asia/Kolkata');
$added_on =  date('d-m-Y h:i:s');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// print_r($_POST);
$response["response"] = array();
$data = array();


if (isset($_POST['mail'])) {

    $email = $_POST['email'];

    $stmt = $dbh->prepare("SELECT * FROM `sign_up` WHERE `email`=:email");
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    // $fetched_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $email = $fetched_array[0]['email'];
    $count = $stmt->rowCount();
    if ($count > 0) {
        $data["status"] = "success";
        $data["reason"] = "email_sent_successfully";
        send_mail($email);
        
    } else {
        $data["status"] = "failed";
        $data["reason"] = "email_already_exists_as_vendor";
        array_push($response["response"], $data);
    }
    echo json_encode($response);
}

// if (isset($_POST['check_mail'])) {

//     // $otp = $_POST['otp'];
//     $email = $_POST['email'];

//     $stmt = $dbh->prepare("SELECT * FROM `login` WHERE `email`=:email");
//     $stmt->bindParam(":email", $email, PDO::PARAM_STR);
//     $stmt->execute();
//     // $fetched_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     // $email = $fetched_array[0]['email'];
//     $count = $stmt->rowCount();
//     if ($count > 0) {
//         $data["status"] = "success";
//         $data["reason"] = "email_already_exists";
//         array_push($response["response"], $data);
//     } else {
//         $data["status"] = "failed";
//         $data["reason"] = "email_not_found";
//         array_push($response["response"], $data);
//     }
//     echo json_encode($response);
// }

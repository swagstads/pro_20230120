<?php
session_start();
require('connection.php');
//  $db_conn = getDB();

date_default_timezone_set('Asia/Kolkata');
$added_on =  date('d-m-Y h:i:s');
$added_by =  "admin";

$response["response"] = array();
$data = array();

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// print_r($_POST);
// print_r($_FILES);

// if (isset($_POST['vendor_changepwd'])) {

//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $password = trim(hash('sha256', $password));

//     $stmt = $dbConn->prepare("UPDATE `ap_vendor` SET `password`= :password WHERE email = :email and status = 'A' ");
//     $stmt->bindParam(":email", $email, PDO::PARAM_STR);
//     $stmt->bindParam(":password", $password, PDO::PARAM_STR);

//     $stmt->execute();
//     if ($stmt->rowCount() >= 0) {
//         $data["reason"] = "updated";
//         $data["status"] = "success";
//         array_push($response["response"], $data);
//     }
//     else {
//         $data["status"] = 'failed';
//         $data["reason"] = 'change_password_failed';
//         array_push($response["response"], $data);
//     }
//     echo json_encode($response);
// }

if (isset($_POST['user_changepwd'])) {

    $email = $_POST['email'];
    $modified_on = date('d-m-Y h:i:s');
    $password = $_POST['password'];
    $password = trim(hash('sha256', $password));

    $stmt = $dbConn->prepare("UPDATE `sign_up` SET `password`= :password, `modified_on`= :modified_on, `modified_by`= :modified_by WHERE email = :email ");
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR);
    $stmt->bindParam(":modified_on", $modified_on, PDO::PARAM_STR);
    $stmt->bindParam(":modified_by", $email, PDO::PARAM_STR);

    $stmt->execute();
    if ($stmt->rowCount() >= 0) {
        $data["reason"] = "updated";
        $data["status"] = "success";
        array_push($response["response"], $data);
    } else {
        $data["status"] = 'failed';
        $data["reason"] = 'change_password_failed';
        array_push($response["response"], $data);
    }

    echo json_encode($response);
}

// if (isset($_POST['vendor_login'])) {

//     $email = $_POST['email'] ?? "";
//     $password = $_POST['password'] ?? "";  // 1234   - sjdskhowqeasdasdqwdqwe532558 - 
//     $hash_password = trim(hash('sha256', $password));

//     // echo $hash_password ;
//     if(isset( $_POST['password'])){                   //login_type = normal
//         $sql = $dbConn->prepare("SELECT * FROM `ap_vendor` WHERE (email=:email and password =:password) and status ='A' "); // password authentication
//         $sql->bindParam(":email", $email, PDO::PARAM_STR);
//         $sql->bindParam(":password", $hash_password, PDO::PARAM_STR);
//     }
//     else
//     {
//         $sql = $dbConn->prepare("SELECT * FROM `ap_vendor` WHERE email=:email  and status ='A' "); // google facebook
//         $sql->bindParam(":email", $email, PDO::PARAM_STR);
//     }
//     $sql->execute();
//     $count = $sql->rowCount();
//     // $sql->debugDumpParams();
//     if ($count > 0) {
//         $fetched_array = $sql->fetchAll(PDO::FETCH_ASSOC);
//         for ($i = 0; $i < $count; $i++) {
//             // $_SESSION['user_id@kabadi'] = $fetched_array[0]['id'];        
//             $data["email"] = $fetched_array[$i]['email'];
//             $data["name"] = $fetched_array[$i]['name'];
//             $data["contact"] = $fetched_array[$i]['contact'];
//             $data["designation"] = $fetched_array[$i]['designation'];
//             $data["status"] = 'success';
//             $data["reason"] = 'account_found';
//             array_push($response["response"], $data);
//         }
//     } else {

//         $data["status"] = 'failed';
//         $data["reason"] = 'account_does_not_exists';
//         array_push($response["response"], $data);
//         // echo "<script>window.location.href='../login.php?reason=userNotFound'; </script>";
//         // echo $hash_password;
//         // echo "<script>window.location.href='category.php'; </script>";
//     }
//     echo json_encode($response);
// }
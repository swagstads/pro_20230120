<?php

require('config.php');
// $dbh = getDB();

date_default_timezone_set('Asia/Kolkata');
$added_on =  date('d-m-Y h:i:s');

$response["response"] = array();
$data = array();

if (isset($_POST['user_login'])) {

    $password = $_POST['password'];
    $password = trim(hash('sha256', $password));
    // echo $password;
    $email = $_POST['email'] ?? '';

    $stm = $dbh->prepare("SELECT * FROM `users` WHERE email = :email  and password = :password");
    $stm->bindParam(":email", $email, PDO::PARAM_STR);
    $stm->bindParam(":password", $password, PDO::PARAM_STR);

    $stm->execute();
    $count = $stm->rowCount();
    if ($count > 0) {
        $fetched_array = $stm->fetchAll(PDO::FETCH_ASSOC);

        $data["id"] = $fetched_array[0]['id'];
        $data["name"] = $fetched_array[0]['name'];
        $data["contact"] = $fetched_array[0]['contact'];
        $data["email"] = $fetched_array[0]['email'];
        $data["status"] = 'success';

        array_push($response["response"], $data);
    } else {

        $data["status"] = 'failed';
        $data["reason"] = 'account_does_not_exists';
        array_push($response["response"], $data);
    }
    echo json_encode($response);
}

// if (isset($_POST['category']) && ($_POST['category'] == "get_cat")) {

//     $stmt = $dbh->prepare("SELECT * FROM category"); //where status ='A'
//     $stmt->execute();
//     $count = $stmt->rowCount();
//     if ($count > 0) {

//         $fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         for ($i = 0; $i < $count; $i++) {
//             $data["name"] = $fetch_array[$i]['name'];
//             $data["image"] = $fetch_array[$i]['image'];
//             $data["description"] = $fetch_array[$i]['description'];
//             $data["status"] = 'success';

//             array_push($response["response"], $data);
//         }
//     } else {
//         $data["reason"] = "not_found";
//         $data["status"] = "failed";
//         array_push($response["response"], $data);
//     }
//     echo json_encode($response);
// }

<?php
require '../db.php';

$response=array();
$data = array();

if(isset($_POST['uid'])){
    $uid = $_POST['uid'];
    $query = "SELECT * FROM `app_users` JOIN `players` ON `app_users`.`firebase_id` = `players`.`firebase_id` WHERE `app_users`.`firebase_id` = '$uid' LIMIT 1;";
    $users = mysqli_query($conn, $query);
    if (mysqli_num_rows($users) > 0) {
        while ($row = $users->fetch_assoc()) {
            array_push($data, $row);
        }
    }
    $response= $data;
    echo json_encode($response);
}
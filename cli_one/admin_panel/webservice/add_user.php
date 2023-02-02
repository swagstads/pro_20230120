<?php
require '../db.php';

$response=array();

if(isset($_POST['device_id']) && !empty($_POST['device_id'])) {
    $device_id=$_POST['device_id'];
    if(isset($_POST['uid'])){
        $uid=$_POST['uid'];
    }
    else{
        $uid='';
    }
    if(isset($_POST['fcm_id'])){
        $fcm_id=$_POST['fcm_id'];
    }else{
        $fcm_id='';
    }

    if(isset($_POST['device_type'])){
        $device_type=$_POST['device_type'];
    }else{
        $device_type='';
    }

    if(isset($_POST['language_id'])){
        $language_id=$_POST['language_id'];
    }else{
        $language_id=0;
    }

    $check=mysqli_query($conn,"select * from users where device_id='$device_id'");
    if(mysqli_num_rows($check)){
        $updatedata=mysqli_query($conn,"update users set fcm_id='$fcm_id',device_type='$device_type',language_id='$language_id',updated_at=now(), uid='$uid' where device_id='$device_id';");
        if ($updatedata) {
            $get_user = mysqli_query($conn,"select * from users where device_id='$device_id'");
            $response['success'] = 1;
            $response['message'] = "Success";
            $response['user_arr'] = $get_user->fetch_assoc();
        }
        else {
            $response['success'] = 0;
            $response['message'] = "Server error. Please try again.";
        }
    }else{
        $insertdata=mysqli_query($conn,"insert into users(device_id,fcm_id,device_type,language_id,uid,created_at,updated_at) values ('$device_id','$fcm_id','$device_type','$language_id','$uid',now(),now());");
        $id = mysqli_insert_id($conn);
        if ($insertdata) {
            $get_user = mysqli_query($conn,"select * from users where device_id='$device_id'");
            $response['success'] = 1;
            $response['message'] = "Success";
            $response['user_arr'] = $get_user->fetch_assoc();
        }
        else {
            $response['success'] = 0;
            $response['message'] = "Server error. Please try again.";
        }
    }


}else{
    $response['success'] = 0;
    $response['message'] = "Please enter valid data";
}

echo json_encode($response);

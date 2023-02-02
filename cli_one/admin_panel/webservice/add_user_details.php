<?php
require '../db.php';

$response=array();

if(isset($_POST['uid']) && !empty($_POST['uid'])) {
    $firebase_id=$_POST['uid'];
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
    }else{
        $name='';
    }

    if(!empty($_POST['phone'])){
        $phone=$_POST['phone'];
    }else{
        $phone='';
    }

    if(!empty($_POST['mail'])){
        $mail=$_POST['mail'];
    }else{
        $mail='';
    }

    $check=mysqli_query($conn,"select * from app_users where firebase_id='$firebase_id'");
    if(mysqli_num_rows($check)){
        $updatedata=mysqli_query($conn,"update app_users set name='$name',email='$mail',phone='$phone' where firebase_id = '$firebase_id';");
        if ($updatedata) {
            $get_user = mysqli_query($conn,"select * from app_users where firebase_id='$firebase_id'");
            $response['success'] = 1;
            $response['message'] = "Success";
            $response['user_arr'] = $get_user->fetch_assoc();
        }
        else {
            $response['success'] = 0;
            $response['message'] = "Server error. Please try again.";
        }
    }else{
        $insertdata=mysqli_query($conn,"insert into app_users(firebase_id,name,email,phone) values ('$firebase_id','$name','$mail','$phone');");
        if ($insertdata) {
            $get_user = mysqli_query($conn,"select * from app_users where firebase_id='$firebase_id'");
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

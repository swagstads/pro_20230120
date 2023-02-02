<?php
require '../db.php';

$response=array();

if(!empty($_POST['uid'])) {
    $owner=$_POST['uid'];
    if(isset($_POST['team_id'])){
        $team_id=$_POST['team_id'];
    }else{
        $team_id='';
    }
    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }else{
        $name='';
    }

    if(isset($_POST['players'])){
        $players=$_POST['players'];
    }else{
        $players='{}';
    }

    if(isset($_POST['location'])){
        $location=$_POST['location'];
    }else{
        $location='{}';
    }

    if(isset($_POST['logo_name'])){
        $logo_name=$_POST['logo_name'];
    }else{
        $logo_name='{}';
    }

    $check=mysqli_query($conn,"select * from teams where id='$team_id'");
    if(mysqli_num_rows($check)){
        $updatedata=mysqli_query($conn,"update team set name='$name', owner='$owner', players='$players', updated_at=now(), location='$location' where id='$team_id';");
        if ($updatedata) {
            $get_match = mysqli_query($conn,"select * from teams where id='$team_id'");
            $response['success'] = 1;
            $response['message'] = "Success";
            $response['match_arr'] = $get_match->fetch_assoc();
        }
        else {
            $response['success'] = 0;
            $response['message'] = "Server error. Match not created. Please try again.";
        }
    }else{
        $insertdata=mysqli_query($conn,"INSERT INTO `teams`(`name`, `owner`, `players`, `location`, `logo_name`, `created_at`, `updated_at`) VALUES ('$name','$owner','$players','$location','$logo_name',now(),now());");
        $id = mysqli_insert_id($conn);
        if ($insertdata) {
            $get_match = mysqli_query($conn,"select * from teams where id='$id'");
            $response['success'] = 1;
            $response['message'] = "Success";
            $response['user_arr'] = $get_match->fetch_assoc();
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

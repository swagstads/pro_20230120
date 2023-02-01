<?php
    require '../db.php';
    if(isset($_POST['img'])){
        $img = $_POST['img'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $user = $_POST['user'];
        $time = $_POST['time'];
        $salt = $user;
        $salt .= $time;
        $filename = md5($salt);
        fopen('../uploads/test/'.$filename.'.png', "w");
        file_put_contents('../uploads/test/'.$filename.'.png', $data);
    }else{
        $img = 'user.png';
    }
    if(!empty($_POST['uid'])){
        $uid = $_POST['uid'];
        $name = $_POST['name'];
        $location = $_POST['location'];
        $dob = $_POST['dob'];
        $phone = $_POST['phone'];
        $email = $_POST['mail'];
        $player_query = "INSERT INTO `players`(`firebase_id`) VALUES ('$uid');";
        $user_query = "INSERT INTO `users`(`firebase_id`, `name`, `location`, `email`, `phone`, `dob`, `profile_picture`)";
        $user_query .= " VALUES ('$uid','$name','$location','$email','$phone','$dob','$img');";
        $player = mysqli_query($conn, $player_query);
        $user = mysqli_query($conn, $user_query);
    }
    if($user){
        echo "Success";
    }
?>
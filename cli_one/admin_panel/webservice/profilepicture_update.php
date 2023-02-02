<?php
    require '../db.php';
    if(isset($_POST['user'])){
        $img = $_POST['img'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $user = $_POST['user'];
        $time = $_POST['time'];
        $salt = $user;
        $salt .= $time;
        $filename = md5($salt);
        fopen('../uploads/profilepictures/'.$filename.'.png', "w");
        file_put_contents('../uploads/profilepictures/'.$filename.'.png', $data);
        $query = "UPDATE `app_users` SET `profile_picture` = '$filename' WHERE `firebase_id` = '$user'";
        $profile = mysqli_query($conn, $query);
    }
?>
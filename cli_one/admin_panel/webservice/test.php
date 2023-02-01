<?php
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
?>
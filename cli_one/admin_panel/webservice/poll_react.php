<?php
include '../db.php';
if(isset($_POST['poll_id']) && isset($_POST['uid'])){
    $uid = $_POST['uid'];
    $poll_id = $_POST['poll_id'];
    $check = mysqli_query($conn, "SELECT `id` FROM `poll_reacts` WHERE `user_id`='$uid' AND `poll_id` = '$poll_id';");
    if(mysqli_num_rows($check)){
        $remove_query = "DELETE FROM `poll_reacts` WHERE `user_id`='$uid' AND `poll_id` = '$poll_id';";
        mysqli_query($conn, $remove_query);
    }else {
        $insert_query = "INSERT INTO `poll_reacts`(`user_id`, `poll_id`, `time`) VALUES ('$uid','$poll_id',now());";
        mysqli_query($conn, $insert_query);
    }
    
}

?>
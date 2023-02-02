<?php
include '../db.php';
if(isset($_POST['post_id']) && isset($_POST['uid'])){
    $uid = $_POST['uid'];
    $post_id = $_POST['post_id'];
    $check = mysqli_query($conn, "SELECT `id` FROM `feed_reacts` WHERE `user_id`='$uid' AND `feed_id` = '$post_id';");
    if(mysqli_num_rows($check)){
        $remove_query = "DELETE FROM `feed_reacts` WHERE `user_id`='$uid' AND `feed_id` = '$post_id';";
        mysqli_query($conn, $remove_query);
    }else {
        $insert_query = "INSERT INTO `feed_reacts`(`user_id`, `feed_id`, `time`) VALUES ('$uid','$post_id',now());";
        mysqli_query($conn, $insert_query);
    }
    
}

?>
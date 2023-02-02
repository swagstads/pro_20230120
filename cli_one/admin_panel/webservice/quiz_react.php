<?php
include '../db.php';
if(isset($_POST['quiz_id']) && isset($_POST['uid'])){
    $uid = $_POST['uid'];
    $quiz_id = $_POST['quiz_id'];
    $check = mysqli_query($conn, "SELECT `id` FROM `quiz_reacts` WHERE `user_id`='$uid' AND `quiz_id` = '$quiz_id';");
    if(mysqli_num_rows($check)){
        $remove_query = "DELETE FROM `quiz_reacts` WHERE `user_id`='$uid' AND `quiz_id` = '$quiz_id';";
        mysqli_query($conn, $remove_query);
    }else {
        $insert_query = "INSERT INTO `quiz_reacts`(`user_id`, `quiz_id`, `time`) VALUES ('$uid','$quiz_id',now());";
        mysqli_query($conn, $insert_query);
    }
    
}
?>
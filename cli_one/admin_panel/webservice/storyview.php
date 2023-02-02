<?php
include '../db.php';
if(isset($_POST['uid'])){
    $uid = $_POST['uid'];
}
if(isset($_POST['story_id'])){
    $story_id = $_POST['story_id'];
}
mysqli_query($conn, "INSERT INTO `story_views`(`story_id`, `user_id`) VALUES ('$story_id','$uid')");
?>
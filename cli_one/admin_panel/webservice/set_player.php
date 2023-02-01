<?php
    require '../db.php';
    if(!empty($_POST['uid'])){
        $uid = $_POST['uid'];
        $role = '';
        $batting_style = '';
        $bowling_style = '';
        if(isset($_POST['role'])){
            $role = $_POST['role'];
        }
        if(isset($_POST['batting_style'])){
            $batting_style = $_POST['batting_style'];
        }
        if(isset($_POST['bowling_style'])){
            $bowling_style = $_POST['bowling_style'];
        }
    }
    $player_query = "UPDATE `players` SET `role`='$role',`batting_style`='$batting_style',`bowling_style`='$bowling_style' WHERE `firebase_id`='$uid';";
    $player = mysqli_query($conn, $player_query);
    if($player){
        echo "Success";
    }
?>
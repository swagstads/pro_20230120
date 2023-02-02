<?php
require '../db.php';
$response=array();
$data = array();
$currentPage = 1;
if(isset($_POST['uid'])){
    $uid = $_POST['uid'];
}
$query = "SELECT id, caption, time FROM `poll` WHERE is_active='yes' ORDER BY time DESC LIMIT 50";
$poll = mysqli_query($conn, $query);
if (mysqli_num_rows($poll) > 0) {
    while ($row = $poll->fetch_assoc()) {
        $poll_id = $row['id'];
        $row['reacts'] = mysqli_num_rows(mysqli_query($conn,"SELECT `user_id` FROM `poll_reacts` WHERE poll_id='$poll_id'"));
        $row['comment_count'] = mysqli_num_rows(mysqli_query($conn,"SELECT `user_id` FROM `poll_comments` WHERE poll_id='$poll_id'"));
        $row['poll_media'] = array();
        $row['poll_options'] = array();
        $poll_media = mysqli_query($conn, "SELECT image_name FROM `poll_media` WHERE poll_id='$poll_id'");
        $poll_options = mysqli_query($conn, "SELECT id, option_name, count FROM `poll_options` WHERE poll_id='$poll_id'");
        $likes = mysqli_query($conn, "SELECT `id` FROM `poll_reacts` WHERE `user_id`='$uid' AND `poll_id` = '$poll_id';");
        if (mysqli_num_rows($likes) > 0) {
            $row['is_liked'] = 'true';
        }else{
            $row['is_liked'] = 'false';
        }
        if (mysqli_num_rows($poll_media) > 0) {
            while ($row_data = $poll_media->fetch_assoc()) {
                array_push($row['poll_media'], $row_data);
            }
        }
        if (mysqli_num_rows($poll_options) > 0) {
            while ($options_data = $poll_options->fetch_assoc()) {
                array_push($row['poll_options'], $options_data);
            }
        }
        $poll_comments = mysqli_query($conn, "SELECT `poll_comments`.`comment`, `user_data`.`user_name` FROM `poll_comments` JOIN `user_data` ON `poll_comments`.`user_id` = `user_data`.`uid` WHERE `poll_comments`.`poll_id`='$poll_id' LIMIT 1;");
        if (mysqli_num_rows($poll_comments) > 0) {
            while ($row_comment = $poll_comments->fetch_assoc()) {
                $row['comment'] = $row_comment['comment'];
                $row['comment_name'] = $row_comment['user_name'];
            }
        }
        else{
            $row['comment'] = 'No Comments';
            $row['comment_name'] = 'Add Comment';
        }
        array_push($data, $row);
    }
}
$response= array_slice($data, $perPage * ($currentPage - 1), $perPage);
echo json_encode($response);
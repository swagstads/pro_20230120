<?php
require '../db.php';
$response=array();
$data = array();
$currentPage = 1;
if(isset($_POST['uid'])){
    $uid = $_POST['uid'];
}
$query = "SELECT id, caption, time FROM `feed` WHERE is_active='yes' ORDER BY time DESC LIMIT 50";
$feed = mysqli_query($conn, $query);
if (mysqli_num_rows($feed) > 0) {
    while ($row = $feed->fetch_assoc()) {
        $feed_id = $row['id'];
        $row['reacts'] = mysqli_num_rows(mysqli_query($conn,"SELECT `user_id` FROM `feed_reacts` WHERE feed_id='$feed_id'"));
        $row['comment_count'] = mysqli_num_rows(mysqli_query($conn,"SELECT `user_id` FROM `feed_comments` WHERE feed_id='$feed_id'"));
        $row['feed_media'] = array();
        $feed_media = mysqli_query($conn, "SELECT image_name FROM `feed_media` WHERE feed_id='$feed_id'");
        if (mysqli_num_rows($feed_media) > 0) {
            while ($row_data = $feed_media->fetch_assoc()) {
                array_push($row['feed_media'], $row_data);
            }
        }
        $feed_comments = mysqli_query($conn, "SELECT `feed_comments`.`comment`, `user_data`.`user_name` FROM `feed_comments` JOIN `user_data` ON `feed_comments`.`user_id` = `user_data`.`uid` WHERE `feed_comments`.`feed_id`='$feed_id' LIMIT 1;");
        if (mysqli_num_rows($feed_comments) > 0) {
            while ($row_comment = $feed_comments->fetch_assoc()) {
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
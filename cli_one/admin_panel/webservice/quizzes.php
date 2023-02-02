<?php
require '../db.php';
$response=array();
$data = array();
$currentPage = 1;
if(isset($_POST['uid'])){
    $uid = $_POST['uid'];
}
$query = "SELECT id, caption, description, time FROM `quiz` WHERE is_active='yes' ORDER BY time DESC LIMIT 50";
$quiz = mysqli_query($conn, $query);
if (mysqli_num_rows($quiz) > 0) {
    while ($row = $quiz->fetch_assoc()) {
        $quiz_id = $row['id'];
        $row['reacts'] = mysqli_num_rows(mysqli_query($conn,"SELECT `user_id` FROM `quiz_reacts` WHERE quiz_id='$quiz_id'"));
        $row['comment_count'] = mysqli_num_rows(mysqli_query($conn,"SELECT `user_id` FROM `quiz_comments` WHERE quiz_id='$quiz_id'"));
        $row['quiz_media'] = array();
        $row['questions'] = array();
        $quiz_media = mysqli_query($conn, "SELECT image_name FROM `quiz_media` WHERE quiz_id='$quiz_id'");
        $questions = mysqli_query($conn, "SELECT id, question, a, b, c, d, correct FROM `questions` WHERE quiz_id='$quiz_id'");
        if (mysqli_num_rows($quiz_media) > 0) {
            while ($row_data = $quiz_media->fetch_assoc()) {
                array_push($row['quiz_media'], $row_data);
            }
        }
        if (mysqli_num_rows($questions) > 0) {
            while ($row_questions = $questions->fetch_assoc()) {
                array_push($row['questions'], $row_questions);
            }
        }
        $quiz_comments = mysqli_query($conn, "SELECT `quiz_comments`.`comment`, `user_data`.`user_name` FROM `quiz_comments` JOIN `user_data` ON `quiz_comments`.`user_id` = `user_data`.`uid` WHERE `quiz_comments`.`quiz_id`='$quiz_id' LIMIT 1;");
        if (mysqli_num_rows($quiz_comments) > 0) {
            while ($row_comment = $quiz_comments->fetch_assoc()) {
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
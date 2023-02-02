<?php
require '../db.php';
$response=array();
$data = array();
$query = "SELECT id, name, link,  time FROM `stories` WHERE is_active='yes' AND `time` > now() - INTERVAL 24 hour AND now() > `time` ORDER BY time DESC LIMIT 50";
$currentPage = 1;
if(isset($_POST['uid'])){
    $uid = $_POST['uid'];
}
$stories = mysqli_query($conn, $query);
if (mysqli_num_rows($stories) > 0) {
    while ($row = $stories->fetch_assoc()) {
        $stories_id = $row['id'];
        $row['stories_media'] = array();
        $stories_media = mysqli_query($conn, "SELECT image_name FROM `stories_media` WHERE stories_id='$stories_id'");
        $stories_view = mysqli_query($conn, "SELECT * FROM `story_views` WHERE story_id='$stories_id' AND user_id='$uid'");
        if (mysqli_num_rows($stories_media) > 0) {
            while ($row_data = $stories_media->fetch_assoc()) {
                array_push($row['stories_media'], $row_data);
            }
        }
        if (mysqli_num_rows($stories_view) > 0) {
            $row['viewed'] = 'true';
        }else{
            $row['viewed'] = 'false';
        }
        array_push($data, $row);
    }
}
$response= array_slice($data, $perPage * ($currentPage - 1), $perPage);
echo json_encode($response);
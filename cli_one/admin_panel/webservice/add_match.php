<?php
require '../db.php';

$response=array();

if(!empty($_POST['uid'])) {
    $uid=$_POST['uid'];
    if(isset($_POST['match_id'])){
        $match_id=$_POST['match_id'];
    }else{
        $match_id='';
    }

    if(isset($_POST['team1'])){
        $team1=$_POST['team1'];
    }else{
        $team1='{}';
    }

    if(isset($_POST['team2'])){
        $team2=$_POST['team2'];
    }else{
        $team2='{}';
    }

    if(isset($_POST['match_type'])){
        $match_type=$_POST['match_type'];
    }else{
        $match_type='';
    }

    if(isset($_POST['no_of_overs'])){
        $no_of_overs=$_POST['no_of_overs'];
    }else{
        $no_of_overs=0;
    }

    if(isset($_POST['overs_per_bowler'])){
        $overs_per_bowler=$_POST['overs_per_bowler'];
    }else{
        $overs_per_bowler=0;
    }

    if(isset($_POST['location'])){
        $location=$_POST['location'];
    }else{
        $location='';
    }

    if(isset($_POST['ground'])){
        $ground=$_POST['ground'];
    }else{
        $ground='';
    }

    if(isset($_POST['date_time'])){
        $date_time=$_POST['date_time'];
    }else{
        $date_time=date('d-m-y h:i:s');
    }

    if(isset($_POST['ball_type'])){
        $ball_type=$_POST['ball_type'];
    }else{
        $ball_type='';
    }

    if(isset($_POST['pitch_type'])){
        $pitch_type=$_POST['pitch_type'];
    }else{
        $pitch_type='';
    }

    if(isset($_POST['match_officials'])){
        $match_officials=$_POST['match_officials'];
    }else{
        $match_officials=[];
    }

    if(isset($_POST['toss'])){
        $toss=$_POST['toss'];
    }else{
        $toss='{}';
    }

    $check=mysqli_query($conn,"select * from matches where match_id='$match_id'");
    if(mysqli_num_rows($check)){
        $updatedata=mysqli_query($conn,"update matches set team1='$team1', team2='$team2', match_type='$match_type', updated_at=now(), uid='$uid', no_of_overs='$no_of_overs', overs_per_bowler='$overs_per_bowler', location='$location', ground='$ground', date_time='$date_time', ball_type='$ball_type', pitch_type='$pitch_type', match_officials='$match_officials', toss='$toss' where match_id='$match_id';");
        if ($updatedata) {
            $get_match = mysqli_query($conn,"select * from matches where match_id='$match_id'");
            $response['success'] = 1;
            $response['message'] = "Success";
            $response['match_arr'] = $get_match->fetch_assoc();
        }
        else {
            $response['success'] = 0;
            $response['message'] = "Server error. Match not created. Please try again.";
        }
    }else{
        $insertdata=mysqli_query($conn,"insert into matches(match_id,team1,team2,match_type,uid,no_of_overs,overs_per_bowler,location,ground,date_time,ball_type,pitch_type,match_officials,toss,created_at,updated_at) values ('$match_id','$team1','$team2','$match_type','$uid','$no_of_overs','$overs_per_bowler','$location','$ground','$date_time','$ball_type','$pitch_type','$match_officials','$toss',now(),now());");
        $id = mysqli_insert_id($conn);
        if ($insertdata) {
            $get_match = mysqli_query($conn,"select * from matches where match_id='$id'");
            $response['success'] = 1;
            $response['message'] = "Success";
            $response['user_arr'] = $get_match->fetch_assoc();
        }
        else {
            $response['success'] = 0;
            $response['message'] = "Server error. Please try again.";
        }
    }
    


}else{
    $response['success'] = 0;
    $response['message'] = "Please enter valid data";
}

echo json_encode($response);

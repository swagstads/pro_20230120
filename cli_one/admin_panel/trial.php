<?php
//if (session_id() == '') {
    session_start();
//}
if (!isset($_SESSION['usr'])) {
    header("Location: index.php");
    die();
}

if (isset($_SESSION['them'])) {
    $them = $_SESSION['them'] . ".php";
    include $them;
}
$display = '';
if ($_SESSION['role']=='Standard'){
    $display = 'disabled';
}

include 'db.php';
include_once 'GCM.php';

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function reArrayFiles($file)
{
    $file_ary = array();
    $file_count = count($file['name']);
    $file_key = array_keys($file);

    for($i=0;$i<$file_count;$i++)
    {
        foreach($file_key as $val)
        {
            $file_ary[$i][$val] = $file[$val][$i];
        }
    }
    return $file_ary;
}

$tmsg='';
$terrormsg='';

if (isset($_POST['btnSubmit'])) {
    //echo '<pre>';print_r($_POST);die;
    $user = $_SESSION['usr'];
    $language_id = $_POST['language_id'];
    $order_id = $_POST['order_id'];
    $category_id = $_POST['category_id'];
    $main_title = str_replace("'","\'",$_POST['main_title']);
    $redirect_title1 = str_replace("'","\'",$_POST['redirect_title1']);
    $redirect_title2 = str_replace("'","\'",$_POST['redirect_title2']);
    $short_description = str_replace("'","\'",$_POST['short_description']);
    $media_type = isset($_POST['media_type']) ? $_POST['media_type'] : '';
    $media_url = isset($_POST['media_url']) ? $_POST['media_url'] : '';
    $redirect_link = $_POST['redirect_link'];
    $source_name = $_POST['source_name'];
    $created_at = date('Y-m-d H:i',strtotime($_POST['created_at']));
    $send_notification = $_POST['send_notification'];
    $url = preg_replace("/[^a-zA-Z0-9-]+/", "",str_replace(';','',str_replace("\xc2\xa0", '-',str_replace("'","",str_replace('?','',str_replace('"','',str_replace(')','',str_replace('(','',str_replace('>','',str_replace('<','',strtolower(str_replace(',','',str_replace('.','',str_replace('',"'",str_replace(':','',str_replace(' ','-',str_replace('*','',str_replace('&','',str_replace('^','',str_replace('%','',str_replace('#','',str_replace('','',str_replace('@','',str_replace('!','',$main_title))))))))))))))))))))))));
    $insert_query = "INSERT INTO `news` (`language_id`,`category_id`,`main_title`,`redirect_title1`,`redirect_title2`,`short_description`,`media_type`,`media_url`,`redirect_link`,`source_name`,`is_active`,`created_at`,`updated_at`,`order_id`,`no_of_views`,`added_by`,`notification`,`url`) VALUES ";
    $insert_query .= "('$language_id','$category_id','$main_title','$redirect_title1','$redirect_title2','$short_description','$media_type','$media_url','$redirect_link','$source_name','yes','$created_at',now(),'$order_id','1','$user', '$send_notification', '$url');";
  //  print($insert_query);
    $insertdata = mysqli_query($conn, $insert_query);
   // print($insertdata);
    $id = mysqli_insert_id($conn);
    if ($insertdata) {
        $newname = '';
        if (isset($_FILES['photo'])) {

            $img = $_FILES['photo'];
            if(!empty($img))
            {
                $img_desc = reArrayFiles($img);
                foreach($img_desc as $val)
                {
                    $target_path = "uploads/news/";
                    $target_file = $target_path . basename($val['name']);
                    $FileType = pathinfo($target_file, PATHINFO_EXTENSION);
                    $newname = generateRandomString() . '.' . $FileType;
                    if (move_uploaded_file($val['tmp_name'],$target_path.$newname)){
                        $query2 = "insert news_media(news_id,image_name,created_at,updated_at) values($id,'$newname',now(),now())";
                        mysqli_query($conn, $query2);
                    }
                }
            }
        }

        if($send_notification=='yes')
        {
            $notification_query = "INSERT INTO `notification_sent` (`news_id`,`url`) VALUES ";
            $notification_query .= "('$id','$url');";
            $insertnotif = mysqli_query($conn, $notification_query);
            include 'generate_notification.php';

            $user_fcm_data = mysqli_query($conn, "SELECT fcm_id FROM users WHERE fcm_id IS NOT NULL");
            if (mysqli_num_rows($user_fcm_data))
            {
                $fcm_tokens = array();
                while ($fcm_data = $user_fcm_data->fetch_assoc())
                {
                    if (!empty($fcm_data['fcm_id']))
                    {
                        $fcm_tokens[] = $fcm_data['fcm_id'];
                    }
                }

                if (count($fcm_tokens) > 0) {
                     $gcm = new GCM();

                $notification_data_arr = array(
                         'news_id' => $id,
                         'news_title' => $main_title,
                         'send_notification' => $send_notification,
                         'language_id' => $language_id,
                         'news_image' => $newname,
                         'type' => 'news',
                         'tag' => 'new',
                         'url' => $url,
                     );

                     $message = array(
                         "body" => str_replace("\'","'",$main_title),
                         //"title" => "TechShots App",
                         "image" => "https://cms.techshotsapp.com/uploads/news/$newname",
                         "sound" => "mySound",
                         "data" => "{'url',$url}",
                         'news_id' => $id,
                         'news_title' => $main_title,
                         'send_notification' => $send_notification,
                         'language_id' => $language_id,
                         'news_image' => $newname,
                         'type' => 'news',
                         'tag' => 'new'
                     );
                     //$gcm->
                      $firebase_array = array_chunk($fcm_tokens,1000);
                      foreach ($firebase_array as $key) {
                        $message_status = $gcm->send_notification($key, $message, $notification_data_arr);
                      }
                 }
            }
        }
        echo '<script>window.location="news_list.php?insert=success";</script>';
    }
    else {
        $terrormsg = $lang['news_add_fail'];
    }

}

if (isset($_POST['btnDraft'])) {
    //echo '<pre>';print_r($_POST);die;
    $user = $_SESSION['usr'];
    $language_id = $_POST['language_id'];
    $order_id = $_POST['order_id'];
    $category_id = $_POST['category_id'];
    $main_title = str_replace("'","\'",$_POST['main_title']);
    $redirect_title1 = str_replace("'","\'",$_POST['redirect_title1']);
    $redirect_title2 = str_replace("'","\'",$_POST['redirect_title2']);
    $short_description = str_replace("'","\'",$_POST['short_description']);
    $media_type = isset($_POST['media_type']) ? $_POST['media_type'] : '';
    $media_url = isset($_POST['media_url']) ? $_POST['media_url'] : '';
    $redirect_link = $_POST['redirect_link'];
    $source_name = $_POST['source_name'];
    $created_at = date('Y-m-d H:i',strtotime($_POST['created_at']));
    $send_notification = $_POST['send_notification'];
    $url = preg_replace("/[^a-zA-Z0-9-]+/", "",str_replace(';','',str_replace("\xc2\xa0", '-',str_replace("'","",str_replace('?','',str_replace('"','',str_replace(')','',str_replace('(','',str_replace('>','',str_replace('<','',strtolower(str_replace(',','',str_replace('.','',str_replace('',"'",str_replace(':','',str_replace(' ','-',str_replace('*','',str_replace('&','',str_replace('^','',str_replace('%','',str_replace('#','',str_replace('','',str_replace('@','',str_replace('!','',$main_title))))))))))))))))))))))));
    $insert_query = "INSERT INTO `news` (`language_id`,`category_id`,`main_title`,`redirect_title1`,`redirect_title2`,`short_description`,`media_type`,`media_url`,`redirect_link`,`source_name`,`is_active`,`created_at`,`updated_at`,`order_id`,`no_of_views`,`added_by`,`notification`,`url`) VALUES ";
    $insert_query .= "('$language_id','$category_id','$main_title','$redirect_title1','$redirect_title2','$short_description','$media_type','$media_url','$redirect_link','$source_name','no','$created_at',now(),'$order_id','1','$user','$send_notification','$url');";
  //  print($insert_query);
    $insertdata = mysqli_query($conn, $insert_query);
   // print($insertdata);
    $id = mysqli_insert_id($conn);
    if ($insertdata) {
        $newname = '';
        if (isset($_FILES['photo'])) {

            $img = $_FILES['photo'];
            if(!empty($img))
            {
                $img_desc = reArrayFiles($img);
                foreach($img_desc as $val)
                {
                    $target_path = "uploads/news/";
                    $target_file = $target_path . basename($val['name']);
                    $FileType = pathinfo($target_file, PATHINFO_EXTENSION);
                    $newname = generateRandomString() . '.' . $FileType;
                    if (move_uploaded_file($val['tmp_name'],$target_path.$newname)){
                        $query2 = "insert news_media(news_id,image_name,created_at,updated_at) values($id,'$newname',now(),now())";
                        mysqli_query($conn, $query2);
                    }
                }
            }
        }

        echo '<script>window.location="news_list.php?insert=success";</script>';
    }
    else {
        $terrormsg = $lang['news_add_fail'];
    }

}

if (isset($_POST['btnEditDraft'])) {
    //echo '<pre>';print_r($_POST);die;
    $id = $_POST['news_id'];
    $order_id=$_POST['order_id'];
    $language_id = $_POST['language_id'];
    $category_id = $_POST['category_id'];
    $main_title = str_replace("'","\'",$_POST['main_title']);
    $redirect_title1 = str_replace("'","\'",$_POST['redirect_title1']);
    $redirect_title2 = str_replace("'","\'",$_POST['redirect_title2']);
    $short_description = str_replace("'","\'",$_POST['short_description']);
    $media_type = $_POST['media_type'];
    $media_url = $_POST['media_url'];
    $redirect_link = $_POST['redirect_link'];
    $source_name = $_POST['source_name'];
    $created_at = date('Y-m-d H:i',strtotime($_POST['created_at']));
    $send_notification = $_POST['send_notification'];
    $url = preg_replace("/[^a-zA-Z0-9-]+/", "",str_replace(';','',str_replace("\xc2\xa0", '-',str_replace("'","",str_replace('?','',str_replace('"','',str_replace(')','',str_replace('(','',str_replace('>','',str_replace('<','',strtolower(str_replace(',','',str_replace('.','',str_replace('',"'",str_replace(':','',str_replace(' ','-',str_replace('*','',str_replace('&','',str_replace('^','',str_replace('%','',str_replace('#','',str_replace('','',str_replace('@','',str_replace('!','',$main_title))))))))))))))))))))))));
    $query = "UPDATE `news` set language_id='$language_id',order_id='$order_id',category_id='$category_id',main_title='$main_title',redirect_title1='$redirect_title1',redirect_title2='$redirect_title2',";
    $query .= "short_description='$short_description',media_type='$media_type',media_url='$media_url',redirect_link='$redirect_link',source_name='$source_name',is_active='no',created_at='$created_at',updated_at=now(),notification='$send_notification',url='$url' WHERE id=$id";
    //echo $query;die;
    $result =  mysqli_query($conn,$query);

    if ($result) {
        $newname = $img_name;
        if (isset($_FILES['photo'])) {

            $img = $_FILES['photo'];

            if(!empty($img))
            {
                $img_desc = reArrayFiles($img);
                foreach($img_desc as $val)
                {
                    $target_path = "uploads/news/";
                    $target_file = $target_path . basename($val['name']);
                    $FileType = pathinfo($target_file, PATHINFO_EXTENSION);
                    $newname = generateRandomString() . '.' . $FileType;
                    if (move_uploaded_file($val['tmp_name'],$target_path.$newname)){
                        $query2 = "insert news_media(news_id,image_name,created_at,updated_at) values($id,'$newname',now(),now())";
                        mysqli_query($conn, $query2);
                    }
                }
            }
        }
        //$tmsg = $lang['news_update_success'];
        if($send_notification=='yes')
        {
            $notification_query = "INSERT INTO `notification_sent` (`news_id`,`url`) VALUES ";
            $notification_query .= "('$id','$url');";
            $insertnotif = mysqli_query($conn, $notification_query);
            include 'generate_notification.php';

            $user_fcm_data = mysqli_query($conn, "SELECT fcm_id FROM users WHERE fcm_id IS NOT NULL");
            if (mysqli_num_rows($user_fcm_data))
            {
                $fcm_tokens = array();
                while ($fcm_data = $user_fcm_data->fetch_assoc())
                {
                    if (!empty($fcm_data['fcm_id']))
                    {
                        $fcm_tokens[] = $fcm_data['fcm_id'];
                    }
                }

                if (count($fcm_tokens) > 0) {
                     $gcm = new GCM();

                $notification_data_arr = array(
                         'news_id' => $id,
                         'news_title' => $main_title,
                         'send_notification' => $send_notification,
                         'language_id' => $language_id,
                         'news_image' => $newname,
                         'type' => 'news',
                         'tag' => 'new',
                         'url' => $url,
                     );

                     $message = array(
                         "body" => $main_title,
                         //"title" => "TechShots App",
                         "image" => "https://cms.techshotsapp.com/uploads/news/$newname",
                         "sound" => "mySound",
                         "data" => "{'url',$url}",
                         'news_id' => $id,
                         'news_title' => $main_title,
                         'send_notification' => $send_notification,
                         'language_id' => $language_id,
                         'news_image' => $newname,
                         'type' => 'news',
                         'tag' => 'new'
                     );
                     //$gcm->
                      $firebase_array = array_chunk($fcm_tokens,1000);
                      foreach ($firebase_array as $key) {
                        $message_status = $gcm->send_notification($key, $message, $notification_data_arr);
                      }
                 }
            }
        }
        echo '<script>window.location="news_list.php?update=success";</script>';
    }else {
        $terrormsg = $lang['news_update_fail'];
    }

}

if (isset($_POST['btnedit'])) {
    //echo '<pre>';print_r($_POST);die;
    $id = $_POST['news_id'];
    $order_id=$_POST['order_id'];
    $language_id = $_POST['language_id'];
    $category_id = $_POST['category_id'];
    $main_title = str_replace("'","\'",$_POST['main_title']);
    $redirect_title1 = str_replace("'","\'",$_POST['redirect_title1']);
    $redirect_title2 = str_replace("'","\'",$_POST['redirect_title2']);
    $short_description = str_replace("'","\'",$_POST['short_description']);
    $media_type = $_POST['media_type'];
    $media_url = $_POST['media_url'];
    $redirect_link = $_POST['redirect_link'];
    $source_name = $_POST['source_name'];
    $created_at = date('Y-m-d H:i',strtotime($_POST['created_at']));
    $send_notification = $_POST['send_notification'];
    $url = preg_replace("/[^a-zA-Z0-9-]+/", "",str_replace(';','',str_replace("\xc2\xa0", '-',str_replace("'","",str_replace('?','',str_replace('"','',str_replace(')','',str_replace('(','',str_replace('>','',str_replace('<','',strtolower(str_replace(',','',str_replace('.','',str_replace('',"'",str_replace(':','',str_replace(' ','-',str_replace('*','',str_replace('&','',str_replace('^','',str_replace('%','',str_replace('#','',str_replace('','',str_replace('@','',str_replace('!','',$main_title))))))))))))))))))))))));
    $query = "UPDATE `news` set language_id='$language_id',order_id='$order_id',category_id='$category_id',main_title='$main_title',redirect_title1='$redirect_title1',redirect_title2='$redirect_title2',";
    $query .= "short_description='$short_description',media_type='$media_type',media_url='$media_url',redirect_link='$redirect_link',source_name='$source_name',is_active='yes',created_at='$created_at',updated_at=now(),notification='$send_notification',url='$url' WHERE id=$id";
    //echo $query;die;
    $result =  mysqli_query($conn,$query);
    if(isset($news)&&$news['media_type']=='image'){
        $query_image ="select * from news_media where news_id=".$news['id'];
        $result_images =  mysqli_query($conn,$query_image);
        $no = 1;
        if (mysqli_num_rows($result_images) > 0) {
            while ($row_images = $result_images->fetch_assoc()) {
                $img_id = $row_images['id'];
                $newname = $row_images['image_name'];
            }
        }
    }    
                
    if ($result) {
        $newname = $img_name;
        if (isset($_FILES['photo'])) {

            $img = $_FILES['photo'];

            if(!empty($img))
            {
                $img_desc = reArrayFiles($img);
                foreach($img_desc as $val)
                {
                    $target_path = "uploads/news/";
                    $target_file = $target_path . basename($val['name']);
                    $FileType = pathinfo($target_file, PATHINFO_EXTENSION);
                    $newname = generateRandomString() . '.' . $FileType;
                    if (move_uploaded_file($val['tmp_name'],$target_path.$newname)){
                        $query2 = "insert news_media(news_id,image_name,created_at,updated_at) values($id,'$newname',now(),now())";
                        mysqli_query($conn, $query2);
                    }
                }
            }
        }
        //$tmsg = $lang['news_update_success'];
        if($send_notification=='yes')
        {
            $notification_query = "INSERT INTO `notification_sent` (`news_id`,`url`) VALUES ";
            $notification_query .= "('$id','$url');";
            $insertnotif = mysqli_query($conn, $notification_query);
            include 'generate_notification.php';

            $user_fcm_data = mysqli_query($conn, "SELECT fcm_id FROM users WHERE fcm_id IS NOT NULL");
            if (mysqli_num_rows($user_fcm_data))
            {
                $fcm_tokens = array();
                while ($fcm_data = $user_fcm_data->fetch_assoc())
                {
                    if (!empty($fcm_data['fcm_id']))
                    {
                        $fcm_tokens[] = $fcm_data['fcm_id'];
                    }
                }

                if (count($fcm_tokens) > 0) {
                     $gcm = new GCM();

                $notification_data_arr = array(
                        'news_id' => $id,
                         'news_title' => $main_title,
                         'send_notification' => $send_notification,
                         'language_id' => $language_id,
                         'news_image' => $newname,
                         'type' => 'news',
                         'tag' => 'new',
                         'url' => $url,
                     );

                     $message = array(
                         "body" => $main_title,
                         //"title" => "TechShots App",
                         "image" => "https://cms.techshotsapp.com/uploads/news/$newname",
                         "sound" => "mySound",
                         "data" => "{'url',$url}",
                         'news_id' => $id,
                         'news_title' => $main_title,
                         'send_notification' => $send_notification,
                         'language_id' => $language_id,
                         'news_image' => $newname,
                         'type' => 'news',
                         'tag' => 'new'
                     );
                     //$gcm->
                      $firebase_array = array_chunk($fcm_tokens,1000);
                      foreach ($firebase_array as $key) {
                        $message_status = $gcm->send_notification($key, $message, $notification_data_arr);
                      }
                 }
            }
        }
        echo '<script>window.location="news_list.php?update=success";</script>';
    }else {
        $terrormsg = $lang['news_update_fail'];
    }

}

if(isset($_GET['eid'])){
    $id=$_GET['eid'];
    $query ="select * from news where id=$id";
    $result =  mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) {
        $news = $result->fetch_assoc();
    }
}

if(isset($_GET['did'])){
    $id=$_GET['did'];

    $query ="select * from news_media where id=$id";
    $result =  mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) {
        $news_media = $result->fetch_assoc();
        $news_id = $news_media['news_id'];
        if(!empty($news_media['image_name'])){
            $filename="uploads/news/".$news_media['image_name'];
            unlink($filename);
        }
        $query ="DELETE FROM `news_media` WHERE id=$id";
        $result =  mysqli_query($conn,$query);
        unset($offers);
        if($result){

            $user_fcm_data=mysqli_query($conn,"SELECT * FROM users WHERE fcm_id<>''");
            if(mysqli_num_rows($user_fcm_data)) {
                $fcm_tokens = array();
                while ($fcm_data = $user_fcm_data->fetch_assoc()) {

                    if (!empty($fcm_data['fcm_id'])) {
                        $fcm_tokens[] = $fcm_data['fcm_id'];
                    }
                }

                if(count($fcm_tokens) > 0) {
                    $gcm = new GCM();

                    $notification_data_arr = array(
                        'type' => 'news_media',
                    );

                    $message = array(
                        "body" => 'delete',
                        "title" => $lang['app_name'],
                        "sound" => "mySound"
                    );
                    $gcm->send_notification($fcm_tokens, $message, $notification_data_arr);
                }
            }

            echo '<script>window.location="news.php?eid='.$news_id.'";</script>';
            //$tmsg = $lang['news_image_delete_success'];
        }else{
            $terrormsg = $lang['news_image_delete_fail'];
        }
    }
}

?>

<input type="hidden" id="page_name" value="news">
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
              <li class="breadcrumb-item" style="color: #007bff;">
                    <?php
                    if(isset($_GET['eid'])) {
                        echo $lang['edit_news'];
                    }else{
                        echo $lang['add_news'];
                    }
                    ?>
                </a>
            </li>
        </ol>
        <?php
        if ($tmsg != '') {
            echo '<div class="alert alert-success alert-dismissible">';
            echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
            echo '<label class="control-label"><i class="fas fw fa-check-circle"></i> ' . $tmsg . '</label>';
            echo '</div><br/>';
        } if ($terrormsg != ''&&isset($_GET['did'])) {
            echo '<div class="alert alert-danger alert-dismissible">';
            echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
            echo '<label class="control-label"><i class="fas fw fa-times-circle"></i> ' . $terrormsg . '</label>';
            echo '</div><br/>';
        }
        ?>
        <div class="alert alert-danger" id="alert_message_div" style="display: none;">
            <label class="control-label" id="errormsg"></label>
        </div><br/>

        <div class="row">

            <div class="col-6">
                <div class="card-body">
                    <form role="form" method="post" enctype="multipart/form-data" onSubmit="return checkform()">

                        <?php
                        if(isset($news)){
                            $cat_id=$news['id'];
                            echo '<input type="hidden" name="news_id" id="news_id" value="'.$cat_id.'">';
                        }
                        ?>

                        <div class="form-group">
                            <label class="control-label"><b><?php echo $lang['categories'];?> :</b></label>
                            <input  type="text" name="category_id" value="<?php if(isset($news)){echo $news['category_id'];}?>" id="category_id" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default"  style="width: 100%; ">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><b><?php echo $lang['order_id'];?> :</b></label>
                            <input  type="number" name="order_id" value="<?php if(isset($news)){echo $news['order_id'];}?>" id="order_id" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default"  style="width: 100%; ">
                        </div>

                        <div class="form-group">
                            <label class="control-label"><b><?php echo $lang['news_title'];?> :</b></label>
                            <input type="text" name="main_title" id="main_title" required="required" class="form-control" placeholder="<?php echo $lang['news_title'];?>" value="<?php if(isset($news)){echo htmlspecialchars($news['main_title'], ENT_QUOTES, 'UTF-8');}?>" maxlength="100">
                        </div>

                        <div class="form-group">
                            <label class="control-label"><b><?php echo $lang['redirect_title1'];?> :</b></label>
                            <input type="text" name="redirect_title1" id="redirect_title1" class="form-control" placeholder="<?php echo $lang['redirect_title1'];?>" value="<?php if(isset($news)){echo htmlspecialchars($news['redirect_title1'], ENT_QUOTES, 'UTF-8');}?>">
                        </div>

                        <div class="form-group">
                            <label class="control-label"><b><?php echo $lang['redirect_title2'];?> :</b></label>
                            <input type="text" name="redirect_title2" id="redirect_title2" required="required" class="form-control" placeholder="<?php echo $lang['redirect_title2'];?>" value="<?php if(isset($news)){echo htmlspecialchars($news['redirect_title2'], ENT_QUOTES, 'UTF-8');}?>">
                        </div>

                        <div class="form-group">
                            <label class="control-label"><b><?php echo $lang['short_description'];?> :</b></label>
                            <textarea name="short_description" id="short_description" class="form-control" rows="5" maxlength="20">
                            <?php if(isset($news)){echo htmlspecialchars($news['short_description'], ENT_QUOTES, 'UTF-8');}?>
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label"><b><?php echo $lang['news_time'];?> :</b></label>
                            <input type="text"  id="news_time" name="created_at" class="form-control" value="<?php if(isset($news) && !empty($news['created_at'])){echo date('d-m-Y H:i',strtotime($news['created_at']));}?>">
                        </div>

                        <div class="form-group">
                            <label class="control-label"><b><?php echo $lang['media_type'];?> :</b></label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="media_type" id="optionsRadios5" value="image" <?php if(isset($news)&&$news['media_type']=='image'){echo 'checked';}?> onclick="get_respective_div(this.value)">
                                   <?php echo $lang['image'];?>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="media_type" id="optionsRadios6" value="youtube_url" <?php if(isset($news)&&$news['media_type']=='youtube_url'){echo 'checked';}?> onclick="get_respective_div(this.value)">
                                    <?php echo $lang['youtube_url'];?>
                                </label>
                            </div>
                        </div>

                        <div class="form-group field_wrapper" id="image_div" <?php if(isset($news)&&$news['media_type']=='image'){echo 'style="display:block;"';}else{echo 'style="display:none;"';}?>>
                            <label class="control-label"><b><?php echo $lang['news_images'];?> :</b></label>
                            <input type="file" id="photo" class="form-control-file" name="photo[]" accept="image/jpeg,image/png" />
                            <br/>
                            <a href="javascript:void(0);" class="add_button" title="Add field"><input type="button" value="<?php echo $lang['add_multi_images'];?>" class="btn btn-primary"></a>
                        </div>

                        <div class="form-group" id="media_url_div" <?php if(isset($news)&&$news['media_type']=='youtube_url'){echo 'style="display:block;"';}else{echo 'style="display:none;"';}?>>
                            <label class="control-label"><b><?php echo $lang['media_url'];?> :</b></label>
                            <input type="text" name="media_url" id="media_url" class="form-control" placeholder="<?php echo $lang['media_url'];?>" value="<?php if(isset($news)){echo $news['media_url'];}?>">
                        </div>

                        <div class="form-group">
                            <label class="control-label"><b><?php echo $lang['redirect_link'];?> :</b></label>
                            <input type="text" name="redirect_link" id="redirect_link" class="form-control" placeholder="<?php echo $lang['redirect_link'];?>" value="<?php if(isset($news)){echo $news['redirect_link'];}?>" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label"><b><?php echo $lang['source_name'];?> :</b></label>
                            <input type="text" name="source_name" id="source_name" class="form-control" placeholder="<?php echo $lang['source_name'];?>" value="<?php if(isset($news)){echo $news['source_name'];}?>">
                        </div>
                        <!--
                        <div class="form-group">
                            <label class="control-label"><b><?php echo $lang['is_active'];?> :</b></label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="is_active" id="optionsRadios1" value="yes" <?php if(isset($news)&&$news['is_active']=='yes'){echo 'checked';}elseif(!isset($news)){echo 'checked';}?>>
                                    <?php echo $lang['yes'];?>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="is_active" id="optionsRadios2" value="no" <?php if(isset($news)&&$news['is_active']=='no'){echo 'checked';}?>>
                                    <?php echo $lang['no'];?>
                                </label>
                            </div>
                        </div>
                        -->
                        <div class="form-group">
                            <label class="control-label"><b><?php echo $lang['is_featured'];?> :</b></label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="is_featured" id="optionsRadios7" value="yes" <?php if(isset($news)&&$news['is_featured']=='yes'){echo 'checked';}?>>
                                    <?php echo $lang['yes'];?>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="is_featured" id="optionsRadios8" value="no" <?php if(isset($news)&&$news['is_featured']=='no'){echo 'checked';}elseif(!isset($news)){echo 'checked';}?>>
                                    <?php echo $lang['no'];?>
                                </label>
                            </div>
                        </div>
                        <?php
                        if($_SESSION['role']=='Admin'||$_SESSION['role']=='Editor'){
                        ?>
                        <div class="form-group">
                                <label class="control-label"><b><?php echo $lang['send_notification'];?> :</b></label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="send_notification" id="optionsRadios3" value="yes">
                                        <?php echo $lang['yes'];?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="send_notification" id="optionsRadios4" value="no">
                                        <?php echo $lang['no'];?>
                                    </label>
                                </div>
                            </div>
                        <?php
                        }
                        if(isset($news)){
                            echo '<input type="submit" value="'.$lang['draft'].'" id="btnEditDraft" name="btnEditDraft" class="btn btn-primary btn-block col-sm-3"/>';
                            echo '<input '.$display.' type="submit" value="'.$lang['publish'].'" id="btnedit" name="btnedit" class="btn btn-primary btn-block col-sm-3"/>';
                        }else{
                            echo '<input type="submit" value="'.$lang['draft'].'" id="btnDraft" name="btnDraft" class="btn btn-primary btn-block col-sm-3"/>';
                            echo '<input '.$display.' type="submit" value="'.$lang['publish'].'" id="btnSubmit" name="btnSubmit" class="btn btn-primary btn-block col-sm-3"/>';
                        }
                        ?>

                    </form>
                </div>
            </div>

            <div class="col-6">
                <?php
                if(isset($news)&&$news['media_type']=='image'){
                    $query_image ="select * from news_media where news_id=".$news['id'];
                    $result_images =  mysqli_query($conn,$query_image);
                    $no = 1;
                    if (mysqli_num_rows($result_images) > 0) {
                ?>
                <div class="container">
                    <label class="control-label"><b><?php echo $lang['news_images'];?> :</b></label><br/><br/>
                    <div class="row">
                        <?php
                        while ($row_images = $result_images->fetch_assoc()) {
                            $img_id = $row_images['id'];
                            $img_name = $row_images['image_name'];
                            ?>
                            <div style="margin-right: 20px;margin-bottom: 10px;">
                                <a class="thumbnail fancybox" rel="ligthbox" href="uploads/news/<?php echo $img_name;?>">
                                    <img class="img-responsive" alt="" src="uploads/news/<?php echo $img_name;?>"  height='150' width='150'/>
                                </a>
                                <div class='text-right'>

                                    <a href="#" data-toggle="modal"
                                       data-target=".bs-example-modal-sm<?php echo $img_id; ?>">
                                        <i class="fas fa-fw fa-trash-alt" style="font-size: 1.5em;color: #ac2925;"></i>
                                    </a>

                                </div>
                                <div class="modal fade bs-example-modal-sm<?php echo $img_id; ?>" tabindex="-1"
                                     role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm<?php echo $img_id; ?>">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel2"><?php echo $lang['delete'];?></h4>
                                            </div>
                                            <div class="modal-body">
                                                <h4><?php echo $lang['confirm_delete'];?></h4>
                                                <p><?php echo $lang['do_u_really_want_to_delete'];?></p>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                            onclick="return false;"
                                                            class="btn btn-default" data-dismiss="modal"><?php echo $lang['cancel'];?>
                                                    </button>

                                                    <button type="button"
                                                            onclick="window.location.href='news.php?did=<?php echo $img_id; ?>'"
                                                            class="btn btn-primary"> <?php echo $lang['delete'];?> !
                                                    </button>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $no++;

                        }
                        ?>

                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->


</div>


<?php
include 'footer.php';
?>
<script>
    // CKEditor Scriptckeditor
    CKEDITOR.replace( 'short_description', {
        wordcount: {
            showCharCount: true,
            maxCharCount: 400
        }
    });
</script>
<script type="application/javascript">
    function checkform() {

        var media_type = $('input[name=media_type]:checked').val();
        var redirect_link = $('#redirect_link').val();
        var media_url = $('#media_url').val();

        if (media_type == '' || media_type === undefined)
        {
            $('#alert_message_div').show();
            $("#errormsg").html("<i class='fas fw fa-times-circle'></i> <?php echo $lang['media_type'];?> is required.");
            return false;
        }
        else if (media_type=='youtube_url' && matchYoutubeUrl(media_url)==false){
            $('#alert_message_div').show();
            $("#errormsg").html("<i class='fas fw fa-times-circle'></i> Please Enter Valid Youtube URL");
            return false;
        }
        else if (!validURL(redirect_link))
        {
            $('#alert_message_div').show();
            $("#errormsg").html("<i class='fas fw fa-times-circle'></i> Please Enter Valid URL");
            return false;
        }
        // If the script gets this far through all of your fields
        // without problems, it's ok and you can submit the form

        //return true;
    }

    function validURL(str) {
        var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
            '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
            '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
            '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
            '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
            '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
        return !!pattern.test(str);
    }

    function matchYoutubeUrl(url) {
        var p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
        var matches = url.match(p);
        if(matches){
            return matches[1];
        }
        return false;
    }

    function get_respective_div(media_type){
        if(media_type=='image'){
            $('#image_div').show();
            $('#photo').prop('required',true);

            $('#media_url_div').hide();
            $('#media_url').prop('required',false);
        }

        if(media_type=='youtube_url'){
            $('#media_url_div').show();
            $('#media_url').prop('required',true);

            $('#image_div').hide();
            $('#photo').prop('required',false);
        }
    }
</script>
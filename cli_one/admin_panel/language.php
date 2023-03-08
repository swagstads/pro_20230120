<?php
if (session_id() == '') {
    session_start();
}
if (!isset($_SESSION['usr'])) {
    header("Location: index.php");
    die();
}

if (isset($_SESSION['them'])) {
    $them = $_SESSION['them'] . ".php";
    include $them;
}

include 'db.php';

$tmsg='';
$terrormsg='';

if(isset($_GET['update']) || isset($_GET['delete'])){
    if(isset($_GET['update']) && $_GET['update']=='success'){
        $tmsg = $lang['language_update_success'];
    }

    if(isset($_GET['delete']) && $_GET['delete']=='success'){
        $tmsg = $lang['language_delete_success'];
    }
}

if (isset($_POST['btnSubmit'])) {
    $name=$_POST['name'];

    $insertdata = mysqli_query($conn, "INSERT INTO `language` (`language_name`,`created_at`,`updated_at`) VALUES ('$name',now(),now());");
    $id = mysqli_insert_id($conn);
    if ($insertdata) {
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
                    'type' => 'language',
                );

                $message = array(
                    "body" => 'new',
                    "title" => $lang['app_name'],
                    "sound" => "mySound"
                );
                $gcm->send_notification($fcm_tokens, $message, $notification_data_arr);
            }
        }

        $tmsg = $lang['language_add_success'];
    }
    else {
        $terrormsg = $lang['language_add_fail'];
    }

}

if (isset($_POST['btnedit'])) {

    $id = $_POST['language_id'];
    $name=$_POST['name'];

    $query ="UPDATE `language` set language_name='$name',updated_at=now() WHERE id=$id";
    //echo $query;die;
    $result =  mysqli_query($conn,$query);

    if ($result) {
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
                    'type' => 'language',
                );

                $message = array(
                    "body" => 'update',
                    "title" => $lang['app_name'],
                    "sound" => "mySound"
                );
                $gcm->send_notification($fcm_tokens, $message, $notification_data_arr);
            }
        }

        echo '<script>window.location="language.php?update=success";</script>';
    }else {
        $terrormsg = $lang['language_update_fail'];
    }

}

if(isset($_GET['eid'])){
    $id=$_GET['eid'];
    $query ="select * from `language` where id=$id";
    $result =  mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) {
        $language = $result->fetch_assoc();
    }
}

if(isset($_GET['did'])){
    $id=$_GET['did'];

    $check_dept=mysqli_query($conn,"select * from news where language_id='$id' and is_active='yes'");
    if(mysqli_num_rows($check_dept)>0){
        $terrormsg=$lang['language_delete_error_msg'];
    }else{
        $query ="update `language` set status='delete' WHERE id=$id";
        $result =  mysqli_query($conn,$query);

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
                    'type' => 'language',
                );

                $message = array(
                    "body" => 'delete',
                    "title" => $lang['app_name'],
                    "sound" => "mySound"
                );
                $gcm->send_notification($fcm_tokens, $message, $notification_data_arr);
            }
        }

        echo '<script>window.location="language.php?delete=success";</script>';
    }

}

$result = mysqli_query($conn, "select * from `language` Where status='active' ORDER BY created_at ASC");
$no = 1;
?>

<input type="hidden" id="page_name" value="language">
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
              <li class="breadcrumb-item" style="color: #007bff;">
                    <?php
                    if(isset($_GET['eid'])) {
                        echo $lang['edit_language'];
                    }else{
                        //echo $lang['add_language'];
                        echo $lang['language'];
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
        } if ($terrormsg != '' && isset($_GET['did'])) {
            echo '<div class="alert alert-danger alert-dismissible">';
            echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
            echo '<label class="control-label"><i class="fas fw fa-times-circle"></i> ' . $terrormsg . '</label>';
            echo '</div><br/>';
        }
        ?>
        <div class="col-md-6" style="display: none;">
            <div class="card-body">
                <form role="form" method="post" enctype="multipart/form-data">

                    <?php
                    if(isset($language)){
                        $language_id=$language['id'];
                        echo '<input type="hidden" name="language_id" id="language_id" value="'.$language_id.'">';
                    }
                    ?>

                    <div class="form-group">
                        <label for="name"><?php echo $lang['language_name'];?></label>
                        <input type="text" name="name" id="name" required="required" class="form-control" placeholder="<?php echo $lang['language_name'];?>" value="<?php if(isset($language)){echo $language['language_name'];}?>">
                    </div>

                    <?php
                    if(isset($language)){
                        echo '<input type="submit" value="'.$lang['edit'].'" id="btnedit" name="btnedit" class="btn btn-primary btn-block col-sm-3"/>';
                    }else{
                        echo '<input type="submit" value="'.$lang['submit'].'" id="btnSubmit" name="btnSubmit" class="btn btn-primary btn-block col-sm-3"/>';
                    }
                    ?>

                </form>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <div>
                <i class="fas fa-table"></i>
                <?php echo $lang['language_list']; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                        <thead>
                        <tr>
                            <th><?php echo $lang['sr_no'];?></th>
                            <th><?php echo $lang['language_name'];?></th>
                            <th style="display: none;"><?php echo $lang['delete'];?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $name = $row['language_name'];

                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td>
                                    <!--<a href="language.php?eid=<?php /*echo $id; */?>">-->
                                        <?php echo $name; ?>
                                    <!--</a>-->
                                </td>

                                <td style="display: none;">
                                    <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm<?php echo $id; ?>"><i class="fas fa-fw fa-trash-alt" style="color: red;"></i></a>

                                    <div class="modal fade bs-example-modal-sm<?php echo $id; ?>" tabindex="-1"
                                         role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm<?php echo $id; ?>">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel2"><?php echo $lang['delete'];?></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4><?php echo $lang['confirm_delete'];?></h4>
                                                    <p><?php echo $lang['do_u_really_want_to_delete'];?></p>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                                class="btn btn-default" data-dismiss="modal"><?php echo $lang['cancel'];?>
                                                        </button>

                                                        <button type="button"
                                                                onclick="window.location.href='language.php?did=<?php echo $id; ?>'"
                                                                class="btn btn-primary"> <?php echo $lang['delete'];?> !
                                                        </button>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <?php
                            $no++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->


</div>


<?php
include 'footer.php';
?>
<?php
//if (session_id() == '') {
    session_start();
//}
if (!isset($_SESSION['usr'])) {
    header("Location: index.php");
    die();
}

include 'db.php';
include_once 'GCM.php';

if (isset($_GET['eid'])) {
    $page = 'users.php';
    $id = $_GET['eid'];
    $query ="select * from users where id='$id';";
    $user_result =  mysqli_query($conn,$query);
    if (mysqli_num_rows($user_result) > 0) {
        $users = $user_result->fetch_assoc();
    }
}elseif (isset($_GET['cid'])) {
    $page = 'carts.php';
    $id = $_GET['cid'];
    $query ="select * from users where id='$id';";
    $user_result =  mysqli_query($conn,$query);
    if (mysqli_num_rows($user_result) > 0) {
        $users = $user_result->fetch_assoc();
    }
}else{
    header("Location: users.php");
    die();
}

if (isset($_SESSION['them'])) {
    $them = $_SESSION['them'] . ".php";
    include $them;
}
$display = '';
if ($_SESSION['role']!='Admin'){
    $display = 'disabled';
}

if (isset($_POST['btnedit'])) {
    if(isset($_GET['eid'])){
        $id = $_GET['eid'];
    }elseif(isset($_GET['cid'])){
        $id = $_GET['cid'];
    }else{
        $id = $_POST['id'];
    }
    $status = $_POST['status'];
    $query = "UPDATE `users` SET `status`='$status', `modified_on`= now() WHERE id = '$id';";
    $result =  mysqli_query($conn,$query);
    echo "<script>window.location.href='".$page."';</script>";
    header("Location: ".$page);
}

?>

<input type="hidden" id="page_name" value="users">
<div id="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
              <li class="breadcrumb-item" style="color: #007bff;">
                    Change User Status
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
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $id;?>" name="id">
                            <label class="control-label"><b>Name :</b></label>
                            <label class="control-label"><?php echo $users['name'];?></label>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><b>E-mail :</b></label>
                            <label class="control-label"><?php echo $users['email'];?></label>
                        </div>
                        <div class="form-group field_wrapper" id="image_div" style="display:block;">
                            <label class="control-label"><b>Phone :</b></label>
                            <label class="control-label"><?php echo $users['phone'];?></label>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><b>Address :</b></label>
                            <label class="control-label"><?php echo $users['address'];?></label>
                        </div>
                        <?php
                        if($_SESSION['role']=='Admin'||$_SESSION['role']=='Editor'){
                        ?>
                        <div class="form-group">
                            <label class="control-label"><b>Status :</b></label>
                            <select name="status" class="form-control" id="status">
                                <option value="active" <?php if($users['status'] == 'active'){echo 'selected';} ?>>active</option>
                                <option value="dormant" <?php if($users['status'] == 'dormant'){echo 'selected';} ?>>dormant</option>
                                <option value="deleted" <?php if($users['status'] == 'deleted'){echo 'selected';} ?>>deleted</option>
                                <option value="removed" <?php if($users['status'] == 'removed'){echo 'selected';} ?>>removed</option>
                            </select>
                        </div>
                        <input '.$display.' type="submit" value="Update" id="btnedit" name="btnedit" class="btn btn-primary btn-block col-sm-3"/>
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
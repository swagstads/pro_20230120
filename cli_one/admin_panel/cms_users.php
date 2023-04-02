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
include_once 'GCM.php';

$tmsg='';
$terrormsg='';

if(isset($_GET['update']) || isset($_GET['delete'])){
    if(isset($_GET['update']) && $_GET['update']=='success'){
        $tmsg = $lang['user_update_success'];
    }

    if(isset($_GET['delete']) && $_GET['delete']=='success'){
        $tmsg = $lang['user_delete_success'];
    }
    
    if(isset($_GET['delete']) && $_GET['delete']=='reset'){
        $tmsg = $lang['user_reset_success'];
    }
}

if (isset($_POST['btnSubmit'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $role=$_POST['role'];

    $insertdata = mysqli_query($conn, "INSERT INTO `tbl_admin` (`fullname`,`email`,`role`,`created_at`,`updated_at`) VALUES ('$name','$email','$role',now(),now());");
    $id = mysqli_insert_id($conn);
    if ($insertdata) {

        /*if (isset($_FILES['category_img']['name'])) {

            $file_name = basename($_FILES['category_img']['name']);
            $target_path = "uploads/category/";
            $target_file = $target_path . basename($_FILES['category_img']['name']);
            $FileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $profile_file_new_name = $id . '.' . $FileType;
            $target_file1 = $target_path . $profile_file_new_name;

            if (move_uploaded_file($_FILES['category_img']['tmp_name'], $target_file1)) {
                $query1 = "update category set category_img='$profile_file_new_name' where id='$id'";
                mysqli_query($conn, $query1);
            }
        }*/
        $tmsg = $lang['user_add_success'];
    }
    else {
        $terrormsg = $lang['user_add_fail'];
    }

}

if (isset($_POST['btnedit'])) {

    $id = $_GET['eid'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $role = $_POST['role'];
    $upquery ="UPDATE `tbl_admin` set `role`='$role', fullname='$name',email='$email',updated_at=now() WHERE id='$id';";
    //echo $query;die;
    $result =  mysqli_query($conn,$upquery);
    if ($result) {

        
        /*if (isset($_FILES['category_img']['name'])) {

            $file_name = basename($_FILES['category_img']['name']);
            $target_path = "uploads/category/";
            $target_file = $target_path . basename($_FILES['category_img']['name']);
            $FileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $profile_file_new_name = $id . '.' . $FileType;
            $target_file1 = $target_path . $profile_file_new_name;

            if (move_uploaded_file($_FILES['category_img']['tmp_name'], $target_file1)) {
                $query1 = "update category set category_img='$profile_file_new_name' where id='$id'";
                mysqli_query($conn, $query1);
            }
        }*/

        //$tmsg = $lang['category_update_success'];
        echo '<script>window.location="cms_users.php?update=success";</script>';
    }else {
        $terrormsg = $lang['user_update_fail'];
    }

}

if(isset($_GET['eid'])){
    $id=$_GET['eid'];
    $query ="select * from tbl_admin where id=$id";
    $result =  mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) {
        $user = $result->fetch_assoc();
    }
}

if(isset($_GET['rid'])){
    $id=$_GET['rid'];
    $password = md5(12345678);
    $check_dept=mysqli_query($conn,"select * from tbl_admin where FIND_IN_SET($id,id)");
    if(mysqli_num_rows($check_dept)>0){
        $terrormsg=$lang['user_delete_error_msg'];
    }else{
        $query ="update `tbl_admin` set password='$password' WHERE id=$id";
        $result =  mysqli_query($conn,$query);
        //$tmsg=$lang['category_delete_success'];

        echo '<script>window.location="cms_users.php?delete=reset";</script>';
    }

}

if(isset($_GET['did'])){
    $id=$_GET['did'];
    $check_dept=mysqli_query($conn,"select * from tbl_admin where FIND_IN_SET($id,id)");
    if(mysqli_num_rows($check_dept)>1){
        echo "IF";
        $terrormsg=$lang['user_delete_error_msg'];
    }else{
        echo "Else";
        $query ="update `tbl_admin` set role='Delete' WHERE id='$id';";
        $result =  mysqli_query($conn,$query);
        //$tmsg=$lang['category_delete_success'];

        echo '<script>window.location="cms_users.php?delete=success";</script>';
    }

}

$result = mysqli_query($conn, "select * from tbl_admin Where role <> 'Delete'");
$no = 1;
?>

<input type="hidden" id="page_name" value="cms_users">
<?php
if($_SESSION['role']=='Admin'){
?>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
              <li class="breadcrumb-item" style="color: #007bff;">
                <button class="btn btn-link btn-sm text-orange order-1 order-sm-0" id="sidebarToggle" href="#" style="color: #007bff;">
                    <i class="fas fa-bars"></i>
                </button>
                    <?php
                    if(isset($_GET['eid'])) {
                        echo $lang['edit_user'];
                    }else{
                        echo $lang['add_user'];
                    }
                    ?>
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
        <div class="col-md-6" style="margin-left: -1rem;">
            <div class="card-body">
                <form role="form" method="post" enctype="multipart/form-data">

                    <?php
                    if(isset($user)){
                        $user_id=$user['id'];
                        echo '<input type="hidden" name="cat_id" id="cat_id" value="'.$cat_id.'">';
                    }
                    ?>

                    <div class="form-group">
                        <label class="control-label"><b><?php echo $lang['fullname'];?> :</b></label>
                        <input type="text" name="name" id="name" required="required" class="form-control" placeholder="<?php echo $lang['fullname'];?>" value="<?php if(isset($user)){echo $user['fullname'];}?>">
                    </div>

                     <div class="form-group">
                        <label class="control-label"><b><?php echo $lang['email'];?> :</b></label>
                        <input type="text" name="email" id="name" required="required" class="form-control" placeholder="<?php echo $lang['email'];?>" value="<?php if(isset($user)){echo $user['email'];}?>">
                    </div>
                    <div class="form-group">
                            <label class="control-label"><b><?php echo $lang['role'];?> :</b></label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="role" id="optionsRadios1" value="Admin" <?php if(isset($user)&&$user['role']=='Admin'){echo 'checked';}?>>
                                    <?php echo $lang['admin'];?>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="role" id="optionsRadios2" value="Editor" <?php if(isset($user)&&$user['role']=='Editor'){echo 'checked';}?>>
                                    <?php echo $lang['editor'];?>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="role" id="optionsRadios3" value="Standard" <?php if(isset($user)&&$user['role']=='Standard'){echo 'checked';}elseif(!isset($user)){echo 'checked';}?>>
                                    <?php echo $lang['standard'];?>
                                </label>
                            </div>
                        </div>

                    <?php
                    if(isset($user)){
                        echo '<input type="submit" value="'.$lang['edit'].'" id="btnedit" name="btnedit" class="btn btn-primary btn-block col-sm-3"/>';
                    }else{
                        echo '<input type="submit" value="'.$lang['submit'].'" id="btnSubmit" name="btnSubmit" class="btn btn-primary btn-block col-sm-3"/>';
                    }
                    ?>

                </form>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                        <thead>
                                <tr>
                                    <th><?php echo $lang['sr_no'];?></th>
                                    <th><?php echo $lang['fullname'];?></th>
                                    <th><?php echo $lang['email'];?></th>
                                    <th><?php echo $lang['reset_password'];?></th>
                                    <th><?php echo $lang['delete'];?></th>
                                    <th><?php echo $lang['role'];?></th>
                                </tr>
                        </thead>
                        <tbody>
                        <?php
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $name = $row['fullname'];
                                $email=$row['email'];
                                $role=$row['role'];
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><a href="cms_users.php?eid=<?php echo $id; ?>"><?php echo $name; ?></a></td>
                                <td><?php echo $email; ?></td>
                                                                <td>
                                    <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm<?php echo $id; ?>"><i class="fas fa-fw fa-sync-alt" style="color: blue;"></i></a>

                                    <div class="modal fade bs-example-modal-sm<?php echo $id; ?>" tabindex="-1"
                                         role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm<?php echo $id; ?>">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel2"><?php echo $lang['reset'];?></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4><?php echo $lang['confirm_reset'];?></h4>
                                                    <p><?php echo $lang['do_u_really_want_to_reset'];?></p>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                                class="btn btn-default" data-dismiss="modal"><?php echo $lang['cancel'];?>
                                                        </button>

                                                        <button type="button"
                                                                onclick="window.location.href='cms_users.php?rid=<?php echo $id; ?>'"
                                                                class="btn btn-primary"> <?php echo $lang['reset'];?> !
                                                        </button>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <a href="#" data-toggle="modal" data-target=".bs-example-modal-smd<?php echo $id; ?>"><i class="fas fa-fw fa-trash-alt" style="color: red;"></i></a>

                                    <div class="modal fade bs-example-modal-smd<?php echo $id; ?>" tabindex="-1"
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
                                                                onclick="window.location.href='cms_users.php?did=<?php echo $id; ?>'"
                                                                class="btn btn-primary"> <?php echo $lang['delete'];?> !
                                                        </button>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo $role; ?></td>
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
<?php
}
else{
?>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
              <li class="breadcrumb-item" style="color: #007bff;">
                    Unauthorised Account
                </a>
            </li>
        </ol>
    </div>
<?php
}
?>
</div>


<?php
include 'footer.php';
?>
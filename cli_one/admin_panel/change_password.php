

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

if (isset($_POST['btnSubmit'])) {

    $id=$_SESSION['user_id'];
    $password=$_POST['password'];
    $cu_pwd=md5($_POST['cu_pwd']);
    $new_pwd=md5($_POST['new_pwd']);
    $con_pwd=md5($_POST['con_pwd']);
    if($cu_pwd==$password){
        if($new_pwd==$con_pwd){
            $query ="UPDATE `tbl_admin` set password='$new_pwd' WHERE id=$id";

            $result =  mysqli_query($conn,$query);

            if ($result) {
                $tmsg = $lang['pwd_change_success'];
            }else {
                $terrormsg = $lang['pwd_change_fail'];
            }
        }else{
            $terrormsg=$lang['new_confirm_not_match'];
        }
    }else{
        $terrormsg=$lang['current_pwd_not_match'];
    }
}

?>

<input type="hidden" id="page_name" value="change_password">
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item" style="color: #007bff;">
            <button class="btn btn-link btn-sm text-orange order-1 order-sm-0" id="sidebarToggle" href="#" style="color: #007bff;">
                <i class="fas fa-bars"></i>
            </button>
            Change Password
            </li>
        </ol>

        <!-- Icon Cards-->

        <?php
        if ($tmsg != '') {
            echo '<div class="alert alert-success alert-dismissible">';
            echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
            echo '<label class="control-label"><i class="fas fw fa-check-circle"></i> ' . $tmsg . '</label>';
            echo '</div><br/>';
        } if ($terrormsg != '') {
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
                    if(isset($_SESSION['user_id'])){
                        $user_id=$_SESSION['user_id'];
                        $query ="select * from tbl_admin where id=$user_id";
                        $result =  mysqli_query($conn,$query);
                        if (mysqli_num_rows($result) > 0) {
                            $admin = $result->fetch_assoc();
                        }
                    }

                    ?>

                    <input class="form-control" name="password" type="hidden"  value="<?php if(isset($admin)){echo $admin['password'];}?>">
                    <div class="form-group">
                        <label for="name"><?php echo $lang['current_password'];?></label>
                        <input type="password" name="cu_pwd" id="cu_pwd" required="required" class="form-control" placeholder="<?php echo $lang['current_password'];?>" value="">
                    </div>

                    <div class="form-group">
                        <label for="name"><?php echo $lang['new_password'];?></label>
                        <input type="password" name="new_pwd" id="new_pwd" required="required" class="form-control" placeholder="<?php echo $lang['new_password'];?>" value="">
                    </div>

                    <div class="form-group">
                        <label for="name"><?php echo $lang['confirm_password'];?></label>
                        <input type="password" name="con_pwd" id="con_pwd" required="required" class="form-control" placeholder="<?php echo $lang['confirm_password'];?>" value="">
                    </div>


                    <input type="submit" value="<?php echo $lang['submit'];?>" id="btnSubmit" name="btnSubmit" class="btn btn-primary btn-block col-sm-3"/>

                </form>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>


<?php
include 'footer.php';
?>


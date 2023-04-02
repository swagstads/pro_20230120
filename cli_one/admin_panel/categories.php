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
        $tmsg = $lang['category_update_success'];
    }

    if(isset($_GET['delete']) && $_GET['delete']=='success'){
        $tmsg = $lang['category_delete_success'];
    }
}

if (isset($_POST['btnSubmit'])) {
    $name=strtolower($_POST['name']);

    $insertdata = mysqli_query($conn, "INSERT INTO `category` (`category_name`,`created_at`,`updated_at`) VALUES ('$name',now(),now());");
    $id = mysqli_insert_id($conn);
    if ($insertdata) {

        if (isset($_FILES['category_img']['name'])) {

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
        }
        $tmsg = $lang['category_add_success'];
    }
    else {
        $terrormsg = $lang['category_add_fail'];
    }

}

if (isset($_POST['btnedit'])) {

    $id = $_POST['cat_id'];
    $name=strtolower($_POST['name']);

    $query ="UPDATE `category` set category_name='$name',updated_at=now() WHERE id=$id";
    //echo $query;die;
    $result =  mysqli_query($conn,$query);
    if ($result) {

        if (isset($_FILES['category_img']['name'])) {

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
        }

        //$tmsg = $lang['category_update_success'];
        echo '<script>window.location="categories.php?update=success";</script>';
    }else {
        $terrormsg = $lang['category_update_fail'];
    }

}

if(isset($_GET['eid'])){
    $id=$_GET['eid'];
    $query ="select * from category where id=$id";
    $result =  mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) {
        $category = $result->fetch_assoc();
    }
}

if(isset($_GET['did'])){
    $id=$_GET['did'];
    $query ="update `category` set status='delete' WHERE id=$id";
    $result =  mysqli_query($conn,$query);
    //$tmsg=$lang['category_delete_success'];
    echo '<script>window.location="categories.php?delete=success";</script>';

}

$result = mysqli_query($conn, "select * from category Where status='active' ORDER BY created_at ASC");
$no = 1;
?>

<input type="hidden" id="page_name" value="categories">
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <?php
        if($_SESSION['role']=='Admin')
        {
        ?>
        <ol class="breadcrumb">
            <li class="breadcrumb-item" style="color: #007bff;">
                <button class="btn btn-link btn-sm text-orange order-1 order-sm-0" id="sidebarToggle" href="#" style="color: #007bff;">
                    <i class="fas fa-bars"></i>
                </button>
                    <?php
                    if(isset($_GET['eid'])) {
                        echo $lang['edit_category'];
                    }else{
                        echo $lang['add_category'];
                    }
                    ?>
                </a>
            </li>
        </ol>
        <?php
        }
        ?>
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
        <div class="row">
        <div class="col-md-6">
            <div class="card-body">
                <?php
                if($_SESSION['role']=='Admin')
                {
                ?>
                <form role="form" method="post" enctype="multipart/form-data">

                    <?php
                    if(isset($category)){
                        $cat_id=$category['id'];
                        echo '<input type="hidden" name="cat_id" id="cat_id" value="'.$cat_id.'">';
                    }
                    ?>

                    <div class="form-group">
                        <label class="control-label"><b><?php echo $lang['category_name'];?> :</b></label>
                        <input type="text" name="name" id="name" required="required" class="form-control" placeholder="<?php echo $lang['category_name'];?>" value="<?php if(isset($category)){echo $category['category_name'];}?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label"><b><?php echo $lang['category_image'];?> :</b></label>
                        <input type="file" id="category_img" required="required" class="form-control-file" name="category_img" accept="image/jpeg,image/png" />
                        
                    </div>

                    <?php
                    if(isset($category)){
                        echo '<input type="submit" value="'.$lang['edit'].'" id="btnedit" name="btnedit" class="btn btn-primary btn-block col-sm-3"/>';
                    }else{
                        echo '<input type="submit" value="'.$lang['submit'].'" id="btnSubmit" name="btnSubmit" class="btn btn-primary btn-block col-sm-3"/>';
                    }
                    ?>

                </form>
                <?php
                }
                ?>
            </div>
            </div>
            <div class="col-md-6">
            <?php
            if(isset($category)){
                if(!empty($category['category_img']) && file_exists('uploads/category/'.$category['category_img'])) {
                    echo "<img src='uploads/category/".$category['category_img']."' height='150' width='150' style='margin-top:3px; padding: 1.25em;'>";
                }
            }
            ?>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                        <thead>
                                <tr>
                                    <th><?php echo $lang['sr_no'];?></th>
                                    <th><?php echo $lang['category_name'];?></th>
                                    <th><?php echo $lang['category_image'];?></th>
                                    <?php
                                    if($_SESSION['role']=='Admin'){
                                    ?>
                                    <th><?php echo $lang['delete'];?></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                        </thead>
                        <tbody>
                        <?php
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $name = strtolower($row['category_name']);
                                $image=$row['category_img'];
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td>
                                    <?php
                                    if($_SESSION['role']=='Admin'){
                                    ?>
                                    <a href="categories.php?eid=<?php echo $id; ?>">
                                    <?php
                                    }
                                    ?>
                                        <?php echo $name; ?></a></td>
                                <td>
                                    <?php
                                    if($image!=''&&file_exists('uploads/category/'.$image)){
                                        echo "<img src='uploads/category/".$image."' height='30' width='30'>";
                                    }else{
                                        echo "<img src='images/no_image.jpg' height='30' width='30'>";
                                    }
                                    ?>
                                </td>
                                <?php
                                if($_SESSION['role']=='Admin'){
                                ?>
                                <td>
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
                                                                onclick="window.location.href='categories.php?did=<?php echo $id; ?>'"
                                                                class="btn btn-primary"> <?php echo $lang['delete'];?> !
                                                        </button>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <?php
                                }
                                ?>
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
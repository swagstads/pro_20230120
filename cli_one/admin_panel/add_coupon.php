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
if ($_SESSION['role']!='Admin'||$_SESSION['role']=='Editor'){
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


$tmsg='';
$terrormsg='';

if (isset($_POST['btnSubmit'])) {
    //echo '<pre>';print_r($_POST);die;
    $user = $_SESSION['usr'];
    $name = $_POST['name'];
    $code = $_POST['code'];
    $product_id = $_POST['product_id'];
    $discount_type = $_POST['discount_type'];
    $amount = $_POST['amount'];
    $code = $_POST['code'];
    $status = $_POST['status'];
    $valid = date('Y-m-d H:i',strtotime($_POST['valid']));
    $now = date('Y-m-d H:i',time());
    $insert_query = "INSERT INTO `coupon`(`name`, `code`, `amount`, `discount_type`, `product_id`, `status`, `valid_till`, `added_by`, `added_on`)";
    $insert_query .= "VALUES ('$name','$code','$amount','$discount_type','$product_id','$status','$valid','$user',now());";
  //  print($insert_query);
    $insertdata = mysqli_query($conn, $insert_query);
   // print($insertdata);
    $id = mysqli_insert_id($conn);
    if ($insertdata) {
        echo '<script>window.location="coupons.php?insert=success";</script>';
    }
    else {
        $terrormsg = 'Coupon Addition Failed';
    }
}
/*
if (isset($_POST['btnDraft'])) {
    //echo '<pre>';print_r($_POST);die;
    $user = $_SESSION['usr'];
    $mrp = $_POST['mrp'];
    $coupon_id = $_POST['product_id'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $title = $_POST['title'];
    $quantity = $_POST['quantity'];
    $code = $_POST['code'];
    $now = date('Y-m-d H:i',time());
    $insert_query = "INSERT INTO `product`(`title`, `product_id`, `code`, `price`, `status`, `added_by`, `mrp`, `color`, `added_on`, `modified_on`, `quantity`) ";
    $insert_query .= "VALUES ('$title','$coupon_id','$code','$price','inactive',$user','$mrp','$color',now(),now(), '$quantity');";
  //  print($insert_query);
    $insertdata = mysqli_query($conn, $insert_query);
   // print($insertdata);
    $id = mysqli_insert_id($conn);
    if ($insertdata) {
        echo '<script>window.location="products.php?insert=success";</script>';
    }
    else {
        $terrormsg = 'Coupon Addition Failed';
    }

}

if (isset($_POST['btnEditDraft'])) {
    //echo '<pre>';print_r($_POST);die;
    $id = $_POST['product_id'];
    $user = $_SESSION['usr'];
    $mrp = $_POST['mrp'];
    $coupon_id = $_POST['product_id'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $title = $_POST['title'];
    $quantity = $_POST['quantity'];
    $code = $_POST['code'];
    $now = date('Y-m-d H:i',time());
    $query = "UPDATE `product` set color='$color', product_id='$coupon_id', mrp='$mrp', title='$title',code='$code',price='$price',status='inactive',added_by='$user',modified_on='$now', quantity='$quantity' WHERE id='$id';";
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
                    $target_path = "uploads/products/";
                    $target_file = $target_path . basename($val['name']);
                    $FileType = pathinfo($target_file, PATHINFO_EXTENSION);
                    $newname = generateRandomString() . '.' . $FileType;
                    if (move_uploaded_file($val['tmp_name'],$target_path.$newname)){
                        $query2 = "insert product_media(product_id,image_name,added_on) values($id,'$newname',now())";
                        mysqli_query($conn, $query2);
                    }
                }
            }
        }
        //$tmsg = $lang['news_update_success'];
        echo '<script>window.location="products.php?update=success";</script>';
    }else {
        $terrormsg = 'Product Addition Failed';
    }

}
*/
if (isset($_POST['btnedit'])) {
    //echo '<pre>';print_r($_POST);die;
    $id = $_GET['id'];
    $user = $_SESSION['usr'];
    $name = $_POST['name'];
    $code = $_POST['code'];
    $product_id = $_POST['product_id'];
    $discount_type = $_POST['discount_type'];
    $amount = $_POST['amount'];
    $code = $_POST['code'];
    $status = $_POST['status'];
    $valid = date('Y-m-d H:i',strtotime($_POST['valid']));
    $now = date('Y-m-d H:i',time());
    $query = "UPDATE `coupon` set `name`='$name', `product_id`='$product_id',`discount_type`='$discount_type', `code`='$code',`amount`='$amount', `status`='$status',`valid_till`='$valid' WHERE id='$id';";
    //echo $query;die;
    $result =  mysqli_query($conn,$query);
    if(isset($coupon)&&$coupon['media_type']=='image'){
        $query_image ="select * from product_media where news_id=".$coupon['id'];
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
        echo '<script>window.location="coupons.php?update=success";</script>';
    }else {
        $terrormsg = 'Coupon Addition Failed';
    }

}
if(isset($_GET['eid'])){
    $id=$_GET['eid'];
    $query ="select * from coupon where id=$id";
    $result =  mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) {
        $coupon = $result->fetch_assoc();
    }
}


?>

<input type="hidden" id="page_name" value="coupons">
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
                        echo 'Edit Coupon';
                    }else{
                        echo 'Add Coupon';
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
                        <div class="form-group">
                            <label class="control-label"><b>Name :</b></label>
                            <input type="text" name="name" maxlength="20" id="name" required="required" class="form-control" placeholder="Coupon Name" value="<?php if(isset($coupon)){echo $coupon['name'];}?>" maxlength="100">
                        </div>

                        <div class="form-group">
                            <label class="control-label"><b>Code :</b></label>
                            <input type="text" name="code" maxlength="20" id="code" required="required" class="form-control" placeholder="Coupon Code" value="<?php if(isset($coupon)){echo $coupon['code'];}?>" maxlength="100" oninput="this.value = this.value.toUpperCase()">
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label"><b>Products :</b></label>
                            <input  type="text" name="product_id" required="required" value="<?php if(isset($coupon)){echo $coupon['product_id'];}?>" id="product_id" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default"  style="width: 100%; ">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><b>Amount :</b></label>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="discount_type" id="option1" value="cash" <?php if(isset($coupon)&&$coupon['discount_type']=='cash'){echo 'checked';}?> onclick="get_respective_div(this.value)">
                                   Rs.
                                </label>
                            </div>
                            <input  type="number" name="amount" required="required" value="<?php if(isset($coupon)){echo $coupon['amount'];}?>" id="amount" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="form-control"  style="width: 100%; ">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="discount_type" id="option2" value="percentage" <?php if(isset($coupon)&&$coupon['discount_type']=='percentage'){echo 'checked';}?> onclick="get_respective_div(this.value)">
                                   %
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><b>Valid Till :</b></label>
                            <input type="text" id="valid" name="valid" class="form-control" value="<?php if(isset($coupon) && !empty($coupon['valid_till'])){echo date('d-m-Y H:i',strtotime($coupon['valid_till']));}?>">
                        </div>
                        <div class="form-group">
                                <label class="control-label"><b>Status :</b></label>
                                <select name="status" class="form-control" id="status">
                                    <option value="active" <?php if($users['status'] == 'active'){echo 'selected';} ?>>active</option>
                                    <option value="inactive" <?php if($users['status'] == 'inactive'){echo 'selected';} ?>>inactive</option>
                                </select>
                            </div>
                        <?php
                        if(isset($coupon)){
                            //echo '<input type="submit" value="'.$lang['draft'].'" id="btnEditDraft" name="btnEditDraft" class="btn btn-primary btn-block col-sm-3"/>';
                            echo '<input '.$display.' type="submit" value="Update Coupon" id="btnedit" name="btnedit" class="btn btn-primary btn-block col-sm-3"/>';
                        }else{
                            //echo '<input type="submit" value="'.$lang['draft'].'" id="btnDraft" name="btnDraft" class="btn btn-primary btn-block col-sm-3"/>';
                            echo '<input '.$display.' type="submit" value="Add Coupon" id="btnSubmit" name="btnSubmit" class="btn btn-primary btn-block col-sm-3"/>';
                        }
                        ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->


</div>


<?php
include 'footer.php';
?>

<script type="application/javascript">
function checkform(){
    console.log($('#valid').val);
}
function get_respective_div(discount_type){
    amount = $('#amount');
    console.log($('#valid').val);

    amt = document.getElementById('amount');
    if(discount_type=='percentage'){
        if(Number(amt.value)>100){
            amt.value = 100;
            show_msg("Discount can't be more than 100%");
        }
        amount.prop('max',100);
    }else{
        amount.prop('max',1000000);
    }
}
</script>

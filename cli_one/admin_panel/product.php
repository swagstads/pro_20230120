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
    $mrp = $_POST['mrp'];
    $color = $_POST['color'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $title = $_POST['title'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $now = date('Y-m-d H:i',time());
    $insert_query = "INSERT INTO `product`(`title`, `category_id`, `description`, `price`, `status`, `added_by`, `mrp`, `color`, `added_on`, `modified_on`, `quantity`) ";
    $insert_query .= "VALUES ('$title','$category_id','$description','$price','active','$user','$mrp','$color',now(),now(), '$quantity');";
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

        echo '<script>window.location="products.php?insert=success";</script>';
    }
    else {
        $terrormsg = 'Product Addition Failed';
    }

}

if (isset($_POST['btnDraft'])) {
    //echo '<pre>';print_r($_POST);die;
    $user = $_SESSION['usr'];
    $mrp = $_POST['mrp'];
    $category_id = $_POST['category_id'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $title = $_POST['title'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $now = date('Y-m-d H:i',time());
    $insert_query = "INSERT INTO `product`(`title`, `category_id`, `description`, `price`, `status`, `added_by`, `mrp`, `color`, `added_on`, `modified_on`, `quantity`) ";
    $insert_query .= "VALUES ('$title','$category_id','$description','$price','inactive',$user','$mrp','$color',now(),now(), '$quantity');";
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

        echo '<script>window.location="products.php?insert=success";</script>';
    }
    else {
        $terrormsg = 'Product Addition Failed';
    }

}

if (isset($_POST['btnEditDraft'])) {
    //echo '<pre>';print_r($_POST);die;
    $id = $_POST['product_id'];
    $user = $_SESSION['usr'];
    $mrp = $_POST['mrp'];
    $category_id = $_POST['category_id'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $title = $_POST['title'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $now = date('Y-m-d H:i',time());
    $query = "UPDATE `product` set color='$color', category_id='$category_id', mrp='$mrp', title='$title',description='$description',price='$price',status='inactive',added_by='$user',modified_on='$now', quantity='$quantity' WHERE id='$id';";
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

if (isset($_POST['btnedit'])) {
    //echo '<pre>';print_r($_POST);die;
    $id = $_POST['product_id'];
    $user = $_SESSION['usr'];
    $mrp = $_POST['mrp'];
    $category_id = $_POST['category_id'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $title = $_POST['title'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $now = date('Y-m-d H:i',time());
    $query = "UPDATE `product` set color='$color', `category_id`='$category_id', mrp='$mrp', title='$title',description='$description',price='$price',status='active',added_by='$user',modified_on='$now', quantity='$quantity' WHERE id='$id';";
    //echo $query;die;
    $result =  mysqli_query($conn,$query);
    if(isset($product)&&$product['media_type']=='image'){
        $query_image ="select * from product_media where news_id=".$product['id'];
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
                        $query2 = "insert product_media(news_id,image_name,created_at,updated_at) values($id,'$newname',now(),now())";
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
$min = 1;
if(isset($_GET['eid'])){
    $min = 0;
    $id=$_GET['eid'];
    $query ="select * from product where id=$id";
    $result =  mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) {
        $product = $result->fetch_assoc();
    }
}

if(isset($_GET['did'])){
    $id=$_GET['did'];

    $query ="select * from product_media where id=$id";
    $result =  mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) {
        $product_media = $result->fetch_assoc();
        $product_id = $product_media['product_id'];
        if(!empty($product_media['image_name'])){
            $filename="uploads/products/".$product_media['image_name'];
            unlink($filename);
        }
        $query ="DELETE FROM `product_media` WHERE id=$id";
        $result =  mysqli_query($conn,$query);
        unset($offers);
        if($result){
            echo '<script>window.location="product.php?eid='.$product_id.'";</script>';
            //$tmsg = $lang['news_image_delete_success'];
        }else{
            $terrormsg = 'Image could not be deleted';
        }
    }
}

?>

<input type="hidden" id="page_name" value="products">
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
                        echo 'Edit Product';
                    }else{
                        echo 'Add Product';
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

                        <?php
                        if(isset($product)){
                            $cat_id=$product['id'];
                            echo '<input type="hidden" name="product_id" id="prod_id" value="'.$cat_id.'">';
                        }
                        ?>
                        

                        <div class="form-group">
                            <label class="control-label"><b>Title :</b></label>
                            <input type="text" name="title" id="title" required="required" class="form-control" placeholder="Product Title" value="<?php if(isset($product)){echo $product['title'];}?>" maxlength="100">
                        </div>

                        <div class="form-group">
                            <label class="control-label"><b>Description :</b></label>
                            <textarea name="description" id="description" required="required" class="form-control" rows="5">
                            <?php if(isset($product)){echo $product['description'];}?>
                            </textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label"><b>Category :</b></label>
                            <input  type="text" name="category_id" required="required" value="<?php if(isset($product)){echo $product['category_id'];}?>" id="category_id" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default"  style="width: 100%; ">
                        </div>
                        
                        <div class="form-group field_wrapper" id="image_div" style="display:block;">
                            <label class="control-label"><b>Product Images :</b></label>
                            <input type="file" id="photo" class="form-control-file" name="photo[]" <?php if(!isset($product)){echo 'required="required"'; } ?> accept="image/jpeg,image/png" />
                            <br/>
                            <a href="javascript:void(0);" class="add_button" title="Add field"><input type="button" value="<?php echo $lang['add_multi_images'];?>" class="btn btn-primary"></a>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><b>Discounted Price :</b></label>
                            <input  type="number" name="price" required="required" value="<?php if(isset($product)){echo $product['price'];}?>" id="price" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="form-control"  style="width: 100%; ">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><b>M.R.P. :</b></label>
                            <input  type="number" name="mrp" required="required" value="<?php if(isset($product)){echo $product['mrp'];}?>" id="mrp" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="form-control"  style="width: 100%; ">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><b>Quantity :</b></label>
                            <input  type="number" name="quantity" required="required" max="500" min="<?php echo $min; ?>" value="<?php if(isset($product)){echo $product['quantity'];}?>" id="mrp" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="form-control"  style="width: 100%; ">
                        </div>
                        <!--
                        <div class="form-group">
                            <label class="control-label"><b>Colour :</b></label>
                            <input  type="color" name="color" value="<?php if(isset($product)){echo $product['color'];}?>" id="color" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default"  style="width: 100%; ">
                        </div>
                        -->
                        <?php
                        if(isset($product)){
                            //echo '<input type="submit" value="'.$lang['draft'].'" id="btnEditDraft" name="btnEditDraft" class="btn btn-primary btn-block col-sm-3"/>';
                            echo '<input '.$display.' type="submit" value="'.$lang['publish'].'" id="btnedit" name="btnedit" class="btn btn-primary btn-block col-sm-3"/>';
                        }else{
                            //echo '<input type="submit" value="'.$lang['draft'].'" id="btnDraft" name="btnDraft" class="btn btn-primary btn-block col-sm-3"/>';
                            echo '<input '.$display.' type="submit" value="'.$lang['publish'].'" id="btnSubmit" name="btnSubmit" class="btn btn-primary btn-block col-sm-3"/>';
                        }
                        ?>

                    </form>
                </div>
            </div>

            <div class="col-6">
                <?php
                if(isset($product)){
                    $query_image ="select * from product_media where product_id=".$product['id'];
                    $result_images =  mysqli_query($conn,$query_image);
                    $no = 1;
                    if (mysqli_num_rows($result_images) > 0) {
                ?>
                <div class="container">
                    <label class="control-label"><b>Product Images :</b></label><br/><br/>
                    <div class="row">
                        <?php
                        while ($row_images = $result_images->fetch_assoc()) {
                            $img_id = $row_images['id'];
                            $img_name = $row_images['image_name'];
                            ?>
                            <div style="margin-right: 20px;margin-bottom: 10px;">
                                <a class="thumbnail fancybox" rel="ligthbox" href="uploads/products/<?php echo $img_name;?>">
                                    <img class="img-responsive" alt="" src="uploads/products/<?php echo $img_name;?>"  height='150' width='150'/>
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
                                                            onclick="return false;"
                                                            class="btn btn-default" data-dismiss="modal"><?php echo $lang['cancel'];?>
                                                    </button>

                                                    <button type="button"
                                                            onclick="window.location.href='product.php?did=<?php echo $img_id; ?>'"
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
    CKEDITOR.replace( 'description-inactive', {
        wordcount: {
            showCharCount: true,
            maxCharCount: 400,
        }
    });
</script>

<script type="application/javascript">
function checkform() {
    var discount_price = Number($('input[name=price]').val());
    var mrp = Number($('input[name=mrp]').val());
    if (discount_price > mrp)
    {
        
        $('#alert_message_div').show();
        $("#errormsg").html("<i class='fas fw fa-times-circle'></i> Discount Price can not be more than M.R.P.");
        show_msg("Discount Price can not be more than M.R.P.");
        return false;
    }else{
        return true;
    }
    // If the script gets this far through all of your fields
    // without problems, it's ok and you can submit the form
    //return true;
        
    }

</script>

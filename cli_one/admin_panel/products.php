<?php
//if (session_id() == '') {
    session_start();
//}
  //  echo "After";
  //  echo $_SESSION['usr'];
 //   echo "ABC";
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

if(isset($_GET['insert']) || isset($_GET['update']) || isset($_GET['delete'])){
    if(isset($_GET['insert']) && $_GET['insert']=='success'){
        $tmsg = 'Product Added!';
    }

    if(isset($_GET['update']) && $_GET['update']=='success'){
        $tmsg = 'Product Updated!';
    }

    if(isset($_GET['delete']) && $_GET['delete']=='success'){
        $tmsg = 'Product Deleted!';
    }
}

if(isset($_GET['did'])){
    $id=$_GET['did'];

    $query ="UPDATE `product` SET `status`='deleted' WHERE id=$id";
    $delete =  mysqli_query($conn,$query);
    $result = mysqli_query($conn, "select product.id, product.category_id, product.title, product.description, product.added_on, product.modified_on, product.status, tbl_admin.fullname from product JOIN tbl_admin ON product.added_by=tbl_admin.email WHERE `status` <> 'deleted' ORDER by added_on DESC;");
    $tmsg='Product Deleted!';

}else {
    $result = mysqli_query($conn, "select product.id, product.category_id, product.title, product.description, product.added_on, product.modified_on, product.status, tbl_admin.fullname from product JOIN tbl_admin ON product.added_by=tbl_admin.email WHERE `status` <> 'deleted' ORDER by added_on DESC;");
}
$no = 1;
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
            Product List
            </li>
        </ol>

        <a href="product.php" class="btn btn-primary btn-block col-sm-2" style="float:right; margin: 0.5rem;"><i class="fas fa-fw fa-plus"></i> Add Product</a>

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
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive" id="news_div">

                    <table class="table table-bordered" id="news_dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                        <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Title</th>
                            <th>Images</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Added By</th>
                            <th>Added On</th>
                            <th>Status</th>
                            <?php
                            if($_SESSION['role']=='Admin'){
                            ?>
                            <th>Delete</th>
                            <?php
                            }
                            ?>
                        </tr>
                        </thead>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $category_id = $row['category_id'];
                            $description = $row['description'];
                            $status=$row['status'];
                            $added_by=$row['fullname'];
                            $added_on=$row['added_on'];
                            $modified_on=$row['modified_on'];
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><a href="product.php?eid=<?php echo $id; ?>"><?php echo strlen($title) > 70 ? substr($title,0,70).'..' : $title; ?></a></td>
                                <td style="width: 336px;">
                                <?php
                                    if(!empty($id)) {
                                        $get_images = mysqli_query($conn, "SELECT * FROM product_media WHERE product_id = $id;");
                                        if (mysqli_num_rows($get_images)) {
                                            while ($image_data = $get_images->fetch_assoc()) {
                                                $image = $image_data['image_name'];
                                                echo "<img src='./uploads/products/$image' height='80' width='80' style='padding: 2px;'>";
                                            }
                                        }
                                    }
                                ?>
                                </td>
                                <td><?php
                                    $category_list = mysqli_query($conn, "SELECT category_name FROM category WHERE id = '$category_id';"); 
                                    if (mysqli_num_rows($category_list)) {
                                        while ($category_data = $category_list->fetch_assoc()) {
                                            $category = $category_data['category_name'];
                                            echo $category;
                                        }
                                    }
                                ?></td>
                                <td><?php echo $description; ?></td>
                                <td><?php echo $added_by; ?></td>
                                <td><?php echo $added_on; ?></td>
                                <td><?php echo $status; ?></td>
                                <?php
                                if($_SESSION['role']=='Admin'){
                                ?>
                                <td class="center">
                                    <a href="products.php?did=<?php echo $id; ?>" data-toggle="modal" data-target=".bs-example-modal-smd<?php echo $id; ?>"><i class="fas fa-fw fa-trash-alt" style="color: red;"></i></a>

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
                                                                onclick="window.location.href='products.php?did=<?php echo $id; ?>'"
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
                        <tbody>
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
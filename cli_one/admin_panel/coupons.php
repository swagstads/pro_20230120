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
        $tmsg = 'Coupon Added!';
    }

    if(isset($_GET['update']) && $_GET['update']=='success'){
        $tmsg = 'Coupon Updated!';
    }

    if(isset($_GET['delete']) && $_GET['delete']=='success'){
        $tmsg = 'Coupon Deleted!';
    }
}

if(isset($_GET['did'])){
    $id=$_GET['did'];

    $query ="UPDATE `coupon` SET `status`='deleted' WHERE id=$id";
    $delete =  mysqli_query($conn,$query);
    $result = mysqli_query($conn, "select coupon.id, coupon.name, coupon.discount_type, coupon.status, coupon.amount, coupon.product_id, coupon.valid_till, coupon.added_by, coupon.code, coupon.added_on, tbl_admin.fullname from coupon JOIN tbl_admin ON coupon.added_by=tbl_admin.email WHERE `status` <> 'deleted' ORDER by added_on DESC;");
    $tmsg='Coupon Deleted!';

}else {
    $result = mysqli_query($conn, "select coupon.id, coupon.name, coupon.discount_type, coupon.status, coupon.amount, coupon.product_id, coupon.valid_till, coupon.added_by, coupon.code, coupon.added_on, tbl_admin.fullname from coupon JOIN tbl_admin ON coupon.added_by=tbl_admin.email WHERE `status` <> 'deleted' ORDER by added_on DESC;");
}
$no = 1;
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
            Coupons
            </li>
        </ol>

        <a href="add_coupon.php" class="btn btn-primary btn-block col-sm-2" style="float:right; margin: 0.5rem;"><i class="fas fa-fw fa-plus"></i> Add Coupon</a>

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
                            <th>Name</th>
                            <th>Code</th>
                            <th>Products</th>
                            <th>Amount</th>
                            <th>Added By</th>
                            <th>Added On</th>
                            <th>Valid Till</th>
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
                            $coupon_name = $row['name'];
                            $product_id = $row['product_id'];
                            $code = $row['code'];
                            $amount = $row['amount'];
                            $dtype = $row['discount_type'];
                            $status=$row['status'];
                            $valid_till = $row['valid_till'];
                            $added_by=$row['fullname'];
                            $added_on=$row['added_on'];
                            $modified_on=$row['modified_on'];
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><a href="add_coupon.php?eid=<?php echo $id; ?>"><?php echo $coupon_name;?></a></td>
                                <td><?php echo $code; ?></td>
                                <td><?php
                                    $category_list = mysqli_query($conn, "SELECT title FROM product WHERE id IN ($product_id);"); 
                                    $category = "";
                                    if (mysqli_num_rows($category_list)) {
                                        while ($category_data = $category_list->fetch_assoc()) {
                                            $category .= $category_data['title'].", ";
                                        }
                                        echo substr($category, 0, strlen($category)-2);
                                    }
                                ?></td>
                                <td><?php echo ($dtype == 'cash') ? 'Rs.'.$amount: $amount."%"; ?></td>
                                <td><?php echo $added_by; ?></td>
                                <td><?php echo $added_on; ?></td>
                                <td><?php echo $valid_till; ?></td>
                                <td><text style="color: <?php echo $status=='active'? 'green': 'red'; ?>">●  </text><?php echo $status; ?></td>
                                <?php
                                if($_SESSION['role']=='Admin'){
                                ?>
                                <td class="center">
                                    <a href="coupons.php?did=<?php echo $id; ?>" data-toggle="modal" data-target=".bs-example-modal-smd<?php echo $id; ?>"><i class="fas fa-fw fa-trash-alt" style="color: red;"></i></a>

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
                                                                onclick="window.location.href='coupons.php?did=<?php echo $id; ?>'"
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
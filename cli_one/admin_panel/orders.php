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

$result = mysqli_query($conn, "select orders.order_id, orders.location, users.name, users.email, users.phone, users.address, orders.status, product.title from `orders` JOIN `users` ON `orders`.`user_id` = `users`.`id` JOIN `product` ON `product`.`id` = `orders`.`product_id`");
$no = 1;
?>

<input type="hidden" id="page_name" value="orders">
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    Orders
                </a>
            </li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Orders
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                        <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Products</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $oid = $row['order_id'];
                            $location = $row['address'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $phone = $row['phone'];
                            $status = $row['status'];
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td><?php echo $location; ?></td>
                                <td><?php echo $oid; ?></td>
                                <td><?php echo $status; ?></td>
                                <!--
                                <td><a href="order.php?eid=<?php echo $id; ?>" style="color: <?php if($status == 'delivered'){echo 'green';}elseif($status == 'in progress'){echo 'orange';}else{echo 'red';} ?>;"><?php echo $status; ?></p></td>
                                
                                <td><a href="mailto:<?php echo $email; ?>" style="color:green;"><i class="fas fa-fw fa-envelope" style="color: green; width: 10; height: 10; align: center;"></i></a></td>
                                -->
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
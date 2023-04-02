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

if($_GET['type'] == 'delivered'){
    $result = mysqli_query($conn, "select orders.id, orders.user_id, users.name, users.email, users.phone, users.address, orders.status, product.title from `orders` JOIN `users` ON `orders`.`user_id` = `users`.`id` JOIN `product` ON `product`.`id` = `orders`.`product_id` where orders.status='Delivered'");
}elseif($_GET['type'] == 'pending'){
    $result = mysqli_query($conn, "select orders.id, orders.user_id, users.name, users.email, users.phone, users.address, orders.status, product.title from `orders` JOIN `users` ON `orders`.`user_id` = `users`.`id` JOIN `product` ON `product`.`id` = `orders`.`product_id` where orders.status<>'Delivered'");
}else{
    $result = mysqli_query($conn, "select orders.id, orders.user_id, users.name, users.email, users.phone, users.address, orders.status, product.title from `orders` JOIN `users` ON `orders`.`user_id` = `users`.`id` JOIN `product` ON `product`.`id` = `orders`.`product_id`");
}
$no = 1;
?>

<input type="hidden" id="page_name" value="orders">
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item" style="color: #007bff;">
                <button class="btn btn-link btn-sm text-orange order-1 order-sm-0" id="sidebarToggle" href="#" style="color: #0087c7;">
                    <i class="fas fa-bars"></i>
                </button>
                <?php
                    if($_GET['type'] == 'delivered'){
                        echo 'Delivered Orders';
                    }elseif($_GET['type'] == 'pending'){
                        echo 'Pending Orders';
                    }else{
                        echo 'Orders';
                    }
                ?>
                </a>
            </li>
        </ol>

        <div class="card mb-3">
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
                            $user_id = $row['user_id'];
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
                                <td><?php
                                $presult = mysqli_query($conn, "SELECT product.price, orders.product_id, product.title, orders.quantity FROM `orders` JOIN product on product.id = orders.product_id WHERE orders.user_id = '$user_id';");
                                while($prod = $presult->fetch_assoc()){
                                    $pid = $prod['product_id'];
                                    $title = $prod['title'];
                                    $price = $prod['price'];
                                    $quant = $prod['quantity'];
                                    echo $title." &emsp; (Rs. ".$quant." * ".$price.")<br />";
                                    $value = $value + ($quant*$price);
                                }
                                ?></td>
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
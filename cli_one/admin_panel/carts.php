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

$result = mysqli_query($conn, "SELECT cart.user_id, user.name, user.status, user.email, user.phone, SUM(cart.quantity), SUM(product.price) FROM `cart` JOIN user on user.id = cart.user_id JOIN product on product.id = cart.product_id WHERE 1 group by cart.user_id
");
$no = 1;
?>

<input type="hidden" id="page_name" value="carts">
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    Carts
                </a>
            </li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Carts
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                        <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Username</th>
                            <th>Phone</th>
                            <th>E-mail</th>
                            <th>User Status</th>
                            <th>Products</th>
                            <th>Quantity</th>
                            <th>Value</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $user_id = $row['user_id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $status = $row['status'];
                            $phone = $row['phone'];
                            $quantity = $row['SUM(cart.quantity)'];
                            $value = 0;
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
                                <td><a href="user_status.php?eid=<?php echo $user_id;?>" style="color: <?php if($status == 'Active'){echo 'green';}elseif($status == 'Dormant'){echo 'orange';}else{echo 'red';} ?>;"><?php echo $status; ?></a></td>
                                <td><?php
                                $presult = mysqli_query($conn, "SELECT product.price, cart.product_id, product.title, cart.quantity FROM `cart` JOIN product on product.id = cart.product_id WHERE cart.user_id = '$user_id';");
                                while($prod = $presult->fetch_assoc()){
                                    $pid = $prod['product_id'];
                                    $title = $prod['title'];
                                    $price = $prod['price'];
                                    $quant = $prod['quantity'];
                                    echo '<a href="product.php?eid='.$pid.'">'.$title.'</a>'." &emsp; (Rs. ".$quant." * ".$price.")<br />";
                                    $value = $value + ($quant*$price);
                                }
                                ?></td>
                                <td><?php echo $quantity;?></td>
                                <td><?php echo $value;?></td>
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
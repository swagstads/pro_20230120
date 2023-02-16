<?php
//if (session_id() == '') {
    session_start();
//}
  //  echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
 //   echo "After";
 //   echo $_SESSION['usr'];
  //  echo "ABC";
if (!isset($_SESSION['usr'])) {
    header("Location: index.php");
    die();
}

if (isset($_SESSION['them'])) {
    $them = $_SESSION['them'] . ".php";
    include $them;
}
include 'db.php';

$user_count = mysqli_num_rows(mysqli_query($conn,"select * from user"));
$sales = mysqli_query($conn,"select SUM(amount) from payment");
while ($row = $sales->fetch_assoc()) {
    $sales_amt = $row['SUM(amount)'];
}
$sales_count = mysqli_num_rows(mysqli_query($conn,"select * from orders"));
$product_count = mysqli_num_rows(mysqli_query($conn,"select * from product"));

$order_result = mysqli_query($conn, "select * from orders join user on user.id = orders.user_id join product on product.id = orders.product_id ORDER BY order_date DESC;");
$order_no = 1;

$message_result = mysqli_query($conn, "select * from contact ORDER BY added_on DESC LIMIT 10;");
$message_no = 1;

?>

    <input type="hidden" id="page_name" value="dashboard">
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#"><?php echo $lang['dashboard']; ?></a>
                </li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-users"></i>
                            </div>
                            <div class="mr-5"><?php echo $user_count.' Users';?></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="users.php">
                            <span class="float-left"><?php echo $lang['view_details']; ?></span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-sack-dollar"></i>
                            </div>
                            <div class="mr-5"><?php echo 'Rs. '.$sales_amt; ?></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="orders.php">
                            <span class="float-left"><?php echo $lang['view_details']; ?></span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-cart-shopping"></i>
                            </div>
                            <div class="mr-5"><?php echo $sales_count.' Orders';?></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="orders.php">
                            <span class="float-left"><?php echo $lang['view_details']; ?></span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-dark o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-couch"></i>
                            </div>
                            <div class="mr-5"><?php echo $product_count.' Products'?></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="products.php">
                            <span class="float-left"><?php echo $lang['view_details']; ?></span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Orders
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered" id="news_dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                            <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Product</th>
                                <th>Customer</th>
                            </tr>
                            </thead>
                            <?php
                            while ($row = $order_result->fetch_assoc()) {
                                $id = $row['id'];
                                $product = $row['title'];
                                $user = $row['name'];
                                $pid = $row['product_id'];
                                $uid = $row['user_id'];
                                ?>
                                <tr>
                                    <td><?php echo $order_no; ?></td>
                                    <td><a href="product.php?eid=<?php echo $pid; ?>"><?php echo strlen($product) > 70 ? substr($product,0,70).'..' : $product; ?></a></td>
                                    <td><a href="user_status.php?eid=<?php echo $uid; ?>"><?php echo $user; ?></a></td>
                                </tr>

                                <?php
                                $order_no++;
                            }
                            ?>
                        </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Messages
                        </div>
                        <div class="card-body">
                             <div class="table-responsive">

                        <table class="table table-bordered" width="100%" cellspacing="0" style="font-size: 13px;">
                            <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Sender</th>
                                <th>Message</th>
                            </tr>
                            </thead>
                            <?php
                            while ($row = $message_result->fetch_assoc()) {
                                $id = $row['id'];
                                $name = $row['name'];
                                $message = $row['message'];
                                ?>
                                <tr>
                                    <td><?php echo $message_no; ?></td>
                                    <td><?php echo strlen($name) > 70 ? substr($name,0,70).'..' : $name; ?></td>
                                    <td><a href="message.php?eid=<?php echo $id; ?>"><?php echo strlen($message) > 70 ? substr($message,0,70).'..': $message; ?></a></td>
                                </tr>

                                <?php
                                $message_no++;
                            }
                            ?>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>


<?php
include 'footer.php';
?>

<script>
    $(document).ready(function() {
        var ctx = document.getElementById("myAreaChart");
        var date_arr=[];
        var appointment_count_arr=[];
        $.ajax({
            url: 'get_chart_data.php',
            dataType: 'json',
            success: function (cdata) {
                if(cdata.length>0) {
                    for (i = 0; i < cdata.length; i++) {
                        date_arr.push(cdata[i]['date_data']);
                        appointment_count_arr.push(cdata[i]['appointment_count']);
                    }
                }

                //console.log(date_arr);
                //console.log(appointment_count_arr);

                var myLineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: date_arr,
                        datasets: [{
                            label: "<?php echo $lang['appointments'];?>",
                            lineTension: 0.3,
                            backgroundColor: "rgba(2,117,216,0.2)",
                            borderColor: "rgba(2,117,216,1)",
                            pointRadius: 5,
                            pointBackgroundColor: "rgba(2,117,216,1)",
                            pointBorderColor: "rgba(255,255,255,0.8)",
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(2,117,216,1)",
                            pointHitRadius: 50,
                            pointBorderWidth: 2,
                            data: appointment_count_arr,
                        }],
                    },
                    options: {
                        legend: {
                            display: false
                        }
                    }
                });
            }
        });

    });
</script>
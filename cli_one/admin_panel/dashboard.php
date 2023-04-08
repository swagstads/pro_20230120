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

$user_count = mysqli_num_rows(mysqli_query($conn,"select * from users Where status <> 'deleted'"));
// $order_count = mysqli_num_rows(mysqli_query($conn,"select * from orders where status <> 'Delivered'"));
/*$sales = mysqli_query($conn,"select SUM(amount) from payment");
while ($row = $sales->fetch_assoc()) {
    $order_count = $row['SUM(amount)'];
}*/
$category_count = mysqli_num_rows(mysqli_query($conn,"select * from category where status = 'active'"));
$product_count = mysqli_num_rows(mysqli_query($conn,"select * from product Where status = 'active'"));

$coupon_result = mysqli_query($conn, "select coupon.id, coupon.name, coupon.added_on, coupon.discount_type, coupon.amount, coupon.code FROM coupon WHERE `status` = 'active' ORDER by coupon.added_on DESC;");
$coupon_no = 1;
$coupon_count = mysqli_num_rows($coupon_result);
$message_result = mysqli_query($conn, "select * from contact_us ORDER BY added_on DESC LIMIT 10;");
$message_no = 1;

?>

    <input type="hidden" id="page_name" value="dashboard">
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item" style="color: #007bff;">
                    <button class="btn btn-link btn-sm text-orange order-1 order-sm-0" id="sidebarToggle" href="#" style="color: #007bff;">
                        <i class="fas fa-bars"></i>
                    </button>
                    <?php echo $lang['dashboard']; ?>
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
                                <i class="fas fa-fw fa-ticket"></i>
                            </div>
                            <div class="mr-5"><?php echo $coupon_count.' Active Coupons'; ?></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="coupons.php">
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
                                <i class="fas fa-fw fa-chair"></i>
                            </div>
                            <div class="mr-5"><?php echo $category_count.' Active Catgeories';?></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="categories.php">
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
                            <div>    
                                <i class="fas fa-ticket"></i>
                                Coupons
                            </div>
                            <a href="coupons.php" style="color: #1f1f1f">
                            View All</a>
                        </div>                        
                        <div class="card-body-no-padding">
                            <div class="table-responsive">

                                <table class="table dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                            <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <?php
                            while ($row = $coupon_result->fetch_assoc()) {
                                $id = $row['id'];
                                $code = $row['code'];
                                $user = $row['name'];
                                $dtype = $row['discount_type'];
                                $amt = ($dtype=='percentage'?$row['amount'].'%':'Rs. '.$row['amount']);
                                $uid = $row['user_id'];
                                ?>
                                <tr>
                                    <td><?php echo $coupon_no; ?></td>
                                    <td><?php echo strlen($code) > 70 ? substr($code,0,70).'..' : $code; ?></td>
                                    <td><?php echo $user; ?></td>
                                    <td><?php echo $amt; ?></td>
                                </tr>

                                <?php
                                $coupon_no++;
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
                            <div>    
                                <i class="fas fa-envelope"></i>
                                Messages
                            </div>
                            <a href="messages.php" style="color: #1f1f1f">
                            View All</a>
                        </div>
                        <div class="card-body-no-padding">
                             <div class="table-responsive">

                        <table class="table dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
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
                                <tr class="clickable-row" data-href="message.php?eid=<?php echo $id; ?>">
                                    <td><?php echo $message_no; ?></td>
                                    <td><?php echo strlen($name) > 70 ? substr($name,0,70).'..' : $name; ?></td>
                                    <td><?php echo strlen($message) > 70 ? substr($message,0,70).'..': $message; ?></td>
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
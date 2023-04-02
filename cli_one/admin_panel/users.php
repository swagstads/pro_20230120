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

$result = mysqli_query($conn, "select * from `users`");
$no = 1;
?>

<input type="hidden" id="page_name" value="users">
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
              <li class="breadcrumb-item" style="color: #007bff;">
                    <button class="btn btn-link btn-sm text-orange order-1 order-sm-0" id="sidebarToggle" href="#" style="color: #007bff;">
                        <i class="fas fa-bars"></i>
                    </button>
                    <?php
                        echo $lang['app_users'];
                    ?>
                </a>
            </li>
        </ol>

        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered stripe hover" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                        <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Reset Passsword</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $phone = $row['phone'];
                            $address = $row['address'];
                            $status = $row['status'];
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td><?php echo $address; ?></td>
                                <td><a href="reset_password.php?uid=<?php echo $id; ?>" style="color:red;">Send Reset E-mail</a></td>
                                <td><a href="user_status.php?eid=<?php echo $id;?>" style="color: <?php if($status == 'active'){echo 'green';}elseif($status == 'dormant'){echo 'orange';}else{echo 'red';} ?>;"><?php echo $status; ?></a></td>
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
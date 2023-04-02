<?php
include 'db.php';

if (session_id() == '') {
    session_start();
}
if (!isset($_SESSION['usr'])) {
    header("Location: index.php");
    die();
} else {
    $id = $_SESSION['user_id'];
    $usr = $_SESSION['usr'];
    $role=$_SESSION['role'];
}

include 'language_setting.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <!--<meta charset="utf-8">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="apple-touch-icon" sizes="57x57" href="icons/Icon-192.png">
    <link rel="apple-touch-icon" sizes="60x60" href="icons/Icon-192.png">
    <link rel="apple-touch-icon" sizes="72x72" href="icons/Icon-192.png">
    <link rel="apple-touch-icon" sizes="76x76" href="icons/Icon-192.png">
    <link rel="apple-touch-icon" sizes="114x114" href="icons/Icon-192.png">
    <link rel="apple-touch-icon" sizes="120x120" href="icons/Icon-192.png">
    <link rel="apple-touch-icon" sizes="144x144" href="icons/Icon-192.png">
    <link rel="apple-touch-icon" sizes="152x152" href="icons/Icon-192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="icons/Icon-192.png">
    <link rel="apple-touch-icon" href="icons/Icon-192.png">
    <link rel="icon" type="image/png" sizes="192x192" href="icons/Icon-192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/Icon-192.png">
    <link rel="icon" type="image/png" sizes="96x96" href="icons/Icon-192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icons/Icon-192.png">
    <link rel="icon" type="image/pg" href="favicon/png"/>
    <meta name="msapplication-TileColor" content="#6200EA">
    <meta name="msapplication-TileImage" content="icons/Icon-192.png">

    <title><?php echo $lang['app_name']; ?></title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin.css" rel="stylesheet">

    <!--  select2  -->
    <link rel="stylesheet" href="./vendor/select2/css/select2.min.css">

    <!-- FancyBox  -->
    <link rel="stylesheet" href="./vendor/fancybox/jquery.fancybox.min.css">

    <!-- DateTimePicker  -->
    <link rel="stylesheet" type="text/css" href="./vendor/datetimepicker/css/bootstrap-datetimepicker.min.css"/>

    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
</head>

<body id="page-top">

<div id="snackbar"><span id="msg_text"></span></div>

<nav class="navbar navbar-expand static-top" style="background-color: #1f1f1f; display: none;">

    <a class="navbar-brand mr-1" href="dashboard.php" style="color: #007bff;"><?php echo $lang['app_name']; ?></a>

    

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" style="display: none;">
        <div class="input-group" style="display: none;">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0" style="display: none;">
    
        <li class="nav-item dropdown no-arrow mx-1" >
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger">9+</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1" style="display: none;">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw" style="color: #007bff;"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" style="display: none;">Settings</a>
                <a class="dropdown-item" href="#" style="display: none;">Activity Log</a>
                <div class="dropdown-divider" style="display: none;"></div>
                <a class="dropdown-item" href="change_password.php"><?php echo $lang['change_password'];?></a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><?php echo $lang['logout'];?></a>
            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav" style="color: #007bff;">
        <li class="nav-item" id="dashboard">
            <a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-gauge"></i>
                <span><?php echo $lang['dashboard']; ?></span>
            </a>
        </li>
        <li class="nav-item" id="products">
            <a class="nav-link" href="products.php">
                <i class="fas fa-fw fa-couch"></i>
                <span>Products</span>
            </a>
        </li>
        <?php
        if($_SESSION['role']=='Admin'){
        ?>
        <li class="nav-item" id="users">
            <a class="nav-link" href="users.php">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span>
            </a>
        </li>
        <li class="nav-item" id="categories">
            <a class="nav-link" href="categories.php">
                <i class="fas fa-fw fa-chair"></i>
                <span>Categories</span>
            </a>
        </li>
        <li class="nav-item" id="coupons">
            <a class="nav-link" href="coupons.php">
                <i class="fas fa-fw fa-ticket"></i>
                <span>Coupons</span>
            </a>
        </li>
        <li class="nav-item" id="payments">
            <a class="nav-link" href="payments.php">
                <i class="fas fa-fw fa-money-bill-transfer"></i>
                <span>Payments</span>
            </a>
        </li>
        <li class="nav-item" id="orders">
            <a class="nav-link" href="orders.php">
                <i class="fas fa-fw fa-truck"></i>
                <span>Orders</span>
            </a>
        </li>
        <li class="nav-item" id="carts">
            <a class="nav-link" href="carts.php">
                <i class="fas fa-fw fa-cart-shopping"></i>
                <span>Carts</span>
            </a>
        </li>
        <li class="nav-item" id="contact">
            <a class="nav-link" href="messages.php">
                <i class="fas fa-fw fa-message"></i>
                <span>Messages</span>
            </a>
        </li>
        <!--
        <li class="nav-item" id="market">
            <a class="nav-link" href="market_list.php">
                <i class="fas fa-fw fa-shop"></i>
                <span>Marketplace Listings</span>
            </a>
        </li>
        <li class="nav-item" id="ads">
            <a class="nav-link" href="players.php">
                <i class="fas fa-fw fa-id-card-clip"></i>
                <span>Players</span>
            </a>
        </li>
        <li class="nav-item" id="teams">
            <a class="nav-link" href="teams.php">
                <i class="fas fa-fw fa-people-group"></i>
                <span>Teams</span>
            </a>
        </li><li class="nav-item" id="matches">
            <a class="nav-link" href="matches.php">
                <i class="fas fa-fw fa-hand-back-fist"></i>
                <span>Matches</span>
            </a>
        </li>
        <li class="nav-item" id="tournaments">
            <a class="nav-link" href="tournaments.php">
                <i class="fas fa-fw fa-award"></i>
                <span>Tournaments</span>
            </a>
        </li>
        <li class="nav-item" id="ecosystem">
            <a class="nav-link" href="ecosystem.php">
                <i class="fas fa-fw fa-group-arrows-rotate"></i>
                <span>Ecosystem</span>
            </a>
        </li>
        -->
        
        <li class="nav-item" id="cms_users">
            <a class="nav-link" href="cms_users.php">
                <i class="fas fa-fw fa-user-circle"></i>
                <span><?php echo $lang['cms_users']; ?></span>
            </a>
        </li>
        <!--<li class="nav-item" id="analytics">
            <a class="nav-link" href="analytics.php">
                <i class="fas fa-fw fa-chart-pie"></i>
                <span><?php echo $lang['analytics']; ?></span>
            </a>
        </li>
        <li class="nav-item" id="push">
            <a class="nav-link" href="push_data.php">
                <i class="fas fa-fw fa-paper-plane"></i>
                <span><?php echo $lang['push_data']; ?></span>
            </a>
        </li>-->
        <?php
        }
        ?>
        <?php
        if($_SESSION['usr']=='garv@atoz.in'){
        ?>
        <li class="nav-item" id="debug">
            <a class="nav-link" href="test.php">
                <i class="fas fa-fw fa-cogs"></i>
                <span>Debug</span>
            </a>
        </li>
        <?php
        }
        ?>
        <li class="nav-item" id="change_password">
            <a class="nav-link" href="change_password.php">
                <i class="fas fa-fw fa-key"></i>
                <span>Change Password</span>
            </a>
        </li>
        <li class="nav-item" id="products">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal" >
                <i class="fas fa-fw fa-door-open"></i>
                <span>Log Out</span>
            </a>
        </li>
    </ul>

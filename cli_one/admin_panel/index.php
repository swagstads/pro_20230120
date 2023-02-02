<?php include "language_setting.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
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

        <title><?php echo $lang['app_name'];?></title>

        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">

    </head>
    <body class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header"><?php echo $lang['fortin_salon_login'];?></div>
            <div class="card-body">
                <?php
                if(isset($_GET['login']) && $_GET['login']=='failed'){
                    echo '<label class="control-label alert alert-danger" style="width: 100%;">'.$lang['invalid_login'].'</label>';
                }
                ?>
                <form role="form" action="checklogin.php" method="post">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="<?php echo $lang['email'];?>" required="required" autofocus="autofocus">
                            <label for="inputEmail"><?php echo $lang['email'];?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="<?php echo $lang['password'];?>" required="required">
                            <label for="inputPassword"><?php echo $lang['password'];?></label>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block" type="submit"><?php echo $lang['login'];?></button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    </body>

</html>

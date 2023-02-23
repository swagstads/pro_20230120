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
include_once 'GCM.php';

?>

<input type="hidden" id="page_name" value="debug">
<?php
if($_SESSION['usr']=='garv@atoz.com'){
?>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
              <li class="breadcrumb-item" style="color: #007bff;">
                    <?php
                    echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
                    ?>
                </a>
            </li>
        </ol>
    </div>
</div>
        
        <?php
}
else{
?>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
              <li class="breadcrumb-item" style="color: #007bff;">
                    Unauthorised Account
                </a>
            </li>
        </ol>
    </div>
<?php
}
?>
</div>


<?php
include 'footer.php';
?>
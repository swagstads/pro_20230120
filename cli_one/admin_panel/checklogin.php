<?php

ob_start();
include 'db.php';
$email = '';
$password = '';
if (isset($_REQUEST['email'])):
    if (!empty($_REQUEST['email'])):
        $email= htmlspecialchars($_POST['email']);
    else:
        header("Location: index.php?login=failed");
    //die();
    endif;
else:
    header("Location: index.php?login=failed");
// die();
endif;

if (isset($_REQUEST['password'])):
    if (!empty($_REQUEST['password'])):
        $password = md5(htmlspecialchars($_POST['password']));

    else:
        header("Location: index.php?login=failed");
    // die();
    endif;
else:
    header("Location: index.php?login=failed");
//die();
endif;


$db_uname = '';
$db_pwd = '';
$db_role = '';


$result = mysqli_query($conn, "SELECT * FROM tbl_admin where email='$email' and password='$password'");
if(mysqli_num_rows($result)){
    $row = mysqli_fetch_row($result);

    $user_id = $row[0];
    $db_uname = $row[1];
    $db_pwd = $row[2];
    $user = $row[3];
    $db_role = $row[4];

    if ($db_uname == $email){
        if ($db_pwd == $password){
            session_start();
            $_SESSION['user_name']=$user;
            $_SESSION['usr'] = $db_uname;
            $_SESSION['role']=$db_role;
            $_SESSION['user_id']=$user_id;

            $_SESSION['them'] = "adminthem";
            if (strtolower($db_role) != "Delete") {
                header("Location:dashboard.php?login=success");
            } else{
                header("Location:index.php?login=failed");
            }


        }else{
            header("Location: index.php?login=failed");
        }
    }
    else {

        header("Location: index.php?login=failed");

        /*$result = mysqli_query($conn, "SELECT * FROM doctor where email='$username' and password='$userpwd'");
        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_row($result);

            session_start();
            $_SESSION['usr'] = $row[1];
            $_SESSION['role'] = 'doctor';
            $_SESSION['doctor_id']=$row[0];
            $_SESSION['them'] = "doctor_them";
            header("Location:doc_dashboard.php?login=success");
        } else {
            header("Location: index.php?login=failed");

        }*/
    }
}else{
    header("Location: index.php?login=failed");
}

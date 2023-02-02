<?php
session_start();
include('config.php');
if (isset($_POST['user_login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT email,password,role,id FROM users WHERE email=:email and password=:password";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  

  if ($query->rowCount() > 0) {
    foreach ($results as $result) {
            echo "Logged In successfully, Redirecting to homepage";
            $_SESSION['username'] = $_POST['email'];
            $_SESSION['user_id'] = $result->id;
        }
      echo "<script type='text/javascript'>document.location = '/'</script>";
  } else {
    echo "<script>alert('Invalid Details');</script>";
    echo "<script type='text/javascript'>document.location = '../logg_in.php';</script>";
  }



  // if ($query->rowCount() > 0) {
  //   foreach ($results as $result) {
  //     $status = $result->Status;
  //     $_SESSION['eid'] = $result->id;
  //   }
  //   if ($status == 0) {
  //     $msg = "Your account is Inactive. Please contact admin";
  //   } else {
  //     $_SESSION['emplogin'] = $_POST['name'];
  //     echo "<script type='text/javascript'>
  //       document.location = '../myprofile.php';
  //     </script>";
  //   }
  // } else {
  //   echo "<script>
  // alert('Invalid Details');
  // </script>";
  //   echo "<script type='text/javascript'>
  // document.location = '../logg_in.php';
  // </script>";
  // }
}
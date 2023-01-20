<?php
session_start();
include('config.php');
if (isset($_POST['user_login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT EmailId,Password,Status,id FROM members WHERE EmailId=:email and Password=:password";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    $_SESSION['alogin'] = $_POST['username'];
    echo "<script type='text/javascript'>document.location = '../myprofile.php'</script>";
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
  // document.location = '../myprofile.php';
  // </script>";
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
<?php
session_start();
error_reporting(0);
include('config.php');
// if (strlen($_SESSION['alogin']) == 0) {
//     echo 'hello';
//     // header('location:index.php');
// } else {
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = 1;
    $sql = "INSERT INTO members(Name,Contact,EmailId,Password,Status) VALUES(:name,:contact,:email,:password,:status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':contact', $contact, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        echo '<script>alert("Thank you for Joining us")</script>';
        echo '<script>document.location = "../logg_in.php"</script>';
    } else {
        echo "Something went wrong. Please try again";
    }
}
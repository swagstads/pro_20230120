<?php
session_start();

// error_reporting(0);
include('config.php');
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $timestamp = date("Y-m-d H:i:s");
    $sql = "INSERT INTO users (name, email, password, phone, address, role, added_on, modified_on, status) 
                        VALUES(:name,:email,:password,:contact,'address','customer',:timestamp,:timestamp,'dormant')";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':contact', $contact, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':timestamp', $timestamp, PDO::PARAM_STR);
    $query->execute();
    
    $_SESSION['username'] = $_POST['email'];
 

    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        echo '<script>alert("Thank you for Joining us")</script>';
        echo '<script>document.location = "/"</script>';
    } else {
        echo "Something went wrong. Please try again";
    }
}
?>
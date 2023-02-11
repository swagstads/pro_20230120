<?php

session_start();

require('config.php');

$data = array();
$response["response"] = array();

$data['alert_message'] = "";
$data['success_message'] = "";

$timestamp = date("Y-m-d H:i:s");

if (isset($_POST['contactus_form'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $sql = "INSERT INTO Contact_us (name, email, subject, message, added_on) VALUES (:name, :email, :subject, :message, :timestamp)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':name', $name, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':subject', $subject, PDO::PARAM_STR);
  $query->bindParam(':message', $message, PDO::PARAM_STR);
  $query->bindParam(':timestamp', $timestamp, PDO::PARAM_STR);
  $query->execute();
  
//   $result = $query->fetch(PDO::FETCH_OBJ);



array_push($response["response"], $data);
echo json_encode($response);

}

?>
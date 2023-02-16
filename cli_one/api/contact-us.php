<?php

session_start();

require('config.php');

$data = array();
$response["response"] = array();

$data['alert_message'] = "";
$data['success_message'] = "";

$timestamp = date("Y-m-d H:i:s");

function send_mail($name, $user_email, $user_subject, $user_message){
  $url_host = $_SERVER['HTTP_HOST'];
  // php mailer code -start
  require ('./phpmailer/PHPMailerAutoload.php');
  $mail= new PHPMailer;
  $mail->isSMTP();
  $mail->Host='smtp.gmail.com';
  $mail->Port=587;
  $mail->SMTPAuth=true;
  $mail->SMTPSecure='tls';
  $message='<h2>Hello Rishabh,</h2><br>
            <h3>We have a new feedback from '.$name.'</h3><br>
            <h3>User details:<br>Email:'.$user_email.'<br>Subject:'.$user_subject.'<br>Message:'.$user_message.'<br></h3><br>
            <h3>Thank You!</h3>';
  $mail->Username='rishabhpnahar@gmail.com';
  $mail->Password= 'crigdqwxmxunttbz' ;
  $mail->setFrom('team@atoz.com');
  $mail->addAddress("rishabhnahar33@gmail.com");
  $mail->Subject="Feedback from AToZ user"; 
  $mail->MsgHTML($message);

  //$mail->Body=
  if(!$mail->send()){
      $data['mail'] = "MailNotSent"; //mail not sent 
  }
  else{
      $data['mail'] = "-MailSent"; //mail sent 
  }
  // php mailer code - end

}

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
  if($query->execute()){
    send_mail( $name,  $email,  $subject,  $message);
  }




//   $result = $query->fetch(PDO::FETCH_OBJ);



array_push($response["response"], $data);
echo json_encode($response);

}

?>
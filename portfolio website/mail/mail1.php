<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	echo "<script>alert('Working')</script>";
	send_mail($name,$email,$subject,$message);
	return "Working"
}
function send_mail($name,$to_email,$subject,$message)
{
	require ('PHPMailerAutoload.php');

		$from_email = "rishabhnahar33@gmail.com";
		$mail= new PHPMailer();

		$mail->isSMTP();
		$mail->Host='smtp.gmail.com';
		$mail->Port=587;
		$mail->SMTPAuth=true;
		$mail->SMTPSecure='tls';
		$base_url = $_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']);
		$after_messsage = "Name: ".$name."<br>from: ".$to_email."<br>Message: ".$message;
		$mail->Username=$from_email;
		$mail->Password='uzuybbyuvbakquqg';
		$mail->setFrom($from_email);
		$mail->addAddress($to_email);
		$mail->addReplyTo($from_email); 
		// $mail->isHTML(true);
		$mail->$subject ;
		$mail->MsgHTML($after_messsage);
		//$mail->Body=

		if(!$mail->send()){
			return "MailNotSent";
			//   echo "MailNotSent"; //mail not sent 
		}
		else{
			return "MailSent";
			// echo "MailSent"; //mail sent 
			
		}
}
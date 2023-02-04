<?php
function send_mail($email)
{

		require ('PHPMailerAutoload.php');
		$mail= new PHPMailer;

		$mail->isSMTP();
		$mail->Host='smtp.gmail.com';
		$mail->Port=587;
		$mail->SMTPAuth=true;
		$mail->SMTPSecure='tls';
		$message='Hello <br> Welcome to Atoz <br> Kindly Verify your Email ID to activate your account <br> click on the link below to verify account<br> <a href="  https://atozgroup.com/new_password.php?tGQhkey$yt56='.$email.'">Verification Link</a>';
		$mail->Username='malavshah166@gmail.com';
		$mail->Password='ub';
		$mail->setFrom('malavshah166@gmail.com');
		$mail->addAddress($email);
		$mail->addReplyTo('malavshah166@gmail.com'); 
		// $mail->isHTML(true);
		$mail->Subject="E-Mail Verification for Atoz"; 
		$mail->MsgHTML($message);
		//$mail->Body=

		if(!$mail->send()){
			return "MailNotSent"; //mail not sent 
		}
		else{
			return "MailSent"; //mail sent 
		}
}

?>
<?php
include 'db.php';
if(isset($_GET['uid'])){
    $id = $_GET['uid'];
    $query ="select * from users where id='$id';";
    $user_result =  mysqli_query($conn,$query);
    if (mysqli_num_rows($user_result) > 0) {
        $users = $user_result->fetch_assoc();
    }
}else{
    header("Location: users.php");
    die();
}

$name = $users['name'];
$email = $users['email'];
$time = date("Y-m-d H:i:s", time());
$token = md5($name.$time);
$query = mysqli_query($conn, "INSERT INTO `password_reset`(`user_id`, `time`, `token`) VALUES ('$id','$time','$token');");
send_mail($email, $token);



function send_mail($email, $token)
{
		require ('phpmailer/PHPMailerAutoload.php');
		$mail= new PHPMailer;

		$mail->isSMTP();
		$mail->Host='smtp.gmail.com';
		$mail->Port=587;
		$mail->SMTPAuth=true;
		$mail->SMTPSecure='tls';
		$message='Hello <br> Kindly use the link below to reset your account password <br> <a href="  https://atozgroup.com/new_password.php?tGQhkey$yt56='.$token.'">Password Reset Link</a>';
		$mail->Username='malavshah166@gmail.com';
		$mail->Password='ub';
		$mail->setFrom('malavshah166@gmail.com');
		$mail->addAddress($email);
		$mail->addReplyTo('malavshah166@gmail.com'); 
		// $mail->isHTML(true);
		$mail->Subject="Password Reset for Atoz"; 
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
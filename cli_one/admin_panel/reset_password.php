<?php
include 'db.php';
if(isset($_GET['uid'])){
    $id = $_GET['uid'];
    $query ="select * from user where id='$id';";
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



 
$to = $email;
$subject = "Password Reset Request";
$message = "
<html>
<head>
<title>Password Reset Request</title>
</head>
<body>
<p>Hi there,</p>
<p>A password reset request has been made for your account. If you did not make this request, you can safely ignore this email.</p>
<p>To reset your password, please click the link below:</p>
<p><a href='http://atoz.garvjhangiani.com/user_change_password.php?token=" . $token . "'>http://atoz.com/user_change_password.php?token=" . $token . "</a></p>
<p>Best regards,</p>
<p>The Support Team</p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
//$from = 'From: yoursite.com'; "\r\n";
$headers .= 'From: noreply@atoz.com' . "\r\n";

if(mail($to, $subject, $message, $headers)){
    //echo "An email has been sent to your email address with instructions on how to reset your password.";
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}
else{
    echo("Error sending Mail");
}


// Show a success message




?>
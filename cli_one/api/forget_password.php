<?php

session_start();
// error_reporting(0);
require('config.php');

$data = array();
$response["response"] = array();


    if(isset($_POST['username'])){
        $email = $_POST['username'];
        echo $email;
        // Check if mail exist
        $sql = "SELECT id,email,phone,password FROM users WHERE email=:email OR phone=:email";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        if($query->execute()){
            
            $result = $query->fetch(PDO::FETCH_OBJ);
            echo "User exist<br>";
            $verification_code = bin2hex(openssl_random_pseudo_bytes(20));

            // insert into forget_password table
            $sql = "INSERT INTO forget_password (user_id,old,verification_code) 
                    VALUES(:user_id, :old_pass, :verification_code)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':user_id', $result->id, PDO::PARAM_STR);
            $query->bindParam(':old_pass', $result->password, PDO::PARAM_STR);
            $query->bindParam(':verification_code', $verification_code, PDO::PARAM_STR);

            if($query->execute()){
                echo "forget password db inserted"; 
                forget_password_mailer($result->email , $verification_code);
            }

        }
        else{
           echo "Not a valid user"; 
        }
    }
    else{
        echo "please provide valid email address";
    }





function forget_password_mailer($email,$verification_code){
    echo "Sending mail";
    $url_host = $_SERVER['HTTP_HOST'];

    // php mailer code -start
    require ('./phpmailer/PHPMailerAutoload.php');
    $mail= new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';

    $template_variables = array(
        "host" => $url_host,
        "code" => $verification_code,
        "mail" => $email
    );

    $template = file_get_contents('../mail-template/forget_password.html');

    foreach ($template_variables as $key => $value) {
        $template = str_replace("{{".$key."}}", $value, $template);
    }
    $message =  "Forget password verification<br><a href='".$verification_code."'>Change password</a>";

    $mail->Username='rishabhpnahar@gmail.com';
    $mail->Password= 'crigdqwxmxunttbz' ;
    $mail->setFrom('team@atoz.com');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject="E-Mail Verification for Atoz"; 

    $mail->isHTML(true);
    $mail->Subject="E-Mail Verification for Atoz"; 
    // $mail->MsgHTML($message);
    $mail->Body=$template;

    if(!$mail->send()){
        echo "<br>Mail not sent";
        return "-MailNotSent"; //mail not sent 
    }
    else{
        echo "<br>Mail sent";
        return "-MailSent"; //mail sent 
    }
}


function mail_verification_link($email,$verification_code,$user_id){
    // echo $email."-".$verification_code;
    $url_host = $_SERVER['HTTP_HOST'];

    // php mailer code -start
    require ('./phpmailer/PHPMailerAutoload.php');
    $mail= new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';




    $message='Hello <br> 
                Welcome to Atoz <br> 
                Kindly Verify your Email ID to activate your account <br> 
                click on the link below to verify account<br> 
                <a href="http://'.$url_host.'/verify_user.php?code='.$verification_code.'&uid='.$uid.'&mail='.$email.' ">Verification Link</a>';

    $mail->Username='rishabhpnahar@gmail.com';
    $mail->Password= 'crigdqwxmxunttbz' ;
    $mail->setFrom('team@atoz.com');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject="E-Mail Verification for Atoz"; 
    $mail->MsgHTML($message);

    if(!$mail->send()){
        return "-MailNotSent"; //mail not sent 
    }
    else{
        return "-MailSent"; //mail sent 
    }
    // php mailer code - end

}

array_push($response["response"], $data);

echo json_encode($response);


?>
<?php

session_start();
// error_reporting(0);
require('config.php');

$data = array();
$response["response"] = array();

$data['alert_message'] = "";
$data['success_message'] = "";

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password,PASSWORD_BCRYPT);
    $timestamp = date("Y-m-d H:i:s");

    // Check if mail exist
    $sql = "SELECT email,phone FROM users WHERE email=:email OR phone=:contact";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':contact', $contact, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    if(isset($result->email)){
        if( $email === $result->email ){
            $data['status'] = "fail";
            $data['alert_message'] = "Email already exist";
        }
        else if($contact === $result->phone){
             $data['status'] = "fail";
             $data['alert_message'] = "Contact/Phone already exist";
         }
         else{
            $data['status'] = "fail";
            $data['alert_message'] = "Something went wrong, try again later";
         }
    }
    else{

        // Insert if new user
        $sql = "INSERT INTO users (name, email, password, phone, role, added_on, modified_on, status) 
                            VALUES(:name,:email,:password,:contact,'customer',:timestamp,:timestamp,'dormant')";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':contact', $contact, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        $query->bindParam(':timestamp', $timestamp, PDO::PARAM_STR);
        $query->execute();
        
    
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
    
            $verification_code = bin2hex(openssl_random_pseudo_bytes(20));
            try {
                $sql = "INSERT INTO user_verification (user_id, verify, verification_code) VALUES ('$lastInsertId', 0, '$verification_code')";
                $query = $dbh->prepare($sql);
                $query->execute();
                mail_verification_link($email,$verification_code,$lastInsertId);
                // echo '<script>alert("inserted verification code")</script>';
            } catch (\Throwable $th) {
                // echo 'Error: '.$th;
                // echo '<script>alert("Something went wrong, try again laters")</script>';
                $data['status'] = "fail";
                $data['alert_message'] = "Something went wrong, try again laters";
        }
            // echo '<script>alert("Verification link has been sent to your registered mail address")</script>';
            // echo '<script>document.location = "/"</script>';
            $data['status'] = "ok";
            $data['success_message'] = "Verification Link has been sent to your registered mail address";
            
        } else {
            // echo "Something went wrong. Please try again";
        }   
        
        

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


    $template_variables = array(
        "host" => $url_host,
        "code" => $verification_code,
        "uid" => $user_id,
        "mail" => $email
    );

    $template = file_get_contents('../mail-template/reglink.html');


    foreach ($template_variables as $key => $value) {
        $template = str_replace("{{".$key."}}", $value, $template);
    }

    $image_data = file_get_contents("../assets/images/logo1.jpg");
    $image_cid = $mail->addStringEmbeddedImage($image_data, 'logo', 'Example Image', 'base64');

    $html = str_replace('cid:logo', 'cid:' . $image_cid, $template);

    // $template = str_replace('{verification_link}', $verification_code, $template);


    // $message='Hello <br> 
    //             Welcome to Atoz <br> 
    //             Kindly Verify your Email ID to activate your account <br> 
    //             click on the link below to verify account<br> 
    //             <a href="http://'.$url_host.'/verify_user.php?code='.$verification_code.'&uid='.$uid.'&mail='.$email.' ">Verification Link</a>';

    $mail->Username='rishabhpnahar@gmail.com';
    $mail->Password= 'crigdqwxmxunttbz' ;
    $mail->setFrom('team@atoz.com');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject="E-Mail Verification for Atoz"; 
    // $mail->MsgHTML($message);
    $mail->Body=$template;

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
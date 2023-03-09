<?php

session_start();
// error_reporting(0);
require('config.php');

$data = array();
$response["response"] = array();


    if(isset($_POST['username'])){
        $email = $_POST['username'];
        // Check if mail exist
        $sql = "SELECT id,email,phone,password FROM users WHERE email=:email";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        if($query->execute()){
            
            $result = $query->fetch(PDO::FETCH_OBJ);
            if($result !== false){
                    echo $email;
                    $verification_code = bin2hex(openssl_random_pseudo_bytes(20));
                    // insert into forget_password table
                    $sql = "INSERT INTO forget_password (user_id,old,verification_code) 
                            VALUES(:user_id, :old_pass, :verification_code)";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':user_id', $result->id, PDO::PARAM_STR);
                    $query->bindParam(':old_pass', $result->password, PDO::PARAM_STR);
                    $query->bindParam(':verification_code', $verification_code, PDO::PARAM_STR);
        
                    if($query->execute()){
                        forget_password_mailer($result->email , $verification_code);
                    }
                }
                else{
                    echo "Not a valid user"; 
                    echo '<script>document.location = "../forget_password.php?alert=Email is not valid"</script>';
                }
            }
        else{
            echo "Not a valid user"; 
            echo '<script>document.location = "../forget_password.php?alert=Email is not valid"</script>';
        }
    }
    else{
        echo '<script>document.location = "../forget_password.php?alert=Email is not registered"</script>';
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
    $image_data = file_get_contents("../assets/images/logo1.jpg");
    $image_cid = $mail->addStringEmbeddedImage($image_data, 'logo', 'Example Image', 'base64');

    $html = str_replace('cid:logo', 'cid:' . $image_cid, $template);

    // $message =  "Forget password verification<br><a href='".$verification_code."'>Change password</a>";

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
        echo '<script>document.location = "../forget_password.php?alert=Something went wrong"</script>';
        return "-MailNotSent"; //mail not sent 
    }
    else{
        echo '<script>document.location = "../forget_password.php?success=Link has been sent to your mail address"</script>';
        echo "<br>Mail sent";
        return "-MailSent"; //mail sent 
    }
}
?>
<?php
    function send_mail_verify($email)
    {
    
            require ('PHPMailerAutoload.php');
            $mail= new PHPMailer;
    
            $mail->isSMTP();
            $mail->Host='smtp.hostinger.in';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';
            $en_email=base64_encode($email);
            $message='Hello <br> Welcome to Manatarang, <br>Kindly Verify your Email ID to activate your account <br> click on the link below to verify account<br> <a href="https://hamiters.com/Hamiters/manatarang/app_api/verify_user.php?link=qweajdh.co.in&email='.$en_email.'">Verification Link</a>';
            $mail->Username='office@hamiters.com';
            $mail->Password='Office@2021';
            $mail->setFrom('office@hamiters.com');
            $mail->addAddress($email);
            $mail->addReplyTo($email); 
            // $mail->isHTML(true);
            $mail->Subject="E-Mail Verification for Manatarang"; 
            $mail->MsgHTML($message);
            
            // return 'a'.$mail->send().'b';
            //$mail->Body=
    
            if($mail->send()){
                return "MailSent";
                
                //   echo "MailNotSent"; //mail not sent 
            }
            else{
                return "MailNotSent";
                // echo "MailSent"; //mail sent 
                
            }
                 
    
    }

    // echo send_mail_verify('1997aish@gmail.com');

    function forgot_pwd_email($email)
    {
    
            require ('PHPMailerAutoload.php');
            $mail= new PHPMailer;
    
            $mail->isSMTP();
            $mail->Host='smtp.hostinger.in';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';
            $en_email=base64_encode($email);
            $message='Hello <br> Welcome to Manatarang, <br>Kindly click on the link below to reset your password<br> <a href="https://hamiters.com/Hamiters/manatarang/app_api/reset_password.php?link=qweajdh.co.in&email='.$en_email.'">Reset Password</a>';
            $mail->Username='office@hamiters.com';
            $mail->Password='Office@2021';
            $mail->setFrom('office@hamiters.com');
            $mail->addAddress($email);
            $mail->addReplyTo($email); 
            // $mail->isHTML(true);
            $mail->Subject="Password reset link for Manatarang"; 
            $mail->MsgHTML($message);
            return 'a'.$mail->send().'b';
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

    function thankyou_order($email){
        require ('PHPMailerAutoload.php');
            $mail= new PHPMailer;
    
            $mail->isSMTP();
            $mail->Host='smtp.hostinger.in';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';
            $en_email=base64_encode($email);
            $message='Hello, <br> Your order has been placed successfully.<br> Thank you for ordering';
            $mail->Username='office@hamiters.com';
            $mail->Password='Office@2021';
            $mail->setFrom('office@hamiters.com');
            $mail->addAddress($email);
            $mail->addReplyTo($email); 
            // $mail->isHTML(true);
            $mail->Subject="Password reset link for Manatarang"; 
            $mail->MsgHTML($message);
            return 'a'.$mail->send().'b';
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

    function gift_email($email){
        require ('PHPMailerAutoload.php');
            $mail= new PHPMailer;
    
            $mail->isSMTP();
            $mail->Host='smtp.hostinger.in';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';
            // $en_email=base64_encode($email);
            $message='Hello, you have received gifts from this user on Manatarang.<br>To redeem the gifts, please install the Manatarang app';
            $mail->Username='office@hamiters.com';
            $mail->Password='Office@2021';
            $mail->setFrom('office@hamiters.com');
            $mail->addAddress($email);
            $mail->addReplyTo($email); 
            // $mail->isHTML(true);
            $mail->Subject="Password reset link for Manatarang"; 
            $mail->MsgHTML($message);
            return 'a'.$mail->send().'b';
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
?>
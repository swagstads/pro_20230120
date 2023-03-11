<?php 
    require('../connection.php');
    require('mail1.php');
    $db_con = getDB();
    
    if(isset($_POST['forgot_pw']) && $_POST['forgot_pw'] == "nefertari@forgot_pw")
    {
    	$email = $_POST['email'];
    	send_mail($email);
        header('Location:../login.php?email_status=ResetMailSent');        
    }
    else
    {
    	header('Location:../login.php?email_status=MailNotSent');
    }
    

	

?>
<?php 
    require('../connection.php');
    require('mail1.php');
    $db_con = getDB();
    require '../twilio-php-master/src/Twilio/autoload.php';
    use Twilio\Rest\Client;
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $response["response"] = array();
        $data = array();
    // print_r($_POST);
    if(isset($_POST['forgot_pw']) && $_POST['forgot_pw'] == "nefertari@forgot_pw")
    {
        if(isset($_POST['email']) && !empty($_POST['email']) ){
            $email = $_POST['email'];
            $stm= $db_con->prepare("SELECT * FROM `customer_details` WHERE email = :email  and status = 'A'");
            $stm->bindParam(":email", $email ,PDO::PARAM_STR);  
            $stm->execute();
            // $stm->debugDumpParams();       
            $count = $stm->rowCount();       
            if($count > 0){ 
                send_fp($email);
                echo "mail_sent";
                // header('Location:../login.php?email_status=ResetMailSent');
            }
            else{
                echo "mail_not_sent";
                // header('Location:../forgot_pw.php?email_status=EmailNotFound');
            }
  
        }            
        elseif(isset($_POST['contact']) && !empty($_POST['contact']) ){
            date_default_timezone_set('Asia/Kolkata');
            $date=date("d-m-y");
            $time=date("h-i-s");
            $code=date("dmshiyd");
            
            $contact = $_POST['contact'];
            $stm= $db_con->prepare("SELECT * FROM `customer_details` WHERE country_code = :contact  and status = 'A'");
            $stm->bindParam(":contact", $contact ,PDO::PARAM_STR);  
            $stm->execute();
            // $stm->debugDumpParams();
            
            $count = $stm->rowCount();       
            if($count > 0){ 
                $fetched_array = $stm->fetchAll(PDO::FETCH_ASSOC); 
                $email = $fetched_array[0]['email'];
                $msg = 'Your request for changing password has been received.  Click on the link below to change account password http://hamiters.com/Hamiters/Nefertari/reset_pw.php?link=qweajdh.co.in&due_date='.$date.'&code='.$code.'&email='.$email.'&time='.$time;
                send_msg($msg , $contact);
                // header('Location:../login.php?email_status=ResetMailSent');
                echo 'msg_sent';
            }
            else{
                // header('Location:../forgot_pw.php?email_status=EmailNotFound');
                echo 'msg_not_sent';
            }           
        } 
        

    }
    else
    {
    	header('Location:../login.php?email_status=MailNotSent');
    }


    function send_msg($msg ,$contact)
    { 
        $contact='+'.$contact;
        $message = $msg;
        $response["response"] = array();
        $data = array();

        $auth_token = "0f7211045f691703126e740cca1696fa";
        $account_sid = 'ACe96a8290235f7e84cb77d07e6a53598e';
        $twilio_number = '+17863210804'; // Twilio number you own
        $client = new Client($account_sid, $auth_token);
        // Below, substitute your cell phone
        $msg=$client->messages->create(
            $contact, 
            [
                'from' => $twilio_number,
                'body' => $message,
                
            ] 
        );
        
        // if($msg->status != "undelivered" && $msg->status != 'failed')
        // {
        //     $data["reason"]=$msg->status; 
        //     $data["status"]="success";   
        //     array_push($response["response"], $data);
        // }else{

        //     $data["reason"]=$msg->status; 
        //     $data["status"]="failed";   
        //     array_push($response["response"], $data);
        // }   
        // echo json_encode($response);
    }
    

	

?>
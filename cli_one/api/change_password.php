<?php
session_start();
// error_reporting(0);
require('config.php');

$data = array();
$response["response"] = array();

$data['message'] = "";

if(isset($_POST['change_password'])){

    $username = $_POST['mail'];
    $password = $_POST['new_password'];
    $new_hashed_password = password_hash($password,PASSWORD_BCRYPT);
    $code = $_POST['code'];


    // Select user is
    $sql = "SELECT id,password from users WHERE email=:username";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    if($query->execute()){
        $result = $query->fetch(PDO::FETCH_OBJ);
        $user_id = $result->id;
        $old_password = $result->password;
        
        $sql = "SELECT verification_code from forget_password WHERE user_id=:user_id ORDER BY timestamp DESC";
        $query = $dbh->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);

        if($query->execute()){
            $result = $query->fetch(PDO::FETCH_OBJ);
            if($code === $result->verification_code ){
                // check if password matched old password
                $verify_res = password_verify($password,$old_password);
                if($verify_res == 0){
                    // Update password in users table
                    $sql = " UPDATE users SET password=:new_hashed_password WHERE email=:username";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':username', $username, PDO::PARAM_STR);
                    $query->bindParam(':new_hashed_password', $new_hashed_password, PDO::PARAM_STR);

                    if($query->execute()){
                        $data['status'] = "ok";
                        $data['success_message'] = "Password updated!"; 
                        // update password in forget_password table
                        $sql = " UPDATE forget_password SET new=:new_hashed_password WHERE user_id=:user_id  " ;
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                        $query->bindParam(':new_hashed_password', $new_hashed_password, PDO::PARAM_STR);
                        if($query->execute()){
                            $data['status'] = "ok";
                            $data['success_message'] = "Password updated!";  
                        }
                    }
                    else{ 
                        // Password not updated in users table
                        $data['status'] = "ok";
                        $data['alert_message'] = "Something went wrong";
                    }
        
                }
                else{  
                    // Password same as old
                    $data['status'] = "fail";
                    $data['alert_message'] = "Password shouldn't be same as old password";
                }
            }
            else{
                //Canot find user in user table
                
                $data['verification_code'] = $code;
                $data['verification_code_table'] = $result->verification_code;
                $data['status'] = "ok";
                $data['alert_message'] = "It seems something is not right!";
            }
        }
        else{
            // Not found in verification table
            $data['status'] = "ok";
            $data['alert_message'] = "Something went wrong, Try again!";
        }
    }
    else{
        // User not found
        $data['status'] = "ok";
        $data['alert_message'] = "User not Found";
    }
}
array_push($response["response"], $data);
echo json_encode($response);


?>
<?php


require('./config.php'); 

session_start();
date_default_timezone_set('Asia/Kolkata');
 
$response["response"] = array();
$data = array();

try {
    if(isset($_SESSION['user_id'])){

        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM cart WHERE user_id=:user_id AND status = 'in cart'";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        if($stmt->execute()){
            $count = $stmt->rowCount();
            $data['status'] = 'ok';
            $data['row_count'] = $count;
        }
        else{
            $data['status'] = 'fail';
            $data['message'] = "Unable to get cart row count";    
        }
}
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $data['status'] = 'fail';
    $data['message'] = 'Somethting went wrong';
}
array_push($response["response"], $data);

echo json_encode($response);

?>
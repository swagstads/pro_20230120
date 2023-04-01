<?php

session_start();

require('config.php');

$data = array();
$response["response"] = array();

$data['alert_message'] = "";
$data['success_message'] = "";

if (isset($_POST['chk_coupon'])) {

  $coupon_name = $_POST['coupon_code'];

  $sql = "SELECT * FROM coupon WHERE code=:coupon";
  $query = $dbh->prepare($sql);
  $query->bindParam(':coupon', $coupon_name, PDO::PARAM_STR);
  $query->execute();
  
  $result = $query->fetch(PDO::FETCH_OBJ);

  if(isset($result->code)){
    if($result->status === 'active'){
              $data['coupon_name'] = $_POST['coupon_code'];
              $data['amount'] = $result->amount;
              $data['message'] = "Coupon Applied";
              $data['status'] = "active";
          } 
          
      else{
        $data['status'] = "fail";
        $data['message'] = "Please enter valid coupon";
    }
    }
else{
    $data['status'] = "fail";
    $data['message'] = "This coupon code is not valid";
  }

array_push($response["response"], $data);
echo json_encode($response);

}

?>
<?php

require('./config.php'); 
date_default_timezone_set('Asia/Kolkata');

$response["response"] = array();
$data = array();

$product_id = $_POST['product_id'];

$stmt = $dbh->prepare('SELECT *,c.id AS color_id,p.id as product_id FROM color_master c INNER JOIN product_attr pa ON c.id = pa.color_id INNER JOIN product p ON p.id = pa.product_id WHERE p.id=:product_id;');
$stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
if($stmt->execute()){
    $count = $stmt->rowCount();
    if($count > 0){
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < $count; $i++) {
            
                $data['color'] = $result[$i]['color'];;
                $data['product_id'] = $result[$i]['product_id'];;
                array_push($response["response"], $data);
            }
            
        }
    else{
        $data['status'] = "ok";
        $data["message"] = "No feedbacks yet...";
    }
}
else{
    $data['status'] = "ok";
    $data["message"] = "Error in colors...";
}
echo json_encode($response);

?>
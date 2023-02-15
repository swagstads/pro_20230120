<?php
session_start();
require('./config.php');
// $response["response"] = array();
// $data = array();
// $user_id = $_SESSION['user_id'];
// $stmt = $dbh->prepare(' SELECT cart.*,product.* FROM cart INNER JOIN ON cart.product_id = products.id ');
// $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
// $stmt->execute();
// $count = $stmt->rowCount();

$response["response"] = array();
$data = array();

try {
    
    if(isset($_POST['orders'])){
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT orders.*, products.*, orders.quantity AS order_quantity, orders.status AS order_status FROM orders INNER JOIN products ON orders.product_id = products.id WHERE user_id=:user_id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        

        if($count > 0){
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // print_r($row);
                $data['order_id'] = $row['id']  ;
                $data['user_id'] = $row['user_id'] ; 
                $data['delivery_date'] = substr($row['delivery_date'] , 0,10)  ; 
                $data['order_quantity'] = $row['order_quantity'] ; 
                $data['location'] = $row['location'] ; 
                $data['status'] = $row['status'] ; 
                $data['title'] = $row['title'] ; 
                $data['category'] = $row['category'] ; 
                $data['quantity'] = $row['quantity'] ; 
                $data['description'] = $row['description'] ; 
                $data['mrp'] = $row['mrp'] ; 
                $data['price'] = $row['price'] ; 
                $data['amount'] = $row['amount'] ; 
                $data['img_location'] = $row['img_location'] ; 
                $data['order_status'] = $row['order_status'] ; 

                $data["status"] = "ok";
                $data["message"] = "orders fetched";
                array_push($response["response"], $data);

            }
        }
    }
} 
catch (PDOException $e) {
    $data['status'] = "fail" ; 
    $data['message'] = "Failed to load previous orders"; 
    array_push($response["response"], $data);
}
$dbh = null;
echo json_encode($response);

?>
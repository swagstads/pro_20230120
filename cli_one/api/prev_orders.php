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
        $sql = "SELECT orders.*, product.*,orders.id AS order_id, product.id AS prod_id, orders.quantity AS order_quantity, orders.status AS order_status FROM orders INNER JOIN product ON orders.product_id = product.id WHERE user_id=:user_id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        

        if($count > 0){
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // print_r($row);
                $data['prod_id'] = $row['prod_id']  ;
                $data['order_id'] = $row['order_id']  ;
                $data['user_id'] = $row['user_id'] ; 
                $data['delivery_date'] = substr($row['delivery_date'] , 0,10)  ; 
                $data['order_quantity'] = $row['order_quantity'] ; 
                $data['status'] = $row['status'] ; 
                $data['title'] = $row['title'] ; 
                $data['quantity'] = $row['quantity'] ; 
                $data['description'] = $row['description'] ; 
                $data['mrp'] = $row['mrp'] ; 
                $data['price'] = $row['price'] ; 
                $data['amount'] = $row['amount'] ; 

                $stmt2 = $dbh->prepare(' SELECT image_name FROM product_media WHERE product_id = :product_id');
                $stmt2->bindParam(':product_id', $data["prod_id"], PDO::PARAM_STR);
                $stmt2->execute();

                $fetch_image = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                $data['image_name'] = $fetch_image[0]['image_name'];
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
    $data['error'] = $e;
    array_push($response["response"], $data);
}
$dbh = null;
echo json_encode($response);

?>
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

$response = array();

try {
    
    $sql = "SELECT c.*, c.quantity AS cart_quantity, p.*, p.quantity AS product_quantity FROM cart c INNER JOIN products p ON c.product_id = p.id";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $count = $stmt->rowCount();

    if($count > 0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            print_r($row);
            echo "<br/>";
            $data['cart_id'] = $row['id'];
            $data['required_quantity'] = $row['cart_quantity'];
            $data['product_name'] = $row['title'];
            $data['product_category'] = $row['category'];
            $data['product_description'] = $row['description'];
            $data['product_mrp'] = $row['mrp'];
            $data['product_price'] = $row['price'];
            $data['product_quantity'] = $row['product_quantity'];
            $response[] = $row;
        }
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$dbh = null;
// print_r($response);




?>
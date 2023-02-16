<?php


require('./config.php'); 

session_start();
date_default_timezone_set('Asia/Kolkata');
 
$response["response"] = array();
$data = array();

try {

    $user_id = $_SESSION['user_id'];

    $sql = "SELECT c.*, c.quantity AS cart_quantity, c.id AS cart_id, p.*,p.quantity AS product_quantity, p.id AS product_id FROM cart c INNER JOIN products p ON c.product_id = p.id WHERE user_id=:user_id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->execute();

    $count = $stmt->rowCount();

    if($count > 0){
        $data['status'] = 'ok';
        $data['message'] = 'Got some cart data';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            if( $row['cart_quantity'] > $row['product_quantity']){
                $data['required_quantity'] = $row['product_quantity'];
                $data['Quantity_message'] = "Sorry, required quantity not available, only ".$row['product_quantity']." left in stock!";
            }
            else{
                $data['required_quantity'] = $row['cart_quantity'];
            }
            $data['cart_id'] = $row['cart_id'];
            $data['product_id'] = $row['product_id'];
            $data['product_name'] = $row['title'];
            $data['product_category'] = $row['category'];
            $data['product_description'] = $row['description'];
            $data['product_mrp'] = $row['mrp'];
            $data['product_price'] = $row['price'];
            $data['product_quantity'] = $row['product_quantity'];
            array_push($response["response"], $data);
        }
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

echo json_encode($response);

?>
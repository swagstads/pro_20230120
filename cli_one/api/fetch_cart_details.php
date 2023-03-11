<?php


require('./config.php'); 

session_start();
date_default_timezone_set('Asia/Kolkata');
 
$response["response"] = array();
$data = array();

try {
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $sql =  "SELECT *,
                c.quantity AS cart_quantity,
                c.id AS cart_id, 
                p.quantity AS product_quantity 
                FROM cart c JOIN product p ON c.product_id = p.id 
                WHERE user_id=:user_id AND c.status = 'in cart'";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();
        
        $count = $stmt->rowCount();
        
        $data['row_count'] = $count;

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

                $data['prod_id_'] = $row['product_id'];
                $data['cart_id'] = $row['cart_id'];
                $data['product_name'] = $row['title'];
                $data['product_description'] = $row['description'];
                $data['product_mrp'] = $row['mrp'];
                $data['product_price'] = $row['price'];
                $data['product_quantity'] = $row['product_quantity'];


                $stmt2 = $dbh->prepare('SELECT image_name FROM product_media WHERE product_id = :product_id');
                $stmt2->bindParam(':product_id', $row["product_id"], PDO::PARAM_STR);
                $stmt2->execute();

                $fetch_image = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                $data['image_name'] = $fetch_image[0]['image_name'];

                array_push($response["response"], $data);
            }
        }
    }
    else{
        $data['status'] = 'fail';
        $data['message'] = 'Login first';
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $data['status'] = 'fail';
    $data['message'] = 'Somethting went wrong';
}

echo json_encode($response);

?>
<?php

require('./config.php'); 
date_default_timezone_set('Asia/Kolkata');

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

//    print_r($_POST);  
$response["response"] = array();
$data = array();

if (isset($_POST['show_products'])) {
    // $user_id=$_POST['user_id'];
    $searched_product = $_POST['product_name'];

    if( strlen($_POST['product_category']) >= 1 ){
            $searched_category = $_POST['product_category'];
        
            $stmt = $dbh->prepare(' SELECT * FROM products 
                                    WHERE  
                                    title LIKE :searched_product 
                                    AND
                                    category LIKE :searched_category ');
        
            $stmt->bindParam(':searched_product', $searched_product, PDO::PARAM_STR);
            $stmt->bindParam(':searched_category', $searched_category, PDO::PARAM_STR);
    }
    else{
        
        $stmt = $dbh->prepare(' SELECT * FROM products 
                                WHERE  
                                title LIKE :searched_product ');
    
        $stmt->bindParam(':searched_product', $searched_product, PDO::PARAM_STR);
    }
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
        $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < $count; $i++) {
            $data["id"] = $fetch_data[$i]['id'];
            $data["title"] = $fetch_data[$i]['title'];
            $data["category"] = $fetch_data[$i]['category'];
            $data["description"] = $fetch_data[$i]['description'];
            $data["mrp"] = $fetch_data[$i]['mrp'];
            $data["price"] = $fetch_data[$i]['price'];
            $data["img_location"] = $fetch_data[$i]['img_location'];
            $data["quantity"] = $fetch_data[$i]['quantity'];

            $data["status"] = "success";
            $data["reason"] = "orders_fetched";
            array_push($response["response"], $data);
        }
    } 
    else {
        $data["status"] = "failed";
        $data["reason"] = "No results";
        array_push($response["response"], $data);

    }
    echo json_encode($response);
}

?>
<?php

require('./config.php'); 
date_default_timezone_set('Asia/Kolkata');

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

//    print_r($_POST);  
$response["response"] = array();
$data = array();
$prod_images = array();

if (isset($_POST['show_products'])) {
    $searched_product = $_POST['product_name'];

    if( strlen($_POST['product_category']) >= 1 ){
            $searched_category = $_POST['product_category'];
        
            $stmt = $dbh->prepare(' SELECT *,p.id AS prod_id FROM product p JOIN category c ON FIND_IN_SET(c.id, p.category_id)  
                                    WHERE  
                                    category_name LIKE %:searched_product% 
                                    AND
                                    title LIKE %:searched_category% ');
            $stmt->bindParam(':searched_product', $searched_product, PDO::PARAM_STR);
            $stmt->bindParam(':searched_category', $searched_category, PDO::PARAM_STR);
    }
    else{
        
        $stmt = $dbh->prepare(' SELECT *,p.id AS prod_id FROM product p JOIN category c ON FIND_IN_SET(c.id, p.category_id)
                                WHERE  
                                category_name LIKE %:searched_product% ');
    
        $stmt->bindParam(':searched_product', $searched_product, PDO::PARAM_STR);
    }
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
        $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < $count; $i++) {
            $pid = $fetch_data[$i]['prod_id'];
            $data["id"] = $pid;
            $data["title"] = $fetch_data[$i]['title'];
            $data["category"] = $fetch_data[$i]['category_name'];
            $data["description"] = $fetch_data[$i]['description'];
            $data["mrp"] = $fetch_data[$i]['mrp'];
            $data["price"] = $fetch_data[$i]['price'];

            try {
                $stmt2 = $dbh->prepare('SELECT image_name FROM product_media WHERE product_id=:product_id');
                $stmt2->bindParam(':product_id',  $pid , PDO::PARAM_INT);
                $stmt2->execute();

                $im_count = $stmt2->rowCount();
                $data["image_name"] = array();

                $fetch_image = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                for ($j = 0; $j < $im_count; $j++){
                    array_push( $data["image_name"] , $fetch_image[$j]['image_name'] );
                }
            } catch (\Throwable $th) {
                $data["image_error"] = "Error: ".$th;
            }
            
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
<?php

session_start();
// error_reporting(0);
require('config.php');

$data = array();
$response["response"] = array();
$data["status"] = "fail";
$data['message'] = "recently view db error:";

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

    // Execute the query to fetch the top 3 products by click_count
    $sql = "SELECT *,p.id AS product_id FROM recent_views rv JOIN product p ON rv.product_id = p.id WHERE user_id=:user_id LIMIT 10";

    $query = $dbh->prepare($sql);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);

        if($query->execute()){
            $count = $query->rowCount();

            if($count > 0){
                // Fetch the rows and display the results
                $fetch_data = $query->fetchAll(PDO::FETCH_ASSOC);
                for ($i = 0; $i < $count; $i++) {
                    $data["prod_id"] = $fetch_data[$i]['product_id'];
                    $data["title"] = $fetch_data[$i]['title'];
                    // $data["category"] = $fetch_data[$i]['category_name'];
                    $data["description"] = $fetch_data[$i]['description'];
                    $data["product_quantity"] = $fetch_data[$i]['quantity'];
                    $data["mrp"] = $fetch_data[$i]['mrp'];
                    $data["price"] = $fetch_data[$i]['price'];
            
                    $stmt2 = $dbh->prepare('SELECT image_name FROM product_media WHERE product_id = :product_id');
                    $stmt2->bindParam(':product_id', $fetch_data[$i]['product_id'], PDO::PARAM_STR);
                    if($stmt2->execute()){
                        $data['image_name']  = "";
                        if($fetch_image = $stmt2->fetch(PDO::FETCH_OBJ)){
                            $data['image_name'] = $fetch_image->image_name;
                        }
                    }
            
            
                    $data["status"] = "success";
                    $data["reason"] = "orders_fetched";
                    array_push($response["response"], $data);
                }
            }
            else{
                $data["status"] = "fail";
                $data["message"] = "No results";
                array_push($response["response"], $data);
            }
        }
        
}
else{
        
        
        $data["status"] = "fail";
        $data['message'] = "recently view db error:";
        array_push($response["response"], $data);
}


echo json_encode($response);
?>

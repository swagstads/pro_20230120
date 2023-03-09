<?php

session_start();
require('config.php');


$data = array();
$response["response"] = array();
$data['status'] = "fetching data";

$sql = " SELECT id, category_name  FROM category" ;
$query = $dbh->prepare($sql);
if($query->execute()){
    while ($result = $query->fetch(PDO::FETCH_ASSOC)) {

        $category_id = $result['id'];
        $category_name = $result['category_name'];
        $sql = " SELECT id,title  FROM product WHERE category_id=:category_id ORDER BY click_count DESC LIMIT 3";
        $product_query = $dbh->prepare($sql);
        $product_query->bindParam(':category_id', $category_id, PDO::PARAM_STR);
        $data[$category_name] = array();
        if($product_query->execute()){

            $category_data = array();

            while ($product_result = $product_query->fetch(PDO::FETCH_ASSOC)) {

                $product_result['image_name'] = false;
                $prod_img_query = $dbh->prepare('SELECT image_name FROM product_media WHERE product_id = :product_id');
                $prod_img_query->bindParam(':product_id', $product_result['id'], PDO::PARAM_STR);
                if($prod_img_query->execute()){
                    $data['image_name']  = "";
                    if($fetch_image = $prod_img_query->fetch(PDO::FETCH_OBJ)){
                        $product_result['image_name'] = $fetch_image->image_name;
                    }
                }
                array_push($data[$category_name],$product_result);

            }
        }
    }
}

array_push($response["response"], $data);
echo json_encode($response);
?>
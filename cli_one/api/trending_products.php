<?php

session_start();
// error_reporting(0);
require('config.php');

$date=date_create();
$timestamp_now =  date_timestamp_get($date);

$data = array();
$response["response"] = array();

try {
    if(isset($_POST['trending_prods'])){
        // Execute the query to fetch the top 3 products by click_count
        $sql = "SELECT * FROM product JOIN category ON FIND_IN_SET(category.id, product.category_id) ORDER BY click_count DESC LIMIT 3";
        $stmt = $dbh->query($sql);
    
        // Fetch the rows and display the results
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data['product_id'] = $row['id'];
            $data['product_title'] = $row['title'];
            $data['product_category'] = $row['category_name'];
            $stmt2 = $dbh->prepare(' SELECT image_name FROM product_media WHERE product_id = :product_id');
            $stmt2->bindParam(':product_id', $data["id"], PDO::PARAM_STR);
            $stmt2->execute();
            $j = 0;
            while ($fetch_image = $stmt2->fetchAll(PDO::FETCH_ASSOC)){
                $data["image_name"] = $fetch_image[$j]['image_name'];
                $j++;
            }
            array_push($response["response"], $data);
        }
    }
  
} catch (\Throwable $th) {
    echo "ERROR: ".$th;
    $data["status"] = "fail";
    $data['message'] = "click count not updated";
    array_push($response["response"], $data);

}

echo json_encode($response);
?>

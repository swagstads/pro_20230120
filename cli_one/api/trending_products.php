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
        $sql = "SELECT *, p.id AS product_id FROM product p JOIN category c ON FIND_IN_SET(c.id, p.category_id) ORDER BY click_count DESC LIMIT 3";
        $stmt = $dbh->query($sql);
    
        // Fetch the rows and display the results
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data['product_id'] = $row['product_id'];
            $data['product_title'] = $row['title'];
            $data['product_category'] = $row['category_name'];

            $stmt2 = $dbh->prepare(' SELECT image_name FROM product_media WHERE product_id = :product_id');
            $stmt2->bindParam(':product_id', $row['product_id'], PDO::PARAM_STR);
            $stmt2->execute();

            $fetch_image = $stmt2->fetch(PDO::FETCH_OBJ);
            $data["image_name"] = $fetch_image->image_name;

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

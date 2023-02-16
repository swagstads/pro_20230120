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
        $sql = "SELECT * FROM products ORDER BY click_count DESC LIMIT 3";
        $stmt = $dbh->query($sql);
    
        // Fetch the rows and display the results
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data['product_title'] = $row['title'];
            $data['image_location'] = $row['img_location'];
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

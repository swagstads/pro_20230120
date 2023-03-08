<?php

require('./api/config.php'); 
date_default_timezone_set('Asia/Kolkata');

$response["response"] = array();
$data = array();

{
    // $user_id=$_GET['user_id'];
    $searched_product = $_GET['product_name'];

    if( strlen($_GET['product_category']) >= 5 ){
            $searched_category = $_GET['product_category'];
        
            $stmt = $dbh->prepare(' SELECT *,p.id AS prod_id FROM product p JOIN category c ON FIND_IN_SET(c.id, p.category_id)  
                                    WHERE  
                                    category_name LIKE :searched_product 
                                    AND
                                    title LIKE :searched_category ');
        
            $stmt->bindParam(':searched_product', $searched_product, PDO::PARAM_STR);
            $stmt->bindParam(':searched_category', $searched_category, PDO::PARAM_STR);
    }
    else{
        
        $stmt = $dbh->prepare(' SELECT *,p.id AS prod_id FROM product p JOIN category c ON FIND_IN_SET(c.id, p.category_id)
                                WHERE  
                                category_name LIKE :searched_product ');
    
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
                $stmt2 = $dbh->prepare('SELECT * FROM product_media WHERE product_id=:product_id');
                $stmt2->bindParam(':product_id',  $pid , PDO::PARAM_INT);
                $stmt2->execute();

                $data['image_name'] = array();

                $im_count = $stmt2->rowCount();
                echo "<br><br>_________________________________________________<br>".$data["id"].": Row Count: ".$im_count."<br>";
                $prod_img = array();
                if($im_count > 0){
                    for ($j = 0; $j < $im_count; $j++){
                        $fetch_image = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                        array_push( $data['image_name'] , $fetch_image);
                        echo "<br>================== $i $j <br> ";
                        print_r($fetch_image[$j] );
                    }
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
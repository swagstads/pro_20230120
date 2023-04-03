<?php

require('./config.php'); 
date_default_timezone_set('Asia/Kolkata');
 
$response["response"] = array();
$response["pageinfo"] = array();

$data = array();
$prod_images = array();

if (isset($_POST['category_name'])) {
    // set number of items per page
    $items_per_page = 8;

    // get current page number from query string
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    // calculate offset based on current page number
    $offset = ($page - 1) * $items_per_page;

    // Get Category name
    $category_name = "%".strtolower($_POST['category_name'])."%";



    if( strlen($_POST['product_name']) >= 1 ){
        $search_product = "%".strtolower($_POST['product_name'])."%";
    
        $stmt = $dbh->prepare(" SELECT *,p.id AS prod_id FROM product p JOIN category c ON FIND_IN_SET(c.id, p.category_id)  
                                WHERE  
                                LOWER(category_name) LIKE :category_name 
                                AND
                                ( LOWER(title) LIKE :search_product
                                OR LOWER(description) LIKE :search_product )
                                LIMIT :offset, :items_per_page ");

    $stmt->bindParam(':search_product', $search_product, PDO::PARAM_STR);
    $stmt->bindParam(':category_name', $category_name, PDO::PARAM_STR);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':items_per_page', $items_per_page, PDO::PARAM_INT);

    $stmt2 = $dbh->prepare(" SELECT *,p.id AS prod_id FROM product p JOIN category c ON FIND_IN_SET(c.id, p.category_id)  
    WHERE  
    LOWER(category_name) LIKE :category_name 
    AND
    ( LOWER(title) LIKE :search_product
    OR LOWER(description) LIKE :search_product )");

    $stmt2->bindParam(':search_product', $search_product, PDO::PARAM_STR);
    $stmt2->bindParam(':category_name', $category_name, PDO::PARAM_STR);
    
    $stmt2->execute();
    $count_rows = $stmt2->rowCount();
    $data['count_rows'] = $count_rows;
    $data['items_per_page'] = $items_per_page;
    $data['total_pages'] = ceil($count_rows / $items_per_page);
    
    array_push($response["pageinfo"], $data);

}
else{    
    $stmt = $dbh->prepare(' SELECT *,p.id AS prod_id FROM product p JOIN category c ON FIND_IN_SET(c.id, p.category_id)
                            WHERE LOWER(category_name) LIKE :category_name 
                            OR LOWER(title) LIKE :category_name 
                            OR LOWER(description) LIKE :category_name
                            LIMIT :offset, :items_per_page  ');

    $stmt->bindParam(':category_name', $category_name, PDO::PARAM_STR);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':items_per_page', $items_per_page, PDO::PARAM_INT);


    
    $stmt2 = $dbh->prepare(' SELECT *,p.id AS prod_id FROM product p JOIN category c ON FIND_IN_SET(c.id, p.category_id)
    WHERE LOWER(category_name) LIKE :category_name 
    OR LOWER(title) LIKE :category_name 
    OR LOWER(description) LIKE :category_name');
    // LIMIT :offset, :items_per_page 

    $stmt2->bindParam(':category_name', $category_name, PDO::PARAM_STR);
    
    $stmt2->execute();

    $res = $stmt2->fetchALL(PDO::FETCH_ASSOC);
    $count_rows = $stmt2 -> rowCount();
    $data['count_rows'] = $count_rows;
    $data['items_per_page'] = $items_per_page;
    $data['total_pages'] = ceil($count_rows / $items_per_page);
    
    array_push($response["pageinfo"], $data);
    unset( $data );
}
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
        $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < $count; $i++) {
            $pid = $fetch_data[$i]['prod_id'];
            $data["id"] = $pid;
            $data["quantity"] = $fetch_data[$i]['quantity'];
            $data["title"] = $fetch_data[$i]['title'];
            $data["category"] = $fetch_data[$i]['category_name'];
            $data["description"] = $fetch_data[$i]['description'];
            $data["mrp"] = $fetch_data[$i]['mrp'];
            $data["price"] = $fetch_data[$i]['price'];
            $data["click_counts"] = $fetch_data[$i]['click_count'];
            $data["status"] = "success";
            $data["reason"] = "orders_fetched";
            $data["added_on"]=strtotime($fetch_data[$i]['added_on']);
            
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
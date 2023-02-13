<?php
            require('./api/config.php');
            $product_id = 33;
            $sql = " SELECT quantity FROM products WHERE id=:product_id" ;
            $query = $dbh->prepare($sql);
            $query->bindParam(':product_id', $product_id, PDO::PARAM_STR);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_OBJ);
            echo $row->quantity
?>
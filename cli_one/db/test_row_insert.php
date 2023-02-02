<?php
try {
    
    include('../api/config.php');

    // USER
    $stmt = $dbh->prepare("INSERT INTO users (name, email, password, phone, address, role, added_on, modified_on, deleted_on, status)
                           VALUES (:name, :email, :password, :phone, :address, :role, NOW(), NOW(), NOW(), :status)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':status', $status);
    
    $name = "John Doe";
    $email = "johndoe@example.com";
    $password = password_hash("password", PASSWORD_DEFAULT);
    $phone = "1234567890";
    $address = "123 Main St";
    $role = "customer";
    $status = "active";

    $stmt->execute();

    // PRODUCT
    $stmt = $dbh->prepare("INSERT INTO product (title, description, price, delivery_date, location, status, img_location)
                           VALUES (:title, :description, :price, :delivery_date, :location, :status, :img_location)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':delivery_date', $delivery_date);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':img_location', $img_location);

    $title = "Product 1";
    $description = "This is a description of Product 1";
    $price = 19.99;
    $delivery_date = "2022-12-31";
    $location = "123 Main St";
    $status = "pending";
    $img_location = "product1.jpg";

    $stmt->execute();

    // PAYMENT
    $stmt = $dbh->prepare("INSERT INTO payment (amount, product_id, sender, timestamp)
                           VALUES (:amount, :product, :sender, NOW())");
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':product', $product);
    $stmt->bindParam(':sender', $sender);

    $amount = 19.99;
    $product = 1;
    $sender = 1;

    $stmt->execute();
}
catch (\Throwable $err){
    echo "Error:".$err;
}
?>
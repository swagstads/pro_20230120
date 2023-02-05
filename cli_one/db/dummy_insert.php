<?php

include('../api/config.php');


// Insert dummy data into the "Product" table
$sql = "INSERT INTO Products (title, category,quantity, description,mrp, price, img_location)
VALUES
('Cushion Cover', 'Home Decor', 10, 'Blue and Green Floral Cushion Cover',100, 15.99, 'img/cushion_cover.jpg'),
('Rug', 'Home Decor',10, 'Beige and Black Area Rug',100, 99.99, 'img/rug.jpg'),
('Robe', 'Apparel',10, 'Soft and Cozy Plush Robe',100, 39.99, 'img/robe.jpg'),
('Curtains', 'Home Decor',10, 'Light Filtering White Curtains',100, 24.99, 'img/curtains.jpg')";

if ($dbh->query($sql) === TRUE) {
    echo "Dummy data inserted into Product successfully";
} else {
    echo "Error inserting data: " . $dbh->error;
}



// // Insert dummy data into the "Cart" table
// $sql = "INSERT INTO Cart (amount, quantity, message, product_id)
// VALUES
// (999.99, 1, 'This is a test message for the cart', 17),
// (799.99, 1, 'This is a test message for the cart', 18),
// (799.99, 1, 'This is a test message for the cart', 19),
// (249.99, 1, 'This is a test message for the cart', 20),
// (199.99, 1, 'This is a test message for the cart', 18)";
// if ($dbh->query($sql) === TRUE) {
//     echo "Dummy data inserted into Cart successfully";
// } else {
//     echo "Error inserting data: " . $dbh->error;
// }


// // Insert dummy data into the "Orders" table
// $sql = "INSERT INTO Orders (cart_id, user_id, product_id, delivery_date, location, status)
// VALUES
// (6, 1, 17, '2023-02-03', 'New York', 'pending'),
// (7, 3, 18, '2023-02-04', 'Los Angeles', 'pending'),
// (8, 1, 19, '2023-02-05', 'Chicago', 'pending'),
// (9, 3, 20, '2023-02-06', 'Houston', 'pending'),
// (10, 1, 17, '2023-02-07', 'Phoenix', 'pending')";

// if ($dbh->query($sql) === TRUE) {
//     echo "Dummy data inserted into Orders successfully";
// } else {
//     echo "Error inserting data: " . $dbh->error;
// }

?>
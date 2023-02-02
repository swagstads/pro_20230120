<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "atozecommerce";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "Connected";
}

// // SQL statement to create table
// $sql = "CREATE TABLE users (
// id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
// name VARCHAR(30) NOT NULL,
// email VARCHAR(50) NOT NULL,
// password VARCHAR(255) NOT NULL,
// phone VARCHAR(20) NOT NULL,
// address VARCHAR(100) NOT NULL,
// role ENUM('customer', 'admin') NOT NULL,
// added_on timestamp NOT NULL,
// modified_on timestamp NOT NULL,
// deleted_on timestamp NOT NULL,
// status ENUM('active', 'dormant', 'deleted', 'removed') NOT NULL
// )";

// if ($conn->query($sql) === TRUE) {
//     echo "Table users created successfully <br>";
// } else {
//     echo "Error creating table: " . $conn->error;
// }



// SQL query to create the "Product" table
// $sql = "CREATE TABLE Products (
//     id INT unsigned AUTO_INCREMENT PRIMARY KEY,
//     title VARCHAR(80),
//     category VARCHAR(255),
//     description VARCHAR(255),
//     MRP FLOAT,
//     our_price FLOAT,
//     img_location VARCHAR(255)
//     )";
    
//     if ($conn->query($sql) === TRUE) {
//         echo "Table Product created successfully <br>";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }
    
// // SQL query to create the "Cart" table
// $sql = "CREATE TABLE Cart (
// id INT unsigned AUTO_INCREMENT PRIMARY KEY,
// amount FLOAT,
// quantity INT,
// message VARCHAR(255),
// product_id INT,
// FOREIGN KEY (product_id) REFERENCES Products(id)
// )";

// if ($conn->query($sql) === TRUE) {
//     echo "Table Cart created successfully <br>";
// } else {
//     echo "Error creating table: " . $conn->error;
// }


    
    // // SQL statement to create table 'payment'
    // $sql = "CREATE TABLE Payment (
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     amount FLOAT,
    //     product_id INT(11) unsigned  NOT NULL ,
    //     sender INT(11) unsigned NOT NULL,
    //     timestamp timestamp,
    //     FOREIGN KEY (product_id) REFERENCES Products(id),
    //     FOREIGN KEY (sender) REFERENCES users(id)
    // )";
    
    // if ($conn->query($sql) === TRUE) {
    //     echo "Table payment created successfully <br>";
    // } else {
    //     echo "Error creating table: " . $conn->error;
    // }

//     // SQL statement to create table 'contact_us'
//     $sql = "CREATE TABLE contact_us (
//     id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
//     name VARCHAR(30) NOT NULL,
//     email VARCHAR(50) NOT NULL,
//     subject VARCHAR(100) NOT NULL,
//     message VARCHAR(255) NOT NULL,
//     added_on timestamp NOT NULL
//     )";
    
//     if ($conn->query($sql) === TRUE) {
//         echo "Table contact_us created successfully <br>";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }
    


// // SQL query to create the "orders" table
//     $sql = "CREATE TABLE orders (
//         id INT AUTO_INCREMENT PRIMARY KEY,
//         cart_id INT unsigned NOT NULL,
//         user_id INT unsigned NOT NULL,
//         product_id INT unsigned  NOT NULL,
//         delivery_date timestamp,
//         location VARCHAR(255),
//         status ENUM('pending', 'in progress', 'delivered', 'canceled'),
//         FOREIGN KEY (product_id) REFERENCES Products(id),
//         FOREIGN KEY (user_id) REFERENCES users(id),
//         FOREIGN KEY (cart_id) REFERENCES cart(id)
//         )";

//     if ($conn->query($sql) === TRUE) {
//         echo "Table orders created successfully <br>";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }

$conn->close();

?>
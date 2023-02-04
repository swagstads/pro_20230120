<?php

    require("./api/config.php");
    $email = $_GET['mail'];
    $result = "";
    // Check if mail exist
    $sql = "SELECT * FROM users WHERE email=:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
    if(isset($result->name)){
        print_r($result->name);
    }
    else{
        echo "no results";
    }

?>
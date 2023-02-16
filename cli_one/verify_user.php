<?php

    require('./api/config.php');

    $verification_code = $_GET['code'];
    $user_id = $_GET['uid'];
    $email = $_GET['mail'];
    
    echo "User verified";

    try {
        $query = "SELECT * FROM user_verification WHERE verification_code = :verification_code";
        $stmt = $dbh->prepare($query);
        $stmt->bindValue(':verification_code', $verification_code);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $query = "UPDATE users SET status = 'active' WHERE id = :user_id ";
            $stmt = $dbh->prepare($query);
            $stmt->bindValue(':user_id', $user_id);
            $stmt->execute();


            $query = "UPDATE user_verification SET verify=1 WHERE verification_code = :verification_code";
            $stmt = $dbh->prepare($query);
            $stmt->bindValue(':verification_code', $verification_code);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {

                $_SESSION['username'] = $email;
                // echo "Email verified successfully";
                echo '<script>document.location = "./index.php"</script>';
            } else{
                echo "Invalid verification code";
            }

        } else {
            echo "Invalid verification code";
        }
    } catch (PDOException $e) {
        // echo "Error: " . $e->getMessage();
    }


?>
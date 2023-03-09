<?php

    require('./api/config.php');

    $verification_code = $_GET['code'];
    $user_id = $_GET['uid'];
    $email = $_GET['mail'];

    session_start();    

    try {
        $query = "SELECT * FROM user_verification WHERE verification_code = :verification_code";
        $stmt = $dbh->prepare($query);
        $stmt->bindValue(':verification_code', $verification_code);
        if($stmt->execute()){
           

            if ($stmt->rowCount() > 0) {

                // Update user status to active
                $query = "UPDATE users SET status = 'active' WHERE id = :user_id ";
                $stmt = $dbh->prepare($query);
                $stmt->bindValue(':user_id', $user_id);
                $stmt->execute();


                // Get user details to get name
                $query = "SELECT name from users WHERE id = :user_id ";
                $stmt = $dbh->prepare($query);
                $stmt->bindValue(':user_id', $user_id);
                $stmt->execute();

                $result = $stmt->fetch(PDO::FETCH_OBJ);
                $name = $result->name;


                // updating user verification to in verification table
                $query = "UPDATE user_verification SET verify=1 WHERE verification_code=:verification_code";
                $stmt = $dbh->prepare($query);
                $stmt->bindValue(':verification_code', $verification_code);
                $stmt->execute();
                
                if ($stmt->rowCount() > 0) {
                    $_SESSION['name'] = $name;
                    $_SESSION['username'] = $email;
                    $_SESSION['user_id'] = $user_id;
                    echo "Email verified successfully";
                    echo '<script>document.location = "./index.php"</script>';
                } else{
                    echo "Invalid verification code";
                }

            } else {
                echo "Invalid verification code (Not a user)";
            }
        }
    } catch (PDOException $e) {
        // echo "Error: " . $e->getMessage();
    }


?>
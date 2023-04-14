<?php


session_start();
date_default_timezone_set('Asia/Kolkata');

if(isset($_FILES['resume'])){
    // Create a new PHPMailer instance
    require ('./phpmailer/PHPMailerAutoload.php');
    $mail= new PHPMailer;
    // Set the SMTP settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "rishabhpnahar@gmail.com";
    $mail->Password = "crigdqwxmxunttbz";
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Set the email details
    $mail->setFrom("rishabhpnahar@gmail.com", "UserName");
    $mail->addAddress("malavshah166@gmail.com", "Recipient Name");
    $mail->Subject = "Resume from ".$_POST["name"];
    $mail->isHTML(true);

    // Get the uploaded file details
    $file_name = $_FILES['resume']['name'];
    $temp_name = $_FILES['resume']['tmp_name'];
    $file_type = $_FILES['resume']['type'];
    $file_size = $_FILES['resume']['size'];

    // Check the file size
    $max_size = 10 * 1024 * 1024; // 10 MB
    if ($file_size > $max_size) {
    header("Location: ../?alert=File size is too large.");
    die("Error: File size is too large.");
    }

    // Read the file content and encode it into base64
    $file_content = file_get_contents($temp_name);
    $encoded_content = chunk_split(base64_encode($file_content));

    // Create the email message
    $message = "<html><body><h2>Resume Submission:</h2><br><p>Name: ".$_POST['name']."</p><br><p>email: ".$_POST['email']."</p><br><p>Mobile: ".$_POST['mobile']."</p><br><p>Please find attached resume</p></body></html>";
    $mail->Body = $message;
    $mail->addStringAttachment($file_content, $file_name, "base64", $file_type);

    // Send the email
    if ($mail->send()) {
        echo "<script>alert('Email sent successfully.')</script>";
        // Redirect to the root URL
        header("Location: ../?alert=Resume sent successfully");
        exit();
    } else {
        header("Location: ../?alert=Email sending failed");
        echo "Email sending failed";
    }
}

if(isset($_POST['message'])){
        // Create a new PHPMailer instance
        require ('./phpmailer/PHPMailerAutoload.php');
        $mail= new PHPMailer;
        // Set the SMTP settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "rishabhpnahar@gmail.com";
        $mail->Password = "crigdqwxmxunttbz";
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
    
        // Set the email details
        $mail->setFrom("rishabhpnahar@gmail.com", "Your Name");
        $mail->addAddress("shahmalav1999@gmail.com", "Recipient Name"); //Here the mail of atoz will come on which mail they want the mails
        $mail->Subject = "Resume from ".$_POST["name"];
        $mail->isHTML(true);

        // Create the email message
        $message = "<html><body>
                        <h2>A message from ".$_POST["name"]." on AToZgroup.com</h2><br>
                        <p>Email: ".$_POST['email']."</p>
                        <p>Message: ".$_POST['message']."</p>
                    </body></html>";
        $mail->Body = $message;
    
        // Send the email
        if ($mail->send()) {
            echo "<script>alert('Email sent successfully.')</script>";
            // Redirect to the root URL
            header("Location: ../?alert=Message sent successfully");
            exit();
        } else {
            header("Location: ../?alert=Email sending message");
            echo "Email sending failed";
        }
}

?>
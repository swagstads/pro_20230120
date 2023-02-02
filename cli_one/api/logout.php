<?php
    session_start();
    try {
        session_unset();
        echo "Destroying sessions";
    } catch (\Throwable $th) {
        echo "$th"." ".$_SESSION['username'];
    }
    echo "<script type='text/javascript'>document.location = '/'</script>";
    // header("Location: /");
?>
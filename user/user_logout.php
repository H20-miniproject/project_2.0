<?php
    session_start();
    session_destroy();
    header("Location: http://localhost/H20/signup/login.php");
    exit();
?>
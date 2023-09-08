<?php
    session_start();
    session_destroy();
    header("Location: http://localhost/H20/admin/admin_login.php");
    exit();
?>
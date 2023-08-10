<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "h2o_watersupply";
    
    // Create a new mysqli object
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
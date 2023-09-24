<?php   
    session_start();
    include("../config/constants.php");
    $mailid = $_GET['mailid'];
    $res = $conn->query("DELETE FROM retailer_table WHERE retailer_email='$mailid'");
    if($res == true)
    {
        header("Location: http://localhost/H20/home/homepage.html");
    }
    else
    {
        $_SESSION['msg'] = "Item deletion unsuccessfull";
        header("Location: " . $_SESSION["previous_url"]);
    }
?>
<?php   
    session_start();
    include("../config/constants.php");
    $id = $_GET['id'];
    $res = $conn->query("DELETE FROM retailer_profile WHERE id = '$id'");
    if($res == true)
    {
        $_SESSION['msg'] = "Item removed successfully";
        header("Location: http://localhost/H20/retailers/profile.php");
    }
    else
    {
        $_SESSION['msg'] = "Item removing unsuccessfull";
        header("Location: http://localhost/H20/retailers/profile.php");
    }
?>
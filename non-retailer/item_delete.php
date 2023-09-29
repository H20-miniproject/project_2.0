<?php   
    session_start();
    include("../config/constants.php");
    $id = $_GET['id'];
    $res2 = $conn->query("DELETE FROM booking WHERE id = '$id'");
    if($res2 == true)
    {
        $_SESSION['msg'] = "Booking removed successfully";
        header("Location: http://localhost/H20/non-retailer/non_retailer_dashboard.php");
    }
    else
    {
        $_SESSION['msg'] = "Booking removing unsuccessfull";
        header("Location: http://localhost/H20/non-retailer/non_retailer_dashboard.php");
    }
?>
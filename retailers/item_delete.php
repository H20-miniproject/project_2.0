<?php   
    session_start();
    include("../config/constants.php");
    $id = $_GET['id'];
    $res = $conn->query("DELETE FROM booked_service WHERE id = '$id'");
    $res2 = $conn->query("DELETE FROM booking WHERE id = '$id'");
    if($res == true and $res2 == true)
    {
        $_SESSION['msg'] = "Booking removed successfully";
        header("Location: http://localhost/H20/retailers/retailer_dashboard.php");
    }
    else
    {
        $_SESSION['msg'] = "Booking removing unsuccessfull";
        header("Location: http://localhost/H20/retailers/retailer_dashboard.php");
    }
?>
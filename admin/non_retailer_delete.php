<?php   
    session_start();
    include("../config/constants.php");
    $id = $_GET['id'];
    $res = $conn->query("DELETE FROM non_retailers_table WHERE id = '$id'");
    if($res == true)
    {
        $_SESSION['msg'] = "Non Retailer Account deleted successfully";
        header("Location: http://localhost/H20/admin/account_monitoring.php");
    }
    else
    {
        $_SESSION['msg'] = "Non Retailer Account deletion unsuccessfull";
        header("Location: http://localhost/H20/admin/account_monitoring.php");
    }
?>
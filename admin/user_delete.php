<?php   
    session_start();
    include("../config/constants.php");
    $id = $_GET['id'];
    $res = $conn->query("DELETE FROM user_table WHERE user_id = '$id'");
    if($res == true)
    {
        $_SESSION['msg'] = "User deleted successfully";
        header("Location: http://localhost/H20/admin/account_monitoring.php");
    }
    else
    {
        $_SESSION['msg'] = "User deletion unsuccessfull";
        header("Location: http://localhost/H20/admin/account_monitoring.php");
    }
?>
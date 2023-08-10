<?php   
    session_start();
    include("../config/constants.php");
    $id = $_GET['id'];
    $res = $conn->query("DELETE FROM admin_table WHERE admin_id = '$id'");
    if($res == true)
    {
        $_SESSION['msg'] = "Admin deleted successfully";
        header("Location: http://localhost/H20/admin/admin.php");
    }
    else
    {
        $_SESSION['msg'] = "Admin deletion unsuccessfull";
        header("Location: http://localhost/H20/admin/admin.php");
    }
?>
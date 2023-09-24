<?php   
    session_start();
    include("../config/constants.php");
    $id = $_GET['id'];
    $res = $conn->query("DELETE FROM retailer_profile WHERE id = '$id'");
    if($res == true)
    {
        $_SESSION['msg'] = "Item deleted successfully";
        header("Location: " . $_SESSION["previous_url"]);
    }
    else
    {
        $_SESSION['msg'] = "Item deletion unsuccessfull";
        header("Location: " . $_SESSION["previous_url"]);
    }
?>
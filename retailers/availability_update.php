<?php
    session_start();
    include("../config/constants.php");
    if(isset($_POST['availability_check']))
    {
        $mailid = $_SESSION['mailid'];
        $value = $_POST['availability'];
        if ($conn->query("UPDATE retailer_table SET availability = '$value' WHERE retailer_email ='$mailid'") === false)
        {
            $_SESSION['msg'] = "Something went wrong";
            header("Location: " . $_SESSION["previous_url"]);
        }
        else
        {
            $_SESSION['msg'] = "Updated";
            header("Location: " . $_SESSION["previous_url"]);
        }
    }
?>
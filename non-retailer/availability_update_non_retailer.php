<?php
    session_start();
    include("../config/constants.php");
    if(isset($_POST['availability_check']))
    {
        $mailid = $_SESSION['mailid'];
        $value = $_POST['availability'];
        $amount = $_POST['amount'];
        if ($conn->query("UPDATE non_retailers_table SET availability = '$value', amount = '$amount' WHERE non_retailer_email ='$mailid'") === false)
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
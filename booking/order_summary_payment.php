<?php
session_start();
include("../config/constants.php");
$user_mailid = $_SESSION['user_mailid'];
if(isset($_GET['mailid']))
{
    $mailid = $_GET['mailid'];
    $_SESSION['retailer_mailid'] = $mailid;
}  
$type = $_SESSION['type'];     
$_SESSION['type'] = $type; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <style>
        /* Card Styles */
        .card {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Table Styles */
        .datatable {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .datatable th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Total Styles */
        .total {
            font-weight: bold;
            margin-top: 10px;
        }

        /* Button Styles */
        .button-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 20px;
        }

        .button {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            border-radius: 4px;
        }

        .cancel-button {
            background-color: #FF0000;
            color: white;
        }

        .confirm-button {
            background-color: #008CBA;
            color: white;
        }
        .usertable{
            width:100%;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Order Summary</h2>
        <?php
            $user_mail = $_SESSION['user_mailid'];
            $user_base_data = $conn->query("SELECT * FROM user_table WHERE user_email = '$user_mail'");
            if($user_base_data->num_rows > 0)
            {
                $user_data = $user_base_data->fetch_assoc();
            }
            if($type == "retailer")
            {
                $retailer_mail = $_SESSION['retailer_mailid'];
                $retailer_base_data = $conn->query("SELECT * FROM retailer_table WHERE retailer_email = '$retailer_mail'");
                if($retailer_base_data->num_rows > 0)
                {
                    $retailer_data = $retailer_base_data->fetch_assoc();
                }
            }
            else
            {
                $retailer_mail = $_SESSION['retailer_mailid'];
                $non_retailer_base_data = $conn->query("SELECT * FROM non_retailers_table WHERE non_retailer_email = '$retailer_mail'");
                if($non_retailer_base_data->num_rows > 0)
                {
                    $non_retailer_data = $non_retailer_base_data->fetch_assoc();
                }
            }
        ?>
        <table class="usertable">
            <tr>
                <td>Name:</td>
                <td><?php echo $user_data['user_name'] ?></td>
            </tr>
            <tr>
                <td>Mailid:</td>
                <td><?php echo $user_data['user_email'] ?></td>
            </tr>
            <tr>
                <td>Phno:</td>
                <td><?php echo $user_data['user_phno'] ?></td>
            </tr>
            <tr>
                <td>Place:</td>
                <td><?php echo $user_data['user_place'] ?></td>
            </tr>
            <?php
                if($type=="non-retailer")
                {
                    ?>
                        <tr>
                            <td>Amount:</td>
                            <td><?php echo $non_retailer_data['amount'] ?></td>
                            <?php
                                $totalAmount = $non_retailer_data['amount'];
                            ?>
                        </tr>
                    <?php
                }
            ?>
        </table>
        <table class="datatable">
            <?php
                if (isset($_POST["confirmButton"])) {
                    $totalAmount = 0;
                    $date = $_POST['date'];
                    
                    $orders = $_POST["dropdown"]; // An array of selected services
                    $quantities = $_POST["quantity"]; // An array of corresponding quantities
                    ?>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <?php
                
                    // Loop through the selected services and quantities
                    for ($i = 0; $i < count($orders); $i++) {
                        $order = $orders[$i];
                        $order_data = explode(",",$order);
                        $amount = intval($order_data[0]);
                        $service = $order_data[1];
                        $quantity = $quantities[$i];
                        ?>

                        <tr>
                            <td><?php echo $service ?></td>
                            <td><?php echo $quantity ?></td>
                            <td><?php echo $amount ?></td>
                        </tr>
                        <?php
                        // Perform calculations or store data as needed
                        // For example, you can calculate the total amount for each item here
                        $totalAmount = $totalAmount + ($quantity * $amount); // Assuming you have the amount associated with the service
                        $_SESSION['total'] = $totalAmount;
                
                        // You can now use $selectedService, $quantity, and $totalAmount as needed
                        // For example, you can insert this data into a database or display it on the page
                    }
                    ?>
                    <tr>
                        <td colspan="3"><b>Date : </b><?php echo $date ?></td>
                    </tr>
                    <?php
                    $_SESSION['date'] = $date;
                    $_SESSION['orders'] = $orders;
                    $_SESSION['quantities'] = $quantities;
                    $_SESSION['total'] = $totalAmount;
                }
            ?>
        </table>
        <?php
            if(isset($totalAmount))
            {
                ?>
                <p class="total">Total : <?php echo $totalAmount ?></p>
                <?php
                $_SESSION['total'] = $totalAmount;
            }
         ?>
        <div class="button-container">
            <a href = "http://localhost/H20/booking/booking.php"><button class="button cancel-button">Cancel Order</button></a>
            <form action="" method="POST"><input class="button confirm-button" value="Confirm & Pay" type="submit" name="book"></form>
        </div>
    </div>
    <?php
    if(isset($_POST['book']))
    {
        if($type == "retailer")
        {
            $name = $user_data['user_name'];
                $mailid = $user_data['user_email'];
                $phno = $user_data['user_phno'];
                $place = $user_data['user_place'];
                $supplier_mailid = $_SESSION['retailer_mailid'];
                $type = $_SESSION['type'];
                $date = $_SESSION['date'];
                $total = $_SESSION['total'];
                $orders = $_SESSION['orders'];
                $quantities = $_SESSION['quantities'];
                if($data = $conn->query("INSERT INTO `booking`(`user_name`, `user_email`, `user_phone`, `user_place`, `supplier_mail`, `type`, `total`, `date`,payment) VALUES ('$name','$mailid','$phno','$place','$supplier_mailid','$type','$total','$date','un-paid')")==True)
                {
                    $last_inserted_id = $conn->insert_id;
                    for ($i = 0; $i < count($orders); $i++) {
                        $order = $orders[$i];
                        $order_data = explode(",",$order);
                        $amount = intval($order_data[0]);
                        $service = $order_data[1];
                        $quantity = $quantities[$i];

                        $sql = "SELECT id FROM booking WHERE id = $last_inserted_id";
                        $result = $conn->query($sql);
                        $booking_id =  $result->fetch_assoc()['id'];
                        if($data = $conn->query("INSERT INTO `booked_service` (`service`, `quantity`, `id`) VALUES ('$service', '$quantity', '$booking_id')")==True)
                        {
                            $_SESSION['user_email'] = $mailid;
                            $_SESSION['user_name'] = $name;
                            $_SESSION['billid'] = $last_inserted_id;
                            header("Location: http://localhost/H20/payment/payment.php");
                        }
                        else
                        {
                            echo "something wrong";
                        }
                }
            }
        }
        else
        {
            $name = $user_data['user_name'];
            $mailid = $user_data['user_email'];
            $phno = $user_data['user_phno'];
            $place = $user_data['user_place'];
            $supplier_mailid = $_SESSION['retailer_mailid'];
            $date = date("Y-m-d");
            $total = $_SESSION['total'];
            if($data = $conn->query("INSERT INTO `booking`(`user_name`, `user_email`, `user_phone`, `user_place`, `supplier_mail`, `type`, `total`, `date`, payment) VALUES ('$name','$mailid','$phno','$place','$supplier_mailid','$type','$total','$date','un-paid')")==True)
            {
                $last_inserted_id = $conn->insert_id;
                $_SESSION['user_email'] = $mailid;
                $_SESSION['user_name'] = $name;
                $_SESSION['billid'] = $last_inserted_id;
                header("Location: http://localhost/H20/payment/payment.php");
            }
        }
}
    ?>
</body>
</html>

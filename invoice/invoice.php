<?php
    include("../config/user_header.php");
    include("../config/constants.php");
    if(isset($_SESSION['user_email']) and isset($_SESSION['billid']))
    {
        $user_mailid = $_SESSION['user_email'];
    }
    else
    {
        header("Location: http://localhost/H20/home/homepage.html");
        exit();
    }
    $id = $_SESSION['billid'];
    $user_email = $_SESSION['user_email'];
    $supplier_mail = $_SESSION['retailer_mailid'];

    $data = $conn->query("SELECT * FROM booking WHERE id = '$id'");
    if($data->num_rows > 0)
    {
        $rows = $data->fetch_assoc();
    }
    if($rows['type'] == 'retailer')
    {
        $data2 = $conn->query("SELECT * FROM retailer_table WHERE retailer_email = '$supplier_mail'");
        if($data2->num_rows > 0)
        {
            $rows2 = $data2->fetch_assoc();
        }
    }
    else
    {
        $data2 = $conn->query("SELECT * FROM non_retailers_table WHERE non_retailer_email = '$supplier_mail'");
        if($data2->num_rows > 0)
        {
            $rows2 = $data2->fetch_assoc();
        }
    }
    $data3 = $conn->query("SELECT * FROM user_table WHERE user_email = '$user_email'");
    if($data3->num_rows > 0)
    {
        $rows3 = $data3->fetch_assoc();
    }
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin:0;
        }

        .invoice {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .invoice-header {
            text-align: center;
            background-color: #f0f0f0;
            padding: 10px;
        }

        .invoice-header h1 {
            margin: 0;
        }

        .invoice-details {
            margin-top: 20px;
        }

        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-details th,
        .invoice-details td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .invoice-details th {
            background-color: #f0f0f0;
        }

        .invoice-total {
            margin-top: 20px;
            text-align: right;
        }

        .invoice-total p {
            font-weight: bold;
        }
        .btn {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            <h1>H2O</h1>
            <h2>Bill Data</h2>
        </div>
        <div class="invoice-details">
            <b>User</b><br><br>
            Name : <?php echo $rows3['user_name']; ?><br>
            Phone Number : <?php echo $rows3['user_phno']; ?><br>
            Email : <?php echo $rows3['user_email']; ?><br>
            <br>
            <br>
            <b>Supplier</b><br><br>
            <?php 
                if($rows['type'] == 'retailer')
                {
                    ?>
                    Name : <?php echo $rows2['shopname']; ?><br>
                    Phone Number : <?php echo $rows2['retailer_phno']; ?><br>
                    Email : <?php echo $rows2['retailer_email']; ?><br>
                    <?php
                }
                else
                {
                    ?>
                    Name : <?php echo $rows2['non_retailer_name']; ?><br>
                    Phone Number : <?php echo $rows2['non_retailer_phno']; ?><br>
                    Email : <?php echo $rows2['non_retailer_email']; ?><br>
                    <?php
                }
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $data4 = $conn->query("SELECT * FROM booked_service WHERE id = '$id'");
                        if($data4->num_rows > 0)
                        {
                            while($rows4 = $data4->fetch_assoc())
                            {
                                ?>
                                <tr>
                                    <td><?php echo $rows4['service'] ?></td>
                                    <td><?php echo $rows4['quantity'] ?></td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <h3>Non-Retailer Service</h3>
                            <?php
                        }
                    ?>
                    <tr>
                        
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="invoice-total">
            <p>Total: <?php echo $rows['total']?></p>
        </div>
        <div class="invoice-buttons">
            <button class="btn" onclick="printInvoice()">Print Invoice</button>
        </div>
    </div>
    <script>
        // Function to print the invoice
        function printInvoice() {
            window.print();
        }
    </script>
</body>
</html>

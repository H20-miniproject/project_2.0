<?php
// Process the form submission
include("../config/retailer_header.php");
include("../config/constants.php");
if (isset($_SERVER["HTTP_REFERER"])) {
    $_SESSION["previous_url"] = $_SERVER["HTTP_REFERER"];
}
if(isset($_GET['mailid'])){
    $mailid = $_GET['mailid'];
}
if(isset($_POST['submit']))
{
    $service = $_POST['service'];
    $amount = $_POST['amt'];
    if($conn->query("INSERT INTO `retailer_profile`(`mailid`, `service`, `amount`) VALUES ('$mailid','$service','$amount')")==False)
    {
        $_SESSION['msg'] = "Something went wrong";
    }
    else
    {
        $_SESSION['msg'] = "Item Added";
    }
    
    // Redirect to the same page to prevent form resubmission
    header("Location: " . $_SERVER["REQUEST_URI"]);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retailer Information</title>
    <style>
        /* CSS for styling the table */
        body{
            margin:10px;
        }
        table {
            width: 50%;
            margin: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            transition: background-color 0.3s ease;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td:hover {
            background-color: #e0e0e0;
        }

        /* CSS for styling the page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        /* CSS for responsiveness */
        @media (max-width: 600px) {
            table {
                width: 90%;
                margin: 10px auto;
            }
        }

        /* CSS for styling the file input field */
        .file-input {
            text-align: center;
            margin-top: 20px;
        }

        /* CSS for styling the buttons */
        .button-cell {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .update-button, .delete-button {
            background-color: #007bff;
            color: #fff;
            padding: 6px 12px;
            border: none;
            cursor: pointer;
            margin: 2px;
        }

        .delete-button {
            background-color: #dc3545;
        }
        .tablediv{
            display:flex;
        }
    
        .availability-table {
         width: 100%; /* Adjust the width as needed */
         margin: 21px auto; /* Adjust the margin as needed */
         border-collapse: collapse;
         text-align: center;
        }
        .availability-table td {
        padding: 6px 12px;
        border: 1px solid #ddd;
         }

.table {
    width: 100%; /* Adjust the width as needed */
    margin: 10px auto; /* Adjust the margin as needed */
    border-collapse: collapse;
    text-align: center;
}
.table td {
    padding: 6px 12px;
    border: 1px solid #ddd;
}
    /* CSS for styling the buttons */
    .update-button, .delete-button {
            background-color: #007bff;
            color: #fff;
            padding: 6px 12px;
            border: none;
            cursor: pointer;
            margin: 2px;
            transition: background-color 0.3s ease; /* Hover animation */
        }

        .update-button:hover, .delete-button:hover {
            background-color: #0056b3; /* Change color on hover */
        }

        .delete-button {
            background-color: #dc3545;
        }

        .delete-button:hover {
            background-color: #c82333; /* Change color on hover */
        }

        /* CSS for styling the availability status */
        .availability-status {
            font-weight: bold;
            transition: color 0.3s ease; /* Color change animation */
        }

        .available {
            color: green;
        }

        .non-available {
            color: red;
        }


    </style>
</head>
<body>
    <?php
        if(isset($_SESSION['msg']))
        {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <div class="tablediv">
    <table id="retailer-table">
        <?php 
            $base_data = $conn->query("SELECT * FROM retailer_table WHERE retailer_email = '$mailid'");
            if($base_data->num_rows > 0)
            {
                $data = $base_data->fetch_assoc();
                ?>
                <tr>
                    <td colspan="5"><b class="availability-status"><?php echo $data['availability'] ?></b></td>
                </tr>
                <tr>
                    <td colspan="2">NAME :</td>
                    <td colspan="3"><b><?php echo $data['shopname'] ?></b></td>
                </tr>
                <tr>
                    <td colspan="2">OWNER NAME :</td>
                    <td colspan="3"><b><?php echo $data['ownername'] ?></b></td>
                </tr>
                <tr>
                    <td colspan="2">LICENSE NO :</td>
                    <td colspan="3"><b><?php echo $data['licenseno'] ?></b></td>
                </tr>
                <tr>
                    <td colspan="2">PHONE NO :</td>
                    <td colspan="3"><b><?php echo $data['retailer_phno'] ?></b></td>
                </tr>
                <tr>
                    <td colspan="2">ADDRESS :</td>
                    <td colspan="3"><b><?php echo $data['retailer_address'] ?></b></td>
                </tr>
                <tr>
                    <td colspan="2">EMAIL :</td>
                    <td colspan="3"><b><?php echo $data['retailer_email'] ?></b></td>
                </tr>
                <tr>
                    <td colspan="2">PLACE :</td>
                    <td colspan="3"><b><?php echo $data['retailer_place'] ?></b></td>
                </tr>
                <?php
            }
            $base_data = $conn->query("SELECT * FROM retailer_profile WHERE mailid = '$mailid'");
            if($base_data->num_rows > 0)
            {
                while($data=$base_data->fetch_assoc())
                {
                    $id = $data['id'];
                    ?>
                         <tr>
                            <td>SERVICE :</td>
                            <td><b><?php echo $data['service'] ?></b></button></a></td>
                            <td>AMOUNT :</td>
                            <td><b><?php echo $data['amount'] ?></b></td>
                            <td><b><a href="http://localhost/H20/retailers/item_delete.php?id=<?php echo $id ?>"><button class="delete-btn">DELETE ITEM</button></a></td>
                        </tr>
                    <?php
                }
            }
        ?>
    </table>
    <div>
       <?php
         $_SESSION['mailid'] = $mailid;
       ?>
        <table class="availability-table">
            <form action="availability_update.php" method="POST">
        <tr>
            <td colspan="2"><input type="radio" name="availability" value="available"> Available&nbsp&nbsp&nbsp<input type="radio" name="availability" value="non-available"> Non-Available&nbsp&nbsp<input class="update-button" type="submit" name="availability_check" value="update"></td>
        </tr>
        </form>
        </table>
    <table class="table">
    <form action="" method="POST">
        <tr>
            <td>Services :</td>
            <td><input type="text" name="service" required></td>
        </tr>
        <tr>
            <td>Price per item :</td>
            <td><input type="number" name="amt" required></td>
        </tr>
        <tr>
            <td>Upload Profile Picture:</td>
            <td><input type="file" id="profile-picture" name="profile-picture"></td>
        </tr>
        <tr >
            <td colspan="2"><input class="update-button" type="submit" value="Update" name="submit"></form><a href="http://localhost/H20/retailers/account_delete.php?mailid=<?php echo $mailid ?>"><button class="delete-button">Delete Account</button></a></td>
        </tr>
    </table>
    </div>
    </div>
    <script>
        // JavaScript to dynamically update the color of the availability status
        const availabilityStatus = document.querySelector('.availability-status');
        const availableRadio = document.querySelector('input[name="availability"][value="available"]');
        const nonAvailableRadio = document.querySelector('input[name="availability"][value="non-available"]');
        const updateButton = document.querySelector('.update-button');

        updateButton.addEventListener('click', () => {
            if (availableRadio.checked) {
                availabilityStatus.classList.remove('non-available');
                availabilityStatus.classList.add('available');
            } else if (nonAvailableRadio.checked) {
                availabilityStatus.classList.remove('available');
                availabilityStatus.classList.add('non-available');
            }
        });
    </script>

</body>
</html>

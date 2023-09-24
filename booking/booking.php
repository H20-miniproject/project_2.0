<?php
include("../config/user_header.php");
include("../config/constants.php");
$user_mailid = $_SESSION['user_mailid'];
if(isset($_GET['mailid']) && isset($_GET['type']))
{
    $mailid = $_GET['mailid'];
    $type = $_GET['type'];
    $_SESSION['retailer_mailid'] = $mailid;
    $_SESSION['type'] = $type;
}
if (isset($_SESSION["user_name"])) {
    $userName = $_SESSION["user_name"];
} else {
    header("Location: http://localhost/H20/signup/login.php");
    exit();
}
        
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Name and Form Card with Quantity</title>
    <style>
        body {
            margin: 0;
        }

        .card {
            width: 90%;
            height: 343px;
            border: 1px solid #ccc;
            box-shadow: 3px 6px 13px 14px rgba(0, 0, 0, 0.2);
            margin: 58px auto;
            display: flex;
        }

        .left-section {
            flex: 1;
            padding: 32px;
            background-color: #f0f0f0;
            text-align: center;
        }

        .right-section {
            flex: 1;
            padding: 20px;
            background-color: #e0e0e0;
        }

        .form-container {
            text-align: center;
            padding: 20px;
        }
         .form-container {
        text-align: center;
        padding: 20px;
        }
        .form-container {
    text-align: center;
    padding: 20px;
    max-height: 300px; /* Set your desired maximum height */
    overflow-y: auto; /* Enable vertical scrolling when content overflows */
}



        .form-container label {
            display: block;
            margin-bottom: 10px;
        }

        .form-container select,
        .form-container input[type="number"] {
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .confirm-button {
            text-align: center;
            margin-top: 10px;
        }

        /* Style for the "Add" button with added margin */
        #addDropdown {
            background-color: blueviolet;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left: 10px;
            /* Adjust this margin value as needed */
            margin-top: -10px;
            /* Adjust this margin value to move the button up */
        }

        /* Style for the "Remove" button with added margin */
        .removeRow {
            background-color: darkred;
            /* Red color for the remove button */
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left: 22px;
            /* Adjust this margin value as needed */
            margin-top: -15px;
            /* Adjust this margin value to move the button up */
        }

        /* Change button color on hover for both "Add" and "Remove" buttons */
        #addDropdown:hover,
        .removeRow:hover {
            background-color: #005F80;
            /* Green color on hover */
        }

        /* Style for the "Confirm" button */
        #confirmButton {
            background-color: #008CBA;
            /* Blue color for the confirm button */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
            /* Add margin to separate it from the form */
        }

        /* Change button color on hover for the "Confirm" button */
        #confirmButton:hover {
            background-color: #005F80;
            /* Darker blue color on hover */
        }

        table,
        tr,
        td {
            text-align: left;
        }
        /* Modal Styles */

    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>
    <?php
    $mailid = $_SESSION['retailer_mailid'];
    $base_data = $conn->query("SELECT * FROM retailer_table WHERE retailer_email = '$mailid'");
    if ($base_data->num_rows > 0) {
        $data = $base_data->fetch_assoc();
    }
    ?>
    <div class="card">
        <div class="left-section">
            <h2><?php echo $data['shopname'] ?></h2>
            <table>
                <tr>
                    <td>OWNER NAME :</td>
                    <td><b><?php echo $data['ownername'] ?></b></td>
                </tr>
                <tr>
                    <td>LICENSE NO :</td>
                    <td><b><?php echo $data['licenseno'] ?></b></td>
                </tr>
                <tr>
                    <td>PHONE NO :</td>
                    <td><b><?php echo $data['retailer_phno'] ?></b></td>
                </tr>
                <tr>
                    <td>ADDRESS :</td>
                    <td><b><?php echo $data['retailer_address'] ?></b></td>
                </tr>
                <tr>
                    <td>EMAIL :</td>
                    <td><b><?php echo $data['retailer_email'] ?></b></td>
                </tr>
                <tr>
                    <td>PLACE :</td>
                    <td><b><?php echo $data['retailer_place'] ?></b></td>
                </tr>
                <tr>
                    <?php
                    $availability =  $data['availability'];
                    if ($availability == 'available') {
                        ?>
                        <td style="background-color:green" colspan="2"><?php echo $data['availability'] ?></td>
                    <?php
                    } else {
                        ?>
                        <td style="background-color:red" colspan="2"><b><?php echo $data['availability'] ?></b></td>
                    <?php
                    }

                    ?>
                </tr>
                <?php
                $base_data2 = $conn->query("SELECT * FROM retailer_profile WHERE mailid = '$mailid'");
                if ($base_data2->num_rows > 0) {
                    while ($data2 = $base_data2->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $data2['service'] ?></td>
                            <td><b><?php echo $data2['amount'] ?></b></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
        <div class="right-section">
            <div class="form-container">
                <!-- Inside the form -->
                <form action="order_summary_payment.php" method="POST">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <td colspan="3"> Date : <input type="date" name="date"></td>
                            </tr>
                            <tr>
                                <th><label for="quantity">Services:</label></th>
                                <th><label for="dropdown">Quantity:</label></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="dropdown[]" class="dropdown"> <!-- Note the [] in name attribute -->
                                        <?php
                                        $mailid = $_SESSION['retailer_mailid'];
                                        $query = "SELECT `service`, `amount` FROM `retailer_profile` WHERE mailid = '$mailid'";
                                        $result = $conn->query($query);
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row['amount'] .','.$row['service'] . '">' . $row['service'] . ',' . $row['amount'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td><input class="qty" type="number" name="quantity[]" min="1" value="1"></td> <!-- Note the [] in name attribute -->
                                <td><button type="button" class="removeRow">Remove</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" id="addDropdown">Add</button>
                    <div class="confirm-button">
                        <button type="submit" id="confirmButton" name="confirmButton">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>
        document.addEventListener("DOMContentLoaded", function () {
            const addDropdownButton = document.getElementById('addDropdown');
            const tableBody = document.querySelector('#myTable tbody');
            const confirmButton = document.getElementById('confirmButton');

            addDropdownButton.addEventListener('click', () => {
                // Clone the original row
                const newRow = tableBody.rows[0].cloneNode(true);

                // Reset the value of the cloned input field
                const clonedInput = newRow.querySelector('.qty');
                clonedInput.value = 1;

                tableBody.appendChild(newRow);

                // Add event listener for the remove button
                const removeButtons = document.querySelectorAll('.removeRow');
                removeButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        newRow.remove();
                    });
                });
            });

            confirmButton.addEventListener('click', () => {
                // Calculate the total amount as before
                let totalAmount = 0;
                const amounts = document.querySelectorAll('.dropdown');
                const quantities = document.querySelectorAll('.qty');

                for (let i = 0; i < amounts.length; i++) {
                    totalAmount += parseFloat(amounts[i].value) * parseFloat(quantities[i].value);
                }

                // Display the total amount in the modal card
                const totalAmountSpan = document.getElementById('totalAmount');
                totalAmountSpan.textContent = totalAmount;

            });
        });
    </script>

</body>

</html>

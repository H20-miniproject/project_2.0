<?php
// Process the form submission
include("../config/user_header.php");
include("../config/constants.php");
if(isset($_GET['mailid'])){
    $mailid = $_GET['mailid'];
}
if (isset($_SERVER["HTTP_REFERER"])) {
    $_SESSION["previous_url"] = $_SERVER["HTTP_REFERER"];
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
            width: 100%;
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
        .logoutbtn{
            display:flex;
            padding-top:30px;
            justify-content:center;
        }
    </style>
</head>
<body>
    <div class="tablediv">
    <table id="retailer-table">
        <?php 
            $base_data = $conn->query("SELECT * FROM user_table WHERE user_email = '$mailid'");
            if($base_data->num_rows > 0)
            {
                $data = $base_data->fetch_assoc();
                ?>
                <tr>
                    <td colspan="2">NAME :</td>
                    <td colspan="3"><b><?php echo $data['user_name'] ?></b></td>
                </tr>
                <tr>
                    <td colspan="2">PHONE NO :</td>
                    <td colspan="3"><b><?php echo $data['user_phno'] ?></b></td>
                </tr>
                <tr>
                    <td colspan="2">EMAIL :</td>
                    <td colspan="3"><b><?php echo $data['user_email'] ?></b></td>
                </tr>
                <tr>
                    <td colspan="2">PLACE :</td>
                    <td colspan="3"><b><?php echo $data['user_place'] ?></b></td>
                </tr>
                <?php
            }
        ?>
    </table>
    <div class="logoutbtn">
        <a href="http://localhost/H20/retailers/account_delete.php?mailid=<?php echo $mailid ?>"><button class="delete-button">Delete Account</button></a></td>
    </div>
    </div>

</body>
</html>

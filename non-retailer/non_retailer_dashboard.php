<?php
    include("../config/non_retailer_header.php");
    include("../config/constants.php");
    if (isset($_SESSION["supplier_name"])) {
        $userName = $_SESSION["supplier_name"];
      } else {
        header("Location: http://localhost/H20/signup/login.php");
        exit();
      }
      $supplier_mail = $_SESSION['mailid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="non_retailer_dashboard_style.css">
<title>User Dashboard</title>
<style>
    table{
        width: 100%;
    }
    table tr th
    {
        text-align: left;
        background-color: rgb(11, 173, 173);
        color: white;
        padding-left: 5px;
        border: 2px solid black;
    }
    .del_btn
    {
        background-color: rgb(221, 95, 93);
        border: 2px solid rgb(221, 95, 93);
        border-radius: 5px;
        color: rgb(0, 0, 0);
        padding: 8px; 
        transition: .1s;
    }
    .del_btn:hover
    {
        background-color: rgb(224, 53, 50);
        border: 2px solid rgb(224, 53, 50);
    }
    a{
        text-decoration: none;
    }
</style>
</head>
<body>
  <div class="tab">
    <button class="tab-button active" onclick="openTab(event, 'tab1')">BOOKINGS</button>
    <button class="tab-button" onclick="openTab(event, 'tab2')">FEEDBACK</button>
  </div>
  <div id="tab1" class="tab-content active">
    <div class="dashboard">
    <?php
            if(isset($_SESSION['msg']))
            {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <table>
                <tr>
                    <th>User Name</th>
                    <th>User Mail</th>
                    <th>Supplier Mail</th>
                    <th>Supplier Type</th>
                    <th>Booked On</th>
                    <th>Total Amount</th>
                    <th>Payment</th>
                    <th>Action</th>
                </tr>
                <?php
                    $conn = new mysqli('localhost','root','','h2o_watersupply');
                    if($conn->connect_error)
                    {
                        echo "<script>alert('Something went wrong')</script>";
                    }
                    else
                    {
                        $data = $conn->query("SELECT * FROM booking");
                        if($data->num_rows > 0)
                        {
                            while($rows = $data->fetch_assoc())
                            {
                                if($rows['supplier_mail'] == $supplier_mail )
                                {
                                    ?>
                                    <tr>
                                            <?php $id = $rows['id'] ?>
                                            <td><?php echo $rows['user_name'] ?></td>
                                            <td><?php echo $rows['user_email'] ?></td>
                                            <td><?php echo $rows['supplier_mail'] ?></td>
                                            <td><?php echo $rows['type'] ?></td>
                                            <td><?php echo $rows['date'] ?></td>
                                            <td><?php echo "Rs.".$rows['total'] ?></td>
                                            <td><?php echo $rows['payment'] ?></td>
                                            <td><a href="http://localhost/H20/non-retailer/item_delete.php?id=<?php echo $id ?>">
                                                <button class="del_btn">COMPLETE</button>
                                            </a></td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                    }
                ?>
            </table>
    </div>
  </div>
  <div id="tab2" class="tab-content">
  <div class="dashboard">
            <?php
            $data = $conn->query("SELECT * FROM feedback WHERE seller_type = 'non-retailer'");
            if($data->num_rows > 0)
            {
                while($rows = $data->fetch_assoc())
                {
                    ?>
                    <?php
                        $useremail = $rows['user_mailid'];
                        $feedback = $rows['feedback'];
                        $supplier = $rows['supplier'];
                        $data2 = $conn->query("SELECT user_name FROM user_table WHERE user_email = '$useremail'");
                        $user_name = $data2->fetch_assoc()['user_name'];
                        if($supplier == $_SESSION['mailid'])
                        {
                            ?>
                        <div class="feedback-card">
                        <img src="http://localhost/H20/images/retail.jpg" alt="Icon Image" class="iconn">
                        <h2><?php echo $user_name ?></h2>
                        <p><?php echo $feedback ?></p>
                    </div>
                        <?php
                        }             
                }
            }
        ?>
    </div>
</div>
<script src="non_retailer_dashboard_script.js"></script>
</body>
</html>
<?php
    include("../config/footer.php");
?>
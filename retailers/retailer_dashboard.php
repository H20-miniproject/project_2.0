<?php
    include("../config/supplier_header.php");
    include("../config/constants.php");
    if (isset($_SESSION["supplier_name"])) {
        $userName = $_SESSION["supplier_name"];
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
<link rel="stylesheet" href="retailer_dashboard_style.css">
<title>User Dashboard</title>
</head>
<body>
  <div class="tab">
    <button class="tab-button active" onclick="openTab(event, 'tab1')">BOOKINGS</button>
    <button class="tab-button" onclick="openTab(event, 'tab2')">FEEDBACK</button>
  </div>
  <div id="tab1" class="tab-content active">
    <div class="dashboard">
            <?php
            $data = $conn->query("SELECT * FROM retailer_table");
            if($data->num_rows > 0)
            {
                while($rows = $data->fetch_assoc())
                {
                    ?>
                    <div class="card">
                    <div class="card-image">
                    <img src="http://localhost/H20/images/retail.jpg" alt="Image Description">
                    </div>
                    <?php                   
                        $name = $rows['shopname'];
                        $phno = $rows['retailer_phno'];
                        $email = $rows['retailer_email'];
                    ?>
                    <h2><?php echo $name ?></h2>
                    <p><?php echo $phno ?></p>
                    <button class="button">BOOK NOW</button>
                    <a href="http://localhost/H20/user/feedback.php?mailid=<?php echo $email ?>"><button class="button">FEEDBACK</button></a>
                    </div>
                    <?php              
                }
            }
        ?>
    </div>
  </div>
  <div id="tab2" class="tab-content">
  <div class="dashboard">
            <?php
            $data = $conn->query("SELECT * FROM feedback");
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
                            <div class="card">
                            <div class="card-image"></div>
                            <h2><?php echo $user_name ?></h2>
                            <h3><?php echo $feedback ?></h3>
                            </div>
                        <?php
                        }             
                }
            }
        ?>
    </div>
</div>
<script src="retailer_dashboard_script.js"></script>
</body>
</html>
<?php
    include("../config/footer.php");
?>
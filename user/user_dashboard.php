<?php
    include("../config/user_header.php");
    include("../config/constants.php");
    $user_mailid = $_SESSION['user_mailid'];
    $_SESSION['user_mailid'] = $user_mailid;
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
<link rel="stylesheet" href="user_dashboard_style.css">
<title>User Dashboard</title>
</head>
<body>
  <div class="tab">
    <button class="tab-button active" onclick="openTab(event, 'tab1')">RETAILERS</button>
    <button class="tab-button" onclick="openTab(event, 'tab2')">NON RETAILERS</button>
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
            $data = $conn->query("SELECT * FROM non_retailers_table");
            if($data->num_rows > 0)
            {
                while($rows = $data->fetch_assoc())
                {
                    ?>
                    <div class="card">
                    <div class="card-image"></div>
                    <?php
                    $name = $rows['non_retailer_name'];
                    $phno = $rows['non_retailer_phno'];
                    $email = $rows['non_retailer_email'];
                    ?>
                    <h2><?php echo $name ?></h2>
                    <p><?php echo $phno ?></p>
                    <button class="button">BOOK NOW</button>
                    <a href="http://localhost/H20/user/feedback.php?mailid=<?php echo $email ?>"><button>FEEDBACK</button></a>
                    </div>
                    <?php              
                }
            }
        ?>
    </div>
</div>
<script src="user_dashboard_script.js"></script>
</body>
</html>
<?php
    include("../config/footer.php");
?>
<?php
    include("../config/user_header.php");
    include("../config/constants.php");
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
<div class="tab-container">
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
                    <?php
                    $name = $rows['shopname'];
                    $phno = $rows['retailer_phno'];
                    ?>
                    <h2><?php echo $name ?></h2>
                    <p><?php echo $phno ?></p>
                    <button>BOOK NOW</button>
                    <button>REVIEW</button>
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
                    <?php
                    $name = $rows['non_retailer_name'];
                    $phno = $rows['non_retailer_phno'];
                    ?>
                    <h2><?php echo $name ?></h2>
                    <p><?php echo $phno ?></p>
                    <button>BOOK NOW</button>
                    <button>REVIEW</button>
                    </div>
                    <?php              
                }
            }
        ?>
    </div>
  </div>
</div>
<script src="user_dashboard_script.js"></script>
</body>
</html>
<?php
    include("../config/footer.php");
?>
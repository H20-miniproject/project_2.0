<?php
  include("../config/constants.php");
  include("../config/header.php");
  if (isset($_SESSION["user_name"])) {
    $userName = $_SESSION["user_name"];
  } else {
      header("Location: http://localhost/H20/admin/admin_login.php");
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_home_page_style.css">
	<style>
    @import url('https://fonts.googleapis.com/css2?family=Russo+One&display=swap');
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
<div class="first_container">
    <div class="card">
        <?php
        $data = $conn->query("SELECT * FROM admin_table");
        ?>
        <h2><i class="fas fa-user-shield"></i> ADMIN</h2>
        <h3><?php echo $data->num_rows  ?></h3>
    </div>
    <div class="card">
        <?php
        $data = $conn->query("SELECT * FROM user_table");
        ?>
        <h2><i class="fas fa-user"></i> USER</h2>
        <h3><?php echo $data->num_rows  ?></h3>
    </div>
    <div class="card">
        <?php
        $data = $conn->query("SELECT * FROM retailer_table");
        ?>
        <h2><i class="fas fa-store"></i> RETAILER</h2>
        <h3><?php echo $data->num_rows  ?></h3>
    </div>
    <div class="card">
        <?php
        $data = $conn->query("SELECT * FROM non_retailers_table");
        ?>
        <h2><i class="fas fa-users"></i> NON-RETAILER</h2>
        <h3><?php echo $data->num_rows  ?></h3>
    </div>
</div>
<div class="container">
<div class="dashboard-card">
    <h2 class="card-title">
	<i class="fas fa-cogs"></i> Account Management</h2>
	<a href="http://localhost/H20/admin/admin_management.php"><button class="btn">CHECK</button></a>
</div>
<!-- Card 2 -->
<div class="dashboard-card">
    <h2 class="card-title"><i class="fas fa-chart-line"></i> Account Monitoring</h2>
	<a href="http://localhost/H20/admin/account_monitoring.php"><button class="btn"> Button
</button></a>
</div>
<!-- Card 3 -->
<div class="dashboard-card">
    <h2 class="card-title"><i class="fas fa-calendar-alt"></i> Booking Management</h2>
	<a href="http://localhost/H20/admin/booking_management.php"><button class="btn">CHECK</button></a>
</div>
<!-- Card 4 -->
<div class="dashboard-card">
    <h2 class="card-title"><i class="fas fa-money-check"></i> Payment Monitoring</h2>
	<a href="http://localhost/H20/admin/payment_management.php"><button class="btn">CHECK</button></a>
</div>
</div>


</body>
</html>

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
    <script src="user_dashboard_script.js"></script>
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
            if ($data->num_rows > 0) {
                while ($rows = $data->fetch_assoc()) {
                    $email = $rows['retailer_email'];
                    // Use a unique ID for each card
                    $cardId = "retailer-card-" . $email;
                    ?>
                    <div class="card">
                        <div class="card-image">
                            <img src="http://localhost/H20/images/retail.jpg" alt="Image Description">
                        </div>
                        <?php
                        $name = $rows['shopname'];
                        $availability = $rows['availability'];
                        $type = "retailer";
                        ?>
                        <h2><?php echo $name ?></h2>
                        <h4><?php echo $availability ?></h4>
                        <!-- Add a data attribute with the card ID -->
                        <?php if ($availability == 'available') { ?>
                        <a href="http://localhost/H20/booking/booking.php?mailid=<?php echo $email ?>&type=<?php echo $type ?>"><button class="button book-now-button">BOOK NOW</button></a>
                        <?php } else { ?>
                            <button class="button book-now-button disabled">BOOK NOW</button>
                        <?php } ?>
                        <a href="http://localhost/H20/user/feedback.php?mailid=<?php echo $email ?>&type=<?php echo $type ?>"><button class="button">FEEDBACK</button></a>                    
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
            if ($data->num_rows > 0) {
                while ($rows = $data->fetch_assoc()) {
                    $email = $rows['non_retailer_email'];
                    // Use a unique ID for each card
                    $cardId = "non-retailer-card-" . $email;
                    ?>
                    <div class="card">
                        <div class="card-image"></div>
                        <?php
                        $name = $rows['non_retailer_name'];
                        $availability = $rows['availability'];
                        $type = "non-retailer";
                        ?>
                        <h2><?php echo $name ?></h2>
                        <h4><?php echo $availability ?></h4>
                        <!-- Add a data attribute with the card ID -->
                        <button class="button book-now-button" data-card="<?php echo $cardId ?>">BOOK NOW</button>
                        <a href="http://localhost/H20/user/feedback.php?mailid=<?php echo $email ?>&type=<?php echo $type ?>"><button>FEEDBACK</button></a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</body>
</html>


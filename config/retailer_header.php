<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        header {
            background-color: #333;
            padding: 2px;
            text-align: center;
            position: relative; /* Add this for positioning */
        }

        header h1, header p {
            color: white;
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav li {
            margin: 0 15px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
        }

        nav a:hover i {
            transform: scale(1.2);
        }

        /* New styles for the user icon or alphabet icon */
        .user-icon {
        position: absolute;
        top: 35px;
        left: 1000px; /* Change right to left to move it to the left */
    }

    .user-icon img {
        width: 40px; /* Increase the width to make the icon larger */
        height: 40px; /* Increase the height to make the icon larger */
        border-radius: 50%; /* Make the image round if desired */
    }

    /* Updated styles for the alphabet icon */
    .alphabet-icon {
        width: 40px;
    height: 40px;
    background-color: #05b5fd;
    color: white;
    text-align: center;
    line-height: 40px;
    font-size: 25px;
    border-radius: 50%; /* Make the alphabet icon round */
    border: 2px solid white;
    }
    @media (max-width: 768px) {
            .user-icon {
                left: 5px;
                top: 5px;
            }
        }
    </style>
</head>
<?php
    session_start();

    // Check if the session variable is set
    if (isset($_SESSION["supplier_name"])&&isset($_SESSION["mailid"])) {
        $userName = $_SESSION["supplier_name"];
        $mailid = $_SESSION['mailid'];
        $_SESSION['mailid'] = $mailid;
    } else {
        $userName = "Guest"; // Default value if session variable is not set
    }
?>
<body>
    <header>
        <h1>Welcome <?php echo $userName; ?></h1>
        <nav>
            <ul>
                <li><a href="http://localhost/H20/retailers/retailer_dashboard.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="http://localhost/H20/retailers/profile.php?mailid=<?php echo $mailid ?>"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="http://localhost/H20/user/user_logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>
        <div class="user-icon">
            <?php
            // Check if the image file exists
            $userIconPath = 'path/to/your/user-icon.png'; // Replace with the actual path to your image
            if (file_exists($userIconPath)) {
                echo '<img src="' . $userIconPath . '" alt="User Icon">';
            } else {
                // If the image doesn't exist, display an alphabet icon with a sky-blue background
                echo '<div class="alphabet-icon">U</div>';
            }
            ?>
        </div>
    </header>
</body>
</html>

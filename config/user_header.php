<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style> 
        header {
            background-color: #3498db;
            padding: 10px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        header h1, header p {
            color: white;
        }
        nav ul {
            list-style: none;
            padding: 10;
            display: flex;
            justify-content: center;
        }
        
        nav li {
            margin: 0 15px;
        }
        
        nav a {
            color: white; /* Change text color to white */
            text-decoration: none;
            display: flex;
            align-items: center; /* Align icon and text vertically */
        }
        nav a:hover i {
            transform: scale(1.2);
        }

        /* New styles for the user icon or alphabet icon */
        .user-icon {
            position: absolute;
            top: 35px;
            left: 1000px;

        }

        .user-icon img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
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
            border-radius: 50%;
            border: 3px solid white;
        }

        /* Set the color of the icons to white */
        .nav-icon {
            color: white;
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
    if (isset($_SESSION["user_name"])) {
        $userName = $_SESSION["user_name"];
        $mailid = $_SESSION['mailid'];
    } else {
        $userName = "Guest";
    }
?>
<body>
<header>
    <h1>Welcome <?php echo $userName; ?></h1>
    <nav>
        <ul>
            <li><a href="http://localhost/H20/user/user_dashboard.php"><i class="fas fa-home nav-icon"></i> Home</a></li>
            <li><a href="http://localhost/H20/user/user_profile.php?mailid=<?php echo $mailid ?>"><i class="fas fa-user nav-icon"></i> Profile</a></li>
            <li><a href="http://localhost/H20/user/user_logout.php"><i class="fas fa-sign-out-alt nav-icon"></i> Logout</a></li>
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

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

    </style>
</head>
<?php
    session_start();

    // Check if the session variable is set
    if (isset($_SESSION["supplier_name"])) {
        $userName = $_SESSION["supplier_name"];
    } else {
        $userName = "Guest"; // Default value if session variable is not set
    }
?>
<body>
<header>
<header>
    <h1>Welcome <?php echo $userName; ?></h1>
    <nav>
            <ul>
                <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="#"><i class="fas fa-user"></i> User's Name</a></li>
                <li><a href="http://localhost/H20/user/user_logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>
</header>

</header>

</body>
</html>


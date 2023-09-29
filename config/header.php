<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style> 
    body{
        margin:0;
        font-family: 'Montserrat', sans-serif;
    }
        header {
            background-color: #333;
            padding: 20px;
            text-align: center;
            position: relative;
        }
        header h1, header p {
            color: white;
        }
        /* Style for the logout icon */
/* Style for the logout icon */
.logout a i {
    color: red; /* Default color */
    transition: transform 0.3s ease-in-out;
}

/* Style for the logout text */
.logout a {
    text-decoration: none;
    transition: color 0.3s ease-in-out;
    color: red; /* Default color */
}

/* Add a hover animation for the icon */
.logout a:hover i {
    transform: rotate(180deg);
}

/* Change color when clicked */
.logout.clicked a {
    color: red; /* Color when clicked */
}



    </style>
</head>
<?php
    session_start();

    // Check if the session variable is set
    if (isset($_SESSION["user_name"])) {
        $userName = $_SESSION["user_name"];
    } else {
        $userName = "Guest"; // Default value if session variable is not set
    }
?>
<body>
<header>
    <h1>Welcome <?php echo $userName; ?></h1>
    <div class="logout">
    <a href="../admin/admin_logout.php">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
</div>

</header>


</body>
</html>


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
            padding: 10px;
            text-align: center;
        }
        header h1, header p {
            color: white;
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
<header>
    <h1>Welcome <?php echo $userName; ?></h1>
</header>

</header>

</body>
</html>


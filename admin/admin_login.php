<?php
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="admin_login_style.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="login.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
	<div class="container">
			<div class="right">
				<h2>ADMIN SIGN IN</h2>
				<form method="POST" action="">
				<input type="text" class="field" placeholder="Mail id" name="mailid" required>
				<input type="password" class="field" placeholder="Password" name="password" required>
				<button class="btn" type="submit" name="submit">Sign in</button>
				</form>
				<table>
					<tr>
						<td ><a href="#" class="forgot-password">Forgot Password?</a></td>
				</table>
			</div>
		</div>
	<?php
		include("../config/constants.php");
            if(isset($_POST['submit']))
            {
				$mailid = $_POST['mailid'];
				$password = $_POST['password'];
                $data = $conn->query("SELECT admin_name,admin_mailid,admin_password from admin_table where admin_mailid = '$mailid' and admin_password = '$password'");
                if($data->num_rows> 0)
                {
					while($row = $data->fetch_assoc())
							{$name = $row['admin_name'];}
						session_start();

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
							$_SESSION["user_name"] = $name; // Store the name in a session variable
							header("Location: http://localhost/H20/admin/admin_home_page.php"); // Redirect to page2.php
							exit();
						}
	
                }
                else
                {
                    echo "<script>alert('wrong username or password')</script>";
                }
            }
	?>
</body>
</html>
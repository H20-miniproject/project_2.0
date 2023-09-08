<?php
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="login.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
	<div class="container">
		<div class="logo">
		</div>
		<div class="contact-box">
			<div class="left">
			</div>
			<div class="right">
				<h2>SIGN IN</h2>
				<form method="POST" action="">
				<select id="user-selection" class="field" name="choice">
					<option>Select the user</option>
					<option value="user">User</option>
					<option value="retailer">Retailer</option>
					<option value="non_retailer">Non_Retailer</option>
				</select>
				<input type="text" class="field" placeholder="Mail id" name="mailid" required>
				<input type="password" class="field" placeholder="Password" name="password" required>
				<button class="btn" type="submit" name="submit">Sign in</button>
				</form>
				<table>
					<tr>
						<td ><a href="#" class="forgot-password">Forgot Password?</a></td>
						<td style="padding-left: 87px;"><a href="signup.html" class="forgot-password">New user, Register?</a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<?php
		 $conn = new mysqli('localhost','root','','h2o_watersupply');
		 if($conn->connect_error)
		 {
			 echo "<script>alert('Something went wrong')</script>";
		 }
		 else
		 {
			if(isset($_POST['submit']))
			{
				$mailid = $_POST['mailid'];
				$password = $_POST['password'];
				if($_POST['choice']=="user")
				{
					$data = $conn->query("SELECT user_password,user_name FROM user_table WHERE user_email = '$mailid'");
					if($data->num_rows>0)
					{
						while($result=$data->fetch_assoc())
						{
							$pass = $result['user_password'];
							$name = $result['user_name'];
							if($pass == $password)
						{
							session_start();


							if ($_SERVER["REQUEST_METHOD"] == "POST") {
								$_SESSION["user_name"] = $name; // Store the name in a session variable
								header("Location: http://localhost/H20/user/user_dashboard.php"); // Redirect to page2.php
								exit();
							}
						}
						else
						{
							echo "<script>alert('Wrong password')</script>";
						}
						}
					}
					else
					{
						echo "<script>alert('Mailid not registered')</script>";
					}
				}
				if($_POST['choice']=="retailer")
				{
					$data = $conn->query("SELECT retailer_password FROM retailer_table WHERE retailer_email = '$mailid';");
					if($data->num_rows>0)
					{
						$pass =  $data->fetch_assoc()['retailer_password'];
						if($pass == $password)
						{
							echo "<script>alert('Successfully logged in')</script>";
						}
						else
						{
							echo "<script>alert('Wrong password')</script>";
						}
					}
					else
					{
						echo "<script>alert('Mailid not registered')</script>";
					}
				}
				if($_POST['choice']=="non_retailer")
				{
					$data = $conn->query("SELECT non_retailer_password FROM non_retailers_table WHERE non_retailer_email = '$mailid';");
					if($data->num_rows>0)
					{
						$pass =  $data->fetch_assoc()['non_retailer_password'];
						if($pass == $password)
						{
							echo "<script>alert('Successfully logged in')</script>";
						}
						else
						{
							echo "<script>alert('Wrong password')</script>";
						}
					}
					else
					{
						echo "<script>alert('Mailid not registered')</script>";
					}
				}
			}
		 }
	?>
</body>
</html>


<?php
    include("../config/user_header.php");
    include("../config/constants.php");
    if(isset($_SESSION['user_email']) and isset($_SESSION['billid']))
    {
        $user_mailid = $_SESSION['user_email'];
    }
    else
    {
        header("Location: http://localhost/H20/home/homepage.html");
        exit();
    }
?>
<?php
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $c_num = $_POST['cnum'];
        $cvv = $_POST['cvv'];
        $billid = $_SESSION['billid'];
        if($conn->query("INSERT INTO `billing_data`(`fullname`, `bill_email`, `bill_address`, `card_number`, `cvv`, `user_mail`, `id`) VALUES ('$name','$email','$address','$c_num','$cvv','$user_mailid','$billid')"))
        {
            $conn->query("UPDATE booking SET payment = 'paid' WHERE id='$billid'");
			header("Location: http://localhost/H20/invoice/invoice.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="payment.css">
	<style>
		/* Card styles */
	body{
		margin:0;
	}
	.container {
	background: white;
    max-width: 769px;
    max-width: 775px;
    min-height: 287px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 4.5rem 1.5rem;
    margin: 0 auto;
    margin-top: 8px;
    box-shadow: 6px 4px 10px rgba(0, 0, 0, 0.2);
    border-radius: 5px
		}

		.left {
			flex-basis: 50%;
		}

		.right {
			flex-basis: 40%;
		}

		form {
			padding: 1rem;
		}

		h3 {
			margin-top: 1rem;
			color: #2c3e50;
		}

		form input[type="text"] {
			width: 100%;
			padding: 0.5rem 0.7rem;
			margin: 0.5rem 0;
			outline: none;
		}

		#zip {
			display: flex;
			margin-top: 0.5rem;
		}

		#zip select {
			padding: 0.5rem 0.7rem;
		}

		#zip input[type="number"] {
			padding: 0.5rem 0.7rem;
			margin-left: 5px;
		}

		input[type="submit"] {
			width: 100%;
			padding: 0.7rem 1.5rem;
			background: #34495e;
			color: white;
			border: none;
			outline: none;
			margin-top: 1rem;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background: #2c3e50;
		}

		form input[name="cnum"] {
			width: 100%;
			padding: 0.5rem 0.7rem;
			margin: 0.5rem 0;
			outline: none;
		}

		/* Style for CVV */
		form input[name="cvv"] {
			width: 100%;
			padding: 0.5rem 0.7rem;
			margin: 0.5rem 0;
			outline: none;
		}

		@media only screen and (max-width: 770px) {
			.container {
				flex-direction: column;
			}
			body {
				overflow-x: hidden;
			}
		}
		.cnum
		{
			padding:10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="left">
			<h3>BILLING ADDRESS</h3>
			<form action="" method="POST">
				Full name
				<input type="text" name="name" placeholder="Enter name" required>
				Email
				<input type="text" name="email" placeholder="Enter email" required>
				Address
				<input type="text" name="address" placeholder="Enter address" required>
			</div>
			<div class="right">
				<h3>PAYMENT</h3>
				Accepted Card <br>
				<img src="../images/card1.png" width="100">
				<img src="../images/card2.png" width="50">
				<br><br>

				Credit card number
				<input class="cnum" type="password" name="cnum" placeholder="Enter card number" required>
				
				<div id="zip">
					<label>
					CVV
					<input class="cnum" type="password" name="cvv" placeholder="CVV" maxlength="3" required>
				</label>
			</div>
			<input type="submit" name="submit" value="Proceed to Checkout">
		</form>
	</div>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="admin_login_style.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="login.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script>
        const error_msg = [];
        function checkemail()
        {
        var email = document.getElementsByName('mailid')[0].value;
        if(email)
        {
            $.ajax({
            type: 'post',
            url: 'add_admin_php.php',
            data:{
            admin_email:email,
            },
            success: function (response) {
                if(response == "Email Already Exist")
                {
                if(!("Email Already Exist" in error_msg))
                {
                    error_msg.push("Email Already Exist");
                    show_error();
                }
                }
                else
                {
                var indexToRemove = error_msg.indexOf("Email Already Exist");
                if (indexToRemove !== -1) {
                    error_msg.splice(indexToRemove, 1);
                }
                show_error();
                }
            }
            });
        }
        }
        function show_error()
        {
        if (error_msg && error_msg.length === 0) {
            document.getElementById("status").innerText = "";
        } else {
            document.getElementById("status").innerText = error_msg[error_msg.length-1];
        }

        }
        function validation()
        {
        if(document.getElementById("status").innerText == "")
        {
            return true;
        }
        else
        {
            return false;
        }
        }
    </script>
</head>
<body>
	<div class="container">
			<div class="right">
				<h2>ADMIN UPDATE</h2>
                <span id="status" style="color:red;font-weight:bold;" class="fade-in"></span>
				<form method="POST" action=" ">
                <input type="text" class="field" placeholder="Name" name="name" required>
				<input type="email" class="field" placeholder="Mail id" name="mailid" onfocusout="checkemail()" required>
				<button class="btn" type="submit" name="submit" onsubmit="return validation()">Submit</button>
				</form>
			</div>
		</div>
        <?php
            session_start();
            include("../config/constants.php");
            $id = $_GET['id'];
            if(isset($_POST['submit']))
            {
                $name = $_POST['name'];
                $mailid = $_POST['mailid'];
                $res = $conn->query("UPDATE admin_table SET admin_name = '$name',admin_mailid = '$mailid' WHERE  admin_id = '$id'");
                if($res == True)
                {
                    $_SESSION['msg'] = "Admin updated successfully";
                    header("Location: http://localhost/H20/admin/admin_management.php");
                }
                else
                {
                    $_SESSION['msg'] = "Admin updation failed!!";
                    header("Location: http://localhost/H20/admin/admin_management.php");
                }
            }
        ?>
</body>
</html>
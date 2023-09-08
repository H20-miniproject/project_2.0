<?php
        session_start();
		$conn = new mysqli('localhost','root','','h2o_watersupply');
		if($conn->connect_error)
		{
			echo "<script>alert('Something went wrong')</script>";
		}
        else
        {
            if(isset($_POST['admin_email']))
            {
                $emailId=$_POST['admin_email'];

                $checkdata=" SELECT admin_mailid FROM admin_table WHERE admin_mailid='$emailId' ";

                $result = $conn->query($checkdata);
                
                if($result->num_rows > 0)
                {
                    echo "Email Already Exist";
                }
                else
                {
                    echo "null";
                }
            }
            if(isset($_POST['submit']))
            {
                $name = $_POST['name'];
                $mailid = $_POST['mailid'];
                $password = $_POST['c_password'];

                $sql_query = "INSERT INTO admin_table(admin_name,admin_mailid,admin_password)
                        VALUES('$name','$mailid','$password');";

                if($conn->query($sql_query)==True)
                {
                    $_SESSION['msg'] = "Admin added successfully";
                    header("Location: http://localhost/H20/admin/admin_management.php");

                }
                else
                {
                    $_SESSION['msg'] = "Something went wrong";
                    header("Location: http://localhost/H20/admin/admin_management.php");
                }
            }
        }
	?>
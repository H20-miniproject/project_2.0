<?php
    include("../config/user_header.php");
    include("../config/constants.php");
	$user_mailid = $_SESSION['user_mailid'];
	if(isset($_GET['mailid'])&& isset($_GET['type'])){
		$supplier_mailid = $_GET['mailid'];
    $type = $_GET['type'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Styling for the card container */

        .card {
    background-color: #fff;
    border-radius: 14px;
    padding: 41px;
    width: 304px;
    display: flex;
    flex-direction: column;
    margin: 0 auto; /* Center horizontally */
    margin-top: 12px; /* Center vertically (adjust as needed) */
  }

.title {
  font-size: 24px;
  font-weight: 600;
  text-align: center;
}

.form {
  margin-top: 20px;
  display: flex;
  flex-direction: column;
}

.group {
  position: relative;
}

.form .group label {
  font-size: 14px;
  color: rgb(99, 102, 102);
  position: absolute;
  top: -10px;
  left: 10px;
  background-color: #fff;
  transition: all .3s ease;
}

.form .group input,
.form .group textarea {
  padding: 10px;
  border-radius: 5px;
  border: 1px solid rgba(0, 0, 0, 0.2);
  margin-bottom: 20px;
  outline: 0;
  width: 100%;
  background-color: transparent;
}

.form .group input:placeholder-shown+ label, .form .group textarea:placeholder-shown +label {
  top: 10px;
  background-color: transparent;
}

.form .group input:focus,
.form .group textarea:focus {
  border-color: #3366cc;
}

.form .group input:focus+ label, .form .group textarea:focus +label {
  top: -10px;
  left: 10px;
  background-color: #fff;
  color: #3366cc;
  font-weight: 600;
  font-size: 14px;
}

.form .group textarea {
  resize: none;
  height: 100px;
}

.button {
  background-color: #3366cc;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px;
  font-size: 16px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.button:hover {
  background-color: #27408b;
}

    </style>
</head>
<body style="background-color: #e8e8e8;  margin: 0;
  padding: 0;">
<div class="card">
  <span class="title">Leave a Review</span>
  <form class="form" method="POST" action="">
<div class="group">
    <textarea placeholder="" id="comment" name="feedback" rows="5" required=""></textarea>
    <label for="comment">Your Review please</label>
</div>
    <input class="button" type="submit" name="submit">
  </form>
</div>

	<?php
		if(isset($_POST['submit']))
		{
			$feedback = $_POST['feedback'];
			if($conn->query("INSERT INTO feedback(`user_mailid`, `feedback`, `supplier`,seller_type) VALUES ('$user_mailid','$feedback','$supplier_mailid','$type')") == True)
			{
				echo "<script>alert('data inserted successfully')</script>";
			}
      else
		  {
			  echo "<script>alert('something went wrong')</script>";
		  }
		}
    else
    {
      echo "<script>alert('value not available')</script>";
    }
	?>
</body>
</html>
<?php
    include("../config/footer.php");
?>
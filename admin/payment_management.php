<?php
    include("../config/header.php");
    // Check if the session variable is set
    if (isset($_SESSION["user_name"])) {
        $userName = $_SESSION["user_name"];
    } else {
        header("Location: http://localhost/H20/admin/admin_login.php");
        exit();
    }
    ?>
<html>
    <head>
        <link rel="stylesheet" href="admin_style.css">
        <style>  @import url('https://fonts.googleapis.com/css2?family=Poppins&family=Secular+One&display=swap');</style>
    </head>
    <body>
        <div class="tablecontent">
            <h3>Manage Booking</h3>
            <br><br>
            <?php
            if(isset($_SESSION['msg']))
            {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <table>
                <tr>
                    <th>User Name</th>
                    <th>User Mail</th>
                    <th>Address</th>
                    <th>Card Number</th>
                </tr>
                <?php
                    $conn = new mysqli('localhost','root','','h2o_watersupply');
                    if($conn->connect_error)
                    {
                        echo "<script>alert('Something went wrong')</script>";
                    }
                    else
                    {
                        $data = $conn->query("SELECT * FROM billing_data");
                        if($data->num_rows > 0)
                        {
                            while($rows = $data->fetch_assoc())
                            {
                                ?>
                                <tr>
                                        <td><?php echo $rows['fullname'] ?></td>
                                        <td><?php echo $rows['bill_email'] ?></td>
                                        <td><?php echo $rows['bill_address'] ?></td>
                                        <td><?php echo $rows['card_number'] ?></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                ?>
            </table>
        </div>
    </body>
</html>
<?php
  include("../config/footer.php");
?>
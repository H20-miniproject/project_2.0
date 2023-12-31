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
                    <th>Supplier Mail</th>
                    <th>Supplier Type</th>
                    <th>Total Amount</th>
                </tr>
                <?php
                    $conn = new mysqli('localhost','root','','h2o_watersupply');
                    if($conn->connect_error)
                    {
                        echo "<script>alert('Something went wrong')</script>";
                    }
                    else
                    {
                        $data = $conn->query("SELECT * FROM booking");
                        if($data->num_rows > 0)
                        {
                            while($rows = $data->fetch_assoc())
                            {
                                ?>
                                <tr>
                                        <td><?php echo $rows['user_name'] ?></td>
                                        <td><?php echo $rows['user_email'] ?></td>
                                        <td><?php echo $rows['supplier_mail'] ?></td>
                                        <td><?php echo $rows['type'] ?></td>
                                        <td><?php echo "Rs.".$rows['total'] ?></td>
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
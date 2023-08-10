<?php
session_start();

// Check if the session variable is set
if (isset($_SESSION["user_name"])) {
    $userName = $_SESSION["user_name"];
} else {
    $userName = "Guest"; // Default value if session variable is not set
}
?>
<html>
    <head>
        <link rel="stylesheet" href="admin_style.css">
        <style>  @import url('https://fonts.googleapis.com/css2?family=Poppins&family=Secular+One&display=swap');</style>
    </head>
    <body>
        <div class="heading">
            <h3>Welcome <?php echo $userName; ?></h3>
        </div>
        <div class="tablecontent">
            <h3>Manage Admin</h3>
            <a href="add_admin.html"><button class="btn_add_admin">ADD ADMIN</button></a>
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
                    <th>Id</th>
                    <th>Name</th>
                    <th>Mail Id</th>
                    <th>Actions</th>
                </tr>
                <?php
                    $conn = new mysqli('localhost','root','','h2o_watersupply');
                    if($conn->connect_error)
                    {
                        echo "<script>alert('Something went wrong')</script>";
                    }
                    else
                    {
                        $data = $conn->query("SELECT * FROM admin_table");
                        if($data->num_rows > 0)
                        {
                            while($rows = $data->fetch_assoc())
                            {
                                $id = $rows['admin_id'];
                                $name = $rows['admin_name'];
                                $mailid = $rows['admin_mailid'];
                                ?>
                                <tr>
                                    <td><?php echo $id?></td>
                                    <td><?php echo $name?></td>
                                    <td><?php echo $mailid?></td>
                                    <td><button class="upd_btn">UPDATE</button>&nbsp&nbsp<?php if ($userName != $name) { ?>
                                            <a href="http://localhost/H20/admin/delete_admin.php?id=<?php echo $id ?>">
                                                <button class="del_btn">DELETE</button>
                                            </a>
                                        <?php } else { ?>
                                            <button class="del_btn disabled" disabled>DELETE</button>
                                        <?php } ?></td>
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
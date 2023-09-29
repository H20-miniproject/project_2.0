<?php
    include("../config/header.php");
    include("../config/constants.php");
    // Check if the session variable is set
    if (isset($_SESSION["user_name"])) {
        $userName = $_SESSION["user_name"];
    } else {
        header("Location: http://localhost/H20/admin/admin_login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  .tabs-container {
    display: flex;
    justify-content: center;
    margin-top:-200px;
    align-items: center;
    height: 100vh;
  }

  .tab-card {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding-left: 20px;
    padding-right: 20px;
    width: 100%;
    margin: 20px;
    margin-bottom: -27px;
    position: fixed;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .tab-content {
    display: none;
  }

  .active {
    display: block;
  }

  .tab-buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    margin-bottom:30px
  }

  .tab-button {
    padding: 15px 80px; /* Adjusted padding */
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
  }
  .tabcontent {
    display: none;
    animation: fadeEffect 1s; /* Fading effect takes 1 second */
  }

  table{
    width: 100%;
}
    table tr th
    {
        text-align: left;
        background-color: rgb(11, 173, 173);
        color: white;
        padding-left: 5px;
        border: 2px solid black;
    }

    .del_btn
{
    background-color: rgb(221, 95, 93);
    border: 2px solid rgb(221, 95, 93);
    border-radius: 5px;
    color: rgb(0, 0, 0);
    padding: 8px; 
    transition: .1s;
}
.del_btn:hover
{
    background-color: rgb(224, 53, 50);
    border: 2px solid rgb(224, 53, 50);
}

  /* Go from zero to full opacity */
  @keyframes fadeEffect {
    from { opacity: 0; }
    to { opacity: 1; }
  }
  .tab-content
  {
    padding:10px
  }
  
</style>
<title>Tabbed Cards</title>
</head>
<body>
<div class="tabs-container">
  <div class="tab-card">
    <div class="tab-buttons">
      <button class="tab-button" onclick="openTab(0)">USER</button>
      <button class="tab-button" onclick="openTab(1)">RETAILER</button>
      <button class="tab-button" onclick="openTab(2)">NON RETAILER</button>
    </div>
    <?php
            if(isset($_SESSION['msg']))
            {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
    <div class="tab-content active" id="tab1">
      <h3>USER ACCOUNTS</h3>
      <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Mail Id</th>
                    <th>Phone Number</th>
                    <th>Place</th>
                    <th>District</th>
                    <th>Actions</th>
                </tr>
                <?php
                        $data = $conn->query("SELECT * FROM user_table");
                        {
                            while($rows = $data->fetch_assoc())
                            {
                                $id = $rows['user_id'];
                                $name = $rows['user_name'];
                                $mailid = $rows['user_email'];
                                $phno = $rows['user_phno'];
                                $place= $rows['user_place'];
                                $district_id = $rows['user_district_id'];

                                $data2 = $conn->query("SELECT district_name FROM district WHERE d_id = '$district_id'");
                                $row2 = $data2->fetch_assoc();
                                $district = $row2['district_name'];
                                ?>
                                <tr>
                                    <td><?php echo $id?></td>
                                    <td><?php echo $name?></td>
                                    <td><?php echo $mailid?></td>
                                    <td><?php echo $phno?></td>
                                    <td><?php echo $place?></td>
                                    <td><?php echo $district?></td>
                                    <td><a href="http://localhost/H20/admin/user_delete.php?id=<?php echo $id ?>"><button class="del_btn">DELETE</button>
                                            </a></td>
                                </tr>
                                <?php
                            }
                        }
                ?>
            </table>
    </div>
    <div class="tab-content" id="tab2">
    <h3>RETAILER ACCOUNTS</h3>
      <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Mail Id</th>
                    <th>Phone Number</th>
                    <th>Place</th>
                    <th>District</th>
                    <th>Actions</th>
                </tr>
                <?php
                        $data = $conn->query("SELECT * FROM retailer_table");
                        {
                            while($rows = $data->fetch_assoc())
                            {
                                $id = $rows['id'];
                                $name = $rows['shopname'];
                                $mailid = $rows['retailer_email'];
                                $phno = $rows['retailer_phno'];
                                $place= $rows['retailer_place'];
                                $district_id = $rows['retailer_district_id'];

                                $data2 = $conn->query("SELECT district_name FROM district WHERE d_id = '$district_id'");
                                $row2 = $data2->fetch_assoc();
                                $district = $row2['district_name'];
                                ?>
                                <tr>
                                    <td><?php echo $id?></td>
                                    <td><?php echo $name?></td>
                                    <td><?php echo $mailid?></td>
                                    <td><?php echo $phno?></td>
                                    <td><?php echo $place?></td>
                                    <td><?php echo $district?></td>
                                    <td><a href="http://localhost/H20/admin/retailer_delete.php?id=<?php echo $id ?>"><button class="del_btn">DELETE</button>
                                            </a></td>
                                </tr>
                                <?php
                            }
                        }
                ?>
            </table>
    </div>
    <div class="tab-content" id="tab3">
    <h3>NON RETAILER ACCOUNTS</h3>
      <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Mail Id</th>
                    <th>Phone Number</th>
                    <th>Place</th>
                    <th>District</th>
                    <th>Actions</th>
                </tr>
                <?php
                        $data = $conn->query("SELECT * FROM non_retailers_table");
                        {
                            while($rows = $data->fetch_assoc())
                            {
                                $id = $rows['id'];
                                $name = $rows['non_retailer_name'];
                                $mailid = $rows['non_retailer_email'];
                                $phno = $rows['non_retailer_phno'];
                                $place= $rows['non_retailer_place'];
                                $district_id = $rows['non_retailer_district_id'];

                                $data2 = $conn->query("SELECT district_name FROM district WHERE d_id = '$district_id'");
                                $row2 = $data2->fetch_assoc();
                                $district = $row2['district_name'];
                                ?>
                                <tr>
                                    <td><?php echo $id?></td>
                                    <td><?php echo $name?></td>
                                    <td><?php echo $mailid?></td>
                                    <td><?php echo $phno?></td>
                                    <td><?php echo $place?></td>
                                    <td><?php echo $district?></td>
                                    <td><a href="http://localhost/H20/admin/non_retailer_delete.php?id=<?php echo $id ?>"><button class="del_btn">DELETE</button>
                                            </a></td>
                                </tr>
                                <?php
                            }
                        }
                ?>
            </table>
    </div>
  </div>
</div>

<script>
  function openTab(tabIndex) {
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => content.style.display = 'none');
    tabContents[tabIndex].style.display = 'block';
  }
</script>
</body>
</html>

<?php
    include("../config/footer.php");
?>
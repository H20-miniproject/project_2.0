<?php
include("../config/constants.php");

$query = "SELECT `district_name` FROM `district`"; // Adjust the query according to your table structure

$result = $conn->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['district_name'] . '">' . $row['district_name'] . '</option>';
}
    }
 else {
    echo "<script>'Error fetching data from the database: ' . $conn->error</script>";
}

$conn->close();
?>

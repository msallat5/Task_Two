<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "button_log";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT click_time, button_clicked FROM button_clicks ORDER BY id DESC LIMIT 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>Time: " . $row["click_time"] . " - Button: " . $row["button_clicked"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "0 results";
}
$conn->close();
?>

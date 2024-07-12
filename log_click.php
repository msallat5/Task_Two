<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "button_log";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$button = $_GET['button'];
$stmt = $conn->prepare("INSERT INTO button_clicks (click_time, button_clicked) VALUES (NOW(), ?)");
$stmt->bind_param("s", $button);
if ($stmt->execute()) {
    echo "Record logged successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

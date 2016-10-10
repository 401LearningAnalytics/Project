<html><body><h1>My site works</h1></body></html>

<?php
$servername = "localhost";
$username = "root";
$password = "117130";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

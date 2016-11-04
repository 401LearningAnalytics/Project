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
echo "Connected successfully\n";





//one sql query for creating each table
echo"<br></br>";
$sql1 = "create database learner;";
if ($conn->query($sql1) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error;
}




echo"<br></br>";
$sql1 = "use learner;";
if ($conn->query($sql1) === TRUE) {
    echo "Database switched successfully\n";
} else {
    echo "Error switching database: " . $conn->error;
}

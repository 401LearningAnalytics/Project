<?php
/** This page is testing if it is successfullly
  * connecting to mysql database or not
  *
  * The default servername is localhost
  * If connection failed, it will return error message
  * 
  * @package server
  * @author  Hong Chen <chen1@ualberta.ca> 2016
  *
  * @since 1.0
  *
  */
?>
<html><body><h1>My site works</h1></body></html>

<?php
$servername = "localhost";
$username = "Wei";
$password = "123456";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

<?php

function connection(){

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

  return $conn;
}

function get_quiz($conn){

  $sql1 = "";
  $grade_array;
  if ($conn->query($sql1) === TRUE) {
      echo "get quiz\n";
      return $grade_array;
  } else {
      echo "Error creating database: " . $conn->error;
  }
}

?>

}

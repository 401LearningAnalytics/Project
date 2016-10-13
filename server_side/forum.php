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

function forum_activity($conn){

  $sql1 = "";
  $forum_activity_array;
  if ($conn->query($sql1) === TRUE) {
      echo "get quiz\n";
      return $forum_activity_array;
  } else {
      echo "Error creating database: " . $conn->error;
  }
}

?>

}

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

function get_student($conn){

  $sql1 = "";
  $student_id;
  $student_grade;
  $student_quiz;
  $student_forum_id;
  if ($conn->query($sql1) === TRUE) {
      echo "get quiz\n";
      return $student_grade,$student_forum_id,$student_quiz;
  } else {
      echo "Error creating database: " . $conn->error;
  }
}

?>

}

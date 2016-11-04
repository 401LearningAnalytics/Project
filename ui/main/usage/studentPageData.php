

<?php

$student_id = $_GET["student_id"];

// connect to mysql database
$link = mysqli_connect("localhost", "Wei", "123456", "learner");

/* check connection */
if (mysqli_connect_errno()) {
    exit();
}else{
}

$sql = "SELECT course_id, course_item_grade_overall, course_item_id FROM course_item_grades where ualberta_user_id = \"".$student_id."\";";

if ($result = mysqli_query($link, $sql)) {

    //echo "Fetching data success<br>";

    $i = 0;
    $commands;
    $allallmarks;
    $courses;
    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
      //echo $row[0]." ".$row[1]." ".$row[2]."<br>";

      $courses[$i] = $row[0];
      $allmarks[$i] = $row[1];

      $sql2 = "SELECT course_item_name FROM course_items where course_item_id = \"".$row[2]."\";";
      $commands[$i] = $sql2;
      $i += 1;


      /*
      $result2 = mysqli_query($link, $sql2);
      $row2 = mysqli_fetch_row($result);
      */
    }
    mysqli_free_result($result);

    $n = 0;
    // for course 1
    $row_names;
    $marks1;
    $a = 0;

    // for course 2
    $row_names2;
    $marks2;
    $b = 0;

    // for course 3
    $row_names3;
    $marks3;
    $c = 0;

    // for course 4
    $row_names4;
    $marks4;
    $d = 0;

    // for course 5
    $row_names5;
    $marks5;
    $e = 0;

    // for course 6
    $row_names6;
    $marks6;
    $f = 0;


    // for each course, get the names for the row in each chart
    while($n <= $i){

      // course 1
      if ($courses[$n] == "DYv7azSfEeWgIQ7IEhB31Q"){
        $result = mysqli_query($link, $commands[$n]);
        $row = mysqli_fetch_row($result);
        $marks1[$a] = $allmarks[$n];
        $row_names[$a] = $row[0];
        $a += 1;
      }

      // course 2
      if ($courses[$n] == "6lQZLjVvEeWfzhKP8GtZlQ"){
        $result = mysqli_query($link, $commands[$n]);
        $row = mysqli_fetch_row($result);
        $marks2[$b] = $allmarks[$n];
        $row_names2[$b] = $row[0];
        $b += 1;
      }

      // course 3
      if ($courses[$n] == "EdKScTVwEeWW9BKhJ4xW0Q"){
        $result = mysqli_query($link, $commands[$n]);
        $row = mysqli_fetch_row($result);
        $marks3[$c] = $allmarks[$n];
        $row_names3[$c] = $row[0];
        $c += 1;
      }

      // course 4
      if ($courses[$n] == "NpTR4zVwEeWfzhKP8GtZlQ"){
        $result = mysqli_query($link, $commands[$n]);
        $row = mysqli_fetch_row($result);
        $marks4[$d] = $allmarks[$n];
        $row_names4[$d] = $row[0];
        $d += 1;
      }

      // course 5
      if ($courses[$n] == "ywoUFzVxEeWWBQrVFXqd1w"){
        $result = mysqli_query($link, $commands[$n]);
        $row = mysqli_fetch_row($result);
        $marks5[$e] = $allmarks[$n];
        $row_names5[$e] = $row[0];
        $e += 1;
      }

      // course 6
      if ($courses[$n] == "99SZyjVxEeW6RApRXdjJPw"){
        $result = mysqli_query($link, $commands[$n]);
        $row = mysqli_fetch_row($result);
        $marks6[$f] = $allmarks[$n];
        $row_names6[$f] = $row[0];
        $f += 1;
      }


    $n+=1;

    }


    /* free result set */
    mysqli_free_result($result);
}

/* close connection */
mysqli_close($link);

// names for the charts
$name1 = "Introduction to Software Product Management";
$name2 = "Software Processes and Agile Practices";
$name3 = "Client Needs and Software Requirements";
$name4 = "Agile Planning for Software Products";
$name5 = "Reviews & Metrics for Software Improvements";
$name6 = "Software Product Management Capstone";

?>

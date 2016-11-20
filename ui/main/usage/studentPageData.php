

<?php
/**
  * This page is for showing students performance in each component
  * in all courses
  *
  * It transfers from the course page to individual student page
  * upon clicking on the dots which represent different students
  *
  * For all data related to such student in the database identified by ID
  * the page will fetch data from course item table, course item grade table
  * and show six charts which correspond to six different courses, and within
  * each course, there will be multiple columns which are different componenets
  * in a course. The high of the columns are the corresponding score in them.
  *
  * * Markdown style lists function too
  * * Just try this out once
  *
  * The section after the description contains the tags; which provide
  * structured meta-data concerning the given element.
  *
  * @author  Hong Chen <chen1@ualberta.ca> 2016
  *
  * @since 1.0
  *
  * @param int    $student_id  The id for current student.
  * @param array  $courses   The array of all courses the current student is in.
  * @param int    $allmarks  The marks of each component that belong to the student of all courses.
  * @param int    $marks     The marks of each component of individual courses.
  * @param int    $row_names The names of the columns, which are the names of the components.


  */

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
    $allmarks;
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
        $row_names[$a] = substr($row[0], 0, 30);
        $a += 1;
      }

      // course 2
      if ($courses[$n] == "6lQZLjVvEeWfzhKP8GtZlQ"){
        $result = mysqli_query($link, $commands[$n]);
        $row = mysqli_fetch_row($result);
        $marks2[$b] = $allmarks[$n];
        $row_names2[$b] = substr($row[0], 0, 30);
        $b += 1;
      }

      // course 3
      if ($courses[$n] == "EdKScTVwEeWW9BKhJ4xW0Q"){
        $result = mysqli_query($link, $commands[$n]);
        $row = mysqli_fetch_row($result);
        $marks3[$c] = $allmarks[$n];
        $row_names3[$c] = substr($row[0], 0, 30);
        $c += 1;
      }

      // course 4
      if ($courses[$n] == "NpTR4zVwEeWfzhKP8GtZlQ"){
        $result = mysqli_query($link, $commands[$n]);
        $row = mysqli_fetch_row($result);
        $marks4[$d] = $allmarks[$n];
        $row_names4[$d] = substr($row[0], 0, 30);
        $d += 1;
      }

      // course 5
      if ($courses[$n] == "ywoUFzVxEeWWBQrVFXqd1w"){
        $result = mysqli_query($link, $commands[$n]);
        $row = mysqli_fetch_row($result);
        $marks5[$e] = $allmarks[$n];
        $row_names5[$e] = substr($row[0], 0, 30);
        $e += 1;
      }

      // course 6
      if ($courses[$n] == "99SZyjVxEeW6RApRXdjJPw"){
        $result = mysqli_query($link, $commands[$n]);
        $row = mysqli_fetch_row($result);
        $marks6[$f] = $allmarks[$n];
        $row_names6[$f] = substr($row[0], 0, 30);
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

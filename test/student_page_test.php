<?php
$link = mysqli_connect("localhost", "root", "117130", "learner");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s<br>", mysqli_connect_error());
    exit();
}else{
    printf("connection success <br>");
}

$sql = "SELECT course_id, course_item_grade_overall, course_item_id FROM course_item_grades where ualberta_user_id = \"2318c5c549b23f9c48ebec81d686f985314640ed\";";

if ($result = mysqli_query($link, $sql)) {

    echo "Fetching data success<br>";

    $i = 0;
    $commands;
    $courses;

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
      echo $row[0]." ".$row[1]." ".$row[2];
      echo "<br>";

      $courses[$i] = $row[0];

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
    $row_names;
    $sql3 = "select course_id from courses";
    $result3 = mysqli_query($link, $sql3);
    $row3 = mysqli_fetch_row($result3);

    echo $course[0];

    if ($row3[0] == "DYv7azSfEeWgIQ7IEhB31Q"){echo "MATCHING COURSE<br><br>";}

    while($n <= $i){
      $result = mysqli_query($link, $commands[$n]);
      $row = mysqli_fetch_row($result);
      echo $commands[$n]."<br>";
      $row_names[$n] = $row[0];
      echo $row_names[$n]."<br>";
      $n+=1;
    }



    /* free result set */
    mysqli_free_result($result);
}

/* close connection */
mysqli_close($link);



echo $sql."<br>";


?>

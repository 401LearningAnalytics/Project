<?php
$link = mysqli_connect("localhost", "root", "117130", "learner");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s<br>", mysqli_connect_error());
    exit();
}else{
    printf("connection success <br>");
}

$sql = "SELECT course_item_grade_overall, course_item_id FROM course_item_grades where ualberta_user_id = \"2318c5c549b23f9c48ebec81d686f985314640ed\";";

if ($result = mysqli_query($link, $sql)) {

    echo "Fetching data success<br>";

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
      echo $row[0]." ".$row[1];
      echo "<br>";
    }



    /* free result set */
    mysqli_free_result($result);
}

/* close connection */
mysqli_close($link);



echo $sql."<br>";


?>

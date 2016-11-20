 <?php
  /**
    * This page is for fetching the data from database for quizes in the current course.
    *
    * Given the course ID, this function fetches the quiz grade of different range,
    * eg. 0% - 25%, 26%- 50%, 51% - 75%, 76% - 100%, for each componenet in the course
    * and the number of students who fall into those ranges
    *
    *
    *
    * * Markdown style lists function too
    * * Just try this out once
    *
    * The section after the description contains the tags; which provide
    * structured meta-data concerning the given element.
    * @package ui
    *
    * @author  Hong Chen <wsong1@ualberta.ca> 2016
    *
    * @since 1.0
    *
    * @param array    $quiz_course_item_id    The array of componenet ID in the current course.
    * @param array    $quiz_course_item       The array of names of componenet in the current course, with indices corresponding to the $quiz_course_item_id array.
    * @param array    $quiz_count             The array of number of all finished quizes of each componenet, with indices corresponding to the $quiz_course_item_id array.
    * @param array    $per_count              The array of number of students who fall into each range, the indices corresponds to the indices of components.
    */

?>
<?php
    $quiz_course_item_id = array();
    $quiz_course_item = array();
    $quiz_count=array();
    $per_count1=array();
    $per_count2=array();
    $per_count3=array();
    $per_count4=array();
    $per_count5=array();
    $per_count6=array();



    $link = mysqli_connect("localhost", "Wei", "123456", "learner");

    /* check connection */
    if (mysqli_connect_errno()) {
        exit();
    }else{
    }

    $sql = "SELECT course_item_id from course_formative_quiz_grades where course_id = \"".$quiz_course_id."\"  ;";

    if ($result = mysqli_query($link, $sql)) {

        $i = 0;
        //echo "Fetching data success<br>";
        /* fetch associative array */
        while ($row = mysqli_fetch_row($result)) {
          if (in_array($row[0], $quiz_course_item_id)) {
          }else{
            array_push($quiz_course_item_id, $row[0]);
            $i += 1;
          }
        }
        mysqli_free_result($result);
      }


    $j = 0;
    while($j < $i){
      $sql = "SELECT course_item_name from course_items where course_item_id = \"".$quiz_course_item_id[$j]."\";";

      if ($result = mysqli_query($link, $sql)) {

        while ($row = mysqli_fetch_row($result)){
          $quiz_course_item[$j] = $row[0];
        }
      }
      mysqli_free_result($result);
      $j += 1;
    }

   $j=0;
    while($j < $i){
    	$sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[$j]."\";";

      	if ($result = mysqli_query($link, $sql)) {

       	 while ($row = mysqli_fetch_row($result)){
           $quiz_count[$j] = $row[0];
         }
      }
      mysqli_free_result($result);
      $j += 1;
    }


	//componenet 1
        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[0]."\" and course_quiz_grade <= 1/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count1[0] = $row[0];
         }
      	}
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[0]."\" and 1/4*course_quiz_max_grade < course_quiz_grade and course_quiz_grade <= 1/2*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count1[1] = $row[0];
         }
        }
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[0]."\" and course_quiz_grade > 1/2*course_quiz_max_grade and course_quiz_grade <= 3/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count1[2] = $row[0];
         }
        }
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[0]."\" and course_quiz_grade > 3/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count1[3] = $row[0];
         }
        }
      	mysqli_free_result($result);


	//component 2
        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[1]."\" and course_quiz_grade <= 1/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count2[0] = $row[0];
         }
      	}
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[1]."\" and 1/4*course_quiz_max_grade < course_quiz_grade and course_quiz_grade <= 1/2*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count2[1] = $row[0];
         }
        }
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[1]."\" and course_quiz_grade > 1/2*course_quiz_max_grade and course_quiz_grade <= 3/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count2[2] = $row[0];
         }
        }
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[1]."\" and course_quiz_grade > 3/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count2[3] = $row[0];
         }
        }
      	mysqli_free_result($result);


	//component 3
        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[2]."\" and course_quiz_grade <= 1/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count3[0] = $row[0];
         }
      	}
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[2]."\" and 1/4*course_quiz_max_grade < course_quiz_grade and course_quiz_grade <= 1/2*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count3[1] = $row[0];
         }
        }
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[2]."\" and course_quiz_grade > 1/2*course_quiz_max_grade and course_quiz_grade <= 3/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count3[2] = $row[0];
         }
        }
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[2]."\" and course_quiz_grade > 3/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count3[3] = $row[0];
         }
        }
      	mysqli_free_result($result);



	//component 4
        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[3]."\" and course_quiz_grade <= 1/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count4[0] = $row[0];
         }
      	}
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[3]."\" and 1/4*course_quiz_max_grade < course_quiz_grade and course_quiz_grade <= 1/2*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count4[1] = $row[0];
         }
        }
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[3]."\" and course_quiz_grade > 1/2*course_quiz_max_grade and course_quiz_grade <= 3/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count4[2] = $row[0];
         }
        }
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[3]."\" and course_quiz_grade > 3/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count4[3] = $row[0];
         }
        }
      	mysqli_free_result($result);



	//component 5
        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[4]."\" and course_quiz_grade <= 1/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count5[0] = $row[0];
         }
      	}
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[4]."\" and 1/4*course_quiz_max_grade < course_quiz_grade and course_quiz_grade <= 1/2*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count5[1] = $row[0];
         }
        }
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[4]."\" and course_quiz_grade > 1/2*course_quiz_max_grade and course_quiz_grade <= 3/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count5[2] = $row[0];
         }
        }
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[4]."\" and course_quiz_grade > 3/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count5[3] = $row[0];
         }
        }
      	mysqli_free_result($result);




	//component 6
        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[5]."\" and course_quiz_grade <= 1/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count6[0] = $row[0];
         }
      	}
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[5]."\" and 1/4*course_quiz_max_grade < course_quiz_grade and course_quiz_grade <= 1/2*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count6[1] = $row[0];
         }
        }
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[5]."\" and course_quiz_grade > 1/2*course_quiz_max_grade and course_quiz_grade <= 3/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count6[2] = $row[0];
         }
        }
      	mysqli_free_result($result);


        $sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[5]."\" and course_quiz_grade > 3/4*course_quiz_max_grade;";

	if ($result = mysqli_query($link, $sql)) {

       	   while ($row = mysqli_fetch_row($result)){
           $per_count6[3] = $row[0];
         }
        }
      	mysqli_free_result($result);










  ?>

<?php
/**
  * This contains the data of average and the standard deviation of quizes
  *
  * This function fetches data of the average and the
	* standard devations of the quizes in one specific course
  *
  * * Markdown style lists function too
  * * Just try this out once
  *
  * The section after the description contains the tags; which provide
  * structured meta-data concerning the given element.
  * @package ui
  * @author  Hong Chen <chen1@ualberta.ca> 2016
  *
  * @since 1.0
  *
  * @param float    $ave1		The average quiz grade for a component.
  * @param float    $std	  The standard deviation of quiz grade for a component.
  */

/**
  * This contains the data of average and the standard deviation of quizes
  *
  * This function fetches data of the average and the
	* standard devations of the quizes in one specific course
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
  * @param float    $ave1		The average quiz grade for a component.
  * @param float 		$std	  The standard deviation of quiz grade for a component.
  */

	$ave1 = 0;
	$ave2 = 0;
	$ave3 = 0;
	$ave4 = 0;
	$ave5 = 0;
	$ave6 = 0;

	$std1 = 0;
	$std2 = 0;
	$std3 = 0;
	$std4 = 0;
	$std5 = 0;
	$std6 = 0;



	// averages of each componenets

         $sql = "SELECT AVG(course_quiz_grade/course_quiz_max_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[0]."\"  ;";

    	if ($result = mysqli_query($link, $sql)) {


        //echo "Fetching data success<br>";
        /* fetch associative array */
        while ($row = mysqli_fetch_row($result)) {
      	    $ave1 = $row[0];
        }
        mysqli_free_result($result);
      }





         $sql = "SELECT AVG(course_quiz_grade/course_quiz_max_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[1]."\"  ;";

    	if ($result = mysqli_query($link, $sql)) {

        //echo "Fetching data success<br>";
        /* fetch associative array */
        while ($row = mysqli_fetch_row($result)) {
      	    $ave2 = $row[0];
        }
        mysqli_free_result($result);
      }



         $sql = "SELECT AVG(course_quiz_grade/course_quiz_max_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[2]."\"  ;";

    	if ($result = mysqli_query($link, $sql)) {

        //echo "Fetching data success<br>";
        /* fetch associative array */
        while ($row = mysqli_fetch_row($result)) {
      	    $ave3 = $row[0];
        }
        mysqli_free_result($result);
      }




         $sql = "SELECT AVG(course_quiz_grade/course_quiz_max_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[3]."\"  ;";

    	if ($result = mysqli_query($link, $sql)) {

        //echo "Fetching data success<br>";
        /* fetch associative array */
        while ($row = mysqli_fetch_row($result)) {
      	    $ave4 = $row[0];
        }
        mysqli_free_result($result);
      }




         $sql = "SELECT AVG(course_quiz_grade/course_quiz_max_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[4]."\"  ;";

    	if ($result = mysqli_query($link, $sql)) {

        //echo "Fetching data success<br>";
        /* fetch associative array */
        while ($row = mysqli_fetch_row($result)) {
      	    $ave5 = $row[0];
        }
        mysqli_free_result($result);
      }




         $sql = "SELECT AVG(course_quiz_grade/course_quiz_max_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[5]."\"  ;";

    	if ($result = mysqli_query($link, $sql)) {

        //echo "Fetching data success<br>";
        /* fetch associative array */
        while ($row = mysqli_fetch_row($result)) {
      	    $ave6 = $row[0];
        }
        mysqli_free_result($result);
      }








	// standard deviations of each componenets

         $sql = "SELECT STDDEV(course_quiz_grade/course_quiz_max_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[0]."\"  ;";

    	if ($result = mysqli_query($link, $sql)) {


        //echo "Fetching data success<br>";
        /* fetch associative array */
        while ($row = mysqli_fetch_row($result)) {
      	    $std1 = $row[0];
        }
        mysqli_free_result($result);
      }





         $sql = "SELECT STDDEV(course_quiz_grade/course_quiz_max_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[1]."\"  ;";

    	if ($result = mysqli_query($link, $sql)) {

        //echo "Fetching data success<br>";
        /* fetch associative array */
        while ($row = mysqli_fetch_row($result)) {
      	    $std2 = $row[0];
        }
        mysqli_free_result($result);
      }



         $sql = "SELECT STDDEV(course_quiz_grade/course_quiz_max_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[2]."\"  ;";

    	if ($result = mysqli_query($link, $sql)) {

        //echo "Fetching data success<br>";
        /* fetch associative array */
        while ($row = mysqli_fetch_row($result)) {
      	    $std3 = $row[0];
        }
        mysqli_free_result($result);
      }




         $sql = "SELECT STDDEV(course_quiz_grade/course_quiz_max_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[3]."\"  ;";

    	if ($result = mysqli_query($link, $sql)) {

        //echo "Fetching data success<br>";
        /* fetch associative array */
        while ($row = mysqli_fetch_row($result)) {
      	    $std4 = $row[0];
        }
        mysqli_free_result($result);
      }




         $sql = "SELECT STDDEV(course_quiz_grade/course_quiz_max_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[4]."\"  ;";

    	if ($result = mysqli_query($link, $sql)) {

        //echo "Fetching data success<br>";
        /* fetch associative array */
        while ($row = mysqli_fetch_row($result)) {
      	    $std5 = $row[0];
        }
        mysqli_free_result($result);
      }




         $sql = "SELECT STDDEV(course_quiz_grade/course_quiz_max_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[5]."\"  ;";

    	if ($result = mysqli_query($link, $sql)) {

        //echo "Fetching data success<br>";
        /* fetch associative array */
        while ($row = mysqli_fetch_row($result)) {
      	    $std6 = $row[0];
        }
        mysqli_free_result($result);
      }





if ($quiz_course_item[0] != ""){
echo "the average of ".$quiz_course_item[0]." is ".$ave1."<br>";
}

if ($quiz_course_item[1] != ""){
echo "the average of ".$quiz_course_item[1]." is ".$ave2."<br>";
}

if ($quiz_course_item[2] != ""){
echo "the average of ".$quiz_course_item[2]." is ".$ave3."<br>";
}

if ($quiz_course_item[3] != ""){
echo "the average of ".$quiz_course_item[3]." is ".$ave4."<br>";
}

if ($quiz_course_item[4] != ""){
echo "the average of ".$quiz_course_item[4]." is ".$ave5."<br>";
}

if ($quiz_course_item[5] != ""){
echo "the average of ".$quiz_course_item[5]." is ".$ave6."<br>";
}




?>

<?php
  /**
    * This page is for fetching the data from database for quizes in the current course.
    *
    * Within the course, the chart data are fetched from database that
    * contains each student performace in the course over the process of
    * the course, which is measured in time
    * upon clicking on the students, who are represented by dots on the
    * chart, this course page links to individual student page connected by
    * the student id
    *
    * @package ui
    *
    * @author  Wei Song <wsong1@ualberta.ca> 2016
    *
    * @since 1.0
    *
    * @param int    $quiz_course_id   The id of the coures for fetchig data from course table.
    * @param int    $average          The average of the grades of all students in the coures.
    * @param int    $total            The number of students participating in the coures.
    * @param int    $module           The name of the modules in the coures.
    * @param int    $top              The number of students who achieved more than 90% in the course overall.
    * @param int    $fail             The number of students who failed that achieved less than 50% in all course work.
    *
    */
  ?>
<html>
  <head>
	  <style>
		body  {
	    background-image: url("../../img/background2.jpg");
	    background-color: #ffffff;
	}
	  </style>
	<style>
	label{
	display:inline-block;
	width:200px;
	margin-right:10px;
	text-align:right;
	}

	input{

	}

	fieldset{
	border:none;
	width:500px;
	margin:30px auto;
	}
	p {
    font-family: "Times New Roman", Times, serif;
}
	</style>
  </head>


  <body>



	<div align=center>
	<p><h1><?php
		if ($_GET["id"]== "Reviews ")	echo "Reviews & Metrics for Software Improvements";
		else echo $_GET["id"];
		?></h1></p>
	</div>



	<?php
		$quiz_course_id = "0";
		if($_GET["id"]=="Introduction to Software Product Management") {
			include("intro.php");
			$quiz_course_id = "DYv7azSfEeWgIQ7IEhB31Q";
			$average = "SELECT CAST(AVG(course_grade_verified) as decimal(6,3)) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q' AND course_grade_verified < 0.5";
			$std = "SELECT CAST(STDDEV(course_grade_verified)as decimal(6,3)) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q'";
		}
		else if($_GET["id"]=="Software Processes and Agile Practices") {
			include("soft_process.php");
			$quiz_course_id = "6lQZLjVvEeWfzhKP8GtZlQ";
			$average = "SELECT CAST(AVG(course_grade_verified) as decimal(6,3)) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ' AND course_grade_verified < 0.5";
			$std = "SELECT CAST(STDDEV(course_grade_verified)as decimal(6,3)) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ'";
		}
		else if($_GET["id"]=="Client Needs and Software Requirements") {
			include("client_needs.php");
			$quiz_course_id = "EdKScTVwEeWW9BKhJ4xW0Q";
			$average = "SELECT CAST(AVG(course_grade_verified) as decimal(6,3)) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q' AND course_grade_verified < 0.5";
			$std = "SELECT CAST(STDDEV(course_grade_verified)as decimal(6,3)) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q'";
		}
		else if($_GET["id"]=="Agile Planning for Software Products") {
			include("agile_plan.php");
			$quiz_course_id = "NpTR4zVwEeWfzhKP8GtZlQ";
			$average = "SELECT CAST(AVG(course_grade_verified) as decimal(6,3)) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ' AND course_grade_verified < 0.5";
			$std = "SELECT CAST(STDDEV(course_grade_verified)as decimal(6,3)) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ'";
		}
		else if ($_GET["id"]=="Reviews ") {
			include("review.php");
			$quiz_course_id = "ywoUFzVxEeWWBQrVFXqd1w";
			$average = "SELECT CAST(AVG(course_grade_verified) as decimal(6,3)) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w' AND course_grade_verified < 0.5";
			$std = "SELECT CAST(STDDEV(course_grade_verified)as decimal(6,3)) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w'";
		}
		else if($_GET["id"]=="Software Product Management Capstone") {
			include("soft_mana.php");
			$quiz_course_id = "99SZyjVxEeW6RApRXdjJPw";
			$average = "SELECT CAST(AVG(course_grade_verified) as decimal(6,3)) FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='99SZyjVxEeW6RApRXdjJPw' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw' AND course_grade_verified < 0.5";
			$std = "SELECT CAST(STDDEV(course_grade_verified)as decimal(6,3)) FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw'";
		}

	?>
	</div>
	<br><br>

	<?php
		// connect to mysql database
		$connection = mysql_connect('localhost', 'Wei', '123456');
		mysql_select_db('learner');

		// select course names from database

		$ave = mysql_query($average);
		$to = mysql_query($total);
		$mod = mysql_query($module);
		$tops = mysql_query($top);
		$fails = mysql_query($fail);
		$stdd = mysql_query($std);
	?>

<style>
fieldset {

    margin-top: -430px;
    margin-right:1%;
    width: 600px;
    float: right;
}


</style>

	<fieldset>
	<p><b> Student Enrollments:&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</lable></b><?php while($row = mysql_fetch_array($to)) {echo $row['COUNT(ualberta_user_id)'];} ?>
	<p><b> Top students(Above 90%):&emsp;&emsp;</b> <?php while($row = mysql_fetch_array($tops)) {echo $row['COUNT(ualberta_user_id)'];} ?></p>
	<p><b> Failed students(Below 50%):&emsp;&nbsp;</b> <?php while($row = mysql_fetch_array($fails)) {echo $row['COUNT(ualberta_user_id)'];} ?></p>
	<p><b> Course Average:&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&emsp;&nbsp;</b> <?php while($row = mysql_fetch_array($ave)) {echo $row['CAST(AVG(course_grade_verified) as decimal(6,3))'];} ?></p>
	<p><b> Standard Deviation:&emsp;&emsp;&emsp;&emsp;&emsp;</b> <?php while($row = mysql_fetch_array($stdd)) {echo $row['CAST(STDDEV(course_grade_verified)as decimal(6,3))'];} ?></p>
	<p><b> Course Modules:</b> <?php while($row = mysql_fetch_array($mod)) {echo '<br>'.$row['course_module_name'];} ?></p>
	</fieldset>
	</div>

  <hr></hr>




<h2>Quiz Summary</h2>


<?php include"quizData.php";?>


<?php include"quizUI.php"?>











  </body>
</html>

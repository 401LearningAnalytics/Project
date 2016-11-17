<html>
  <head>
  <style>
	body  {
    background-image: url("../../img/background2.jpg");
    background-color: #ffffff;
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
		if($_GET["id"]=="Introduction to Software Product Management") {
			include("intro.php");
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q' AND course_grade_verified < 0.5";
		}
		else if($_GET["id"]=="Software Processes and Agile Practices") {
			include("soft_process.php");
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ' AND course_grade_verified < 0.5";
		}
		else if($_GET["id"]=="Client Needs and Software Requirements") {
			include("client_needs.php");
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q' AND course_grade_verified < 0.5";
		}
		else if($_GET["id"]=="Agile Planning for Software Products") {
			include("agile_plan.php");
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ' AND course_grade_verified < 0.5";
		}
		else if ($_GET["id"]=="Reviews ") {
			include("review.php");
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w' AND course_grade_verified < 0.5";
		}
		else if($_GET["id"]=="Software Product Management Capstone") {
			include("soft_mana.php");
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='99SZyjVxEeW6RApRXdjJPw' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw' AND course_grade_verified < 0.5";
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
	?>
	<p><b> Student Enrollments: </b><?php while($row = mysql_fetch_array($to)) {echo $row['COUNT(ualberta_user_id)'];} ?></p>
	<p><b> Course Average:</b> <?php while($row = mysql_fetch_array($ave)) {echo $row['AVG(course_grade_verified)'];} ?></p>
	<p><b> Top students:</b> <?php while($row = mysql_fetch_array($tops)) {echo $row['COUNT(ualberta_user_id)'];} ?></p>
	<p><b> Failed students:</b> <?php while($row = mysql_fetch_array($fails)) {echo $row['COUNT(ualberta_user_id)'];} ?></p>
	<p><b> Course Modules:</b> <?php while($row = mysql_fetch_array($mod)) {echo '<br>'.$row['course_module_name'].'</br>';} ?></p>
	</div>
  </body>
</html>

<html>
  <head>
  </head>
  <body>
	<div align="center">
	<p><h3><?php echo $_GET["id"]; ?></h3></p>
	<?php
		if($_GET["id"]=="Introduction to Software Product Management") {
			include("intro.php");
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q'";
		}
		else if($_GET["id"]=="Software Processes and Agile Practices") {
			include("soft_process.php");
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ'";
		}
		else if($_GET["id"]=="Client Needs and Software Requirements") {
			include("client_needs.php");
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q'";
		}
		else if($_GET["id"]=="Agile Planning for Software Products") {
			include("agile_plan.php");
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ'";
		}
		else if(parse_url($_SERVER["id"]=="Reviews & Metrics for Software Improvements")) {
			include("review.php");
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w'";
		}
		else if($_GET["id"]=="Software Product Management Capstone") {
			include("soft_mana.php");
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='99SZyjVxEeW6RApRXdjJPw'";
		}

	?>
	</div>
	<br><br>

	<?php
		// connect to mysql database
		$connection = mysql_connect('localhost', 'root', '117130');
		mysql_select_db('learner');

		// select course names from database

		$ave = mysql_query($average);
		$to = mysql_query($total);
		$mod = mysql_query($module);
	?>

	<p><b> Student Enrollments: </b><?php while($row = mysql_fetch_array($to)) {echo $row['COUNT(ualberta_user_id)'];} ?></p>
	<p><b> Course Average:</b> <?php while($row = mysql_fetch_array($ave)) {echo $row['AVG(course_grade_verified)'];} ?></p>
	<p><b> Course Modules:</b> <?php while($row = mysql_fetch_array($mod)) {echo '<br>'.$row['course_module_name'].'</br>';} ?></p>
  </body>
</html>

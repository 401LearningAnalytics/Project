<?php
/**
  * This page is course page.
  * Everytime the instructor inserts a course into
  * the database, the course will be shown on the course
  * page.
  * @package ui
  *
  * @author  Wei Song <wsong1@ualberta.ca> 2016
  *
  * @since 1.0
  *
  * @param integer $i
  *	The index to control the table.
  * @param int $trEnd
  *     To change the int i to make it be a 3*n table.
  */
?>
<html>
<head>
<style>
.button {
    background-color: #129AE9;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    font-size: 18px;
    width:88%;
}
body  {
    background-image: url("../../img/background2.jpg");
    background-color: #cccccc;
}
</style>
</head>
<body>
<title>courses</title>
<!-- Set fonts and appearence of the header -->
<p align=center><font style="font-size: 24pt; filter: shadow(color=black); width: 71.27%; color: black; line-height: 150%; font-family: Times New Roman; height: 60px"><b>Courses</b></font></p>
<div id="users" align="center">

    <ul class="list">
      <?php
		// connect to mysql database
		$connection = mysql_connect('localhost', 'Wei', '123456');
		mysql_select_db('learner');

		// select course names from database
		$query = "SELECT course_name FROM courses Order by course_launch_ts";
		$result = mysql_query($query);
	?>


		<table class="table" border="1" cellpadding="0" cellspacing="" width="100%">
		    <tbody>
		    <?php
			// print out course names and set courses into a 3 columns* n rows format
			$i = 0; $trEnd = 0; $j = 1;
			while ($row = mysql_fetch_array($result)){
			    if($i == 0){
				echo '<tr>';
			    }

			    // heading which is course name
			    echo '<td>';
			    echo ('<a href="coursePage.php?id=' . $row['course_name'] . '"class="button"id="course' . '">' . $row['course_name'] .'</a></button>');
			    //if($row['course_name']=="Introduction to Software Product Management") include_once("intro.php");
			    //else if($row['course_name']=="Software Processes and Agile Practices") include_once("soft_process.php");
			    //else if($row['course_name']=="Client Needs and Software Requirements") include_once("client_needs.php");
			    
				$quiz_course_id = "0";
				if($row['course_name']=="Introduction to Software Product Management") {
					//include("intro.php");
					$quiz_course_id = "DYv7azSfEeWgIQ7IEhB31Q";
					$average = "SELECT CAST(AVG(course_grade_verified) as decimal(6,3)) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q'";
					$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q'";
					$module = "SELECT course_module_name FROM course_modules WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q' ORDER BY course_module_order";
					$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q' AND course_grade_verified > 0.9";
					$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q' AND course_grade_verified < 0.5";
					$std = "SELECT CAST(STDDEV(course_grade_verified)as decimal(6,3)) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q'";
				}
				else if($row['course_name']=="Software Processes and Agile Practices") {
					//include("soft_process.php");
					$quiz_course_id = "6lQZLjVvEeWfzhKP8GtZlQ";
					$average = "SELECT CAST(AVG(course_grade_verified) as decimal(6,3)) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ'";
					$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ'";
					$module = "SELECT course_module_name FROM course_modules WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ' ORDER BY course_module_order";
					$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ' AND course_grade_verified > 0.9";
					$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ' AND course_grade_verified < 0.5";
					$std = "SELECT CAST(STDDEV(course_grade_verified)as decimal(6,3)) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ'";
				}
				else if($row['course_name']=="Client Needs and Software Requirements") {
					//include("client_needs.php");
					$quiz_course_id = "EdKScTVwEeWW9BKhJ4xW0Q";
					$average = "SELECT CAST(AVG(course_grade_verified) as decimal(6,3)) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q'";
					$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q'";
					$module = "SELECT course_module_name FROM course_modules WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q' ORDER BY course_module_order";
					$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q' AND course_grade_verified > 0.9";
					$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q' AND course_grade_verified < 0.5";
					$std = "SELECT CAST(STDDEV(course_grade_verified)as decimal(6,3)) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q'";
				}
				else if($row['course_name']=="Agile Planning for Software Products") {
					//include("agile_plan.php");
					$quiz_course_id = "NpTR4zVwEeWfzhKP8GtZlQ";
					$average = "SELECT CAST(AVG(course_grade_verified) as decimal(6,3)) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ'";
					$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ'";
					$module = "SELECT course_module_name FROM course_modules WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ' ORDER BY course_module_order";
					$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ' AND course_grade_verified > 0.9";
					$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ' AND course_grade_verified < 0.5";
					$std = "SELECT CAST(STDDEV(course_grade_verified)as decimal(6,3)) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ'";
				}
				else if ($row['course_name']=="Reviews & Metrics for Software Improvements") {
					//include("review.php");
					$quiz_course_id = "ywoUFzVxEeWWBQrVFXqd1w";
					$average = "SELECT CAST(AVG(course_grade_verified) as decimal(6,3)) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w'";
					$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w'";
					$module = "SELECT course_module_name FROM course_modules WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w' ORDER BY course_module_order";
					$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w' AND course_grade_verified > 0.9";
					$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w' AND course_grade_verified < 0.5";
					$std = "SELECT CAST(STDDEV(course_grade_verified)as decimal(6,3)) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w'";
				}
				else if($row['course_name']=="Software Product Management Capstone") {
					//include("soft_mana.php");
					$quiz_course_id = "99SZyjVxEeW6RApRXdjJPw";
					$average = "SELECT CAST(AVG(course_grade_verified) as decimal(6,3)) FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw'";
					$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw'";
					$module = "SELECT course_module_name FROM course_modules WHERE course_id='99SZyjVxEeW6RApRXdjJPw' ORDER BY course_module_order";
					$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw' AND course_grade_verified > 0.9";
					$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw' AND course_grade_verified < 0.5";
					$std = "SELECT CAST(STDDEV(course_grade_verified)as decimal(6,3)) FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw'";
				}
		
				$ave = mysql_query($average);
				$to = mysql_query($total);
				$mod = mysql_query($module);
				$tops = mysql_query($top);
				$fails = mysql_query($fail);
				$stdd = mysql_query($std);
?>
			        <style>
fieldset {
    height:310px;
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
<?php
			    echo '</td>';

			    if($i == 2){
				$i = 0; $trEnd = 1; $j++;
			    }else{
				$trEnd = 0; $i++; $j++;
			    }
			    if($trEnd == 1) {
				echo '</tr>';
			    }
			}
			if($trEnd == 0) echo '</tr>';
		     ?>
		    </tbody>
		</table>
	<?php
		mysql_close(); //Make sure to close out the database connection

	?>
	</ul>
</div>
</body>
</html>

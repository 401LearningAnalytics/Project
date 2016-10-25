<html>
  <head>
    <meta charset="utf-8">
    <title>Student Page</title>
  </head>
  <body>
	<?php
		$connection = mysql_connect('localhost', 'Wei', '123456');
		mysql_select_db('learner');

		$query = "SELECT course_grade_overall FROM course_grades Where ualberta_user_id='ff66baf73e6ef524708288bba77765715e2d0e0d'"; 
		$result = mysql_query($query);

		while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
			echo "<li><h3>" . $row['course_grade_overall'] . "</li></h3></a>";  //$row['index'] the index here is a field name
		}

		mysql_close();
	?>
    
  </body>
</html>

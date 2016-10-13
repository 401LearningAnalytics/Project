<html>

<body>

<div id="users" align="center">
    
    <ul class="list">
      <?php
		$connection = mysql_connect('localhost', 'Wei', '123456');
		mysql_select_db('learner');

		$query = "SELECT course_name FROM courses"; 
		$result = mysql_query($query);

		

		while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
			echo "<li><h3><a href='studentList.php'>" . $row['course_name'] . "</li></h3></a>";  //$row['index'] the index here is a field name
			require("courses.html");			
		}

		mysql_close(); //Make sure to close out the database connection

	?>
	</ul>
</div>
</body>
</html>

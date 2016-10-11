<html>
<head>
  <script data-main="main" src="require.js"></script>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <div id="users">
    <input class="search" placeholder="Search" />
    <button class="sort" data-sort="name">
      Sort by course
    <ul class="list">
      <?php
		$connection = mysql_connect('localhost', 'Wei', '123456');
		mysql_select_db('learner');

		$query = "SELECT course_name FROM courses"; //You don't need a ; like you do in SQL
		$result = mysql_query($query);

		

		while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
			echo "<li><h3><a href='studentList.html'>" . $row['course_name'] . "</li></h3></a>";  //$row['index'] the index here is a field name
		}

		mysql_close(); //Make sure to close out the database connection

	?>
    </ul>
  </div>
</body>
</html>

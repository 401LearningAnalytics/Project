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
    background-color: orange;
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
    width:80%;
}
body  {
    background-image: url("../../img/background.jpg");
    background-color: #cccccc;
}
</style>
</head>
<body>
<title>courses</title>
<!-- Set fonts and appearence of the header -->
<p align=center><font style="font-size: 40pt; filter: shadow(color=black); width: 71.27%; color: #e4dc9b; line-height: 150%; font-family: 华文隶书; height: 60px"><b>Courses</b></font></p>
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

		<table class="table table-striped mt33" border="1" cellpadding="0" cellspacing="" width="100%">
		    <tbody>
		    <?php
			// print out course names and set courses into a 3 columns* n rows format
			$i = 0; $trEnd = 0; $j = 1;
			while ($row = mysql_fetch_array($result)){
			    if($i == 0){
				echo '<tr>';
			    }

			    // heading which is course name
			    echo ('<td><a href="coursePage.php?id=' . $row['course_name'] . '"class="button"id="course' . $j . '">' . $row['course_name'] . '</a></button>');

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

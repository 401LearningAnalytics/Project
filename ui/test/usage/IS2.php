<html>

<body>
<title>courses</title>
<p align=center><font style="font-size: 40pt; filter: shadow(color=black); width: 71.27%; color: #e4dc9b; line-height: 150%; font-family: 华文隶书; height: 60px"><b>Courses</b></font></p>
<div id="users" align="center">
    
    <ul class="list">
      <?php
		$connection = mysql_connect('localhost', 'Wei', '123456');
		mysql_select_db('learner');

		$query = "SELECT course_name FROM courses"; 
		$result = mysql_query($query);
	?>
		
		<table class="table table-striped mt33">
		    <tbody>
		    <?php
			$i = 0; $trEnd = 0;
			while ($row = mysql_fetch_array($result)){
			    if($i == 0){
				echo '<tr>';
			    }
			    echo '&nbsp<td><h3>'.$row['course_name'].'</td></h3>';
			    if($i == 2){
				$i = 0; $trEnd = 1;
			    }else{
				$trEnd = 0; $i++;
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

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
		$quiz_course_id = "0";
		if($_GET["id"]=="Introduction to Software Product Management") {
			include("intro.php");
			$quiz_course_id = "DYv7azSfEeWgIQ7IEhB31Q";
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='DYv7azSfEeWgIQ7IEhB31Q' AND course_grade_verified < 0.5";
		}
		else if($_GET["id"]=="Software Processes and Agile Practices") {
			include("soft_process.php");
			$quiz_course_id = "6lQZLjVvEeWfzhKP8GtZlQ";
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='6lQZLjVvEeWfzhKP8GtZlQ' AND course_grade_verified < 0.5";
		}
		else if($_GET["id"]=="Client Needs and Software Requirements") {
			include("client_needs.php");
			$quiz_course_id = "EdKScTVwEeWW9BKhJ4xW0Q";
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='EdKScTVwEeWW9BKhJ4xW0Q' AND course_grade_verified < 0.5";
		}
		else if($_GET["id"]=="Agile Planning for Software Products") {
			include("agile_plan.php");
			$quiz_course_id = "NpTR4zVwEeWfzhKP8GtZlQ";
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='NpTR4zVwEeWfzhKP8GtZlQ' AND course_grade_verified < 0.5";
		}
		else if ($_GET["id"]=="Reviews ") {
			include("review.php");
			$quiz_course_id = "ywoUFzVxEeWWBQrVFXqd1w";
			$average = "SELECT AVG(course_grade_verified) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w'";
			$total = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w'";
			$module = "SELECT course_module_name FROM course_modules WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w' ORDER BY course_module_order";
			$top = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w' AND course_grade_verified > 0.9";
			$fail = "SELECT COUNT(ualberta_user_id) FROM course_grades WHERE course_id='ywoUFzVxEeWWBQrVFXqd1w' AND course_grade_verified < 0.5";
		}
		else if($_GET["id"]=="Software Product Management Capstone") {
			include("soft_mana.php");
			$quiz_course_id = "99SZyjVxEeW6RApRXdjJPw";
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

  <hr></hr>







  <?php

    $quiz_course_item_id = array();
    $quiz_course_item = array();
    $quiz_count=array();

    $link = mysqli_connect("localhost", "Wei", "123456", "learner");

    /* check connection */
    if (mysqli_connect_errno()) {
        exit();
    }else{
    }

    $sql = "SELECT course_item_id from course_formative_quiz_grades where course_id = \"".$quiz_course_id."\";";

    if ($result = mysqli_query($link, $sql)) {

        $i = 0;
        //echo "Fetching data success<br>";
        /* fetch associative array */
        while ($row = mysqli_fetch_row($result)) {
          if (in_array($row[0], $quiz_course_item_id)) {
          }else{
            array_push($quiz_course_item_id, $row[0]);
            $i += 1;
          }
        }
        mysqli_free_result($result);
      }


    $j = 0;
    while($j < $i){
      $sql = "SELECT course_item_name from course_items where course_item_id = \"".$quiz_course_item_id[$j]."\";";

      if ($result = mysqli_query($link, $sql)) {

        while ($row = mysqli_fetch_row($result)){
          $quiz_course_item[$j] = $row[0];
        }
      }
      mysqli_free_result($result);
      $j += 1;
    }

   $j=0;
    while($j < $i){
    	$sql = "SELECT COUNT(course_quiz_grade) from course_formative_quiz_grades where course_item_id = \"".$quiz_course_item_id[$j]."\";";
	echo $sql;
      	if ($result = mysqli_query($link, $sql)) {

       	 while ($row = mysqli_fetch_row($result)){
           $quiz_count[$j] = $row[0];
         }
      }
      mysqli_free_result($result);
      $j += 1;
    }

    echo $quiz_count[0]."<br>".$quiz_count[1]."<br>".$quiz_count[2]."<br>";

  ?>









      <!-- Styles -->
  <style>
  #chartdiv {
  	width: 100%;
  	height: 500px;
  }
  </style>

  <!-- Resources -->
  <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
  <script src="https://www.amcharts.com/lib/3/serial.js"></script>
  <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
  <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
  <script src="https://www.amcharts.com/lib/3/themes/none.js"></script>

  <!-- Chart code -->
  <script>




  var $name1 = " <?php echo substr($quiz_course_item[0], 0, 26) ?>"
  var $name2 = " <?php echo substr($quiz_course_item[1], 0, 26) ?>"
  var $name3 = " <?php echo substr($quiz_course_item[2], 0, 26) ?>"
  var $name4 = " <?php echo substr($quiz_course_item[3], 0, 26) ?>"
  var $name5 = " <?php echo substr($quiz_course_item[4], 0, 26) ?>"
  var $name6 = " <?php echo substr($quiz_course_item[5], 0, 26) ?>"

  var $per11;
  var $per12;
  var $per13;
  var $per14;



  var chart = AmCharts.makeChart("chartdiv", {
      "type": "serial",
  	"theme": "none",
      "legend": {
          "horizontalGap": 5,
          "maxColumns": 1,
          "position": "right",
  		"useGraphSettings": true,
  		"markerSize": 10
      },
      "dataProvider": [{
          "year": $name1,
          "0%-25%": 2.5,
          "26%-50%": 2.1,
          "51%-75%": 0.2,
          "76%-100%": 2.2
      }, {
          "year": $name2,
          "0%-25%": 2.6,
          "26%-50%": 2.7,
          "51%-75%": 2.2,
          "76%-100%": 0.3
      }, {
          "year": $name3,
          "0%-25%": 2.8,
          "26%-50%": 2.9,
          "51%-75%": 2.4,
          "76%-100%": 0.3
      }, {
          "year": $name4,
          "0%-25%": 2.8,
          "26%-50%": 2.9,
          "51%-75%": 2.4,
          "76%-100%": 0.3
      }, {
          "year": $name5,
          "0%-25%": 2.8,
          "26%-50%": 2.9,
          "51%-75%": 2.4,
          "76%-100%": 0.3
      }, {
          "year": $name6,
          "0%-25%": 2.8,
          "26%-50%": 2.9,
          "51%-75%": 2.4,
          "76%-100%": 0.3
      }],
      "valueAxes": [{
          "stackType": "regular",
          "axisAlpha": 0.3,
          "gridAlpha": 0
      }],
      "graphs": [{
          "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
          "fillAlphas": 0.8,
          "labelText": "[[value]]",
          "lineAlpha": 0.3,
          "title": "0%-25%",
          "type": "column",
  		"color": "#000000",
          "valueField": "0%-25%"
      }, {
          "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
          "fillAlphas": 0.8,
          "labelText": "[[value]]",
          "lineAlpha": 0.3,
          "title": "26%-50%",
          "type": "column",
  		"color": "#000000",
          "valueField": "26%-50%"
      }, {
          "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
          "fillAlphas": 0.8,
          "labelText": "[[value]]",
          "lineAlpha": 0.3,
          "title": "51%-75%",
          "type": "column",
  		"color": "#000000",
          "valueField": "51%-75%"
      }, {
          "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
          "fillAlphas": 0.8,
          "labelText": "[[value]]",
          "lineAlpha": 0.3,
          "title": "76%-100%",
          "type": "column",
  		"color": "#000000",
          "valueField": "76%-100%"
      }],

      "categoryField": "year",
      "categoryAxis": {
          "gridPosition": "start",
          "axisAlpha": 0,
          "gridAlpha": 0,
          "position": "left"
      },
      "export": {
      	"enabled": true
       }

  });
  </script>

  <!-- HTML -->
<div id="chartdiv"></div>






	
  </body>
</html>

<script src="http://d3js.org/d3.v4.min.js" charset="utf-8"></script>

<html>
  <head>
    <meta charset="utf-8">
    <title>Indivisual Student Page</title>
    <style>
    // setup layout for the page
    table {width:80%; background-color:#fff;}
    thead td { width: width of the other columns; }
    thead td:first-child { width: 30%; }
    thead td:last-child {width: 60%; }
  </style>

  </head>
  <body>
	<h1>Indivisual student Page</h1>
	<table style="height: 455px;" width="795" align="center">
	<tbody style ="right: 800px;">
	<!-- create a table which has two columns -->
	<!-- personal information on the left columns -->
	<!-- course information on the right columns -->


	<!-- this should be changed since it is a mock one -->
	<img src="http://articles.leetcode.com/wp-content/uploads/2015/03/touxiang.png" alt="" width="200" height="200" td rowspan="2" right: -400px/>
  <tr >
	<p><strong>Ualberta_user_id: </strong></p>
	<p>af858c7018f031692573be1de8fd62188e5d1bac</p>
	<p><strong>Gender:</strong> male</p>
	<p><strong>Join Time:</strong> 2012-02-22 11:32:05</p>

	</tr>

	</tbody>
	</table>

  </body>
</html>







<!-- https://www.amcharts.com/demos/exporting-chart-to-image/ -->






<!-- Styles -->
<style>
#chartdiv {
  width: 30%;
  height: 300px;
  position: relative;
  bottom: 0;
  right: 0px;
  margin-top: -450px;


}

#chartdiv2 {
  width: 30%;
  height: 300px;
  position: relative;
  right: -400px;
  margin-top: -300px;
}

#chartdiv3 {
  width: 30%;
  height: 300px;
  position: relative;
  right: -800px;
  margin-top: -300px;
}

#chartdiv4 {
  width: 30%;
  height: 300px;
  position: relative;
  right: 0px;
  margin-top: 0px;
}

#chartdiv5 {
  width: 30%;
  height: 300px;
  position: relative;
  right: -400px;
  margin-top: -300px;
}

#chartdiv6 {
  width: 30%;
  height: 300px;
  position: relative;
  right: -800px;
  margin-top: -300px;
}

</style>


<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/none.js"></script>


<?php
// connect to mysql database
$connection = mysql_connect('localhost', 'root', '117130');
mysql_select_db('learner');

// select course names from database
$query = "SELECT course_name FROM courses Order by course_launch_ts";
$result = mysql_query($query);
$name1 = "Introduction to Software Product Management";
$name2 = "Software Processes and Agile Practices";
$name3 = "Client Needs and Software Requirements";
$name4 = "Agile Planning for Software Products";
$name5 = "Reviews & Metrics for Software Improvements";
$name6 = "Software Product Management Capstone";

?>
<!-- Chart code -->
<script>



<!--http://stackoverflow.com/questions/16328256/extra-space-at-bottom-of-page-->

var $name1 = " <?php echo $name1 ?>"
var $name2 = " <?php echo $name2 ?>"
var $name3 = " <?php echo $name3 ?>"
var $name4 = " <?php echo $name4 ?>"
var $name5 = " <?php echo $name5 ?>"
var $name6 = " <?php echo $name6 ?>"



var chartData = [ {
  "component": "Quiz",
  "mark": 4025,
  "color": "#FF0F00"
}, {
  "component": "Programming",
  "mark": 1882,
  "color": "#FF6600"
}, {
  "component": "Peer",
  "mark": 1809,
  "color": "#FF9E01"
}, {
  "component": "XXX",
  "mark": 1322,
  "color": "#FCD202"
}, {
  "component": "XXX",
  "mark": 1114,
  "color": "#B0DE09"
}, {
  "component": "XXX",
  "mark": 984,
  "color": "#04D215"
}];


var chart = AmCharts.makeChart( "chartdiv", {
  "theme": "none",
  "type": "serial",
  "dataProvider": chartData,
  "categoryField": "component",
  "depth3D": 10,
  "angle": 30,

  "categoryAxis": {
    "labelRotation": 90,
    "gridPosition": "start"
  },

  "valueAxes": [ {
    "title": $name1
  } ],

  "graphs": [ {
    "valueField": "mark",
    "colorField": "color",
    "type": "column",
    "lineAlpha": 0.1,
    "fillAlphas": 1
  } ],

  "chartCursor": {
    "cursorAlpha": 0,
    "zoomable": false,
    "categoryBalloonEnabled": false
  },

  "export": {
    "enabled": false
  }
} );




var chartData2 = [ {
  "component": "Quiz",
  "mark": 4025,
  "color": "#FF0F00"
}, {
  "component": "Programming",
  "mark": 1882,
  "color": "#FF6600"
}, {
  "component": "Peer",
  "mark": 1809,
  "color": "#FF9E01"
}, {
  "component": "XXX",
  "mark": 1322,
  "color": "#FCD202"
}]



var chart = AmCharts.makeChart( "chartdiv2", {
  "theme": "none",
  "type": "serial",
  "dataProvider": chartData2,
  "categoryField": "component",
  "depth3D": 10,
  "angle": 30,

  "categoryAxis": {
    "labelRotation": 90,
    "gridPosition": "start"
  },

  "valueAxes": [ {
    "title": $name2
  } ],

  "graphs": [ {
    "valueField": "mark",
    "colorField": "color",
    "type": "column",
    "lineAlpha": 0.1,
    "fillAlphas": 1
  } ],

  "chartCursor": {
    "cursorAlpha": 0,
    "zoomable": false,
    "categoryBalloonEnabled": false
  },

  "export": {
    "enabled": false
  }
} );





var chartData3 = [ {
  "component": "Quiz",
  "mark": 4025,
  "color": "#FF0F00"
}, {
  "component": "Programming",
  "mark": 1882,
  "color": "#FF6600"
}, {
  "component": "Peer",
  "mark": 1809,
  "color": "#FF9E01"
}, {
  "component": "XXX",
  "mark": 1322,
  "color": "#FCD202"
}]



var chart3 = AmCharts.makeChart( "chartdiv3", {
  "theme": "none",
  "type": "serial",
  "dataProvider": chartData3,
  "categoryField": "component",
  "depth3D": 10,
  "angle": 30,

  "categoryAxis": {
    "labelRotation": 90,
    "gridPosition": "start"
  },

  "valueAxes": [ {
    "title": $name3
  } ],

  "graphs": [ {
    "valueField": "mark",
    "colorField": "color",
    "type": "column",
    "lineAlpha": 0.1,
    "fillAlphas": 1
  } ],

  "chartCursor": {
    "cursorAlpha": 0,
    "zoomable": false,
    "categoryBalloonEnabled": false
  },

  "export": {
    "enabled": false
  }
} );




var chartData4 = [ {
  "component": "Quiz",
  "mark": 4025,
  "color": "#FF0F00"
}, {
  "component": "Programming",
  "mark": 1882,
  "color": "#FF6600"
}, {
  "component": "Peer",
  "mark": 1809,
  "color": "#FF9E01"
}, {
  "component": "XXX",
  "mark": 1322,
  "color": "#FCD202"
}]


var chart = AmCharts.makeChart( "chartdiv4", {
  "theme": "none",
  "type": "serial",
  "dataProvider": chartData4,
  "categoryField": "component",
  "depth3D": 10,
  "angle": 30,

  "categoryAxis": {
    "labelRotation": 90,
    "gridPosition": "start"
  },

  "valueAxes": [ {
    "title": $name4

  } ],

  "graphs": [ {
    "valueField": "mark",
    "colorField": "color",
    "type": "column",
    "lineAlpha": 0.1,
    "fillAlphas": 1
  } ],

  "chartCursor": {
    "cursorAlpha": 0,
    "zoomable": false,
    "categoryBalloonEnabled": false
  },

  "export": {
    "enabled": false
  }
} );



var chartData5 = [ {
  "component": "Quiz",
  "mark": 4025,
  "color": "#FF0F00"
}, {
  "component": "Programming",
  "mark": 1882,
  "color": "#FF6600"
}, {
  "component": "Peer",
  "mark": 1809,
  "color": "#FF9E01"
}, {
  "component": "XXX",
  "mark": 1322,
  "color": "#FCD202"
}]


var chart = AmCharts.makeChart( "chartdiv5", {
  "theme": "none",
  "type": "serial",
  "dataProvider": chartData5,
  "categoryField": "component",
  "depth3D": 10,
  "angle": 30,

  "categoryAxis": {
    "labelRotation": 90,
    "gridPosition": "start"
  },

  "valueAxes": [ {
    "title": $name5

  } ],

  "graphs": [ {
    "valueField": "mark",
    "colorField": "color",
    "type": "column",
    "lineAlpha": 0.1,
    "fillAlphas": 1
  } ],

  "chartCursor": {
    "cursorAlpha": 0,
    "zoomable": false,
    "categoryBalloonEnabled": false
  },

  "export": {
    "enabled": false
  }
} );



var chartData6 = [ {
  "component": "Quiz",
  "mark": 4025,
  "color": "#FF0F00"
}, {
  "component": "Programming",
  "mark": 1882,
  "color": "#FF6600"
}, {
  "component": "Peer",
  "mark": 1809,
  "color": "#FF9E01"
}, {
  "component": "XXX",
  "mark": 1322,
  "color": "#FCD202"
}]


var chart = AmCharts.makeChart( "chartdiv6", {
  "theme": "none",
  "type": "serial",
  "dataProvider": chartData6,
  "categoryField": "component",
  "depth3D": 10,
  "angle": 30,

  "categoryAxis": {
    "labelRotation": 90,
    "gridPosition": "start"
  },

  "valueAxes": [ {
    "title": $name6

  } ],

  "graphs": [ {
    "valueField": "mark",
    "colorField": "color",
    "type": "column",
    "lineAlpha": 0.1,
    "fillAlphas": 1
  } ],

  "chartCursor": {
    "cursorAlpha": 0,
    "zoomable": false,
    "categoryBalloonEnabled": false
  },

  "export": {
    "enabled": false
  }
} );





</script>

<!-- HTML -->
<td>
<div id="chartdiv"></div>
<div id="chartdiv2"></div>
<div id="chartdiv3"></div>
<div id="chartdiv4"></div>
<div id="chartdiv5"></div>
<div id="chartdiv6"></div>

</td>

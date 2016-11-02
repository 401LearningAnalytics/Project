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
	<tbody>
	<tr>
	<!-- create a table which has two columns -->
	<!-- personal information on the left columns -->
	<!-- course information on the right columns -->
	<td rowspan="2">

	<!-- this should be changed since it is a mock one -->
	<img src="http://articles.leetcode.com/wp-content/uploads/2015/03/touxiang.png" alt="" width="200" height="200" />
	<p><strong>Ualberta_user_id: </strong></p>
	<p>af858c7018f031692573be1de8fd62188e5d1bac</p>
	<p><strong>Gender:</strong> male</p>
	<p><strong>Join Time:</strong> 2012-02-22 11:32:05</p>
	</td>


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

<!-- Chart code -->
<script>



$name1 = "Course 1"
$name2 = "Course 2"
$name3 = "Course 3"
$name4 = "Course 4"
$name5 = "Course 5"
$name6 = "Course 6"


var chartData = [ {
  "country": "USA",
  "visits": 4025,
  "color": "#FF0F00"
}, {
  "country": "China",
  "visits": 1882,
  "color": "#FF6600"
}, {
  "country": "Japan",
  "visits": 1809,
  "color": "#FF9E01"
}, {
  "country": "Germany",
  "visits": 1322,
  "color": "#FCD202"
}, {
  "country": "France",
  "visits": 1114,
  "color": "#B0DE09"
}, {
  "country": "India",
  "visits": 984,
  "color": "#04D215"
}];


var chart = AmCharts.makeChart( "chartdiv", {
  "theme": "none",
  "type": "serial",
  "dataProvider": chartData,
  "categoryField": "country",
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
    "valueField": "visits",
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
  "country": "USA",
  "visits": 4025,
  "color": "#FF0F00"
}, {
  "country": "China",
  "visits": 1882,
  "color": "#FF6600"
}, {
  "country": "Japan",
  "visits": 1809,
  "color": "#FF9E01"
}, {
  "country": "Germany",
  "visits": 1322,
  "color": "#FCD202"
}]



var chart = AmCharts.makeChart( "chartdiv2", {
  "theme": "none",
  "type": "serial",
  "dataProvider": chartData2,
  "categoryField": "country",
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
    "valueField": "visits",
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
  "country": "USA",
  "visits": 4025,
  "color": "#FF0F00"
}, {
  "country": "China",
  "visits": 1882,
  "color": "#FF6600"
}, {
  "country": "Japan",
  "visits": 1809,
  "color": "#FF9E01"
}, {
  "country": "Germany",
  "visits": 1322,
  "color": "#FCD202"
}]



var chart3 = AmCharts.makeChart( "chartdiv3", {
  "theme": "none",
  "type": "serial",
  "dataProvider": chartData3,
  "categoryField": "country",
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
    "valueField": "visits",
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
  "country": "USA",
  "visits": 4025,
  "color": "#FF0F00"
}, {
  "country": "China",
  "visits": 1882,
  "color": "#FF6600"
}, {
  "country": "Japan",
  "visits": 1809,
  "color": "#FF9E01"
}, {
  "country": "Germany",
  "visits": 1322,
  "color": "#FCD202"
}]


var chart = AmCharts.makeChart( "chartdiv4", {
  "theme": "none",
  "type": "serial",
  "dataProvider": chartData4,
  "categoryField": "country",
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
    "valueField": "visits",
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
  "country": "USA",
  "visits": 4025,
  "color": "#FF0F00"
}, {
  "country": "China",
  "visits": 1882,
  "color": "#FF6600"
}, {
  "country": "Japan",
  "visits": 1809,
  "color": "#FF9E01"
}, {
  "country": "Germany",
  "visits": 1322,
  "color": "#FCD202"
}]


var chart = AmCharts.makeChart( "chartdiv5", {
  "theme": "none",
  "type": "serial",
  "dataProvider": chartData5,
  "categoryField": "country",
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
    "valueField": "visits",
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
  "country": "USA",
  "visits": 4025,
  "color": "#FF0F00"
}, {
  "country": "China",
  "visits": 1882,
  "color": "#FF6600"
}, {
  "country": "Japan",
  "visits": 1809,
  "color": "#FF9E01"
}, {
  "country": "Germany",
  "visits": 1322,
  "color": "#FCD202"
}]


var chart = AmCharts.makeChart( "chartdiv6", {
  "theme": "none",
  "type": "serial",
  "dataProvider": chartData6,
  "categoryField": "country",
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
    "valueField": "visits",
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

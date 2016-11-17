<script src="http://d3js.org/d3.v4.min.js" charset="utf-8"></script>

<!-- include the student page Interface -->
<?php include 'studentPageUI.php';?>
<!-- php file for fetching student data for creating charts-->
<?php include("studentPageData.php"); ?>
<!-- css file for chart style-->
<link rel="stylesheet" href="student_page_chart.css">

<!-- REFERENCE: https://www.amcharts.com/demos/exporting-chart-to-image/ -->


<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/none.js"></script>

<!-- Student Chart for each course -->
<script>
<!--http://stackoverflow.com/questions/16328256/extra-space-at-bottom-of-page-->

// chart names
var $name1 = " <?php echo $name1 ?>"
var $name2 = " <?php echo $name2 ?>"
var $name3 = " <?php echo $name3 ?>"
var $name4 = " <?php echo $name4 ?>"
var $name5 = " <?php echo $name5 ?>"
var $name6 = " <?php echo $name6 ?>"


// course 1 chart, row names and marks
var $row_name1 = " <?php echo $row_names[0] ?>"
var $row_name2 = " <?php echo $row_names[1] ?>"
var $row_name3 = " <?php echo $row_names[2] ?>"
var $row_name4 = " <?php echo $row_names[3] ?>"
var $row_name5 = " <?php echo $row_names[4] ?>"
var $row_name6 = " <?php echo $row_names[5] ?>"
var $mark1 = " <?php echo $marks1[0] ?>"
var $mark2 = " <?php echo $marks1[1] ?>"
var $mark3 = " <?php echo $marks1[2] ?>"
var $mark4 = " <?php echo $marks1[3] ?>"
var $mark5 = " <?php echo $marks1[4] ?>"
var $mark6 = " <?php echo $marks1[5] ?>"

// course 2 chart, row names and marks
var $row_name21 = " <?php echo $row_names2[0] ?>"
var $row_name22 = " <?php echo $row_names2[1] ?>"
var $row_name23 = " <?php echo $row_names2[2] ?>"
var $row_name24 = " <?php echo $row_names2[3] ?>"
var $row_name25 = " <?php echo $row_names2[4] ?>"
var $row_name26 = " <?php echo $row_names2[5] ?>"
var $mark21 = " <?php echo $marks2[0] ?>"
var $mark22 = " <?php echo $marks2[1] ?>"
var $mark23 = " <?php echo $marks2[2] ?>"
var $mark24 = " <?php echo $marks2[3] ?>"
var $mark25 = " <?php echo $marks2[4] ?>"
var $mark26 = " <?php echo $marks2[5] ?>"

// course 3 chart, row names and marks
var $row_name31 = " <?php echo $row_names3[0] ?>"
var $row_name32 = " <?php echo $row_names3[1] ?>"
var $row_name33 = " <?php echo $row_names3[2] ?>"
var $row_name34 = " <?php echo $row_names3[3] ?>"
var $row_name35 = " <?php echo $row_names3[4] ?>"
var $row_name36 = " <?php echo $row_names3[5] ?>"
var $mark31 = " <?php echo $marks3[0] ?>"
var $mark32 = " <?php echo $marks3[1] ?>"
var $mark33 = " <?php echo $marks3[2] ?>"
var $mark34 = " <?php echo $marks3[3] ?>"
var $mark35 = " <?php echo $marks3[4] ?>"
var $mark36 = " <?php echo $marks3[5] ?>"

// course 4 chart, row names and marks
var $row_name41 = " <?php echo $row_names4[0] ?>"
var $row_name42 = " <?php echo $row_names4[1] ?>"
var $row_name43 = " <?php echo $row_names4[2] ?>"
var $row_name44 = " <?php echo $row_names4[3] ?>"
var $row_name45 = " <?php echo $row_names4[4] ?>"
var $row_name46 = " <?php echo $row_names4[5] ?>"
var $mark41 = " <?php echo $marks4[0] ?>"
var $mark42 = " <?php echo $marks4[1] ?>"
var $mark43 = " <?php echo $marks4[2] ?>"
var $mark44 = " <?php echo $marks4[3] ?>"
var $mark45 = " <?php echo $marks4[4] ?>"
var $mark46 = " <?php echo $marks4[5] ?>"

// course 5 chart, row names and marks
var $row_name51 = " <?php echo $row_names5[0] ?>"
var $row_name52 = " <?php echo $row_names5[1] ?>"
var $row_name53 = " <?php echo $row_names5[2] ?>"
var $row_name54 = " <?php echo $row_names5[3] ?>"
var $row_name55 = " <?php echo $row_names5[4] ?>"
var $row_name56 = " <?php echo $row_names5[5] ?>"
var $mark51 = " <?php echo $marks5[0] ?>"
var $mark52 = " <?php echo $marks5[1] ?>"
var $mark53 = " <?php echo $marks5[2] ?>"
var $mark54 = " <?php echo $marks5[3] ?>"
var $mark55 = " <?php echo $marks5[4] ?>"
var $mark56 = " <?php echo $marks5[5] ?>"

// course 6 chart, row names and marks
var $row_name61 = " <?php echo $row_names6[0] ?>"
var $row_name62 = " <?php echo $row_names6[1] ?>"
var $row_name63 = " <?php echo $row_names6[2] ?>"
var $row_name64 = " <?php echo $row_names6[3] ?>"
var $row_name65 = " <?php echo $row_names6[4] ?>"
var $row_name66 = " <?php echo $row_names6[5] ?>"
var $mark61 = " <?php echo $marks6[0] ?>"
var $mark62 = " <?php echo $marks6[1] ?>"
var $mark63 = " <?php echo $marks6[2] ?>"
var $mark64 = " <?php echo $marks6[3] ?>"
var $mark65 = " <?php echo $marks6[4] ?>"
var $mark66 = " <?php echo $marks6[5] ?>"


// chart 1
var chartData = [ {
  "component": $row_name1,
  "mark": $mark1,
  "color": "#FF0F00"
}, {
  "component": $row_name2,
  "mark": $mark2,
  "color": "#FF6600"
}, {
  "component":$row_name3,
  "mark": $mark3,
  "color": "#FF9E01"
}, {
  "component": $row_name4,
  "mark": $mark4,
  "color": "#FCD202"
}, {
  "component": $row_name5,
  "mark": $mark5,
  "color": "#B0DE09"
}, {
  "component": $row_name6,
  "mark": $mark6,
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



// chart 2
var chartData2 = [ {
  "component": $row_name21,
  "mark": $mark21,
  "color": "#FF0F00"
}, {
  "component": $row_name22,
  "mark": $mark22,
  "color": "#FF6600"
}, {
  "component": $row_name23,
  "mark": $mark23,
  "color": "#FF9E01"
}, {
  "component": $row_name24,
  "mark": $mark24,
  "color": "#FCD202"
}, {
  "component": $row_name25,
  "mark": $mark25,
  "color": "#B0DE09"
}, {
  "component": $row_name26,
  "mark": $mark26,
  "color": "#04D215"
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



// chart 3
var chartData3 = [ {
  "component": $row_name31,
  "mark": $mark31,
  "color": "#FF0F00"
}, {
  "component": $row_name32,
  "mark": $mark32,
  "color": "#FF6600"
}, {
  "component": $row_name33,
  "mark": $mark33,
  "color": "#FF9E01"
}, {
  "component": $row_name34,
  "mark": $mark34,
  "color": "#FCD202"
}, {
  "component": $row_name35,
  "mark": $mark35,
  "color": "#B0DE09"
}, {
  "component": $row_name36,
  "mark": $mark36,
  "color": "#04D215"
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



// chart 4
var chartData4 = [ {
  "component": $row_name41,
  "mark": $mark41,
  "color": "#FF0F00"
}, {
  "component": $row_name42,
  "mark": $mark42,
  "color": "#FF6600"
}, {
  "component": $row_name43,
  "mark": $mark43,
  "color": "#FF9E01"
}, {
  "component": $row_name44,
  "mark": $mark44,
  "color": "#FCD202"
}, {
  "component": $row_name45,
  "mark": $mark45,
  "color": "#B0DE09"
}, {
  "component": $row_name46,
  "mark": $mark46,
  "color": "#04D215"
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


// chart 5
var chartData5 = [ {
  "component": $row_name51,
  "mark": $mark51,
  "color": "#FF0F00"
}, {
  "component": $row_name52,
  "mark": $mark52,
  "color": "#FF6600"
}, {
  "component": $row_name53,
  "mark": $mark53,
  "color": "#FF9E01"
}, {
  "component": $row_name54,
  "mark": $mark54,
  "color": "#FCD202"
}, {
  "component": $row_name55,
  "mark": $mark55,
  "color": "#B0DE09"
}, {
  "component": $row_name56,
  "mark": $mark56,
  "color": "#04D215"
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


// chart 6
var chartData6 = [ {
  "component": $row_name61,
  "mark": $mark61,
  "color": "#FF0F00"
}, {
  "component": $row_name62,
  "mark": $mark62,
  "color": "#FF6600"
}, {
  "component": $row_name63,
  "mark": $mark63,
  "color": "#FF9E01"
}, {
  "component": $row_name64,
  "mark": $mark64,
  "color": "#FCD202"
}, {
  "component": $row_name65,
  "mark": $mark65,
  "color": "#B0DE09"
}, {
  "component": $row_name66,
  "mark": $mark66,
  "color": "#04D215"
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

<style>
#chartdiv {
  width: 30%;
  height: 400px;
  position: relative;
  bottom: 0;
  right: 0px;
  margin-top: -400px;


}

#chartdiv2 {
  width: 30%;
  height: 400px;
  position: relative;
  right: -400px;
  margin-top: -400px;
}

#chartdiv3 {
  width: 30%;
  height: 400px;
  position: relative;
  right: -800px;
  margin-top: -400px;
}

#chartdiv4 {
  width: 30%;
  height: 400px;
  position: relative;
  right: 0px;
  margin-top: 0px;
}

#chartdiv5 {
  width: 30%;
  height: 400px;
  position: relative;
  right: -400px;
  margin-top: -400px;
}

#chartdiv6 {
  width: 30%;
  height: 400px;
  position: relative;
  right: -800px;
  margin-top: -400px;
}
</style>


<!-- HTML -->
<html>
<body background="https://www.google.ca/search?biw=1264&bih=662&tbm=isch&sa=1&q=html+background+image&oq=html+background+image&gs_l=img.3..0i67k1l2j0l3j0i67k1j0l4.2458.2458.0.2643.1.1.0.0.0.0.75.75.1.1.0....0...1.1.64.img..0.1.75.ogntPuYDsFM#imgdii=qDqsDyjRoCCNxM%3A%3BqDqsDyjRoCCNxM%3A%3Bsmg-S_wVoxnSLM%3A&imgrc=qDqsDyjRoCCNxM%3A">
<td>
<div id="chartdiv"></div>
<div id="chartdiv2"></div>
<div id="chartdiv3"></div>
<div id="chartdiv4"></div>
<div id="chartdiv5"></div>
<div id="chartdiv6"></div>

</td>
</html>

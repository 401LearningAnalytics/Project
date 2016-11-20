<?php
/**
  * This page includes the javascript code, HTML code of generating quiz charts on the apge.
  *
  * With given data, the page generates charts accordingly with
  * the grades of quizes in each component
  *
  * * Markdown style lists function too
  * * Just try this out once
  *
  * The section after the description contains the tags; which provide
  * structured meta-data concerning the given element.
  * @package ui
  *
  * @author  Hong Chen <chen1@ualberta.ca> 2016
  *
  * @since 1.0
  *
  * @param str    $name     The names of components in this course for the chart columns.
  * @param float  $per      The marks of each quiz grade that belong to different rages(eg. 0% - 25%), in each component.
  * @param float  $average  The average of quiz grade for each component for current course.
  * @param float  $standdev The standard deviation of quiz grade for each component for current course
  */

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

  var $per11 = " <?php echo round($per_count1[0]/$quiz_count[0],2) ?>";
  var $per12 = " <?php echo round($per_count1[1]/$quiz_count[0],2) ?>";
  var $per13 = " <?php echo round($per_count1[2]/$quiz_count[0],2) ?>";
  var $per14 = " <?php echo round($per_count1[3]/$quiz_count[0],2) ?>";

  var $per21 = " <?php echo round($per_count2[0]/$quiz_count[1],2) ?>";
  var $per22 = " <?php echo round($per_count2[1]/$quiz_count[1],2) ?>";
  var $per23 = " <?php echo round($per_count2[2]/$quiz_count[1],2) ?>";
  var $per24 = " <?php echo round($per_count2[3]/$quiz_count[1],2) ?>";

  var $per31 = " <?php echo round($per_count3[0]/$quiz_count[2],2) ?>";
  var $per32 = " <?php echo round($per_count3[1]/$quiz_count[2],2) ?>";
  var $per33 = " <?php echo round($per_count3[2]/$quiz_count[2],2) ?>";
  var $per34 = " <?php echo round($per_count3[3]/$quiz_count[2],2) ?>";

  var $per41 = " <?php echo round($per_count4[0]/$quiz_count[3],2) ?>";
  var $per42 = " <?php echo round($per_count4[1]/$quiz_count[3],2) ?>";
  var $per43 = " <?php echo round($per_count4[2]/$quiz_count[3],2) ?>";
  var $per44 = " <?php echo round($per_count4[3]/$quiz_count[3],2) ?>";

  var $per51 = " <?php echo round($per_count5[0]/$quiz_count[4],2) ?>";
  var $per52 = " <?php echo round($per_count5[1]/$quiz_count[4],2) ?>";
  var $per53 = " <?php echo round($per_count5[2]/$quiz_count[4],2) ?>";
  var $per54 = " <?php echo round($per_count5[3]/$quiz_count[4],2) ?>";

  var $per61 = " <?php echo round($per_count6[0]/$quiz_count[5],2) ?>";
  var $per62 = " <?php echo round($per_count6[1]/$quiz_count[5],2) ?>";
  var $per63 = " <?php echo round($per_count6[2]/$quiz_count[5],2) ?>";
  var $per64 = " <?php echo round($per_count6[3]/$quiz_count[5],2) ?>";



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
          "0%-25%": $per11,
          "26%-50%": $per12,
          "51%-75%": $per13,
          "76%-100%": $per14
      }, {
          "year": $name2,
          "0%-25%": $per21,
          "26%-50%": $per22,
          "51%-75%": $per23,
          "76%-100%": $per24
      }, {
          "year": $name3,
          "0%-25%": $per31,
          "26%-50%": $per32,
          "51%-75%": $per33,
          "76%-100%": $per34
      }, {
          "year": $name4,
          "0%-25%": $per41,
          "26%-50%": $per42,
          "51%-75%": $per43,
          "76%-100%": $per44
      }, {
          "year": $name5,
          "0%-25%": $per51,
          "26%-50%": $per52,
          "51%-75%": $per53,
          "76%-100%": $per54
      }, {
          "year": $name6,
          "0%-25%": $per61,
          "26%-50%": $per62,
          "51%-75%": $per63,
          "76%-100%": $per64
      }],
      "valueAxes": [{
          "stackType": "100%",
          "axisAlpha": 0.0,
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
      	"enabled": false
       }

  });
  </script>

  <!-- HTML -->
<div id="chartdiv"></div>



<?php include"quizAverage.php" ?>

<br>

<hr></hr>

<br>
<h2>Quiz Averages</h2>


<!-- Styles -->
<style>
#chartdiv2 {
	width	: 90%;
	height	: 500px;
}
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<!-- Chart code -->
<script>


$average1 = " <?php echo $ave1 ?>"
$average2 = " <?php echo $ave2 ?>"
$average3 = " <?php echo $ave3 ?>"
$average4 = " <?php echo $ave4 ?>"
$average5 = " <?php echo $ave5 ?>"
$average6 = " <?php echo $ave6 ?>"

$standdev1 = " <?php echo $std1 ?>"
$standdev2 = " <?php echo $std2 ?>"
$standdev3 = " <?php echo $std3 ?>"
$standdev4 = " <?php echo $std4 ?>"
$standdev5 = " <?php echo $std5 ?>"
$standdev6 = " <?php echo $std6 ?>"



var chart = AmCharts.makeChart( "chartdiv2", {
  "type": "serial",
  "theme": "light",
  "dataProvider": [ {
    "year": $name1,
    "value": $average1,
    "error": $standdev1
  }, {
    "year": $name2,
    "value": $average2,
    "error": $standdev2
  }, {
    "year": $name3,
    "value": $average3,
    "error": $standdev3
  }, {
    "year": $name4,
    "value": $average4,
    "error": $standdev4
  }, {
    "year": $name5,
    "value": $average5,
    "error": $standdev5
  }, {
    "year": $name6,
    "value": $average6,
    "error": $standdev6
  }, {
    "year": "",
    "value": 0,
    "error": 0
  }  ],
  "balloon": {
    "textAlign": "left"
  },
  "valueAxes": [ {
    "id": "v1",
    "axisAlpha": 0
  } ],
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "Value:<b>[[value]]</b><br>Standard Deviation:<b>[[error]]</b>",
    "bullet": "yError",
    "bulletSize": 10,
    "errorField": "error",
    "lineThickness": 2,
    "valueField": "value",
    "bulletAxis": "v1",
    "fillAlphas": 0
  }, {
    "bullet": "round",
    "bulletBorderAlpha": 1,
    "bulletBorderColor": "#FFFFFF",
    "lineAlpha": 0,
    "lineThickness": 2,
    "showBalloon": false,
    "valueField": "value"

  } ],
  "chartCursor": {
    "cursorAlpha": 0,
    "cursorPosition": "mouse",
    "graphBulletSize": 1,
    "zoomable": false
  },
  "categoryField": "year",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0
  },
  "export": {
    "enabled": false
  }
} );
</script>

<!-- HTML -->
<div id="chartdiv2"></div>

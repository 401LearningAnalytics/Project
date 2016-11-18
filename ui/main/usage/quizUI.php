
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

  var $per11 = " <?php echo $per_count1[0]/$quiz_count[0] ?>";
  var $per12 = " <?php echo $per_count1[1]/$quiz_count[0] ?>";
  var $per13 = " <?php echo $per_count1[2]/$quiz_count[0] ?>";
  var $per14 = " <?php echo $per_count1[3]/$quiz_count[0] ?>";

  var $per21 = " <?php echo $per_count2[0]/$quiz_count[1] ?>";
  var $per22 = " <?php echo $per_count2[1]/$quiz_count[1] ?>";
  var $per23 = " <?php echo $per_count2[2]/$quiz_count[1] ?>";
  var $per24 = " <?php echo $per_count2[3]/$quiz_count[1] ?>";

  var $per31 = " <?php echo $per_count3[0]/$quiz_count[2] ?>";
  var $per32 = " <?php echo $per_count3[1]/$quiz_count[2] ?>";
  var $per33 = " <?php echo $per_count3[2]/$quiz_count[2] ?>";
  var $per34 = " <?php echo $per_count3[3]/$quiz_count[2] ?>";

  var $per41 = " <?php echo $per_count4[0]/$quiz_count[3] ?>";
  var $per42 = " <?php echo $per_count4[1]/$quiz_count[3] ?>";
  var $per43 = " <?php echo $per_count4[2]/$quiz_count[3] ?>";
  var $per44 = " <?php echo $per_count4[3]/$quiz_count[3] ?>";

  var $per51 = " <?php echo $per_count5[0]/$quiz_count[4] ?>";
  var $per52 = " <?php echo $per_count5[1]/$quiz_count[4] ?>";
  var $per53 = " <?php echo $per_count5[2]/$quiz_count[4] ?>";
  var $per54 = " <?php echo $per_count5[3]/$quiz_count[4] ?>";

  var $per61 = " <?php echo $per_count6[0]/$quiz_count[5] ?>";
  var $per62 = " <?php echo $per_count6[1]/$quiz_count[5] ?>";
  var $per63 = " <?php echo $per_count6[2]/$quiz_count[5] ?>";
  var $per64 = " <?php echo $per_count6[3]/$quiz_count[5] ?>";



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
      	"enabled": false
       }

  });
  </script>

  <!-- HTML -->
<div id="chartdiv"></div>



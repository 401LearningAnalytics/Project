<!DOCTYPE html>
<meta charset="utf-8">
<style> /* set the CSS */

.line {
  fill: none;
  stroke: steelblue;
  stroke-width: 2px;
}

div.tooltip {
  position: absolute;
  text-align: center;
  width: 50px;
  height: 28px;
  padding: 2px;
  font: 12px sans-serif;
  background: lightsteelblue;
  border: 0px;
  border-radius: 8px;
}

</style>
<body>

<!-- load the d3.js library -->    	
<script src="https://d3js.org/d3.v4.min.js"></script>
<script>

// set the dimensions and margins of the graph
var margin = {top: 20, right: 20, bottom: 30, left: 50},
    width = 650 - margin.left - margin.right,
    height = 400 - margin.top - margin.bottom;

// parse the date / time
var parseTime = d3.timeParse("%d-%b-%Y");
var formatTime = d3.timeFormat("%e %B");

// set the ranges
var x = d3.scaleTime().range([0, width]);
var y = d3.scaleLinear().range([height, 0]);

// define the line
var valueline = d3.line()
    .x(function(d) { return x(d.date); })
    .y(function(d) { return y(d.grade); });

var div = d3.select("body").append("div")
    .attr("class", "tooltip")
    .style("opacity", 0);

// append the svg obgect to the body of the page
// appends a 'group' element to 'svg'
// moves the 'group' element to the top left margin
var svg = d3.select("body").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform",
          "translate(" + margin.left + "," + margin.top + ")");

// Get the data
d3.csv("csv_file/agile_plan.csv", function(error, data) {
  if (error) throw error;

  // format the data
  data.forEach(function(d) {
      d.id = +d.ualberta_user_id;
      d.date = parseTime(d.course_grade_ts);
      d.grade = +d.course_grade_verified;
  });

  // scale the range of the data
  x.domain(d3.extent(data, function(d) { return d.date; }));
  y.domain([0, d3.max(data, function(d) { return d.grade; })]);

 

  // add the dots with tooltips
  svg.selectAll("dot")
     .data(data)
   .enter().append("circle")
     .attr("r", 5)
     .attr("cx", function(d) { return x(d.date); })
     .attr("cy", function(d) { return y(d.grade); })
     .on("mouseover", function(d) {
       div.transition()
         .duration(200)
         .style("opacity", .9);
      div .html(
         '<a href="studentPage.php?student_id=' + d.ualberta_user_id + '">' + // The first <a> tag
         formatTime(d.date) +
         "</a>" +                          // closing </a> tag
         "<br/>"  + d.grade)     
         .style("left", (d3.event.pageX) + "px")             
         .style("top", (d3.event.pageY - 28) + "px");
       });

  // add the X Axis
  svg.append("g")
      .attr("transform", "translate(0," + height + ")")
      .call(d3.axisBottom(x));

  // add the Y Axis
  svg.append("g")
      .call(d3.axisLeft(y));

});

</script>
</body>
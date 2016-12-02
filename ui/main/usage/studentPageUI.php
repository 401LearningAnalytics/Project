<?php
/**
  * This page includes the javascript code, HTML code of generating student info on the page.
  *
  * This page shows the default student picture and the ualerta_user_id
  * 
  *
  * * Markdown style lists function too
  * * Just try this out once
  *
  * The section after the description contains the tags; which provide
  * structured meta-data concerning the given element.
  * @package ui
  * @author  Wei Song <chen1@ualberta.ca> 2016
  *
  * @since 1.0
  *
  */
?>
<html>

  <head>
    <meta charset="utf-8">
    <title>Student Page</title>
    <style>
    body{
    	background-image: url("../../img/background2.jpg");
    	background-color: #C9B1C4;
    }

    // setup layout for the page
    table {width:80%; background-color:#fff;}
    thead td { width: width of the other columns; }
    thead td:first-child { width: 30%; }
    thead td:last-child {width: 60%; }
  </style>

  </head>
  <body>
	<h1 align="center">Student</h1>
	<table style="height: 455px;" width="795" align="center">
	<tbody style ="right: 800px;">
	<!-- create a table which has two columns -->
	<!-- personal information on the left columns -->
	<!-- course information on the right columns -->


	<!-- this should be changed since it is a mock one -->
  <tr >
	<p><strong>Ualberta User Id:</strong> <?php echo "<input type=\"text\" value=".substr($_GET["student_id"], 0, 10)." readonly>"; ?></p>

	</tr>

	</tbody>
	</table>

  </body>
</html>

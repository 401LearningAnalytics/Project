<?php
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=soft_mana.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('ualberta_user_id', 'course_grade_ts', 'course_grade_verified'));

// fetch the data
mysql_connect('localhost', 'Wei', '123456');
mysql_select_db('learner');
$rows = mysql_query("SELECT ualberta_user_id, DATE_FORMAT(course_grade_ts,'%d-%b-%Y'),course_grade_verified FROM course_grades WHERE course_id='99SZyjVxEeW6RApRXdjJPw'");

// loop over the rows, outputting them
while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);
?>
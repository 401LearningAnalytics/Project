<?php
    $username = "Wei"; 
    $password = "123456";   
    $host = "localhost";
    $database="learner";
    
    $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);

    $myquery = "
SELECT ualberta_user_id, DATE_FORMAT(course_grade_ts,'%d-%m-%y'),course_grade_verified FROM course_grades";
    $query = mysql_query($myquery);
    
    if ( ! $query ) {
        echo mysql_error();
        die;
    }
    
    $data = array();
    
    for ($x = 0; $x < mysql_num_rows($query); $x++) {
        $data[] = mysql_fetch_assoc($query);
    }
    
    echo json_encode($data);     
     
    mysql_close($server);
?>

<html><body><h1>CSV Uploading Page</h1></body></html>
<script src="https://d3js.org/d3.v4.min.js"></script>




<br></br>
<table width="600">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">

<tr>
<td width="20%">Select file</td>
<td width="80%"><input type="file" name="file" id="file" /></td>
</tr>

<tr>
<td>Submit</td>
<td><input type="submit" name="submit" /></td>
</tr>

</form>
</table>


<?php
if ( isset($_POST["submit"]) ) {

   if ( isset($_FILES["file"])) {

            //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

        }
        else {
                 //Print file details
             echo "Upload: " . $_FILES["file"]["name"] . "<br />";
             echo "Type: " . $_FILES["file"]["type"] . "<br />";
             echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
             echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

                 //if file already exists
             if (file_exists("upload/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
             }
             else {
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
            $storagename = "uploaded_file.txt";
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);
            echo "Stored in: " . "upload/" . $_FILES["file"]["name"] . "<br />";
            }
        }
     } else {
             echo "No file selected <br />";
     }
}



?>



<br></br>
<?php
$servername = "localhost";
$username = "root";
$password = "117130";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully\n";






echo"<br></br>";
$sql1 = "create database learner;";
if ($conn->query($sql1) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error;
}




echo"<br></br>";
$sql1 = "use learner;";
if ($conn->query($sql1) === TRUE) {
    echo "Database switched successfully\n";
} else {
    echo "Error switching database: " . $conn->error;
}





echo"<br></br>";
$sql = "CREATE TABLE assessment_scope_types (
    assessment_scope_type_id INT4
    ,assessment_scope_type_desc VARCHAR(255)
    ,PRIMARY KEY (assessment_scope_type_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE assessment_scopes (
    assessment_scope_id VARCHAR(50)
    ,assessment_scope_type_id INT4
    ,PRIMARY KEY (assessment_scope_id, assessment_scope_type_id)
    ,FOREIGN KEY (assessment_scope_type_id) REFERENCES assessment_scope_types(assessment_scope_type_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE assessment_types (
    assessment_type_id INT4
    ,assessment_type_desc VARCHAR(50)
    ,PRIMARY KEY (assessment_type_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE assessments (
    assessment_id VARCHAR(50)
    ,assessment_base_id VARCHAR(50)
    ,assessment_version INT4
    ,assessment_type_id INT4
    ,assessment_update_ts TIMESTAMP NULL DEFAULT NULL
    ,assessment_passing_fraction FLOAT4
    ,PRIMARY KEY (assessment_id)
    ,FOREIGN KEY (assessment_type_id) REFERENCES assessment_types(assessment_type_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE assessment_actions (
    assessment_action_id VARCHAR(100)
    ,assessment_action_base_id VARCHAR(100)
    ,assessment_id VARCHAR(50)
    ,assessment_scope_id VARCHAR(50)
    ,assessment_scope_type_id INT4
    ,assessment_action_version INT4
    ,assessment_action_ts TIMESTAMP NULL DEFAULT NULL
    ,assessment_action_start_ts TIMESTAMP NULL DEFAULT NULL
    ,guest_user_id VARCHAR(50)
    ,ualberta_assessments_user_id VARCHAR(50) NOT NULL
    ,PRIMARY KEY (assessment_action_id)
    ,FOREIGN KEY (assessment_scope_id, assessment_scope_type_id) REFERENCES assessment_scopes(assessment_scope_id, assessment_scope_type_id)
    ,FOREIGN KEY (assessment_id) REFERENCES assessments(assessment_id)
    ,FOREIGN KEY (assessment_scope_type_id) REFERENCES assessment_scope_types(assessment_scope_type_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}




echo"<br></br>";
$sql = "CREATE TABLE assessment_question_types (
    assessment_question_type_id INT4
    ,assessment_question_type_desc VARCHAR(50)
    ,PRIMARY KEY (assessment_question_type_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}





echo"<br></br>";
$sql = "CREATE TABLE assessment_questions (
    assessment_question_id VARCHAR(50)
    ,assessment_question_base_id VARCHAR(50)
    ,assessment_question_version INT4
    ,assessment_question_type_id INT4
    ,assessment_question_prompt VARCHAR(20000)
    ,assessment_question_update_ts TIMESTAMP
    ,PRIMARY KEY (assessment_question_id)
    ,FOREIGN KEY (assessment_question_type_id) REFERENCES assessment_question_types(assessment_question_type_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE assessment_assessments_questions (
    assessment_id VARCHAR(50)
    ,assessment_question_id VARCHAR(50)
    ,assessment_question_internal_id VARCHAR(50)
    ,assessment_question_cuepoint INT4
    ,assessment_question_order INT4
    ,assessment_question_weight INT4
    ,PRIMARY KEY (assessment_id, assessment_question_id, assessment_question_internal_id)
    ,FOREIGN KEY (assessment_id) REFERENCES assessments(assessment_id)
    ,FOREIGN KEY (assessment_question_id) REFERENCES assessment_questions(assessment_question_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE assessment_checkbox_questions (
    assessment_question_id VARCHAR(50)
    ,assessment_question_shuffle_options BOOL
    ,assessment_question_allow_partial_scoring BOOL
    ,PRIMARY KEY (assessment_question_id)
    ,FOREIGN KEY (assessment_question_id) REFERENCES assessment_questions(assessment_question_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE assessment_checkbox_reflect_questions (
    assessment_question_id VARCHAR(50)
    ,assessment_question_shuffle_options BOOL
    ,PRIMARY KEY (assessment_question_id)
    ,FOREIGN KEY (assessment_question_id) REFERENCES assessment_questions(assessment_question_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE assessment_math_expression_patterns (
    assessment_question_id VARCHAR(50)
    ,assessment_pattern_id VARCHAR(50)
    ,assessment_pattern_display VARCHAR(10000)
    ,assessment_pattern_feedback VARCHAR(10000)
    ,assessment_pattern_correct BOOL
    ,PRIMARY KEY (assessment_question_id, assessment_pattern_id)
    ,FOREIGN KEY (assessment_question_id) REFERENCES assessment_questions(assessment_question_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}








echo"<br></br>";
$sql = "CREATE TABLE assessment_math_expression_questions (
    assessment_question_id VARCHAR(50)
    ,default_incorrect_feedback VARCHAR(20000)
    ,PRIMARY KEY (assessment_question_id)
    ,FOREIGN KEY (assessment_question_id) REFERENCES assessment_questions(assessment_question_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE assessment_mcq_questions (
    assessment_question_id VARCHAR(50)
    ,assessment_question_shuffle_options BOOL
    ,PRIMARY KEY (assessment_question_id)
    ,FOREIGN KEY (assessment_question_id) REFERENCES assessment_questions(assessment_question_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE assessment_mcq_reflect_questions (
    assessment_question_id VARCHAR(50)
    ,assessment_question_shuffle_options BOOL
    ,PRIMARY KEY (assessment_question_id)
    ,FOREIGN KEY (assessment_question_id) REFERENCES assessment_questions(assessment_question_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE assessment_options (
    assessment_question_id VARCHAR(50)
    ,assessment_option_id VARCHAR(50)
    ,assessment_option_display VARCHAR(10000)
    ,assessment_option_feedback VARCHAR(10000)
    ,assessment_option_correct BOOL
    ,PRIMARY KEY (assessment_question_id, assessment_option_id)
    ,FOREIGN KEY (assessment_question_id) REFERENCES assessment_questions(assessment_question_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE assessment_pattern_flag_types (
    assessment_pattern_flag_type_id INT4
    ,assessment_pattern_flag_type_desc VARCHAR(50)
    ,PRIMARY KEY (assessment_pattern_flag_type_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE assessment_pattern_types (
    assessment_pattern_type_id INT4
    ,assessment_pattern_type_desc VARCHAR(50)
    ,PRIMARY KEY (assessment_pattern_type_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}








echo"<br></br>";
$sql = "CREATE TABLE assessment_reflect_questions (
    assessment_question_id VARCHAR(50)
    ,assessment_question_feedback VARCHAR(20000)
    ,PRIMARY KEY (assessment_question_id)
    ,FOREIGN KEY (assessment_question_id) REFERENCES assessment_questions(assessment_question_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE assessment_regex_pattern_flags (
    assessment_pattern_id VARCHAR(50)
    ,assessment_pattern_flag_type_id INT4
    ,PRIMARY KEY (assessment_pattern_id, assessment_pattern_flag_type_id)
    ,FOREIGN KEY (assessment_pattern_flag_type_id) REFERENCES assessment_pattern_flag_types(assessment_pattern_flag_type_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE assessment_regex_patterns (
    assessment_question_id VARCHAR(50)
    ,assessment_pattern_id VARCHAR(50)
    ,assessment_pattern_regex VARCHAR(10000)
    ,assessment_pattern_feedback VARCHAR(10000)
    ,assessment_pattern_correct BOOL
    ,PRIMARY KEY (assessment_question_id, assessment_pattern_id)
    ,FOREIGN KEY (assessment_question_id) REFERENCES assessment_questions(assessment_question_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE assessment_regex_questions (
    assessment_question_id VARCHAR(50)
    ,default_incorrect_feedback VARCHAR(20000)
    ,PRIMARY KEY (assessment_question_id)
    ,FOREIGN KEY (assessment_question_id) REFERENCES assessment_questions(assessment_question_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE assessment_responses (
    assessment_response_id VARCHAR(50)
    ,assessment_id VARCHAR(50)
    ,assessment_action_id VARCHAR(100)
    ,assessment_action_version INT4
    ,assessment_question_id VARCHAR(50)
    ,assessment_response_score FLOAT4
    ,assessment_response_weighted_score FLOAT4
    ,PRIMARY KEY (assessment_response_id)
    ,FOREIGN KEY (assessment_action_id) REFERENCES assessment_actions(assessment_action_id)
    ,FOREIGN KEY (assessment_id, assessment_action_id) REFERENCES assessment_actions(assessment_id, assessment_action_id)
    ,FOREIGN KEY (assessment_id) REFERENCES assessments(assessment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE assessment_response_options (
    assessment_response_id VARCHAR(50)
    ,assessment_option_id VARCHAR(50)
    ,assessment_response_correct BOOL
    ,assessment_response_feedback VARCHAR(20000)
    ,assessment_response_selected BOOL
    ,PRIMARY KEY (assessment_response_id, assessment_option_id)
    ,FOREIGN KEY (assessment_response_id) REFERENCES assessment_responses(assessment_response_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE assessment_response_patterns (
    assessment_response_id VARCHAR(50)
    ,assessment_pattern_id VARCHAR(50)
    ,assessment_response_answer VARCHAR(10000)
    ,assessment_response_correct BOOL
    ,assessment_response_feedback VARCHAR(10000)
    ,PRIMARY KEY (assessment_response_id)
    ,FOREIGN KEY (assessment_response_id) REFERENCES assessment_responses(assessment_response_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}




echo"<br></br>";
$sql = "CREATE TABLE assessment_single_numeric_patterns (
    assessment_question_id VARCHAR(50)
    ,assessment_pattern_id VARCHAR(50)
    ,assessment_pattern_type_id INT4
    ,assessment_pattern_value VARCHAR(10000)
    ,assessment_pattern_max FLOAT8
    ,assessment_pattern_min FLOAT8
    ,assessment_pattern_include_min BOOL
    ,assessment_pattern_include_max BOOL
    ,assessment_pattern_feedback VARCHAR(10000)
    ,assessment_pattern_correct BOOL
    ,PRIMARY KEY (assessment_question_id, assessment_pattern_id)
    ,FOREIGN KEY (assessment_question_id) REFERENCES assessment_questions(assessment_question_id)
    ,FOREIGN KEY (assessment_pattern_type_id) REFERENCES assessment_pattern_types(assessment_pattern_type_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE assessment_single_numeric_questions (
    assessment_question_id VARCHAR(50)
    ,default_incorrect_feedback VARCHAR(20000)
    ,PRIMARY KEY (assessment_question_id)
    ,FOREIGN KEY (assessment_question_id) REFERENCES assessment_questions(assessment_question_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE assessment_text_exact_match_patterns (
    assessment_question_id VARCHAR(50)
    ,assessment_pattern_id VARCHAR(50)
    ,assessment_pattern_display VARCHAR(10000)
    ,assessment_pattern_feedback VARCHAR(10000)
    ,assessment_pattern_correct BOOL
    ,PRIMARY KEY (assessment_question_id, assessment_pattern_id)
    ,FOREIGN KEY (assessment_question_id) REFERENCES assessment_questions(assessment_question_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE assessment_text_exact_match_questions (
    assessment_question_id VARCHAR(50)
    ,default_incorrect_feedback VARCHAR(20000)
    ,PRIMARY KEY (assessment_question_id)
    ,FOREIGN KEY (assessment_question_id) REFERENCES assessment_questions(assessment_question_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE users (
    ualberta_user_id VARCHAR(50) NOT NULL
    ,user_join_ts timestamp
    ,country_cd varchar(400) /*XXXXXX*/
    ,region_cd varchar(400)
    ,profile_language_cd varchar(400)
    ,browser_language_cd varchar(400)
    ,PRIMARY KEY (ualberta_user_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}





echo"<br></br>";
$sql = "CREATE TABLE course_formative_quiz_grades (
    course_id varchar(400) NOT NULL
    ,course_item_id varchar(400) NOT NULL
    ,ualberta_user_id VARCHAR(50) NOT NULL
    ,course_quiz_grade_ts timestamp
    ,course_quiz_grade float4
    ,course_quiz_max_grade float4
    ,PRIMARY KEY (course_id, course_item_id, ualberta_user_id, course_quiz_grade_ts)
    ,FOREIGN KEY (ualberta_user_id) REFERENCES users(ualberta_user_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE course_item_passing_states (
    course_item_passing_state_id INT4
    ,course_item_passing_state_desc VARCHAR(255)
    ,PRIMARY KEY (course_item_passing_state_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}





echo"<br></br>";
$sql = "CREATE TABLE course_passing_states (
    course_passing_state_id INT4
    ,course_passing_state_desc VARCHAR(255)
    ,PRIMARY KEY (course_passing_state_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE course_grades (
    course_id varchar(400)
    ,ualberta_user_id VARCHAR(50) NOT NULL
    ,course_grade_ts timestamp
    ,course_passing_state_id INT4
    ,course_grade_overall_passed_items int4
    ,course_grade_overall float4
    ,course_grade_verified_passed_items int4
    ,course_grade_verified float4
    ,PRIMARY KEY (course_id, ualberta_user_id, course_grade_ts)
    ,FOREIGN KEY (course_passing_state_id) REFERENCES course_passing_states(course_passing_state_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}





echo"<br></br>";
$sql = "CREATE TABLE course_item_assessments (
    course_id varchar(1000)  /*XXXXXXX*/
    ,course_item_id varchar(1000)
    ,assessment_id varchar(1000)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE course_modules (
    course_id VARCHAR(50)
    ,course_module_id VARCHAR(50)
    ,course_module_order INT4
    ,course_module_name VARCHAR(2000)
    ,course_module_desc VARCHAR(10000)
    ,PRIMARY KEY (course_id, course_module_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}





echo"<br></br>";
$sql = "CREATE TABLE course_lessons (
    course_id VARCHAR(50)
    ,course_lesson_id VARCHAR(50)
    ,course_module_id VARCHAR(50)
    ,course_lesson_order INT4
    ,course_lesson_name VARCHAR(10000)
    ,PRIMARY KEY (course_id, course_lesson_id)
    ,FOREIGN KEY (course_id, course_module_id) REFERENCES course_modules(course_id, course_module_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE course_items (
    course_id VARCHAR(50)
    ,course_item_id VARCHAR(50)
    ,course_lesson_id VARCHAR(50)
    ,course_item_order INT4
    ,course_item_type_id INT4
    ,course_item_name VARCHAR(10000)
    ,course_item_optional BOOL
    ,PRIMARY KEY (course_id, course_item_id)
    ,FOREIGN KEY (course_id, course_lesson_id) REFERENCES course_lessons(course_id, course_lesson_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE course_item_grades (
    course_id varchar(400)
    ,course_item_id varchar(400)
    ,ualberta_user_id VARCHAR(50) NOT NULL
    ,course_item_grade_ts timestamp
    ,course_item_passing_state_id int4
    ,course_item_grade_overall float4
    ,course_item_grade_verified float4
    ,course_item_grade_pending float4
    ,PRIMARY KEY (course_id, course_item_id, ualberta_user_id, course_item_grade_ts)
    ,FOREIGN KEY (course_id, course_item_id) REFERENCES course_items(course_id, course_item_id)
    ,FOREIGN KEY (course_item_passing_state_id) REFERENCES course_item_passing_states(course_item_passing_state_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE course_item_peer_assignments (
    course_id varchar(400)
    ,course_item_id varchar(400)
    ,peer_assignment_id varchar(400)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE course_item_programming_assignments (
    course_id varchar(400)
    ,course_item_id varchar(400)
    ,programming_assignment_id varchar(400)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE course_item_types (
    course_item_type_id INT4
    ,course_item_type_desc VARCHAR(255)
    ,course_item_type_category VARCHAR(255)
    ,course_item_type_graded BOOL
    ,PRIMARY KEY (course_item_type_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE course_memberships (
    ualberta_user_id VARCHAR(50) NOT NULL
    ,course_id VARCHAR(50)
    ,course_membership_role VARCHAR(50)
    ,course_membership_ts TIMESTAMP
    ,PRIMARY KEY (ualberta_user_id, course_id, course_membership_ts)
    ,FOREIGN KEY (ualberta_user_id) REFERENCES users(ualberta_user_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}




echo"<br></br>";
$sql = "CREATE TABLE course_progress_state_types (
    course_progress_state_type_id int4
    ,course_progress_state_type_desc varchar(400)
    ,PRIMARY KEY (course_progress_state_type_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE course_progress (
    course_id varchar(400)
    ,course_item_id varchar(400)
    ,ualberta_user_id VARCHAR(50) NOT NULL
    ,course_progress_state_type_id int4
    ,course_progress_ts timestamp
    ,PRIMARY KEY (course_id, course_item_id, ualberta_user_id, course_progress_state_type_id, course_progress_ts)
    ,FOREIGN KEY (course_progress_state_type_id) REFERENCES course_progress_state_types(course_progress_state_type_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE courses (
    course_id VARCHAR(50)
    ,course_slug VARCHAR(2000)
    ,course_name VARCHAR(2000)
    ,course_launch_ts TIMESTAMP
    ,course_update_ts TIMESTAMP NUll DEFAULT Null
    ,course_deleted BOOL
    ,course_graded BOOL
    ,course_desc VARCHAR(10000)
    ,course_restricted BOOL
    ,course_verification_enabled_at_ts TIMESTAMP NUll DEFAULT Null
    ,primary_translation_equivalent_course_id VARCHAR(50)
    ,course_preenrollment_ts TIMESTAMP NUll DEFAULT Null
    ,course_workload VARCHAR(100)
    ,course_session_enabled_ts TIMESTAMP NUll DEFAULT Null
    ,PRIMARY KEY (course_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}








echo"<br></br>";
$sql = "CREATE TABLE demographics_answers (
    question_id int4
    ,ualberta_demographics_user_id VARCHAR(50) NOT NULL
    ,submission_ts timestamp
    ,choice_id int4
    ,answer_int int4
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE demographics_choices (
    question_id int4
    ,choice_id int4
    ,choice_desc varchar(400)
    ,PRIMARY KEY (question_id, choice_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE demographics_question_types (
    question_type_id INT4
    ,question_type_desc VARCHAR(25)
    ,PRIMARY KEY (question_type_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE demographics_questions (
    question_id int4
    ,question_type_id int4
    ,question_desc varchar(400)
    ,PRIMARY KEY (question_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE discussion_answer_flags (
    ualberta_discussions_user_id VARCHAR(50) NOT NULL
    ,course_id varchar(400)
    ,discussion_answer_id varchar(400)
    ,discussion_answer_flag_active bool
    ,discussion_answer_flag_ts timestamp
    ,PRIMARY KEY (ualberta_discussions_user_id, discussion_answer_id, discussion_answer_flag_ts)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}




echo"<br></br>";
$sql = "CREATE TABLE discussion_answer_votes (
    ualberta_discussions_user_id VARCHAR(50) NOT NULL
    ,course_id varchar(400)
    ,discussion_answer_id varchar(400)
    ,discussion_answer_vote_value int4
    ,discussion_answer_vote_ts timestamp
    ,PRIMARY KEY (ualberta_discussions_user_id, discussion_answer_id, discussion_answer_vote_ts)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}




echo"<br></br>";
$sql = "CREATE TABLE discussion_answers (
    discussion_answer_id varchar(400)
    ,ualberta_discussions_user_id VARCHAR(50) NOT NULL
    ,course_id varchar(400)
    ,discussion_answer_content varchar(400)
    ,discussion_question_id varchar(400)
    ,discussion_answer_parent_discussion_answer_id varchar(400)
    ,discussion_answer_created_ts timestamp NUll DEFAULT Null
    ,discussion_answer_updated_ts timestamp NUll DEFAULT Null
    ,PRIMARY KEY (discussion_answer_id)
    ,FOREIGN KEY (discussion_answer_parent_discussion_answer_id) REFERENCES discussion_answers(discussion_answer_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE discussion_forums (
    discussion_forum_id VARCHAR(50)
    ,course_id VARCHAR(50)
    ,discussion_forum_title VARCHAR(10000)
    ,discussion_forum_description VARCHAR(10000)
    ,discussion_forum_order INT4
    ,PRIMARY KEY (discussion_forum_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}





echo"<br></br>";
$sql = "CREATE TABLE discussion_question_flags (
    ualberta_discussions_user_id VARCHAR(50) NOT NULL
    ,course_id varchar(400)
    ,discussion_question_id varchar(400)
    ,discussion_question_flag_active bool
    ,discussion_question_flag_ts timestamp
    ,PRIMARY KEY (ualberta_discussions_user_id, discussion_question_id, discussion_question_flag_ts)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}




echo"<br></br>";
$sql = "CREATE TABLE discussion_question_followings (
    ualberta_discussions_user_id VARCHAR(50) NOT NULL
    ,course_id varchar(400)
    ,discussion_question_id varchar(400)
    ,discussion_question_following_active bool
    ,discussion_question_following_ts timestamp
    ,PRIMARY KEY (ualberta_discussions_user_id, discussion_question_id, discussion_question_following_ts)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE discussion_question_votes (
    ualberta_discussions_user_id VARCHAR(50) NOT NULL
    ,course_id varchar(400)
    ,discussion_question_id varchar(400)
    ,discussion_question_vote_value int4
    ,discussion_question_vote_ts timestamp
    ,PRIMARY KEY (ualberta_discussions_user_id, discussion_question_id, discussion_question_vote_ts)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE discussion_questions (
    discussion_question_id VARCHAR(50)
    ,ualberta_discussions_user_id VARCHAR(50) NOT NULL
    ,discussion_question_title VARCHAR(10000)
    ,discussion_question_details VARCHAR(10000)
    ,discussion_question_context_type VARCHAR(50)
    ,course_id VARCHAR(50)
    ,course_module_id VARCHAR(50)
    ,course_item_id VARCHAR(50)
    ,discussion_forum_id VARCHAR(50)
    ,country_cd VARCHAR(2)
    ,group_id VARCHAR(50)
    ,discussion_question_created_ts TIMESTAMP NUll DEFAULT NUll
    ,discussion_question_updated_ts TIMESTAMP NUll DEFAULT NUll
    ,PRIMARY KEY (discussion_question_id)
    ,FOREIGN KEY (course_id) REFERENCES courses(course_id)
    ,FOREIGN KEY (course_id, course_item_id) REFERENCES course_items(course_id, course_item_id)
    ,FOREIGN KEY (course_id, course_module_id) REFERENCES course_modules(course_id, course_module_id)
    ,FOREIGN KEY (discussion_forum_id) REFERENCES discussion_forums(discussion_forum_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE feedback_course_comments (
    course_id varchar(300)
    ,feedback_system varchar(300)
    ,ualberta_feedback_user_id VARCHAR(50) NOT NULL
    ,feedback_category varchar(300)
    ,feedback_text varchar(400)
    ,feedback_ts timestamp
    ,PRIMARY KEY (course_id, feedback_system, ualberta_feedback_user_id, feedback_category, feedback_ts)
    ,FOREIGN KEY (course_id) REFERENCES courses(course_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}





echo"<br></br>";
$sql = "CREATE TABLE feedback_course_ratings (
    course_id varchar(400)
    ,ualberta_feedback_user_id VARCHAR(50) NOT NULL
    ,feedback_system varchar(400)
    ,feedback_rating int4
    ,feedback_max_rating int4
    ,feedback_ts timestamp
    ,PRIMARY KEY (course_id, feedback_system, ualberta_feedback_user_id, feedback_ts)
    ,FOREIGN KEY (course_id) REFERENCES courses(course_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE feedback_item_comments (
    course_id varchar(100)
    ,course_item_id varchar(100)
    ,feedback_unit_id varchar(100)
    ,feedback_unit_type varchar(100)
    ,feedback_system varchar(100)
    ,detailed_context varchar(100)
    ,ualberta_feedback_user_id VARCHAR(50) NOT NULL
    ,feedback_category varchar(100)
    ,feedback_text varchar(100)
    ,feedback_ts timestamp
    ,feedback_active bool
    ,PRIMARY KEY (course_id, course_item_id, feedback_unit_id, feedback_unit_type, feedback_system, ualberta_feedback_user_id, feedback_category, feedback_ts)
    ,FOREIGN KEY (course_id) REFERENCES courses(course_id)
    ,FOREIGN KEY (course_id, course_item_id) REFERENCES course_items(course_id, course_item_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE feedback_item_ratings (
    course_id varchar(100)
    ,course_item_id varchar(100)
    ,feedback_unit_id varchar(100)
    ,feedback_unit_type varchar(100)
    ,feedback_system varchar(100)
    ,ualberta_feedback_user_id VARCHAR(50) NOT NULL
    ,feedback_rating int4
    ,feedback_max_rating int4
    ,detailed_context varchar(100)
    ,feedback_ts timestamp
    ,PRIMARY KEY (course_id, course_item_id, feedback_unit_id, feedback_unit_type, feedback_system, ualberta_feedback_user_id, feedback_ts)
    ,FOREIGN KEY (course_id) REFERENCES courses(course_id)
    ,FOREIGN KEY (course_id, course_item_id) REFERENCES course_items(course_id, course_item_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}








echo"<br></br>";
$sql = "CREATE TABLE on_demand_session_memberships (
    course_id varchar (300)
    ,on_demand_session_id varchar (300)
    ,ualberta_user_id VARCHAR(50) NOT NULL
    ,on_demand_sessions_membership_start_ts timestamp Null DEFAULT Null
    ,on_demand_sessions_membership_end_ts timestamp Null DEFAULT Null
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}




echo"<br></br>";
$sql = "CREATE TABLE on_demand_sessions (
    course_id varchar(300)
    ,on_demand_session_id varchar(300)
    ,on_demand_sessions_start_ts timestamp Null DEFAULT Null
    ,on_demand_sessions_end_ts timestamp Null DEFAULT Null
    ,on_demand_sessions_enrollment_end_ts timestamp Null DEFAULT Null
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE peer_assignments (
    peer_assignment_id VARCHAR(50)
    ,peer_assignment_base_id VARCHAR(50)
    ,peer_assignment_type VARCHAR(50)
    ,peer_assignment_required_review_count INT4
    ,peer_assignment_passing_fraction FLOAT8
    ,peer_assignment_required_reviewer_count_for_score INT4
    ,peer_assignment_required_wait_for_score_ms INT8
    ,peer_assignment_maximum_score FLOAT8
    ,peer_assignment_update_ts TIMESTAMP
    ,PRIMARY KEY (peer_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE peer_assignment_review_schema_parts (
    peer_assignment_id VARCHAR(50)
    ,peer_assignment_review_schema_part_id VARCHAR(50)
    ,peer_assignment_review_schema_part_type VARCHAR(50)
    ,peer_assignment_review_schema_part_order INT4
    ,peer_assignment_review_schema_part_prompt VARCHAR(1535)
    ,peer_assignment_review_schema_part_maximum_score FLOAT8
    ,PRIMARY KEY (peer_assignment_review_schema_part_id, peer_assignment_id)
    ,FOREIGN KEY (peer_assignment_id) REFERENCES peer_assignments(peer_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}





echo"<br></br>";
$sql = "CREATE TABLE peer_assignment_review_schema_part_options (
    peer_assignment_id VARCHAR(50)
    ,peer_assignment_review_schema_part_id VARCHAR(50)
    ,peer_assignment_review_schema_part_option_id VARCHAR(50)
    ,peer_assignment_review_schema_part_option_text VARCHAR(1845)
    ,peer_assignment_review_schema_part_option_score FLOAT8
    ,PRIMARY KEY (peer_assignment_id, peer_assignment_review_schema_part_id, peer_assignment_review_schema_part_option_id)
    ,FOREIGN KEY (peer_assignment_id, peer_assignment_review_schema_part_id) REFERENCES peer_assignment_review_schema_parts(peer_assignment_id, peer_assignment_review_schema_part_id)
    ,FOREIGN KEY (peer_assignment_id) REFERENCES peer_assignments(peer_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}









echo"<br></br>";
$sql = "CREATE TABLE peer_assignment_submission_schema_parts (
    peer_assignment_id VARCHAR(50)
    ,peer_assignment_submission_schema_part_id VARCHAR(50)
    ,peer_assignment_submission_schema_part_type VARCHAR(50)
    ,peer_assignment_submission_schema_part_order INT4
    ,peer_assignment_submission_schema_part_prompt VARCHAR(1535)
    ,PRIMARY KEY (peer_assignment_id, peer_assignment_submission_schema_part_id)
    ,FOREIGN KEY (peer_assignment_id) REFERENCES peer_assignments(peer_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}





echo"<br></br>";
$sql = "CREATE TABLE peer_submissions (
    peer_submission_id VARCHAR(50)
    ,peer_assignment_id VARCHAR(50)
    ,ualberta_peer_assignments_user_id VARCHAR(50) NOT NULL
    ,peer_submission_created_ts TIMESTAMP
    ,peer_submission_is_draft BOOL
    ,peer_submission_title VARCHAR(1535)
    ,peer_submission_removed_from_public_ts TIMESTAMP Null DEFAULT Null
    ,peer_submission_score_available_ts TIMESTAMP Null DEFAULT Null
    ,peer_submission_score FLOAT8
    ,PRIMARY KEY (peer_submission_id)
    ,FOREIGN KEY (peer_assignment_id) REFERENCES peer_assignments(peer_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}




echo"<br></br>";
$sql = "CREATE TABLE peer_comments (
    peer_comment_id VARCHAR(50)
    ,peer_submission_id VARCHAR(50)
    ,ualberta_peer_assignments_user_id VARCHAR(50) NOT NULL
    ,peer_comment_created_ts TIMESTAMP
    ,peer_comment_text VARCHAR(1535)
    ,PRIMARY KEY (peer_comment_id)
    ,FOREIGN KEY (peer_submission_id) REFERENCES peer_submissions(peer_submission_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}




echo"<br></br>";
$sql = "CREATE TABLE peer_reviews (
    peer_review_id VARCHAR(50)
    ,peer_submission_id VARCHAR(50)
    ,ualberta_peer_assignments_user_id VARCHAR(50) NOT NULL
    ,peer_review_created_ts TIMESTAMP Null DEFAULT Null
    ,peer_review_first_visible_to_submitter_ts TIMESTAMP Null DEFAULT Null
    ,peer_review_marked_helpful_ts TIMESTAMP Null DEFAULT Null
    ,peer_review_rated_ts TIMESTAMP Null DEFAULT Null
    ,peer_review_rating INT4
    ,PRIMARY KEY (peer_review_id)
    ,FOREIGN KEY (peer_submission_id) REFERENCES peer_submissions(peer_submission_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE peer_review_part_choices (
    peer_assignment_id VARCHAR(50)
    ,peer_assignment_review_schema_part_id VARCHAR(50)
    ,peer_assignment_review_schema_part_option_id VARCHAR(50)
    ,peer_review_id VARCHAR(50)
    ,PRIMARY KEY (peer_assignment_id, peer_assignment_review_schema_part_id, peer_assignment_review_schema_part_option_id, peer_review_id)
    ,FOREIGN KEY (peer_review_id) REFERENCES peer_reviews(peer_review_id)
    ,FOREIGN KEY (peer_assignment_id, peer_assignment_review_schema_part_id) REFERENCES peer_assignment_review_schema_parts(peer_assignment_id, peer_assignment_review_schema_part_id)
    ,FOREIGN KEY (peer_assignment_id, peer_assignment_review_schema_part_id, peer_assignment_review_schema_part_option_id) REFERENCES peer_assignment_review_schema_part_options(peer_assignment_id, peer_assignment_review_schema_part_id, peer_assignment_review_schema_part_option_id)
    ,FOREIGN KEY (peer_assignment_id) REFERENCES peer_assignments(peer_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}





echo"<br></br>";
$sql = "CREATE TABLE peer_review_part_free_responses (
    peer_assignment_id VARCHAR(50)
    ,peer_assignment_review_schema_part_id VARCHAR(50)
    ,peer_review_id VARCHAR(50)
    ,peer_review_part_free_response_text VARCHAR(1535)
    ,PRIMARY KEY (peer_assignment_id, peer_assignment_review_schema_part_id, peer_review_id)
    ,FOREIGN KEY (peer_review_id) REFERENCES peer_reviews(peer_review_id)
    ,FOREIGN KEY (peer_assignment_id, peer_assignment_review_schema_part_id) REFERENCES peer_assignment_review_schema_parts(peer_assignment_id, peer_assignment_review_schema_part_id)
    ,FOREIGN KEY (peer_assignment_id) REFERENCES peer_assignments(peer_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}




echo"<br></br>";
$sql = "CREATE TABLE peer_skips (
    peer_skip_id VARCHAR(50)
    ,peer_submission_id VARCHAR(50)
    ,ualberta_peer_assignments_user_id VARCHAR(50) NOT NULL
    ,peer_skip_created_ts TIMESTAMP
    ,peer_skip_type VARCHAR(50)
    ,peer_skip_text VARCHAR(1535)
    ,PRIMARY KEY (peer_skip_id)
    ,FOREIGN KEY (peer_submission_id) REFERENCES peer_submissions(peer_submission_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";
$sql = "CREATE TABLE peer_submission_part_free_responses (
    peer_assignment_id VARCHAR(50)
    ,peer_assignment_submission_schema_part_id VARCHAR(50)
    ,peer_submission_id VARCHAR(50)
    ,peer_submission_part_free_response_text VARCHAR(1535)
    ,PRIMARY KEY (peer_assignment_id, peer_assignment_submission_schema_part_id, peer_submission_id)
    ,FOREIGN KEY (peer_assignment_id, peer_submission_id) REFERENCES peer_submissions(peer_assignment_id, peer_submission_id)
    ,FOREIGN KEY (peer_assignment_id, peer_assignment_submission_schema_part_id) REFERENCES peer_assignment_submission_schema_parts(peer_assignment_id, peer_assignment_submission_schema_part_id)
    ,FOREIGN KEY (peer_assignment_id) REFERENCES peer_assignments(peer_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo"<br></br>";
$sql = "CREATE TABLE peer_submission_part_scores (
    peer_assignment_id VARCHAR(50)
    ,peer_assignment_review_schema_part_id VARCHAR(50)
    ,peer_submission_id VARCHAR(50)
    ,peer_submission_part_score FLOAT8
    ,PRIMARY KEY (peer_assignment_id, peer_assignment_review_schema_part_id, peer_submission_id)
    ,FOREIGN KEY (peer_assignment_id, peer_submission_id) REFERENCES peer_submissions(peer_assignment_id, peer_submission_id)
    ,FOREIGN KEY (peer_assignment_id, peer_assignment_review_schema_part_id) REFERENCES peer_assignment_review_schema_parts(peer_assignment_id, peer_assignment_review_schema_part_id)
    ,FOREIGN KEY (peer_assignment_id) REFERENCES peer_assignments(peer_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}





echo"<br></br>";
$sql = "CREATE TABLE peer_submission_part_urls (
    peer_assignment_id VARCHAR(50)
    ,peer_assignment_submission_schema_part_id VARCHAR(50)
    ,peer_submission_id VARCHAR(50)
    ,peer_submission_part_url_url VARCHAR(1535)
    ,peer_submission_part_url_title VARCHAR(1535)
    ,peer_submission_part_url_description VARCHAR(1535)
    ,PRIMARY KEY (peer_assignment_id, peer_assignment_submission_schema_part_id, peer_submission_id)
    ,FOREIGN KEY (peer_assignment_id, peer_submission_id) REFERENCES peer_submissions(peer_assignment_id, peer_submission_id)
    ,FOREIGN KEY (peer_assignment_id, peer_assignment_submission_schema_part_id) REFERENCES peer_assignment_submission_schema_parts(peer_assignment_id, peer_assignment_submission_schema_part_id)
    ,FOREIGN KEY (peer_assignment_id) REFERENCES peer_assignments(peer_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo"<br></br>";



$sql = "CREATE TABLE programming_assignments (
    programming_assignment_id VARCHAR(50)
    ,programming_assignment_base_id VARCHAR(50)
    ,programming_assignment_type VARCHAR(50)
    ,programming_assignment_submission_type VARCHAR(50)
    ,programming_assignment_instruction_text VARCHAR(1535)
    ,programming_assignment_passing_fraction FLOAT8
    ,programming_assignment_submission_builder_schema_type VARCHAR(50)
    ,programming_assignment_submission_builder_schema VARCHAR(1535)
    ,programming_assignment_update_ts TIMESTAMP
    ,PRIMARY KEY (programming_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}




echo "<br></br>";
$sql = "CREATE TABLE programming_submissions (
    programming_submission_id VARCHAR(50)
    ,programming_assignment_id VARCHAR(50)
    ,ualberta_programming_assignments_user_id VARCHAR(50) NOT NULL
    ,programming_submission_created_ts TIMESTAMP
    ,programming_submission_type VARCHAR(50)
    ,programming_submission_grading_status VARCHAR(50)
    ,programming_submission_score INT4
    ,PRIMARY KEY (programming_submission_id)
    ,FOREIGN KEY (programming_assignment_id) REFERENCES programming_assignments(programming_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo "<br></br>";
$sql = "CREATE TABLE programming_assignment_submission_schema_parts (
    programming_assignment_id VARCHAR(50)
    ,programming_assignment_submission_schema_part_id VARCHAR(50)
    ,programming_assignment_submission_schema_part_title VARCHAR(1535)
    ,programming_assignment_submission_schema_part_type VARCHAR(50)
    ,programming_assignment_submission_schema_part_order INT4
    ,programming_assignment_submission_schema_part_max_score INT4
    ,programming_assignment_submission_schema_part_is_optional BOOL
    ,programming_assignment_submission_schema_part_xacgt8 INT4
    ,programming_assignment_submission_schema_default_g663i6 VARCHAR(1535)
    ,PRIMARY KEY (programming_assignment_submission_schema_part_id, programming_assignment_id)
    ,FOREIGN KEY (programming_assignment_id) REFERENCES programming_assignments(programming_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}





echo "<br></br>";
$sql = "CREATE TABLE programming_submission_parts (
    programming_assignment_id VARCHAR(50)
    ,programming_assignment_submission_schema_part_id VARCHAR(50)
    ,programming_submission_id VARCHAR(50)
    ,programming_submission_part_type VARCHAR(50)
    ,PRIMARY KEY (programming_assignment_id, programming_assignment_submission_schema_part_id, programming_submission_id)
    ,FOREIGN KEY (programming_assignment_id, programming_submission_id) REFERENCES programming_submissions(programming_assignment_id, programming_submission_id)
    ,FOREIGN KEY (programming_assignment_id) REFERENCES programming_assignments(programming_assignment_id)
    ,FOREIGN KEY (programming_assignment_submission_schema_part_id, programming_assignment_id) REFERENCES programming_assignment_submission_schema_parts(programming_assignment_submission_schema_part_id, programming_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo "<br></br>";
$sql = "CREATE TABLE programming_submission_part_text_submissions (
    programming_assignment_id VARCHAR(50)
    ,programming_assignment_submission_schema_part_id VARCHAR(50)
    ,programming_submission_id VARCHAR(50)
    ,programming_submission_part_text_submission_answer VARCHAR(1535)
    ,PRIMARY KEY (programming_assignment_id, programming_assignment_submission_schema_part_id, programming_submission_id)
    ,FOREIGN KEY (programming_assignment_id, programming_submission_id) REFERENCES programming_submissions(programming_assignment_id, programming_submission_id)
    ,FOREIGN KEY (programming_assignment_id) REFERENCES programming_assignments(programming_assignment_id)
    ,FOREIGN KEY (programming_assignment_submission_schema_part_id, programming_assignment_id) REFERENCES programming_assignment_submission_schema_parts(programming_assignment_submission_schema_part_id, programming_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo "<br></br>";
$sql = "CREATE TABLE programming_submission_part_grid_submissions (
    programming_assignment_id VARCHAR(50)
    ,programming_assignment_submission_schema_part_id VARCHAR(50)
    ,programming_submission_id VARCHAR(50)
    ,programming_submission_part_grid_submission_url VARCHAR(1535)
    ,programming_submission_part_grid_submission_custom_cykkte VARCHAR(1535)
    ,PRIMARY KEY (programming_assignment_id, programming_assignment_submission_schema_part_id, programming_submission_id)
    ,FOREIGN KEY (programming_assignment_id, programming_submission_id) REFERENCES programming_submissions(programming_assignment_id, programming_submission_id)
    ,FOREIGN KEY (programming_assignment_id) REFERENCES programming_assignments(programming_assignment_id)
    ,FOREIGN KEY (programming_assignment_submission_schema_part_id, programming_assignment_id) REFERENCES programming_assignment_submission_schema_parts(programming_assignment_submission_schema_part_id, programming_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}







echo "<br></br>";
$sql = "CREATE TABLE programming_submission_part_grid_grading_statuses (
    programming_assignment_id VARCHAR(50)
    ,programming_assignment_submission_schema_part_id VARCHAR(50)
    ,programming_submission_id VARCHAR(50)
    ,programming_submission_part_grid_grading_status_pgrtf5 VARCHAR(50)
    ,programming_submission_part_grid_grading_status_x21exo TIMESTAMP
    ,programming_submission_part_grid_grading_status_jzmjz1 VARCHAR(50)
    ,PRIMARY KEY (programming_assignment_id, programming_assignment_submission_schema_part_id, programming_submission_id)
    ,FOREIGN KEY (programming_assignment_id, programming_submission_id) REFERENCES programming_submissions(programming_assignment_id, programming_submission_id)
    ,FOREIGN KEY (programming_assignment_id) REFERENCES programming_assignments(programming_assignment_id)
    ,FOREIGN KEY (programming_assignment_submission_schema_part_id, programming_assignment_id) REFERENCES programming_assignment_submission_schema_parts(programming_assignment_submission_schema_part_id, programming_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo "<br></br>";
$sql = "CREATE TABLE programming_submission_part_evaluations (
    programming_assignment_id VARCHAR(50)
    ,programming_assignment_submission_schema_part_id VARCHAR(50)
    ,programming_submission_id VARCHAR(50)
    ,programming_submission_part_score INT4
    ,programming_submission_part_grading_ts TIMESTAMP
    ,programming_submission_part_feedback VARCHAR(1535)
    ,PRIMARY KEY (programming_assignment_id, programming_assignment_submission_schema_part_id, programming_submission_id)
    ,FOREIGN KEY (programming_assignment_id, programming_submission_id) REFERENCES programming_submissions(programming_assignment_id, programming_submission_id)
    ,FOREIGN KEY (programming_assignment_id) REFERENCES programming_assignments(programming_assignment_id)
    ,FOREIGN KEY (programming_assignment_submission_schema_part_id, programming_assignment_id) REFERENCES programming_assignment_submission_schema_parts(programming_assignment_submission_schema_part_id, programming_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}






echo "<br></br>";
$sql = "CREATE TABLE ualberta_course_user_ids (
    ualberta_user_id VARCHAR(50) NOT NULL
    ,agile_planning_for_software_products_user_id VARCHAR(50) NOT NULL
    ,PRIMARY KEY (ualberta_user_id)
    ,FOREIGN KEY (ualberta_user_id) REFERENCES users(ualberta_user_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}





/*

echo "<br></br>";
$sql = "CREATE TABLE users_courses__certificate_payments (
    ualberta_user_id VARCHAR(50) NOT NULL
    ,course_id varchar
    ,met_payment_condition bool
    ,was_payment bool
    ,was_finaid_grant bool
    ,was_group_sponsored bool
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

*/






/*
$sql = "CREATE TABLE programming_assignment_submission_schema_part_grid_schemas (
    programming_assignment_id VARCHAR(50)
    ,programming_assignment_submission_schema_part_id VARCHAR(50)
    ,programming_assignment_submission_schema_part_grid_gyd0w6 VARCHAR(1535)
    ,programming_assignment_submission_schema_part_grid_lb2xog VARCHAR(50)
    ,programming_assignment_submission_schema_part_grid_49aqrn VARCHAR(1535)
    ,PRIMARY KEY (programming_assignment_submission_schema_part_id, programming_assignment_id)
    ,FOREIGN KEY (programming_assignment_id) REFERENCES programming_assignments(programming_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}



$sql = "CREATE TABLE programming_assignment_submission_schema_part_xbkvdx (
    programming_assignment_id VARCHAR(50)
    ,programming_assignment_submission_schema_part_id VARCHAR(50)
    ,programming_assignment_submission_schema_part_m934n INT4
    ,programming_assignment_submission_schema_part_d4407a BOOL
    ,programming_assignment_submission_schema_part_mrj41 VARCHAR(1535)
    ,programming_assignment_submission_schema_part_2fyxz4 VARCHAR(1535)
    ,PRIMARY KEY (programming_assignment_submission_schema_part_possible_response_order, programming_assignment_submission_schema_part_id, programming_assignment_id)
    ,FOREIGN KEY (programming_assignment_id) REFERENCES programming_assignments(programming_assignment_id)
    ,FOREIGN KEY (programming_assignment_submission_schema_part_id, programming_assignment_id) REFERENCES programming_assignment_submission_schema_parts(programming_assignment_submission_schema_part_id, programming_assignment_id)
);";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

*/






$conn->close();

?>

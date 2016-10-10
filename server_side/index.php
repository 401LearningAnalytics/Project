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






$conn->close();

?>

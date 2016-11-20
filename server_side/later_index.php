<?php
/** 
  * 
  * 
  * 
  *
  * @package server
  * @author  
  *
  * @since 1.0
  *
  */
?>
<html><body><h1>CSV Uploading Page</h1></body></html>
<script src="https://d3js.org/d3.v4.min.js"></script>




<br></br>
<table width="600">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="300000000" />

<tr>
<td width="20%">Select file</td>
<td width="80%"><input type="file" name="file" id="file" multiple="multiple"/></td>
</tr>

<tr>
<td>Submit</td>
<td><input type="submit" name="submit" /></td>
</tr>

</form>
</table>


<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;


if ( isset($_POST["submit"]) ) {
   if ( isset($_FILES["file"])) {
            //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "ERROR Return Code: " . $_FILES["file"]["error"] . "<br />";
        }
        else {
                 //Print file details
             echo "Upload: " . $_FILES["file"]["name"] . "<br />";
             echo "Type: " . $_FILES["file"]["type"] . "<br />";
             echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
             echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
             $basename = basename($_FILES["file"]['name']);
             echo "Basename: ". $basename;
             echo "<br>";
	     // Check if file already exists
             if (file_exists($target_file)) {
                 echo "Sorry, file already exists. <br/>";
                 $uploadOk = 0;
             }


             // Check if $uploadOk is set to 0 by an error
             if ($uploadOk == 0) {
                 echo "Sorry, your file was not uploaded. <br/>";
                 // if everything is ok, try to upload file
             } else {
                 if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                     echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded. <br/>";
                     $output=shell_exec("python3 upload.py ". escapeshellarg($target_file));
		     echo "python returned: " . $output. "<br/>";
                 } else {
                     echo "Sorry, there was an error uploading your file. <br/>";
                 }
	     }
	}
    }
}
?>
<br><br/>

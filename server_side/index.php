<?php
/** This page is uploading zip files page
  * 
  * This page allows you to choose needed zip files to upload 
  * 
  *
  * @package server
  * @author  Omar ALmokdad <almokdad@ualberta.ca> 2016
  *
  * @since 1.0
  *
  */
?>
<html>
<head>
<style>
.button {
    width: 10em;
    border: 1px solid #f44c0e;
    color: yellow;
    background: tomato;
    padding: 10px 20px;
    border-radius: 3px;
}
.button:hover{
         background: #f44c0e;
}
</style>
<style>
    body  {
    background-image: url("../ui/img/background2.jpg");
    background-color: #ffffff;
}
  </style>
  <link rel="stylesheet" type="text/css" href="../ui/css/button.css" />

</head>
<body><center><h1>Data Uploading Page</h1></body></html>
<script src="https://d3js.org/d3.v4.min.js"></script>


<br></br>
<table width="600">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">


<tr> 
<td width="20%"><b><h2>Select file</h2></b></td>
<td width="80%"><input type="file" name="file" id="file" multiple="multiple"/></td>
</tr>

<tr>
<td width="20%"><b><h2>Submit</h2></b></td>
<td width="80%"><input type="submit" name="submit" /></td>
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
                     $output=shell_exec("./upload.py ". escapeshellarg($target_file));
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

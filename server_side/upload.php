<?php
/** This page is uploading csv files page
  * 
  * This page allows you to choose needed csv files to upload 
  * 
  *
  * @package server
  * @author  Hong Chen <chen1@ualberta.ca> 2016
  *
  * @since 1.0
  *
  */
?>

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
            echo "ERROR Return Code: " . $_FILES["file"]["error"] . "<br />";

        }
        else {
                 //Print file details
             echo "Upload: " . $_FILES["file"]["name"] . "<br />";
             echo "Type: " . $_FILES["file"]["type"] . "<br />";
             echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
             echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

             $basename = basename($_FILES["file"]['name'],".csv");
             echo "Basename: ". $basename;
             echo "<br>";


             $file = fopen(realpath($_FILES["file"]["tmp_name"]), 'r');



             $i = 0;
             while (($line = fgetcsv($file)) !== FALSE) {
                              //$line is an array of the csv elements

             $n = count($line);
             $j = 0;
             $string = "INSERT into ".$basename." VALUES(";

            if ($i > 0){
                  while($j < $n){
                    if (strcmp($line[$j], "") != 0 & strcmp($line[$j], "t") != 0 && strcmp($line[$j], "f") != 0){
                      $string = $string."\"".$line[$j]."\"";
                    }else if(strcmp($line[$j], "f") == 0){
                      $string = $string."false";
                    }else if(strcmp($line[$j], "t") == 0){
                      $string = $string."true";
                    }

                    if (strcmp($line[$j], "") == 0){$string = $string."NULL";}

                    if ($j + 1 < $n){$string = $string.",";}

                    $j++;
                  }

                $string = $string.");";
                echo $string."<br>";

                $servername = "localhost";
                $username = "Wei";
                $password = "123456";


                // Create connection
                $conn = new mysqli($servername, $username, $password);

                // Check connection
                if ($conn->connect_error) {
                   die("Connection failed: " . $conn->connect_error."<br>");
                }

                $sql = "use learner;";
                if (!($conn->query($sql) === TRUE)) {

                   echo "Error switching database: " . $conn->error."<br>";
                }



                if ($conn->query($string) === TRUE) {
                   echo "Data inserted successfully"."<br>";
                } else {
                   echo "Error inserting data: " . $conn->error."<br>";
                }
                $conn->close();



           }

             echo "<br>";
             $i ++ ;
            }
            fclose($file);

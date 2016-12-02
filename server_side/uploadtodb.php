<?php
/**
  * 
  *
  * @package server
  * @author  
  *
  * @since 1.0
  *
  */
?>
<?php
   $filename = $argv[1];
   $basename = $argv[2];
                 //Print file details
             $file = fopen($filename, 'r');
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
                $sql = "use test;";
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
             $i++ ;
}
fclose($file);
?>

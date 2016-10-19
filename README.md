## Coursera Analytics System

This is a webapp that analyzes and visualizes learner data from Massive Open Online Course (MOOC) Coursera, including their demographics, assessments, marks, course progress, and discussions.

It is implemented in HTML and javascript for the front end and use PHP mySQL for the back end.

The server is provided by Cybera.


For test usage, set up localhost, install mysql, and change the lines including Mysql connection in the files to you own username.

To create database and all the tables, open webpage /server_side/create_database.php(opening more than once will cause error of that tables already exist)

To populate database, use /server_side/upload.php and submit the csv files you intend to upload. The order of uploading csv file is enforced 



Reference:
How to upload and parse a CSV file in php
http://stackoverflow.com/questions/5593473/how-to-upload-and-parse-a-csv-file-in-php

PHP basename(for uploading into the correct table from the file name)
http://php.net/manual/en/function.basename.php

Parse a CSV string into an array
http://php.net/manual/en/function.str-getcsv.php
http://stackoverflow.com/questions/9139202/how-to-parse-a-csv-file-using-php
http://www.w3schools.com/php/func_filesystem_fgetcsv.asp

<?php

 $host='localhost';
 $username='root';
 $password='';
 $database='db_enrolmentsys_liquit';
 
 $connection=mysqli_connect($host,$username,$password,$database);

 if(!$connection)
 {
  die("Connection failed.");
 } 

?>
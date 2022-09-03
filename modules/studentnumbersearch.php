<?php
include "dbconnection.php";

$sql = "select count(*)+1 as id from tbl_student";
$result = mysqli_query($connection,$sql);
$res1=mysqli_fetch_assoc($result);

$sql2 = "select year(now()) as year";
$result2 = mysqli_query($connection,$sql2);
$res2=mysqli_fetch_assoc($result2);

//search for id + 1
$qry = "select studentid + 1 as StudentID from tbl_student order by studentid desc limit 1";
$qres = mysqli_query($connection,$qry);
$result = mysqli_fetch_assoc($qres);
$val = $result['StudentID'];

if (!mysqli_query($connection,$sql))
{
 die("Error: " . mysqli_error($connection));
} else {

  $num = $res1['id'];
  $format = $res2['year'] . "-%04d";
  session_start();
  $_SESSION['id']=sprintf($format, $num);
  $_SESSION['uid']=$val;
  header("Location:../forms/studentform.php");
}

?>
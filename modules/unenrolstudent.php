<?php
include "dbconnection.php";

$id=$_GET['id'];

$sql = "update tbl_student set IsActive='NO' where studentid=$id";
$exc = $result = mysqli_query($connection,$sql);

header("Location:../forms/studentrecord.php");


?>
<?php
include "dbconnection.php";

$id = $_GET['id'];

$sql = "delete from tbl_student where studentID=$id";
$res = mysqli_query($connection,$sql);

session_start();
$_SESSION['success_message'] = "studentdeleted";
header("Location:../forms/studentrecord.php");

?>
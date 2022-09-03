<?php 
include "dbconnection.php";

$id=$_GET['id'];
$used = false;

$qry = "select levelid from tbl_student where levelid=$id limit 1";
$res = mysqli_query($connection,$qry);
$res = mysqli_fetch_assoc($res);
$res = $res['levelid'];

if ($res==""){
    $sql = "delete from tbl_level where LevelID=$id";
    $result = mysqli_query($connection,$sql);

    session_start();
    $_SESSION['success_message']='deleted';
    header("Location:../forms/levelform.php");
} else {
    session_start();
    $_SESSION['success_message']='cannotdelete';
    header("Location:../forms/levelform.php");
}


?>
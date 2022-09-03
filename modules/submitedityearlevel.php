<?php session_start();
include "dbconnection.php";

$id = $_POST['LevelID'];
$val = $_POST['LevelDesc'];
$currentVal = $_SESSION['currentValue'];

$sql = "update tbl_level set LevelDesc='$val' where levelid=$id";

if ($currentVal == $val) {
    header("location:edityearlevel.php?id=$id");
    $_SESSION['success_message'] = "NO";
} else {
    try {
        mysqli_query($connection,$sql);
        session_start();
        $_SESSION['success_message']='doneedit';
        header("location:../forms/levelform.php");
    } catch (exception $e){
        session_start();
        $_SESSION['success_message']='errorupdatelevel';
        header("location:../forms/levelform.php");
    }

}


// session_start();
// $_SESSION['success_message']='doneedit';
// header("location:../forms/levelform.php");

?>
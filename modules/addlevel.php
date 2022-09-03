<?php 
include "dbconnection.php";

$id=$_POST['LevelID'];
$desc=$_POST['LevelDesc'];

$sql = "INSERT INTO tbl_level VALUES ('$id','$desc','Yes')";

try {
    mysqli_query($connection,$sql);
    session_start();
    $_SESSION['success_message']="YES";
    header("Location:../forms/levelform.php");
} catch(Exception $e) {
    session_start();
    $_SESSION['success_message']="ERROR";
    header("Location:../forms/levelform.php");
}

?>
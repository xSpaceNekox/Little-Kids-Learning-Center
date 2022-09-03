<?php 
include "dbconnection.php";

$id=$_GET['id'];

$sql = "update tbl_level set IsActive='Yes' where LevelID=$id";
$res = $result = mysqli_query($connection,$sql);

session_start();
$_SESSION['success_message']='setactive';
header("Location:../forms/levelform.php");

?>
<?php 
include "dbconnection.php";

$id=$_GET['id'];

$sql = "update tbl_level set IsActive='No' where LevelID=$id";
$res = $result = mysqli_query($connection,$sql);

session_start();
$_SESSION['success_message']='setinactive';
header("Location:../forms/levelform.php");

?>
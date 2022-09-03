<?php
include "dbconnection.php";

$studentNumber = $_POST['studentNumber'];
$studentFirstname = $_POST['studentFirstname'];
$studentLastname = $_POST['studentLastname'];
$studentMiddlename = $_POST['studentMiddlename'];
$studentBirthdate = $_POST['studentBirthdate'];
$studentGender = $_POST['studentGender'];
$studentContactnumber = $_POST['studentContactnumber'];
$studentAddress = $_POST['studentAddress'];
$studentCity = $_POST['studentCity'];
$studentZip = $_POST['studentZip'];
$studentParentname = $_POST['studentParentname'];
$studentParentrelationship = $_POST['studentParentrelationship'];
$studentParentcontactnumber = $_POST['studentParentcontactnumber'];
$studentLevelID = $_POST['studentLevelID'];

$sql = "INSERT INTO tbl_student VALUES (0,'$studentNumber','$studentFirstname','$studentLastname','$studentMiddlename','$studentBirthdate','$studentGender','$studentContactnumber','$studentAddress','$studentCity','$studentZip','$studentParentname','$studentParentrelationship','$studentParentcontactnumber','$studentLevelID','Yes')";


$qry = "select count(*) as number from tbl_student where studentFirstname = '$studentFirstname' and studentlastname = '$studentLastname' and studentmiddlename = '$studentMiddlename' and studentBirthdate = '$studentBirthdate' and IsActive='yes'";
$result = mysqli_query($connection,$qry);
$res=mysqli_fetch_assoc($result);

if ($res['number'] == 0 ) {
    // if (!mysqli_query($connection,$sql))
    //     {
    //     session_start();
    //      $_SESSION['success_message']='duplicatedstudnumber';
    //      header('location:../forms/studentform.php');
    //     } else {
    //      session_start();
    //      $_SESSION['success_message']="YES";
    //      header("Location:studentnumbersearch.php");
    //     }

    try {
       $r =  mysqli_query($connection,$sql);
       session_start();
        $_SESSION['success_message']="YES";
        header("Location:studentnumbersearch.php");
    } catch (Exception $e) {
        session_start();
         $_SESSION['success_message']='duplicatedstudnumber';
         header('location:../forms/studentform.php');
    }
} else {
    session_start();
    $_SESSION['success_message']="existing";
    header("Location:studentnumbersearch.php");
}



?>
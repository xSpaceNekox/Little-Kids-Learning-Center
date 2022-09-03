<?php session_start();
include "dbconnection.php";

$iid = $_POST['studentID'];
$id = $_POST['studentNumber'];
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

$sql = "UPDATE tbl_student SET 
        studentNumber = '$id',
        studentfirstname='$studentFirstname',  
        studentlastname='$studentLastname',
        studentmiddlename='$studentMiddlename',
        studentbirthdate='$studentBirthdate',
        studentgender =  '$studentGender',
        studentcontactnumber = '$studentContactnumber',
        studentaddress = '$studentAddress',
        studentcity = '$studentCity',
        studentzip = '$studentZip',
        studentparentname = '$studentParentname',
        studentparentcontactnumber = '$studentParentcontactnumber',
        levelid = '$studentLevelID'
        WHERE
        studentID = '$iid'";

//current
$uid = $_SESSION['cid'];
$sid = $_SESSION['sid'];
$fn = $_SESSION['fn'];
$ln = $_SESSION['ln']; 
$mn = $_SESSION['mn']; 
$bd = $_SESSION['bd'];
$g = $_SESSION['g']; 
$cn = $_SESSION['cn'];
$add = $_SESSION['add']; 
$ct = $_SESSION['ct']; 
$z = $_SESSION['z']; 
$pn = $_SESSION['pn']; 
$pr = $_SESSION['pr']; 
$pcn = $_SESSION['pcn'];
$lid = $_SESSION['lid']; 

$qry = "select count(*) as number from tbl_student where (studentFirstname != '$fn' and studentlastname != '$ln' and studentmiddlename != '$mn' and studentBirthdate != '$bd' and IsActive='yes') and (studentFirstname = '$studentFirstname' and studentlastname = '$studentLastname' and studentmiddlename = '$studentMiddlename' and studentBirthdate = '$studentBirthdate' and IsActive='yes') limit 1";
$result = mysqli_query($connection,$qry);
$res=mysqli_fetch_assoc($result);


//for studentnumber trapping
$sql2 = "select count(*) as number from tbl_student where studentnumber = '$id' limit 1";
$result2 = mysqli_query($connection,$sql2);
$res2=mysqli_fetch_assoc($result2);

if (

        $sid == $id and 
        $fn == $studentFirstname and 
        $ln == $studentLastname and 
        $mn == $studentMiddlename and 
        $bd == $studentBirthdate and 
        $g == $studentGender and 
        $cn == $studentContactnumber and 
        $add == $studentAddress and 
        $ct == $studentCity and 
        $z == $studentZip and 
        $pn == $studentParentname and 
        $pr == $studentParentrelationship and 
        $pcn == $studentParentcontactnumber and 
        $lid == $studentLevelID 

        ) {
                header("location:editstudent.php?id=$uid");
                $_SESSION['success_message'] = "NO";
        } else {
                // die($res['number'] .  $res2['number']);
        
                if ($res['number'] == 0) {
                        // if ($res2['number'] == 0) {
                        //         mysqli_query($connection,$sql);

                        //         $_SESSION['success_message']='updatedstudent';
                        //         header("location:../forms/studentrecord.php");
                        // } else {
                        //         header("location:editstudent.php?id=$uid");
                        //         $_SESSION['success_message'] = "idexist"; 
                        // }
                        try {
                                mysqli_query($connection,$sql);

                                $_SESSION['success_message']='updatedstudent';
                                header("location:../forms/studentrecord.php");
                        } catch (Exception $e) {
                                header("location:editstudent.php?id=$uid");
                                $_SESSION['success_message'] = "idexist"; 
                        }
                } else {
                        header("location:editstudent.php?id=$uid");
                        $_SESSION['success_message'] = "existed";
                }
        

        }



?>
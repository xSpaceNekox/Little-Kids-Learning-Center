<?php session_start();
include "../modules/dbconnection.php";

$id = $_GET["id"];

//for editing specific student
$query = "select * from tbl_student where studentid=$id";    
$qres = mysqli_query($connection,$query);
$qres = mysqli_fetch_assoc($qres);

//session for checking ...
$_SESSION['cid'] = $id;
$_SESSION['sid'] = $qres['StudentNumber'];
$_SESSION['fn'] = $qres['StudentFirstname'];
$_SESSION['ln'] = $qres['StudentLastname'];
$_SESSION['mn'] = $qres['StudentMiddlename'];
$_SESSION['bd'] = $qres['StudentBirthdate'];
$_SESSION['g'] = $qres['StudentGender'];
$_SESSION['cn'] = $qres['StudentContactNumber'];
$_SESSION['add'] = $qres['StudentAddress'];
$_SESSION['ct'] = $qres['StudentCity'];
$_SESSION['z'] = $qres['StudentZip'];
$_SESSION['pn'] = $qres['StudentParentName'];
$_SESSION['pr'] = $qres['StudentParentRelationship'];
$_SESSION['pcn'] = $qres['StudentParentContactNumber'];
$_SESSION['lid'] = $qres['LevelID'];


//restrict future date
$sql = "select date(now()) as date";
$result = mysqli_query($connection,$sql);
$result = mysqli_fetch_assoc($result);

$date = $result['date'];

//list of year level
$ylsql = "select * from tbl_level where isactive='YES'";
$ylresult = mysqli_query($connection,$ylsql);

//qry for student number


?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LKLC: EDIT STUDENT</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <h1>EDIT STUDENT INFORMATION</h1>

                <?php if($_SESSION['success_message'] == "existed") { ?>

                    <div class="alert alert-warning" role="alert">
                        Cannot update because given data already existed.
                    </div>

                <?php } else if($_SESSION['success_message'] == "idexist") { ?>

                    <div class="alert alert-warning" role="alert">
                        Cannot perform update. Student number already in exist in the database.
                    </div>

                <?php } ?>

                <form method="post" action="updatestudent.php">
                    <div class="mb-3">
                        <label for="studenID" class="form-label">ID</label>
                        <input type="text" class="form-control" id="studentID" name="studentID" value="<?= $qres['StudentID']?>" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="studentNumber" class="form-label">Student Number</label>
                        <input type="text" class="form-control" name="studentNumber" id="studentNumber" value="<?= $qres['StudentNumber']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentFirstname" class="form-label">Student Firstname*</label>
                        <input type="text" class="form-control" name="studentFirstname" id="studentFirstname" value="<?= $qres['StudentFirstname']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentLastname" class="form-label">Student Lastname*</label>
                        <input type="text" class="form-control" name="studentLastname" id="studentLastname" value="<?= $qres['StudentLastname']?>" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="studentMiddlname" class="form-label">Student Middlename</label>
                        <input type="text" class="form-control" name="studentMiddlename" id="studentMiddlname" value="<?= $qres['StudentMiddlename']?>">
                    </div>
                    <div class="mb-3">
                        <label for="studentBirthdate" class="form-label">Student Birthdate*</label>
                        <input type="date" max="<?=$date?>" name="studentBirthdate" value="<?= $qres['StudentBirthdate']?>" class="form-control" id="studentBirthdate" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentGender">Student Gender</label>
                        <select class="form-select" aria-label="studentGender" name="studentGender" id="studentGender" value="<?= $qres['StudentGender']?>">
                            <option value="MALE" selected>MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="studentContactnumber" class="form-label">Student Contact Number* Format: 0950-553-7480</label>
                        <input type="tel" name="studentContactnumber" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" class="form-control" value="<?= $qres['StudentContactNumber']?>" id="studentContactnumber" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentAddress" class="form-label">Student Address*</label>
                        <input type="text" name="studentAddress" class="form-control" id="studentAddress" value="<?= $qres['StudentAddress']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentCity" class="form-label">Student City*</label>
                        <input type="text" name="studentCity" class="form-control" value="<?= $qres['StudentCity']?>" id="studentCity" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentZip" class="form-label">Student Zip*</label>
                        <input type="number" name="studentZip" class="form-control" id="studentZip" value="<?= $qres['StudentZip']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentParentname" class="form-label">Student Parent Name*</label>
                        <input type="text" name="studentParentname" class="form-control" id="studentParentname" value="<?= $qres['StudentParentName']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentParentrelationship" class="form-label">Student Parent Relationship*</label>
                        <input type="text" name="studentParentrelationship" class="form-control" id="studentParentrelationship" value="<?= $qres['StudentParentRelationship']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentParentcontactnumber" class="form-label">Student Parent Contact Number* Format: 0950-553-7480</label>
                        <input type="text" type="tel" name="studentParentcontactnumber" value="<?= $qres['StudentContactNumber']?>" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" class="form-control" id="studentParentcontactnumber" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentLevelID">Year Level</label>
                        <select class="form-select" aria-label="studentLevelID" name="studentLevelID" id="studentLevelID">
                            <?php while($res=mysqli_fetch_assoc($ylresult))
                            { ?>
                                <option value="<?= $res['LevelID']?>"  <?php if( $res['LevelID'] == $qres['LevelID']) echo 'selected' ?>  > <?= $res['LevelDesc']?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                     <!--    <input type="submit" value="UPDATE" class="btn btn-success"> -->
                     <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal2">UPDATE</button>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal">DELETE</button>
                        <a href="../forms/studentrecord.php" button type="button" class="btn btn-danger">CANCEL</button></a>
                    </div>


                    <!-- modal for submit button -->
                 <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal2">UPDATE STUDENT INFO?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Do you wish to update this student informations? Once updated cannot be undo.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                                    <input type="submit" value="YES" class="btn btn-primary"> 
                                </div>
                                </div>
                            </div>
                    </div>


                </form>

            </div>
        </div>

        
         <!-- Modal for delete button-->
            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal">DELETE STUDENT INFO?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Do you wish to delete this student informations? Once deleted cannot be undo.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                                    <a href="../modules/deletestudent.php?id=<?=$id?>" button type="button" class="btn btn-danger">YES</button></a> 
                                </div>
                                </div>
                            </div>
                </div>


        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>



</html>
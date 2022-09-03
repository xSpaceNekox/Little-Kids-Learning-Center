<?php session_start();
include "../modules/dbconnection.php";

$id = $_SESSION["id"];
$uid = $_SESSION["uid"];


//restrict future date
$sql = "select date(now()) as date";
$result = mysqli_query($connection,$sql);
$result = mysqli_fetch_assoc($result);

$date = $result['date'];

//list of year level
$ylsql = "select * from tbl_level where isactive='YES'";
$ylresult = mysqli_query($connection,$ylsql);

?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LKLC: STUDENT FORM</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <h1>ENROLMENT FORM</h1>

                <?php if($_SESSION['success_message'] == "YES") { ?>

                    <div class="alert alert-success" role="alert">
                        Student has been enrolled. Please advice to get form 1.
                    </div>

                <?php } else if($_SESSION['success_message'] == "existing") { ?>

                    <div class="alert alert-warning" role="alert">
                        Student already exists in database.
                    </div>

                    <?php } else if($_SESSION['success_message'] == "duplicatedstudnumber") { ?>

                    <div class="alert alert-warning" role="alert">
                        Student info already exists in the database.
                    </div>

                    <?php } ?>

                <form method="post" action="../modules/enrolstudent.php">
                    <div class="mb-3">
                        <label for="studenID" class="form-label">ID</label>
                        <input type="text" class="form-control" id="studenID" name="studetID" value="<?= $uid?>" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="studentNumber" class="form-label">Student Number</label>
                        <input type="text" class="form-control" name="studentNumber" id="studentNumber" value="<?= $id?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentFirstname" class="form-label">Student Firstname*</label>
                        <input type="text" class="form-control" name="studentFirstname" id="studentFirstname" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentLastname" class="form-label">Student Lastname*</label>
                        <input type="text" class="form-control" name="studentLastname" id="studentLastname" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentMiddlname" class="form-label">Student Middlename</label>
                        <input type="text" class="form-control" name="studentMiddlename" id="studentMiddlname">
                    </div>
                    <div class="mb-3">
                        <label for="studentBirthdate" class="form-label">Student Birthdate*</label>
                        <input type="date" max="<?=$date?>" name="studentBirthdate" class="form-control" id="studentBirthdate" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentGender">Student Gender</label>
                        <select class="form-select" aria-label="studentGender" name="studentGender" id="studentGender">
                            <option value="MALE" selected>MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="studentContactnumber" class="form-label">Student Contact Number* Format: 0950-553-7480</label>
                        <input type="tel" name="studentContactnumber" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" class="form-control" id="studentContactnumber" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentAddress" class="form-label">Student Address*</label>
                        <input type="text" name="studentAddress" class="form-control" id="studentAddress" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentCity" class="form-label">Student City*</label>
                        <input type="text" name="studentCity" class="form-control" id="studentCity" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentZip" class="form-label">Student Zip*</label>
                        <input type="number" name="studentZip" class="form-control" id="studentZip" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentParentname" class="form-label">Student Parent Name*</label>
                        <input type="text" name="studentParentname" class="form-control" id="studentParentname" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentParentrelationship" class="form-label">Student Parent Relationship*</label>
                        <input type="text" name="studentParentrelationship" class="form-control" id="studentParentrelationship" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentParentcontactnumber" class="form-label">Student Parent Contact Number* Format: 0950-553-7480</label>
                        <input type="text" type="tel" name="studentParentcontactnumber" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" class="form-control" id="studentParentcontactnumber" required>
                    </div>
                    <div class="mb-3">
                        <label for="studentLevelID">Year Level</label>
                        <select class="form-select" aria-label="studentLevelID" name="studentLevelID" id="studentLevelID">
                            <?php while($res=mysqli_fetch_assoc($ylresult))
                            { ?>
                                <option value="<?= $res['LevelID']?>"><?= $res['LevelDesc']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="ENROL" class="btn btn-success">
                        <a href="../index.php" button type="button" class="btn btn-danger">BACK</button></a>
                    </div>
                </form>

            </div>
        </div>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>



</html>
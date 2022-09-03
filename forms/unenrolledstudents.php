<?php 
include "../modules/dbconnection.php";

$sql = "select StudentID,StudentNumber,StudentFirstname,StudentLastname,StudentMiddlename,StudentBirthdate,StudentGender,StudentContactNumber,StudentAddress,StudentCity,StudentZip,StudentParentName,StudentParentRelationship,StudentParentContactNumber,LevelDesc,a.IsActive from tbl_student a right join tbl_level b on a.levelid=b.levelid where a.IsActive='NO'";
$result = mysqli_query($connection,$sql);

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LKLC: UNENROLLED<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>

    <body>
        <div class="container-fluid">
        <div class="row">
            <h1>UNENROLLED</h1>
            <table class="table">

                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Student Number</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Middlename</th>
                        <th scope="col">Birthdate</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Zip</th>
                        <th scope="col">Parent Name</th>
                        <th scope="col">Parent Relationship</th>
                        <th scope="col">Parent Contact Number</th>
                        <th scope="col">Year Level</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php while($res=mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?= $res['StudentID']?></td>
                                <td><?= $res['StudentNumber']?></td>
                                <td><?= $res['StudentFirstname']?></td>
                                <td><?= $res['StudentLastname']?></td>
                                <td><?= $res['StudentMiddlename']?></td>
                                <td><?= $res['StudentBirthdate']?></td>
                                <td><?= $res['StudentGender']?></td>
                                <td><?= $res['StudentContactNumber']?></td>
                                <td><?= $res['StudentAddress']?></td>
                                <td><?= $res['StudentCity']?></td>
                                <td><?= $res['StudentZip']?></td>
                                <td><?= $res['StudentParentName']?></td>
                                <td><?= $res['StudentParentRelationship']?></td>
                                <td><?= $res['StudentContactNumber']?></td>
                                <td><?= $res['LevelDesc']?></td>
                                <td><?= $res['IsActive']?></td>
                                <td><a href="../modules/editstudent.php?id=<?=$res['StudentID']?>" button type="button" class="btn btn-primary">EDIT</button></a><a href="../modules/reenrolstudent.php?id=<?=$res['StudentID']?>" button type="button" class="btn btn-success">ENROL</button></a></td>
                            </tr>  
                        <?php } ?>
                    </tbody>

            </table>
            <div class="mb-3">
                    <a href="studentrecord.php" button type="button" class="btn btn-danger">BACK</button></a>
            </div>

        </div>

        </div>



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>

</html>
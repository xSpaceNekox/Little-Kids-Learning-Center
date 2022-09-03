<?php session_start();
include "dbconnection.php";

$id=$_GET['id'];

$sql = "select leveldesc from tbl_level where levelid=$id";
$qres = mysqli_query($connection,$sql);
$qres = mysqli_fetch_assoc($qres);
$val = $qres['leveldesc'];

$_SESSION['currentValue'] = $val;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LKLC: EDIT YEAR LEVEL</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>EDIT YEAR LEVEL</h1>
                <form method="post" action="submitedityearlevel.php">
                        <div class="row">
                            <div class="col-3">
                            <div class="mb-3">
                                <label for="LevelID" class="form-label">LevelID</label>
                                <input type="text" value="<?=$id?>" class="form-control" id="LevelID" name="LevelID" readonly>
                            </div>
                            </div>
                            <div class="col-3">
                                <label for="LevelDesc" class="form-label">Year Level</label>
                                <input type="text" value="<?=$val?>" class="form-control" id="LevelDesc" name="LevelDesc" required>
                            </div>
                            <div class="col-3">
                                <input type="submit" value="UPDATE" class="btn btn-success">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal">DELETE</button>
                                <a href="../forms/levelform.php" button type="button" class="btn btn-danger">BACK</button></a>
                            </div>
                        </div>
                    </form>
            </div>
        </div>    


         <!-- Modal -->
         <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal">DELETE YEAR LEVEL?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Do you wish to delete this year level? Once deleted cannot be undo.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                                    <a href="../modules/leveldelete.php?id=<?=$id?>" button type="button" class="btn btn-danger">YES</button></a> 
                                </div>
                                </div>
                            </div>
            </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>
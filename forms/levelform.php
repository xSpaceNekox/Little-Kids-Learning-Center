<?php session_start();
include "../modules/dbconnection.php";

$sql = "select * from tbl_level order by LevelID";
$res = mysqli_query($connection,$sql);

$qry = "select LevelID + 1 as LevelID from tbl_level order by LevelID desc limit 1";
$qres = mysqli_query($connection,$qry);
$result = mysqli_fetch_assoc($qres);
$val = $result['LevelID'];

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LKLC: YEAR LEVEL FORM</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>


    <body>
        <div class="container">
            <div class="row">
                <h1>YEAR LEVEL FORM</h1>
                <table class="table">

                    <thead>
                        <tr>
                        <th scope="col">LevelID</th>
                        <th scope="col">Year Level</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php while($result=mysqli_fetch_assoc($res)) { ?>
                            <tr>
                                <td><?= $result['LevelID']?></td>
                                <td><?= $result['LevelDesc']?></td>
                                <td><?= $result['IsActive']?></td>
                                <td>
                                    <?php if($result['IsActive']=="Yes") { ?>
                                        <a href="../modules/levelsetinactive.php?id=<?= $result['LevelID']?>" button type="button" class="btn btn-warning">SET INACTIVE</button>
                                    <?php } elseif($result['IsActive']=="No") { ?>
                                        <a href="../modules/levelsetactive.php?id=<?= $result['LevelID']?>" button type="button" class="btn btn-success">SET ACTIVE</button>
                                    <?php } ?>
                                        <a href="../modules/edityearlevel.php?id=<?= $result['LevelID']?>" button type="button" class="btn btn-primary">EDIT</button></a>
                                </td>
                            </tr>  

                        <?php } ?>
                    </tbody>

                </table>
                
                    <form method="post" action="../modules/addlevel.php">
                        <div class="row">
                            <div class="col-3">
                            <div class="mb-3">
                                <label for="LevelID" class="form-label">LevelID</label>
                                <input type="text" value="<?=$val?>" class="form-control" id="LevelID" name="LevelID" readonly>
                            </div>
                            </div>
                            <div class="col-3">
                                <label for="LevelDesc" class="form-label">Year Level</label>
                                <input type="text" class="form-control" id="LevelDesc" name="LevelDesc" required>
                            </div>
                            <div class="col-3">
                                <input type="submit" value="ADD" class="btn btn-success">
                                <a href="../index.php" button type="button" class="btn btn-danger">BACK</button></a>
                            </div>
                        </div>
                    </form>


                    <?php if($_SESSION['success_message'] == "YES") { ?>

                        <div class="alert alert-success" role="alert">
                            New year level has been added.
                        </div>

                    <?php } elseif($_SESSION['success_message'] == "ERROR") { ?>
                            
                        <div class="alert alert-danger" role="alert">
                            The year level added already exist.
                        </div>

                        <?php } elseif($_SESSION['success_message'] == "doneedit") { ?>
                            
                            <div class="alert alert-success" role="alert">
                                Level description has been updated.
                            </div>
    
                            <?php } elseif($_SESSION['success_message'] == "setinactive") { ?>
                            
                            <div class="alert alert-warning" role="alert">
                                A year level has been set to inactive.
                            </div>
    
                            <?php } elseif($_SESSION['success_message'] == "setactive") { ?>
                            
                            <div class="alert alert-success" role="alert">
                                A year level has been set to active.
                            </div>
    
                            <?php } elseif($_SESSION['success_message'] == "deleted") { ?>
                            
                            <div class="alert alert-success" role="alert">
                                Level description has been deleted.
                            </div>
    
                            <?php } elseif($_SESSION['success_message'] == "errorupdatelevel") { ?>
                            
                            <div class="alert alert-danger" role="alert">
                                Level description already exists in the database.
                            </div>
    
                            <?php } elseif($_SESSION['success_message'] == "cannotdelete") { ?>
                            
                            <div class="alert alert-danger" role="alert">
                                Level description cannot be deleted. This item is referred to by another object.
                            </div>
    
                        <?php } ?>


            </div>
        </div>




















        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>
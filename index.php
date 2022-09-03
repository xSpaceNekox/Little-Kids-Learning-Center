<?php session_start();

$_SESSION['success_message'] = "NO";

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LKLC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>

  <body>
    <form method="post" action="modules/search.php">
    <div class="container text-center">
        <div class="row">
            <div class="col"></div>
            <div class="col"><h1>LITTLE KIDS LEARNING CENTER</h1></div>
            <div class="col"></div>
        </div>
        <br>
        <div class="row px-5">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">STUDENT FORM </h5>
              <p class="card-text">Enrol a student.</p>
              <a href="modules/studentnumbersearch.php" class="btn btn-primary">ENROL</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">LEVEL FORM </h5>
              <p class="card-text">Year level of students.</p>
              <a href="forms/levelform.php" class="btn btn-primary">VIEW</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">STUDENT RECORD</h5>
              <p class="card-text">Looking for student records? Click here.</p>
              <a href="forms/studentrecord.php" class="btn btn-primary">VIEW</a>
            </div>
          </div>  
          <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">SEARCH</h5>
                <p class="card-text">Enter Student Firstname/Lastname/Number</p>
                <input type="text" class="form-control" id="search" name="search" required>
                <input type="submit" value="Search" class="btn btn-primary">
              </div>
            </div>  
          </div>
      </div>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
  
  <style>
    body {
      margin-top: 100px;
    }
  </style>

</html>
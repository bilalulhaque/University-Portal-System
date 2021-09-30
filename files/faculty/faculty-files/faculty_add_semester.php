<?php 
include "../../../includes/dbConnection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/style.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <img src="../../../img/uitlogo.png" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active navbar-anchor-links" aria-current="page" href="faculty_dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navbar-anchor-links" href="faculty_marks.php">Marks</a>
        </li>
        <li class="nav-item">
            <a class="nav-link navbar-anchor-links" href="faculty_attendance.php">Attendance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link navbar-anchor-links" href="faculty_upload.php">Upload Docs</a>
        </li>
      </ul>
      <form class="d-flex">
        <!-- <h6 class="mt-2">Welcome Admin</h6> -->
        <a href="faculty_logout.php" class="logout-btn">Logout</a>
      </form>
    </div>
  </div>
    </nav>

<?php
$studentId=$_GET['addId'];
?>

    <div class="add-semester-div">
        <h2>Add Semester</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="">Semester</label>
                <input type="text" placeholder="Enter Semester" name="semester" required>
            </div>
            <div>
            <button type="submit" class='add-semester-btn' name="submit">Add Semester</button>
            </div>
        </form>
    </div>

    

    <footer>
        <div>
            <img src="../../../img/uitlogo.png" alt="">
            <div>
                <a href="faculty_dashboard.php" class="navbar-anchor-links">Dashboard</a>
                <a href="faculty_marks.php" class="navbar-anchor-links">Marks</a>
                <a href="faculty_attendance.php" class="navbar-anchor-links dashboard-footer-3">Attendance</a>
                <a href="faculty_upload.php" class="navbar-anchor-links">Upload Docs</a>
            </div>
        </div>
        <div>
            <p>
                2021 © UIT, ALL RIGHTS RESERVED
            </p>
        </div>
    </footer>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="../../../js/app.js"></script>


    <?php 
if (isset($_POST['submit'])) {
    $semester = $_POST['semester'];

    
    $insertStudent = "INSERT INTO semester(semester_name,student_id) VALUES ('$semester', '$studentId')";
   
    $runInsertStudent = mysqli_query($conn, $insertStudent);

    
      // $me="SELECT semester_id FROM semester WHERE student_id='$studentId' AND semester_name='$semester'";
      // $runName=mysqli_query($conn,$me);
      // // $arrayName=mysqli_fetch_array($runName);
      // $arrayName = mysqli_fetch_assoc($runName);
      // echo($arrayName);


    if ($runInsertStudent) {
        echo "<script>            Swal.fire({
          title: 'Semester Added Successfully',
          icon: 'success',
          showConfirmButton: false,
          timer: 2000
        })
        </script>";
        echo "<script>
        setTimeout(function(){window.open('faculty_add_sub_marks.php?addId=$studentId', '_self')}, 3000);
        </script>";
    }
    else {
        echo "<script>            
        Swal.fire({
          title: 'Error occured',
          icon: 'error',
          showConfirmButton: false,
          timer: 2000
        })</script>";
        echo "<script>
        setTimeout(function(){window.open('faculty_add_semester.php', '_self') }, 3000);
        </script>";
    }
}

?>



</body>
</html>
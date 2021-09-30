<?php 
include "../../../includes/dbConnection.php";
session_start();
$uID = (isset($_GET['uID']) ? $_GET['uID'] : '');

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
    <img src="../../../img/uitlogo.png" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active navbar-anchor-links" aria-current="page" href="student_dashboard.php?uID=<?php echo ($uID);?>">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navbar-anchor-links" href="student_marks.php?uID=<?php echo ($uID);?>">Marks</a>
        </li>
        <li class="nav-item">
            <a class="nav-link navbar-anchor-links" href="student_attendance.php?uID=<?php echo ($uID);?>">Attendance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link navbar-anchor-links" href="student_learning.php?uID=<?php echo ($uID);?>">Learning</a>
        </li>
        <li class="nav-item">
            <a class="nav-link navbar-anchor-links" href="#">Profile</a>
        </li>
      </ul>
      <form class="d-flex">
        <a href="student_logout.php" class="logout-btn">Logout</a>
      </form>
    </div>
  </div>
    </nav>

    <?php
$descriptionQuery="SELECT * FROM student WHERE student_id='$uID'";

$runDescriptionQuery=mysqli_query($conn,$descriptionQuery);
$resultCheckDescriptionQuery=mysqli_num_rows($runDescriptionQuery);
if($resultCheckDescriptionQuery>0){
    while($row=mysqli_fetch_array($runDescriptionQuery)){
        ?>
        <div class="profile-div">
        <div>
            <img src="../../profile-images/<?php echo $row['profileimage']; ?>" alt="">
        </div>
        <div>
            <h5>First Name:</h5>&nbsp;&nbsp;&nbsp;&nbsp;
            <h5><?php echo $row['firstname']; ?></h5>
        </div>
        <div>
            <h5>Last Name:</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <h5><?php echo $row['lastname']; ?></h5>
        </div>
        <div>
            <h5>Email:</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <h5><?php echo $row['email']; ?></h5>
        </div>
        <div>
            <h5>Username:</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <h5><?php echo $row['username']; ?></h5>
        </div>
        <div>
            <h5>Password:</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <h5><?php echo $row['password']; ?></h5>
        </div>
        <div>
            <a href="update_profile.php?uID=<?php echo ($uID);?>&uName=<?php echo ($row['username']);?>&fName=<?php echo ($row['firstname']);?>&lName=<?php echo ($row['lastname']);?>&email=<?php echo ($row['email']);?>&password=<?php echo ($row['password']);?>&pImage=<?php echo ($row['profileimage']);?>">Update Profile</a>
        </div>
    </div>
    <?php
    }
}
?>



<footer>
        <div>
            <img src="../../../img/uitlogo.png" alt="">
            <div>
                <a href="student_dashboard.php?uID=<?php echo ($uID);?>" class="navbar-anchor-links">Dashboard</a>
                <a href="student_attendance.php?uID=<?php echo ($uID);?>" class="navbar-anchor-links">Marks</a>
                <a href="student_attendance.php?uID=<?php echo ($uID);?>" class="navbar-anchor-links">Attendance</a>
                <a href="student_learning.php?uID=<?php echo ($uID);?>" class="navbar-anchor-links student-footer-4">Learning</a>
                <a href="#" class="navbar-anchor-links student-footer-5">Profile</a>
            </div>
        </div>
        <div>
            <p>
                2021 © UIT, ALL RIGHTS RESERVED
            </p>
        </div>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="../../../js/app.js"></script>





</body>
</html>
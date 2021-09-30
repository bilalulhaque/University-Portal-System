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
          <a class="nav-link active navbar-anchor-links" aria-current="page" href="#">Dashboard</a>
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
            <a class="nav-link navbar-anchor-links" href="student_profile.php?uID=<?php echo ($uID);?>">Profile</a>
        </li>
      </ul>
      <form class="d-flex">
        <a href="student_logout.php" class="logout-btn">Logout</a>
      </form>
    </div>
  </div>
    </nav>




    <div class="admin-dashboard-main">
<?php



$studentQuery = "SELECT * 
FROM subject 
INNER JOIN semester 
ON subject.semester_id=semester.semester_id WHERE semester.student_id=$uID;";


$name="SELECT * FROM student WHERE student_id=$uID;";
$runName=mysqli_query($conn,$name);
$arrayName=mysqli_fetch_array($runName);

$runStudentQuery=mysqli_query($conn,$studentQuery);
$resultCheckStudentQuery=mysqli_num_rows($runStudentQuery);


if($resultCheckStudentQuery>0){
    ?>
        <h2 class="view-username"><?php echo $arrayName['username']; ?></h2>
<?php
        
        echo "
        <br><h1 class='view-marks-attendance-head'>Marks</h1>";
    while($row=mysqli_fetch_assoc($runStudentQuery)){
        ?>
    <div class="admin-dashboard-panels">
        <div class="view-marks-table">
            <h2 class='view-semester-name'><?php echo $row['semester_name']; ?></h2>

            <table class='admin-dashboard-panels-table'>
            <tr class='admin-dashboard-panels-table-heading'>
                <th>
                    Subject Name
                </th>
                <th>
                    Total Marks
                </th>
                <th>
                    Obtained Marks
                </th>
            </tr>
            <?php
            echo "
            <tr class='admin-dashboard-panels-table-data-rows'>
                <td>Subject 1</td>
                <td>100</td>
                <td>" .$row["subject1_marks"]. "</td>
            </tr>
            <tr class='admin-dashboard-panels-table-data-rows'>
            <td>Subject 1</td>
            <td>100</td>
            <td>" .$row["subject2_marks"]. "</td>
        </tr>
        <tr class='admin-dashboard-panels-table-data-rows'>
        <td>Subject 1</td>
        <td>100</td>
        <td>" .$row["subject3_marks"]. "</td>
    </tr>
    <tr class='admin-dashboard-panels-table-data-rows'>
    <td>Subject 1</td>
    <td>100</td>
    <td>" .$row["subject4_marks"]. "</td>
    </tr>";
            ?>
            </table>
        </div>
        
    </div>


    <?php
}
}

?>
<!--  -->
<?php



$studentAttendanceQuery = "SELECT * 
FROM attendance 
INNER JOIN semester 
ON attendance.semester_id=semester.semester_id WHERE semester.student_id=$uID;";

$runStudentAttendanceQuery=mysqli_query($conn,$studentAttendanceQuery);
$resultCheckStudentAttendanceQuery=mysqli_num_rows($runStudentAttendanceQuery);


if($resultCheckStudentAttendanceQuery>0){
    ?>
<?php
        echo "
        <br><h1 class='view-marks-attendance-head'>Attendance</h1>";
    while($row=mysqli_fetch_assoc($runStudentAttendanceQuery)){
        ?>
    <div class="admin-dashboard-panels">
        <div class="view-marks-table">
            <h2 class='view-semester-name'><?php echo $row['semester_name']; ?></h2>

            <table class='admin-dashboard-panels-table'>
            <tr class='admin-dashboard-panels-table-heading'>
                <th>
                    Subject Name
                </th>
                <th>
                    Total
                </th>
                <th>
                    Attended
                </th>
            </tr>
            <?php
            echo "
            <tr class='admin-dashboard-panels-table-data-rows'>
                <td>Subject 1</td>
                <td>100</td>
                <td>" .$row["subject1_attendance"]. "%</td>
            </tr>
            <tr class='admin-dashboard-panels-table-data-rows'>
            <td>Subject 1</td>
            <td>100</td>
            <td>" .$row["subject2_attendance"]. "%</td>
        </tr>
        <tr class='admin-dashboard-panels-table-data-rows'>
        <td>Subject 1</td>
        <td>100</td>
        <td>" .$row["subject3_attendance"]. "%</td>
    </tr>
    <tr class='admin-dashboard-panels-table-data-rows'>
    <td>Subject 1</td>
    <td>100</td>
    <td>" .$row["subject4_attendance"]. "%</td>
    </tr>";
            ?>
            </table>
        </div>
        
    </div>


    <?php
}
}

?>


        </div>







        <footer>
        <div>
            <img src="../../../img/uitlogo.png" alt="">
            <div>
                <a href="#" class="navbar-anchor-links">Dashboard</a>
                <a href="student_marks.php?uID=<?php echo ($uID);?>" class="navbar-anchor-links">Marks</a>
                <a href="student_attendance.php?uID=<?php echo ($uID);?>" class="navbar-anchor-links">Attendance</a>
                <a href="student_learning.php?uID=<?php echo ($uID);?>" class="navbar-anchor-links student-footer-4">Learning</a>
                <a href="student_profile.php?uID=<?php echo ($uID);?>" class="navbar-anchor-links student-footer-5">Profile</a>
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
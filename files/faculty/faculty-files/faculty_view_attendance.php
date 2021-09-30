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

    <div class="admin-dashboard-main">
<?php
$studentMarksId = (isset($_GET['studentMarksId']) ? $_GET['studentMarksId'] : '');


// $studentQuery = "SELECT * FROM student join semester ON student.student_id = semester.student_id join subject ON semester.semester_id = subject.semester_id WHERE student.student_id=$studentMarksId";

$studentQuery = "SELECT * 
FROM attendance 
INNER JOIN semester 
ON attendance.semester_id=semester.semester_id WHERE semester.student_id=$studentMarksId;";


$name="SELECT * FROM student WHERE student_id=$studentMarksId;";
$runName=mysqli_query($conn,$name);
$arrayName=mysqli_fetch_array($runName);

$runStudentQuery=mysqli_query($conn,$studentQuery);
$resultCheckStudentQuery=mysqli_num_rows($runStudentQuery);


if($resultCheckStudentQuery>0){
    ?>
        <h2 class="view-username"><?php echo $arrayName['username']; ?></h2>
<?php
    while($row=mysqli_fetch_assoc($runStudentQuery)){
        ?>
    <div class="admin-dashboard-panels">
        <div class="view-marks-table">
            <h2 class="view-semester-name"><?php echo $row['semester_name']; ?></h2>

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
    </tr>
            <tr class='admin-dashboard-panels-table-data-rows lastrow'>
            <td></td>
            <td> 
            <a class='edit-btn' href='faculty_edit_attendance.php?editId=$row[attendance_id]&sub1=$row[subject1_attendance]&sub2=$row[subject2_attendance]&sub3=$row[subject3_attendance]&sub4=$row[subject4_attendance]'>Edit</a> 
            <a href='faculty_delete_attendance.php?delId=$row[attendance_id]'>Delete</a> 
            </td>
            </tr>";
            ?>
            </table>
        </div>
        
    </div>


    <?php
}
}
echo "
<div class='faculty-add-attendance-btn-div'>
<a class='faculty-add-marks-btn' href='faculty_add_sub_attendance.php?addId=$studentMarksId'>Add Attendance</a>
</div>";


?>

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




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="../../../js/app.js"></script>


</body>
</html>
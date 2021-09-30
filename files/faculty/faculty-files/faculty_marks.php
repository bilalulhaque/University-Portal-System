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
            <div class="admin-dashboard-panels">
            <h2>Student</h2>
            <?php 
                        $sqlStudent = "SELECT * FROM student";
                        $resultSqlStudent=mysqli_query($conn,$sqlStudent);
                        $resultCheckSqlStudent=mysqli_num_rows($resultSqlStudent);

                        if($resultCheckSqlStudent>0){
                          
                        echo "
                        <table class='admin-dashboard-panels-table'>
                        <tr class='admin-dashboard-panels-table-heading'>
                            <th>
                                First Name
                            </th>
                            <th>
                                Last Name
                            </th>
                            <th>
                            Marks
                            </th>
                        </tr>";
                            while($row=mysqli_fetch_array($resultSqlStudent)){
                                echo "<tr class='admin-dashboard-panels-table-data-rows'>";
                                echo "<td>" . $row['firstname'] . "</td>";
                                echo "<td>" . $row['lastname'] . "</td>";
                                echo "<td>
                                <a class='edit-btn' href='faculty_view_marks.php?studentMarksId=$row[student_id]'>View</a>
                                </td>";
                                echo "</tr>";
                                }
                                echo "</table>";
                            }?>
            </div>
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
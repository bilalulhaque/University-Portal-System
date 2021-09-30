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
          <a class="nav-link active navbar-anchor-links" aria-current="page" href="admin_dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navbar-anchor-links" href="admin_faculty.php">Faculty</a>
        </li>
        <li class="nav-item">
            <a class="nav-link navbar-anchor-links" href="admin_student.php">Student</a>
        </li>
        <li class="nav-item">
            <!-- <a class="nav-link navbar-anchor-links" href="#">Course list</a> -->
        </li>
      </ul>
      <form class="d-flex">
        <!-- <h6 class="mt-2">Welcome Admin</h6> -->
        <a href="admin_logout.php" class="logout-btn">Logout</a>
      </form>
    </div>
  </div>
    </nav>

    <div class="admin-dashboard-main">
        <div class="admin-dashboard-panels">
            <h2>Students</h2>
            <div>
                <a href="admin_add_student.php">Add Student</a>
            </div>
            <?php 
                        $sqlStudent = "SELECT * FROM student";
                        $resultSqlStudent=mysqli_query($conn,$sqlStudent);
                        $resultCheckSqlStudent=mysqli_num_rows($resultSqlStudent);

                        if($resultCheckSqlStudent>0){
                            
                        echo "
                        <table class='admin-dashboard-panels-table'>
                        <tr class='admin-dashboard-panels-table-heading'>
                            <th>
                                Username
                            </th>
                            <th>
                                First Name
                            </th>
                            <th>
                                Last Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>";
                            while($row=mysqli_fetch_array($resultSqlStudent)){
                                echo "<tr class='admin-dashboard-panels-table-data-rows'>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['firstname'] . "</td>";
                                echo "<td>" . $row['lastname'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>
                                <a class='edit-btn' href='admin_edit_student.php?editId=$row[student_id]&uName=$row[username]&fName=$row[firstname]&lName=$row[lastname]&email=$row[email]&password=$row[password]'>Edit</a>
                                <a class='delete-btn' href='admin_student.php?delId=$row[student_id]'>Delete</a>
                                </td>";
                                echo "</tr>";
                                }
                                echo "</table>";
                            }?>
        </div>


    </div>


<?php
    $deleteId = (isset($_GET['delId']) ? $_GET['delId'] : '');
    $deleteQuery="DELETE FROM student WHERE student_id='$deleteId'";
    $runDeleteQuery=mysqli_query($conn,$deleteQuery);
?>


    <footer>
        <div>
            <img src="../../../img/uitlogo.png" alt="">
            <div>
                <a href="admin_dashboard.php" class="navbar-anchor-links">Dashboard</a>
                <a href="admin_faculty.php" class="navbar-anchor-links">Faculty</a>
                <a href="admin_student.php" class="navbar-anchor-links">Student</a>
                <!-- <a href="#" class="navbar-anchor-links">Course list</a> -->
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
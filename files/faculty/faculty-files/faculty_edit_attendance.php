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
    $editId = (isset($_GET['editId']) ? $_GET['editId'] : '');
    $sub1 = (isset($_GET['sub1']) ? $_GET['sub1'] : '');
    $sub2 = (isset($_GET['sub2']) ? $_GET['sub2'] : '');
    $sub3 = (isset($_GET['sub3']) ? $_GET['sub3'] : '');
    $sub4 = (isset($_GET['sub4']) ? $_GET['sub4'] : '');
    
    ?>

<div class="admin-add-member-main">
        <h2>Edit Attendance</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="">Subject 1</label>
                <input type="text" placeholder="Enter subject 1 attendance" name="subject1" value="<?php echo "$sub1" ?>" required>
            </div>
            <div>
                <label for="">Subject 2</label>
                <input type="text" placeholder="Enter subject 2 attendance" name="subject2" value="<?php echo "$sub2" ?>" required>
            </div>
            <div>
                <label for="">Subject 3</label>
                <input type="text" placeholder="Enter subject 3 attendance" name="subject3" value="<?php echo "$sub3" ?>" required>
            </div>
            <div>
                <label for="">Subject 4</label>
                <input type="text" placeholder="Enter subject 4 attendance" name="subject4" value="<?php echo "$sub4" ?>" required>
            </div>
            <div>
                <button type="submit" name="update">Update Attendance</button>
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




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../../../js/app.js"></script>


    <?php 
if (isset($_POST['update'])) {
    $sub1 = $_POST['subject1'];
    $sub2 = $_POST['subject2'];
    $sub3 = $_POST['subject3'];
    $sub4 = $_POST['subject4'];

    $updateMarks = "UPDATE attendance SET subject1_attendance='$sub1', subject2_attendance='$sub2', subject3_attendance='$sub3', subject4_attendance='$sub4' WHERE attendance_id='$editId'";

    $runUpdateMarks = mysqli_query($conn, $updateMarks);
    
    if ($runUpdateMarks) {
        echo "<script>            Swal.fire({
          title: 'Attendance Updated Successfully',
          icon: 'success',
          showConfirmButton: false,
          timer: 2000
        })</script>";
        echo "<script>
        setTimeout(function(){window.open('faculty_dashboard.php', '_self')}, 3000);
        </script>";
    }
    else {
        echo "<script>            Swal.fire({
            title: 'Error Occured',
            icon: 'error',
            showConfirmButton: false,
            timer: 2000
          })</script>";
    }
}

?>


</body>
</html>
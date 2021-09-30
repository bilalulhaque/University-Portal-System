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

    <div class="admin-add-member-main">
        <h2>Add Student</h2>
        <form action="admin_add_student.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="">First Name</label>
                <input type="text" placeholder="Enter First Name" name="firstname" required>
            </div>
            <div>
                <label for="">Last Name</label>
                <input type="text" placeholder="Enter Last Name" name="lastname" required>
            </div>
            <div>
                <label for="">Email</label>
                <input type="email" placeholder="Enter Email" name="email" required>
            </div>
            <div>
                <label for="">Username</label>
                <input type="text" placeholder="Enter Username" name="username" required>
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" placeholder="Enter Password" name="password" required>
            </div>
            <div>
                <label for="">Profile Image</label>
                <input type="file" name="profileimage" id="" class="form-control text-white bg-secondary" required>
            </div>
            <div>
                <button type="submit" name="add">Add New Student</button>
            </div>
        </form>
    </div>




    <footer>
        <div>
            <img src="../../../img/uitlogo.png" alt="">
            <div>
                <a href="admin_dashboard.php" class="navbar-anchor-links">Dashboard</a>
                <a href="admin_faculty.php" class="navbar-anchor-links">Faculty</a>
                <a href="admin_student.php" class="navbar-anchor-links">Student</a>
                <!-- <a href="#" class="navbar-anchor-links">Course list</a> -->
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
if (isset($_POST['add'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $studentProfileImage = $_FILES['profileimage']['name'];
    $studentProfileImageTmp = $_FILES['profileimage']['tmp_name'];


    move_uploaded_file($studentProfileImageTmp, "../../profile-images/$studentProfileImage");

    
    $insertStudent = "INSERT INTO student(firstname, lastname, email, username, password, profileimage) VALUES ('$firstname','$lastname','$email','$username','$password', '$studentProfileImage')";
   
    $runInsertStudent = mysqli_query($conn, $insertStudent);

    if ($runInsertStudent) {
        echo "<script>            Swal.fire({
          title: 'Student Added Successfully',
          icon: 'success',
          showConfirmButton: false,
          timer: 2000
        })</script>";
        echo "<script>
        setTimeout(function(){window.open('admin_add_student.php', '_self')}, 3000);
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
        setTimeout(function(){window.open('admin_add_student.php', '_self') }, 3000);
        </script>";
    }
}
?>

</body>
</html>
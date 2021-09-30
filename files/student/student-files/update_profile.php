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
            <a class="nav-link navbar-anchor-links" href="student_profile.php?uID=<?php echo ($uID);?>">Profile</a>
        </li>
      </ul>
      <form class="d-flex">
        <a href="student_logout.php" class="logout-btn">Logout</a>
      </form>
    </div>
  </div>
    </nav>




    <?php 
    $uName = (isset($_GET['uName']) ? $_GET['uName'] : '');
    $fName = (isset($_GET['fName']) ? $_GET['fName'] : '');
    $lName = (isset($_GET['lName']) ? $_GET['lName'] : '');
    $email = (isset($_GET['email']) ? $_GET['email'] : '');
    $password = (isset($_GET['password']) ? $_GET['password'] : '');
    $profileImage = (isset($_GET['pImage']) ? $_GET['pImage'] : '');
    
    ?>


    <div class="admin-add-member-main">
        <h2>Edit Profile</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="">First Name</label>
                <input type="text" placeholder="Enter First Name" name="firstname" value="<?php echo "$fName" ?>" required>
            </div>
            <div>
                <label for="">Last Name</label>
                <input type="text" placeholder="Enter Last Name" name="lastname" value="<?php echo "$lName" ?>" required>
            </div>
            <div>
                <label for="">Email</label>
                <input type="email" placeholder="Enter Email" name="email" value="<?php echo "$email" ?>" required>
            </div>
            <div>
                <label for="">Username</label>
                <input type="text" placeholder="Enter Username" name="username" value="<?php echo "$uName" ?>" required>
            </div>
            <div>
                <label for="">Password</label>
                <input type="text" placeholder="Enter Password" name="password" value="<?php echo "$password" ?>" required>
            </div>
            <div>
                <label for="">Profile Image</label>
                <input type="file" name="profileimage" class="form-control text-white bg-secondary" value="<?php echo "$profileImage" ?>" required>
            </div>
            <div>
                <button type="submit" name="update">Update Profile</button>
            </div>
        </form>
    </div>






    <footer>
        <div>
            <img src="../../../img/uitlogo.png" alt="">
            <div>
                <a href="student_dashboard.php?uID=<?php echo ($uID);?>" class="navbar-anchor-links">Dashboard</a>
                <a href="student_attendance.php?uID=<?php echo ($uID);?>" class="navbar-anchor-links">Marks</a>
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



    <?php 
if (isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $studentProfileImage = $_FILES['profileimage']['name'];
    $studentProfileImageTmp = $_FILES['profileimage']['tmp_name'];


    move_uploaded_file($studentProfileImageTmp, "../../profile-images/$studentProfileImage");


    $updateStudent = "UPDATE student SET firstname='$firstname', lastname='$lastname', email='$email', username='$username', password='$password', profileimage='$studentProfileImage' WHERE student_id='$uID'";

    $runUpdateStudent = mysqli_query($conn, $updateStudent);
    
    if ($runUpdateStudent) {
        echo"<script>
        window.location.href='student_profile.php?uID=$uID';
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
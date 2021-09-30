<?php 
include "../../includes/dbConnection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <div class="welcome-user-page">
        <div class="admin-login-main">
            <img src="../../img/uitlogo.png" alt="">
            <h2>Student Login</h2>
            <form action="student_login.php" method="POST">
                <div>
                    <label for="">Username</label>
                    <input type="text" name="username" placeholder="Enter username">
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter password">
                </div>
                <div>
                    <button type="submit" name="submit">Log In</button>
                </div>
            </form>
        </div>  
    </div>

    <?php 
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
    
        $sql="SELECT * FROM student WHERE username='$username' AND password='$password'";
    
        $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) === 1){
            $row=mysqli_fetch_array($result);
            print_r($row);

            $_SESSION['username']=$username;
            header("Location:student-files/student_dashboard.php?login=success&uID=$row[student_id]");
            exit;

        }
        else{
            header("Location:student_login.php");
            exit;
        }
        
        
        }
    ?>

    
</body>
</html>



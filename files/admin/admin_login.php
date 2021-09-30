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
            <h2>Admin Login</h2>
            <form action="#" method="POST">
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
    
        $sql="SELECT * FROM adminlogin WHERE username='".$username."'AND password='".$password."' limit 1;";
    
        $result=mysqli_query($conn,$sql);
    
        if(mysqli_num_rows($result)==1){
            echo '<div class="alert alert-success" role="alert">
                    Loged In Successfully
                </div>';
    
            $_SESSION['username']=$username;
            header("Location:admin-files/admin_dashboard.php?login=success");
            exit;
        }
        else{
        header("Location:admin_login.php");
        exit;
        }
    }    
    ?>

    
</body>
</html>
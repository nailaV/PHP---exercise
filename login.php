<!DOCTYPE html>
<html>
<head>
    <title>Login page</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" name="submit" value="Login">
        <br>
        <a href="registration.php">Register here</a>
    </form>
</body>
</html>

<?php 
    include 'session.php';
    include 'konekcija.php';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT `password` FROM `korisnici` WHERE `username` = '$username'";

        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password,$row['password'])){
            $_SESSION['logged_in']=true;
            var_dump($_SESSION['logged_in']);
            $_SESSION['username']=$username;
            header("Location: primjer1.php");
            exit();
        }
        else
        {
            echo ("Try again");
        }

        mysqli_close($conn);
    }
?>
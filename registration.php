<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>Register</h2>
    <form action="" method="post">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>

<?php 
    include 'konekcija.php';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);

        $sql = "INSERT INTO `korisnici` (`username`,`password`,`email`,`rola`) 
        VALUES('$username','$password','$email', 'korisnik')";

        $result = mysqli_query($conn,$sql);

        if($result){
            header("Location: login.php");
            exit();
        }
        else{
            echo ("Try again");
        }
        mysqli_close($conn);
    }
?>

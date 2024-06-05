<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/accountstyle.css">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="box form-box">
        <?php
        include("php/config.php");
        if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $password = mysqli_real_escape_string($con,$_POST['password']);

            // Set the email and password
            $correctEmail = "Calizayamotor@gmail.com";
            $correctPassword = "Calizaya1732";

            if($email === $correctEmail && $password === $correctPassword){
                $_SESSION['valid'] = $email;
                $_SESSION['username'] = "Admin"; // Set a default username for admin
                header("Location: CRUD/Admin.php");
                exit(); // Terminate script after redirection
            } else {
                echo "<div class='message'>
                        <p>Wrong Username or Password</p>
                    </div> <br>";
                echo "<a href='Login.php'><button class='btn'>Go Back</button></a>";
            }
        } else {
        ?>
        <header>Login Admin Page</header>
        <form action="" method="post">
            <div class="field input">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div class="field input">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="field">
                <input type="submit" name="submit" value="login" required>
            </div>
            <div class="links">
                Don't have an account? <a href="register.php">Sign-up</a>
                <br> Admin Page: <a href="admin.php">Admin</a>
                <br> Already have an account?: <a href="index.php">Log in</a>
            </div>
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>

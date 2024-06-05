<?php
session_start();
include("../php/config.php");

if (!isset($_SESSION['valid'])) {
    header("Location: ../Home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/accountstyle.css">
    <title>Home | Calizaya Motor and Car Parts</title>
</head>
<body>
<div class="nav">
    <div class="logo">
        <p><a href="../Welcome.php">Calizaya</a></p>
        <p><a href="../CRUD/Admin.php">Admin</a></p>
    </div>
    <div class="right-links">
        <a href="../php/Logout.php"><button class="btn">Log Out</button></a>
        <a href="../Welcome.php"><button class="btn">Calizaya</button></a>
        <a href="../CRUD/Admin.php"><button class="btn">Admin</button></a>
    </div>
</div>
<div class="container">
    <div class="box form-box">
        <?php
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

            $sql = "INSERT INTO info (Username, Email, Age, Password) VALUES ('$username', '$email', '$age', '$password')";
            $result = mysqli_query($con, $sql);

            if ($result) {
                header("Location: Admin.php");
                echo "<a href='../CRUD/Admin.php'><button class='btn'>Login Now</button></a>";
            } else {
                echo "<p>Error adding user: " . mysqli_error($con) . "</p>";
            }
        }
        ?>
        <header>Add User</header>
        <form action="" method="post">
            <div class="field input">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="field input">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div class="field input">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" autocomplete="off" required min="13" max="110">
            </div>
            <div class="field input">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="field">
                <input type="submit" name="submit" value="Add User" autocomplete="off" required>
            </div>
        </form>
    </div>
</div>
</body>
</html>

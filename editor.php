<?php
session_start();
include("php/config.php");
if(!isset($_SESSION['valid'])){
  header("Location: Home.php");
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/accountstyle.css">
    <title>Home|Calizaya Motor and Car Parts</title>
</head>
<body>
<div class="nav">
        <div class="logo">
            <p><a href="Welcome.php">Calizaya</a></p>
        </div>

        <div class="right-links">
            <a href="php/Logout.php"> <button class ="btn">Log Out</button></a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php
            include("php/config.php");
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con, "UPDATE info SET Username = '$username',Email = '$email',Age ='$age' WHERE Id=$id") or die("error occured");

                if($edit_query){
                    echo "<div class='message'>
            <p>Update successful</p>
        </div> <br>";
    
                }
                else{
                    $id= $_SESSION['id'];
                    $query = mysqli_query($con,"SELECT * FROM info WHERE Id =$id");

                    while($result = mysqli_fetch_assoc($query))
                    {
                        $res_Uname = $result['username'];
                        $res_Email = $result['email'];
                        $res_Password = $result['password'];
                        $res_Age = $result['age'];
                    }
                }
            }
            ?>
            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email"  required>
                </div>
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age"  required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"  required>
                </div>
               
                <div class="field">
                    <input type="submit" name="submit" value="Update" autocomplete="off" required>
                </div>
            </form>
        </div>
    </div>
</body> 
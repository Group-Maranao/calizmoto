<?php
include("../php/config.php");

if(isset($_POST['submit'])){
    $id = $_GET['update'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $age = $_POST['Age'];
    $password = $_POST['Password'];
    

    $sql = "UPDATE info SET Username='$username', Email='$email', Age='$age', Password='$password' WHERE id=$id";
    $result = mysqli_query($con, $sql);
    
    if($result){
        echo "Updated Successfully!";
    } else {
        die(mysqli_error($con));
    }
}


if(isset($_GET['update'])){
    $id = $_GET['update'];
    $sql = "SELECT * FROM info WHERE id=$id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $username = $row['Username'];
    $email = $row['Email'];
    $age = $row['Age'];
    $password = $row['Password'];
} else {

    header("Location: ../Welcome.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/crud.css">
    <title>Edit Record | Calizaya Motor and Car Parts</title>
</head>
<body>
<div class="container">
    <p><a href="../Welcome.php">Calizaya</a></p>
    <button><a href="Admin.php">Back</a></button>
</div>
<header>Edit Record</header>
<form action="" method="post">
    <div class="field input">
        <label for="username">Username</label>
        <input type="text" class="form-control" placeholder="Enter your name" name="Username" value="<?php echo $username; ?>">
    </div>
    <div class="field input">
        <label for="email">Email</label>
        <input type="email" class="form-control" placeholder="Enter your Email" name="Email" value="<?php echo $email; ?>">
    </div>
    <div class="field input">
        <label for="Age">Age</label>
        <input type="text" class="form-control" placeholder="Enter your Age" name="Age" value="<?php echo $age; ?>">
    </div>
    <div class="field input">
        <label for="password">Password</label>
        <input type="text" class="form-control" placeholder="Enter your password" name="Password" value="<?php echo $password; ?>">
    </div>
    <div class="field">
        <button type="submit" class='btn' name="submit">Submit</button>
    </div>
</form>
</div>
</body>
</html>

<?php
session_start();
include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: Home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/accountstyle.css">
    <title>Home | Calizaya Motor and Car Parts</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="Home.php">Calizaya</a></p>
        </div>

        <div class="right-links">
        <?php
        $id = $_SESSION['id'];
        $query = mysqli_query($con, "SELECT * FROM info WHERE Id=$id");

        if ($result = mysqli_fetch_assoc($query)) {
            $res_Uname = $result['Username'];
            $res_Email = $result['Email'];
            $res_Age = $result['Age'];
            $res_id = $result['Id'];
            echo "<a href='editor.php?Id=$res_id'></a>";
        } else {
            echo "<p>User information not found.</p>";
            $res_Uname = '';
            $res_Email = '';
            $res_Age = '';
        }
        ?>
        <a href="editor.php"><button class="btn">Change Profile</button></a>
        <a href="php/Logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>
    <main>
      <br>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Your email is <b><?php echo htmlspecialchars($res_Email); ?></b></p>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="box">
                <p>And your username is <b><?php echo htmlspecialchars($res_Uname); ?></b></p>
            </div>
        </div>
        <div class="bottom">
            <div class="box">
                <p>And your age: <b><?php echo htmlspecialchars($res_Age); ?></b></p>
            </div>
        </div>
    </main>
</body>
</html>

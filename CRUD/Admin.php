<?php
include("../php/config.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/crudstyle.css">
    <title>Table</title>
</head>
<body>
    <div class="container">
        <button><a href="adduser.php">Add user</a></button>
        <button><a href="../php/Logout.php">Log Out</a></button>
    </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id no.</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Age</th>
            <th scope="col">Password</th>
            <th scope="col">Operation</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $sql = "SELECT * FROM info ";
          $result = mysqli_query($con,$sql);
          if($result){
            while($_row = mysqli_fetch_assoc($result)){
              $id = $_row['Id'];
              $username = $_row['Username'];
              $email = $_row['Email'];
              $age = $_row['Age'];
              $password = $_row['Password'];
             

              echo '<tr>
              <th scope="row">'.$id.'</th>
              <td>'.$username.'</td>
              <td>'.$email.'</td>
              <td>'.$age.'</td>
              <td>'.$password.'</td>
              <td><a href="Crudedit.php?update='.$id.'">EDIT</a>
              <a href="delete.php?delete='.$id.'">Delete</a</td>
              </tr>';
            }
          }
          ?>
      
        </tbody>
      </table>
</body>
</html>

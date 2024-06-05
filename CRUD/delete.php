<?php
include("../php/config.php");
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $sql = "DELETE FROM info WHERE id=$id"; 
    $result = mysqli_query($con, $sql);
    if($result) {
        echo "Deleted successfully";
        header("Location: Admin.php");
    } else {
        die(mysqli_error($con));
    }
}
?>

<?php
session_start();
include("connect2.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <div style="text-align:center; padding:15%;">
        <p style="font-size:50px; font-weight:bold;">
            Hello   <?php
            if(isset($_SESSION['Emp_ID'])){
                $ei=$_SESSION['Emp_ID'];
                $query=mysqli_query($conn, "SELECT `login`.* FROM `login` WHERE login.Emp_ID='$ei'");
                while($row=mysqli_fetch_array($query)){
                    echo $row['Emp_ID'].' '. $row['Type'];
                }
            }
            ?>
            :)
        </p>
        <a href="logout.php">Logout</a>
    </div>
    
</body>
</html>
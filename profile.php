<?php
include('config/dbcon.php');
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location: registered.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
    <link rel="stylesheet" href="styleprof.css">
</head>
<body>
    <div class="container">
        <div class="profile">
            <?php
            $select = mysqli_query($con, "SELECT * FROM leavetable
            where Emp_ID = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select) > 0){
                $fetch = mysqli_fetch_assoc($select);
            }
            ?>
            <h3><?php echo $fetch['name']; ?></h3>
            <a href=""></a>
        </div>
    </div>
    
</body>
</html>
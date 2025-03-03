<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addUser']))
{
    $empid = $_POST['empid'];
    $sa = $_POST['sa'];
    $bonus = $_POST['bonus'];
    $ddn = $_POST['ddn'];
    $ta = $_POST['ta'];


    $user_query = "INSERT INTO payroll (Emp_ID,	Salary_amt,	Bonus,	Deduction,Total_amt)
     VALUES ('$empid','$sa','$bonus','$ddn','$ta')";
    
    $user_query_run = mysqli_query($con, $user_query);

    if($user_query_run)
    {
        $_SESSION['status'] = "User Added Successfully";
        header("Location: payroll.php");
    }
    else 
    {
        $_SESSION['status'] = "User Registration Failed";
        header("Location: payroll.php");
    }
}

if(isset($_POST['updateUser']))
{
    $user_id = $_POST['user_id'];
    $empid = $_POST['empid'];
    $sa = $_POST['sa'];
    $bonus = $_POST['bonus'];
    $ddn = $_POST['ddn'];
    $ta = $_POST['ta'];

    $query = "UPDATE payroll SET Emp_ID='$empid', Salary amt='$sa',Bonus='$bonus', Deduction='$ddn',
     Total amt = '$ta', Last_edited = CURRENT_TIMESTAMP WHERE Emp_ID='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Updated Successfully";
        header("Location: payroll.php");
    }
    else 
    {
        $_SESSION['status'] = "User Updating Failed";
        header("Location: payroll.php");
    }

}

if(isset($_POST['DeleteUserbtn']))
{
    $userid = $_POST['delete_id'];
    $query = "DELETE FROM payroll WHERE  Emp_ID='$userid'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Deleted Successfully";
        header("Location: payroll.php");
    }
    else 
    {
        $_SESSION['status'] = "User Deleting Failed";
        header("Location: payroll.php");
    }
}

?>
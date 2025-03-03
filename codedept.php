<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addUser']))
{
    $di = $_POST['deptid'];
    $dn = $_POST['deptn'];

    $checkdn = "SELECT Dept_name from department where Dept_name='$dn'";
    $checkdn_run = mysqli_query($con, $checkdn);

    if(mysqli_num_rows($checkdn_run) > 0)
    {
        //already exists
        $_SESSION['status'] = "Department already exists";
        header("Location: dept.php");
    }
    else{

        $user_query = "INSERT INTO department (Dept_ID, Dept_name)
         VALUES ('$di', '$dn')";
        
        $user_query_run = mysqli_query($con, $user_query);
    
        if($user_query_run)
        {
            $_SESSION['status'] = "Department Added Successfully";
            header("Location: dept.php");
        }
        else 
        {
            $_SESSION['status'] = "Department Registration Failed";
            header("Location: dept.php");
        }

    }

}

if(isset($_POST['updateUser']))
{
    $user_id = $_POST['user_id'];
    $di = $_POST['deptid'];
    $dn = $_POST['deptn'];

    $query = "UPDATE department SET Dept_ID='$di', Dept_name='$dn', Last_edited = CURRENT_TIMESTAMP WHERE Dept_ID='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Updated Successfully";
        header("Location: dept.php");
    }
    else 
    {
        $_SESSION['status'] = "User Updating Failed";
        header("Location: dept.php");
    }

}

if(isset($_POST['DeleteUserbtn']))
{
    $userid = $_POST['delete_id'];
    $query = "DELETE FROM department WHERE  Dept_ID='$userid'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Deleted Successfully";
        header("Location: dept.php");
    }
    else 
    {
        $_SESSION['status'] = "User Deleting Failed";
        header("Location: dept.php");
    }
}

?>
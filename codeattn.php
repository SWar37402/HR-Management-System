<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addUser']))
{
    $empid = $_POST['empid'];
    $date = $_POST['date'];
    $pa = $_POST ['pa'];
    //$Sno = "SELECT COUNT(*) from attendance + 1"; 

    //$checkdn = "SELECT Dept_name from attendance where S.No.="$Sno"";
    //$checkdn_run = mysqli_query($con, $checkdn);

    $user_query = "INSERT INTO attendance (Emp_ID, `Date`, `P/A`)
    VALUES ('$empid', '$date', '$pa')";
   
    $user_query_run = mysqli_query($con, $user_query);

    if($user_query_run)
    {
       $_SESSION['status'] = "Attendance Added Successfully";
       header("Location: attendance.php");
    }
    else 
    {
       $_SESSION['status'] = "Unable to add attendance";
       header("Location: attendance.php");
    }

    // if(mysqli_num_rows($checkdn_run) > 0)
    // {
    //     //already exists
    //     $_SESSION['status'] = "Department already exists";
    //     header("Location: dept.php");
    // }
    // else{

    //     $user_query = "INSERT INTO department (Dept_ID, Dept_name)
    //      VALUES ('$di', '$dn')";
        
    //     $user_query_run = mysqli_query($con, $user_query);
    
    //     if($user_query_run)
    //     {
    //         $_SESSION['status'] = "Department Added Successfully";
    //         header("Location: dept.php");
    //     }
    //     else 
    //     {
    //         $_SESSION['status'] = "Department Registration Failed";
    //         header("Location: dept.php");
    //     }

    // }

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
        header("Location: attendance.php");
    }
    else 
    {
        $_SESSION['status'] = "User Updating Failed";
        header("Location: attendance.php");
    }

}

if(isset($_POST['DeleteUserbtn']))
{
    $userid = $_POST['delete_id'];
    $query = "DELETE FROM attendance WHERE  `S.No.` ='$userid'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Attendance Deleted Successfully";
        header("Location: attendance.php");
    }
    else 
    {
        $_SESSION['status'] = "Attendance Deleting Failed";
        header("Location: attendance.php");
    }
}

?>
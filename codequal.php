<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addUser']))
{
    $qid = $_POST['qid'];
    $empid = $_POST['empid'];
    $cname = $_POST['cname'];
    $cadd = $_POST['cadd'];
    $dtype = $_POST['dtype'];
    $branch = $_POST['branch'];
    $gdate = $_POST['gdate'];


    $user_query = "INSERT INTO `qualification`(`Qual_ID`, `Emp_ID`, `College name`, `College address`, `Degree Type`, `Branch`, `Graduation Date(MM/YYYY)`)
     VALUES ('$qid','$empid','$cname','$cadd','$dtype','$branch', '$gdate')";
    
    $user_query_run = mysqli_query($con, $user_query);

    if($user_query_run)
    {
        $_SESSION['status'] = "Qualification Added Successfully";
        header("Location: qual.php");
    }
    else 
    {
        $_SESSION['status'] = "Row didn't add";
        header("Location: qual.php");
    }
}

if(isset($_POST['updateUser']))
{
    $user_id = $_POST['user_id'];
    $qid = $_POST['qid'];
    $empid = $_POST['empid'];
    $cname = $_POST['cname'];
    $cadd = $_POST['cadd'];
    $dtype = $_POST['dtype'];
    $branch = $_POST['branch'];
    $gdate = $_POST['gdate'];

    $query = "UPDATE qualification SET `Qual_ID`='$qid', 'Emp_ID'='$empid', 'College name' ='$sid', `College address` = '$cadd', `Degree Type`='$dtype', 
    `Branch` = '$branch', `Graduation Date(MM/YYYY)`='$gdate' WHERE Qual_ID='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Qualification Updated Successfully";
        header("Location: qual.php");
    }
    else 
    {
        $_SESSION['status'] = "Qualification Updating Failed";
        header("Location: qual.php");
    }

}

if(isset($_POST['DeleteUserbtn']))
{
    $userid = $_POST['delete_id'];
    $query = "DELETE FROM leavetable WHERE  Leave_ID='$userid'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Deleted Successfully";
        header("Location: registered.php");
    }
    else 
    {
        $_SESSION['status'] = "User Deleting Failed";
        header("Location: registered.php");
    }
}

?>
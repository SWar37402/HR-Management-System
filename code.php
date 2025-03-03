<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addUser']))
{
    $leave = $_POST['leave'];
    $empid = $_POST['empid'];
    $sid = $_POST['sid'];
    $fd = $_POST['fd'];
    $td = $_POST['td'];
    $reason = $_POST['reason'];


    $user_query = "INSERT INTO leavetable (Leave_ID,Emp_ID, Senior_ID,FrmDate,TDate,Reason)
     VALUES ('$leave','$empid','$sid','$fd','$td','$reason')";
    
    $user_query_run = mysqli_query($con, $user_query);

    if($user_query_run)
    {
        $_SESSION['status'] = "User Added Successfully";
        header("Location: registered.php");
    }
    else 
    {
        $_SESSION['status'] = "User Registration Failed";
        header("Location: registered.php");
    }
}

if(isset($_POST['updateUser']))
{
    $user_id = $_POST['user_id'];
    $leave = $_POST['leave'];
    $empid = $_POST['empid'];
    $sid = $_POST['sid'];
    $fd = $_POST['fd'];
    $td = $_POST['td'];
    $reason = $_POST['reason'];

    $query = "UPDATE leavetable SET Leave_ID='$leave', Emp_ID='$empid', Senior_ID='$sid', FrmDate='$fd', TDate='$td', Reason='$reason', Last_edited = CURRENT_TIMESTAMP WHERE Leave_ID='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Updated Successfully";
        header("Location: registered.php");
    }
    else 
    {
        $_SESSION['status'] = "User Updating Failed";
        header("Location: registered.php");
    }

}

if(isset($_POST['DeleteUserbtn']))
{
    $userid = $_POST['delete_id'];
    $query = "DELETE FROM leavetable WHERE  Leave_ID='$userid'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Leave details deleted Successfully";
        header("Location: registered.php");
    }
    else 
    {
        $_SESSION['status'] = "Leave details deleting Failed";
        header("Location: registered.php");
    }
}

?>
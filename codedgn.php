<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addUser']))
{
    $di = $_POST['degnid'];
    $dn = $_POST['degnn'];

    $checkdn = "SELECT Degn_name from designation where Degn_name='$dn'";
    $checkdn_run = mysqli_query($con, $checkdn);

    if(mysqli_num_rows($checkdn_run) > 0)
    {
        //already exists
        $_SESSION['status'] = "Designation already exists";
        header("Location: desgn.php");
    }
    else{

        $user_query = "INSERT INTO designation (Degn_ID, Degn_name)
         VALUES ('$di', '$dn')";
        
        $user_query_run = mysqli_query($con, $user_query);
    
        if($user_query_run)
        {
            $_SESSION['status'] = "Designation Added Successfully";
            header("Location: desgn.php");
        }
        else 
        {
            $_SESSION['status'] = "Designation Registration Failed";
            header("Location: desgn.php");
        }

    }

}

if(isset($_POST['updateUser']))
{
    $user_id = $_POST['user_id'];
    $di = $_POST['degnid'];
    $dn = $_POST['degnn'];

    $query = "UPDATE designation SET Degn_ID='$di', Degn_name='$dn', Last_edited = CURRENT_TIMESTAMP WHERE Degn_ID='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Designation Updated Successfully";
        header("Location: desgn.php");
    }
    else 
    {
        $_SESSION['status'] = "Designation Updating Failed";
        header("Location: desgn.php");
    }

}

if(isset($_POST['DeleteUserbtn']))
{
    $userid = $_POST['delete_id'];
    $query = "DELETE FROM designation WHERE  Degn_ID='$userid'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Designation Deleted Successfully";
        header("Location: desgn.php");
    }
    else 
    {
        $_SESSION['status'] = "Designation Deleting Failed";
        header("Location: desgn.php");
    }
}

?>
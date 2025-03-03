<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addUser']))
{
    $empid = $_POST['empid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $degnid = $_POST['degnid'];
    $deptid = $_POST['deptid'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sid = $_POST['sid'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $cat = $_POST['cat'];
    $doj = $_POST['doj'];
    $dor = $_POST['dor'];
    $exist = $_POST['exist'];
    $address = $_POST['address'];
    $en = $_POST['en'];

    $checkemp = "SELECT Emp_ID from employee where Emp_ID='$empid'";
    $checkemp_run = mysqli_query($con, $checkemp);
    
    if(mysqli_num_rows($checkemp_run) > 0){
        //already exists
        $_SESSION['status'] = "Employee already exists";
        header("Location: employees.php");
    }
    else{

        $user_query = "INSERT INTO `employee`(`Emp_ID`, `First Name`, 
        `Last Name`, `Degn_ID`, `Dept_ID`, `Emp_email`, `Emp_phone`, `Senior_ID`, `DOB`, `Gender`,
        `Category`, `DOJ`, `DOR`, `Emp_exist`, `Address`, `E/N`) VALUES
        ('$empid','$fname','$lname','$degnid','$deptid','$email','$phone','$sid','$dob','$gender','$cat','$doj',
        '$dor','$exist','$address','$en')";

        $user_query_run = mysqli_query($con, $user_query);
        if($user_query_run)
        {
            $_SESSION['status'] = "Employee data Added Successfully";
            header("Location: employees.php");
        }
        else 
        {
            $_SESSION['status'] = "Data addition Failed";
            header("Location: employees.php");
        }

    }

}

if(isset($_POST['updateUser']))
{
    $user_id = $_POST['user_id'];
    $empid = $_POST['empid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $degnid = $_POST['degnid'];
    $deptid = $_POST['deptid'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sid = $_POST['sid'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $cat = $_POST['cat'];
    $doj = $_POST['doj'];
    $dor = $_POST['dor'];
    $exist = $_POST['exist'];
    $address = $_POST['address'];
    $en = $_POST['en'];

    $query = "UPDATE `employee` SET `Emp_ID`='$empid',`First Name`='$fname',`Last Name`='$lname',`Degn_ID`='$degnid',`Dept_ID`='$deptid',
    `Emp_email`='$email',`Emp_phone`='$phone',`Senior_ID`='$sid',`DOB`='$dob',
    `Gender`='$gender',`Category`='$cat',`DOJ`='$doj',`DOR`='$dor',`Emp_exist`='$exist',
    `Address`='$address',`E/N`='$en',`Last_edited`=CURRENT_TIMESTAMP WHERE `Emp_ID` = '$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Updated Successfully";
        header("Location: employees.php");
    }
    else 
    {
        $_SESSION['status'] = "User Updating Failed";
        header("Location: employees.php");
    }

}

if(isset($_POST['DeleteUserbtn']))
{
    $userid = $_POST['delete_id'];
    $query = "DELETE FROM employee WHERE  Emp_ID='$userid'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Employee data Deleted Successfully";
        header("Location: employees.php");
    }
    else 
    {
        $_SESSION['status'] = "Employee data Deleting Failed";
        header("Location: employees.php");
    }
}

?>
<?php

include 'connect2.php';

if(isset($_POST['signUp'])){
    $emplid=$_POST['empid'];
    $password=$_POST['password'];
    $password = md5($password);

    $checkemp = "SELECT *from `login` where EMP_ID = '$emplid'";
    $result=$conn->query($checkemp);
    if($result->num_rows>0){
        echo "Employee Already Exists !";
    }
    else{
        $insertQuery="INSERT INTO `login`(EMP_ID, password)
                        VALUES ('$emplid','$password')";
        if($conn->query($insertQuery)==TRUE){
            header("location: index.php");
        }
        else{
            echo "Error:".$conn->error;
        }
    }
}

if(isset($_POST['signIn'])){
    $empid=$_POST['empid'];
    $password=$_POST['password'];
    $type=$_POST['emp'];
    $password=md5($password);

    $sql="SELECT * FROM `login` WHERE Emp_ID='$empid' and  password='$password' and Type='$type'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['Emp_ID']=$row['Emp_ID'];
        if($row['Type']=='HR')
            header("Location: ../registered.php");
        else header("Location: profile2.php");
        exit();
        //echo "User found";
        //admin\profile2.php
    }
    else{
        //echo"Not Found, Incorrect username, Password or Type";
        $em = "Wrong Employee ID, Password or Type!";
        header("Location: index.php?error=$em");
        exit;
    }
}

if(isset($_POST['leavesubmit'])){
    $empid = $_POST['empid'];
    $sid = $_POST['sid'];
    $reason = $_POST['reason'];
    $fdate = $_POST['fdate'];
    $tdate = $_POST['tdate'];

    $user_query = "INSERT INTO `leavetable`(`Emp_ID`, `Senior_ID`, `FrmDate`, `TDate`, `Reason`) VALUES
    ('$empid', '$sid', '$fdate', '$tdate', '$reason')";
   
    $user_query_run = mysqli_query($conn, $user_query);

    if($user_query_run)
    {
       $_SESSION['status'] = "Attendance Added Successfully";
       header("Location: profile2.php");
    }
    else 
    {
       $_SESSION['status'] = "Unable to add attendance";
       header("Location: profile2.php");
    }
}

?>
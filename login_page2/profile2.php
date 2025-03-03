<?php

include('connect2.php');
session_start();
$empid = $_SESSION['Emp_ID'];

if(!isset($empid)){
    header('location: index.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<div class="update-profile">
    <?php
        $select = mysqli_query($conn, "SELECT * FROM employee
        where Emp_ID = '$empid'") or die('query failed');
        if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
        }

        $select2 = mysqli_query($conn, "SELECT * FROM department
         where Dept_ID=(SELECT Dept_ID from employee where Emp_ID = '$empid')") or die('query failed');
         if(mysqli_num_rows($select2) > 0){
            $fetch2 = mysqli_fetch_assoc($select2);
         }

         $select3 = mysqli_query($conn, "SELECT * FROM designation
         where Degn_ID=(SELECT Degn_ID from employee where Emp_ID = '$empid')") or die('query failed');
         if(mysqli_num_rows($select3) > 0){
            $fetch3 = mysqli_fetch_assoc($select3);
         }
    ?>
            <form action="" method="post" enctype="multipart/form-data">
                <h2>Employee Details</h2>
                <div class="flex">
                    <div class="inputBox">
                        <span>Employee ID </span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['Emp_ID'] ?>"
                        class="box">
                        <span>First Name </span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['First Name'] ?>"
                        class="box">
                        <span>Last Name </span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['Last Name'] ?>"
                        class="box">
                        <span>Designation ID </span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['Degn_ID'] ?>"
                        class="box">
                        <span>Designation Name </span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch3['Degn_name'] ?>"
                        class="box">
                        <span>Department ID </span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['Dept_ID'] ?>"
                        class="box">
                        <span>Department Name </span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch2['Dept_name'] ?>"
                        class="box">
                        <span>Senior ID</span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['Senior_ID'] ?>"
                        class="box">
                        <span>Phone No</span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['Emp_phone'] ?>"
                        class="box">
                    </div>
                    <div class="inputBox">
                        <span>Email</span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['Emp_email'] ?>"
                        class="box">
                        <span>DOB </span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['DOB'] ?>"
                        class="box"> 
                        <span>Gender</span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['Gender'] ?>"
                        class="box">    
                        <span>Category</span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['Category'] ?>"
                        class="box">
                        <span>DOJ</span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['DOJ'] ?>"
                        class="box">
                        <span>DOR</span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['DOR'] ?>"
                        class="box">
                        <span>Employee exist</span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['Emp_exist'] ?>"
                        class="box">
                        <span>Address</span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['Address'] ?>"
                        class="box">
                        <span>E/N</span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['E/N'] ?>"
                        class="box">
                    </div>
                </div>
            </form>
            
</div> 

<div class="update-profile">
    <?php
        $select = mysqli_query($conn, "SELECT * FROM qualification
        where Emp_ID = '$empid'") or die('query failed');
        if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
        }

    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Employee Qualifications: </h2>
        <div class="flex">
            <div class="inputBox">
                <span>College name </span>
                <input type="text" name="update-name" readonly value="<?php echo $fetch['College name'] ?>"
                class="box">
                <span>College address </span>
                <input type="text" name="update-name" readonly value="<?php echo $fetch['College address'] ?>"
                class="box">
                <span>Degree </span>
                <input type="text" name="update-name" readonly value="<?php echo $fetch['Degree Type'] ?>"
                class="box">
            </div>
            <div class="inputBox">
                <span>Branch </span>
                <input type="text" name="update-name" readonly value="<?php echo $fetch['Branch'] ?>"
                class="box"> 
                <span>Graduation Date(MM/YYYY) </span>
                <input type="text" name="update-name" readonly value="<?php echo $fetch['Graduation Date(MM/YYYY)'] ?>"
                class="box">    
            </div>
        </div>
    </form>
</div> 

<div class="update-profile">
    <form action="">
        <h2>Leave details</h2><br>
        <div class="flex">
            <table>
                <thead>
                <th>Leave_ID</th>
                <th>Senior_ID</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Reason</th>
                </thead>
                <tbody>
                <?php
                    $query_run = mysqli_query($conn, "SELECT * FROM leavetable
                        where Emp_ID = '$empid'") or die('query failed');
                    if(mysqli_num_rows($query_run)>0)
                    {
                    foreach($query_run as $row)
                    {
                        ?>
                        <tr>
                        <td><?php echo $row['Leave_ID']; ?></td>
                        <td><?php echo $row['Senior_ID']; ?></td>
                        <td><?php echo $row['FrmDate']; ?></td>
                        <td><?php echo $row['TDate']; ?></td>
                        <td><?php echo $row['Reason']; ?></td>
                        </tr>
                        <?php
                    }
    
                    }
                    else{
                        ?>
                        <tr>
                        <td>No Record Found</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </form>
</div>

<div class="update-profile">
    <form action="register.php" method="POST">
        <h2>Leave Application</h2>
        <?php
            if(isset($_SESSION['status']))
            {
              echo "<h4>".$_SESSION['status']."</h4>";
              unset($_SESSION['status']);
            }
  
          ?>
        <div class="flex">
            <div class="inputBox">
                <span>Employee ID</span>
                <input type="text" name="empid" readonly value="<?php echo $fetch['Emp_ID'] ?>"
                class="box">
                <span>Senior ID</span>
                <input type="text" name="sid" class="box">
                <span>Reason</span>
                <input type="text" name="reason" class="box">
            </div>
            <div class="inputBox">
            <span>From Date</span>
                <input type="text" name="fdate" class="box">
                <span>To Date</span>
                <input type="text" name="tdate" class="box">
            </div>
        </div>
        <input type="submit" class="leavebtn" value="Submit" name="leavesubmit">
    </form>




</div>

<div class = "update-profile">

        <?php
    $select = mysqli_query($conn, "SELECT * FROM leavetable
    where Emp_ID = '$empid'") or die('query failed');
        if(mysqli_num_rows($select) > 0){
            //$fetch = mysqli_fetch_assoc($select);
            foreach($select as $fetch){
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <h2>Leave data</h2>
                    <div class="flex">
                        <div class="inputBox">
                            <span>Leave_ID: </span>
                            <input type="text" name="update-name" readonly value="<?php echo $fetch['Leave_ID'] ?>"
                            class="box">
                            <span>Reason: </span>
                            <input type="text" name="update-name" readonly value="<?php echo $fetch['Reason'] ?>"
                            class="box">
                        </div>
                            <div class="inputBox">
                                <span>From Date: </span>
                                <input type="text" name="update-name" readonly value="<?php echo $fetch['FrmDate'] ?>"
                                class="box">
                                <span>To date: </span>
                                <input type="text" name="update-name" readonly value="<?php echo $fetch['TDate'] ?>"
                                class="box">   
                                <span>Submission date and time: </span>
                                <input type="text" name="update-name" readonly value="<?php echo $fetch['Last_edited'] ?>"
                                class="box">    
                            </div>
                        </div>
                    </form>               
                <?php
            }
        }
    ?>    
</div> 

<div class="update-profile">
    <?php
        $select = mysqli_query($conn, "SELECT * FROM payroll
        where Emp_ID = '$empid'") or die('query failed');
        if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
        }
    ?>
            <form action="" method="post" enctype="multipart/form-data">
                <h2>Payroll</h2>
                <div class="flex">
                    <div class="inputBox">
                    <span>Month </span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['Month'] ?>"
                        class="box">
                        <span>Salary Amount </span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['Salary_amt'] ?>"
                        class="box">
                        <span>Bonus </span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['Bonus'] ?>"
                        class="box">
                    </div>
                    <div class="inputBox">
                        <span>Deduction </span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['Deduction'] ?>"
                        class="box"> 
                        <span>Total Amount </span>
                        <input type="text" name="update-name" readonly value="<?php echo $fetch['Total_amt'] ?>"
                        class="box">    
                    </div>
                </div>
            </form>
            
</div> 

<div class="update-profile">
    <form action="">
        <h2>Attendance</h2><br>
        <div class="flex">

            <table>
                <thead>
                <th>Date</th>
                <th>P/A</th>
                </thead>
                <tbody>
                <?php
                    $query_run = mysqli_query($conn, "SELECT * FROM attendance
                        where Emp_ID = '$empid'") or die('query failed');
                    if(mysqli_num_rows($query_run)>0)
                    {
                    foreach($query_run as $row)
                    {
                        ?>
                        <tr>
                        <td><?php echo $row['Date']; ?></td>
                        <td><?php echo $row['P/A']; ?></td>
                        </tr>
                        <?php
                    }
    
                    }
                    else{
                        ?>
                        <tr>
                        <td>No Record Found</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
</div>

</body>
</html>
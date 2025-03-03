<?php
session_start();
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Employee data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

  <!--/.content-header -->
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
              <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Edit - Employee data</h3>
                          <a href="employees.php" class="btn btn-danger btn-sm float-right">Back</a>
                      </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="codeemp.php" method="POST">
                                <div class="modal-body">
                                    <?php
                                    if(isset($_GET['user_id']))
                                    {
                                        $user_id = $_GET['user_id'];
                                        $query = "SELECT * FROM employee WHERE Emp_ID='$user_id' LIMIT 1";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0) 
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                <input type="hidden" name = "user_id" value="<?php echo $row['Emp_ID']?>">
                                                <div class="form-group">
                                                    <label for="">Emp_ID</label>
                                                    <input type="text" name="empid" value = "<?php echo $row['Emp_ID']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">First Name</label>
                                                    <input type="text" name="fname" value = "<?php echo $row['First Name']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Last Name</label>
                                                    <input type="text" name="lname" value = "<?php echo $row['Last Name']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Designation ID</label>
                                                    <input type="text" name="degnid" value = "<?php echo $row['Degn_ID']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Department ID</label>
                                                    <input type="text" name="deptid" value = "<?php echo $row['Dept_ID']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="text" name="email" value = "<?php echo $row['Emp_email']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Phone no</label>
                                                    <input type="text" name="phone" value = "<?php echo $row['Emp_phone']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Senior_ID</label>
                                                    <input type="text" name="sid" value = "<?php echo $row['Senior_ID']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">DOB</label>
                                                    <input type="text" name="dob" value = "<?php echo $row['DOB']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Gender</label>
                                                    <input type="text" name="gender" value = "<?php echo $row['Gender']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Category</label>
                                                    <input type="text" name="cat" value = "<?php echo $row['Category']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">DOJ</label>
                                                    <input type="text" name="doj" value = "<?php echo $row['DOJ']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">DOR</label>
                                                    <input type="text" name="dor" value = "<?php echo $row['DOR']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Emp_exist</label>
                                                    <input type="text" name="exist" value = "<?php echo $row['Emp_exist']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <input type="text" name="address" value = "<?php echo $row['Address']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">E/N</label>
                                                    <input type="text" name="en" value = "<?php echo $row['E/N']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "<h4>No Record Found.!</h4>";
                                        }
                                    }
                                    ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="updateUser" class="btn btn-info">Update</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
              </div>
          </div>
        </div>
    </div>
  </section>

</div>

<?php include('includes/script.php');?>
<?php
include('includes/footer.php');
?>
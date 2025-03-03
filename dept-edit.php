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
              <li class="breadcrumb-item active">Edit - Departments</li>
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
                          <h3 class="card-title">Edit - Department</h3>
                          <a href="dept.php" class="btn btn-danger btn-sm float-right">Back</a>
                      </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="codedept.php" method="POST">
                                <div class="modal-body">
                                    <?php
                                    if(isset($_GET['user_id']))
                                    {
                                        $user_id = $_GET['user_id'];
                                        $query = "SELECT * FROM department WHERE Dept_ID='$user_id' LIMIT 1";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0) 
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                <input type="hidden" name = "user_id" value="<?php echo $row['Dept_ID']?>">
                                                <div class="form-group">
                                                    <label for="">Department ID</label>                                 
                                                    <input type="text" name="deptid" value = "<?php echo $row['Dept_ID']?>" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Department name</label>
                                                    <input type="text" name="deptn" value = "<?php echo $row['Dept_name']?>" class="form-control">
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
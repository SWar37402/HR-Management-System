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
              <li class="breadcrumb-item active">Edit - Registered Users</li>
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
                          <h3 class="card-title">Edit - Registered Users</h3>
                          <a href="registered.php" class="btn btn-danger btn-sm float-right">Back</a>
                      </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="code.php" method="POST">
                                <div class="modal-body">
                                    <?php
                                    if(isset($_GET['user_id']))
                                    {
                                        $user_id = $_GET['user_id'];
                                        $query = "SELECT * FROM leavetable WHERE Leave_ID='$user_id' LIMIT 1";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0) 
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                <input type="hidden" name = "user_id" value="<?php echo $row['Leave_ID']?>">
                                                <div class="form-group">
                                                    <label for="">Leave_ID</label>                                 
                                                    <input type="text" name="leave" value = "<?php echo $row['Leave_ID']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Emp_ID</label>
                                                    <input type="text" name="empid" value = "<?php echo $row['Emp_ID']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Senior_ID</label>
                                                    <input type="text" name="sid" value = "<?php echo $row['Senior_ID']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">From Date</label>
                                                    <input type="text" name="fd" value = "<?php echo $row['FrmDate']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">To Date</label>
                                                    <input type="text" name="td" value = "<?php echo $row['TDate']?>" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Reason</label>
                                                    <input type="text" name="reason" value = "<?php echo $row['Reason']?>" class="form-control" placeholder="Name">
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
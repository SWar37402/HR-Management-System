<?php
session_start();
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Modal -->
    <div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Attendance
            </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="codeattn.php" method="POST">
          <div class="modal-body">
            <div class="form-group">
                <label for="">Emp_ID</label>
                <input type="text" name="empid" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Date</label>
                <input type="text" name="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="">P/A</label>
                <input type="text" name="pa" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="addUser" class="btn btn-primary">Save</button>
          </div>
        </form>
        </div>
      </div>
    </div>

    <!-- Delete User -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="codeattn.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_id" class="delete_user_id">
            <p>
              Are you sure you want to Delete?
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="DeleteUserbtn" class="btn btn-primary">Yes, Delete.!</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- Delete User -->

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attendance</li>
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
          <?php
            if(isset($_SESSION['status']))
            {
              echo "<h4>".$_SESSION['status']."</h4>";
              unset($_SESSION['status']);
            }
  
          ?>
              <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Attendance</h3>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#AddUserModal" class="btn btn-primary btn-sm float-right">Add Attendance</a>
                      </div>
                        <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>S.NO.</th>
                              <th>Emp_ID</th>
                              <th>Date</th>
                              <th>P/A</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                          <tbody>
                            <?php
                              $query = "SELECT * FROM attendance";
                              $query_run = mysqli_query($con, $query);
                              
                              if(mysqli_num_rows($query_run)>0)
                              {
                                foreach($query_run as $row)
                                {
                                  ?>
                                  <tr>
                                    <td><?php echo $row['S.No.']; ?></td>
                                    <td><?php echo $row['Emp_ID']; ?></td>
                                    <td><?php echo $row['Date']; ?></td>
                                    <td><?php echo $row['P/A']; ?></td>
                                    <td><a href="dept-edit.php?user_id=<?php echo $row['S.No.']; ?>" class = "btn btn-info btn-sm">Edit</a>
                                    <button type="button" value="<?php echo $row['S.No.']; ?>" class = "btn btn-danger btn-sm deletebtn">Delete</a></td>
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
              </div>
          </div>
        </div>
    </div>
  </section>

</div>

<?php include('includes/script.php');?>

<script>
  $(document).ready(function () {
    $('.deletebtn').click(function (e) { 
      e.preventDefault();
      
      var user_id = $(this).val();
      //console.log(user_id);
      $('.delete_user_id').val(user_id);
      $('#DeleteModal').modal('show');
    });
  });
</script>

<?php include('includes/footer.php');?>
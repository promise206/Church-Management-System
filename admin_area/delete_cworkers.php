
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="m_gender" class="control-label" style="color: red; ">Do You Really Want To Delete This Member?</label><br>
                      <button type='submit' name='yes' class='btn btn-danger'>Yes</button>
                      <button type='submit' name='no' class='btn btn-success'>No</button>
                    </div>
                  </div>
                </form>

<?php
 if (isset($_GET['delete_cworkers'])) {
 $get_id = $_GET['delete_cworkers'];
if (isset($_POST['yes'])) {
  
  $delete_cworker = "delete from current_workers where worker_id = '$get_id'";

  $run_cworker = mysqli_query($con,$delete_cworker);

  echo "<script>alert('Deleted Successfully!')</script>";
      echo"<script>window.open('index.php?view_cworkers','_self')</script>";
    exit();
}
if (isset($_POST['no'])) {
  echo "<script>alert('Account Not Deleted!')</script>";
      echo"<script>window.open('index.php?view_cworkers','_self')</script>";
    exit();
}
}

?>
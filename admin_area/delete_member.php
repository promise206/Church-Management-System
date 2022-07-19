
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
 if (isset($_GET['delete_member'])) {
 $get_id = $_GET['delete_member'];
if (isset($_POST['yes'])) {
  
  $delete_member = "delete from members where member_id = '$get_id'";

  $run_member = mysqli_query($con,$delete_member);

  echo "<script>alert('The Member has been Deleted!')</script>";
      echo"<script>window.open('index.php?view_members','_self')</script>";
    exit();
}
if (isset($_POST['no'])) {
  echo "<script>alert('Not Deleted!')</script>";
      echo"<script>window.open('index.php?view_members','_self')</script>";
    exit();
}
}

?>
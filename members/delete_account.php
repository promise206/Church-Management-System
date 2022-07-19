
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="m_gender" class="control-label" style="color: red;">Do You Really Want To Delete Your Account?</label><br>
                      <button type='submit' name='yes' class='btn btn-danger'>Yes,i do</button>
                      <button type='submit' name='no' class='btn btn-success'>No,just joking</button>
                    </div>
                  </div>
                </form>

<?php
 if (isset($_COOKIE['email'])) {
 
  $user = $_COOKIE['email'];
if (isset($_POST['yes'])) {
  
  $delete_member = "delete from members where email = '$user'";

  $run_member = mysqli_query($con,$delete_member);

  echo "<script>alert('Your Account Has Been Deleted!')</script>";
  session_destroy();
      echo"<script>window.open('../index.php','_self')</script>";
    exit();
}
if (isset($_POST['no'])) {
  echo "<script>alert('Do Not Joke Again!')</script>";
      echo"<script>window.open('my_account.php','_self')</script>";
    exit();
}
}

?>
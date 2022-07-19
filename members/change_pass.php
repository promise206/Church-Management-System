
           <div class="box">
                

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 "><div class="form-box">
                
              <h1 style="text-align: center; color: #46594c;font-size: 20px;">Change Your Password </h1>

                <form action="" method="post" enctype="multipart/form-data">
                <label for="m_current" class="control-label">Enter Current Password:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-12">
                        <input type="password" class="form-control" id="m_current" name="m_current" placeholder="" required>
                      </div>
                  </div>
                  <label for="m_pass" class="control-label">Enter a New Password:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-12">
                        <input type="password" class="form-control" id="m_pass" name="m_pass" placeholder="" required>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 padding-top-10">
                      <label for="m_again" class="control-label">Enter The Passord Again:</label>
                      <input type="password" class="form-control" id="m_again" name="m_again" placeholder="" required>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2">
                        <button type="submit" name="change_pass" class="btn btn-success">Submit</button>
                      </div>
                  </div>
                  <div>
                    <div class="col-md-6">
                    </div>
                  </div>
                </form>
           </div>
           </div>
           </div>

<?php
include("includes/db.php");

if(isset($_POST['change_pass'])){

  if (isset($_COOKIE['email'])) {
    $user = $_COOKIE['email'];

    $m_current = $_POST['m_current'];
    $m_pass = $_POST['m_pass'];
    $m_again = $_POST['m_again'];

    $sel_pass = "select * from members where pass = '$m_current' AND email = '$user'";
    $run_pass = mysqli_query($con, $sel_pass);
    $check_pass = mysqli_num_rows($run_pass);

    if($check_pass == 0){
      echo "<script>alert('The Current Password is Incorrect')</script>";
      exit();
    }

    if ($m_pass != $m_again) {
      echo "<script>alert('Password Do Not Match!')</script>";
      exit();
    }
    if ($m_current == $m_pass) {
      echo "<script>alert('Enter a Different Password That is Not The Current One!')</script>";
      exit();
    }
    else {

    $update_pass = "update members set pass = '$m_pass' where email='$user'";

    $run_update = mysqli_query($con, $update_pass);

    if ($update_pass) {
      echo "<script>alert('Password Changed Successfully!')</script>";
      echo"<script>window.open('my_account.php','_self')</script>";
    exit();
  }
    }
    
  }


}
?>
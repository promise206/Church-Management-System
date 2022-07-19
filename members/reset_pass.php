<?php
session_start();
include("includes/db.php");
include("function/function.php");
?>

<! doctype html>
<html>
<head>
<title>St Pauls Church Ebenesi Nnobi</title>
<link rel="stylesheet" href="css/Bootstrap.min.css">
<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<body>
<?php
$con = mysqli_connect("localhost","root","","church");
?>
<!--MAIN CONTAINER START HERE-->
<div class="container padding-top-10">
<!--HEADER STARTS HERE-->
<div class="header_wrapper">

  
  <a href="member_register.php"><img id="logo" src="images/myshop.jpg" height="60%" width="30%" />
  
  <img id="banner" src="images/logo.jpg" height="60%" width="30%" />
  <img src="images/images_3.jpg" height="60%" width="25%" /></a>
    
<div class="menubar1">

  <div id="form">
            <form method="get" action="#" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="Search"/>
                <input type="submit" name="search" value="search"/>

            </form>

          </div>
  
    </div>
</div><!--HEADER ENDS HERE-->

     <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type=" button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="../index.php">Home</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        <li class="active"><a href="my_account.php">Profile<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="#">Contact<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="member_register.php">Sign Up<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="#">About Us<span class="sr-only">(current)</span></a></li>
        </ul>

    <ul class="nav navbar-nav navbar-right">

        <span style="float:right; font-size:18px ; padding:5px; line-height:40px ;">

        <?php loggled_user(); ?>
          
        </ul>
          
        </div>
        </div>
        
      </nav>
      
      
      <ul class="breadcrumb">
            <li><a href="../index.php">Home</a></li>
            <li class="active">Change Password</li>
        </ul>
        <div class="panel panel-default">
            <div class="panel-heading">
              Change Password
            </div>
            <div class="panel-body">
                <form action="reset_pass.php" method="post" enctype="multipart/form-data">

                <label for="m_email" class="control-label">Email Again:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="m_email" name="m_email" placeholder="" required>
                      </div>
                  </div>
                
                  <label for="m_pass" class="control-label">Enter a New Password:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-6">
                        <input type="password" class="form-control" id="m_pass" name="m_pass" placeholder="" required>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="m_again" class="control-label">Enter The Password Again:</label>
                      <input type="password" class="form-control" id="m_again" name="m_again" placeholder="" required>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2">
                        <button type="submit" name="reset_pass" class="btn btn-success">Submit</button>
                      </div>
                  </div>
                  <div>
                    <div class="col-md-6">
                    </div>
                  </div>
                </form>
            </div>
          
        </div>
<div class="panel-footer">
              <p style="text-align: center;">&copy; 2017 by www.stpaulsebenesi.com </p>
              <p style="text-align: center">designed by promzy tech</p>
        </div>
      </div>

<!--MAIN CONTAINER ENDS HERE-->
</body>


</html>
<?php
include("includes/db.php");

if(isset($_POST['reset_pass'])){

    $user = $_POST['m_email'];

    $m_pass = $_POST['m_pass'];
    $m_again = $_POST['m_again'];

    $sel_pass = "select * from members where  email = '$user'";
    $run_pass = mysqli_query($con, $sel_pass);
    $check_pass = mysqli_num_rows($run_pass);

    if ($m_pass != $m_again) {
      echo "<script>alert('Password Do Not Match!')</script>";
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
?>
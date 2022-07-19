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
            <li class="active">Password Recorvery</li>
        </ul>
        <div class="panel panel-default">
            <div class="panel-heading">
              Recover Your Password
            </div>
            <div class="panel-body">
                <form action="forgotten_pass.php" method="post" enctype="multipart/form-data">
                  <label for="m_email" class="control-label">Enter Your Email:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="m_email" name="m_email" placeholder="Email" required>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="m_number" class="control-label">Enter Your Phone Number:</label>
                      <input type="text" class="form-control" id="m_number" name="m_number" placeholder="Phone Number" required>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2">
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                      </div>
                  </div>
                  <div>
                    <div class="col-md-6">
                      <a href="member_register.php">Not Yet a Member</a><br>
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

if(isset($_POST['submit'])){
  $m_number = $_POST['m_number'];
  $m_email = $_POST['m_email'];
  $sel_m = "select * from members where phone_no = '$m_number' AND email = '$m_email'";

  $run_m = mysqli_query($con, $sel_m);


  $check_member = mysqli_num_rows($run_m);

  if($check_member==0) {

 echo "<script>alert('Phone Number or Email is incorrect, Try again!')</script>";
 exit();
  }

  echo "<script>window.open('reset_pass.php','_self')</script>";

}
?>


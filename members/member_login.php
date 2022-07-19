<?php
ob_start();
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
            <li class="active">Login</li>
        </ul>
        <div class="panel panel-default">
            <div class="panel-heading">
              Login
            </div>
            <div class="panel-body">
                <form action="member_login.php" method="post" enctype="multipart/form-data">
                  <label for="m_email" class="control-label">Email:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="m_email" name="m_email" placeholder="Email" required>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="m_pass" class="control-label">Password:</label>
                      <input type="Password" class="form-control" id="m_pass" name="m_pass" placeholder="*********" required>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2">
                        <button type="submit" name="login" class="btn btn-success">Login</button>
                      </div>
                  </div>
                  <div>
                    <div class="col-md-6">
                      <a href="member_register.php">Not Yet a Member</a><br>
                      <a href="forgotten_pass.php">Forgotten Password</a>
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
if(isset($_POST['login'])){

  $email = $_POST['m_email'];
  $m_email = strtolower($email);
  $m_pass = $_POST['m_pass'];

  $sel_m = "select * from members where pass = '$m_pass' AND email = '$m_email' ";

  $run_m = mysqli_query($con, $sel_m);
  $check_member = mysqli_num_rows($run_m);

  if($check_member==0) {

 echo "<script>alert('Password and email is incorrect, pls check your details and try again!')</script>";
 exit();
  }

  setcookie("email", $m_email, time() + (60*60*24*30), "/");

  echo "<script>alert('You logged in successfully, Thanks!')</script>";
  echo "<script>window.open('my_account.php','_self')</script>";

}

?>


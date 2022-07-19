<?php
//ignore warnings
error_reporting(E_ALL & ~E_NOTICE & ~8192);
//import db file
ob_start();
include('user.class.php');
include('email.class.php');
$db=new user();
$email = new email();

?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/Bootstrap.min.css">
<link href="default/style.css" rel="stylesheet" title="Style" />
	<title>Home Page</title>
</head>
<body>

<div class="header">
  <a href="homepage.php"><img src="default/images/logo1.png" alt="Members Area" /></a>
</div>

<!--MAIN CONTAINER START HERE-->
<div class="container padding-top-10">
   <div class="panel panel-default">
      <div class="panel-body">
          <div class="box">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 "><div class="grey-box">
              <div class="alert alert-success" role="alert"><b>MASSAGE SCHEDULING SYSTEM</b></div>
                <ul id="grey-box">
                    <!-- Getting users email -->
                     <?php if (isset($_COOKIE['email'])) { echo "<b>Welcome: <b>" . $_COOKIE['email']; } ?>
                 		<a href='homepage.php?compose'><button type='submit' name='details' class='btn btn-success'>Compose New Mail</button>
                    <!--<a href='#'><button type='submit' name='details' class='btn btn-success'>Manage Account</button><br>-->
                    <h4><a href ="inbox.php">Inbox<?php $user = $_COOKIE['email']; $email->get_total_new_email($user); ?></a><br></h4>
                    <h4><a href ="draft.php">Draft</a><br></h4>
                    <h4><a href ="sent.php">Sent</a><br></h4>
                    <h4><a href ="homepage.php?scheduler">Schedule Message</a><br></h4>
                    <h4><a href ="view_schedule.php">View Schedule</a><br></h4><br>
                    <span style="float:; font-size:18px ; padding:2px; line-height:5px ;">
                    <a href='logout.php?logout=".<?php echo $user ?>."'>Logout</a>
                </ul>
              </div>
            </div>
          </div>

          <?php
              
          if (isset($_GET['compose'])) {
            include("new.php");
          }
          if (isset($_GET['scheduler'])) {
            include("schedule_email.php");
          }
          if (isset($_GET['delete_account'])) {
            include("delete_account.php");
          }
          ?>
      </div>
    </div>
  <!-- Footer starts here -->
  <div class="panel-footer">
              <p style="text-align: center;">&copy; <?php echo date(Y) ?> by www.Rmail.com </p>
              <p style="text-align: center">designed by promzy tech</p>
  </div>
  <!-- Footer ends here -->
</div>
<!--MAIN CONTAINER ENDS HERE-->

</body>
</html>

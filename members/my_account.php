<?php
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
        <li class="active"><a href="#">About Us<span class="sr-only">(current)</span></a></li>

        <li class="dropdown">
            <a  class="dropbtn">Churches<span class="caret"></span></a>
            <div id="myDropdown" class="dropdown-content">
              <a href="../churches/stjohns.php">St John's Anglican Church Nnobi</a>
              <a href="#">All Saints Anglican Church Nnobi</a>
            </div>
          </li>
          
           <li class="dropdown">
            <a class="dropbtn">Schools<span class="caret"></span></a>
            <div id="myDropdown" class="dropdown-content">
              <a href="#">St Paul's Model</a>
              <a href="#">Zion Sec. School</a>
            </div>
          </li>

          <li class="dropdown">
            <a class="dropbtn">Payments<span class="caret"></span></a>
            <div id="myDropdown" class="dropdown-content">
              <a href="#">Make Donation</a>
              <a href="#">Pay Your Tithe</a>
            </div>
          </li>
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
            <li class="active">Profile</li>
        </ul>
        <div class="panel panel-default">
            <div class="panel-heading">
              <?php 
              if(isset($_COOKIE['email'])){
              echo $_COOKIE['email'];
              }
              ?>
            </div>
            <div class="panel-body">
              <div class="box">
                

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 "><div class="grey-box">
                  <div class="alert alert-danger" role="alert">My Account:</div>
                  <ul id="grey-box">
                    <?php
                    if (isset($_COOKIE['email'])) {
                      
                      $user = $_COOKIE['email'];
                      
                      $get_img = "select * from members where email='$user'";
                      $run_img = mysqli_query($con,$get_img);
                      $row_img = mysqli_fetch_array($run_img);
                      $m_id = $row_img['member_id'];
                      $m_image = $row_img['image'];
                      $m_firstName = $row_img['first_name'];
                      $m_lastName = $row_img['last_name'];
                      echo "<p style='text-align:center;'><img src='members_images/$m_image' width='200' height='200'/>";
                    }
                    ?>
                  </ul>
                    <h1><a href ="../message/index.php">Message</a><br></h1>
                    <h1><a href ="my_account.php?edit_account=<?php echo $m_id; ?>">Edit Account</a><br></h1>
                    <h1><a href ="my_account.php?change_pass">Change Password</a><br></h1>
                    <h1><a href ="my_account.php?delete_account">Delete Account</a><br></h1>
                    <?php
                    if(!isset($_COOKIE['email'])){
                        
                      }

                      else {
                        echo "<h1><a href='my_account.php?logout'>Logout</a><br></h1>";
                      }
                      ?>
                        

                  </div>
                </div>
              </div>

              

              <?php

              if (isset($_GET['edit_account']) || isset($_GET['change_pass']) || isset($_GET['inbox']) || isset($_GET['delete_account'])) {

                if (isset($_COOKIE['email'])) {
                 echo "<p style='padding: 5px; color: #2d5a64; text-align: center; font-size: 20px;''>Welcome: $m_firstName $m_lastName</p>
                 <br>
                 ";
              }
            }else{
              if (isset($_COOKIE['email'])) {
              echo "<p style='padding: 5px; color: #2d5a64; text-align: center; font-size: 20px;'>Welcome: $m_firstName $m_lastName</p>
              <br>
              <h2 style'text-align: center;'><a href='../message/homepage.php?compose'>Send Prayer Request</a><br></h2>
                 ";
               }
            }

              ?>

              <?php
              
              if (isset($_GET['edit_account'])) {
                include("edit_account.php");
              }
              if(isset($_GET['change_pass'])){
                include("change_pass.php");
              }
              if (isset($_GET['logout'])) {
                include("member_logout.php");
              }
              if (isset($_GET['delete_account'])) {
                include("delete_account.php");
              }
              ?>
                


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

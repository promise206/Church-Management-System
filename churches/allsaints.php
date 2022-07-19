<?php
session_start();

include("includes/db.php");
include("function/function.php");
?>

<! doctype html>
<html>
  <head>
    <title>DESIGN</title>
    <link rel="stylesheet" href="css/Bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/style.css" media="all"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<body>
<!--MAIN CONTAINER START HERE-->
<div class="container">
<!--HEADER STARTS HERE-->
<div class="header_wrapper">
  <a href="choir.php"><img id="logo" src="images/myshop.jpg" height="60%" width="30%" />
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
          <a class="navbar-brand" href="index.php">Home</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
          <li class="active"><a href="#">Profile<span class="sr-only">(current)</span></a></li>
          <li class="active"><a href="#">Contact<span class="sr-only">(current)</span></a></li>
          <li class="active"><a href="#">About Us<span class="sr-only">(current)</span></a></li>

          <li class="dropdown">
            <a  class="dropbtn">Churches<span class="caret"></span></a>
            <div id="myDropdown" class="dropdown-content">
              <a href="churches/stjohns.php">St John's Anglican Church Nnobi</a>
              <a href="churches/allsaints.php">All Saints Anglican Church Nnobi</a>
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
            <li class="active">All Saints Anglican Church Ifite Nnobi</li>
        </ul>
        <div class="panel panel-default">
            <div class="panel-heading">
              All Saints
            </div>
             

             <div class="editBox">
                <div class="form-box">
                
              <h1 style="text-align: center; color: #46594c;font-size: 20px; font-weight: bolder;"> Brief History</h1>

             <h1 style="text-align: left; padding: 50px; padding: 50;"><?php ;  ?></h1>

              </div>
             
             
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
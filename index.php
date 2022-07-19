<?php
  session_start();

  include("includes/db.php");
  include("function/function.php");
?>

<! doctype>
<html>
<html>
<head>
    <title>St Pauls Church Ebenesi Nnobi</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
    
    <a href="index.php"><img id="logo" src="images/myshop.jpg" height="60%" width="30%" />
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
          <li class="active"><a href="members/my_account.php">Profile<span class="sr-only">(current)</span></a></li>
          <li class="active"><a href="#">Contact<span class="sr-only">(current)</span></a></li>
          <li class="active"><a href="#">About Us<span class="sr-only">(current)</span></a>
          </li>
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
    </nav>
      
        
     <div class="panel-body">
              <div class="box">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 "><div class="grey-box">
            <div class="sidebar_title1 alert-danger" role="alert">ORGANISATIONS</div>
               <a href ="choir.php">CHOIR</a><br>
               <a href ="#">MOTHER'S UNION</a><br>
               <a href ="#">MEN'S UNION</a><br>
              <a href ="#">GIRL'S GUILD</a><br>
               <a href ="youth.php">AYF</a><br>
               <a href ="#">ACM</a><br>

            <div class="sidebar_title2 alert-danger" role="alert">INDIGENOUS CLERGY & CHATCHIST</div>
            <a href ="indworkers/view_bishops.php">BISHOP'S</a><br>
            <a href ="indworkers/view_vens.php">VENERABLES</a><br>
            <a href ="indworkers/view_revs.php">REVEREND'S</a><br>
            <a href ="indworkers/view_pastors.php">CHATCHISTS</a>

          <div class="sidebar_title2 alert-danger" role="alert">NON-INDIGENOUS CLERGY & CHATCHIST</div>  
              <a href ="workers/view_prists.php">VICAR'S</a><br>
              <a href ="workers/view_pastors.php">CHATCHISTS</a>
      </div>
      </div>
      </div>
      

      <div class="outerbox">
      
        <div class="col-xm-12">
            <div id="my-slider" class="carousel slide" data-ride="carousel">
              

              <ol class="carousel-indicators">
                <li data-target="#my-slider" data-slide-to="0" class="active"></li>
                <li data-target="#my-slider" data-slide-to="1" ></li>
                <li data-target="#my-slider" data-slide-to="1" ></li>
              </ol>
                
              <div class="carousel-inner" role="listbox">
                <div class="item active">

                  <?php  slider(); ?>
                  <div class="carousel-caption">
                    <?php 

                      $get_slider = "select * from slider LIMIT 0,10";

  $run_slider = mysqli_query($con, $get_slider);


  $row_slider = mysqli_fetch_array($run_slider);
    $slider_id = $row_slider['slider_id'];
    $slider_title = $row_slider['slider_title'];


    echo "<div class='slider-title'>
     <a href ='workers/view_pastors.php'>$slider_title</a> 
     </div>";
  

                     ?>
                  </div>
                  
                </div>
              </div>
            <a class="left carousel-control" href="#<?php echo $slider_id ?>" role="button" onclick="plusIndex(-1)" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
              </a>

              <a class="right carousel-control" href="#<?php echo $slider_id ?>" role="button" onclick="plusIndex(1)" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
              </a>
            </div>
        
      </div>
          
      </div>

      </div>

      <div class="well well-lg">
<div class="collect alert-default" role="alert">
<p align="left">Collect For The Week:</p>
                    <?php getCollect(); ?> </div>
          <h2 style="text-align: left;">Liturge color:<h2 style="color:green;">Green</h2></h2>
</div>
      <div class="BOX">
        <div class="row">

            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 "><div class="g-box"><?php getCurrentVicar();  ?></div></div>
              <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 "><div class="g-box"><?php  getCurrentCatchist() ?></div></div>
              <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 "><div class="g-news"><div class="title">Notices</div><?php  getNotices(); ?>
              <div class="btn">
              </div></div>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 "><div class="g-news"><div class="title"><?php getMonth() ?> Birthday's</div><?php  birthday(); ?></div></div>

            </div>
            </div>
        <div class="panel-footer">
        <div class="facebook">
              <h1 style="color: blue;">Your can visit our<b> facebook/twiter</b><a href="#"><img src="images/facebooke.jpg" width="30px" height="30px"></a>
              <a href="#"><img src="images/twiter.jpg" width="25px" height="25px"></a></h1>
          
        </div>
              <p style="text-align: center;">&copy; 2017 by www.stpaulsebenesi.com </p>
              <p style="text-align: center">designed by promzy tech</p>
              
        </div>
        </div>


<!--MAIN CONTAINER ENDS HERE-->
</body>

<script>
  
  var index = 1;

function plusIndex(n){
  index = index + 1;
  showImage(index);
}
 
showImage(1);

function showImage(n){
  var i;
  var x = document.getElementsByClassName("slides");
  if (n>x.length) { index = 1};
    if (n<1) { index = x.length};
      for (i = 0;i<x.length; i++) {
        x[i].style.display = "none";
      }
    x[index-1].style.display = "block";
    }

autoSlide();
function autoSlide(){
  var i;
  var x = document.getElementsByClassName("slides");
  for (i = 0;i<x.length; i++) {
    x[i].style.display = "none";
  }
    if(index > x.length){ index = 1}
      x[index-1].style.display = "block";
    index++;
    setTimeout(autoSlide, 4000);

}



</script>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>

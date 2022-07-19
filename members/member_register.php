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
            <li class="active">Registration</li>
        </ul>
        <div class="panel panel-default">
            <div class="panel-heading">
              Registration
            </div>
            <div class="panel-body">
                <form action="member_register.php" method="post" enctype="multipart/form-data">
                  <label for="m_firstname" class="control-label">First Name:</label>
                  <div class="row">
                      <div class="col-md-6 padding-top-10">
                          <input type="text" class="form-control" name="m_firstname" id="m_firstname" placeholder="First Name" required/>
                      </div>
                      <div class="col-md-6 padding-top-10">
                          <input type="text" class="form-control" name="m_lastname" id="m_lastname" placeholder="Last Name" required>
                      </div>
                  </div>
                  <label for="m_email" class="control-label">Email:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-12">
                        <input type="text" class="form-control" id="m_email" name="m_email" placeholder="Email" required>
                      </div>
                  </div>
                  <label for="m_address" class="control-label">Address:</label>
                  <div class="row padding-top-10">
                     <div class="col-md-12">
                        <input type="text" class="form-control" id="m_address" name="m_address" placeholder="Address" required>
                     </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="m_mobile" class="control-label">Phone Number:</label>
                      <input type="text" class="form-control" id="m_mobile" name="m_mobile" placeholder="Phone Number" required>
                    </div>
                    <div class="col-md-2 padding-top-10">
                      <label for="m_pass" class="control-label">Password:</label>
                      <input type="Password" class="form-control" id="m_pass" name="m_pass" placeholder="*********" required>
                    </div>
                    <div class="col-md-2 padding-top-10">
                      <label for="m_again" class="control-label">Password Again:</label>
                      <input type="Password" class="form-control" id="m_again" name="m_again" placeholder="*********" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="m_date" class="control-label">Date Of Birth:</label>
                      <input type="date" class="form-control" id="m_date" name="m_date" placeholder="" required>
                    </div>
                    <div class="col-md-6 padding-top-10">
                      <label for="m_gender" class="control-label">Gender:</label>
                      <input type="radio" name="m_gender" checked value="Male">Male
                      <input type="radio" name="m_gender" value="Female">Female
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="m_image" class="control-label">Image:</label>
                      <input type="file" class="form-control" id="m_image" name="m_image" placeholder="" required>
                    </div>
                    <div class="col-md-2 padding-top-10">
                      <label for="m_country" class="control-label">Country:</label>
                      <select name="m_country" id="m_country" class="form-control">
                         <option>Country</option>
                        <option>Nigeria</option>
                         <option>Ghana</option>
                          <option>South Africa</option>
                           <option>Algeria</option>
                            <option>Malaysia</option>
                             <option>Cotonu</option>
                         </select>
                    </div>
                    <div class="col-md-2 padding-top-10">
                      <label for="m_state" class="control-label">State:</label>
                      <select name="m_state" id="m_state" class="form-control">
                       <option>State</option>
                         <option>Anambra</option>
                         <option>Lagos</option>
                         <option>Imo</option>
                         <option>Calabar</option>
                         <option>Port Harcourt</option>
                         <option>Abia</option>
                     </select>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2">
                        <button type="submit" name="register" class="btn btn-success">Register</button>
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
      if(isset($_POST['register'])){


        $m_firstname = $_POST['m_firstname'];
        $m_lastname = $_POST['m_lastname'];
        $m_email = $_POST['m_email'];
        $m_address = $_POST['m_address'];
        $m_mobile = $_POST['m_mobile'];
        $m_pass = $_POST['m_pass'];
        $m_passlength = strlen($m_pass);
        $m_again = $_POST['m_again'];
        $m_gender = $_POST['m_gender'];
        $m_date = $_POST['m_date'];
        $m_image = $_FILES['m_image']['name'];
        $m_image_tmp = $_FILES['m_image']['tmp_name'];
        $m_image_size = $_FILES['m_image']['size'];
        $max_image_size = 2097152;
        $m_image_type = strtolower($_FILES['m_image']['type']);
        $m_country = $_POST['m_country'];
        $m_state = $_POST['m_state'];
        $extension = strtolower(substr($m_image, strpos($m_image, '.')+1));


        $sel_m = "select * from members where email = '$m_email' ";

        $run_m = mysqli_query($con, $sel_m);


        $check_member = mysqli_num_rows($run_m);

        if($check_member>0) {

          echo "<script>alert('email already exist!')</script>";
          exit();
        }

        elseif($m_pass != $m_again){
          echo "<script>alert('The Password Does Not Match')</script>";
          exit();
        }

      if (isset($m_image)) {
        if(!empty($m_image)){
          if (($extension=='jpg' || $extension=='jpeg' || $extension=='png') && ($m_image_type=='image/png' || $m_image_type=='image/jpeg' || $m_image_type=='image/jpg') && $m_image_size<$max_image_size ) {

            

              if(move_uploaded_file($m_image_tmp,"members_images/$m_image")){

                $insert_c = "insert into members
                (first_name, last_name, email, address, phone_no, pass, gender, date, image, country, state) VALUES ('$m_firstname','$m_lastname','$m_email','$m_address','$m_mobile','$m_pass','$m_gender','$m_date','$m_image','$m_country','$m_state')";

                $run_c = mysqli_query($con, $insert_c);

                  if($run_c){

                    echo"<script>alert('registration successful!')</script>";
                    echo"<script>window.open('../index.php','_self')</script>";
                    exit();
                  }
              }
          }
          echo"<script>alert('File must be jpg/jpeg/png and must be 2mb or less !!')</script>";
        }
      }
    }
?>
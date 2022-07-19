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
<div>
<!--HEADER STARTS HERE-->

        <div class="panel panel-default">
            <div class="panel-heading">
              Insert Slider
            </div>
            <div class="panel-body">
                <form action="" method="post" enctype="multipart/form-data">
                  <label for="slider_title" class="control-label">Slider Title:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="slider_title" name="slider_title" placeholder="Slider Title" required>
                      </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="slider_image" class="control-label">Slider Image:</label>
                      <input type="file" class="form-control" id="slider_image" name="slider_image" placeholder="" required>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2">
                        <button type="submit" name="insert_slider" class="btn btn-success">Insert</button>
                      </div>
                  </div>
                </form>
            </div>
          
        </div>
      </div>


<!--MAIN CONTAINER ENDS HERE-->
</body>


</html>
<?php
      if(isset($_POST['insert_slider'])){

        $slider_title = $_POST['slider_title'];
        $slider_image = $_FILES['slider_image']['name'];
        $slider_image_tmp = $_FILES['slider_image']['tmp_name'];
        $slider_image_size = $_FILES['slider_image']['size'];
        $max_image_size = 2097152;
        $slider_image_type = strtolower($_FILES['slider_image']['type']);
        $extension = strtolower(substr($slider_image, strpos($slider_image, '.')+1));



        $sel_slider = "select * from slider where slider_image = '$slider_image' ";

        $run_slider = mysqli_query($con, $sel_slider);


        $check_slider = mysqli_num_rows($run_slider);

        if($check_slider>0) {

          echo "<script>alert('Slider Already Exist!')</script>";
          exit();
        }

      if (isset($slider_image)) {
        if(!empty($slider_image)){
          if (($extension=='jpg' || $extension=='jpeg' || $extension=='png') && ($slider_image_type=='image/png' || $slider_image_type=='image/jpeg' || $slider_image_type=='image/jpg') && $slider_image_size<$max_image_size ) {

            if(move_uploaded_file($slider_image_tmp,"slider_images/$slider_image")){

              $insert_slider = "insert into slider
              (slider_title, slider_image) VALUES ('$slider_title', '$slider_image')";

              $run_slider = mysqli_query($con, $insert_slider);

                if($run_slider){

                  echo"<script>alert('Inserted successful!')</script>";
                  echo"<script>window.open('index.php?insert_slider','_self')</script>";
                  exit();
                }
            }
          }
          echo"<script>alert('File must be jpg/jpeg/png and must be 2mb or less !!')</script>";
          echo"<script>window.open('index.php?insert_slider','_self')</script>";
        }
      }
    }
?>
<?php
include("includes/db.php");
if (isset($_GET['edit_slider'])) {
	$get_id = $_GET['edit_slider'];
	$get_slider = "select * from slider where slider_id = '$get_id'";

	$run_slider = mysqli_query($con, $get_slider);

	$row_slider= mysqli_fetch_array($run_slider);

		$slider_title = $row_slider['slider_title'];
		$slider_id = $row_slider['slider_id'];
		$slider_image = $row_slider['slider_image'];
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Update Slider</title>
		<link rel="stylesheet" href="css/Bootstrap.min.css">
<link rel="stylesheet" href="styles/style.css" media="all"/>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>
    	tinymce.init({selector:'textarea'});
    </script>
	</head>
<body>
<div >
	<div class="panel panel-default">
            <div class="panel-heading">
              Update Slider
            </div>
       <div class="panel-body">

<form action="" method="POST" enctype="multipart/form-data">
                  
                  <label for="title" class="control-label">Title:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-6">
                        <textarea type="text" class="form-control" id="title" name="title" placeholder="" style="height: 200px; background-color: #ebd1f2;" required ><?php  echo $slider_title; ?></textarea>
                      </div>
                  </div>
                <label for="title" class="control-label">Name:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-6">
                          <input type="text" name="name" placeholder="" value="<?php  echo $slider_image ?>" class="form-control" id="name">
                      </div>
                  </div>
                
                  <div class="row">
                      <div class="col-md-2">
                        <button type="submit" name="update_slider" class="btn btn-success" value="Update Slider">Update</button>
                      </div>
                  </div>
                </form>

			</div>
		</div>
	</div>
</body>
</html>

<?php
 if(isset($_POST['update_slider']) && $_POST['update_slider']=="Update Slider"){
 	$slider_title = $_POST['title'];
 	$slider_name = $_POST['name'];
 	$slider_id = $get_id;
				 	$update_slider = "update slider set slider_title = '$slider_title',slider_image = '$slider_name' where slider_id = '$get_id'";

				 	echo $run_slider = mysqli_query($con,$update_slider);

				 		if($run_slider){

						 	echo "<script>alert('Slider Updated successfull!')</script>";
						 	echo"<script>window.open('index.php?view_sliders','_self')</script>";
						 	exit();
						 	//echo"<script>window.open('choir.php','_self')</script>";
					 	}
						echo "<script>alert('Slider Not Updated!')</script>";
						exit();


  }

?>



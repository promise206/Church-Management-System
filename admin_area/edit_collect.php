<?php
include("includes/db.php");
if (isset($_GET['edit_collect'])) {
	$get_id = $_GET['edit_collect'];
	$get_collect = "select * from collect where collect_id = '$get_id'";

	$run_collect = mysqli_query($con, $get_collect);

	$row_collect = mysqli_fetch_array($run_collect);

		$collect = $row_collect['collect'];
		$collect_id = $row_collect['collect_id'];
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Update Collect</title>
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
              Update Collect For The week
            </div>
       <div class="panel-body">

<form action="" method="POST" enctype="multipart/form-data">
                  
                  <label for="title" class="control-label">Collect:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-6">
                        <textarea type="text" class="form-control" id="collect" name="collect" placeholder="" style="height: 200px; background-color: #ebd1f2;" required ><?php  echo $collect; ?></textarea>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2">
                        <button type="submit" name="update_collect" class="btn btn-success" value="Update Collect">Update</button>
                      </div>
                  </div>
                </form>

			</div>
		</div>
	</div>
</body>
</html>

<?php
 if(isset($_POST['update_collect']) && $_POST['update_collect']=="Update Collect"){
 	$collect = $_POST['collect'];
 	$collect_id = $get_id;
				 	$update_collect = "update collect set collect = '$collect' where collect_id = '$get_id'";

				 	echo $run_collect = mysqli_query($con,$update_collect);

				 		if($run_collect){

						 	echo "<script>alert('collect Updated successfull!')</script>";
						 	echo"<script>window.open('index.php?view_collects','_self')</script>";
						 	exit();
						 	//echo"<script>window.open('choir.php','_self')</script>";
					 	}
						echo "<script>alert('Collect Not Updated!')</script>";
						exit();


  }

?>



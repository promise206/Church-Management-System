<?php
include("includes/db.php");

?>

<!DOCTYPE html>
<html>
	<head>
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>
    	tinymce.init({selector:'textarea'});
    </script>
		<title>Inserting Collect</title>
		<link rel="stylesheet" href="css/Bootstrap.min.css">
<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>
<body>
<div >
	<div class="panel panel-default">
            <div class="panel-heading">
              Insert Collect For The week
            </div>
       <div class="panel-body">

<form action="" method="POST" enctype="multipart/form-data">
                  
                  <label for="title" class="control-label">Collect:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-6">
                        <textarea type="text" class="form-control" id="collect" name="collect" placeholder="" style="height: 200px; background-color: #ebd1f2;" required></textarea>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2">
                        <button type="submit" name="insert_collect" class="btn btn-success" value="Insert Collect">INSERT</button>
                      </div>
                  </div>
                </form>

			</div>
		</div>
	</div>
</body>
</html>

<?php
 if(isset($_POST['insert_collect']) && $_POST['insert_collect']=="Insert Collect"){
 	$collect = $_POST['collect'];

				 	$insert_collect = "insert into collect (collect) VALUES ('$collect')";

				 	$run_collect = mysqli_query($con,$insert_collect);

				 		if($run_collect){

						 	echo "<script>alert('collect Inserted successfull!')</script>";
						 	echo"<script>window.open('index.php?view_collects','_self')</script>";
						 	exit();
						 	//echo"<script>window.open('choir.php','_self')</script>";
					 	}
						echo "<script>alert('Collect Not Inserted!')</script>";
						exit();


  }

?>



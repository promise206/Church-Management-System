<?php
include("includes/db.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Inserting Notice</title>
		<link rel="stylesheet" href="css/Bootstrap.min.css">
<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>
<body>
<div class="">
	<div class="panel panel-default">
            <div class="panel-heading">
              Insert Notice
            </div>
       <div class="panel-body">

<form action="" method="POST" enctype="multipart/form-data">
                  <label for="title" class="control-label">Title of Notice:</label>
                  <div class="row padding-top-10">
                  	<div class="col-md-6">
                  		<input class="form-control" type="text" name="title" id="title" placeholder="Title" required>
                  	</div>
                  </div>

                  <label for="notice" class="control-label">Body of Notice:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-6">
                        <textarea type="text" class="form-control" id="collect" name="collect" placeholder="" style="height: 200px; background-color: #ebd1f2;" required></textarea>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2">
                        <button type="submit" name="insert_notice" class="btn btn-success" value="Insert Notice">INSERT</button>
                      </div>
                  </div>
                </form>

			</div>
		</div>
	</div>
</body>
</html>

<?php
 if(isset($_POST['insert_notice']) && $_POST['insert_notice']=="Insert Notice"){
 	$title = $_POST['title'];
  $notice = $_POST['notice'];

				 	$insert_notice = "insert into notices (notices_title, notices_body) VALUES ('$title', '$notice')";

				 	$run_notice = mysqli_query($con,$insert_notice);

				 	if($run_notice){

					echo "<script>alert('Notice Inserted successfull!')</script>";
          echo"<script>window.open('index.php?insert_notices','_self')</script>";
					exit();
					}
				  echo "<script>alert('Notice Not Inserted!')</script>";
					exit();
          echo"<script>window.open('index.php?insert_notices','_self')</script>";
  }

?>



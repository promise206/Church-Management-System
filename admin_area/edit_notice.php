<?php
include("includes/db.php");
if (isset($_GET['edit_notice'])) {
	$get_id = $_GET['edit_notice'];
	$get_notice = "select * from notices where notices_id = '$get_id'";

	$run_notice = mysqli_query($con, $get_notice);

	$row_notice = mysqli_fetch_array($run_notice);

		$notice_title = $row_notice['notices_title'];
		$notice_id = $row_notice['notices_id'];
		$notices_body = $row_notice['notices_body'];
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Updating Notice</title>
		<link rel="stylesheet" href="css/Bootstrap.min.css">
<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>
<body>
<div class="">
	<div class="panel panel-default">
            <div class="panel-heading">
              Update Notice
            </div>
       <div class="panel-body">

<form action="" method="POST" enctype="multipart/form-data">
                  <label for="title" class="control-label">Title of Notice:</label>
                  <div class="row padding-top-10">
                  	<div class="col-md-6">
                  		<input class="form-control" type="text" name="title" id="title" placeholder="Title" required value="<?php  echo $notice_title; ?>">
                  	</div>
                  </div>
                  <label for="notice" class="control-label">Body of Notice:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-6">
                        <textarea type="text" class="form-control" id="notice" name="notice" placeholder="" style="height: 200px; background-color: #ebd1f2;"><?php echo $notices_body; ?></textarea>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2">
                        <button type="submit" name="update_notice" class="btn btn-success" value="Update Notice">Update</button>
                      </div>
                  </div>
                </form>

			</div>
		</div>
	</div>
</body>
</html>

<?php
 if(isset($_POST['update_notice']) && $_POST['update_notice']=="Update Notice"){

 	$notices_id = $get_id;
 	$notices_title = $_POST['title'];
  $notices_body = $_POST['notice'];

				 	$update_notice = "update notices set notices_title = '$notices_title', notices_body = '$notices_body' where notices_id = '$notices_id'";

				 	$run_notice = mysqli_query($con,$update_notice);

				 	if($run_notice){

					echo "<script>alert('Notice Updated successfull!')</script>";
          echo"<script>window.open('index.php?view_notices','_self')</script>";
					exit();
					}
				  echo "<script>alert('Notice Not Updated!')</script>";
					exit();
          echo"<script>window.open('index.php?insert_notices','_self')</script>";
  }

?>



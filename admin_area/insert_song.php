<?php
include("includes/db.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Uploading Songs</title>
		<link rel="stylesheet" href="css/Bootstrap.min.css">
<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>
<body>
<div >
	<div class="panel panel-default">
            <div class="panel-heading">
              Uploading Songs
            </div>
       <div class="panel-body">

<form action="" method="POST" enctype="multipart/form-data">
                  <label for="song" class="control-label">Music:</label>
                  <div class="row">
                      <div class="col-md-6 padding-top-10">
                          <input type="file" class="form-control" name="song" id="song" placeholder="" required />
                      </div>
                  </div>
                  <label for="title" class="control-label">Title:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="artist" class="control-label">Artist:</label>
                      <input type="text" class="form-control" id="artist" name="artist" placeholder="Artist">
                    </div>
                   </div>
                  <div class="row">
                      <div class="col-md-2">
                        <button type="submit" name="insert_song" class="btn btn-success" value="Upload Audio">UPLOAD</button>
                      </div>
                  </div>
                </form>
			</div>
		</div>
	</div>
</body>
</html>

<?php
 if(isset($_POST['insert_song']) && $_POST['insert_song']=="Upload Audio"){
 	$artist = $_POST['artist'];
 	$title = $_POST['title'];
 	$song = $_FILES['song']['name'];
 	$type = strtolower($_FILES['song']['type']);
 	$size = $_FILES['song']['size'];
 	$max_size = 2097152;
 	$extension = strtolower(substr($song, strpos($song, '.')+1));
		$sel_s = "select * from songs where song = '$song' ";
        $run_s = mysqli_query($con, $sel_s);
        $check_song = mysqli_num_rows($run_s);
        if($check_song>0) {
          echo "<script>alert('song already exist!')</script>";
          exit();
        }
 	if (isset($song)) {
 		if (!empty($song)) {
 			if (($extension=='mp3' || $extension=='m4a') && ($type=='audio/mp3' || $type=='audio/mpeg' || $type=='audio/mp4') && ($size<$max_size || $size!=0)){
			 	$dir='audios/';
			 	$audio_path=$dir.basename($song);
			 	if (move_uploaded_file($_FILES['song']['tmp_name'],$audio_path)) {
				 	$insert_song = "insert into songs (song_title, song_artist, song) VALUES ('$title', '$artist','$song')";
				 	$run_song = mysqli_query($con,$insert_song);
				 		if($run_song){
						 	echo "<script>alert('song uploaded successfull!')</script>";
              echo"<script>window.open('index.php?insert_song','_self')</script>";
						 	exit();
						 	//echo"<script>window.open('choir.php','_self')</script>";
					 	}
						echo "<script>alert('Details Not Captured!')</script>";
            echo"<script>window.open('index.php?insert_song','_self')</script>";
						exit();
				}
			}
			echo "<script>alert('song must be mp3/m4a and must be 2mb or less !')</script>";
      echo"<script>window.open('index.php?insert_song','_self')</script>";
		}
 	}
}
?>
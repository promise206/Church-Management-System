<?php
include("includes/db.php");
if (isset($_GET['edit_song'])) {
  $get_id = $_GET['edit_song'];
  $get_song = "select * from songs where song_id = '$get_id'";
  $run_song = mysqli_query($con, $get_song);
  $row_song = mysqli_fetch_array($run_song);
    $song = $row_song['song'];
    $song_id = $row_song['song_id'];
    $song_title = $row_song['song_title'];
    $song_artist = $row_song['song_artist'];
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit Songs</title>
		<link rel="stylesheet" href="css/Bootstrap.min.css">
<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>
<body>
<div >
	<div class="panel panel-default">
            <div class="panel-heading">
              Editing Songs
            </div>
       <div class="panel-body">

<form action="" method="POST" enctype="multipart/form-data">
                  <label for="song" class="control-label">Music:</label>
                  <div class="row">
                      <div class="col-md-6 padding-top-10">
                          <input type="file" class="form-control" name="song" id="song" placeholder="" required value="<?php  echo $song; ?>" />
                      </div>
                  </div>
                  <label for="title" class="control-label">Title:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php  echo $song_title; ?>">
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="artist" class="control-label">Artist:</label>
                      <input type="text" class="form-control" id="artist" name="artist" placeholder="Artist" value="<?php  echo $song_artist; ?>">
                    </div>
                   </div>
                  <div class="row">
                      <div class="col-md-2">
                        <button type="submit" name="update_song" class="btn btn-success" value="Update Audio">UPLOAD</button>
                      </div>
                  </div>
                </form>

			</div>
		</div>
	</div>
</body>
</html>

<?php
 if(isset($_POST['update_song']) && $_POST['update_song']=="Update Audio"){
  $update_id = $get_id;
 	$artist = $_POST['artist'];
 	$title = $_POST['title'];
 	$song = $_FILES['song']['name'];
 	$type = strtolower($_FILES['song']['type']);
 	$size = $_FILES['song']['size'];
 	$max_size = 2097152;
 	$extension = strtolower(substr($song, strpos($song, '.')+1));
 	

 	if (isset($song)) {
 		if (!empty($song)) {
 			if (($extension=='mp3' || $extension=='m4a') && ($type=='audio/mp3' || $type=='audio/mpeg' || $type=='audio/mp4') && ($size<$max_size || $size!=0)){


			 	$dir='audios/';
			 	$audio_path=$dir.basename($song);

			 	if (move_uploaded_file($_FILES['song']['tmp_name'],$audio_path)) {


				 	$update_song = "update songs set song_title='$title',song_artist='$artist',song='$song' where song_id = '$update_id'";

				 	$run_song = mysqli_query($con,$update_song);

				 		if($run_song){

						 	echo "<script>alert('song Updated successfull!')</script>";
              echo"<script>window.open('index.php?view_songs','_self')</script>";
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




<link rel="stylesheet" href="styles/choir.css" media="all"/>
<?php
//getting the collects
include("includes/db.php");

function getCollect(){

	global $con;

	$get_collect = "select * from collect";

	$run_collect = mysqli_query($con, $get_collect);


	while ($row_collect = mysqli_fetch_array($run_collect)) {
		$collect = $row_collect['collect'];

		echo "<h1>$collect</h1>";
	}
}


function getCurrentVicar(){

	global $con;
	$get_cat = "REVEREND";

	$get_vicar = "select * from current_workers where worker_cat = '$get_cat'";

	$run_vicar = mysqli_query($con, $get_vicar);


	while ($row_vicar = mysqli_fetch_array($run_vicar)) {
		$prist_id = $row_vicar['worker_id'];
		$prist_firstname = $row_vicar['worker_firstname'];
		$prist_lastname= $row_vicar['worker_lastname'];
		
		$prist_image = $row_vicar['worker_image'];


echo "
				<div class='row'>

				<div class='col-md-12'>

          <div class='title'>Vicar:<br>$prist_firstname
				$prist_lastname</div>
          
        </div>


<img src='workers/images/$prist_image' width='150' height='150' />
				
			<a href='workers/detail.php?view_prist=$prist_id'><button type='submit' name='details' class='btn btn-success'>details</button>
</a>
				
				</div>";


			}
		}



function getCurrentCatchist(){

	global $con;
	$get_cat = "CHATCHIST";
	$get_chatchist = "select * from current_workers where worker_cat = '$get_cat'";

	$run_chatchist = mysqli_query($con, $get_chatchist);


	while ($row_chatchist = mysqli_fetch_array($run_chatchist)) {
		$chatchist_id = $row_chatchist['worker_id'];
		$chatchist_firstname = $row_chatchist['worker_firstname'];
		$chatchist_lastname= $row_chatchist['worker_lastname'];
		$chatchist_image = $row_chatchist['worker_image'];


echo "


		<div class='row'>

				<div class='col-md-12'>

				<div class='title'>Chatchist:<br>$chatchist_firstname
				$chatchist_lastname</div>
          
          
        </div>

				

				<img src='workers/images/$chatchist_image' width='150' height='150' />
				
			<a href='workers/detail.php?view_pastor=$chatchist_id'><button type='submit' name='details' class='btn btn-success'>details</button>
</a>
				</div>";
			}
		}


function songs(){

	global $con;

	$get_songs = "select * from songs LIMIT 0,15 ";

	$run_songs = mysqli_query($con, $get_songs);

	$count = 0;

	while ($row_song = mysqli_fetch_array($run_songs)) {
		$song_title = $row_song['song_title'];
		$song_artist = $row_song['song_artist'];
		$song = $row_song['song'];

		echo $count+=1;
		echo ".";
		echo '<a href="admin_area/play.php?name=audios/'.$song.'">'.$song.'</a>';
		echo '<br/>';


			}
		}

function memberImage()
{
	$user = $_COOKIE['email'];
	$get_image = "SELECT * FROM members WHERE email = '$user'";
	$run_image = mysqli_query($con, $get_image);
	$row_image = mysqli_fetch_array($run_image);
	$m_image = $row_image['image'];

	echo "<img src = 'members/members_images/$m_image' height = '150' width = '150'";
}

/*function song(){
$directory = 'MUSIC';
	if ($handle = opendir($directory.'/')){
		
		while ($file = readdir($handle)) {
			if ($file != '.' && $file != '..') {
				echo '<a href="'.$directory.'/'.$file.'">'.$file.'</a><br>';
			}
		}
	}
}*/
function loggled_user(){
if(isset($_COOKIE['email'])){
echo "<b>Welcome:<b>" . $_COOKIE['email'] . "<b style ='color:yellow;'> Your </b>";
}
else{

  echo "<b> Welcome Guest:</b>";
  }


if(!isset($_COOKIE['email'])){

	echo "<a href='members/member_register.php'><b>SignUp</b></a>";
  echo "<a href='members/member_login.php'><b> Login</b></a>";
}

else {
  echo "<a href='members/member_logout.php'>Logout</a>";
}
}

function youth(){
	$count = 1;
$handle = file('youth.txt');
	$handle_count = count($handle);
	foreach ($handle as $fname) {
		echo trim($fname);
	}
}

function slider(){

	global $con;

	$get_slider = "select * from slider LIMIT 0,10";

	$run_slider = mysqli_query($con, $get_slider);


	while ($row_slider = mysqli_fetch_array($run_slider)) {
		$slider_id = $row_slider['slider_id'];
		$slider_title = $row_slider['slider_title'];
		$slider_image = $row_slider['slider_image'];

		echo "
				<div id = 'outerbox'>
				<img class='slides' src='admin_area/slider_images/$slider_image' width='180' height='180' />
				</div>";
	}

	echo "
<div id = 'outerbox'>
	<button class='btn' onclick='plusIndex(-1)'' id='btn1' >&#10094;</button>
    <button class='btn' onclick='plusIndex(1)'' id='btn2'>&#10095;</button>
</div>
          ";
}

function getNotices(){

	global $con;

	$get_notice = "select * from notices";

	$run_notice = mysqli_query($con, $get_notice);


	while ($row_notice = mysqli_fetch_array($run_notice)) {
		$notice_id = $row_notice['notices_id'];
		$notice_title = $row_notice['notices_title'];
		$notice_body = $row_notice['notices_body'];


echo "
	<a href='notice.php?notices_id=$notice_id'>$notice_title<br></a>
			";
			}
		}


		
?>
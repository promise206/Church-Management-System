
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


function getPrists(){

	global $con;

	$get_prists = "select * from prists LIMIT 0,10";

	$run_prists = mysqli_query($con, $get_prists);


	while ($row_prists = mysqli_fetch_array($run_prists)) {
		$prist_id = $row_prists['prist_id'];
		$prist_firstname = $row_prists['first_name'];
		$prist_lastname= $row_prists['last_name'];
		$prist_yearentered = $row_prists['year_entered'];
		$prist_yearleft = $row_prists['year_left'];
		$prist_image = $row_prists['image'];

		echo "
				<div id = 'all_workers'>

				$prist_firstname
				$prist_lastname<br>

				<img src='images/$prist_image' width='180' height='180' />

				<p><b><h1>FROM $prist_yearentered TO $prist_yearleft</h1></b></p>

				<a href='detail.php?view_prist=$prist_id'><button type='submit' name='details' class='btn btn-success'>details</button>
</a>
				

				</div>";
	
	}
}



function getCurrentVicar(){

	global $con;

	$get_vicar = "select * from prists where prist_id = 5";

	$run_vicar = mysqli_query($con, $get_vicar);


	while ($row_vicar = mysqli_fetch_array($run_vicar)) {
		$prist_id = $row_vicar['prist_id'];
		$prist_firstname = $row_vicar['first_name'];
		$prist_lastname= $row_vicar['last_name'];
		
		$prist_image = $row_vicar['image'];


echo "
				<div class='row'>

				<div class='col-md-12'>
          <div class='alert alert-success' role='alert'><h1>The Prist:</h1>$prist_firstname
				$prist_lastname</div>
          
        </div>

				

				<img src='workers/images/$prist_image' width='150' height='90'/>
				<a href='workers/detail.php?prist_id = $prist_id'><button type='submit' name='details' class='btn btn-success'>details</button>
</a>
				
				</div>";
			}
		}


function getCatchist(){

	global $con;

	$get_catchist = "select * from chatchist LIMIT 0,10";

	$run_catchist = mysqli_query($con, $get_catchist);


	while ($row_catchist = mysqli_fetch_array($run_catchist)) {
		$chatchist_id = $row_catchist['chatchist_id'];
		$catchist_firstname = $row_catchist['first_name'];
		$catchist_lastname= $row_catchist['last_name'];
		$catchist_yearentered = $row_catchist['year_entered'];
		$catchist_yearleft = $row_catchist['year_left'];
		$catchist_image = $row_catchist['image'];

		echo "
				<div id = 'all_workers'>

				$catchist_firstname
				$catchist_lastname<br>

				<img src='images/$catchist_image' width='180' height='180' />

				<p><b><h1>FROM $catchist_yearentered TO $catchist_yearleft</h1></b></p>

				<a href='detail.php?view_pastor=$chatchist_id'><button type='submit' name='details' class='btn btn-success'>details</button>
</a>
				

				</div>";
	
	}
}

function getCurrentCatchist(){

	global $con;

	$get_chatchist = "select * from chatchist where chatchist_id = 1";

	$run_chatchist = mysqli_query($con, $get_chatchist);


	while ($row_chatchist = mysqli_fetch_array($run_chatchist)) {
		$chatchist_id = $row_chatchist['chatchist_id'];
		$chatchist_firstname = $row_chatchist['first_name'];
		$chatchist_lastname= $row_chatchist['last_name'];
		$chatchist_image = $row_chatchist['image'];


echo "


		<div class='row'>

				<div class='col-md-12'>
          <div class='alert alert-success' role='alert'><h1>Chatchist:</h1>$chatchist_firstname
				$chatchist_lastname</div>
          
        </div>

				

				<img src='workers/images/$chatchist_image' width='150' height='90'/>
				
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
		echo '<a href="play.php?name=audios/'.$song.'">'.$song.'</a>';
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

	echo "<img src = 'members/images/$m_image' height = '150' width = '150'";
}

function song(){
$directory = 'MUSIC';
	if ($handle = opendir($directory.'/')){
		
		while ($file = readdir($handle)) {
			if ($file != '.' && $file != '..') {
				echo '<a href="'.$directory.'/'.$file.'">'.$file.'</a><br>';
			}
		}
	}
}
function loggled_user(){
if(isset($_COOKIE['email'])){
echo "<b>Welcome:<b>" . $_COOKIE['email'] . "<b style ='color:yellow;'> Your </b>";
}
else{

  echo "<b> Welcome Guest:</b>";
  }


if(!isset($_COOKIE['email'])){
  echo "<a href='../member_login.php'>Login</a>";
}

else {
  echo "<a href='member_logout.php'>Logout</a>";
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


?>
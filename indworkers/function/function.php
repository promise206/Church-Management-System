
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


function getBishops(){


	global $con;
	$get_cat = "BISHOP";

	$get_bishop = "select * from ind_workers where worker_cat='$get_cat'";

	$run_bishop = mysqli_query($con, $get_bishop);


	while ($row_bishop = mysqli_fetch_array($run_bishop)) {
		$bishop_id = $row_bishop['worker_id'];
		$bishop_firstname = $row_bishop['worker_firstname'];
		$bishop_lastname = $row_bishop['worker_lastname'];
		$bishop_image = $row_bishop['image'];
		$ordained = $row_bishop['ordained_on'];
		$died = $row_bishop['died_on'];
		$bishop_id = $row_bishop['worker_id'];

		echo "
				<div id = 'all_workers'>

				<h1><b>$bishop_firstname<br>$bishop_lastname</b></h1>

				<img src='indworkers_images/$bishop_image' width='180' height='180' />

				<h1><b>ORDAINED: $ordained</b><br></h1>
				

				</div>";
	
	}
}


function getVens(){


	global $con;
	$get_cat = "VENERABLE";

	$get_ven = "select * from ind_workers where worker_cat='$get_cat'";

	$run_ven = mysqli_query($con, $get_ven);


	while ($row_ven = mysqli_fetch_array($run_ven)) {
		$ven_id = $row_ven['worker_id'];
		$ven_firstname = $row_ven['worker_firstname'];
		$ven_lastname = $row_ven['worker_lastname'];
		$ven_image = $row_ven['image'];
		$ordained = $row_ven['ordained_on'];
		$died = $row_ven['died_on'];
		$ven_id = $row_ven['worker_id'];

		echo "
				<div id = 'all_workers'>

				<h1><b>$ven_firstname<br>$ven_lastname</b></h1>

				<img src='indworkers_images/$ven_image' width='180' height='180' />

				<h1><b>ORDAINED: $ordained</b><br></h1>
				

				</div>";
	
	}
}

function getRevs(){


	global $con;
	$get_cat = "REVEREND";

	$get_rev = "select * from ind_workers where worker_cat='$get_cat'";

	$run_rev = mysqli_query($con, $get_rev);


	while ($row_rev = mysqli_fetch_array($run_rev)) {
		$rev_id = $row_rev['worker_id'];
		$rev_firstname = $row_rev['worker_firstname'];
		$rev_lastname = $row_rev['worker_lastname'];
		$rev_image = $row_rev['image'];
		$ordained = $row_rev['ordained_on'];
		$died = $row_rev['died_on'];
		$rev_id = $row_rev['worker_id'];

		echo "
				<div id = 'all_workers'>

				<h1><b>$rev_firstname<br>$rev_lastname</b></h1>
				

				<img src='indworkers_images/$rev_image' width='180' height='180' />

				<h1><b>ORDAINED: $ordained</b><br></h1>
				

				</div>";
	
	}
}

function getCats(){


	global $con;
	$get_cat = "CHATCHIST";

	$get_cat = "select * from ind_workers where worker_cat='$get_cat'";

	$run_cat = mysqli_query($con, $get_cat);


	while ($row_cat = mysqli_fetch_array($run_cat)) {
		$cat_id = $row_cat['worker_id'];
		$cat_firstname = $row_cat['worker_firstname'];
		$cat_lastname = $row_cat['worker_lastname'];
		$cat_image = $row_cat['image'];
		$ordained = $row_cat['ordained_on'];
		$died = $row_cat['died_on'];
		$cat_id = $row_cat['worker_id'];

		echo "
				<div id = 'all_workers'>

				<h1><b>$cat_firstname $cat_lastname</b></h1>
				

				<img src='indworkers_images/$cat_image' width='180' height='180' />

				<h1><b>ORDAINED: $ordained</b><br></h1>
				

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
				<a href='workers/detail.php?prist_id=$prist_id'><button type='submit' name='details' class='btn btn-success'>details</button>
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
				
			<a href='workers/detail.php?chatchist_id = $chatchist_id'><button type='submit' name='details' class='btn btn-success'>details</button>
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
  echo "<a href='../members/member_login.php'>Login</a>";
}

else {
  echo "<a href='../members/member_logout.php'>Logout</a>";
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
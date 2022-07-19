<?php
ob_start();
include('includes/db.php');

if(!isset($_COOKIE['admin_email'])){
    echo "<script>window.open('login.php?not_admin=Detials incorrect Try Again!', '_self')</script>";
}
else{
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Area</title>
	<link rel="stylesheet" href="css/Bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/style.css" media="all"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>
    	tinymce.init({selector:'textarea'});
    </script>
</head>
<body>
<div class="main_wrapper">
	
	<div id="header"></div>

	<div id="right">
	
	<h3 style="text-align: center;">Manage Content</h3>
		<a href="index.php?insert_indworkers">Insert Indigenous Clergy</a>
		<a href="index.php?view_indworkers">View Indigenous Clergy</a>
		<a href="index.php?insert_nonindworkers">Insert Non-Indigenous Clergy</a>
		<a href="index.php?view_nonindworkers">View Non-Indigenous Cergy</a>
		<a href="index.php?insert_cworkers">Insert Current Workers</a>
		<a href="index.php?view_cworkers">View Current Workers</a>
		<a href="index.php?insert_collect">Insert New Collect</a>
		<a href="index.php?view_collects">View All Collects</a>
		<a href="index.php?insert_notices">Insert New Notice</a>
		<a href="index.php?view_notices">View All Notices</a>
		<a href="index.php?view_members">View All Members</a>
		<a href="index.php?insert_song">Insert New Song</a>
		<a href="index.php?view_songs">View All Songs</a>
		<a href="index.php?insert_slider">Insert New Slider</a>
		<a href="index.php?view_sliders">View All Slider</a>
		<a href="index.php?view_sliders">View All Slider</a>
		<a href="logout.php">Admin Logout</a>
	</div>
	<div id="left">
		<h1 style="color:red; text-align:center; padding:3px; background-color:"><?php  echo @$_GET['logged_in'];  ?></h1>
		<?php
			if (isset($_GET['insert_cworkers'])) {
				include("insert_cworkers.php");
			}
			if (isset($_GET['view_cworkers'])) {
				include("view_cworkers.php");
			}
			if (isset($_GET['insert_indworkers'])) {
				include("insert_indworkers.php");
			}
			if (isset($_GET['view_indworkers'])) {
				include("view_indworkers.php");
			}

			if (isset($_GET['insert_collect'])) {
				include("insert_collect.php");
			}
			if (isset($_GET['view_collects'])) {
				include("view_collects.php");
			}
			if (isset($_GET['view_members'])) {
				include("view_members.php");
			}
			if (isset($_GET['edit_member'])) {
				include("edit_member.php");
			}
			if (isset($_GET['edit_collect'])) {
				include("edit_collect.php");
			}

			if (isset($_GET['insert_notices'])) {
				include("insert_notices.php");
			}
			if (isset($_GET['view_notices'])) {
				include("view_notices.php");
			}
			if (isset($_GET['insert_song'])) {
				include("insert_song.php");
			}
			if (isset($_GET['view_songs'])) {
				include("view_songs.php");
			}
			if (isset($_GET['edit_song'])) {
				include("edit_song.php");
			}
			if (isset($_GET['insert_slider'])) {
				include("insert_slider.php");
			}
			if (isset($_GET['view_sliders'])) {
				include("view_sliders.php");
			}
			if (isset($_GET['edit_slider'])) {
				include("edit_slider.php");
			}
			if (isset($_GET['edit_prist'])) {
				include("edit_prist.php");
			}
			if (isset($_GET['delete_cworkers'])) {
				include("delete_cworkers.php");
			}
			if (isset($_GET['edit_notice'])) {
				include("edit_notice.php");
			}

			if (isset($_GET['delete_collect'])) {
				include("delete_collect.php");
			}
			if (isset($_GET['delete_notice'])) {
				include("delete_notice.php");
			}
			if (isset($_GET['delete_slider'])) {
				include("delete_slider.php");
			}
			if (isset($_GET['delete_member'])) {
				include("delete_member.php");
			}
			if (isset($_GET['delete_worker'])) {
				include("delete_ind.php");
			}
			if (isset($_GET['delete_song'])) {
				include("delete_song.php");
			}

		?>

	</div>
</div>

</body>
</html>
<?php } ?>

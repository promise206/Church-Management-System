<?php
session_start();
if(!isset($_COOKIE['email'])){
	$msg = "Enter your details to Login";
	header('Location: index.php?msg='.$msg);
}
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
		<a href="dashboard.php?view_users">View All Users</a>
		<a href="dashboard.php?view_emails">View Massages</a>
		<a href="dashboard.php?logout">Admin Logout</a>
	</div>
	<div id="left">
		<h1 style="color:red; text-align:center; padding:3px; background-color:"><?php  echo @$_GET['logged_in'];  ?></h1>
		<?php
			if (isset($_GET['view_users'])) {
				include("view_users.php");
			}
			if (isset($_GET['logout'])) {
				include("logout.php");
			}
			if (isset($_GET['view_emails'])) {
				include("view_deleted_emails.php");
			}
			if (isset($_GET['read_mail'])) {
				include("read_mail.php");
			}

		?>

	</div>
</div>

</body>
</html>
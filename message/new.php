<?php
//ignore warnings
error_reporting(E_ALL & ~E_NOTICE & ~8192);

if(!isset($_COOKIE['email'])){
    echo "<script>window.open('index.php', '_self')</script>";
}
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
    tinymce.init({selector:'textarea'});
 </script>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Compose Email</title>
</head>
<body>
<?php if (isset($_GET['msg'])): ?>
<p class="success"><?php echo $_GET['msg'] ?></p> 
 <?php endif; ?>


	<form method="POST" action="new_action.php" enctype="multipart/form-data">
	
		<table>

			<tr>
				<td><label for="remail">Reciever Email</label></td>
				<td><input  type="text" id="remail" name="remail" placeholder="Enter reciever email.." maxlength="100"/></td>
			</tr>


			<tr>
				
				<td><label for="subject">Subject</label></td>
				<td><input  type="text" id="subject" name="subject" placeholder="Enter your subject.." maxlength="100"/></td>

			</tr>

			<tr>
				
				<td><label for="message">Massage</label></td>

				<td><textarea id="message" name="message" placeholder="Enter your message content.."></textarea></td>

			</tr>

			<tr>
				
				<td><label for="file_name">Attarch file</label></td>
				<td><input  type="file" id="file_name" name="file_name"/></td>

			</tr>


				<td><input type="submit" name="submit" value="Send Message"><td>
<tr>
				<td><input type="submit" name="save" value="Save as Draft"><td>
</tr>
		</table>

	</form>

</body>
</html>
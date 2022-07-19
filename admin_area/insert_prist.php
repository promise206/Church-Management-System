<?php
include("includes/db.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Inserting Workers</title>
	</head>
<body bgcolor="white">

	<form action="" method="post" enctype="multipart/form-data">

	<table align="center" width="750" border="2" style="background: #0b89d2;">

		<tr align="center">
			<td colspan="8"><h2>Insert Prist Here</h2></td>
		</tr>

		<tr>
			<td align="right"><b>First Name:</b></td>
			<td><input type="text" name="first_name"></td>
		</tr>

		<tr>
			<td align="right"><b>Last Name:</b></td>
			<td><input type="text" name="last_name"></td>
		</tr>

		<tr>
			<td align="right"><b>Middle Name:</b></td>
			<td><input type="text" name="middle_name"></td>
		</tr>

		<tr>
			<td align="right"><b>Email:</b></td>
			<td><input type="text" name="email"></td>
		</tr>

		<tr>
			<td align="right"><b>image:</b></td>
			<td><input type="file" name="image"></td>
		</tr>

		<tr>
			<td align="right"><b>Year Entered:</b></td>
			<td><input type="Year" name="year_entered"></td>
		</tr>

		<tr>
			<td align="right"><b>Year Left:</b></td>
			<td><input type="Year" name="year_left"></td>
		</tr>

		<tr>
			<td align="right"><b>Biography:</b></td>
			<td><input type="text" name="biography"></td>
		</tr>

		<tr>
			<td align="right"><b>Phone Number:</b></td>
			<td><input type="text" name="phone_no"></td>
		</tr>

		<tr>
			<td align="right"><b>Address</b></td>
			<td><input type="text" name="address"></td>
		</tr>

		<tr align="center">
			<td colspan="8"><input type="submit" name="insert_prist" value="Insert Now"></td>
		</tr>
		

	</table>

</form>

</body>
</html>

<?php
 if(isset($_POST['insert_prist'])){

 	$p_firstname = $_POST['first_name'];
 	$p_lastname = $_POST['last_name'];
 	$p_middlename = $_POST['middle_name'];
 	$p_email = $_POST['email'];
 	$p_image = $_FILES['image']['name'];
    $p_image_tmp = $_FILES['image']['tmp_name'];
	$p_yearentered = $_POST['year_entered'];
 	$p_yearleft = $_POST['year_left'];
 	$p_biography = $_POST['biography'];
 	$p_phoneno = $_POST['phone_no'];
 	$p_address = $_POST['address'];

 	move_uploaded_file($p_image_tmp,"../workers/images/$p_image");


 	$insert_p = "insert into prists (email, first_name, last_name, middle_name, year_entered, year_left, image, address, phone_no, biography) VALUES ('$p_email', '$p_firstname','$p_lastname', '$p_middlename', '$p_yearentered', '$p_yearleft', '$p_image', '$p_address', '$p_phoneno', '$p_biography')";


 	$run_p = mysqli_query($con,$insert_p);

 	if($run_p){

 		echo "<script>alert('registration successfull!')</script>";
 		echo"<script>window.open('index.php?view_prists','_self')</script>";
 	}
 }

?>



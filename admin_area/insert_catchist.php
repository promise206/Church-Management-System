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
			<td colspan="8"><h2>Insert Catchist Here</h2></td>
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
			<td colspan="8"><input type="submit" name="insert_catchist" value="Insert Now"></td>
		</tr>
		

	</table>

</form>

</body>
</html>

<?php
 if(isset($_POST['insert_catchist'])){

 	$c_firstname = $_POST['first_name'];
 	$c_lastname = $_POST['last_name'];
 	$c_middlename = $_POST['middle_name'];
 	$c_email = $_POST['email'];
 	$c_image = $_FILES['image']['name'];
    $c_image_tmp = $_FILES['image']['tmp_name'];
	$c_yearentered = $_POST['year_entered'];
 	$c_yearleft = $_POST['year_left'];
 	$c_biography = $_POST['biography'];
 	$c_phoneno = $_POST['phone_no'];
 	$c_address = $_POST['address'];

 	move_uploaded_file($c_image_tmp,"workers/images/$c_image");


 	$query = "select * from chatchist where email = '$c_email'";

 	$result = mysqli_query($con,$query);

 	if (mysqli_num_rows($result)>1){
 		echo "data already exit";
 	}
 	else{


 	$insert_c = "insert into chatchist (first_name, last_name, middle_name, email, year_entered, year_left, image, address, phone_no, biography) VALUES ('$c_firstname','$c_lastname', '$c_middlename', '$c_email', '$c_yearentered', '$c_yearleft', '$c_image', '$c_address', '$c_phoneno', '$c_biography')";


 	$run_c = mysqli_query($con,$insert_c);

 	if($run_c){

 		echo "<script>alert('Chatchist Registered successfull!')</script>";
 		echo"<script>window.open('index.php?insert_chatchist','_self')</script>";
 	}
 	}
 }

?>




<?php
session_start();
ob_start();
include('../user.class.php');
include('../email.class.php');
$account=new user();
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/style.css">
 <link href="../default/style.css" rel="stylesheet" title="Style" />
<link rel="stylesheet" href="../css/Bootstrap.min.css">
	<title>Registration Page</title>
</head>
<body>

<!--MAIN CONTAINER START HERE-->
<div class="container padding-top-10">

	<div class="panel panel-default">
            <div class="panel-body">
              <div class="box">
                

                
                  <div class="alert alert-danger" role="alert"><b>Register New Email</b></div>
               
<div class="content">              
<form method="POST" action="register_action.php">
	
		<table>

			<tr>
				<td><label for="surname">Surname:</label></td>
				<td><input  type="text" id="surname" name="surname" placeholder="Enter your surname.." maxlength="20"/></td>
			</tr>

			<tr>
				
				<td><label for="firstname">First Name:</label></td>
				<td><input  type="text" id="firstname" name="firstname" placeholder="Enter your first name.." maxlength="50"/></td>
o
			</tr>

			<tr>
				
				<td><label for="midname">Middle Name:</label></td>
				<td><input  type="text" id="midname" name="midname" placeholder="Enter your middle name.." maxlength="32"/></td>

			</tr>

			<tr>
				
				<td><label for="date">Date of Birth:</label></td>
				<td><input  type="date" id="date" name="date" placeholder=""/></td>

			</tr>

			<tr>
				
				<td><label for="email">Email Address</label></td>
				<td><input  type="text" id="email" name="email" placeholder="Enter your Email address.." maxlength="50"/></td>

			</tr>

			<tr>
				
				<td><label for="pass">Password:</label></td>
				<td><input  type="password" id="pass" name="pass" placeholder="**********" maxlength="32"/></td>

			</tr>

			<tr>
				
				<td><label for="again">Password Again:</label></td>
				<td><input  type="password" id="again" name="again" placeholder="**********" maxlength="32"/></td>

			</tr>

			<tr>
				
				<td><label for="phone">Mobile Number:</label></td>
				<td><input  type="text" id="phone" name="phone" placeholder="" maxlength="11"/></td>

			</tr>

			<tr>
				
				<td><label for="address">Address:</label></td>
				<td><input  type="text" id="address" name="address" placeholder="Enter your resident.." maxlength="60"/></td>

			</tr>

			<tr>
				
				<td><label for="favorite_food">What is your favorite food:</label></td>
				<td><input  type="text" id="favorite_food" name="favorite_food" placeholder="Enter your favorite food" maxlength="50"/></td>

			</tr>

				<td><input type="submit" name="submit" value="Register"><td>

		</table>

	</form>
</div>

                  </div>
                </div>
        
          </div>
          
        

       
     <div class="panel-footer">
              <p style="text-align: center;">&copy; 2017 by www.Emailsystem.com </p>
              <p style="text-align: center">designed by promzy tech</p>
        </div>
      </div>

<!--MAIN CONTAINER ENDS HERE-->


</body>
</html>
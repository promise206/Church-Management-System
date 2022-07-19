 <?php
include('../user.class.php');
$account=new user();


global $con;
if (isset($_POST['submit'])) {
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$midname = $_POST['midname'];
	$dob = $_POST['date'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$passagain = $_POST['again'];
	$mobile = $_POST['phone'];
	$address = $_POST['address'];
	$favorite_food = $_POST['favorite_food'];

	$insert_user = array(

	'surname' => mysqli_real_escape_string($account->get_conn(), $surname),
	'firstname' => mysqli_real_escape_string($account->get_conn(), $firstname),
	'middlename' => mysqli_real_escape_string($account->get_conn(), $midname),
	'dob' => mysqli_real_escape_string($account->get_conn(), $dob),
	'email' => mysqli_real_escape_string($account->get_conn(), $email),
	'pass' => mysqli_real_escape_string($account->get_conn(), $pass),
	'address' => mysqli_real_escape_string($account->get_conn(), $address),
	'phone' => mysqli_real_escape_string($account->get_conn(), $mobile),
	'secreat_question' => mysqli_real_escape_string($account->get_conn(), $favorite_food)
	
	);
	
	if(!$surname == '' && !$firstname == '' && !$midname == '' && !$dob == '' && !$email == '' && !$pass == '' && !$passagain == '' && !$mobile == '' && !$address == '' && !$favorite_food == ''){


		$sel_user = "select * from users where email = '$email' ";

        $run_user = mysqli_query($account->get_conn(), $sel_user);


        $check_user = mysqli_num_rows($run_user);

        if($check_user>0) {

          echo "<script>alert('email already exist!')</script>";
          header('Location: index.php');
          exit();
        }

			if($pass == $passagain){
				//QUERIES

				if ($account->register("users", $insert_user)) {
					$success_message = 'Account Registered';
					header('Location: ../index.php?message='. $success_message);
				}
			}
			else {
				echo '<p class="required">Password mismatch!</p>';
			}
	}else {
		echo '<p class="required">All Fields are Required!</p>';
	}
}

?>
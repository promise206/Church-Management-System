<?php
include('email.class.php');

if (isset($_POST['submit'])) {
	date_default_timezone_set('Africa/Lagos');
	$send = new email();
	$semail = $_COOKIE['email'];
	$remail = $_POST['remail'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$att_file = basename($_FILES['file_name']['name']);
    $att_file_tmp = $_FILES['file_name']['tmp_name'];
	$time = time();
	$sent = 1;
	
	$send_email = array(

	'from' => mysqli_real_escape_string($send->get_conn(), $semail),
	'email' => mysqli_real_escape_string($send->get_conn(), $remail),
	'subject' => mysqli_real_escape_string($send->get_conn(), $subject),
	'message' => mysqli_real_escape_string($send->get_conn(), $message),
	'file_name' => mysqli_real_escape_string($send->get_conn(), $att_file),
	'time' => mysqli_real_escape_string($send->get_conn(), $time),
	'sent' => mysqli_real_escape_string($send->get_conn(), $sent),
	
	);
    

	if(!$semail == '' && !$remail == '' && !$subject == '' && !$message == ''){
		//QUERIES

		$sel_user = "select * from members where email = '$remail' ";

        $run_user = mysqli_query($send->get_conn(), $sel_user);


        $check_user = mysqli_num_rows($run_user);

        if($check_user<1) {
          $msg = "Invalid Email Address!";
          header('Location: homepage.php?compose&msg='.$msg);
          exit();
        }
        move_uploaded_file($att_file_tmp,"attarch_file/$att_file");
		if ($send->send_new_email("messages", $send_email)) {
			$msg = "Email Sent";
			header('Location: sent.php?msg='.$msg);
		} else {
		$msg = "An error occured. Pls try again later.";
		}

    }else {
		$success_message = 'All Field are Required!';
		header('Location: homepage.php?compose&msg='. $success_message);
	}

}

if (isset($_POST['save'])) {
	date_default_timezone_set('Africa/Lagos');
	$send = new email();
	$semail = $_COOKIE['email'];
	$remail = $_POST['remail'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$att_file = basename($_FILES['file_name']['name']);
    $att_file_tmp = $_FILES['file_name']['tmp_name'];
	$time = time();
	

	$save_email = array(

	'sender_email' => mysqli_real_escape_string($send->get_conn(), $semail),
	'reciever_email' => mysqli_real_escape_string($send->get_conn(), $remail),
	'subject' => mysqli_real_escape_string($send->get_conn(), $subject),
	'message' => mysqli_real_escape_string($send->get_conn(), $message),
	'file_name' => mysqli_real_escape_string($send->get_conn(), $att_file),
	'time' => mysqli_real_escape_string($send->get_conn(), $time),
	
	);

	if(!$semail == '' && !$remail == '' && !$subject == '' && !$message == ''){
		move_uploaded_file($att_file_tmp,"attarch_file/$att_file");
		if ($send->save_email("draft", $save_email)) {
			$success_message = 'Email Saved';
			header('Location: draft.php?msg='. $success_message);
		}
	}else{
		$success_message = 'All Field are Required!';
		header('Location: homepage.php?compose&msg='. $success_message);
	}
}
?>
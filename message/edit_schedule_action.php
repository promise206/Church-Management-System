<?php
include('email.class.php');
date_default_timezone_set('Africa/Lagos');
$id = $_POST['id'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$date = $_POST['date'];
$time = $_POST['time'];
$message = $_POST['message'];
$timestamp = strtotime($date.' '.$time);

$scheduler = new email();
if ($scheduler->update_schedule($id, $email, $subject, $timestamp, $message)) {
	$msg = "Updated successfully.";
} else {
	$msg = "An error occured. Pls try again later.";
}

header('Location: view_schedule.php?msg=' . $msg);
exit();
?>
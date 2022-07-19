<?php
include('email.class.php');
date_default_timezone_set('Africa/Lagos');
$id = $_POST['id'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$date = $_POST['date'];
$time = $_POST['time'];
$message = $_POST['message'];
$att_file = basename($_FILES['file_name']['name']);
$att_file_tmp = $_FILES['file_name']['tmp_name'];
$timestamp = strtotime($date.' '.$time);

$scheduler = new email();
if ($scheduler->schedule($email,$att_file, $subject, $message, $timestamp)) {
  move_uploaded_file($att_file_tmp,"attarch_file/$att_file");
  $msg = "Scheduled successfully.";
} else {
  $msg = "An error occured. Pls try again later.";
}

header('Location: view_schedule.php?msg=' . $msg);
exit();
?>
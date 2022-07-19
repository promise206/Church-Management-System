<?php
include('email.class.php');

if (!isset($_GET['delete'])) {
    header('Location: homepage.php');
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $value = 1;
    $email = new email();
    if ($email->delete_email('messages', $id,'sender_deleted',$value)) {
        echo "<script>window.open('view_schedule.php','_self')</script>";
    } else {
               echo "<script>alert('something went wrong!')</script>";
               echo "<script>window.open('view_schedule.php','_self')</script>";
    }
    exit();
   }
?>
<?php
include('admin.class.php');

if (!isset($_GET['delete_mail'])) {
    header('Location: homepage.php');
}
if (isset($_GET['delete_mail'])) {
    $id = $_GET['delete_mail'];
    $email = new admin();
    if ($email->delete_mail('messages', $id)) {
      $msg = "Mail Deleted";
      header('location: dashboard.php?view_emails&msg='.$msg);
    } else {
               echo "<script>alert('something went wrong!')</script>";
               echo "<script>window.open('dashboard.php','_self')</script>";
    }
    exit();
   }
?>
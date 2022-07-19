<?php
include('admin.class.php');

if (!isset($_GET['delete_user'])) {
    header('Location: homepage.php');
}
if (isset($_GET['delete_user'])) {
    $id = $_GET['delete_user'];
    $value = 1;
    $email = new admin();
    if ($email->delete_user('users', $id)) {
        echo "<script>window.open('dashboard.php?view_users','_self')</script>";
    } else {
               echo "<script>alert('something went wrong!')</script>";
               echo "<script>window.open('dashboard.php','_self')</script>";
    }
    exit();
   }
?>
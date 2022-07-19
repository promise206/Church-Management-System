<?php
include('admin.class.php');

if (!isset($_GET['logout'])) {
    header('Location: dashboard.php');
}
if (isset($_GET['logout'])) {
    $id = $_GET['logout'];
    $user = new admin();
    if ($user->logout()) {
        echo "<script>window.open('index.php','_self')</script>";
    } else {
                die("Please Regresh the Page");
    }
    exit();
   }
?>
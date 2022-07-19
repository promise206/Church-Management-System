<?php
include('user.class.php');

if (!isset($_GET['logout'])) {
    header('Location: homepage.php');
}
if (isset($_GET['logout'])) {
    $id = $_GET['logout'];
    $user = new user();
    if ($user->logout()) {
        echo "<script>window.open('index.php','_self')</script>";
    } else {
                die("Please Regresh the Page");
    }
    exit();
   }
?>
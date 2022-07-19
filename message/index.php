<?php
session_start();
//import db file
ob_start();
include('user.class.php');
$obj=new user;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="default/style.css" rel="stylesheet" title="Style" />
    <link rel="stylesheet" href="css/Bootstrap.min.css">
    <script src="main.js"></script>
</head>
<body>

<!--
<div class="header">
    <a href="homepage.php"><img src="default/images/logo.jpg" alt="Members Area" width="700" height="100" /></a>
</div>
-->
    <?php if (isset($_GET['message'])): ?>
    <p class="success"><?php echo $_GET['message'] ?></p> 
    <?php endif; ?>

    <?php if (isset($_GET['password'])): ?>
    <p class="success">Your Password is: <?php echo $_GET['password'] ?></p> 
    <?php endif; ?>

    <?php
     echo "<script>window.open('homepage.php','_self')</script>";

    ?>
</body>
</html>
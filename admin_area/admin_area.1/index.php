<?php
session_start();
//import db file
ob_start();
include('admin.class.php');
$admin=new admin();
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

<div class="header">
    <a href="index.php"><img src="default/images/logo.jpg" alt="Members Area" width="700" height="100" /></a>
</div>
    <?php if (isset($_GET['msg'])): ?>
    <p class="success"><?php echo $_GET['msg'] ?></p> 
    <?php endif; ?>

    <?php if (isset($_GET['check_detail'])): ?>
              <p class="success"><?php echo $_GET['check_detail'] ?></p> 
              <?php endif; ?>

    <?php
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        if($admin->login($email,$pass))
        {
            //$_COOKIE['email']=$email;
            setcookie("email", $email, time()+(3600*24*30),"/");
            
            $msg = "Welcome to Admin Panel";
            header('Location: dashboard.php?logged_in=' . $msg);
        
        }
        else{
            $msg = "Incorrect Details!";
            header('Location: index.php?msg=' . $msg);
        }
    }
    else{
            echo ($admin->showLoginForm());
    }

    ?>
</body>
</html>
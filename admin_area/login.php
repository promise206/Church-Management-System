<?php
ob_start();
include("includes/db.php");
include("function/function.php");
?>

<!doctype>
<html>
<title>Login Form</title>
<link rel="stylesheet" href="styles/admin_style.css" media="all"/>
<body>

<div class="login">
    <h2 style="color:white; text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>
	<h1>Admin Login</h1>
    <form method="POST" action="login.php">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" name="login" class="btn btn-primary btn-block btn-large">Login.</button>
    </form>
</div>
    
</body>
</html>


<?php



if(isset($_POST['login'])){
    
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    $sel_user = "select * from admins where admin_email = '$email' AND admin_pass = '$pass' ";
    $run_user = mysqli_query($con, $sel_user);
    $check_user = mysqli_num_rows($run_user);
    
    if($check_user==0){
        
        echo "<script>alert('password or email is incorrect, try again!')</script>";
        
    }else{
        setcookie("admin_email", $email, time() + (3600*24*30), "/");
        echo "<script>window.open('index.php?logged_in=You logged in successfully!','_self')</script>";
        }
}

?>
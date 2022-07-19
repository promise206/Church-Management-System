<?php

//import db file
ob_start();
if(!isset($_COOKIE['email'])){
    echo "<script>window.open('index.php', '_self')</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>
        tinymce.init({selector:'textarea'});
    </script>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Schedule Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/Bootstrap.min.css" />
    <script src="main.js"></script>
</head>
<body>
<div class"header">
</div>

<?php

if (isset($_POST['submit'])) {
        date_default_timezone_set('Africa/Lagos');
        $remail = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $timestamp = strtotime($date.' '.$time);
        $semail = $_POST['email'];
        $att_file = basename($_FILES['file_name']['name']);
        $att_file_tmp = $_FILES['file_name']['tmp_name'];

        $email = new email();
        if(!$remail == '' && !$subject == '' && !$message == ''){
            $sel_user = "select * from members where email = '$remail' ";

            $run_user = mysqli_query($email->get_conn(), $sel_user);


            $check_user = mysqli_num_rows($run_user);

            if($check_user<1) {

              $msg = "Invalid Email Address!";
              header('Location: homepage.php?scheduler&msg='. $msg);
              exit();
            }
            move_uploaded_file($att_file_tmp,"attarch_file/$att_file");
            if($email->schedule($remail,$att_file, $subject, $message, $timestamp))
            {
    			$msg = "Email Scheduled Successfully";
    			//echo "<script>window.open('homepage.php?view_schedule','_self')</script>";
                header('Location: view_schedule.php?msg='.$msg);
                
            
    		}
    		else{
                echo '<p class="success">Email Not scheduled.</p>';
    		}
	   }
       else{
            $success_message = 'All Field are Required!';
            header('Location: homepage.php?scheduler&msg='. $success_message);
        }
    }
		else{
			echo ($email->show_schedule_form());
	    }
?>
</body>
</html>
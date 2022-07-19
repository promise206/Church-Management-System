<?php
//ignore warnings
error_reporting(E_ALL & ~E_NOTICE & ~8192);
//import db file
ob_start();
include('user.class.php');
include('email.class.php');
$db=new user();
$email = new email();
if(!isset($_COOKIE['email'])){
    echo "<script>window.open('index.php', '_self')</script>";
}
else{
?>



<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/Bootstrap.min.css">
  <title>Home Page</title>
</head>


<!-- Body start here -->
<body>
<div class="header">
  <a href="homepage.php"><img src="default/images/logo1.png" alt="Members Area" /></a>
</div>

<!--MAIN CONTAINER START HERE-->
<div class="container padding-top-10">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="box">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 "><div class="grey-box">
          <div class="alert alert-danger" role="alert"><b>EMAIL SCHEDULING SYSTEM</b></div>
          <ul id="grey-box">
   
          <?php
            if (isset($_COOKIE['email'])) {
                echo "<b>Welcome: <b>" . $_COOKIE['email'];
              $user = $_COOKIE['email'];
              
              $get_user = "select * from members where email='$user'";
              $run_img = mysqli_query($db->get_conn(),$get_user);
              $row_img = mysqli_fetch_array($run_img);
              $m_id = $row_img['member_id'];
            }
          ?>
          <a href='homepage.php?compose'><button type='submit' name='details' class='btn btn-success'>Compose New Mail</button>
            <h4><a href ="inbox.php">Inbox</a><br></h4>
            <h4><a href ="draft.php">Draft</a><br></h4>
            <h4><a href ="sent.php">Sent</a><br></h4>
            <h4><a href ="homepage.php?scheduler">Schedule Emails</a><br></h4>
            <h4><a href ="view_schedule.php">View Schedule</a><br></h4><br>

            <span style="float:; font-size:18px ; padding:2px; line-height:20px ;">
              <a href='#'>Logout</a>
          </ul>
      </div>
    </div>
  </div>

  <div class="inbox"><h2 style="text-align: left; color: #2c12ce;padding: 2px;margin: 0;">Inbox</h2></div>
  <a class="back" href="homepage.php?inbox"><=Back to Home</a>
              
  <?php 
  //Getting messages
  if (isset($_GET['msg'])) {
    date_default_timezone_set('Africa/Lagos');

    $id = $_GET['msg'];
    $update_msg = "update `messages` SET `open` = '1' where `id` = '$id'";
    $run_update = mysqli_query($email->get_conn(), $update_msg);
    $get_msg = "select * from `messages` where `id` = '$id' and `receiver_deleted` = 0";
    $run_msg = mysqli_query($email->get_conn(), $get_msg);
    $row_msg = mysqli_fetch_array($run_msg);
    $from = $row_msg['from'];
    $email = $row_msg['email'];
    $subject = $row_msg['subject'];
    $message = $row_msg['message'];
    $file_name = $row_msg['file_name'];
    $timestamp = $row_msg['time'];
    $date = date('Y-m-d h:i a', $timestamp);
  ?>

  <div id="msg">
    <a class="back" href="inbox.php"><=Back to Inbox</a>
    <table>
      <tr>
        <td>From: <?php echo $from; ?> </td>
        <td>My Email: <?php echo $email; ?> </td>
        <td>Date: <?php echo $date; ?> </td>
      </tr>
    </table>
    <p style="text-align: left; color: blue;"><b>Subject:  </b></p><h4><?php echo $subject; ?></h4>
    <b style="color: blue">Body:  </b><h4><?php echo $message; ?></h4>
    <?php
    //Getting the attached file
    if (!$file_name == '') {
    ?>
      <tr>
        <td><?php  echo $file_name; ?></td>
        <td><a href="attarch_file/<?php echo $file_name;  ?>">Download</a></td><br><br>
      </tr>
    <?php }?>
    <tr>
        <td><a class="delete" href="reciever_delete.php?reciever_id=<?php echo $id;  ?>">Delete this message</a></td>
        <td><a class="forward" href="forward_email.php?mail_id=<?php echo $id;  ?>">Forward</a></td>
        <td><a class="reply" href="reply_email.php?mail_id=<?php echo $id;  ?>">Reply</a><br><br></td>
    </tr>
      </div>
    </div>
  </div>
  <div class="panel-footer">
    <p style="text-align: center;"><?php echo date(Y);  ?> by www.Rmail.com </p>
    <p style="text-align: center">designed by promzy tech</p>
  </div>
</div>
<!--MAIN CONTAINER ENDS HERE-->

</body>
</html>
<?php exit(); }} ?>
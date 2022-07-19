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
    echo "<script>window.open('index.php?check_detail=Check your detail!', '_self')</script>";
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
<body>
  <!--HEADER STARTS HERE-->
  <div class="header">
          <a href="homepage.php"><img src="default/images/logo1.png" alt="Members Area" /></a>
  </div>
  <!--HEADER ENDS HERE-->

<!--MAIN CONTAINER START HERE-->
<div class="container padding-top-10">
   <div class="panel panel-default">
            <div class="panel-body">
              <div class="box">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 "><div class="grey-box">
                  <div class="alert alert-success" role="alert"><b>EMAIL SCHEDULING SYSTEM</b></div>
                  <ul id="grey-box">
                    <!-- Getting users email -->
                    <?php if (isset($_COOKIE['email'])) { echo "<b>Welcome: <b>" . $_COOKIE['email']; } ?>
             			  <a href='homepage.php?compose'><button type='submit' name='details' class='btn btn-success'>Compose New Mail</button>
                    <h4><a href ="inbox.php">Inbox<?php $user = $_COOKIE['email']; $email->get_total_new_email($user); ?></a><br></h4>
                    <h4><a href ="draft.php">Draft</a><br></h4>
                    <h4><a href ="sent.php">Sent</a><br></h4>
                    <h4><a href ="homepage.php?scheduler">Schedule Email</a><br></h4>
                    <h4><a href ="view_schedule.php">View Schedule</a><br></h4><br>
                    <span style="float:; font-size:18px ; padding:2px; line-height:20px ;">
                    <a href='logout.php?logout=".<?php echo $user ?>."'>Logout</a>
                  </ul>
                  </div>
                </div>
                </div>

              <div class="inbox"><h2 style="text-align: left; color: #2c12ce;padding: 2px;margin: 0;">Saved Email</h2></div>
              <a class="back" href="homepage.php"><=Back to Home</a>

              <!-- Getting the total Email of the user in the inbox -->
              <?php $user = $_COOKIE['email']; $email->get_total_draft($user); ?>
              <?php if (isset($_GET['msg'])): ?>
              <p class="success"><?php echo $_GET['msg'] ?></p> 
              <?php endif; ?>
              <table>
                <tr>
                  <th>SN</th>
                  <th>To</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Reply</th>
                  <th>Delete</th>
                </tr>

                <?php
                global $con;
                $user = $_COOKIE['email'];
                $limit = 5;
                if (isset($_GET['p'])) {
                  $p = $_GET['p'];
                } else {
                  $p = 1;
                }
                $get_inbox = "select * from `draft` where `sender_email` = '$user' ";
                $run_inbox = mysqli_query($email->get_conn(), $get_inbox);
                $get_total = mysqli_num_rows($run_inbox);

                $total = ceil($get_total/$limit);

                if (!isset($p) || $p <= 0) {
                  $offset = 0;
                } else{
                $offset = ceil($p - 1) * $limit;
                }

                $get_messages = "select * from `draft` where `sender_email` = '$user' ORDER BY id DESC LIMIT $offset,$limit";

                $run_messages = mysqli_query($email->get_conn(), $get_messages);

                $i= 1;
                while ($row_messages = mysqli_fetch_array($run_messages)) {
                  $id = $row_messages['id'];
                  $to = $row_messages['reciever_email'];
                  $sender_email = $row_messages['sender_email'];
                  $subject = $row_messages['subject'];
                  $message = $row_messages['message'];
                  $timestamp = $row_messages['time'];
                  $date = date('Y-m-d h:i a', $timestamp);
                  $opens = $row_messages['open'];
                  if($opens == 0){
                    $open = "Not Opened";
                  }else {
                  $open = "Opened";
                  }

                  if ($p != 1) {
                    $num = (($p - 1) * $limit) + $i;
                  } else {
                    $num = $i;
                  }

                echo '<tr>';
                  echo '<td>'.$num.'</td>';
                  echo '<td>'.$to.'</td>';
                  echo '<td>'.$sender_email.'</td>';
                  echo '<td>'.$subject.'</td>';  
                  echo '<td><a href="edit_saved.php?id='.$id.'">Edit</td>';
                  echo '<td><a href="#">Delete</td>';
                echo '</tr>';

                $i++;
              }
              ?>
            </table>

            <?php
            if($get_total > $limit){
              echo '<div id="pages">';
              for ($i=1; $i<=$total ; $i++) {
                echo ($i == $p) ? '<a class="active">'.$i.'</a>' : '<a href="draft.php?p='.$i.'">'.$i.'</a>';
              }
              echo '</div>';
            }
            ?>
            <?php
            if (isset($_GET['compose'])) {
              include("new.php");
            }
            if(isset($_GET['change_pass'])){
              include("change_pass.php");
            }
            if (isset($_GET['logout'])) {
              include("member_logout.php");
            }
            if (isset($_GET['delete_account'])) {
              include("delete_account.php");
            }
            ?>       
        </div>
      </div>
      <!-- Footer starts here -->
      <div class="panel-footer">
        <p style="text-align: center;">&copy; <?php echo date(Y) ?> by www.Rmail.com </p>
        <p style="text-align: center">designed by promzy tech</p>
      </div>
      <!-- Footer End here -->

</div>
<!--MAIN CONTAINER ENDS HERE-->
</body>
</html>

<?php } ?>
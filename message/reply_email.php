<?php
	include('email.class.php');

    if (!isset($_GET['mail_id'])) {
      $id = $_GET['mail_id'];
        header('Location: view_email.php?msg='. $id);
    }

    $id = $_GET['mail_id'];
    date_default_timezone_set('Africa/Lagos');
    $email = new email();
    $query = "SELECT * FROM messages WHERE id = $id";
    $run_query = mysqli_query($email->get_conn(), $query);
    $result = mysqli_fetch_array($run_query);
    $file_name = $result['file_name'];
    $date = date('Y-m-d', (int) $result['time']);
    $time = date('H:i', (int) $result['time']);
?>

<!DOCTYPE html>
<html>
<head>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
tinymce.init({selector:'textarea'});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="default/style.css" rel="stylesheet" title="Style" />
<link rel="stylesheet" href="css/Bootstrap.min.css">
	<title>Compose Email</title>
</head>
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
            $get_user = "select * from members where member_id='$id'";
            $run_img = mysqli_query($email->get_conn(),$get_user);
            $row_img = mysqli_fetch_array($run_img);
            $m_id = $row_img['id'];
            $m_firstName = $row_img['firstname'];
            $m_lastName = $row_img['surname'];
          }
          ?>
          
     			<a href='homepage.php?compose'><button type='submit' name='details' class='btn btn-success'>Compose New Mail</button>
          <h4><a href ="inbox.php">Inbox<?php $user = $_COOKIE['email']; $email->get_total_new_email($user);  ?></a><br></h4>
          <h4><a href ="draft.php">Draft</a><br></h4>
          <h4><a href ="sent.php">Sent</a><br></h4>
          <h4><a href ="homepage.php?scheduler">Schedule Emails</a><br></h4>
          <h4><a href ="view_schedule.php">View Schedule</a><br></h4><br>
          <span style="float:; font-size:18px ; padding:2px; line-height:20px ;">
          <a href='logout.php'>Logout</a>
          </ul>
      </div>
      </div>
    </div>
    <form method="POST" action="new_action.php" enctype="multipart/form-data">
  		<table>
  			<tr>
  				<td><label for="email">Reciever Email</label></td>
  				<td><input  type="text" id="email" name="remail" placeholder="Reciever Email" maxlength="100" value="<?php echo $result['from']; ?>" /></td>
  			</tr>
  			<tr>
  				<td><label for="subject">Subject</label></td>
  				<td><input  type="text" id="subject" name="subject" placeholder="Enter your subject.." maxlength="100" value="<?php echo $result['subject']; ?>" /></td>
  			</tr>
  			<tr>
  				<td><label for="message">Massage</label></td>
  				<td><textarea id="message" name="message" placeholder="Enter your message content.."></textarea></td>
  			</tr>
        <tr>
          <td><label for="file_name">Attarch file</label></td>
          <td><input  type="file" id="file_name" name="file_name"/></td>
        </tr>
  			<input type="hidden" value="<?php echo $id; ?>" name="id" />
  				<td><input type="submit" name="submit" value="Send Email"><td>
        <tr>
          <td><input type="submit" name="save" value="Save as Draft"><td>
        </tr>
  		</table>
    	</form>
    </div>
  </div>
  <div class="panel-footer">
    <p style="text-align: center;">&copy; 2017 by www.Emailsystem.com </p>
    <p style="text-align: center">designed by promzy tech</p>
  </div>
</div>

<!--MAIN CONTAINER ENDS HERE-->
</body>
</html>
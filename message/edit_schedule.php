<?php
	include('user.class.php');
  include('email.class.php');

    if (!isset($_GET['id'])) {
        header('Location: homepage.php');
    }

    $id = $_GET['id'];
    date_default_timezone_set('Africa/Lagos');

    $db = new user();
    $email = new email();

    $query = "SELECT * FROM messages WHERE id = $id";
    $run_query = mysqli_query($db->get_conn(), $query);

    $result = mysqli_fetch_array($run_query);

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
	<title>Registration Page</title>
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
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
            <div class="grey-box">
              <div class="alert alert-danger" role="alert"><b>EMAIL MANAGEMENT SYSTEM</b></div>
                <ul id="grey-box">
             
                <?php
                if (isset($_COOKIE['email'])) {
                  echo "<b>Welcome: <b>" . $_COOKIE['email'];
                  $user = $_COOKIE['email'];
                }

                ?>
             		<a href='homepage.php?compose'><button type='submit' name='details' class='btn btn-success'>Compose New Mail</button>
                <h4><a href ="inbox.php">Inbox
                <?php $user = $_COOKIE['email']; $email->get_total_new_email($user);  
                ?></a><br></h4>
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

          <form method="POST" action="edit_schedule_action.php">
              	
            <table>

              <tr>
              	<td><label for="email">Reciever Email</label></td>
              	<td><input  type="text" id="email" name="email" placeholder="'.to.'" maxlength="100" value="<?php echo $result['email']; ?>" /></td>
              </tr>

              <tr>
              	<td><label for="subject">Subject</label></td>
              	<td><input  type="text" id="subject" name="subject" placeholder="Enter your subject.." maxlength="100" value="<?php echo $result['subject']; ?>" /></td>
              </tr>

              <tr>
                <td><label for="date">Date</label></td>
                <td><input type="date" id="date" value="<?php echo $date; ?>" name="date"/><td>
              </tr>

              <tr>
                <td><label for="time">Time</label></td>
                <td><input type="time" id="time" name="time" value="<?php echo $time; ?>"/><td>
              </tr>

              <tr>
                <td><label for="message">Massage</label></td>
                <td><textarea id="message" name="message" placeholder="Enter your message content.."><?php echo $result['message']; ?></textarea></td>
              </tr>
              
              <input type="hidden" value="<?php echo $id; ?>" name="id" />
              <td><input type="submit" name="edit" value="Save Schedule"><td>
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
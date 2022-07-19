<?php
//ignore warnings
error_reporting(E_ALL & ~E_NOTICE & ~8192);
//import db file
ob_start();
include('admin.class.php');
$admin = new admin();
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

<!--MAIN CONTAINER START HERE-->
 
  <?php 
  //Getting messages
  if (isset($_GET['read_mail'])) {
    date_default_timezone_set('Africa/Lagos');

    $id = $_GET['read_mail'];
    $update_msg = "update `messages` SET `open` = '1' where `id` = '$id'";
    $run_update = mysqli_query($admin->get_conn(), $update_msg);
    $get_msg = "select * from `messages` where `id` = '$id'";

    $run_msg = mysqli_query($admin->get_conn(), $get_msg);

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
    <table>
      

    </table>
    <p style="text-align: left; color: blue;"><b>Subject:  </b><?php echo $subject; ?></p>
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
    </tr>

    </div>
<!--MAIN CONTAINER ENDS HERE-->

</body>
</html>

<?php exit(); }} ?>
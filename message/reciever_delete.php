<?php
include('email.class.php');

if (!isset($_GET['reciever_id'])) {
    header('Location: homepage.php');
}
if (isset($_GET['reciever_id'])) {
    $id = $_GET['reciever_id'];
    $email = new email();
    if ($email->delete_email('messages', $id,'receiver_deleted')) {
        echo "<script>window.open('inbox.php','_self')</script>";
    } else {
               echo "<script>alert('something went wrong!')</script>";
    }
    exit();
   }
?>
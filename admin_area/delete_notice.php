<?php
include("includes/db.php");

if (isset($_GET['delete_notice'])) {
  $delete_id = $_GET['delete_notice'];

  $delete_notice = "delete from notices where notices_id = '$delete_id'";

  $run_delete = mysqli_query($con, $delete_notice);

  if ($run_delete) {
    echo "<script>window.open('index.php?view_notices','_self')</script>";
  }
}

?>
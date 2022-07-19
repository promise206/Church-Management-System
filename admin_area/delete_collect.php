<?php
include("includes/db.php");

if (isset($_GET['delete_collect'])) {
  $delete_id = $_GET['delete_collect'];

  $delete_collect = "delete from collect where collect_id = '$delete_id'";

  $run_delete = mysqli_query($con, $delete_collect);

  if ($run_delete) {
    echo "<script>window.open('index.php?view_collects','_self')</script>";
  }
}

?>
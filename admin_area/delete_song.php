<?php
include("includes/db.php");

if (isset($_GET['delete_song'])) {
  $delete_id = $_GET['delete_song'];

  $delete_song = "delete from songs where song_id = '$delete_id'";

  $run_delete = mysqli_query($con, $delete_song);

  if ($run_delete) {
    echo "<script>window.open('index.php?view_songs','_self')</script>";
  }
}

?>
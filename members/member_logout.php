<?php

session_start();

session_destroy();

setcookie("email", "", time() - 3600, "/");
echo "<script>window.open('../index.php','_self')</script>";


?>
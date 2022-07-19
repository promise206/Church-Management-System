<?php

setcookie("admin_email", "", time() - 3600, "/");

echo "<script>window.open('login.php','_self')</script>";


?>
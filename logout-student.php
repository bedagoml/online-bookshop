<?php
session_start();
session_destroy();
unset($_SESSION['studentSession']);
header("Location:student-login.php");
?>
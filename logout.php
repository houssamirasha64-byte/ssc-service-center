<?php
session_start();
unset($_SESSION['validity_key']);
unset($_SESSION['privileges']);
session_destroy();
header('Location: system_login.php');
exit;
?>
<?php
session_start();
// Pages inside phpp/ need to go one folder up to reach the login page
$login_page = (basename(dirname($_SERVER['SCRIPT_NAME'])) === 'phpp') ? '../system_login.php' : 'system_login.php';
if (!isset($_SESSION['validity_key']) || $_SESSION['validity_key'] !== 'authorized') {
    header('Location: ' . $login_page);
    exit;
}
?>

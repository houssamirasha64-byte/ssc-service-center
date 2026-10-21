<?php
session_start();
if (!isset($_SESSION['privileges']) || $_SESSION['privileges'] !== 'admin') exit("Access denied");
require_once "connect.php";
$name = $_POST['name'];
$role = in_array($_POST['role'], ['admin', 'normal'], true) ? $_POST['role'] : 'normal';
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users(username,password,role) VALUES (?,?,?)");
$stmt->bind_param("sss", $name, $pass, $role);
$stmt->execute();
header("Location: ../admin_employees.php");
exit;

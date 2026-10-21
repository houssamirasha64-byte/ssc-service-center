<?php
session_start();
if (!isset($_SESSION['privileges']) || $_SESSION['privileges'] !== 'admin') exit("Access denied");
require_once "connect.php";
$id = (int) $_GET['id'];
$stmt = $conn->prepare("DELETE FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
header("Location: ../admin_employees.php");
exit;

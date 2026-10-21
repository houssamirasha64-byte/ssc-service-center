<?php
session_start();
if (!isset($_SESSION['privileges']) || $_SESSION['privileges'] !== 'admin') exit("Access denied");
require_once "connect.php";
$id = (int) $_POST['id'];
$name = $_POST['name'];
$role = in_array($_POST['role'], ['admin', 'normal'], true) ? $_POST['role'] : 'normal';
$pwd = $_POST['password'];
if ($pwd != "") {
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET username=?, role=?, password=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $role, $pwd, $id);
} else {
    $stmt = $conn->prepare("UPDATE users SET username=?, role=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $role, $id);
}
$stmt->execute();
header("Location: ../admin_employees.php");
exit;

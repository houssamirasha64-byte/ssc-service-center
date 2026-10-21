<?php
session_start();
if (!isset($_SESSION['privileges']) || $_SESSION['privileges'] !== 'admin') exit("Access denied");
require_once "phpp/connect.php";
$id = (int) $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();
if (!$row) exit("Employee not found");
?>
<link rel="stylesheet" href="style.css">
<br>
<h1>Admin Panel: Edit Employee</h1><br>
<form method="POST" action="phpp/edit_employee.php">
<input type="hidden" name="id" value="<?= (int) $row['id'] ?>">
<label for="name">Employee Name: </label>
<input name="name" value="<?= htmlspecialchars($row['username']) ?>" required><br><br>
<label for="password">Password: </label>
<input name="password" placeholder="New Password (optional)">
<select name="role">
    <option value="admin" <?= $row['role'] === 'admin' ? 'selected' : '' ?>>admin</option>
    <option value="normal" <?= $row['role'] === 'normal' ? 'selected' : '' ?>>normal</option>
</select>
<button>Save</button>
</form>

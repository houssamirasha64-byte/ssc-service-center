<?php
session_start();
if (!isset($_SESSION['privileges']) || $_SESSION['privileges'] !== 'admin') { exit("Access denied"); }
require_once "phpp/connect.php";
$result = $conn->query("SELECT * FROM users");
?>
<link rel="stylesheet" href="style.css">
<br>
<h2>Admin Panel: Employee Management</h2>
<a style="color: chocolate; text-decoration: underline;" href="index.php">Back to System</a>
<form method="POST" action="phpp/add_employee.php"><br>
<label for="name">Employee Name: </label>
<input name="name" required>
<br><br>
<label for="password">Password: </label>
<input name="password" type="password" required>
<select name="role"><option value="normal">normal</option><option value="admin">admin</option></select>
<button>Add</button><br><br>
</form>
<table class="admin-table" border="1">
<tr><th>Name</th><th>Role</th><th>Actions</th></tr>
<?php while($row=$result->fetch_assoc()): ?>
<tr>
<td><?= htmlspecialchars($row['username']) ?></td>
<td><?= htmlspecialchars($row['role']) ?></td>
<td>
<a href="admin_edit_employee.php?id=<?= (int) $row['id'] ?>">Edit</a>
<a href="phpp/delete_employee.php?id=<?= (int) $row['id'] ?>">Delete</a>
</td>
</tr>
<?php endwhile; ?>
</table>

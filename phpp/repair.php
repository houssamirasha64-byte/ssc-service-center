<?php
include 'connect.php';
include 'validate.php';
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["repair"])) {
    $machineId = (int) $_POST["machine_id"];

    $stmt = $conn->prepare("UPDATE machines SET status = 'Repaired' WHERE id = ?");
    $stmt->bind_param("i", $machineId);
    $stmt->execute();
    header("Location: ../index.php");
    exit;
}
?>

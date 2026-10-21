<?php
include 'connect.php';
include 'validate.php';
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["deliver"])) {
    $machineId = (int) $_POST["machine_id"];
    date_default_timezone_set('Asia/Beirut');
    $currentDate = date("d-m-Y");
    $currentTime12Hour = date("h:i a");
    $time = "$currentDate at $currentTime12Hour";

    $stmt = $conn->prepare("UPDATE machines SET status = 'Delivered', delivery_date = ? WHERE id = ?");
    $stmt->bind_param("si", $time, $machineId);
    $stmt->execute();
    header("Location: ../pending_delivery.php");
    exit;
}
?>

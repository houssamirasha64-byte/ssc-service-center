<?php
include 'connect.php';
include 'validate.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $id = (int) $_POST['id'];
    $customer_name = $_POST['customer_name'];
    $model = $_POST['model'];
    $serial_number = $_POST['serial_number'];
    $fault_description = $_POST['fault_description'];
    $received_date = $_POST['received_date'];
    $delivery_date = $_POST['delivery_date'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE machines SET customer_name = ?, model = ?, serial_number = ?, fault_description = ?, received_date = ?, delivery_date = ?, status = ? WHERE id = ?");
    $stmt->bind_param("sssssssi", $customer_name, $model, $serial_number, $fault_description, $received_date, $delivery_date, $status, $id);
    $stmt->execute();
    header("Location: ../index.php");
    exit;
}
?>

<?php
include 'connect.php';
include 'validate.php';
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    $customer_name = $_POST["customer_name"];
    $model = $_POST["model"];
    $serialNumber = $_POST["serial_number"];
    $faultDescription = $_POST["fault_description"];
    date_default_timezone_set('Asia/Beirut');
    $currentDate = date("d-m-Y");
    $currentTime12Hour = date("h:i a");
    $time = "$currentDate at $currentTime12Hour";
    $deliveryDate = "-";

    $status = $_POST["status"];

    $stmt = $conn->prepare("INSERT INTO machines (customer_name, model, serial_number, fault_description, received_date, delivery_date, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $customer_name, $model, $serialNumber, $faultDescription, $time, $deliveryDate, $status);
    $stmt->execute();

    header("Location: ../index.php");
    exit;
}
?>

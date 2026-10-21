<?php include 'phpp/validate.php' ?>
<!DOCTYPE html>
<html>

<head>
    <title>Repair Shop - Received Machines</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <h1>Edit Machine Information</h1>
        <div style="margin-bottom: 20px;">
            <a href="add_machine.php">Add Machine</a>
            <a href="index.php">Pending Repair Machines</a>
            <a href="repaired.php">Repaired Machines</a>
            <a href="pending_delivery.php"> Pending Delivery Machines</a>
            <a href="delivered.php">Delivered Machines</a>
            <a href="search.php">Search Area</a> <a href="logout.php" class="logout-link">Logout</a>
        </div>

        <?php
        include 'phpp/connect.php';
        $machineId = (int) $_POST['machine_id'];
        $stmt = $conn->prepare("SELECT * FROM machines WHERE id = ?");
        $stmt->bind_param("i", $machineId);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        echo '<form method="POST" action="phpp/edit_process.php"><label for="id">ID : </label>
            <input type="text" name="id" value="' . htmlspecialchars($row['id']) . '" disabled><br><br>
            <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">
            <label for="customer_name">Customer Name : </label>
            <input type="text" name="customer_name" value="' . htmlspecialchars($row['customer_name']) . '"><br><br>
            <label for="model">Model Name : </label>
            <input type="text" name="model" value="' . htmlspecialchars($row['model']) . '"><br><br>
            <label for="serial_number">Serial Number : </label>
            <input type="text" name="serial_number" value="' . htmlspecialchars($row['serial_number']) . '"><br><br>
            <label for="fault_description">Fault Description : </label>
            <input type="text" name="fault_description" value="' . htmlspecialchars($row['fault_description']) . '"><br><br>
            <label for="received_date">Received Date : </label>
            <input type="text" name="received_date" value="' . htmlspecialchars($row['received_date']) . '"><br><br>
            <label for="delivery_date">Delivery Date : </label>
            <input type="text" name="delivery_date" value="' . htmlspecialchars($row['delivery_date']) . '"><br><br>
            <label for="status">Status : </label>
            <input type="text" name="status" value="' . htmlspecialchars($row['status']) . '"><br><br>
            <input type="submit" name="edit" value="Edit"></form>';
        ?>
        <div style="height: 60px;"></div>
    </center>

    <!-- JavaScript enhancements -->
    <script src="assets/js/form-validation.js"></script>
    <script src="assets/js/notifications.js"></script>
    <script src="assets/js/loader.js"></script>

</body>

</html>
<?php include 'phpp/validate.php' ?>
<!DOCTYPE html>
<html>

<head>
    <title>Repair Shop - Add Received Machine</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <h1>Add Received Machine</h1>
        <div>
            <a href="add_machine.php">Add Machine</a>
            <a href="index.php">Pending Repair Machines</a>
            <a href="repaired.php">Repaired Machines</a>
            <a href="pending_delivery.php"> Pending Delivery Machines</a>
            <a href="delivered.php">Delivered Machines</a>
            <a href="search.php">Search Area</a> <a href="logout.php" class="logout-link">Logout</a>
        </div>
        <form style="margin-top: 20px;" method="POST" action="phpp/process_add_machine.php">
            <label for="customer_name">Customer Name :</label>
            <input style="border: 1px solid black; padding: 5px;" type="text" id="customer_name" name="customer_name"
                required><br><br>


            <label for="model">Model :</label>
            <select style="border: 1px solid black; padding: 5px;" id="model" name="model">
                <option value="SUNON PRO 3.5 KW">SUNON PRO 3.5 KW</option>
                <option value="SUNON PRO 5.5 KW">SUNON PRO 5.5 KW</option>
                <option value="SUNON PLUS 3.5 KW">SUNON PLUS 3.5 KW</option>
                <option value="SUNON PLUS 5.5 KW">SUNON PLUS 5.5 KW</option>
            </select><br><br>

            <label for="serial_number">Serial Number :</label>
            <input style="border: 1px solid black; padding: 5px;" type="text" id="serial_number" name="serial_number"
                required><br><br>

            <label for="fault_description">Fault Description :</label>
            <input style="border: 1px solid black; padding: 5px; width: 300px;" type="text" id="fault_description" name="fault_description"
                required><br><br>

            <label for="status">Status :</label>
            <select style="border: 1px solid black; padding: 5px;" id="status" name="status">
                <option value="Pending Repair">Pending Repair</option>
                <option value="Repaired">Repaired</option>
                <option value="Pending Delivery">Pending Delivery</option>
                <option value="Delivered">Delivered</option>
            </select><br><br>

            <input type="submit" name="submit" value="Add Machine">
        </form>
    </center>

    <!-- JavaScript enhancements -->
    <script src="assets/js/form-validation.js"></script>
    <script src="assets/js/notifications.js"></script>
    <script src="assets/js/loader.js"></script>

</body>

</html>
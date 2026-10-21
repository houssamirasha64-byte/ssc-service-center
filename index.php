<?php include 'phpp/validate.php' ?>
<!DOCTYPE html>
<html>

<head>
    <title>Repair Service Center - Pending Repair Machines</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="page-pending-repair">
    <center>
        <h1>Pending Repair Machines</h1>
        <div>
            <?php
            require_once "phpp/connect.php";
            if ($_SESSION['privileges'] == 'admin') {
                echo '<a href="admin_employees.php" class="admin-link">Admin Panel</a>';
            }
            ?>
            <a href="add_machine.php">Add Machine</a>
            <a href="index.php">Pending Repair Machines</a>
            <a href="repaired.php">Repaired Machines</a>
            <a href="pending_delivery.php">Pending Delivery Machines</a>
            <a href="delivered.php">Delivered Machines</a>
            <a href="search.php">Search Area</a>
            <a href="logout.php" class="logout-link">Logout</a>
        </div>
        <div>
            <?php
            include 'phpp/connect.php';
            $result = mysqli_query($conn, "SELECT * FROM machines WHERE status = 'Pending Repair'");
            $rows_number = mysqli_num_rows($result);
            echo "<p id='total'>Total pending repair machines : " . $rows_number . "</p>";
            ?>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Model Name</th>
                <th>Serial Number</th>
                <th>Fault Description</th>
                <th>Received Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
            include 'phpp/connect.php';
            $result = mysqli_query($conn, "SELECT * FROM machines WHERE status = 'Pending Repair'");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['model']) . "</td>";
                echo "<td>" . htmlspecialchars($row['serial_number']) . "</td>";
                echo "<td>" . htmlspecialchars($row['fault_description']) . "</td>";
                echo "<td>" . htmlspecialchars($row['received_date']) . "</td>";
                echo "<td id='status'>" . htmlspecialchars($row['status']) . "</td>";
                echo '<td><form method="POST" action="phpp/repair.php">';
                echo '<input type="hidden" name="machine_id" value="' . $row['id'] . '">';
                echo '<input type="submit" name="repair" value="Repair">';
                echo '</form>';
                if (isset($_SESSION['privileges']) && $_SESSION['privileges'] === 'admin') {
                    echo '<br><form method="POST" action="edit.php">';
                    echo '<input type="hidden" name="machine_id" value="' . $row['id'] . '">';
                    echo '<input type="submit" name="edit" value="Edit">';
                    echo '</form>' . '<br><form method="POST" action="phpp/delete.php">';
                    echo '<input type="hidden" name="machine_id" value="' . $row['id'] . '">';
                    echo '<input type="submit" name="delete" value="DELETE">';
                    echo '</form>';
                }
                echo '</td>';
                echo "</tr>";
            }
            ?>
        </table>
    </center>
    <div style="height: 50px;"></div>

    <script src="assets/js/form-validation.js"></script>
    <script src="assets/js/notifications.js"></script>
    <script src="assets/js/loader.js"></script>

</body>

</html>
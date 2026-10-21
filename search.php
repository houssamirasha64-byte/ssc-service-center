<?php include 'phpp/validate.php' ?>
<!DOCTYPE html>
<html>

<head>
    <title>Sako Service Center - Search Area</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <h1>Search Area</h1>
        <div>
            <?php
            require_once "phpp/connect.php";
            if (!function_exists('run_search')) {
                function run_search($conn, $option, $query) {
                    $allowed = ['customer_name', 'serial_number', 'model', 'fault_description', 'received_date', 'delivery_date', 'status', 'id'];
                    if (!in_array($option, $allowed, true)) {
                        $option = 'customer_name';
                    }
                    $like = '%' . $query . '%';
                    $stmt = $conn->prepare("SELECT * FROM machines WHERE $option LIKE ?");
                    $stmt->bind_param("s", $like);
                    $stmt->execute();
                    return $stmt->get_result();
                }
            }
            if ($_SESSION['privileges'] == 'admin') {
                echo '<a href="admin_employees.php" class="admin-link">Admin Panel</a>';
            }
            ?>
            <a href="add_machine.php">Add Machine</a>
            <a href="index.php">Pending Repair Machines</a>
            <a href="repaired.php">Repaired Machines</a>
            <a href="pending_delivery.php"> Pending Delivery Machines</a>
            <a href="delivered.php">Delivered Machines</a>
            <a href="search.php">Search Area</a> <a href="logout.php" class="logout-link">Logout</a>
        </div><br>
        <form method="post" action="search.php">
            <label for="search_option">Search by : </label>
            <select style="border: 1px solid black; padding: 5px;" name="search_option">
                <option value="customer_name">Customer Name</option>
                <option value="serial_number">Serial Number</option>
                <option value="model">Model Name</option>
                <option value="fault_description">Fault Description</option>
                <option value="received_date">Received Date</option>
                <option value="delivery_date">Delivery Date</option>
                <option value="status">Status</option>
                <option value="id">ID</option>
            </select><br><br>
            <label for="search_query">Search : </label>
            <input style="border: 1px solid black; padding: 5px;" type="text" name="search_query" placeholder="Search">
            <input style="border: 1px solid black; padding: 5px;" type="submit" name="search" value="Search">
        </form>
        <div>
            <?php
            include 'phpp/connect.php';
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["search"])) {
                $search_option = $_POST['search_option'];
                $search_query = $_POST['search_query'];
                $result = run_search($conn, $search_option, $search_query);
                $rows_number = mysqli_num_rows($result);
                echo "<p id='total'>Total listed machines : " . $rows_number . "</p>";
            }
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
                <th>Delivery Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
            include 'phpp/connect.php';
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["search"])) {
                $search_option = $_POST['search_option'];
                $search_query = $_POST['search_query'];
                $result = run_search($conn, $search_option, $search_query);
                if (mysqli_num_rows($result) === 0) {
                    echo "<p style='color: red;'>No results were found</p>";
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['model']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['serial_number']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['fault_description']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['received_date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['delivery_date']) . "</td>";
                        echo "<td id='status'>" . htmlspecialchars($row['status']) . "</td>";
                        if ($row['status'] == 'Pending Repair') {
                            echo '<td><form method="POST" action="phpp/repair.php">';
                            echo '<input type="hidden" name="machine_id" value="' . $row['id'] . '">';
                            echo '<input type="submit" name="repair" value="Repair">';
                            echo '</form><br>';
                            if (isset($_SESSION['privileges']) && $_SESSION['privileges'] === 'admin') {
                                echo '<form method="POST" action="edit.php">';
                                echo '<input type="hidden" name="machine_id" value="' . $row['id'] . '">';
                                echo '<input type="submit" name="edit" value="Edit">';
                                echo '</form><br>';
                                echo '<form method="POST" action="phpp/delete.php">';
                                echo '<input type="hidden" name="machine_id" value="' . $row['id'] . '">';
                                echo '<input type="submit" name="delete" value="DELETE">';
                                echo '</form>';
                            }
                            echo '</td>';
                        }
                        ;
                        if ($row['status'] == 'Repaired') {
                            echo '<td><form method="POST" action="phpp/mtp.php">';
                            echo '<input type="hidden" name="machine_id" value="' . $row['id'] . '">';
                            echo '<input type="submit" name="mtp" value="Move to Pending Delivery">';
                            echo '</form><br>';
                            if (isset($_SESSION['privileges']) && $_SESSION['privileges'] === 'admin') {
                                echo '<form method="POST" action="edit.php">';
                                echo '<input type="hidden" name="machine_id" value="' . $row['id'] . '">';
                                echo '<input type="submit" name="edit" value="Edit">';
                                echo '</form><br>';
                                echo '<form method="POST" action="phpp/delete.php">';
                                echo '<input type="hidden" name="machine_id" value="' . $row['id'] . '">';
                                echo '<input type="submit" name="delete" value="DELETE">';
                                echo '</form>';
                            }
                            echo '</td>';
                        }

if ($row['status'] == 'Pending Delivery') {
                            echo '<td><form method="POST" action="phpp/deliver.php">';
                            echo '<input type="hidden" name="machine_id" value="' . $row['id'] . '">';
                            echo '<input type="submit" name="deliver" value="Deliver">';
                            echo '</form><br>';
                            if (isset($_SESSION['privileges']) && $_SESSION['privileges'] === 'admin') {
                                echo '<form method="POST" action="edit.php">';
                                echo '<input type="hidden" name="machine_id" value="' . $row['id'] . '">';
                                echo '<input type="submit" name="edit" value="Edit">';
                                echo '</form><br>';
                                echo '<form method="POST" action="phpp/delete.php">';
                                echo '<input type="hidden" name="machine_id" value="' . $row['id'] . '">';
                                echo '<input type="submit" name="delete" value="DELETE">';
                                echo '</form>';
                            }
                            echo '</td>';
                        }

if ($row['status'] == 'Delivered') {
                            if (isset($_SESSION['privileges']) && $_SESSION['privileges'] === 'admin') {
                                echo '<td><form method="POST" action="edit.php">';
                                echo '<input type="hidden" name="machine_id" value="' . $row['id'] . '">';
                                echo '<input type="submit" name="edit" value="Edit">';
                                echo '</form><br>';
                                echo '<form method="POST" action="phpp/delete.php">';
                                echo '<input type="hidden" name="machine_id" value="' . $row['id'] . '">';
                                echo '<input type="submit" name="delete" value="DELETE">';
                                echo '</form>';
                                echo '</td>';
                            } else {
                                echo '<td></td>';
                            }
                        }

echo "</tr>";
                    }
                }
            }
            ?>
        </table>
    </center>
    <div style="height: 50px;"></div>

    <!-- JavaScript enhancements -->
    <script src="assets/js/form-validation.js"></script>
    <script src="assets/js/notifications.js"></script>
    <script src="assets/js/loader.js"></script>

</body>

</html>
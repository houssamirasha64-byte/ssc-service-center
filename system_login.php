<!DOCTYPE html>

<head>
    <title>System Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <div class="container">
            <form method="post">
                <label for="username">Username : </label>
                <input style="padding: 5px;" type="text" name="username"><br><br>
                <label for="pwd">Password : </label>
                <input style="padding: 5px;" type="password" name="password"><br><br>
                <input style="padding: 5px;" type="submit" name="validate" value="Enter">
            </form>
            <?php
            include 'phpp/connect.php';
            if (isset($_POST['validate'])) {
                session_start();
                $_SESSION['validity_key'] = 'denied';
                $username = $_POST['username'];
                $pwd = $_POST['password'];
                $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $row = $stmt->get_result()->fetch_assoc();
                if ($row && password_verify($pwd, $row['password'])) {
                    session_regenerate_id(true);
                    $_SESSION['validity_key'] = 'authorized';
                    $_SESSION['privileges'] = $row['role'];
                    header('Location: index.php');
                } else {
                    echo '<p style="color: red;">Incorrect Credentials. Please try again</p>';
                }
            }

            ?>
        </div>
    </center>

    <!-- JavaScript enhancements -->
    <script src="assets/js/form-validation.js"></script>
    <script src="assets/js/notifications.js"></script>
    <script src="assets/js/loader.js"></script>

</body>

</html>
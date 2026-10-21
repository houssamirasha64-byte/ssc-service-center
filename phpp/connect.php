<?php
$username = 'root';
$pwd = '';
$db_name = 'ssc';
$host = '127.0.0.1';

$conn = mysqli_connect($host, $username, $pwd, $db_name);

if (!$conn) {
    echo "connection to db failed";
}
?>
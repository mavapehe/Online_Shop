<?php
$host = 'containers-us-west-148.railway.app';
$port = 6272;
$user = 'root';
$password = 'UOvUUOX46PGiKmDe43Y8';
$database = 'products_db';

$conn = new mysqli($host, $user, $port, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

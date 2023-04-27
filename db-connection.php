<?php
$servername = "containers-us-west-148.railway.app";
$username = "root";
$password = "UOvUUOX46PGiKmDe43Y8";
$dbname = "railway";
$port = 6272;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

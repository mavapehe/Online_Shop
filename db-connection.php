<?php
$servername = "railway";
$username = "root";
$password = "UOvUUOX46PGiKmDe43Y8";
$dbname = "products_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

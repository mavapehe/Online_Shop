<?php
error_reporting(E_ERROR | E_PARSE);
header("Content-Type: application/json");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "products_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = $_GET["query"];
$sql = "SELECT id, name FROM products WHERE name LIKE ?";
$stmt = $conn->prepare($sql);
$param = "%" . $query . "%";
$stmt->bind_param("s", $param);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $output = [];
    while ($row = $result->fetch_assoc()) {
        $output[] = ["id" => $row["id"], "name" => $row["name"]];
    }
    echo json_encode($output);
} else {
    echo json_encode([]);
}

$stmt->close();
$conn->close();
?>
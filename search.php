<?php
error_reporting(E_ERROR | E_PARSE);
header("Content-Type: application/json");

require 'db-connection.php';

$query = $_GET["query"];
$sql = "SELECT id, name FROM products_db WHERE name LIKE ?";
$stmt = $pdo->prepare($sql);
$param = "%" . $query . "%";
$stmt->bindParam(1, $param);
$stmt->execute();

$result = $stmt->fetchAll();

if (!empty($result)) {
    $output = [];
    foreach ($result as $row) {
        $output[] = ["id" => $row["id"], "name" => $row["name"]];
    }
    echo json_encode($output);
} else {
    echo json_encode([]);
}

$stmt = null;
$pdo = null;
?>

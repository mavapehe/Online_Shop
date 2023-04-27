<?php
require 'db-connection.php';

if (isset($_GET['ids'])) {
    $ids = implode(',', array_map('intval', explode(',', $_GET['ids'])));
    $sql = "SELECT id, name, price, image FROM products WHERE id IN ($ids)";
    $result = $conn->query($sql);
    $products = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'image' => $row['image']
            ];
        }
    }

    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($products);
} else {
    header('HTTP/1.1 400 Bad Request');
    die('Missing required parameter "ids"');
}

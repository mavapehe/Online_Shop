<?php
require 'db-connection.php';

if (isset($_GET['ids'])) {
    $ids = array_map('intval', explode(',', $_GET['ids']));
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $sql = "SELECT id, name, price, image FROM products WHERE id IN ($placeholders)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($ids);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $products = [];

    if ($result) {
        foreach ($result as $row) {
            $products[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'image' => $row['image']
            ];
        }
    }

    $pdo = null;

    header('Content-Type: application/json');
    echo json_encode($products);
} else {
    header('HTTP/1.1 400 Bad Request');
    die('Missing required parameter "ids"');
}


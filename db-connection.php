<?php
$host = 'containers-us-west-148.railway.app';
$port = '6272';
$db   = 'railway';
$user = 'root';
$pass = 'UOvUUOX46PGiKmDe43Y8';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
try {
    $pdo = new \PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>

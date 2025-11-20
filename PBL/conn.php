<?php
// conn.php
// Sesuaikan credential DB-mu
$DB_HOST = 'localhost';
$DB_PORT = '5432';
$DB_NAME = 'lab_dt';
$DB_USER = 'postgres';
$DB_PASS = 'crazyMamad13*';

try {
    $dsn = "pgsql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME;";
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    echo "Koneksi database gagal: " . $e->getMessage();
    exit;
}

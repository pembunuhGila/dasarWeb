<?php
$host = "localhost";
$port = "5432";
$dbname = "db_musik";
$user = "postgres";
$password = "crazyMamad13*"; // ganti sesuai password PostgreSQL kamu

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$conn) {
    die("Koneksi ke database gagal: " . pg_last_error());
}
?>
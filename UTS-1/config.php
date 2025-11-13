<?php
// config.php - koneksi DB (PostgreSQL)
$host = "localhost";
$port = "5432";
$dbname = "db_musik";
$user = "postgres";
$password = "crazyMamad13*";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    // untuk development tampilkan error, di production sebaiknya log dan tunjukkan pesan umum
    die("Koneksi gagal: " . pg_last_error());
}
?>

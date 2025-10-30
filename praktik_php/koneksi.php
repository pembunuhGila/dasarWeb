<?php
$host = "localhost";
$user = "root";    
$pass = "";   
$db = "prakwebdb";  

$connect = mysqli_connect($host, $user, $pass, $db);

if (!$connect) {
    die("Koneksi ke database GAGAL: " . mysqli_connect_error());
} 
?>
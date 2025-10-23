<?php
include 'config.php';
$id = $_GET['id'];
pg_query($conn, "DELETE FROM lagu WHERE id=$id");
header("Location: daftar.php");
?>
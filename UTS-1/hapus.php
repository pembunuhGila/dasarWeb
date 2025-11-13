<?php
// hapus.php
include 'auth.php';
include 'config.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id > 0) {
    // ambil nama file untuk dihapus
    $r = pg_fetch_assoc(pg_query_params($conn, "SELECT gambar FROM lagu WHERE id=$1", [$id]));
    if ($r && !empty($r['gambar'])) {
        $path = __DIR__ . "/uploads/" . $r['gambar'];
        if (file_exists($path)) @unlink($path);
    }
    pg_query_params($conn, "DELETE FROM lagu WHERE id=$1", [$id]);
}

header("Location: daftar.php");
exit;

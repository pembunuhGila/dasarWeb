<?php
/**
 * FILE: auth.php
 * FUNGSI: Melindungi halaman agar hanya bisa diakses oleh user yang sudah login
 */

session_start();

// Cek apakah session user sudah dibuat
if (!isset($_SESSION['user'])) {
    // Jika belum login, arahkan ke halaman login
    header("Location: login.php");
    exit;
}
?>

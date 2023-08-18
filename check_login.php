<?php
include("koneksi.php");
// session_start();

if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Maaf, Anda belum login!'); window.location.href = 'index.php';</script>";
    exit();
}

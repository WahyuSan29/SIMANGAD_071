<?php
// Menyertakan file koneksi.php
include 'koneksi.php';

// Mendapatkan NIK dari parameter GET
$nik = $_GET['nik'];

// Mengecek apakah NIK sudah ada dalam tabel nasabah
$query = "SELECT * FROM nasabah WHERE nik = '$nik'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    // Jika NIK sudah ada
    echo "nik_exists";
} else {
    // Jika NIK belum ada
    echo "nik_available";
}

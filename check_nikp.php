<?php
// Menyertakan file koneksi.php
include 'koneksi.php';

// Mendapatkan NIK dari parameter GET
$nik = $_GET['nik'];

// Memeriksa apakah NIK hanya terdiri dari angka
if (!is_numeric($nik)) {
    echo "nik_invalid";
    exit;
}

// Mengecek apakah NIK sudah ada dalam tabel nasabah
$query = "SELECT * FROM pengelola WHERE nik_pengelola = '$nik'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    // Jika NIK sudah ada
    echo "nik_exists";
} else {
    // Jika NIK belum ada
    echo "nik_available";
}

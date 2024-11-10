<?php
$host = "localhost"; // Ganti dengan host database Anda jika berbeda
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda jika ada
$database = "db_lembaga_pelatihan"; // Nama database yang sesuai

// Membuat koneksi ke database
$koneksi = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
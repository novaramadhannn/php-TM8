<?php
// akun.php

// Memulai sesi dan memasukkan file koneksi database
session_start();
include 'koneksi.php';

// Pastikan hanya admin yang bisa mengakses halaman ini
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== '1') {
    header("Location: login.php");
    exit();
}

// Query untuk mengambil data dari tabel akun
$query = "SELECT akun.user_id, akun.username, akun.password, users.nama, users.email, users.no_telp, users.role 
          FROM akun
          JOIN users ON akun.user_id = users.id";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Akun - SkillUp Academy</title>
    <link rel="stylesheet" href="css/akun.css">
</head>
<body>

<?php include 'navbar.php'; // Memasukkan file navbar ?>

<div class="container">
    <h2>Data Akun</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Password</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Periksa apakah ada data dalam tabel akun
            if (mysqli_num_rows($result) > 0) {
                // Menampilkan data akun dalam tabel
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['user_id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['no_telp'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['password']) . "</td>"; // Menampilkan password (dalam bentuk asli)
                    echo "<td>" . ($row['role'] == '1' ? 'Admin' : 'Pengguna') . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada data akun.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

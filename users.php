<?php
include 'koneksi.php';

// Mengambil data pengguna dari tabel users
$sql = "SELECT * FROM users";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
    <link rel="stylesheet" href="css/users.css">
</head>
<body>
    <div class="container">
        <h1>Data Pengguna</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nama']}</td>
                                <td>{$row['alamat']}</td>
                                <td>{$row['no_telp']}</td>
                                <td>{$row['email']}</td>
                                <td><img src='images/{$row['foto']}' alt='Foto' class='user-photo'></td>
                                <td>{$row['role']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Menutup koneksi
$koneksi->close();
?>

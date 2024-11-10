<?php
include 'koneksi.php'; // Menghubungkan ke database

// Query untuk mendapatkan data peserta
$query = "SELECT * FROM peserta";
$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta</title>
    <link rel="stylesheet" href="css/peserta.css">
</head>
<body>

    <div class="container">
        <h2 align="center">Data Peserta</h2>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Email</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "<td>" . $row['no_telp'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td><img src='uploads/" . $row['foto'] . "' alt='Foto' class='foto'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data peserta.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <p align="center">
        <a href="index.php">Kembali Ke Beranda</a></p>

</body>
</html>

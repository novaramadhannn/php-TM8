<?php
// Koneksi ke database
include('koneksi.php');
$sql = "SELECT * FROM tenaga_pelatih";
$query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelatih</title>
    <link rel="stylesheet" href="css/pelatih.css">
</head>
<body>
    <div class="main-content">
        <div class="container">
            <h2>Daftar Pelatih</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Pelatih</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>Alamat</th>
                        <th>Foto</th> <!-- Menambahkan kolom Foto -->
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['no_telp']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><img src="uploads/<?php echo $row['foto']; ?>" alt="Foto Pelatih" class="foto"></td> <!-- Menampilkan Foto -->
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <p align="center">
        <a href="index.php">Kembali Ke Beranda</a></p>

</body>
</html>

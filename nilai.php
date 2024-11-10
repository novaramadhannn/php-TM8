<?php
include 'koneksi.php';

// Mengambil data nilai peserta dari tabel nilai
$sql = "SELECT nilai.id_nilai, nilai.id_peserta, nilai.id_program, nilai.nilai_ujian, nilai.nilai_tugas, users.nama AS nama_peserta, program.nama_program 
        FROM nilai
        JOIN users ON nilai.id_peserta = users.id
        JOIN program ON nilai.id_program = program.id_program";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Peserta</title>
    <link rel="stylesheet" href="css/nilai.css">
</head>
<body>
    <div class="container">
        <h1>Nilai Peserta Program Pelatihan</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Nilai</th>
                    <th>Nama Peserta</th>
                    <th>Program</th>
                    <th>Nilai Ujian</th>
                    <th>Nilai Tugas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id_nilai']}</td>
                                <td>{$row['nama_peserta']}</td>
                                <td>{$row['nama_program']}</td>
                                <td>{$row['nilai_ujian']}</td>
                                <td>{$row['nilai_tugas']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data nilai</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>

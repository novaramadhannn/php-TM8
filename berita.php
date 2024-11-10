<?php
include 'koneksi.php';
include 'navbar.php';

// Mengambil data berita dari tabel berita
$sql = "SELECT * FROM berita ORDER BY tanggal_publikasi DESC";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - SkillUp Academy</title>
    <link rel="stylesheet" href="css/berita.css">
</head>
<body>
    <!-- Navbar -->
    
    <!-- Main Content -->
    <section class="main-content">
        <div class="container">
            <h2>Berita Terbaru</h2>
            <p>Dapatkan informasi terbaru seputar SkillUp Academy dan dunia pelatihan.</p>
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Berita</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Pelatihan Digital Marketing Dibuka!</td>
                        <td>Pelatihan Digital Marketing akan dimulai bulan depan. Segera daftar!</td>
                        <td>5 November 2024</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Web Development Bootcamp</td>
                        <td>Daftar sekarang untuk pelatihan intensif pengembangan website selama 3 bulan.</td>
                        <td>8 November 2024</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <footer>
    <div class="footer-content">
        <p>&copy; 2024 SkillUp Academy. All Rights Reserved.</p>
        <p>Contact us: <a href="mailto:info@skillupacademy.com">info@skillupacademy.com</a></p>
    </div>
</footer>

</body>
</html>

<script>
src="js/index.js">
src="js/navv.js">
</script>

<?php
// Menutup koneksi
$koneksi->close();
?>

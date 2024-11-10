<?php
include 'koneksi.php';
include 'navbar.php';

// Mengambil data program pelatihan dari tabel program
$sql = "SELECT * FROM program";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Pelatihan - SkillUp Academy</title>
    <link rel="stylesheet" href="css/program.css">
</head>
<body>
    <!-- Navbar -->
    

    <!-- Main Content -->
    <section class="main-content">
        <div class="container">
            <h2>Program Pelatihan</h2>
            <p>Temukan berbagai program pelatihan yang kami tawarkan untuk membantu Anda mengembangkan keterampilan.</p>
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Program</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Mulai</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Pelatihan Web Development</td>
                        <td>Pelatihan untuk membangun website dengan HTML, CSS, JavaScript.</td>
                        <td>15 November 2024</td>
                        <td>Aktif</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Pelatihan Data Science</td>
                        <td>Pelatihan untuk mempelajari data analysis menggunakan Python dan R.</td>
                        <td>20 November 2024</td>
                        <td>Aktif</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Pelatihan Digital Marketing</td>
                        <td>Pelatihan tentang pemasaran digital dan SEO.</td>
                        <td>25 November 2024</td>
                        <td>Aktif</td>
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
<?php
// Menutup koneksi
$koneksi->close();
?>
